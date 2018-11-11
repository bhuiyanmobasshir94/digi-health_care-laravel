<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\AccountRequest;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $posts = Post::orderBy('post_created', 'desc')->get();
        $comments = Comment::orderBy('comment_created', 'desc')->get();
        return view('admin.index')
        ->with('users', $users)
        ->with('posts', $posts)
        ->with('comments', $comments);
    }
    public function approve(Request $request)
    {
        $done = DB::table('users') ->where('user_id',$request->user_id)
            ->update(['status' => 'Approved','user_type' => $request->user_type]);
        if($done != null){
            $request->session()->flash('message', 'Account approved');
            return redirect()->route('admin.index');
        }else{
            $request->session()->flash('message', 'Account couldn\'t approved');
            return redirect()->route('admin.index');
        }
    }
    public function block(Request $request)
    {
        $done = DB::table('users') ->where('user_id',$request->user_id)
            ->update(['status' => 'Disapproved']);
        if($done != null){
            $request->session()->flash('message', 'Account blocked');
            return redirect()->route('admin.index');
        }else{
            $request->session()->flash('message', 'Account couldn\'t blocked');
            return redirect()->route('admin.index');
        }
    }

}
