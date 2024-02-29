@props(['posts','categories'])
<section class="top-store-post-area pt-90 pb-60 fix" style="background: #f3f8fb;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title mb-50">
                            <h2>
                                Top Posts
                            </h2>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="section-title text-right mt-10">
                            <a href="/all-post">See All Posts <i class="fal fa-long-arrow-right"></i></a>
                        </div>

                    </div>

                </div>
                <div class="row">

                    @foreach($posts as $post)

                    <div class="col-lg-6 col-md-12">
                        <div class="tps-box wow fadeInUp animated hover-zoomin mb-30"  data-delay=".4s">
                            <div class="img ">
                                <div class="cat">LIFE STYLE</div>
                                <img src="img/blog/lifestyle/lf-4.jpg" alt="icon01">
                            </div>
                            <div class="text">
                                <h5><a href="blog-details.html">{{$post->title}}</a></h5>
                                <p>{{$post->excerpt}}</p>
                                <div class="post-tags mt-20">
                                    <ul>
                                        <li><a href="#"><span class="icon"><i class="fal fa-user-crown"></i></span>{{$post->user->name}}</a></li>
                                        <li><a href="#"><span class="icon"><i class="fal fa-clock"></i></span> <time>{{$post->created_at->diffForHumans()}}</time></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                    @endforeach

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside class="sidebar-top-post">
                    <section class="subscribe mb-60">
                        <img src="img/icon/email-s.png" alt="email-s"/>
                        <h4>Subscribe Now !</h4>
                        <p>No spam, notifications only about new products, updates</p>
                        <form role="search" method="get" class="search-form" action="#">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                            </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
                    </section>
                    <section id="custom_html-5" class="widget_text widget widget_custom_html mb-30">
                        <h2 class="widget-title">Social Link</h2>
                        <div class="textwidget custom-html-widget">
                            <div class="widget-social">
                                <a href="#"><i class="fab fa-facebook-f"></i> </a>
                                <a href="#"><i class="fab fa-instagram"> </i></a>
                                <a href="#"><i class="fab fa-twitter"></i> </a>
                                <a href="#"><i class="fab fa-pinterest-p"></i> </a>
                                <a href="#"><i class="fab fa-linkedin"></i> </a>
                                <a href="#"><i class="fab fa-youtube"></i> </a>
                            </div>
                        </div>
                    </section>

                    <section class="tags-store mb-30">
                        <h2>Tags</h2>
                        @foreach($categories as $category)
                            <a href="/category/{{$category->slug}}">{{$category->title}}</a>
                        @endforeach
                    </section>


                </aside>

            </div>
        </div>
    </div>
</section>
