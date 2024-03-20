<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>codelab Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <style>
        .pagination-wrap {
            text-align: center;
            margin-top: 20px;
        }

        .pagination-wrap .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 0.25rem;
        }

        .pagination-wrap .pagination li {
            display: inline;
            margin-right: 5px;
        }

        .pagination-wrap .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #3498db !important; /* Change this to your desired color */
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination-wrap .page-item.active .page-link {
            z-index: 3;
            color: #fff !important;
            background-color: #cc0c0c !important; /* Change this to your desired color */
            border-color: #3498db !important; /* Change this to your desired color */
        }
        </style>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dripicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>

<!-- header -->
<header class="header-area header-area2">

    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-6">
                        <div class="logo">
                            <a href="/"><img src="/img/logo/logo1.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">

                        <div class="main-menu text-right text-xl-right">

                            <nav id="mobile-menu">
                                <ul>
                                    <li class="sub">
                                        <a href="/">Home</a>

                                    </li>

                                    <li class="sub">
                                        <a href="/travel">Travel</a>

                                    </li>
                                    <li class="sub"><a href="#">Pages</a>
                                        <ul>

                                            <li><a href="/pricing">Pricing</a></li>
                                            <li><a href="/team">Team</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="/shop">Shop</a></li>
                                    <li><a href="/contact-us">Contact Us</a></li>

                                    @auth
                                        <li><a href="/register">welcome</a></li>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button href="" class="btn btn-light">logout</button>
                                            </form>

                                    @else
                                        <li><a href="/register">Register</a></li>
                                        <li><a href="/login">Login</a></li>

                                    @endauth

                                </ul>
                            </nav>
                        </div>

                    </div>

                    <div class="col-xl-2 col-lg-3 d-none d-lg-block mt-20 mb-20">
                        <div class="header-social text-right">
                            <span>

{{--                                <a href="/login" title="Facebook"><i class="fa fa-user"></i></a>--}}
                                <a href="#" class="menu-tigger"><i class="fas fa-search"></i></a>


                               </span>
                            <!--  /social media icon redux -->
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<x-flash />
<!-- header-end -->

{{$slot}}


<!-- footer -->
<footer class="footer-bg footer-p fix">

    <div class="footer-center  pt-90 pb-60">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-xl-3 col-lg-3 col-sm-6">

                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <img src="img/logo/logo1.png" alt="img">
                        </div>
                        <div class="f-contact">
                            <p> Vestibulum accumsan purus tellus. Fusce luctus daferst luctus nibh, at finibus turpis
                                tincidunt sed.</p>
                            <ul>

                                <li><i class="icon fal fa-envelope"></i>
                                    <span>
                                            <a href="mailto:info@thecodelab.com">info@thecodelab.com</a>
                                       <br>
                                       <a href="mailto:help@example.com">help@example.com</a>
                                       </span>
                                </li>


                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Quick Links</h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="blog.html"> Featured Posts</a></li>
                                <li><a href="blog.html"> Top Stories </a></li>
                                <li><a href="blog.html">Featured Videos</a></li>
                                <li><a href="blog.html">Top News</a></li>
                                <li><a href="blog.html">Editor Choice </a></li>
                                <li><a href="faq.html">FAQ </a></li>
                                <li><a href="#">Support </a></li>
                                <li><a href="#">Help </a></li>
                                <li><a href="contact.html">Contact Us </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">

                            <h2>Popular Posts</h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="blog.html">Celebrity News</a></li>
                                <li><a href="blog.html"> Movies</a></li>
                                <li><a href="blog.html"> Travling</a></li>

                                <li><a href="blog.html">Food</a></li>
                                <li><a href="blog.html">History</a></li>
                                <li><a href="blog.html">Music News </a></li>
                                <li><a href="blog.html">Education </a></li>
                                <li><a href="blog.html">Gaming </a></li>
                                <li><a href="blog.html">Life style </a></li>
                                <li><a href="blog.html">Fashion </a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Our Gallery</h2>
                        </div>
                        <div class="f-insta">
                            <ul>
                                <li><a href="img/instagram/f-galler-01.png" class=" popup-image"><img
                                            src="img/instagram/f-galler-01.png" alt="img"></a></li>
                                <li><a href="img/instagram/f-galler-02.png" class=" popup-image"><img
                                            src="img/instagram/f-galler-02.png" alt="img"></a></li>
                                <li><a href="img/instagram/f-galler-03.png" class=" popup-image"><img
                                            src="img/instagram/f-galler-03.png" alt="img"></a></li>
                                <li><a href="img/instagram/f-galler-04.png" class=" popup-image"><img
                                            src="img/instagram/f-galler-04.png" alt="img"></a></li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>
<!-- footer-end -->

<!-- JS here -->
<script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/one-page-nav-min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/ajax-form.js') }}"></script>
<script src="{{ asset('js/paroller.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/js_isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.min.js') }}"></script>
<script src="{{ asset('js/parallax.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('js/parallax-scroll.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/element-in-view.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>


<!-- Add this before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{--sub comment--}}
<script>
    function toggleReplyForm(event, formId) {
        event.preventDefault();
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

</body>

</html>

