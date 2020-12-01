@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Course / Show #{{ $course->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('courses.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('courses.edit', $course->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Course_name</label>
<p>
	{{ $course->course_name }}
</p> <label>Fiels</label>
<p>
	{{ $course->fiels }}
</p> <label>Tags</label>
<p>
	{{ $course->tags }}
</p> <label>Cover</label>
<p>
	{{ $course->cover }}
</p> <label>Author</label>
<p>
	{{ $course->author }}
</p> <label>Course_introduce</label>
<p>
	{{ $course->course_introduce }}
</p> <label>Ini_price</label>
<p>
	{{ $course->ini_price }}
</p> <label>Cur_price</label>
<p>
	{{ $course->cur_price }}
</p> <label>Read_count</label>
<p>
	{{ $course->read_count }}
</p> <label>Read_times</label>
<p>
	{{ $course->read_times }}
</p> <label>Collect_count</label>
<p>
	{{ $course->collect_count }}
</p> <label>Forward_count</label>
<p>
	{{ $course->forward_count }}
</p> <label>Pay_count</label>
<p>
	{{ $course->pay_count }}
</p> <label>Clock_count</label>
<p>
	{{ $course->clock_count }}
</p> <label>Comment_count</label>
<p>
	{{ $course->comment_count }}
</p> <label>Problem_count</label>
<p>
	{{ $course->problem_count }}
</p> <label>Reply_count</label>
<p>
	{{ $course->reply_count }}
</p> <label>Care</label>
<p>
	{{ $course->care }}
</p> <label>Order</label>
<p>
	{{ $course->order }}
</p> <label>Excerpt</label>
<p>
	{{ $course->excerpt }}
</p> <label>Slug</label>
<p>
	{{ $course->slug }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
