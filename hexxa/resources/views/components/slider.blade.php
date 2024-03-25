

    <section class="courses-area fix"  >
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="featured-post-slider-active">
                        @foreach($posts as $post)
                        <div class="box-slider-post hover-zoomin">
                            <a href="" class="img-s"><img src="img/blog/travel/tr-7.jpg" alt="courses-img1"></a>
                            <div class="text">
                                <div class="post-tags">
                                    <ul>
                                        @if($post->price)
                                            <!-- Display price if post has a price -->
                                            <div class="cat">Lock {{$post->price}}$</div>
                                        @else
                                            <li><a href="#" class="c-btn">Free</a></li>

                                        @endif

                                        <li><a href="#"><span class="icon"><img src="img/icon/ps-1.png" alt="courses-img1"></span> Trending</a></li>
                                    </ul>
                                </div>
                                <h3><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h3>
                                <div class="post-tags mt-20">
                                    <ul>
                                        <li><a href="#"><span class="icon"><i class="fal fa-user-crown"></i></span>{{$post->user->name}}</a></li>
                                        <li><a href="#"><span class="icon"><i class="fal fa-clock"></i></span> <time>{{$post->created_at->diffForHumans()}}</time></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>


            </div>
        </div>
    </section>

