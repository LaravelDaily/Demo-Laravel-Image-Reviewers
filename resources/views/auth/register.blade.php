@extends('layouts.app')
@section('content')
<div class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <h1>
                                    <div class="login-logo">
                                        <a href="#">
                                            {{ trans('panel.site_title') }}
                                        </a>
                                    </div>
                                </h1>
                                <p class="text-muted">Register</p>
                                <div>
                                    {{ csrf_field() }}
                                    <div class="input-group mb-3">
                                        <input type="text" name="name" class="form-control" required="autofocus" placeholder="{{ trans('global.user_name') }}">
                                        @if($errors->has('name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" class="form-control" required placeholder="{{ trans('global.login_email') }}">
                                        @if($errors->has('email'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
                                        @if($errors->has('password'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                                        @if($errors->has('password_confirmation'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('password_confirmation') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                                            {{ trans('global.register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection