<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function create()
    {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->username);
            return view('home')->withUser($user);
        } else {
            return redirect()->back();
        }
    }
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'post_text' => 'string|min:5',
            'post_image' => 'image',
        ]);
    
        $post_text = ['post_text' => $request->post_text];

        if ($request->has('post_image')) {
            $image_path = $request->file('post_image');
            $filename = time() . "." . $image_path->getClientOriginalExtension();
            Image::make($image_path)->save(public_path('storage/post/' . $filename));

            $post->post_image = $filename;
            $imageArray = ['post_image' => $filename];
        }
    
        auth()->user()->posts()->create(array_merge(
            $post_text,
            $imageArray ?? []
        ));

        return back()->with('success', 'You have successfully posted a status!');
    }
}
