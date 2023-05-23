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
            $events[] = [
                'start' => $appointment->service->start_time,
                'title' => $appointment->service->name,
                'test' => $appointment->user->name . ' ('.$appointment->employee->name.')',
                'url'   => route('admin.appointments.show', $appointment->id),
            ];
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}

