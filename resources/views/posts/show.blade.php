@extends('layouts.app')
@section('pagetitle', 'Posts - Show Post')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd>{{ date('M j, Y', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.edit','Edit', [$post->id], ['class'=>'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
                            {!! Form::submit('Delete',['class'=> 'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Html::linkRoute('posts.index','View All Posts', [],['class'=>'btn btn-default btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection