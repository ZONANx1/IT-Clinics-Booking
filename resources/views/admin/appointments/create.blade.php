@extends('layouts.admin')
@section('content')

<style>
    /* Styles for the table */
</style>

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.appointments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user">{{ trans('cruds.appointment.fields.user') }}*</label>
                <select name="user_id" id="user" class="form-control select2" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->user ? $appointment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <em class="invalid-feedback">{{ $message }}</em>
                @enderror
            </div>

            <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.appointment.fields.service') }}</th>
                            <th>{{ trans('cruds.appointment.fields.start_time') }}</th>
                            <th>{{ trans('cruds.appointment.fields.finish_time') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            @php
                                $displayDate = date('d-m-Y', strtotime($service->start_time));
                            @endphp
                            @if ($displayDate !== '09-06-2023') {{-- Check if displayDate is not equal to 09-06-2023 --}}
                                <tr>
                                    <td>
                                        <input type="radio" name="service_id" id="service_{{ $service->id }}" value="{{ $service->id }}" {{ (isset($appointment) && $appointment->service && $appointment->service->id == $service->id) || old('service_id') == $service->id ? 'checked' : '' }}>
                                        <label for="service_{{ $service->id }}">{{ $service->name }}</label>
                                    </td>
                                    <td>{{ date('h:i A', strtotime($service->start_time)) }}</td>
                                    <td>{{ date('h:i A', strtotime($service->finish_time)) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @error('service_id')
                    <em class="invalid-feedback">{{ $message }}</em>
                @enderror
            </div>

            <div class="form-group">
                <label for="comments">{{ trans('cruds.appointment.fields.comments') }}</label>
                <textarea id="comments" name="comments" class="form-control">{{ old('comments', isset($appointment) ? $appointment->comments : '') }}</textarea>
                @error('comments')
                    <em class="invalid-feedback">{{ $message }}</em>
                @enderror
                <p class="helper-block">{{ trans('cruds.appointment.fields.comments_helper') }}</p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
