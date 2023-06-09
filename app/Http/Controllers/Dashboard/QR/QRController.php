<?php

namespace App\Http\Controllers\Dashboard\QR;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\QR;
use App\Models\ShortURL;
use App\Models\Socmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class QRController extends Controller
{
    private function rules()
    {
        return [
            'employee_id' => ['required'],
        ];
    }

    public function index()
    {
        $qrs = QR::latest()->get();

        return view('dashboard.qr.index', [
            'title' => 'QR',
            'qrs' => $qrs,
        ]);
    }

    public function create()
    {
        $employees = Employee::latest()->get();

        return view('dashboard.qr.create', [
            'title' => 'Create QR',
            'employees' => $employees,
        ]);
    }

    public function createQR(Request $request)
    {
        DB::beginTransaction();

        $request->validate($this->rules());

        try {

            $qr = QR::create(['employee_id' => $request->employee_id]);

            $socmed = new Socmed();
            $socmed->fill([
                'employee_id' => $qr->employee_id,
                'qr_id' => $qr->id,
                'string' => ($request->linkedin) ? $request->linkedin : $request->whatsapp,
                'type' => ($request->linkedin) ? 'linkedin' : 'whatsapp',
            ])->save();

            $url = $qr->socmed->type == "linkedin" ? $qr->socmed->string : whatsappUrl($qr->socmed->string);

            $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

            if (empty($shortUrlModel)) {
                $builder->destinationUrl($url)->urlKey(Str::slug($qr->employee->name))->make();
            }

            DB::commit();

            $result = (object) [
                'success' => true,
                'message' => 'QR Berhasil Dibuat',
            ];
        } catch (\Exception $err) {
            $result = (object) [
                'success' => false,
                'message' => $err->getMessage(),
                'code' => $err->getCode(),
            ];

            DB::rollBack();
        }

        if (!$result->success) return redirect()->back()->with('fail', $result->message)->withInput();

        return redirect()
            ->route('dashboard.qr.index')
            ->with('success', $result->message);
    }

    public function edit($id)
    {
        $qr = QR::find($id);
        $employees = Employee::latest()->get();

        return view('dashboard.qr.edit', [
            'title' => 'Edit QR',
            'qr' => $qr,
            'employees' => $employees,
        ]);
    }

    public function updateQR(Request $request, $id)
    {
        DB::beginTransaction();

        $request->validate($this->rules());
        try {

            $qr = QR::find($id)->fill(['employee_id' => $request->employee_id]);

            $socmed = Socmed::find($qr->socmed->id);

            $qr->save();

            $socmed->fill([
                'employee_id' => $qr->employee_id,
                'qr_id' => $qr->id,
                'string' => ($request->linkedin) ? $request->linkedin : $request->whatsapp,
                'type' => ($request->linkedin) ? 'linkedin' : 'whatsapp',
            ])->save();

            DB::commit();

            $result = (object) [
                'success' => true,
                'message' => 'QR Berhasil Dibuat',
            ];
        } catch (\Exception $err) {
            $result = (object) [
                'success' => false,
                'message' => $err->getMessage(),
                'code' => $err->getCode(),
            ];

            DB::rollBack();
        }

        if (!$result->success) return redirect()->back()->with('fail', $result->message)->withInput();

        return redirect()
            ->route('dashboard.qr.index')
            ->with('success', $result->message);
    }

    public function deleteQR($id)
    {
        $qr = QR::find($id);
        $qr->delete();

        $result = (object) [
            'success' => true,
            'message' => 'QR Berhasil Dihapus',
            'qr_id' => $id,
        ];

        return response()->json(['success' => $result->message], 200);
    }

    public function qrProccessing($url_key, $id)
    {
        $data['destination'] = null;

        $qr = QR::find($id);

        if ($qr->limit >= 1) {
            $qr->update([
                'limit' => ($qr->limit - 1),
                'status' => '0'
            ]);
            $model = ShortURL::where('url_key', $url_key)->first();

            $data['destination'] = $model->destination_url;

        } elseif ($qr->limit == 0) {
            $qr->update(['status' => '1']);

            $data['destination'] = url('/') . '/error/page-expired';
        }

        return Redirect::to($data['destination']);
    }
}
