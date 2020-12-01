@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Course
          <a class="btn btn-success float-xs-right" href="{{ route('courses.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($courses->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Course_name</th> <th>Fiels</th> <th>Tags</th> <th>Cover</th> <th>Author</th> <th>Course_introduce</th> <th>Ini_price</th> <th>Cur_price</th> <th>Read_count</th> <th>Read_times</th> <th>Collect_count</th> <th>Forward_count</th> <th>Pay_count</th> <th>Clock_count</th> <th>Comment_count</th> <th>Problem_count</th> <th>Reply_count</th> <th>Care</th> <th>Order</th> <th>Excerpt</th> <th>Slug</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($courses as $course)
              <tr>
                <td class="text-xs-center"><strong>{{$course->id}}</strong></td>

                <td>{{$course->course_name}}</td> <td>{{$course->fiels}}</td> <td>{{$course->tags}}</td> <td>{{$course->cover}}</td> <td>{{$course->author}}</td> <td>{{$course->course_introduce}}</td> <td>{{$course->ini_price}}</td> <td>{{$course->cur_price}}</td> <td>{{$course->read_count}}</td> <td>{{$course->read_times}}</td> <td>{{$course->collect_count}}</td> <td>{{$course->forward_count}}</td> <td>{{$course->pay_count}}</td> <td>{{$course->clock_count}}</td> <td>{{$course->comment_count}}</td> <td>{{$course->problem_count}}</td> <td>{{$course->reply_count}}</td> <td>{{$course->care}}</td> <td>{{$course->order}}</td> <td>{{$course->excerpt}}</td> <td>{{$course->slug}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('courses.show', $course->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('courses.edit', $course->id) }}">
                    E
                  </a>

                  <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $courses->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
