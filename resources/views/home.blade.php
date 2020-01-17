@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">

                <!-- Create a post/status -->
                <div class="mb-3">

                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-body">

                                <div class="card-title">
                                    <h3>Create a post</h3>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <img class="rounded-lg" src="{{ asset('storage/profile/'.auth()->user()->image) }}" style="width:50px; height:50px;" alt="profile picture">
                                    </div>
                                    <textarea id="text" type="text" class="form-control textarea ml-1" name="post_text" rows="3" placeholder="What's on your mind?"></textarea>
                                </div>


                                <div class="form-row mb-0 justify-content-between">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="post_image">
                                        <label class="custom-file-label" for="image">Upload image</label>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn btn-primary">
                                            {{ __('Create a post') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Create a post-status -->

                <!-- all users posts -->
                @foreach($posts as $post)
                @include('layouts.posts.post')
                @endforeach
                <!-- /all users posts -->
            </div>
        </div>
    </div>
</div>
@endsection