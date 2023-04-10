<?php

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('dashboard.department.index', [
            'title' => 'Department'
        ]);
    }

    public function create()
    {
        return view('dashboard.department.create', [
            'title' => 'Create Department'
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.department.edit', [
            'title' => 'Edit Department',
        ]);
    }
}
