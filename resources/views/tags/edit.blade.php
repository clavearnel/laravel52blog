@extends('layouts.app')
@section('pagetitle', 'Tags - Edit Tag')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Tag</h1>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn-primary btn-block">Create Tag</a>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::model( $tag, ['route' => ['tags.update', $tag->id], 'method'=> 'PUT']) !!}
            <h2>Edit Tag</h2>
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name',null, ['class'=>'form-control']) }}
            <br>
            {{ Form::submit('Save Changes', ['class'=>'btn btn-success']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection