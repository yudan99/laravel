@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          FileShare /
          @if($file_share->id)
            Edit #{{ $file_share->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($file_share->id)
          <form action="{{ route('file_shares.update', $file_share->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('file_shares.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="sh_user_id-field">Sh_user_id</label>
                    <input class="form-control" type="text" name="sh_user_id" id="sh_user_id-field" value="{{ old('sh_user_id', $file_share->sh_user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="sh_time-field">Sh_time</label>
                    <input class="form-control" type="text" name="sh_time" id="sh_time-field" value="{{ old('sh_time', $file_share->sh_time ) }}" />
                </div> 
                <div class="form-group">
                    <label for="sub_time-field">Sub_time</label>
                    <input class="form-control" type="text" name="sub_time" id="sub_time-field" value="{{ old('sub_time', $file_share->sub_time ) }}" />
                </div> 
                <div class="form-group">
                    <label for="file_verify-field">File_verify</label>
                    <input class="form-control" type="text" name="file_verify" id="file_verify-field" value="{{ old('file_verify', $file_share->file_verify ) }}" />
                </div> 
                <div class="form-group">
                	<label for="file_status-field">File_status</label>
                	<input class="form-control" type="text" name="file_status" id="file_status-field" value="{{ old('file_status', $file_share->file_status ) }}" />
                </div> 
                <div class="form-group">
                	<label for="file_type-field">File_type</label>
                	<input class="form-control" type="text" name="file_type" id="file_type-field" value="{{ old('file_type', $file_share->file_type ) }}" />
                </div> 
                <div class="form-group">
                	<label for="file_introduction-field">File_introduction</label>
                	<input class="form-control" type="text" name="file_introduction" id="file_introduction-field" value="{{ old('file_introduction', $file_share->file_introduction ) }}" />
                </div> 
                <div class="form-group">
                	<label for="fiels-field">Fiels</label>
                	<input class="form-control" type="text" name="fiels" id="fiels-field" value="{{ old('fiels', $file_share->fiels ) }}" />
                </div> 
                <div class="form-group">
                	<label for="tags-field">Tags</label>
                	<input class="form-control" type="text" name="tags" id="tags-field" value="{{ old('tags', $file_share->tags ) }}" />
                </div> 
                <div class="form-group">
                	<label for="video_preview-field">Video_preview</label>
                	<input class="form-control" type="text" name="video_preview" id="video_preview-field" value="{{ old('video_preview', $file_share->video_preview ) }}" />
                </div> 
                <div class="form-group">
                	<label for="pic_preview-field">Pic_preview</label>
                	<input class="form-control" type="text" name="pic_preview" id="pic_preview-field" value="{{ old('pic_preview', $file_share->pic_preview ) }}" />
                </div> 
                <div class="form-group">
                	<label for="tem_path-field">Tem_path</label>
                	<input class="form-control" type="text" name="tem_path" id="tem_path-field" value="{{ old('tem_path', $file_share->tem_path ) }}" />
                </div> 
                <div class="form-group">
                	<label for="st_path-field">St_path</label>
                	<input class="form-control" type="text" name="st_path" id="st_path-field" value="{{ old('st_path', $file_share->st_path ) }}" />
                </div> 
                <div class="form-group">
                    <label for="ini_price-field">Ini_price</label>
                    <input class="form-control" type="text" name="ini_price" id="ini_price-field" value="{{ old('ini_price', $file_share->ini_price ) }}" />
                </div> 
                <div class="form-group">
                    <label for="cur_price-field">Cur_price</label>
                    <input class="form-control" type="text" name="cur_price" id="cur_price-field" value="{{ old('cur_price', $file_share->cur_price ) }}" />
                </div> 
                <div class="form-group">
                    <label for="read_count-field">Read_count</label>
                    <input class="form-control" type="text" name="read_count" id="read_count-field" value="{{ old('read_count', $file_share->read_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="read_times-field">Read_times</label>
                    <input class="form-control" type="text" name="read_times" id="read_times-field" value="{{ old('read_times', $file_share->read_times ) }}" />
                </div> 
                <div class="form-group">
                    <label for="collect_count-field">Collect_count</label>
                    <input class="form-control" type="text" name="collect_count" id="collect_count-field" value="{{ old('collect_count', $file_share->collect_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="forward_count-field">Forward_count</label>
                    <input class="form-control" type="text" name="forward_count" id="forward_count-field" value="{{ old('forward_count', $file_share->forward_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="pay_count-field">Pay_count</label>
                    <input class="form-control" type="text" name="pay_count" id="pay_count-field" value="{{ old('pay_count', $file_share->pay_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="down_count-field">Down_count</label>
                    <input class="form-control" type="text" name="down_count" id="down_count-field" value="{{ old('down_count', $file_share->down_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="down_times-field">Down_times</label>
                    <input class="form-control" type="text" name="down_times" id="down_times-field" value="{{ old('down_times', $file_share->down_times ) }}" />
                </div> 
                <div class="form-group">
                    <label for="email_count-field">Email_count</label>
                    <input class="form-control" type="text" name="email_count" id="email_count-field" value="{{ old('email_count', $file_share->email_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="email_times-field">Email_times</label>
                    <input class="form-control" type="text" name="email_times" id="email_times-field" value="{{ old('email_times', $file_share->email_times ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $file_share->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="excerpt-field">Excerpt</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3">{{ old('excerpt', $file_share->excerpt ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="slug-field">Slug</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $file_share->slug ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('file_shares.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
