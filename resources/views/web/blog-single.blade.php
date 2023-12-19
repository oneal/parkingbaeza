@extends('web.layouts.master')

@section('styles')
@endsection

@section('content')

    <!-- Page Title
============================================= -->
    <section class="page-title bg-transparent">
        <div class="container">
            <div class="page-title-row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('page.index', ['slug' => 'blog']) }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section><!-- .page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">

                <div class="row gx-5 col-mb-80">
                    <!-- Post Content
                    ============================================= -->
                    <main class="postcontent col-lg-9">

                        <div class="single-post mb-0">

                            <!-- Single Post
                            ============================================= -->
                            <div class="entry">

                                <!-- Entry Title
                                ============================================= -->
                                <div class="entry-title">
                                    <h1>{{ $blog->title }}</h1>
                                </div><!-- .entry-title end -->

                                <!-- Entry Meta
                                ============================================= -->
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="uil uil-schedule"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('m/d/Y') }}</li>
                                    </ul>
                                </div><!-- .entry-meta end -->

                                <!-- Entry Image
                                ============================================= -->
                                <div class="entry-image">
                                    <a href="#"><img src="{{ Voyager::image($blog->image) }}" alt="{{ $blog->title }}"></a>
                                </div><!-- .entry-image end -->

                                <!-- Entry Content
                                ============================================= -->
                                <div class="entry-content mt-0">

                                    {!! $blog->body !!}

                                    <!-- Post Single - Share
                                    ============================================= -->
                                    <div class="card border-default my-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="fs-6 fw-semibold mb-0">Share:</h6>
                                                <div class="d-flex">
                                                    <a href="http://www.facebook.com/sharer.php?u={{ route('blogs.blog', ['slug' => $blog->slug]) }}"
                                                       class="social-icon si-small text-white border-transparent rounded-circle bg-facebook"
                                                       title="Facebook" target="_blank">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>

                                                    <a href="https://twitter.com/intent/tweet?text={{$blog->title}}&url={{ route('blogs.blog', ['slug' => $blog->slug]) }}"
                                                       class="social-icon si-small text-white border-transparent rounded-circle bg-twitter"
                                                       title="Twitter" target="_blank">
                                                        <i class="fa-brands fa-twitter"></i>
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>

                                                    <a href="https://api.whatsapp.com/send?text={{$blog->title}} {{ route('blogs.blog', ['slug' => $blog->slug]) }}"
                                                       class="social-icon si-small text-white border-transparent rounded-circle bg-whatsapp"
                                                       title="Whatsapp"target="_blank">
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Post Single - Share End -->

                                </div>
                            </div>

                    </main><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <aside class="sidebar col-lg-3">
                        <div class="sidebar-widgets-wrap">
                            <div class="widget">

                                <div id="canvas-TabContent" class="tab-content">
                                    <h4>Ultimos posts</h4>
                                    <hr>
                                    <div>
                                        @foreach($blogsLatest as $blogLatest)
                                            <div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="{{ route('blogs.blog', ['slug' => $blogLatest->slug]) }}"><img class="rounded-circle"
                                                                                 src="{{ Voyager::image($blogLatest->image) }}"
                                                                                 alt="{{ $blogLatest->title }}"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="{{ route('blogs.blog', ['slug' => $blogLatest->slug]) }}">{{ $blogLatest->title }}</a></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                    </div>
                                </div>

                            </div>

                        </div>
                    </aside><!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->
@endsection


