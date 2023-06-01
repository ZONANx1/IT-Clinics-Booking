@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
<div class="col-xl-4 col-sm-8 mb-xl-0 mb-5">
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">If there's any issues</p>
                            <h5 class="font-weight-bolder mb-0">
                                Please contact Hilman or Khairul

                                <span class="text-success text-sm font-weight-bolder"> Email: hilman.kasim@plus.com.my
                                    Email: khairulamirin.ismail@plus.com.my</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <h1>
                            <div class="login-logo">
                                <a href="#">
                                    {{ trans('panel.site_title') }}
                                </a>
                            </div>
                        </h1>
                        <p class="text-muted"></p>
                        <div>
                            <input name="token" value="{{ $token }}" type="hidden">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" required placeholder="{{ trans('global.login_email') }}">
                                @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>
                           <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('global.reset_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
