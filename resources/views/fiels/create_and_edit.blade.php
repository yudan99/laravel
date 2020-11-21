@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Fiel /
          @if($fiel->id)
            Edit #{{ $fiel->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($fiel->id)
          <form action="{{ route('fiels.update', $fiel->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('fiels.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $fiel->name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="parent_id-field">Parent_id</label>
                    <input class="form-control" type="text" name="parent_id" id="parent_id-field" value="{{ old('parent_id', $fiel->parent_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="is_directory-field">Is_directory</label>
                    <input class="form-control" type="text" name="is_directory" id="is_directory-field" value="{{ old('is_directory', $fiel->is_directory ) }}" />
                </div> 
                <div class="form-group">
                    <label for="level-field">Level</label>
                    <input class="form-control" type="text" name="level" id="level-field" value="{{ old('level', $fiel->level ) }}" />
                </div> 
                <div class="form-group">
                	<label for="path-field">Path</label>
                	<input class="form-control" type="text" name="path" id="path-field" value="{{ old('path', $fiel->path ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('fiels.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
