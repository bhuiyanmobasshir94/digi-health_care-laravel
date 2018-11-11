<article class="post" data-postid="{{ $post->post_id }}">
   <div class="border" style="padding: 20px !important;">
   <h4>{{ $post->post_body }}</h4>
   <h6>Posted by {{ $post->posted_username }} on {{ $post->post_created }}</h6>
<!--@if(session('signedUser')->user_id == $post->posted_user_id)
    <a href="{{route('post.edit')}}" class="edit">Edit</a> |
    <a href="{{route('post.delete',[$post->post_id])}}">Delete</a>
    @endif-->
   </div>
   <div class="border">
      <div class="form-group row">
         <div class="col-md-7">
            <form action="{{route('moderator.approve')}}" method="post">
              {{csrf_field()}}
              <input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Approve">
              <input type="hidden" value="{{$post->post_id }}" name="post_id">
            </form> 
         </div>
         <div class="col-md-5">
            <form action="{{route('moderator.block')}}" method="post">
              {{csrf_field()}}
              <input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Block">
              <input type="hidden" value="{{$post->post_id }}" name="post_id">
            </form>     
         </div>
      </div>   
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