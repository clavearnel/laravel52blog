@extends('layouts.app')
@section('pagetitle', 'Categories - Show All Categories')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Categories</h1>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn-primary btn-block">Create Post</a>
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
            {{ $categories->nextPageUrl() }}
            {{ $categories->previousPageUrl() }}
        </div>
        <div class="col-md-6">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method'=> 'POST']) !!}

                <h2>New Category</h2>
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name',null, ['class'=>'form-control']) }}
                <br>
                {{ Form::submit('Create New Category', ['class'=>'btn btn-success']) }}

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