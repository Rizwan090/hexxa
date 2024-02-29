<x-layout>

    <section class="breadcrumb-area d-flex align-items-center mb-5" style="background-image:url(img/testimonial/test-bg.png)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>All Posts</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-6 col-md-12">
                        <div class="tps-box wow fadeInUp animated hover-zoomin mb-30" data-delay=".4s">
                            <div class="img">
                                <div class="cat">LIFE STYLE</div>
                                <img src="img/blog/lifestyle/lf-4.jpg" alt="icon01" class="img-fluid">
                            </div>
                            <div class="text">
                                <h5><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h5>
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

    <div class="pagination-wrap">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">

                {{-- Previous Page Link --}}
                <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $posts->previousPageUrl() }}" class="page-link" aria-label="Previous">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <li class="page-item {{ $i === $posts->currentPage() ? 'active' : '' }}">
                        <a href="{{ $posts->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next Page Link --}}
                <li class="page-item {{ !$posts->hasMorePages() ? 'disabled' : '' }}">
                    <a href="{{ $posts->nextPageUrl() }}" class="page-link" aria-label="Next">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</x-layout>
