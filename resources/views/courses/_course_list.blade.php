@if (count($courses))
    <ul class="list-unstyled">
        @foreach ($courses as $course)

            <li class="card">

                <div class="card-header">
                    <div class="media">
                        <img class="rounded align-self-auto mr-3" style="width: 104px; height: 130px;" src="{{ $course->cover }}" >
                        <div class="media-body">
                            <h1><strong>{{ $course->course_name }}</strong></h1>
                        </div>
                    </div>
                </div>



                <div class="card-body" style="width: 80%">

                    <div class="media-body">
                        <h3>{!! $course->course_introduce !!} </h3>
                    </div>

                    <hr>

                        @foreach($course->edition as $edition)
                        <div class="media-heading">
                            <dl><h2><strong>#{{ $edition->edition_version }} 版本#</strong></h2>
                            @foreach($edition->chapter as $chapter)
                                <dt><h4>{{ $chapter->chapter_name }}</h4>
                                    @foreach($chapter->section as $section)
                                        <dd><h6><a href="{{ route('sections.show',$section->id) }}">{{  $section->section_name }}</a></h6></dd>
                                        @endforeach
                                </dt>
                            @endforeach
                            </dl>
                        </div>
                        @endforeach
{{--                        <p class="text-left text-justify"><h6>{{ $course->st_path }}</h6></p>--}}

                </div>

{{--                <div class="card-body">--}}
{{--                    <div class="media-heading-right">--}}
{{--                        @foreach($course->fiel as $fiel)--}}
{{--                            <p class="badge badge-pill badge-light"> {{ $fiel->name }} </p>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}

{{--                    <div class="media-body">--}}
{{--                        {!! $course->file_introduction !!}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-secondary" >收藏</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" >{{ $course->cur_price }}购买</button>
                        </div>
{{--                        <div class="col">--}}
{{--                            <a href="{{ $course->tem_path }}" download="{{ $course->st_path }}">--}}
{{--                                <button class="btn btn-primary" >下载</button>--}}
{{--                            </a>--}}
{{--                        </div>--}}
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
