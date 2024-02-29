<x-layout>

    <!-- offcanvas-area -->
    <div class="offcanvas-menu">
        <span class="menu-close"><i class="fas fa-times"></i></span>
        <form role="search" method="get" id="searchform"   class="searchform" action="#">
            <input type="text" name="s" id="search" value="" placeholder="Search"  />
            <button><i class="fa fa-search"></i></button>
        </form>


        <div id="cssmenu2" class="menu-one-page-menu-container">
            <ul id="menu-one-page-menu-1" class="menu">
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>+92 323 4044 700</span></a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#howitwork"><span>info@thehexaa.com</span></a></li>
            </ul>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->

    <!-- main-area -->
    <main>

        <!-- slider-area -->
<x-slider :posts="$post->take(4)"/>
        <!-- slider-area-end -->

        <!-- featured-post-area -->
        <x-feature-posts :posts="$post->skip(4)->take(3)" />

        <!-- featured-post-area-end -->

        <!-- feature-vedio-post-area -->
<x-feature-videos />
        <!-- feature-vedio-post-area-end -->

        <!-- top-post-post-area -->
<x-top-post :posts="$post->skip(7)->take(6)" :categories="$categories"/>
        <!-- top-Stories-post-area-end -->


    </main>
    <!-- main-area-end -->

</x-layout>
