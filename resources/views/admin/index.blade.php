@extends('layouts.master')

@section('title')
Dashboard - Admin Panel
@endsection

@section('header')
@include('includes.header')
@endsection

@section('content')
<div class="login_header" style="margin-bottom: 10px;">
   <p class="has-success">{{session('message')}}</p>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="row">
           <div class="col-md-6 col-sm-12">
                <div class="panel-body">
                <h4 class="header_other">Approved Users</h4>                                   
                    <div class="border preview">
                        <div class="border">
                        @foreach($users as $user)
                        @if($user->status == 'Approved')
                        <div class="border" style="margin: 10px !important;">
                         <h4>{{$user->username}}</h4>
                          <h6>{{$user->user_type}}</h6>
                          @include('includes.ad-user')
                        </div>
                        @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel-body"> 
                    <h4 class="header_other">Waiting For Approval</h4>                                  
                    <div class="border preview">
                        <div class="border">
                        @foreach($users as $user)
                        @if($user->status == 'Disapproved')
                        <div class="border" style="margin: 10px !important;">
                        <h4>{{$user->username}}</h4>
                        <h6>{{$user->user_type}}</h6>
                        @include('includes.ad-user')
                        </div>
                        @endif
                        @endforeach
                        </div>
                    </div>
                </div>
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