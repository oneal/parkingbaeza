<header id="header" @if($home)class="full-header transparent-header" data-sticky-class="not-dark" @else class="full-header" @endif>
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('home.index') }}">
                        <img class="logo-default" srcset="{{ Voyager::image(setting('site.logo'))}}, {{ Voyager::image(setting('site.logo_2x'))}}" src="{{ Voyager::image(setting('site.logo_2x'))}}" alt="{{ setting('site.title') }}">
                        <img class="logo-dark" srcset="{{ Voyager::image(setting('site.logo_dark'))}}, {{ Voyager::image(setting('site.logo_dark_2x'))}} 2x" src="{{ Voyager::image(setting('site.logo_dark_2x'))}}" alt="{{ setting('site.title') }}">
                    </a>
                </div><!-- #logo end -->

                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                @if(getPages()->count() > 0)
                    <!-- Primary Navigation
                    ============================================= -->
                    <nav class="primary-menu">

                        <ul class="menu-container">
                            @foreach(getPages() as $page)
                                @if($page->slug == 'inicio')
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ route('home.index') }}"><div>Inicio</div></a>
                                    </li>
                                @else
                                    @if($page->slug != 'blog')
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ route('page.index', ['slug' => $page->slug]) }}"><div>{{$page->title}}</div></a>
                                        </li>
                                    @elseif($page->slug == 'blog' && countPosts() > 0)
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ route('page.index', ['slug' => $page->slug]) }}"><div>{{$page->title}}</div></a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </nav><!-- #primary-menu end -->
                @endif

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
