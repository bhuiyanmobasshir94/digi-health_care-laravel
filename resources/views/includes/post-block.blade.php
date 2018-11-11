<article class="post" data-postid="{{ $post->post_id }}">
   <div class="border" style="padding: 20px !important;">
   <h4>{{ $post->post_body }}</h4>
   <h6>Posted by {{ $post->posted_username }} on {{ $post->post_created }}</h6>
    @if($user->user_id == $post->posted_user_id)
    <a href="{{route('post.edit')}}" class="edit">Edit</a> |
    <a href="{{route('post.delete',[$post->post_id])}}">Delete</a>
    @endif
   </div>
   <div class="border">
        <form action="{{route('user.comment')}}" method="post">
            {{csrf_field()}}
            <div class="form-group row">
            <div class="col-md-7">
                <textarea class="form-control" name="comment_body" rows="2" placeholder="Your comment!"></textarea>
            </div>
            <div class="col-md-5">
                <input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Comment">
            </div>
            </div>
    <input type="hidden" value="{{$post->post_id }}" name="post_id">
    <input type="hidden" value="{{$user->user_id}}" name="user_id">
    <input type="hidden" value="{{$user->username}}" name="username">
        </form> 
    </div>
    @foreach($comments as $comment)
        @if($comment->commented_post_id == $post->post_id)
        <article class="post border" data-postid="{{ $comment->comment_id }}">
            <h4>{{ $comment->comment_body }}</h4>
            <h6>Commented by {{ $comment->commented_username }} on {{ $comment->comment_created }}</h6>
        </article>
        @endif
    @endforeach                    
</article>