<?php

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function index()
    {
        $departments = Department::latest()->get();

        return view('dashboard.department.index', [
            'title' => 'Department',
            'departments' => $departments
        ]);
    }

    public function create()
    {
        return view('dashboard.department.create', [
            'title' => 'Create Department'
        ]);
    }

    public function createDepartment(Request $request)
    {
        $data = $request->validate($this->rules());

        $data['name'] = strtoupper($data['name']);

        $department = Department::create($data);

        $result = (object) [
            'status' => true,
            'message' => 'Department Berhasil Dibuat',
            'data' => $department
        ];

        return redirect()
            ->route('dashboard.department.index')
            ->with('success', $result->message);
    }

    public function edit($id)
    {
        $department = Department::find($id);

        return view('dashboard.department.edit', [
            'title' => 'Edit Department',
            'department' => $department,
        ]);
    }

    public function updateDepartment(Request $request, $id)
    {
        $data = $request->validate($this->rules());

        $data['name'] = strtoupper($data['name']);

        $department = Department::find($id)->update($data);

        $result = (object) [
            'status' => true,
            'message' => 'Department Berhasil Di Update',
            'data' => $id,
        ];

        return redirect()
            ->route('dashboard.department.index')
            ->with('success', $result->message);
    }

    public function trash()
    {
        return view('dashboard.department.trash', [
            'title' => 'Trash Department'
        ]);
    }
}
