<div class="container mb-3">
    <div class="card">
        <div class="card-body">

            <div class="card-title row">

                <div class="">
                    <img alt="profile picture" style="width:50px; height:50px;" class="rounded-lg" src="{{ asset('storage/profile/'.auth()->user()->image) }}">
                </div>

                <div class="pl-2">

                    <h5 class="card-text">{{ $user->username }}</h5>

                    <p class="card-text">
                        <small class="text-muted">{{ date( 'F j, Y, g:i a', strtotime($post->created_at)) }}</small>
                    </p>

                </div>
            </div>

            <p class="card-text">{{ $post->post_text }}</p>

        </div>

        @if($post->post_image != NULL)
        <div>
            <img class="card-img-bottom" src="{{ asset('storage/post/'.$post->post_image) }}" alt="Card image cap">
        </div>
        @endif
    </div>
</div>