@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row text-center">
                    <div class="col-md-9 align-self-center">
                        <h2>{{ $user['username'] }}</h2>
                    </div>

                    <div class="col-md-3 p-5">
                        <img src="{{ url($user->image) }}" style="width:120px; height:120px;" class="rounded-lg w-70">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 text-center">
                        <div class="text-center border-top pt-3 pb-2">
                            <h4>{{ __('User Details') }}</h4>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Email address') }}</div>

                                <div>
                                    <label for="email">{{ $user['email'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('First name') }}</div>

                                <div>
                                    <label for="firstname">{{ $user['firstname'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Last name') }}</div>

                                <div>
                                    <label for="lastname">{{ $user['lastname'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center border-top pt-3 pb-2">
                            <h5>{{ __('Address') }}</h5>
                        </div>

                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Country') }}</div>

                                <div>
                                    <label for="country">{{ $user->address['country'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('City') }}</div>

                                <div>
                                    <label for="city">{{ $user->address['city'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Zip') }}</div>

                                @if ($user->address['zip'] == null)
                                <div>
                                    <label for="line_2">{{ __('No zip added') }}</label>
                                </div>
                                @else
                                <div>
                                    <label for="zip">{{ $user->address['zip'] }}</label>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Address line 1') }}</div>
                                <div>
                                    <label for="line_1">{{ $user->address['line_1'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Address line 2') }}</div>

                                @if ($user->address['line_2'] == null)
                                <div>
                                    <label for="line_2">{{ __('No address added') }}</label>
                                </div>
                                @else
                                <div>
                                    <label for="line_2">{{ $user->address['line_2'] }}</label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center col-md-3">
                        <div>
                            <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#profileModal">
                                Edit profile
                            </button>
                        </div>

                        <div>
                            <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#imageModal">
                                Change picture
                            </button>
                        </div>

                        <div>
                            <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#passwordModal">
                                Change password
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ProfileImage Update Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Change profile picture</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="row">
                                        <label for="image" class="col-md-4 col-form-label">Profile image</label>

                                        <input type="file" class="form-control-file" id="image" name="image">

                                        @if ($errors->has('image'))
                                        <strong>{{ $errors->first('image') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update_image_profile" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Password Update Modal -->
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Change password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Current Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password" name="new_password" required>

                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password-comfig" type="password" class="form-control" placeholder="Confirm Password" name="new_password_confirmation" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update_password" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- User Update Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="passwordModalLabel">Edit user details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username">{{ __('Username') }}</label>

                                            <div>
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" id="validationServer02" placeholder="Username" name="username" value="{{ old('username') ?? $user['username'] }}" required autocomplete="username" autofocus>

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
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') ?? $user['email'] }}" required autocomplete="email" autofocus>

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
                                            <label for="firstname">{{ __('First name') }}</label>

                                            <div>
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First name" name="firstname" value="{{ old('firstname') ?? $user['firstname'] }}" required autocomplete="firstname" autofocus>

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
                                                <input id="lastname" value="{{ $user['lastname'] }}" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="First name" name="lastname" value="{{ old('lastname') ?? $user['lastname'] }}" required autocomplete="lastname" autofocus>

                                                @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="update_profile" name="update_profile" class="btn btn-primary">Update profile</button>
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