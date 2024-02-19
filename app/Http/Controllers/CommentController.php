<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComments($id){
        $posts = Post::join('users', 'user_id', '=', 'users.id')
                        ->where('posts.id', $id)
                        ->get(['name', 'user_id', 'posts.id', 'image', 'content']);

                        
        $comments = Comment::join('users', 'user_id', '=', 'users.id')
                            ->where('comments.post_id', $id)
                            ->get(['users.name as user_name', 'users.id as user_id', 'content', 'comments.id']);
        // return response()->json($posts);
        // foreach($posts as $postInfo){
        // }
        
        return view('comment', compact('posts', 'comments'));
    }

    public function store(Request $request){

        if (session('user_id') == null) {
            return redirect()->route('to.login');
        }

        $request->validate([
            'content' => 'required'
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' =>session('user_id'),
            'post_id' =>$request->input('post_id')
        ]);

        if($comment){
            return redirect()->route('get.comments', $request->input('post_id'));
        }else{
            return response()->json('wrong');
        }
    }
}     
