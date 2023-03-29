<?php

namespace App\Http\Controllers\Dashboard\QR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function index()
    {
        return view('dashboard.qr.index');
    }
}
