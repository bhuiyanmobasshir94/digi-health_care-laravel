<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\SignupRequest;

class SignupController extends Controller
{
    public function index(Request $request)
    {
    	return view('signup.index');
    }
    public function insert(SignupRequest $request)
    {
        $id = DB::table('users')->insertGetId(
            ['username' => $request->username, 'email' => $request->email,'password' => $request->password,'user_type' =>'User','status' =>'Disapproved']
        );
        if($id != null){
            return redirect()->route('signin.index');
        }else{
            return redirect()->route('signup.index');
        }
    	
    }
}

