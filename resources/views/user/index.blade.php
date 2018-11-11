@extends('layouts.master')

@section('title')
Dashboard - Post Feed
@endsection

@section('header')
@include('includes.header')
@endsection

@section('content')
</br>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="panel-body">                                   
            <div class="border preview">
                <div class="border">
                   @include('includes.post-box')
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="panel-body">                                   
            <div class="border preview">
                <div class="border">
                   <div class="row">
                      <div class="col-md-4">
                      @if($user->image != null)
                           <div style="background-image: url({{$url}}{{$user->image }});border-radius:32%;border: 2px solid #0c4da2;height: 130px;width: 130px;"></div>
                      @else   
                           <div style="background-image: url({{ asset('images/avatar.png')}});border-radius:32%;border: 2px solid #0c4da2;height: 130px;width: 130px;"></div>
                      @endif
                      </div>
                      <div class="col-md-offset-6">
                          </br></br>
                          <h1 class="header_other">{{$user->user_type}}</h1>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login_header" style="margin-bottom: 10px;">
   <p class="has-success">{{session('message')}}</p>
   @if($errors->any())
    @foreach($errors->all() as $err)
        <p class="field-validation-error">{{$err}}</p>
    @endforeach
    @endif
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="row">
           <div class="col-md-8 col-sm-12">
                <div class="panel-body"> 
                <h4 class="header_other">Posts</h4>                                  
                    <div class="border preview">
                        <div class="border">
                        @foreach($posts as $post)
                        @if($post->status == 'Approved')
                        <div class="border" style="margin: 10px !important;padding: 20px !important;">
                        @include('includes.post-block')
                        </div>
                        @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="panel-body">
                <h4 class="header_other">Users</h4>                                   
                    <div class="border preview">
                        <div class="border">
                        @foreach($users as $user_entity)
                        @if($user_entity->status == 'Approved')
                           <div class="border">
                              <div class="row">
                                    <div class="col-md-4">
                                    <br>
                                    @if($user_entity->image != null)
                                    <div style="background-image: url({{$url}}{{$user_entity->image }});border-radius:50%;border: 2px solid #0c4da2;height: 60px;width: 60px;"></div>
                                    @else   
                                    <div style="background-image: url({{ asset('images/avatar-small.png')}});border-radius:50%;border: 2px solid #0c4da2;height: 60px;width: 60px;"></div>
                                    @endif
                                    </div>
                                    <div class="col-md-8">
                                        <h4>{{$user_entity->username}}</h4>
                                        <h5>{{$user_entity->user_type}}</h5>
                                        <h6>{{$user_entity->email}}</h6>
                                    </div>
                              </div>
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
@include('includes.modal')
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