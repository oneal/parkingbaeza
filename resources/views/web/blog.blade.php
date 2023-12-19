@extends('web/layouts/master')

@section('styles')
@endsection

@section('content')
<!-- Page Title
============================================= -->
<section class="page-title bg-transparent">
    <div class="container">
        <div class="page-title-row">

            <div class="page-title-content">
                <h1>{{ $contentPage->title }}</h1>
                <span>Nuestras últimas noticias</span>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $contentPage->title }}</li>
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
            <div class="row">
                <div class="col-12 col-sm-12">
                    {!! $contentPage->body !!}
                </div>
            </div>
            @include('web.partials.page_blocks', ['pageBlocks' => $pageBlocks->where('fixed',0)->sortBy('orden')])
            <!-- Posts
            ============================================= -->
            <div id="posts" class="post-grid row grid-container gutter-30" data-layout="fitRows">

                @foreach($blogs as $blog)
                    <div class="entry col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <a href="{{ Voyager::image($blog->image) }}" data-lightbox="image"><img src="{{ Voyager::image($blog->image) }}" alt="{{$blog->title}}"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="{{ route('blogs.blog', ['slug' => $blog->slug]) }}">{{$blog->title}}</a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="uil uil-schedule"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('m/d/Y') }}</li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{{$blog->excerpt}}</p>
                                <a href="" class="more-link">Leer más</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div><!-- #posts end -->

            <!-- Pagination
            ============================================= -->
            {{ $blogs->links() }}

        </div>
    </div>
</section><!-- #content end -->
@endsection
