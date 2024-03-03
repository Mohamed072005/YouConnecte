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
        if (session('user_id') == null) {
            return redirect()->route('to.login')->with('loginError', 'You should make account befor do this action');
        }

        $likes = $like->getLikes();
        $posts = Post::join('users', 'user_id', '=', 'users.id')
            ->get(['name', 'content', 'image', 'users.id as user_id', 'posts.id']);
        // return response()->json($likes);
        return view('home', compact('posts', 'likes'));
    }
    //delete method working both in home and profil
    public function destroy($id)
    {
        $deletedPost = Post::find($id);
        $deletedPost->delete();
        return redirect()->back();
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

        return redirect()->route('profil');
    }




    //this function brings all the post of the user + the random users as suggestions +info of the user
    public function getUserPosts()
    {
        $userid = session('user_id');
        $mypostsinfo = Db::table('posts')
            ->where('posts.user_id', $userid)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.content', 'posts.image', 'posts.id as postid', 'users.name', 'users.email', 'users.address', 'users.phone', 'users.id as hisid')->get();

        // dd($mypostsinfo);
        $userinfo = DB::table('users')
            ->where('id', $userid)->first();
        // dd($userinfo);


        $users = DB::table('users')
            ->limit(15)
            ->inRandomOrder()
            ->get();
        return view('profil', compact('mypostsinfo', 'users', 'userinfo'));
    }


    public function updateinfo(Request $request, $id)
    {
        $object = User::find($id);
        $object->name = $request->input('name');
        $object->email = $request->input('email');
        $object->address = $request->input('address');
        $object->phone = $request->input('phone');
        // dd($object);
        $object->save();
        return redirect()->route('profil');
    }

    //update post in profil
    public function updatepost(Request $request, $id)
    {
        $objectpost = Post::find($id);

        if ($request->hasFile('image_cover')) {
            $imagePath = $request->file('image_cover')->store('uploads', 'public');
        }

        $objectpost->content = $request->input('content');
        $objectpost->image = $request->input('image_cover');
        $objectpost->save();
        return redirect()->route('profil');
    }

    public function addPostView()
    {
        return view('AddPost');
    }

    public function addNewPost(Request $request)
    {
        $object = new Post;
        $object->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }
        // $imagePath= $request>file('image')->store('uploads', 'public');
        $object->image = $imagePath;
        $object->user_id = session('user_id');
        // dd($object->image);
        $object->save();
        return redirect()->route('profil');
    }

    public function deleteAccount()
    {
        $userid = session('user_id');
        $user = User::find($userid);
        $user->delete();
        return redirect()->route('to.login');
    }

    //this function is used for seraching
    public function search()
    {
        $search_user = $_GET['search'];
        $results = User::where('name', 'LIKE', '%' . $search_user . '%')->get();
        return view('search', compact('results'));
    }





    public function posts($id)
    {
        $posts = Post::join('users', 'user_id', '=', 'users.id')
            ->where('posts.id', $id)
            ->first();

        return $posts;
    }
}
