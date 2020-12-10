@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Order / Show #{{ $order->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('orders.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('orders.edit', $order->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Order_no</label>
<p>
	{{ $order->order_no }}
</p> <label>User_id</label>
<p>
	{{ $order->user_id }}
</p> <label>Total_amount</label>
<p>
	{{ $order->total_amount }}
</p> <label>Deal_amount</label>
<p>
	{{ $order->deal_amount }}
</p> <label>Deal_type</label>
<p>
	{{ $order->deal_type }}
</p> <label>Paid_at</label>
<p>
	{{ $order->paid_at }}
</p> <label>Paid_type</label>
<p>
	{{ $order->paid_type }}
</p> <label>Paid_no</label>
<p>
	{{ $order->paid_no }}
</p> <label>Refund_status</label>
<p>
	{{ $order->refund_status }}
</p> <label>Refund_no</label>
<p>
	{{ $order->refund_no }}
</p> <label>Is_closed</label>
<p>
	{{ $order->is_closed }}
</p> <label>Is_open</label>
<p>
	{{ $order->is_open }}
</p> <label>Remake</label>
<p>
	{{ $order->remake }}
</p> <label>Extra</label>
<p>
	{{ $order->extra }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
