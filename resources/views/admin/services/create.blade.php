@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.services.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.service.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($service) ? $service->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('Desc') ? 'has-error' : '' }}">
                <label for="Desc">{{ trans('cruds.service.fields.Desc') }}</label>
                <textarea id="Desc" name="Desc" class="form-control ">{{ old('Desc', isset($appointment) ? $appointment->Desc : '') }}</textarea>
                @if($errors->has('Desc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('Desc') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.Desc_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection