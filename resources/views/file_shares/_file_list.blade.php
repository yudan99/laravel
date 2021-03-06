@if (count($file_shares))
    <ul class="list-unstyled">
        @foreach ($file_shares as $file_share)

            <li class="card f-card" id="file-card" data-id="{{ $file_share->id }}">

                <div class="card-header">
                    <div class="media">
                        <img class="rounded align-self-auto mr-3" style="width: 46px; height: 46px;" src="{{ $file_share->user->avatar }}" >
                        <div class="media-body">
                            <h5>{{ $file_share->user->name }}</h5>
                            <h6>{{ $file_share->user->introduction }}</h6>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="width: 80%">
{{--                    <div class="properties-list-title">产品参数：</div>--}}
                    <ul class="properties-list-body">
                        @foreach($file_share->grouped_properties as $name => $values)
                            <li>{{ $name }}：{{ join(' ', $values) }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-body" style="width: 80%">
                    <div class="media-heading">
                        <p class="text-left text-justify"><h1>{{ $file_share->st_path }}</h1></p>
                    </div>
                </div>

                <div class="card-body">
                    <div class="media-heading-right">
                        @foreach($file_share->fiel as $fiel)
                        <p class="badge badge-pill badge-light"> {{ $fiel->name }} </p>
                        @endforeach
                    </div>

                    <div class="media-body">
                            {!! $file_share->file_introduction !!}
{{--                            <video class="glyphicon-hd-video" width=100% height=auto poster="http://homestead.test/uploads/images/avatars/202011/5.JPG" controls>--}}
{{--                                <source src="http://homestead.test/uploads/images/avatars/202011/480P.mp4"  type="video/mp4">--}}
{{--                            </video>--}}
                    </div>

                </div>

                <div class="card-footer order-in">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-secondary" >收藏</button>
                        </div>
                        <div class="col">
                            <form action="{{ route('orders.store_file_order') }}" method="POST" target="view_window">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="file_share_id" value="{{ $file_share->id }}">
                            <button class="btn btn-primary btn-create-order">{{ $file_share->cur_price }}元 购买</button>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{ $file_share->tem_path }}" download="{{ $file_share->st_path }}">
                                <button class="btn btn-primary" >下载</button>
                            </a>
                        </div>
                    </div>
                </div>

            </li>


            @if ( ! $loop->last)
                <br>
            @endif

        @endforeach
    </ul>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
