<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignoutController extends Controller
{
    public function index(Request $request)
    {
    	$request->session()->flush();
    	return redirect()->route('signin.index');
    }
}
