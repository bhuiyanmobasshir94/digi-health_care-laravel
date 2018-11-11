<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\ForgetPasswordRequest;

class ForgetPasswordController extends Controller
{
    public function index(Request $request)
    {
    	return view('forgetpassword.index');
    }
    public function update(ForgetPasswordRequest $request)
    {
        $done = DB::table('users') ->where('email',$request->email)
           ->where('password',$request->oldpassword)
           ->update(['password' => $request->newpassword]);
           
        if($done != null){
            return redirect()->route('signin.index');
        }else{
            return redirect()->route('forgetpassword.index');
        }
    	
    }
}
