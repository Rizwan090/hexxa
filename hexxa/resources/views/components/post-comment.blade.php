<div class="single__comment mb-35">
    <div class="comments-avatar">
        <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="">
    </div>
    <div class="comment-text">
        <div class="avatar-name mb-15">
            <h6>{{$comment->name}}</h6>
            <span><time>{{$comment->created_at->diffForHumans()}}</time></span>
            <a href="#" class="comment-reply" onclick="toggleReplyForm(event, 'reply-form-{{$comment->id}}')">
                <i class="fas fa-reply"></i>Reply</a>
        </div>
        <p>{{$comment->body}}</p>

        <form id="reply-form-{{$comment->id}}" action="/comments/{{$comment->id}}/sub-comments" method="POST" class="reply-form" style="display: none;">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comment:</label>
                <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"
                          placeholder="Write your reply here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>

     @foreach($comment->subcomments as $subcomment)

         <x-sub-comment :subcomment="$subcomment" />

        @endforeach

    </div>
</div>


