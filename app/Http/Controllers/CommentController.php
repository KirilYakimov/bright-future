<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $validateData = $request->validate([
            'comment_text' => 'min:5|max:500|required',
        ]);

        $commentData = array_merge($validateData, ['user_id' => auth()->id()]);
        $post->comments()->create($commentData);

        return back()->with('success', 'You have successfully posted a comment!');
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($commentId)
    {
        $comment = Comment::where('id', $commentId)->first();
        
        if ($comment != null) {
            $comment->delete();
            return back()->with('success', 'You have successfully deleted your comment!');
        }

        return back()->with('error', 'You can\'t delete your comment!');
    }
}
