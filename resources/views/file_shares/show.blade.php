@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>FileShare / Show #{{ $file_share->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('file_shares.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('file_shares.edit', $file_share->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Sh_user_id</label>
<p>
	{{ $file_share->sh_user_id }}
</p> <label>Sh_time</label>
<p>
	{{ $file_share->sh_time }}
</p> <label>Sub_time</label>
<p>
	{{ $file_share->sub_time }}
</p> <label>File_verify</label>
<p>
	{{ $file_share->file_verify }}
</p> <label>File_status</label>
<p>
	{{ $file_share->file_status }}
</p> <label>File_type</label>
<p>
	{{ $file_share->file_type }}
</p> <label>File_introduction</label>
<p>
	{{ $file_share->file_introduction }}
</p> <label>Fiels</label>
<p>
	{{ $file_share->fiels }}
</p> <label>Tags</label>
<p>
	{{ $file_share->tags }}
</p> <label>Video_preview</label>
<p>
	{{ $file_share->video_preview }}
</p> <label>Pic_preview</label>
<p>
	{{ $file_share->pic_preview }}
</p> <label>Tem_path</label>
<p>
	{{ $file_share->tem_path }}
</p> <label>St_path</label>
<p>
	{{ $file_share->st_path }}
</p> <label>Ini_price</label>
<p>
	{{ $file_share->ini_price }}
</p> <label>Cur_price</label>
<p>
	{{ $file_share->cur_price }}
</p> <label>Read_count</label>
<p>
	{{ $file_share->read_count }}
</p> <label>Read_times</label>
<p>
	{{ $file_share->read_times }}
</p> <label>Collect_count</label>
<p>
	{{ $file_share->collect_count }}
</p> <label>Forward_count</label>
<p>
	{{ $file_share->forward_count }}
</p> <label>Pay_count</label>
<p>
	{{ $file_share->pay_count }}
</p> <label>Down_count</label>
<p>
	{{ $file_share->down_count }}
</p> <label>Down_times</label>
<p>
	{{ $file_share->down_times }}
</p> <label>Email_count</label>
<p>
	{{ $file_share->email_count }}
</p> <label>Email_times</label>
<p>
	{{ $file_share->email_times }}
</p> <label>Order</label>
<p>
	{{ $file_share->order }}
</p> <label>Excerpt</label>
<p>
	{{ $file_share->excerpt }}
</p> <label>Slug</label>
<p>
	{{ $file_share->slug }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
