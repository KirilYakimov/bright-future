@extends('layouts.app')

@section('title', 'Forgot-password')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="text-center pt-3 pb-2 mb-3">
                            <h1>{{ __('Forgot your password ?') }}</h1>
                        </div>

                        <div class="col-md-6 mb-3 offset-md-3 mb-3">
                            Don't worry. Resetting your password is easy, just tell us the email address
                            you registered with and we'll email instructions on how to reset your password.
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-6 mb-3 offset-md-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Submit') }}
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