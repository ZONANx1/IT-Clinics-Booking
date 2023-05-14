@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.services.update", [$service->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                <textarea id="Desc" name="Desc" class="form-control ">{{ old('Desc', isset($service) ? $service->Desc : '') }}</textarea>
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
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.service.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($service) ? $service->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('finish_time') ? 'has-error' : '' }}">
                <label for="finish_time">{{ trans('cruds.service.fields.finish_time') }}*</label>
                <input type="text" id="finish_time" name="finish_time" class="form-control datetime" value="{{ old('finish_time', isset($service) ? $service->finish_time : '') }}" required>
                @if($errors->has('finish_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('finish_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.finish_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection