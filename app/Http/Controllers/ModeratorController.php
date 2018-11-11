<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\AccountRequest;

class ModeratorController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $posts = Post::orderBy('post_created', 'desc')->get();
        $comments = Comment::orderBy('comment_created', 'desc')->get();
        return view('moderator.index')
        ->with('users', $users)
        ->with('posts', $posts)
        ->with('comments', $comments);
    }
    public function approve(Request $request)
    {
        $done = DB::table('posts') ->where('post_id',$request->post_id)
            ->update(['status' => 'Approved']);
        if($done != null){
            $request->session()->flash('message', 'Post approved');
            return redirect()->route('moderator.index');
        }else{
            $request->session()->flash('message', 'Post couldn\'t approved');
            return redirect()->route('moderator.index');
        }
    }
    public function block(Request $request)
    {
        $done = DB::table('posts') ->where('post_id',$request->post_id)
            ->update(['status' => 'Disapproved']);
        if($done != null){
            $request->session()->flash('message', 'Post blocked');
            return redirect()->route('moderator.index');
        }else{
            $request->session()->flash('message', 'Post couldn\'t blocked');
            return redirect()->route('moderator.index');
        }
    }

}
