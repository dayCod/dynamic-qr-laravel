<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'count_total_department' => $this->countTotalDepartment(),
            'check_whether_today_new_department_data' => $this->checkWhetherTodayNewDepartmentData(),
            'count_total_employees' => $this->countTotalEmployees(),
            'check_whether_today_new_employees_data' => $this->checkWhetherTodayNewEmployeesData(),
        ];

        // dd($data);

        return view('dashboard.home.index', compact('data'));
    }

    private function countTotalDepartment()
    {

        return Department::count();

    } //end method

    private function checkWhetherTodayNewDepartmentData()
    {

        return Department::all()->filter(function($value) {
            return $value->created_at->format('d') == Carbon::today()->format('d');
        })->count();

    } //end method

    private function countTotalEmployees()
    {

        return Employee::count();

    } //end method

    private function checkWhetherTodayNewEmployeesData()
    {

        return Employee::all()->filter(function($value) {
            return $value->created_at->format('d') == Carbon::today()->format('d');
        })->count();

    }
}
