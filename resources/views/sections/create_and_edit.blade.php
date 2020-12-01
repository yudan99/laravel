@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Section /
          @if($section->id)
            Edit #{{ $section->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($section->id)
          <form action="{{ route('sections.update', $section->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('sections.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="chapter_id-field">Chapter_id</label>
                    <input class="form-control" type="text" name="chapter_id" id="chapter_id-field" value="{{ old('chapter_id', $section->chapter_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="section_name-field">Section_name</label>
                	<input class="form-control" type="text" name="section_name" id="section_name-field" value="{{ old('section_name', $section->section_name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="section_introduce-field">Section_introduce</label>
                    <input class="form-control" type="text" name="section_introduce" id="section_introduce-field" value="{{ old('section_introduce', $section->section_introduce ) }}" />
                </div> 
                <div class="form-group">
                    <label for="section_detail-field">Section_detail</label>
                    <input class="form-control" type="text" name="section_detail" id="section_detail-field" value="{{ old('section_detail', $section->section_detail ) }}" />
                </div> 
                <div class="form-group">
                    <label for="is_open-field">Is_open</label>
                    <input class="form-control" type="text" name="is_open" id="is_open-field" value="{{ old('is_open', $section->is_open ) }}" />
                </div> 
                <div class="form-group">
                    <label for="is_charge-field">Is_charge</label>
                    <input class="form-control" type="text" name="is_charge" id="is_charge-field" value="{{ old('is_charge', $section->is_charge ) }}" />
                </div> 
                <div class="form-group">
                    <label for="read_count-field">Read_count</label>
                    <input class="form-control" type="text" name="read_count" id="read_count-field" value="{{ old('read_count', $section->read_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="read_times-field">Read_times</label>
                    <input class="form-control" type="text" name="read_times" id="read_times-field" value="{{ old('read_times', $section->read_times ) }}" />
                </div> 
                <div class="form-group">
                    <label for="collect_count-field">Collect_count</label>
                    <input class="form-control" type="text" name="collect_count" id="collect_count-field" value="{{ old('collect_count', $section->collect_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="forward_count-field">Forward_count</label>
                    <input class="form-control" type="text" name="forward_count" id="forward_count-field" value="{{ old('forward_count', $section->forward_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="pay_count-field">Pay_count</label>
                    <input class="form-control" type="text" name="pay_count" id="pay_count-field" value="{{ old('pay_count', $section->pay_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="clock_count-field">Clock_count</label>
                    <input class="form-control" type="text" name="clock_count" id="clock_count-field" value="{{ old('clock_count', $section->clock_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="comment_count-field">Comment_count</label>
                    <input class="form-control" type="text" name="comment_count" id="comment_count-field" value="{{ old('comment_count', $section->comment_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="problem_count-field">Problem_count</label>
                    <input class="form-control" type="text" name="problem_count" id="problem_count-field" value="{{ old('problem_count', $section->problem_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="answer_count-field">Answer_count</label>
                    <input class="form-control" type="text" name="answer_count" id="answer_count-field" value="{{ old('answer_count', $section->answer_count ) }}" />
                </div> 
                <div class="form-group">
                	<label for="care-field">Care</label>
                	<input class="form-control" type="text" name="care" id="care-field" value="{{ old('care', $section->care ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $section->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="excerpt-field">Excerpt</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3">{{ old('excerpt', $section->excerpt ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="slug-field">Slug</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $section->slug ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('sections.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
