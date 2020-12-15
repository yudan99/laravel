@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>CouponCode / Show #{{ $coupon_code->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('coupon_codes.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('coupon_codes.edit', $coupon_code->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $coupon_code->name }}
</p> <label>Code</label>
<p>
	{{ $coupon_code->code }}
</p> <label>Type</label>
<p>
	{{ $coupon_code->type }}
</p> <label>Value</label>
<p>
	{{ $coupon_code->value }}
</p> <label>Total</label>
<p>
	{{ $coupon_code->total }}
</p> <label>Used</label>
<p>
	{{ $coupon_code->used }}
</p> <label>Min_amount</label>
<p>
	{{ $coupon_code->min_amount }}
</p> <label>Not_before</label>
<p>
	{{ $coupon_code->not_before }}
</p> <label>Not_after</label>
<p>
	{{ $coupon_code->not_after }}
</p> <label>Enabled</label>
<p>
	{{ $coupon_code->enabled }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
