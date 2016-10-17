@extends('index')

@section('pagetitle', 'Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/default-theme.css') }}">
@endsection
@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('{{ asset('assets/img/post-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        {{-- <h2 class="subheading">Problems look mighty small from 150 miles up</h2>--}}
                        <span class="meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <article>
                {{ $post->body }}
            </article>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>
@endsection

@section('scripts')