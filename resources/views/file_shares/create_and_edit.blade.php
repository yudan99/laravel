@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h2>
          @if($file_share->id)
            编辑 #{{ $file_share->user->name }}# 的文件分享
          @else
            发布文件分享
          @endif
        </h2>
      </div>

      <div class="card-body">

        @if($file_share->id)
          <form action="{{ route('file_shares.update', $file_share->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" pjax-container>
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('file_shares.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" pjax-container>
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">



              <div class="form-group">
                  <label for="tem-path-field" class="avatar-label">上传文件</label>
                  <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                  <input type="file" name="tem_path" class="form-control-file">
{{--                  @if($user->avatar)--}}
{{--                      <br>--}}
{{--                      <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />--}}
{{--                  @endif--}}
              </div>


              <div class="form-group" >
                  <div id="file_introduction" style="height: 200px">
                      {!! old('file_introduction', $file_share->file_introduction ) !!}
                  </div>
                  <input type="hidden" name="file_introduction" value="" />
              </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">确认</button>
            <a class="btn btn-link float-xs-right" href="{{ route('file_shares.index') }}">取消</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quill.core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quill.snow.css') }}">
    @stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/quill.core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/quill.js') }}"></script>
    <script>
        // var toolbarOptions = [
        //     ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        //     ['blockquote', 'code-block'],
        //
        //     [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        //     [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        //     [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        //     [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        //     [{ 'direction': 'rtl' }],                         // text direction
        //
        //     [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        //     [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        //
        //     [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        //     [{ 'font': [] }],
        //     [{ 'align': [] }],
        //
        //     ['image'],['video'],['formula'],
        //
        //     ['clean']                                        // remove formatting button
        //
        // ];
        //
        // var quill = new Quill('#file_introduction', {
        //     modules: {
        //         toolbar: toolbarOptions
        //     },
        //     theme: 'snow'
        // });

        var options = {"modules":{"syntax":true,"toolbar":[{"size":[]},{"header":[]},"bold","italic","underline","strike",{"script":"super"},{"script":"sub"},{"color":[]},{"background":[]},"blockquote","code-block",{"list":"ordered"},{"list":"bullet"},{"indent":"-1"},{"indent":"+1"},"direction",{"align":[]},"link","image","video","formula","clean"]},"theme":"snow"}
        var quill = new Quill("#file_introduction", options);

        $('button[type="submit"]').click(function() {
            var content = document.querySelector('#file_introduction').children[0].innerHTML
            $('input[name=file_introduction]').val(content)
        })

    </script>
    @stop
