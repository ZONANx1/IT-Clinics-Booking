<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Appointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id'   => [
                'required',
                'integer',
            ],
         //   'start_time'  => [
            //    'required',
          //      'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
          //  ],
         //   'finish_time' => [
         //       'required',
         //       'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
        //    ],
            'services.*'  => [
                'integer',
            ],
            'services'    => [
                'array',
            ],
            'service_id'   => [
                'required',
                Rule::unique('appointments')->where(function ($query) {
                    return $query->where('user_id', $this->user_id);
                }),
            ],
        ];
    }
}
