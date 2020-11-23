@if (count($file_shares))
    <ul class="list-unstyled">
        @foreach ($file_shares as $file_share)

            <li class="card">

                <div class="card-header">
                    <div class="media">
                        <img class="rounded align-self-auto mr-3" style="width: 46px; height: 46px;" src="{{ $file_share->user->avatar }}" >
                        <div class="media-body">
                            <h5>{{ $file_share->user->name }}</h5>
                            <h6>{{ $file_share->user->introduction }}</h6>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="media-heading">
                        <p class="text-left text-justify">{{ $file_share->st_path }}</p>
                    </div>

                    <div class="media-heading-right">
                        @foreach($file_share->fiel as $fiel)
                        <p class="badge badge-pill badge-light"> {{ $fiel->name }} </p>
                        @endforeach
                    </div>

                    <div class="media-body">
                        <div class="media-list">
{{--                            <video class="glyphicon-hd-video" width=100% height=auto poster="http://homestead.test/uploads/images/avatars/202011/5.JPG" controls>--}}
{{--                                <source src="http://homestead.test/uploads/images/avatars/202011/480P.mp4"  type="video/mp4">--}}
{{--                            </video>--}}
                        </div>

                        <div class="media-list">
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/sese (1).jpg">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/sese (2).jpg">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/sese (3).jpg">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

{{--                        <div class="media-list">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 col-lg-6" style="padding: 0px 0px 0px 14px">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/1.JPG">--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-lg-6" style="padding: 0px 14px 0px 0px">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/2.JPG">--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-lg-6" style="padding: 0px 0px 0px 14px">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/3.JPG">--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-lg-6" style="padding: 0px 14px 0px 0px">--}}
{{--                                    <img class="img-fluid media-object" width=100% height=auto src="http://homestead.test/uploads/images/avatars/202011/9.JPG">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                    </div>
                </div>

                <div class="card-footer">

                        <div class="row">
                            <div class="col align-self-start">
                                <button class="btn btn-secondary" >收藏</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" >购买</button>
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
