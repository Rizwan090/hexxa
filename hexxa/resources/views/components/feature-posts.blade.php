<section id="services" class="services-area pt-90 pb-90 fix" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title mb-50">
                    <h2>
                        Featured Posts
                    </h2>

                </div>

            </div>


        </div>
        <div class="row">

            @foreach($posts as $post)

                <div class="col-lg-4 col-md-12">

                    <div class="fp-box wow fadeInUp animated hover-zoomin"  data-delay=".4s">
                        <div class="img ">
                            <div class="cat">LIFE STYLE</div>
                            <img src="img/blog/lifestyle/lf-1.jpg" alt="icon01">
                        </div>
                        <div class="text">
                            <h5><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h5>
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
