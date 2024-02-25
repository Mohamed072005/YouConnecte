<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
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

    public function getPosts()
    {

        $posts = Post::join('users', 'user_id', '=', 'users.id')
            ->get(['name', 'content', 'image', 'users.id as user_id', 'posts.id']);

        return view('home', compact('posts'));
        // return response()->json($posts);
        
    }

    public function destroy($id){
        $deletedPost = Post::find($id);
        $deletedPost->delete();
        return redirect()->route('home');
    }

    public function edit($id){
        $editPost = Post::find($id);
        return view('updatePost', compact('editPost'));
    }


    public function update(Request $request, $id){

        $request->validate([
            'content' => 'required',
        ]);

        if($request->hasFile('image_cover')){
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
        // ->offset(3) // Starting position of records
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

    public function search(){
        $search_user= $_GET['search'];
        $results = User::where('name', 'LIKE','%'.$search_user.'%')->get();
        return view('search', compact('results'));
    }
    

}


