@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Course /
          @if($course->id)
            Edit #{{ $course->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($course->id)
          <form action="{{ route('courses.update', $course->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('courses.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="course_name-field">Course_name</label>
                	<input class="form-control" type="text" name="course_name" id="course_name-field" value="{{ old('course_name', $course->course_name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="fiels-field">Fiels</label>
                	<input class="form-control" type="text" name="fiels" id="fiels-field" value="{{ old('fiels', $course->fiels ) }}" />
                </div> 
                <div class="form-group">
                	<label for="tags-field">Tags</label>
                	<input class="form-control" type="text" name="tags" id="tags-field" value="{{ old('tags', $course->tags ) }}" />
                </div> 
                <div class="form-group">
                	<label for="cover-field">Cover</label>
                	<input class="form-control" type="text" name="cover" id="cover-field" value="{{ old('cover', $course->cover ) }}" />
                </div> 
                <div class="form-group">
                	<label for="author-field">Author</label>
                	<input class="form-control" type="text" name="author" id="author-field" value="{{ old('author', $course->author ) }}" />
                </div> 
                <div class="form-group">
                    <label for="course_introduce-field">Course_introduce</label>
                    <input class="form-control" type="text" name="course_introduce" id="course_introduce-field" value="{{ old('course_introduce', $course->course_introduce ) }}" />
                </div> 
                <div class="form-group">
                    <label for="ini_price-field">Ini_price</label>
                    <input class="form-control" type="text" name="ini_price" id="ini_price-field" value="{{ old('ini_price', $course->ini_price ) }}" />
                </div> 
                <div class="form-group">
                    <label for="cur_price-field">Cur_price</label>
                    <input class="form-control" type="text" name="cur_price" id="cur_price-field" value="{{ old('cur_price', $course->cur_price ) }}" />
                </div> 
                <div class="form-group">
                    <label for="read_count-field">Read_count</label>
                    <input class="form-control" type="text" name="read_count" id="read_count-field" value="{{ old('read_count', $course->read_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="read_times-field">Read_times</label>
                    <input class="form-control" type="text" name="read_times" id="read_times-field" value="{{ old('read_times', $course->read_times ) }}" />
                </div> 
                <div class="form-group">
                    <label for="collect_count-field">Collect_count</label>
                    <input class="form-control" type="text" name="collect_count" id="collect_count-field" value="{{ old('collect_count', $course->collect_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="forward_count-field">Forward_count</label>
                    <input class="form-control" type="text" name="forward_count" id="forward_count-field" value="{{ old('forward_count', $course->forward_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="pay_count-field">Pay_count</label>
                    <input class="form-control" type="text" name="pay_count" id="pay_count-field" value="{{ old('pay_count', $course->pay_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="clock_count-field">Clock_count</label>
                    <input class="form-control" type="text" name="clock_count" id="clock_count-field" value="{{ old('clock_count', $course->clock_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="comment_count-field">Comment_count</label>
                    <input class="form-control" type="text" name="comment_count" id="comment_count-field" value="{{ old('comment_count', $course->comment_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="problem_count-field">Problem_count</label>
                    <input class="form-control" type="text" name="problem_count" id="problem_count-field" value="{{ old('problem_count', $course->problem_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="reply_count-field">Reply_count</label>
                    <input class="form-control" type="text" name="reply_count" id="reply_count-field" value="{{ old('reply_count', $course->reply_count ) }}" />
                </div> 
                <div class="form-group">
                	<label for="care-field">Care</label>
                	<input class="form-control" type="text" name="care" id="care-field" value="{{ old('care', $course->care ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $course->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="excerpt-field">Excerpt</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3">{{ old('excerpt', $course->excerpt ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="slug-field">Slug</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $course->slug ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('courses.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
