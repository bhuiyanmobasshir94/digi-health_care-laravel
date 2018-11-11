<form action="{{route('user.post')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <textarea class="form-control post-box" name="postbox" id="new-post" rows="5" placeholder="What's on your mind?"></textarea>
        <input type="submit" class="btn btn-block btn-primary p-lg-left-right post-button" value="Post">
    </div>
    <input type="hidden" value="{{$user->user_id}}" name="user_id">
    <input type="hidden" value="{{$user->user_type}}" name="user_type">
    <input type="hidden" value="{{$user->username}}" name="username">
</form>


