<?php

namespace App\Http\Controllers\Dashboard\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('dashboard.employee.index', [
            'title' => 'Employee'
        ]);
    }

    public function create()
    {
        return view('dashboard.employee.create', [
            'title' => 'Create Employee'
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.employee.edit', [
            'title' => 'Edit Employee',
        ]);
    }
}
