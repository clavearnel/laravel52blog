@extends('layouts.app')
@section('pagetitle', 'Posts - Show Post')
@section('style')

@endsection
@section('content')
    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update', $post->id],'method'=>'PUT'])!!}
        <div class="col-md-8">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255']) !!}
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'required'=>'']) !!}
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
                            {!! Html::linkRoute('posts.show','Cancel', [$post->id], ['class'=>'btn btn-danger btn-block']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection