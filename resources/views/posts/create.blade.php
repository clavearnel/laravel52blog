@extends('layouts.app')
@section('pagetitle', 'Posts - Create Post')
@section('style')
    {!! Html::style('assets/css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Create Post</h1>
            {!! Form::open(array('route'=>'posts.store', 'data-parsley-validate'=>'')) !!}
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255']) !!}
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'required'=>'']) !!}
            {!! Form::submit('Create Post',['class'=>'btn btn-success', 'style'=>'margin-top:10px;']) !!}
            {!! Form::token() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('assets/js/parsley.min.js')  !!}
@endsection