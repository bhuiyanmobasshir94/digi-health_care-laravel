<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function edit(Request $request)
    {
    }
    public function update(Request $request)
    {
    }
    public function delete(Request $request,$id)
    {
       $done = DB::table('posts')->where('post_id', '=', $id)->delete();
       if($done != null)
       {
        $request->session()->flash('message', 'Post deleted successfully');
        return redirect()->route('user.index');

       }else{
        $request->session()->flash('message', 'Couldn\'t delete the post');
        return redirect()->route('user.index');
       }
    }
}
