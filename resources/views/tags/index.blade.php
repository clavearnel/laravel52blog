@extends('layouts.app')
@section('pagetitle', 'Categories - Show All Categories')
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
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
            {{ $tags->nextPageUrl() }}
            {{ $tags->previousPageUrl() }}
        </div>
        <div class="col-md-6">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method'=> 'POST']) !!}

                <h2>New Tag</h2>
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name',null, ['class'=>'form-control']) }}
                <br>
                {{ Form::submit('Create New Tag', ['class'=>'btn btn-success']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection