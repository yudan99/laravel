@extends('layouts.app')
@section('title', '确认支付')

@section('content')
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <h4>确定支付</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>购买信息</th>
                            <th class="text-center">原价</th>
                            <th class="text-center">折扣</th>
                            <th class="text-right item-amount">小计</th>
                        </tr>
                        </thead>
                        @foreach($order->order_item as $order_item)
                            <tr>
{{--                                <td class="product-info">--}}
                                <td class="">

                                    <div>
                                      <span class="product-title">
                                         <a target="_blank" href="{{ route('file_shares.show', [$order_item->file_share_id]) }}">{{ $order_item->fileShare->st_path }}</a>
                                      </span>
                                    </div>
                                </td>
                                <td class="sku-price text-center vertical-middle">￥{{ $order_item->price }}</td>
                                <td class="sku-price text-center vertical-middle">暂无折扣</td>
                                <td class="item-amount text-right vertical-middle">￥{{ $order_item->price }}</td>
                            </tr>
                        @endforeach
                        <tr><td colspan="4"></td></tr>
                    </table>
                    <div class="order-bottom">
                        <div class="order-info">
                            <div class="line"><div class="line-label"><b>请注意：</b></div><div class="line-value">虚拟内容商品，购买后不支持退货、转让、退换<br>购买过程中，出现问题请联系小助理 <a href="#">小瑶</a></div></div>
                        </div>
                        <div class="order-summary text-right">
                            <div class="total-amount">
                                <span>订单总价：</span>
                                <div class="value">￥{{ $order->total_amount }}</div>
                            </div>
                            <div>
                                <span>订单状态：</span>
                                <div class="value">
                                    @if($order->paid_at)
                                        @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                                            已支付
                                        @else
                                            {{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}
                                        @endif
                                    @elseif($order->closed)
                                        已关闭
                                    @else
                                        未支付
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--<div class="container">--}}
{{--  <div class="col-md-10 offset-md-1">--}}
{{--    <div class="card ">--}}
{{--      <div class="card-header">--}}
{{--        <h1>Order / Show #{{ $order->id }}</h1>--}}
{{--      </div>--}}

{{--      <div class="card-body">--}}
{{--        <div class="card-block bg-light">--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--              <a class="btn btn-link" href="{{ route('orders.index') }}"><- Back</a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('orders.edit', $order->id) }}">--}}
{{--                Edit--}}
{{--              </a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <br>--}}

{{--        <label>Order_no</label>--}}
{{--<p>--}}
{{--	{{ $order->order_no }}--}}
{{--</p> <label>User_id</label>--}}
{{--<p>--}}
{{--	{{ $order->user_id }}--}}
{{--</p> <label>Total_amount</label>--}}
{{--<p>--}}
{{--	{{ $order->total_amount }}--}}
{{--</p> <label>Deal_amount</label>--}}
{{--<p>--}}
{{--	{{ $order->deal_amount }}--}}
{{--</p> <label>Deal_type</label>--}}
{{--<p>--}}
{{--	{{ $order->deal_type }}--}}
{{--</p> <label>Paid_at</label>--}}
{{--<p>--}}
{{--	{{ $order->paid_at }}--}}
{{--</p> <label>Paid_type</label>--}}
{{--<p>--}}
{{--	{{ $order->paid_type }}--}}
{{--</p> <label>Paid_no</label>--}}
{{--<p>--}}
{{--	{{ $order->paid_no }}--}}
{{--</p> <label>Refund_status</label>--}}
{{--<p>--}}
{{--	{{ $order->refund_status }}--}}
{{--</p> <label>Refund_no</label>--}}
{{--<p>--}}
{{--	{{ $order->refund_no }}--}}
{{--</p> <label>Is_closed</label>--}}
{{--<p>--}}
{{--	{{ $order->is_closed }}--}}
{{--</p> <label>Is_open</label>--}}
{{--<p>--}}
{{--	{{ $order->is_open }}--}}
{{--</p> <label>Remake</label>--}}
{{--<p>--}}
{{--	{{ $order->remake }}--}}
{{--</p> <label>Extra</label>--}}
{{--<p>--}}
{{--	{{ $order->extra }}--}}
{{--</p>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}

{{--@endsection--}}
