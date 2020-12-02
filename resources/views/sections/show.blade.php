@extends('layouts.app')

@section('title', $section->section_name)
@section('description', $section->excerpt)

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="card ">
                <div class="card-body">
                    <div class="media">
                        <div align="center">
                            <a href="{{ route('courses.show', $section->chapter->edition->course->id) }}">
                                <img class="thumbnail img-fluid" src="{{ $section->chapter->edition->course->cover }}" width="300px" height=auto>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="text-left">
                        <h4>{{ $section->chapter->edition->course->course_name }}</h4>
                        <h6>当前版本：{{ $section->chapter->edition->edition_version }}</h6>
                    </div>
                    <hr>
                    <div class="media">
                        <div align="left">


                                        @foreach($section->chapter->edition->chapter as $chapter_mu)
                                            <dt><h5>{{ $chapter_mu->chapter_name }}</h5>
                                            @foreach($chapter_mu->section as $section_mu)
                                                <dd><h6><a href="{{ route('sections.show',$section_mu->id) }}">{{  $section_mu->section_name }}</a></h6></dd>
                                                @endforeach
                                                </dt>
                                            @endforeach



{{--                            <a href="{{ route('users.show', $section->user->id) }}">--}}
{{--                                <img class="thumbnail img-fluid" src="{{ $section->user->avatar }}" width="300px" height="300px">--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 section-content">
            <div class="card ">
                <div class="card-body">
                    <h1 class="text-center mt-3 mb-3">
                        {{ $section->section_name }}
                    </h1>

                    <div class="article-meta text-center text-secondary">
                        {{ $section->created_at->diffForHumans() }}发布
                        ⋅
                        <i class="far fa-comment"></i>
                        {{ $section->reply_count }}人阅读
                    </div>

                    <div class="section-body mt-4 mb-4">
                        {!! $section->section_detail !!}
                    </div>

                    <div class="operate">
                        <hr>
                        <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
                            <i class="far fa-edit"></i> 编辑
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm" role="button">
                            <i class="far fa-trash-alt"></i> 删除
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--<div class="container">--}}
{{--  <div class="col-md-10 offset-md-1">--}}
{{--    <div class="card ">--}}
{{--      <div class="card-header">--}}
{{--        <h1>Section / Show #{{ $section->id }}</h1>--}}
{{--      </div>--}}

{{--      <div class="card-body">--}}
{{--        <div class="card-block bg-light">--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--              <a class="btn btn-link" href="{{ route('sections.index') }}"><- Back</a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('sections.edit', $section->id) }}">--}}
{{--                Edit--}}
{{--              </a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <br>--}}

{{--        <label>Chapter_id</label>--}}
{{--<p>--}}
{{--	{{ $section->chapter_id }}--}}
{{--</p> <label>Section_name</label>--}}
{{--<p>--}}
{{--	{{ $section->section_name }}--}}
{{--</p> <label>Section_introduce</label>--}}
{{--<p>--}}
{{--	{{ $section->section_introduce }}--}}
{{--</p> <label>Section_detail</label>--}}
{{--<p>--}}
{{--	{{ $section->section_detail }}--}}
{{--</p> <label>Is_open</label>--}}
{{--<p>--}}
{{--	{{ $section->is_open }}--}}
{{--</p> <label>Is_charge</label>--}}
{{--<p>--}}
{{--	{{ $section->is_charge }}--}}
{{--</p> <label>Read_count</label>--}}
{{--<p>--}}
{{--	{{ $section->read_count }}--}}
{{--</p> <label>Read_times</label>--}}
{{--<p>--}}
{{--	{{ $section->read_times }}--}}
{{--</p> <label>Collect_count</label>--}}
{{--<p>--}}
{{--	{{ $section->collect_count }}--}}
{{--</p> <label>Forward_count</label>--}}
{{--<p>--}}
{{--	{{ $section->forward_count }}--}}
{{--</p> <label>Pay_count</label>--}}
{{--<p>--}}
{{--	{{ $section->pay_count }}--}}
{{--</p> <label>Clock_count</label>--}}
{{--<p>--}}
{{--	{{ $section->clock_count }}--}}
{{--</p> <label>Comment_count</label>--}}
{{--<p>--}}
{{--	{{ $section->comment_count }}--}}
{{--</p> <label>Problem_count</label>--}}
{{--<p>--}}
{{--	{{ $section->problem_count }}--}}
{{--</p> <label>Answer_count</label>--}}
{{--<p>--}}
{{--	{{ $section->answer_count }}--}}
{{--</p> <label>Care</label>--}}
{{--<p>--}}
{{--	{{ $section->care }}--}}
{{--</p> <label>Order</label>--}}
{{--<p>--}}
{{--	{{ $section->order }}--}}
{{--</p> <label>Excerpt</label>--}}
{{--<p>--}}
{{--	{{ $section->excerpt }}--}}
{{--</p> <label>Slug</label>--}}
{{--<p>--}}
{{--	{{ $section->slug }}--}}
{{--</p>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}

{{--@endsection--}}
