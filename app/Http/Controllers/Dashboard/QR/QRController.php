<?php

namespace App\Http\Controllers\Dashboard\QR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function index()
    {
        return view('dashboard.qr.index', [
            'title' => 'QR',
        ]);
    }

    public function create()
    {
        return view('dashboard.qr.create', [
            'title' => 'Create QR',
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.qr.edit', [
            'title' => 'Edit QR',
        ]);
    }
}
