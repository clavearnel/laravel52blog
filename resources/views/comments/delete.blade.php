@extends('layouts.app')
@section('pagetitle', 'Comments - Delete Comment')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <p>
                Name: {{ $comment->name }}<br>
                Email: {{ $comment->email }}<br>
                Comment: {{ $comment->comment }}<br>
            </p>
        </div>
        {!! Form::open(['route'=>['comments.destroy', $comment->id],'method'=>'DELETE'])!!}

            {!! Form::submit('Delete Comment',['class'=>'btn btn-danger btn-block']) !!}

        {!! Form::close() !!}
    </div>
@endsection

@section('script')
@endsection