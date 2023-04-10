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

    public function createEmployee(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'department_id' => ['required', 'exists:departments,id'],
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.employee.edit', [
            'title' => 'Edit Employee',
        ]);
    }
}
