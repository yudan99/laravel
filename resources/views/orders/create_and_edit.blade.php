@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Order /
          @if($order->id)
            Edit #{{ $order->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($order->id)
          <form action="{{ route('orders.update', $order->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('orders.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="order_no-field">Order_no</label>
                	<input class="form-control" type="text" name="order_no" id="order_no-field" value="{{ old('order_no', $order->order_no ) }}" />
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $order->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="total_amount-field">Total_amount</label>
                    <input class="form-control" type="text" name="total_amount" id="total_amount-field" value="{{ old('total_amount', $order->total_amount ) }}" />
                </div> 
                <div class="form-group">
                    <label for="deal_amount-field">Deal_amount</label>
                    <input class="form-control" type="text" name="deal_amount" id="deal_amount-field" value="{{ old('deal_amount', $order->deal_amount ) }}" />
                </div> 
                <div class="form-group">
                	<label for="deal_type-field">Deal_type</label>
                	<input class="form-control" type="text" name="deal_type" id="deal_type-field" value="{{ old('deal_type', $order->deal_type ) }}" />
                </div> 
                <div class="form-group">
                    <label for="paid_at-field">Paid_at</label>
                    <input class="form-control" type="text" name="paid_at" id="paid_at-field" value="{{ old('paid_at', $order->paid_at ) }}" />
                </div> 
                <div class="form-group">
                	<label for="paid_type-field">Paid_type</label>
                	<input class="form-control" type="text" name="paid_type" id="paid_type-field" value="{{ old('paid_type', $order->paid_type ) }}" />
                </div> 
                <div class="form-group">
                	<label for="paid_no-field">Paid_no</label>
                	<input class="form-control" type="text" name="paid_no" id="paid_no-field" value="{{ old('paid_no', $order->paid_no ) }}" />
                </div> 
                <div class="form-group">
                	<label for="refund_status-field">Refund_status</label>
                	<input class="form-control" type="text" name="refund_status" id="refund_status-field" value="{{ old('refund_status', $order->refund_status ) }}" />
                </div> 
                <div class="form-group">
                	<label for="refund_no-field">Refund_no</label>
                	<input class="form-control" type="text" name="refund_no" id="refund_no-field" value="{{ old('refund_no', $order->refund_no ) }}" />
                </div> 
                <div class="form-group">
                    <label for="is_closed-field">Is_closed</label>
                    <input class="form-control" type="text" name="is_closed" id="is_closed-field" value="{{ old('is_closed', $order->is_closed ) }}" />
                </div> 
                <div class="form-group">
                    <label for="is_open-field">Is_open</label>
                    <input class="form-control" type="text" name="is_open" id="is_open-field" value="{{ old('is_open', $order->is_open ) }}" />
                </div> 
                <div class="form-group">
                	<label for="remake-field">Remake</label>
                	<textarea name="remake" id="remake-field" class="form-control" rows="3">{{ old('remake', $order->remake ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="extra-field">Extra</label>
                	<textarea name="extra" id="extra-field" class="form-control" rows="3">{{ old('extra', $order->extra ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('orders.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
