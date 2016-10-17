@extends('index')

@section('pagetitle', 'Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/default-theme.css') }}">
@endsection
@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($posts as $post)
                <div class="post-preview">

                    <a href="/post/{{ $post->id }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ substr($post->body , 0, 50)}} {{ strlen($post->body) > 50 ? "..." : "" }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                </div>
                <hr>
        @endforeach
        <!-- Pager -->
            <div class="row">
                <div class="col-md-6 pager">
                    <a href="{{ $posts->previousPageUrl() }}">&leftarrow; Newer Posts</a>
                </div>
                <div class="col-md-6 col-md-offset-2 pager">
                    <a href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')