<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PostController extends Controller
{

    public function postLikes($id)
    {
        $postLikes = Post::join('likes', 'post_id', '=', 'posts.id')
            ->where('posts.id', $id)
            ->count();
        return $postLikes;
    }


    public function store(Request $request)
    {

        if (session('user_id') == null) {
            return redirect()->route('to.login');
        }

        $request->validate([
            'content' => 'required',
        ]);



        if ($request->hasFile('post_cover')) {
            $imagePath = $request->file('post_cover')->store('uploads', 'public');
        }

        Post::create([
            'content' => $request->input('content'),
            'image' => $imagePath,
            'user_id' => session('user_id'),
        ]);

        return redirect()->route('home');
        // return response()->json('add success');
    }

    public function getPosts(LikeController $like)
    {
        $likes = $like->getLikes();
        $posts = Post::join('users', 'user_id', '=', 'users.id')
            ->get(['name', 'content', 'image', 'users.id as user_id', 'posts.id']);
            // return response()->json($likes);
        return view('home', compact('posts', 'likes'));
        

    }

    public function destroy($id)
    {
        $deletedPost = Post::find($id);
        $deletedPost->delete();
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $editPost = Post::find($id);
        return view('updatePost', compact('editPost'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'content' => 'required',
        ]);

        if ($request->hasFile('image_cover')) {
            $imagePath = $request->file('image_cover')->store('uploads', 'public');
        }


        $updatePost = Post::find($id);

        $updatePost->update([
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('home');
    }



    public function getUserPosts(){
        $session = session('user_id');
        // $myposts= Post:: where('user_id', $session)->get();
        $mypostsinfo = Db::table('users')
        ->join('posts', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name','users.email', 'users.address', 'users.phone', 'users.id')->get();

        $users = DB::table('users')
        ->limit(15) // Number of records to retrieve
        ->inRandomOrder()
        ->get();
        return view('profil', compact('mypostsinfo','users')); 
    }

    public function updateinfo(Request $request, $id){


        $object = User::find($id);
        $object->name = $request->input('name');
        $object->email = $request->input('email');
        $object->address = $request->input('address');
        $object->phone = $request->input('phone');
        // dd($object);

        $object->save();        

        return redirect()->route('profil')
        ->with('success', 'data has been updated successfully');

    }

    // public function search(Request $request){
    //     $results = User::where('name', 'LIKE', '%{$request->search}%')->get();
    //     dd($results);
    //         return view('profil', compact('results'))->with(
    //         ['search' => $request->search])->render();

    // }
    // public function show(Request $request)
    // {
    //     $post = User::findOrFail($request->id);
    //     return view('user.post', compact('post'))->render();
    // }

  


    public function posts($id)
    {
        $posts = Post::join('users', 'user_id', '=', 'users.id')
            ->where('posts.id', $id)
            ->first();

        return $posts;
    }

}


