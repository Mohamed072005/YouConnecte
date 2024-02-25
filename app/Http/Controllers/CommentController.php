<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Models\Post;

class CommentController extends Controller
{
    public function getComments(PostController $post, $id)
    {
        $posts = $post->posts($id);
        $posts = Post::with('user')->find($id);
        
        // dd($posts->user->name);

        $postLikes = $post->postLikes($id);
        // return response()->json($posts);

        $comments = Comment::join('users', 'user_id', '=', 'users.id')
            ->where('comments.post_id', $id)
            ->get(['users.name as user_name', 'users.id as user_id', 'content', 'comments.id']);
        

        return view('comment', compact('posts', 'comments', 'postLikes'));
    }

    public function store(Request $request)
    {

        if (session('user_id') == null) {
            return redirect()->route('to.login');
        }

        $request->validate([
            'content' => 'required'
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => session('user_id'),
            'post_id' => $request->input('post_id')
        ]);

        if ($comment) {
            return redirect()->route('get.comments', $request->input('post_id'));
        } else {
            return response()->json('wrong');
        }
    }
}
