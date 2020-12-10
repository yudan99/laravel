@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Order
          <a class="btn btn-success float-xs-right" href="{{ route('orders.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($orders->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Order_no</th> <th>User_id</th> <th>Total_amount</th> <th>Deal_amount</th> <th>Deal_type</th> <th>Paid_at</th> <th>Paid_type</th> <th>Paid_no</th> <th>Refund_status</th> <th>Refund_no</th> <th>Is_closed</th> <th>Is_open</th> <th>Remake</th> <th>Extra</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($orders as $order)
              <tr>
                <td class="text-xs-center"><strong>{{$order->id}}</strong></td>

                <td>{{$order->order_no}}</td> <td>{{$order->user_id}}</td> <td>{{$order->total_amount}}</td> <td>{{$order->deal_amount}}</td> <td>{{$order->deal_type}}</td> <td>{{$order->paid_at}}</td> <td>{{$order->paid_type}}</td> <td>{{$order->paid_no}}</td> <td>{{$order->refund_status}}</td> <td>{{$order->refund_no}}</td> <td>{{$order->is_closed}}</td> <td>{{$order->is_open}}</td> <td>{{$order->remake}}</td> <td>{{$order->extra}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('orders.show', $order->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('orders.edit', $order->id) }}">
                    E
                  </a>

                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $orders->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
