<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function index()
    {
        $user = User::all();
        $posts = Post::with('user')->latest()->get(); //->paginate(5);
        return view("home", compact('user', 'posts'));
    }

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
            'post_text' => 'required_without:post_image|nullable|string|min:5',
            'post_image' => 'required_without:post_text|nullable|image'
        ]);

        $post_text = ['post_text' => $request->post_text];

        if ($request->hasFile('post_image')) {
            $image_path = $request->file('post_image');
            $filename = time() . "." . $image_path->getClientOriginalExtension();
            Image::make($image_path)->save(public_path('storage/post/' . $filename));

            $post->post_image = $filename;
            $imageArray = ['post_image' => $filename];

            if (!$request->has('post_text')) {
                auth()->user()->posts()->create($imageArray);
                return back()->with('success', 'You have successfully posted a picture!');
            }
        }

        auth()->user()->posts()->create(array_merge(
            $post_text,
            $imageArray ?? []
        ));

        return back()->with('success', 'You have successfully posted a status!');
    }
}
