<section id="services" class="services-area pt-90 pb-90 fix">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-12">
                    <div class="fp-box wow fadeInUp animated hover-zoomin" data-delay=".4s">
                        <div class="img">
                            @if($post->price)
                                <!-- Display price if post has a price -->
                                <div class="cat">Lock {{$post->price}}$</div>
                            @else
                                <div class="cat">Free</div>
                            @endif
                            <img src="img/blog/lifestyle/lf-1.jpg" alt="icon01">
                        </div>
                        <div class="text">
                            <h5>
                                <!-- Directly link to post -->
                                <a href="/posts/{{$post->slug}}">{{ $post->title }}</a>
                            </h5>
                            <div class="post-tags mt-20">
                                <ul>
                                    <li><a href="#"><span class="icon"><i class="fal fa-user-crown"></i></span> {{$post->user->name}}</a></li>
                                    <li><a href="#"><span class="icon"><i class="fal fa-clock"></i></span> <time>{{$post->created_at->diffForHumans()}}</time></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
