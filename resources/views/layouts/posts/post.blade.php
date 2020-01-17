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

            <!-- START dropdown-->
            <div class="dropdown float-right">
                <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-camera"></i>
                </button>
                <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="#">Hide post</a>
                    <a class="dropdown-item" href="#">Stop following</a>
                    <a class="dropdown-item" href="#">Report</a>
                </div>
            </div>
            <!--/ dropdown -->
        </div>

        <!-- Post text -->
        <div class="">
            <p class="card-text">{{ $post->post_text }}</p>
        </div>
        <!--/ Post text -->

        <!--/ Post image -->
        @if($post->post_image != NULL)
        <div class="mt-3">
            <img class="card-img-bottom" src="{{ asset('storage/post/'.$post->post_image) }}" alt="Post image">
        </div>
        @endif
        <!--/ Post image -->

        <!-- Likes and comments -->
        <div class="mt-3 border-top border-bottom btn-toolbar">
            <div class="btn-group">
                <button class="btn btn-outline-dark">num of likes</button>
            </div>

            <div class="btn-group">
                <button class="btn btn-outline-dark">num of comments</button>
            </div>
        </div>
        <!-- Likes and comments -->

        <!-- Write a comment -->
        <form role="form" method="POST" action="#" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-2 mt-2">
                <div class="input-group-prepend">
                    <img class="rounded-circle" src="{{ asset('storage/profile/'.auth()->user()->image) }}" style="width:50px; height:50px;" alt="profile picture">
                </div>
                <input type="text" class="form-control ml-1 mt-2" placeholder="Write a comment...">
                <div class="input-group-append">
                    <button class="btn-sm btn-outline-success mt-2 mb-2" type="submit" name="comment">Comment</button>
                </div>
            </div>
        </form>
        <!--/ Write a comment -->

        <!-- Users coments -->
        <div>
            <span class="float-left mr-2">
                <a href=""><img class="rounded-circle" style="width:50px; height:50px;" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/6.jpg" alt="..."></a>
            </span>
            <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>
        </div>
        <!--/ Users coments -->
    </div>
</div>