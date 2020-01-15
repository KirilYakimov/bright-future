@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row text-center">
                <div class="col-md-3 p-5">
                    <img src="{{ asset('storage/profile/'.$user->image) }}" style="width:120px; height:120px;" class="rounded-lg w-70">
                </div>
                <div class="col-md-9 align-self-center">
                    <h2>{{ $user['username'] }}'s profile</h2>
                </div>
            </div>

            <div class="row">

                <!-- User update/info -->
                <div class="text-center col-md-3 mb-3">
                    <div>
                        <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#followModal">
                            Follow
                        </button>
                    </div>

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

                    <div class="text-center">
                        <div class="text-center border-top pt-3 pb-2">
                            <h4>{{ __('User Details') }}</h4>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <div class="font-weight-bold pb-1">{{ __('Email address') }}</div>

                                <div>
                                    <label class="text-wrap" for="email">{{ $user['email'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <div class="font-weight-bold pb-1">{{ __('First name') }}</div>

                                <div>
                                    <label class="text-wrap" for="lastname">{{ $user['firstname'] }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <div class="font-weight-bold pb-1">{{ __('Last name') }}</div>

                                <div>
                                    <label class="text-wrap" for="lastname">{{ $user['lastname'] }}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /User update/info -->

                <!-- User posts -->
                <div class="col-md-9">
                    @foreach($user->posts as $post)
                    @include('layouts.posts.post')
                    @endforeach
                </div>

                <!-- /User posts -->


                <!-- Profile update modals -->
                @include('layouts.modals.profile_image')
                @include('layouts.modals.profile_password')
                @include('layouts.modals.profile_update')
                <!-- /Profile update modals -->
            </div>
        </div>
    </div>
    @endsection