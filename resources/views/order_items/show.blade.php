@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>OrderItem / Show #{{ $order_item->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('order_items.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('order_items.edit', $order_item->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Order_id</label>
<p>
	{{ $order_item->order_id }}
</p> <label>Product_type</label>
<p>
	{{ $order_item->product_type }}
</p> <label>File_share_id</label>
<p>
	{{ $order_item->file_share_id }}
</p> <label>Course_id</label>
<p>
	{{ $order_item->course_id }}
</p> <label>Mem_id</label>
<p>
	{{ $order_item->mem_id }}
</p> <label>Amount</label>
<p>
	{{ $order_item->amount }}
</p> <label>Price</label>
<p>
	{{ $order_item->price }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
