@component('mail::message')
# Appointment Confirmation

Dear {{ $user->name }},

Your booking for DIS IT Clinics slot has been successfully created. Here are the details:

- Service: {{ $appointment->service->name }}
- Trainer: {{ $appointment->employee->name }}
- Start Time: {{ $appointment->service->start_time }}
- Finish Time: {{ $appointment->service->finish_time  }}

Thank you for choosing our service. Please go to this link: https://plus-itclinics-o365.42web.io to view details.

Regards,
The DIS Team
@endcomponent
