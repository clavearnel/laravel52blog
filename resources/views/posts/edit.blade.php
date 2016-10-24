@extends('layouts.app')
@section('pagetitle', 'Posts - Show Post')
@section('style')
    {!! Html::style('assets/css/parsley.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
    {!! Html::style('assets/css/colorbox/colorbox.css') !!}

@endsection
@section('content')
    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update', $post->id],'method'=>'PUT', 'files'=>true]  )  !!}
        <div class="col-md-8">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255']) !!}
            {{ Form::label('category_id', 'Category')  }}
            {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'required'=>''] ) }}
            {{ Form::label('tags', 'Tags')  }}
            {{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=> 'multiple'] ) }}
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
            <img src="{{ asset('photos/'.$user.'/'.$post->image) }}" alt="" style="width:400px">
            <br>
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
    {!! Html::script('assets/js/jquery.colorbox-min.js')  !!}
    {!! Html::script('assets/js/tinymce/tinymce.min.js')  !!}
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script type="text/javascript">
        $('#lfm').filemanager('image');
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({{ $post->tags()->getRelatedIds() }}).trigger('change')

        var editor_config = {
            path_absolute : "/",
            selector: ".body",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern codesample"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media codesample code",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Browse',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection