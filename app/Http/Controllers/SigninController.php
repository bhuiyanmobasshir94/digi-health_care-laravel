<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\SigninRequest;

class SigninController extends Controller
{
    public function index(Request $request)
    {
    	return view('signin.index');
    }
    public function verify(SigninRequest $request)
    {   
        /*$users = User::all();
        $posts = Post::orderBy('post_created', 'desc')->get();
        $comments = Comment::orderBy('comment_created', 'desc')->get();*/
        $user = DB::table('users')
    		->where('email', $request->email)
            ->where('password', $request->password)
            ->where('status','Approved')
            ->first();
        $not_approved = DB::table('users')
        ->where('email', $request->email)
        ->where('password', $request->password)
        ->where('status','Disapproved')
        ->first();

    	if($user != null)
    	{
            $request->session()->put('signedUser', $user);
    		return redirect()->route('user.index');
    	}
    	else if($not_approved != null)
    	{
            $request->session()->flash('message', 'Your account is not being approved by admin yet. Please wait for approval.');
    		return redirect()->route('signin.index');
        }
        else{
            $request->session()->flash('message', 'You are not signed up. Sign Up for Digi Health care');
            return redirect()->route('signin.index');
        }
    }
}
