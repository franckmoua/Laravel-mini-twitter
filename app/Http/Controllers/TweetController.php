<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;
class TweetController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'post' => ['required', 'string', 'max:255'],
        
        ]);

        $user = Tweet::create([
            'post' => $request->post,
            'user_id' => $request->user()->id,
           
        ]);

        

        return redirect('/timeline');
    }

    public function getTweets(){
        $tweets = Tweet::orderByDesc('created_at')->paginate(5);
        // dd($tweets);

        $user = User::get();
        return view('timeline')->with('tweets',$tweets)->with('users',$user);
    }

    public function delete($id){
        $delete = Tweet::whereId($id)->delete();

        return redirect('/timeline');
    }


    public function getUserTweets($username){
        $user = User::where('username', $username)->first();

        $tweets = Tweet::where('user_id', $user->id)->get();

        return view('profileTweet')->with('tweets',$tweets)->with('user',$user);
    }
}
