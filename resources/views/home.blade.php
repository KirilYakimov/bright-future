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
                                    <textarea id="text" type="text" class="form-control textarea ml-1  @error('post_text') is-invalid @enderror" name="post_text" rows="3" placeholder="What's on your mind?"></textarea>

                                    @error('post_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-row mb-2">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('post_image') is-invalid @enderror" id="image" name="post_image">
                                        <label class="custom-file-label" for="image">Upload image</label>

                                        @error('post_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn btn-primary">
                                        {{ __('Create a post') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Create a post-status -->

                <!-- all users posts -->
                @forelse($posts as $post)
                @include('layouts.posts.post')
                @empty
                <div class="card shadow-lg bg-white mb-3">
                    <div class="card-body text-center">
                        <div class="card-title pt-3 pb-2 mb-2">
                            <h3>There are still no posts yet! </h3>
                        </div>
                    </div>
                </div>
                @endforelse
                <div class="col-12 row d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
                <!-- /all users posts -->
            </div>
        </div>
    </div>
</div>
@endsection