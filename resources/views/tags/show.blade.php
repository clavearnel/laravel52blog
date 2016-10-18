@extends('layouts.app')
@section('pagetitle', "$tag->name Tag")
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>{{ $tag->name }} Tag
                <small>{{ $tag->post()->count() }} Post</small>
            </h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block">Edit Tag</a>
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
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tag->post as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
@endsection