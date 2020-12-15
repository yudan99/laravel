@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          CouponCode /
          @if($coupon_code->id)
            Edit #{{ $coupon_code->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($coupon_code->id)
          <form action="{{ route('coupon_codes.update', $coupon_code->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('coupon_codes.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $coupon_code->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="code-field">Code</label>
                	<input class="form-control" type="text" name="code" id="code-field" value="{{ old('code', $coupon_code->code ) }}" />
                </div> 
                <div class="form-group">
                	<label for="type-field">Type</label>
                	<input class="form-control" type="text" name="type" id="type-field" value="{{ old('type', $coupon_code->type ) }}" />
                </div> 
                <div class="form-group">
                    <label for="value-field">Value</label>
                    <input class="form-control" type="text" name="value" id="value-field" value="{{ old('value', $coupon_code->value ) }}" />
                </div> 
                <div class="form-group">
                    <label for="total-field">Total</label>
                    <input class="form-control" type="text" name="total" id="total-field" value="{{ old('total', $coupon_code->total ) }}" />
                </div> 
                <div class="form-group">
                    <label for="used-field">Used</label>
                    <input class="form-control" type="text" name="used" id="used-field" value="{{ old('used', $coupon_code->used ) }}" />
                </div> 
                <div class="form-group">
                    <label for="min_amount-field">Min_amount</label>
                    <input class="form-control" type="text" name="min_amount" id="min_amount-field" value="{{ old('min_amount', $coupon_code->min_amount ) }}" />
                </div> 
                <div class="form-group">
                    <label for="not_before-field">Not_before</label>
                    <input class="form-control" type="text" name="not_before" id="not_before-field" value="{{ old('not_before', $coupon_code->not_before ) }}" />
                </div> 
                <div class="form-group">
                    <label for="not_after-field">Not_after</label>
                    <input class="form-control" type="text" name="not_after" id="not_after-field" value="{{ old('not_after', $coupon_code->not_after ) }}" />
                </div> 
                <div class="form-group">
                    <label for="enabled-field">Enabled</label>
                    <input class="form-control" type="text" name="enabled" id="enabled-field" value="{{ old('enabled', $coupon_code->enabled ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('coupon_codes.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
