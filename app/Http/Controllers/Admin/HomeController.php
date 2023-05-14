<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Employee;
use App\Appointment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();
        $appointment = Appointment::all();

        $total_user = User::count();
        $total_employee = Employee::count();
        $total_appointment = Appointment::count();

        return view('home', compact('total_user','total_employee', 'total_appointment'));
    }
}
