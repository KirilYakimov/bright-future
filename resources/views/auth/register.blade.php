@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="text-center pt-3 pb-2 mb-2">
                        <h1>{{ __('Fill in the registration form to proceed to BrightF') }}</h1>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="font-weight-bold pb-1 mb-2">{{ __('Create your account') }}</div>

                            <select name="organizer" class="custom-select mb-3" id="organizer" required>
                                <option value="" disabled selected hidden>Account Type</option>
                                <option value="false">Client</option>
                                <option value="true">Organizer</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="username">{{ __('Username') }}</label>

                                <div>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" id="validationServer02" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">{{ __('Email address') }}</label>

                                <div>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="password">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password-confirm">{{ __('Confirm password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname">{{ __('First name') }}</label>

                                <div>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastname">{{ __('Last name') }}</label>

                                <div>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="First name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Sign Up') }}
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