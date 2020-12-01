@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Section / Show #{{ $section->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('sections.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('sections.edit', $section->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Chapter_id</label>
<p>
	{{ $section->chapter_id }}
</p> <label>Section_name</label>
<p>
	{{ $section->section_name }}
</p> <label>Section_introduce</label>
<p>
	{{ $section->section_introduce }}
</p> <label>Section_detail</label>
<p>
	{{ $section->section_detail }}
</p> <label>Is_open</label>
<p>
	{{ $section->is_open }}
</p> <label>Is_charge</label>
<p>
	{{ $section->is_charge }}
</p> <label>Read_count</label>
<p>
	{{ $section->read_count }}
</p> <label>Read_times</label>
<p>
	{{ $section->read_times }}
</p> <label>Collect_count</label>
<p>
	{{ $section->collect_count }}
</p> <label>Forward_count</label>
<p>
	{{ $section->forward_count }}
</p> <label>Pay_count</label>
<p>
	{{ $section->pay_count }}
</p> <label>Clock_count</label>
<p>
	{{ $section->clock_count }}
</p> <label>Comment_count</label>
<p>
	{{ $section->comment_count }}
</p> <label>Problem_count</label>
<p>
	{{ $section->problem_count }}
</p> <label>Answer_count</label>
<p>
	{{ $section->answer_count }}
</p> <label>Care</label>
<p>
	{{ $section->care }}
</p> <label>Order</label>
<p>
	{{ $section->order }}
</p> <label>Excerpt</label>
<p>
	{{ $section->excerpt }}
</p> <label>Slug</label>
<p>
	{{ $section->slug }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
