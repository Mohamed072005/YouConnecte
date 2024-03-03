<?php

namespace App\Services;

use App\Models\Like;
use App\Services\LikeServiceInterface;

class LikeService implements LikeServiceInterface
{
    public function store($id)
    {
        $findLike = Like::where('post_id', $id)->where('user_id', session('user_id'))->first();
        if ($findLike == null) {
            Like::create([
                'post_id' => $id,
                'user_id' => session('user_id')
            ]);
            // return redirect()->route('home');
            return true;
        } else {
            $findLike->delete();
            // return redirect()->route('home');
            return false;
        }
    }
    public function getLikes()
    {
        $likes = Like::all();
        return $likes;
    }
}
