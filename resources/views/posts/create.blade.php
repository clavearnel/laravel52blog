@extends('layouts.app')
@section('pagetitle', 'Posts - Create Post')
@section('style')
    {!! Html::style('assets/css/parsley.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Create Post</h1>
            {!! Form::open(array('route'=>'posts.store', 'data-parsley-validate'=>'', 'files'=>true )) !!}
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
            {!! Form::label('featured_image', 'Upload Featured Image') !!}

            <div class="input-group">
              <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                </a>
              </span>
                <input id="thumbnail" class="form-control" type="text" name="featured_image">
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">
            <br>
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
    {!! Html::script('assets/js/jquery.colorbox-min.js')  !!}
    {!! Html::script('assets/js/tinymce/tinymce.min.js')  !!}
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script type="text/javascript">
        $('#lfm').filemanager('image');
        $(".select2-multi").select2();

        var editor_config = {
            path_absolute: "/",
            selector: ".body",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern codesample"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media codesample code",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                }
                else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Browse',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection
