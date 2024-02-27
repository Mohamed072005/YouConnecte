<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        if (session('user_id') == null) {
            return redirect()->route('to.login');
        }

        if($request->input('follower_id') == null){
            return redirect()->route('to.login');
        }
        // dd($request->input('follower_id'));

        $follow = Follow::where('user_id', session('user_id'))->where('follower_id', $request->input('follower_id'))->first();

        if ($follow == null) {
            Follow::create([
                'user_id' => session('user_id'),
                'follower_id' => $request->input('follower_id')
            ]);
            return redirect()->route('home');
        } else {
            $follow->delete();
            return redirect()->route('home');
        }
    }
}
