@extends('layouts.master')

@section('title')
Dashboard - Profile
@endsection

@section('header')
@include('includes.header')
@endsection

@section('content')
</br>
<div class="login_header" style="margin-bottom: 10px;">
   <p class="has-success">{{session('message')}}</p>
</div>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="panel-body">                                   
            <div class="border preview">
                <div class="border">
                   <form action="{{route('user.profileupdate')}}" method="post" enctype="multipart/form-data">
                   {{csrf_field()}}
                   <table>
                   <tr class="form-group">
                       <td><h2 class="header_other">User Name:</h2></td><td><input class="form-control" type="text" name="username" value="{{session('signedUser')->username}}"></td>
                   </tr>
                   <tr class="form-group">
                       <td><h2 class="header_other">Email:</h2></td><td><input class="form-control" type="email" name="email" value="{{session('signedUser')->email}}"></td>
                   </tr>
                   <tr class="form-group">
                       <td><h2 class="header_other">Upload Image:</h2></td>
                       <td><input type="file" name="pic"></td>
                       <td><span class="has-success login_header">Max upload size is 4kb. Convert image pixel to 130*130<a href="https://www.imgonline.com.ua/eng/resize-image.php" target="_blank"> from here</a></span></td>
                   </tr>
                   <tr class="form-group">
                       <td></td>
                       <input type="hidden" value="{{session('signedUser')->user_id}}" name="user_id">
                       <td><input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Submit"></td>
                       <td></td>
                   </tr>
                   </table>
                   </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection


@section('stylesheet')
<style>
.drawer-controls {
            padding-top: 10px;
        }
.header{        font-size: 37px !important;       
                font-weight: 900;
                color: #0c4da2;
}
.header_other{  font-size: 26px !important;       
                font-weight: 900;
                color: #0c4da2;
}
.post-box{margin: 9px !important; padding: 12px !important;font-size: 22px !important;}
.post-button{width: 50% !important;margin-left: 9px !important;}
.field-validation-error{ color: red;}
.has-success{ color: green;}
</style>
@endsection