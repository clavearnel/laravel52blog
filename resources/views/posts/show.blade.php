@extends('layouts.app')
@section('pagetitle', 'Posts - Show Post')
@section('style')
    {!! Html::style('assets/js/prismjs/themes/prism-twilight.css') !!}
    {!! Html::script('assets/js/prismjs/prism.js')  !!}

@endsection
@section('content')
    <div class="row">

        <div class="col-md-8">
            <img style="width: 100%;" src="{{ asset('photos/'.$user.'/'.$post->image) }}" alt="">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body  !!} </p>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div class="comments">
                <h3>Comments
                    <small>{{ $post->comments->count() }} total</small>
                </h3>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comments</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td><a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a> <a
                                        href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger"><i
                                            class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd>{{ $post->category->name }}</dd>
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