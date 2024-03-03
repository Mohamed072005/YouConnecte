<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    private $like;


    public function __construct(LikeService $likes)
    {
        $this->like = $likes;
    }


    public function store($id)
    {
        if (session('user_id') == null) {
            return redirect()->route('to.login')->with('actionError', 'You should make account befor do this action');
        }

        $resulte = $this->like->store($id);
        if($resulte){
            // return response()->json('add like success');
            return redirect()->route('home');
        }else{
            // return response()->json('remove like success');
            return redirect()->route('home');
        }
    }

    public function getLikes()
    {
        $resulte = $this->like->getLikes();
        return response()->json($resulte);
    }
}
