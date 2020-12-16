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

                                @if($order->coupon_code_id)
                                <td class="sku-price text-center vertical-middle">{{ $order->couponCode->description }}</td>
                                @else
                                    <td class="sku-price text-center vertical-middle">暂无优惠</td>
                                @endif


                                <td class="item-amount text-right vertical-middle">￥{{ $order->total_amount }}</td>
                            </tr>
                        @endforeach
                        <tr><td colspan="4"></td></tr>
                    </table>
                    <div class="order-bottom">
                        <div class="order-info">
                            <!-- 优惠码开始 -->
                            <div class="form-group row">
                                <form class="col" action="{{ route('orders.update_file_order', $order->id) }}" method="POST">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <label class="col"><h5>优惠码</h5></label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="coupon_code">
                                        <span class="form-text text-muted" id="coupon_desc"></span>
                                    </div>
                                    <button type="submit" class="btn btn-danger" style="display: none;" id="btn-cancel-coupon">确认使用<br>该优惠</button>
                                    <button type="button" class="btn btn-success" id="btn-check-coupon">检验</button>
                                </form>

                            </div>
                            <!-- 优惠码结束 -->
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
                                <!-- 支付按钮开始 -->
                                @if(!$order->paid_at && !$order->closed)
                                    <div class="payment-buttons">
                                        <a class="btn btn-primary btn-sm" href="{{ route('payment.alipay', ['order' => $order->id]) }}">支付宝支付</a>
{{--                                        <a target="_blank" class="btn btn-success btn-sm" href="{{ route('payment.wechat', ['order' => $order->id]) }}">微信支付jiu</a>--}}
                                        <button class="btn btn-sm btn-success" id='btn-wechat'>微信支付</button>
                                    </div>
                            @endif
                            <!-- 支付按钮结束 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {
            // 微信支付按钮事件
            $('#btn-wechat').click(function() {
                swal({
                    // content 参数可以是一个 DOM 元素，这里我们用 jQuery 动态生成一个 img 标签，并通过 [0] 的方式获取到 DOM 元素
                    content: $('<img src="{{ route('payment.wechat', ['order' => $order->id]) }}" />')[0],
                    // buttons 参数可以设置按钮显示的文案
                    buttons: ['关闭', '已完成付款'],
                })
                    .then(function(result) {
                        // 如果用户点击了 已完成付款 按钮，则重新加载页面
                        if (result) {
                            location.reload();
                        }
                    })
            });
        });

        // 检查按钮点击事件
        $('#btn-check-coupon').click(function () {
            // 获取用户输入的优惠码
            var code = $('input[name=coupon_code]').val();
            // 如果没有输入则弹框提示
            if(!code) {
                swal('请输入优惠码', '', 'warning');
                return;
            }

            // 调用检查接口
            axios.get('/coupon_codes/' + encodeURIComponent(code))
                .then(function (response) {  // then 方法的第一个参数是回调，请求成功时会被调用
                    $('#coupon_desc').text(response.data.description); // 输出显示优惠信息
                    $('input[name=coupon_code]').prop('readonly', true); // 禁用输入框
                    $('#btn-cancel-coupon').show(); // 显示 使用 按钮
                    $('#btn-check-coupon').hide(); // 隐藏 检验 按钮
                }, function (error) {
                    // 如果返回码是 404，说明优惠券不存在
                    if(error.response.status === 404) {
                        swal('优惠码不存在', '', 'error');
                    } else if (error.response.status === 403) {
                        // 如果返回码是 403，说明有其他条件不满足
                        swal(error.response.data.msg, '', 'error');
                    } else {
                        // 其他错误
                        swal('系统内部错误', '', 'error');
                    }
                })
        });

        // 隐藏 按钮点击事件
        // $('#btn-cancel-coupon').click(function () {
        //     // axios.post()
        //     // $('#coupon_desc').text(''); // 隐藏优惠信息
        //     // $('input[name=coupon_code]').prop('readonly', false);  // 启用输入框
        //     // $('#btn-cancel-coupon').hide(); // 隐藏 取消 按钮
        //     // $('#btn-check-coupon').show(); // 显示 检查 按钮
        // });



    </script>
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
