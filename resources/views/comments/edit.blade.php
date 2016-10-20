@extends('layouts.app')
@section('pagetitle', 'Comments - Edit Comment')
@section('style')

@endsection
@section('content')
    <div class="row">
        {!! Form::model($comment, ['route'=>['comments.update', $comment->id],'method'=>'PUT'])!!}
        <div class="col-md-8">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required'=>'', 'disabled'=>'disabled']) !!}
            {{ Form::label('email', 'Email')  }}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
            {{ Form::label('comment', 'Comment')  }}
            {!! Form::textarea('comment', null, ['class'=>'form-control']) !!}
            <br>
            {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
@endsection