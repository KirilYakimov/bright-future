<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($user)
    {
        $this->middleware(['auth' => 'verified']);
        $user = User::findOrFail($user);
        $posts = Post::whereIn('user_id', $user)->latest()->paginate(5);
        return view('profile.profile', compact('user','posts'));
    }

    public function edit()
    {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->username);
            return view('profile.edit')->withUser($user);
        } else {
            return redirect()->back();
        }
    }

    public function update(User $user)
    {
        //Updates user info
        if (request()->has('update_profile')) {
            $userData = request()->validate([
                'username' => 'required|string|max:255', Rule::unique('users')->ignore($user->id),
                'email' => 'required|email|max:255', Rule::unique('users')->ignore($user->id),
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
            ]);

            auth()->user()->update($userData);
            return back()->with('success', 'You have successfully updated you profile!');
        }

        //update profile picture
        if (request()->has('update_image_profile')) {

            $image_path = request()->file('image');
            $filename = time() . "." . $image_path->getClientOriginalExtension();
            Image::make($image_path)->save(public_path('storage/profile/' . $filename));

            $user = Auth::user();
            $user->image = $filename;
            $user->save();

            return back()->with('success', 'You have successfully updated you profile image!');
        }

        //Updates user password
        if (request()->has('update_password')) {
            $userPassword = request()->validate([
                'password' => 'required|string|between:8,255',
                'new_password' => 'required|string|confirmed|between:8,255|different:password',
            ]);

            if (!Hash::check($userPassword['password'], auth()->user()->password)) {
                return back()->with('error', 'You have entered wrong password');
            } else {
                auth()->user()->update(["password" => Hash::make($userPassword['new_password'])]);
                return back()->with('success', 'Password changed successfully!');
            }
        }
    }
}
