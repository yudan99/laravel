@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Fiel / Show #{{ $fiel->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('fiels.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('fiels.edit', $fiel->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $fiel->name }}
</p> <label>Parent_id</label>
<p>
	{{ $fiel->parent_id }}
</p> <label>Is_directory</label>
<p>
	{{ $fiel->is_directory }}
</p> <label>Level</label>
<p>
	{{ $fiel->level }}
</p> <label>Path</label>
<p>
	{{ $fiel->path }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
