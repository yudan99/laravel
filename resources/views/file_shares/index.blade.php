@extends('layouts.app')

@section('title', '文件分享')

@section('content')

    <div class="row mb-5">
        <div class="col-lg-9 col-md-9 file-list">
            {{-- 话题列表 --}}
            @include('file_shares._file_list', ['file_shares' => $file_shares])
            {{-- 分页 --}}
            <div class="mt-5">
                {!! $file_shares->appends(Request::except('page'))->render() !!}
            </div>

        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('file_shares._sidebar')
        </div>
    </div>


@endsection

@section('scriptsAfterJs')
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // 监听创建订单按钮的点击事件--}}
{{--            $('.btn-create-order').click(function () {--}}

{{--                axios.post('{{ route('orders.store') }}', {--}}
{{--                    data:$(this).find('.f-card data-id').val(),--}}
{{--                    file_share_id: $('.order-on input').val(),--}}
{{--                    file: $('.order-in input[name=in]').val(),--}}
{{--                    file2: $(this).find('input[name=in]').val(),--}}
{{--                    //file_share_id: 37,--}}
{{--                })--}}
{{--                    .then(function (response) {--}}
{{--                        // swal('订单提交成功', '', 'success');--}}
{{--                    }, function (error) {--}}
{{--                        if (error.response.status === 422) {--}}
{{--                            // http 状态码为 422 代表用户输入校验失败--}}
{{--                            var html = '<div>';--}}
{{--                            _.each(error.response.data.errors, function (errors) {--}}
{{--                                _.each(errors, function (error) {--}}
{{--                                    html += error+'<br>';--}}
{{--                                })--}}
{{--                            });--}}
{{--                            html += '</div>';--}}
{{--                            swal({content: $(html)[0], icon: 'error'})--}}
{{--                        } else {--}}
{{--                            // 其他情况应该是系统挂了--}}
{{--                            swal('系统错误', '', 'error');--}}
{{--                        }--}}
{{--                    });--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
@endsection



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--  <div class="col-md-10 offset-md-1">--}}
{{--    <div class="card ">--}}
{{--      <div class="card-header">--}}
{{--        <h1>--}}
{{--          FileShare--}}
{{--          <a class="btn btn-success float-xs-right" href="{{ route('file_shares.create') }}">Create</a>--}}
{{--        </h1>--}}
{{--      </div>--}}

{{--      <div class="card-body">--}}
{{--        @if($file_shares->count())--}}
{{--          <table class="table table-sm table-striped">--}}
{{--            <thead>--}}
{{--              <tr>--}}
{{--                <th class="text-xs-center">#</th>--}}
{{--                <th>Sh_user_id</th> <th>Sh_time</th> <th>Sub_time</th> <th>File_verify</th> <th>File_status</th> <th>File_type</th> <th>File_introduction</th> <th>Fiels</th> <th>Tags</th> <th>Video_preview</th> <th>Pic_preview</th> <th>Tem_path</th> <th>St_path</th> <th>Ini_price</th> <th>Cur_price</th> <th>Read_count</th> <th>Read_times</th> <th>Collect_count</th> <th>Forward_count</th> <th>Pay_count</th> <th>Down_count</th> <th>Down_times</th> <th>Email_count</th> <th>Email_times</th> <th>Order</th> <th>Excerpt</th> <th>Slug</th>--}}
{{--                <th class="text-xs-right">OPTIONS</th>--}}
{{--              </tr>--}}
{{--            </thead>--}}

{{--            <tbody>--}}
{{--              @foreach($file_shares as $file_share)--}}
{{--              <tr>--}}
{{--                <td class="text-xs-center"><strong>{{$file_share->id}}</strong></td>--}}

{{--                <td>{{$file_share->sh_user_id}}</td> <td>{{$file_share->sh_time}}</td> <td>{{$file_share->sub_time}}</td> <td>{{$file_share->file_verify}}</td> <td>{{$file_share->file_status}}</td> <td>{{$file_share->file_type}}</td> <td>{{$file_share->file_introduction}}</td> <td>{{$file_share->fiels}}</td> <td>{{$file_share->tags}}</td> <td>{{$file_share->video_preview}}</td> <td>{{$file_share->pic_preview}}</td> <td>{{$file_share->tem_path}}</td> <td>{{$file_share->st_path}}</td> <td>{{$file_share->ini_price}}</td> <td>{{$file_share->cur_price}}</td> <td>{{$file_share->read_count}}</td> <td>{{$file_share->read_times}}</td> <td>{{$file_share->collect_count}}</td> <td>{{$file_share->forward_count}}</td> <td>{{$file_share->pay_count}}</td> <td>{{$file_share->down_count}}</td> <td>{{$file_share->down_times}}</td> <td>{{$file_share->email_count}}</td> <td>{{$file_share->email_times}}</td> <td>{{$file_share->order}}</td> <td>{{$file_share->excerpt}}</td> <td>{{$file_share->slug}}</td>--}}

{{--                <td class="text-xs-right">--}}
{{--                  <a class="btn btn-sm btn-primary" href="{{ route('file_shares.show', $file_share->id) }}">--}}
{{--                    V--}}
{{--                  </a>--}}

{{--                  <a class="btn btn-sm btn-warning" href="{{ route('file_shares.edit', $file_share->id) }}">--}}
{{--                    E--}}
{{--                  </a>--}}

{{--                  <form action="{{ route('file_shares.destroy', $file_share->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">--}}
{{--                    {{csrf_field()}}--}}
{{--                    <input type="hidden" name="_method" value="DELETE">--}}

{{--                    <button type="submit" class="btn btn-sm btn-danger">D </button>--}}
{{--                  </form>--}}
{{--                </td>--}}
{{--              </tr>--}}
{{--              @endforeach--}}
{{--            </tbody>--}}
{{--          </table>--}}
{{--          {!! $file_shares->render() !!}--}}
{{--        @else--}}
{{--          <h3 class="text-xs-center alert alert-info">Empty!</h3>--}}
{{--        @endif--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}

{{--@endsection--}}
