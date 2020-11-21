@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Fiel
          <a class="btn btn-success float-xs-right" href="{{ route('fiels.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($fiels->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Parent_id</th> <th>Is_directory</th> <th>Level</th> <th>Path</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($fiels as $fiel)
              <tr>
                <td class="text-xs-center"><strong>{{$fiel->id}}</strong></td>

                <td>{{$fiel->name}}</td> <td>{{$fiel->parent_id}}</td> <td>{{$fiel->is_directory}}</td> <td>{{$fiel->level}}</td> <td>{{$fiel->path}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('fiels.show', $fiel->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('fiels.edit', $fiel->id) }}">
                    E
                  </a>

                  <form action="{{ route('fiels.destroy', $fiel->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $fiels->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
