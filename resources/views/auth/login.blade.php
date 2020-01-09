@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-center mt-4">
                        <h1>{{ __('Sign In') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row text-right">
                                <div class="col-md-6 offset-md-3">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3 text-center">
                                    <button type="submit" class="col-md-4 btn btn-primary btn-lg">
                                        {{ __('Sign In') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-md-12 text-center">
                                    <label for="country">Dont have an account?</label>
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-md-12 text-center">
                                    <a type="button" class="btn btn-primary" href="{{ route('register') }}">{{ __('Sign Up Now') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection