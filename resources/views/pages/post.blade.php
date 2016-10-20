@extends('index')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('pagetitle', "$titleTag")
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2><span class="fa fa-comment"></span> {{ $post->comments->count() }}  Comments</h2>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                          <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50" }}" class="author-images" alt="">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route'=> ['comments.store', $post->id], 'method'=>'POST']) !!}
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-6">
                {{ Form::label('email', 'Email')  }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ Form::label('comment', 'Comment')  }}
                {{ Form::text('comment', null, ['class' => 'form-control']) }}
                <br>
                {{ Form::submit('Add Comment', ['class'=> 'btn btn-success']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')