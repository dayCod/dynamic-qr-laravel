<?php

namespace App\Http\Controllers\Dashboard\Employee;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'department_id' => ['required', 'exists:departments,id'],
        ];
    }

    public function index()
    {
        $employees = Employee::latest()->get();

        return view('dashboard.employee.index', [
            'title' => 'Employee',
            'employees' => $employees,
        ]);
    }

    public function create()
    {
        $departments = Department::latest()->get();

        return view('dashboard.employee.create', [
            'title' => 'Create Employee',
            'departments' => $departments,
        ]);
    }

    public function createEmployee(Request $request)
    {
        $request->validate($this->rules());

        $employee = Employee::create([
            'name' => strtoupper($request->name),
            'email' => $request->email,
            'department_id' => $request->department_id,
        ]);

        $result = (object) [
            'success' => true,
            'message' => 'Employee Berhasil Dibuat',
            'employee_id' => $employee->id,
        ];

        return redirect()
            ->route('dashboard.employee.index')
            ->with('success', $result->message);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::latest()->get();

        return view('dashboard.employee.edit', [
            'title' => 'Edit Employee',
            'employee' => $employee,
            'departments' => $departments,
        ]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate($this->rules());

        $employee = Employee::find($id)->fill([
            'name' => strtoupper($request->name),
            'email' => $request->email,
            'department_id' => $request->department_id,
        ])->save();

        $result = (object) [
            'success' => true,
            'message' => 'Employee Berhasil Diupdate',
            'employee_id' => $id,
        ];

        return redirect()
            ->route('dashboard.employee.index')
            ->with('success', $result->message);
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        $result = (object) [
            'success' => true,
            'message' => 'Employee Berhasil Dihapus',
            'employee_id' => $id,
        ];

        return response()->json(['sucess' => $result->message], 200);
    }
}
