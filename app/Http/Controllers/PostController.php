<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function store(Request $request)
    {

        if (session('user_id') == null) {
            return redirect()->route('to.login');
        }

        $post = $request->validate([
            'content' => 'required',
        ]);

        if ($post) {
            Post::create([
                'content' => $request->input('content'),
                'user_id' => session('user_id'),
            ]);
            return view('home');
        }
    }

    public function getPosts(){

        $posts = Post::join('users', 'user_id', '=', 'users.id')
                        ->get(['name', 'content']);
        return view('home', compact('posts'));
    }



    public function getUserPosts(){
        $myposts= Post::all();
        return view('profil', compact('myposts'));
        
    }
}
