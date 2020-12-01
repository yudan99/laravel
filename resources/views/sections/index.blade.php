@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Section
          <a class="btn btn-success float-xs-right" href="{{ route('sections.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($sections->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Chapter_id</th> <th>Section_name</th> <th>Section_introduce</th> <th>Section_detail</th> <th>Is_open</th> <th>Is_charge</th> <th>Read_count</th> <th>Read_times</th> <th>Collect_count</th> <th>Forward_count</th> <th>Pay_count</th> <th>Clock_count</th> <th>Comment_count</th> <th>Problem_count</th> <th>Answer_count</th> <th>Care</th> <th>Order</th> <th>Excerpt</th> <th>Slug</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($sections as $section)
              <tr>
                <td class="text-xs-center"><strong>{{$section->id}}</strong></td>

                <td>{{$section->chapter_id}}</td> <td>{{$section->section_name}}</td> <td>{{$section->section_introduce}}</td> <td>{{$section->section_detail}}</td> <td>{{$section->is_open}}</td> <td>{{$section->is_charge}}</td> <td>{{$section->read_count}}</td> <td>{{$section->read_times}}</td> <td>{{$section->collect_count}}</td> <td>{{$section->forward_count}}</td> <td>{{$section->pay_count}}</td> <td>{{$section->clock_count}}</td> <td>{{$section->comment_count}}</td> <td>{{$section->problem_count}}</td> <td>{{$section->answer_count}}</td> <td>{{$section->care}}</td> <td>{{$section->order}}</td> <td>{{$section->excerpt}}</td> <td>{{$section->slug}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('sections.show', $section->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('sections.edit', $section->id) }}">
                    E
                  </a>

                  <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $sections->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
