@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          OrderItem
          <a class="btn btn-success float-xs-right" href="{{ route('order_items.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($order_items->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Order_id</th> <th>Product_type</th> <th>File_share_id</th> <th>Course_id</th> <th>Mem_id</th> <th>Amount</th> <th>Price</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($order_items as $order_item)
              <tr>
                <td class="text-xs-center"><strong>{{$order_item->id}}</strong></td>

                <td>{{$order_item->order_id}}</td> <td>{{$order_item->product_type}}</td> <td>{{$order_item->file_share_id}}</td> <td>{{$order_item->course_id}}</td> <td>{{$order_item->mem_id}}</td> <td>{{$order_item->amount}}</td> <td>{{$order_item->price}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('order_items.show', $order_item->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('order_items.edit', $order_item->id) }}">
                    E
                  </a>

                  <form action="{{ route('order_items.destroy', $order_item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $order_items->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
