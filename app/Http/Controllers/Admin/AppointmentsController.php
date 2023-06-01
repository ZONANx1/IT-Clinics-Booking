<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\User;
use App\Employee;
use App\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Mail\AppointmentCreated; // Import the email class
use Illuminate\Support\Facades\Mail; // Import the Mail facade

class AppointmentsController extends Controller
{
   public function index(Request $request)
{
     if ($request->ajax()) {
        $query = Appointment::with(['user', 'employee', 'service'])->select(sprintf('%s.*', (new Appointment)->table));


        if (Auth::user()->isAdmin()) {
            // Admin user can access all appointments
        } else {
            $query->where('user_id', Auth::user()->id);
        }

        $table = DataTables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function ($row) {
            $viewGate      = 'appointment_show';
            $editGate      = 'appointment_edit';
            $deleteGate    = 'appointment_delete';
            $crudRoutePart = 'appointments';

            return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
        });

        $table->editColumn('id', function ($row) {
            return $row->id ? $row->id : "";
        });
        $table->addColumn('user_name', function ($row) {
            return $row->user ? $row->user->name : '';
        });

        $table->addColumn('employee_name', function ($row) {
            return $row->employee ? $row->employee->name : '';
        });

        $table->addColumn('service_name', function ($row) {
            return $row->service ? $row->service->name : '';
        });

        $table->editColumn('comments', function ($row) {
            return $row->comments ? $row->comments : "";
        });

        $table->rawColumns(['actions', 'placeholder', 'user', 'employee', 'service']);

        return $table->make(true);
    }

    return view('admin.appointments.index');
}

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereNotIn('name', ['admin', 'authoriser', 'user', 'user2'])->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::all()->pluck('name', 'id', 'start_time', 'finish_time')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appointments.create', compact('users', 'employees', 'services'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $service = Service::findOrFail($request->input('service_id'));

        // Get the first employee associated with the service
        $employee = $service->employees()->first();

        // Create the appointment and assign the employee
        $appointment = Appointment::create($request->all());
        $appointment->employee_id = $employee->id;
        $appointment->save();

         // Send email to the user
    $user = $appointment->user;
    Mail::to($user->email)->send(new AppointmentCreated($appointment, $user));


        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereNotIn('name', ['admin', 'authoriser', 'user', 'user2'])->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::all()->pluck('name', 'id', 'start_time', 'finish_time')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('user', 'employee', 'service');

        return view('admin.appointments.edit', compact('users', 'employees', 'services', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
       // Retrieve the selected service
       $service = Service::findOrFail($request->input('service_id'));

       // Get the first employee associated with the service
       $employee = $service->employees()->first();

       // Update the appointment and assign the employee
       $appointment->update($request->all());
       $appointment->employee_id = $employee->id;
       $appointment->save();

       return redirect()->route('admin.appointments.index');
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('user', 'employee', 'service');

        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
