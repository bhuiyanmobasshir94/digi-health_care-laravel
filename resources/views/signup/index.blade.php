@extends('layouts.master')

@section('title')
Sign Up
@endsection

@section('content')
    <div class="text-center">
        <div class="login-form" style="top: 147.5px;">
            <div class="login_header" style="margin-bottom: 30px;">Sign up for Digi Health Care account.</div>
            <form action="{{route('signup.insert')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input  class="form-control" id="username" name="username" placeholder="User Name" type="text" value=""/>
                </div>                       
                <div class="form-group">
                    <input  class="form-control" id="email" name="email" placeholder="Email" type="email" value=""/>
                </div>
                <div class="form-group">
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" value=""/>
                </div>
                <div class="form-group">
                    <input class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" type="password" value=""/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Sign Up">
                </div>
                <div class="login_forgotpassword"><a href="{{route('signin.index')}}">Sign In for Digi Health Care</a></div>
            </form>
            <div class="login_header" style="margin-bottom: 30px;">
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <p class="field-validation-error">{{$err}}</p>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="login_header" style="margin-bottom: 30px;"><p class="field-validation-error">{{session('message')}}</p></div>
    </div>
@endsection

@section('stylesheet')
<style>
.field-validation-error {
    color: red;
}
body {
         margin: 0;
         padding: 0;
         height: 100%;
         background-color: #efefef;
     }
 </style>
@endsection