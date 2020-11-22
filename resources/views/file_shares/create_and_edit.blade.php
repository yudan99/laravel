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
          <form action="{{ route('file_shares.update', $file_share->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('file_shares.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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

{{--              <div class="form-group">--}}
{{--                  <select class="form-control" name="category_id" required>--}}
{{--                      <option value="" hidden disabled selected>归属领域</option>--}}
{{--                      @foreach ($fiel as $value)--}}
{{--                          <option value="{{ $value->id }}">{{ $value->name }}</option>--}}
{{--                      @endforeach--}}
{{--                  </select>--}}
{{--              </div>--}}

{{--              <div class="form-group">--}}
{{--                  <select class="form-control" name="category_id" required>--}}
{{--                      <option value="" hidden disabled selected>个性标签</option>--}}
{{--                      @foreach ($fiel as $value)--}}
{{--                          <option value="{{ $value->id }}">{{ $value->name }}</option>--}}
{{--                      @endforeach--}}
{{--                  </select>--}}
{{--              </div>--}}

{{--              <div class="form-group">--}}
{{--                  <label for="introduction-field">文件介绍</label>--}}
{{--                  <textarea name="introduction" id="introduction-field" class="form-control" rows="3"></textarea>--}}
{{--              </div>--}}

{{--              <div class="form-group">--}}
{{--                  <select class="form-control" name="category_id" required>--}}
{{--                      <option value="" hidden disabled selected>定价策略</option>--}}
{{--                      @foreach ($fiel as $value)--}}
{{--                          <option value="{{ $value->id }}">{{ $value->name }}</option>--}}
{{--                      @endforeach--}}
{{--                  </select>--}}
{{--              </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="sh_user_id-field">Sh_user_id</label>--}}
{{--                    <input class="form-control" type="text" name="sh_user_id" id="sh_user_id-field" value="{{ old('sh_user_id', $file_share->sh_user_id ) }}" />--}}
{{--                </div>--}}

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
