

    <div class="single__comment mb-35">
        <div class="comments-avatar">
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="">
        </div>
        <div class="comment-text">
            <div class="avatar-name mb-15">
                <h6>{{$comment->name}}</h6>
                <span><time>{{$comment->created_at->diffForHumans()}}</time></span>
                <a href="#" class="comment-reply"><i class="fas fa-reply"></i>Reply</a>
            </div>
            <p>{{$comment->body}}</p>
        </div>
    </div>

</div>
