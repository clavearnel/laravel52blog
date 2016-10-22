@extends('layouts.app')
@section('pagetitle', 'Posts - Create Post')
@section('style')
    {!! Html::style('assets/css/parsley.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
    {!! Html::script('assets/js/tinymce/tinymce.min.js')  !!}
    <script>
        tinymce.init({
            selector: '.body',
            plugins: "codesample",
            toolbar: "newdocument, bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, styleselect, formatselect, fontselect, fontsizeselect, cut, copy, paste, bullist, numlist, outdent, indent, blockquote, undo, redo, removeformat, subscript, superscript codesample"
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Create Post</h1>
            {!! Form::open(array('route'=>'posts.store', 'data-parsley-validate'=>'')) !!}
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255']) !!}
            {{ Form::label('category_id', 'Category')  }}
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            {{ Form::label('tags', 'Tags')  }}
            <select name="tags[]" id="tags" class="form-control select2-multi" required multiple="multiple">
                <option value="">Select</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control body', 'required'=>'']) !!}
            {!! Form::submit('Create Post',['class'=>'btn btn-success', 'style'=>'margin-top:10px;']) !!}
            {!! Form::token() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('assets/js/parsley.min.js')  !!}
    {!! Html::script('assets/js/select2.min.js')  !!}
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
@endsection
