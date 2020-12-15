@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          CouponCode
          <a class="btn btn-success float-xs-right" href="{{ route('coupon_codes.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($coupon_codes->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Code</th> <th>Type</th> <th>Value</th> <th>Total</th> <th>Used</th> <th>Min_amount</th> <th>Not_before</th> <th>Not_after</th> <th>Enabled</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($coupon_codes as $coupon_code)
              <tr>
                <td class="text-xs-center"><strong>{{$coupon_code->id}}</strong></td>

                <td>{{$coupon_code->name}}</td> <td>{{$coupon_code->code}}</td> <td>{{$coupon_code->type}}</td> <td>{{$coupon_code->value}}</td> <td>{{$coupon_code->total}}</td> <td>{{$coupon_code->used}}</td> <td>{{$coupon_code->min_amount}}</td> <td>{{$coupon_code->not_before}}</td> <td>{{$coupon_code->not_after}}</td> <td>{{$coupon_code->enabled}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('coupon_codes.show', $coupon_code->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('coupon_codes.edit', $coupon_code->id) }}">
                    E
                  </a>

                  <form action="{{ route('coupon_codes.destroy', $coupon_code->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $coupon_codes->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
