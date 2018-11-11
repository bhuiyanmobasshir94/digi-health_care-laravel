<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests\AccountRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = DB::table('users')
        ->where('user_id', $request->session()->get('signedUser')->user_id)
        ->first();
        $url = asset('images').'/';
        $image = $url.$user->image;
        $users = User::all();
        $posts = Post::orderBy('post_created', 'desc')->get();
        $comments = Comment::orderBy('comment_created', 'desc')->get();
        return view('user.index')
        ->with('url',$url)
        ->with('user',$user)
        ->with('users', $users)
        ->with('posts', $posts)
        ->with('comments', $comments);
    }
    public function post(Request $request)
    {
       Validator::make($request->all(), [
            'postbox' => 'bail|required|max:1000'
        ])->validate();
        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d H:i:s');
        $id = DB::table('posts')->insertGetId(
            ['posted_user_type' => $request->user_type, 'posted_user_id' => $request->user_id,'posted_username' => $request->username,'post_body' => $request->postbox,'post_created' =>$date,'status' =>'Disapproved']
        );
        if($id != null){
            $request->session()->flash('message','Post created successfully.');
            return redirect()->route('user.index');
        }else{
            $request->session()->flash('message','Couldn\'t create the post.');
            return redirect()->route('user.index');
        }
    }
    public function comment(Request $request)
    {
       Validator::make($request->all(), [
            'comment_body' => 'bail|required|max:1000'
        ])->validate();
        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d H:i:s');
        $id = DB::table('comments')->insertGetId(
            ['commented_user_id' => $request->user_id, 'commented_post_id' => $request->post_id,'commented_username' => $request->username,'comment_body' => $request->comment_body,'comment_created' =>$date]
        );
        if($id != null){
            $request->session()->flash('message','Commented successfully.');
            return redirect()->route('user.index');
        }else{
            $request->session()->flash('message','Couldn\'t commented to the post.');
            return redirect()->route('user.index');
        }
    }
    public function profile(Request $request)
    {
    	return view('user.profile');
    }
    public function profileupdate(Request $request)
    {
        if($request->hasFile('pic'))
    	{
            $file = $request->file('pic');
            $file_size = $file->getSize();
            if($file_size > 4096)
            {
                $request->session()->flash('message','Image size is larger than expected. Please upload less than 4kb.');
                return redirect()->route('user.profile');
            }
    		$file->move('images', $file->getClientOriginalName());
    	}
    	else
    	{
    		echo 'Error uploading file';
        }
        $image = $file->getClientOriginalName();
        $done = DB::table('users') ->where('user_id',$request->user_id)
        ->update(['username' => $request->username,'email' => $request->email,'image' => $image]);
        if($done != null){
            $request->session()->flash('message','Account updated.');
            return redirect()->route('user.profile');
        }else{
            $request->session()->flash('message','Account couldn\'t updated.');
            return redirect()->route('user.profile');
        }
    }

}
