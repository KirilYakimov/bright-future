<div class="card shadow-lg bg-white mb-3">
    <div class="card-body">
        <div class="card-title row">

            <div class="">
                <img alt="profile picture" style="width:50px; height:50px;" class="rounded-lg ml-3" src="{{ asset('storage/profile/'.$post->user->image) }}" alt="User">
            </div>

            <div class="pl-2">

                <h5 class="card-title">{{ $post->user->username }}</h5>

                <p class="card-subtitle">
                    <small><span><i class="icon ion-md-time"></i>{{ date( 'F j, Y, g:i a', strtotime($post->created_at)) }}</span></small>
                </p>

            </div>

            @if(($post->user_id == auth()->user()->id) && Route::current()->getName() == 'post.show')
            <div class="ml-3">
                <form method="post" action="{{ route('post.delete', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete post</button>
                </form>
            </div>
            @endif
        </div>

        <!-- Post text -->
        <div class="">
            <p class="card-text">{{ $post->post_text }}</p>
        </div>
        <!--/ Post text -->

        <!--/ Post image -->
        @if($post->post_image != NULL)
        <div class="mt-3">
            <a href="{{ route('post.show', $post->id) }}"><img class="card-img-bottom" src="{{ asset('storage/post/'.$post->post_image) }}" alt="Post image"></a>
        </div>
        @endif
        <!--/ Post image -->

        <!-- Comments number -->
        <div class="mt-3 border-top border-bottom btn-toolbar flex-row-reverse">
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-dark">{{ $post->comments->count() }} comments</a>
            @if(!(Route::current()->getName() == 'post.show'))
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-dark">Comment</a>
            @endif
        </div>
        <!-- Comments -->

        @if(Route::current()->getName() == 'post.show')
        <!-- Write a comment -->
        <form role="form" method="POST" action="{{ route('comment.store', $post->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-2 mt-2">
                <div class="input-group-prepend">
                    <img class="rounded-circle" src="{{ asset('storage/profile/'.auth()->user()->image) }}" style="width:50px; height:50px;" alt="profile picture">
                </div>
                <input type="text" class="form-control ml-1 mt-2" name="comment_text" placeholder="Write a comment...">
                <div class="input-group-append">
                    <button class="btn-sm btn-outline-success mt-2 mb-2" type="submit">Comment</button>
                </div>
            </div>
        </form>
        <!--/ Write a comment -->

        <!-- Users coments -->
        @forelse($post->comments as $comment)
        <div>
            <span class="float-left mr-2">
                <a href=""><img class="rounded-circle" style="width:50px; height:50px;" src="{{ asset('storage/profile/'.$comment->user->image) }}" alt="..."></a>
            </span>
            <blockquote class="blockquote">
                <p class="mb-0"><a href='#'>{{ $comment->user->username }}</a> {{ $comment->comment_text }} </p>
                <footer class="blockquote-footer d-flex flex-row">
                    <div class="mr-2">{{ date( 'F j, Y, g:i a', strtotime($comment->created_at)) }}</div>
                    @if($comment->user_id == auth()->user()->id)
                    <form method="post" action="{{ route('comment.delete', $comment->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                    @endif
                </footer>
            </blockquote>
        </div>
        @empty
        <div class="card shadow-lg bg-white mb-3">
            <div class="card-body text-center">
                <div class="card-title pt-3 pb-2 mb-2">
                    <h3>This post has no comments yet!</h3>
                </div>
            </div>
        </div>
        @endforelse
        <!--/ Users coments -->
        
        @if($post->comments->count() >= 8)
        <div class="col-12 row d-flex justify-content-center">
            {{ $comments->links() }}
        </div>
        @endif
        @endif
    </div>
</div>