<div class="single__comment children mb-35">
    <div class="comments-avatar">
        <img src="https://i.pravatar.cc/60?u={{$subcomment->user_id}}" alt="">
    </div>
    <div class="comment-text">
        <div class="avatar-name mb-15">
            <h6>Rlex Kelian <i class="fas fa-bookmark"></i></h6>
            <span><time>{{$subcomment->created_at->diffForHumans()}}</time></span>
            <button class="comment-reply"><i class="fas fa-reply"></i>Reply</button>
        </div>

        <p>{{$subcomment->body}}</p>

    </div>
</div>
