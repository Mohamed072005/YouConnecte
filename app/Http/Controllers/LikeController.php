<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($id)
    {
        if (session('user_id') == null) {
            return redirect()->route('to.login')->with('actionError', 'You should make account befor do this action');
        }

        $findLike = Like::where('post_id' ,$id)->where('user_id', session('user_id'))->first();
        if ($findLike == null) {
            Like::create([
                'post_id' => $id,
                'user_id' => session('user_id')
            ]);
            return redirect()->route('home');
        } else {
            $findLike->delete();
            return redirect()->route('home');
        }
    }

    public function getLikes()
    {
        $likes = Like::all();
        return $likes;
    }
}
