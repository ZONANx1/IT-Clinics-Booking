<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;

class SystemCalendarController extends Controller
{
    public function index()
    {
        $events = [];

        $appointments = Appointment::with(['user', 'employee', 'service'])->get();

        foreach ($appointments as $appointment) {
            if (!$appointment->service || !$appointment->service->start_time) {
                continue;
            }

            $user = $appointment->user;
            $employee = $appointment->employee;

            $firstNameUser = explode(' ', $user->name)[0]; // Extract the first name
            $firstNameEmployee = explode(' ', $employee->name)[0]; // Extract the first name

            $serviceTitle = preg_replace('/\(\d+ [A-Za-z]+ \d+\)/', '', $appointment->service->name); // Remove (9 June 2023)

            $events[] = [
                'start' => $appointment->service->start_time,
                'title' => $firstNameUser. ' - ' . $serviceTitle  . ' - ' . $firstNameEmployee,
                'url'   => route('admin.appointments.show', $appointment->id),
            ];
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
