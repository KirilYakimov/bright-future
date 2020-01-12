@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">

                <!-- Create a post/status -->
                <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-body">

                            <div class="card-title">
                                <h3>Create a post</h3>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-md-1">
                                    <img class="rounded-lg" src="{{ asset('storage/profile/'.auth()->user()->image) }}" style="width:50px; height:50px;" alt="profile picture">
                                </div>
                                <div class="col-md-11">
                                    <textarea class="textarea w-100" name="post_text" rows="3" placeholder="What's on your mind?"></textarea>
                                </div>
                            </div>

                            <div class="form-row mb-0">

                                <div class="">
                                    <input type="file" class="form-control-file" id="post_image" name="post_image">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn btn-primary">
                                        {{ __('Create a post') }}
                                    </button>
                                </div>

                            </div>
                        </div>
                </form>
                <!-- /Create a post-status -->

                <!-- all users posts -->

                <!-- /all users posts -->

            </div>
        </div>
    </div>
</div>
@endsection