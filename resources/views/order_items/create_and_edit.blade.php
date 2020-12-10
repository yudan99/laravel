@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          OrderItem /
          @if($order_item->id)
            Edit #{{ $order_item->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($order_item->id)
          <form action="{{ route('order_items.update', $order_item->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('order_items.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="order_id-field">Order_id</label>
                    <input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $order_item->order_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="product_type-field">Product_type</label>
                	<input class="form-control" type="text" name="product_type" id="product_type-field" value="{{ old('product_type', $order_item->product_type ) }}" />
                </div> 
                <div class="form-group">
                    <label for="file_share_id-field">File_share_id</label>
                    <input class="form-control" type="text" name="file_share_id" id="file_share_id-field" value="{{ old('file_share_id', $order_item->file_share_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="course_id-field">Course_id</label>
                    <input class="form-control" type="text" name="course_id" id="course_id-field" value="{{ old('course_id', $order_item->course_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="mem_id-field">Mem_id</label>
                    <input class="form-control" type="text" name="mem_id" id="mem_id-field" value="{{ old('mem_id', $order_item->mem_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="amount-field">Amount</label>
                    <input class="form-control" type="text" name="amount" id="amount-field" value="{{ old('amount', $order_item->amount ) }}" />
                </div> 
                <div class="form-group">
                    <label for="price-field">Price</label>
                    <input class="form-control" type="text" name="price" id="price-field" value="{{ old('price', $order_item->price ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('order_items.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
