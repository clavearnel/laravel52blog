@extends('layouts.app')
@section('pagetitle', 'Posts - Show Post')
@section('style')
    {!! Html::style('assets/css/parsley.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
    {!! Html::script('assets/js/tinymce/tinymce.min.js')  !!}
    <script>
        tinymce.init({
            selector: '.body',
            extended_valid_elements : 'pre[class],code',
            plugins: 'codesample code',
            toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent codesample code'
        });
    </script>
@endsection
@section('content')
    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update', $post->id],'method'=>'PUT'])!!}
        <div class="col-md-8">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255']) !!}
            {{ Form::label('category_id', 'Category')  }}
            {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'required'=>''] ) }}
            {{ Form::label('tags', 'Tags')  }}
            {{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=> 'multiple'] ) }}
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control body', 'required'=>'']) !!}
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
    {!! Html::script('assets/js/parsley.min.js')  !!}
    {!! Html::script('assets/js/select2.min.js')  !!}
    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({{ $post->tags()->getRelatedIds() }}).trigger('change')
    </script>
@endsection