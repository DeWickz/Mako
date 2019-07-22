@extends('layouts.appss')
@section('content')
<title>Register</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="user_firstname" type="text" class="form-control @error('user_firstname') is-invalid @enderror" name="user_firstname" value="{{ old('user_firstname') }}" required autocomplete="user_firstname" autofocus>

                                @error('user_firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="user_lastname" type="text" class="form-control @error('user_lastname') is-invalid @enderror" name="user_lastname" value="{{ old('user_lastname') }}" required autocomplete="user_lastname" autofocus>

                                @error('user_lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_LineUID" class="col-md-4 col-form-label text-md-right">{{ __('Line ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_LineUID" type="text" class="form-control @error('user_LineUID') is-invalid @enderror" name="user_LineUID" value="{{ old('user_LineUID') }}" required autocomplete="user_LineUID" autofocus>

                                @error('user_LineUID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile phone') }}</label>

                            <div class="col-md-6">
                                <input id="user_mobile" type="text" class="form-control @error('user_mobile') is-invalid @enderror" name="user_mobile" value="{{ old('user_mobile') }}" required autocomplete="user_mobile" autofocus>

                                @error('user_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_citizenID" class="col-md-4 col-form-label text-md-right">{{ __('Citizen ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_citizenID" type="text" class="form-control @error('user_citizenID') is-invalid @enderror" name="user_citizenID" value="{{ old('user_citizenID') }}" required autocomplete="user_citizenID" autofocus>

                                @error('user_citizenID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
