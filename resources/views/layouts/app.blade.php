<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '') 欢迎来到凑学</title>
    <meta name="description" content="@yield('description', '凑学')" />
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('styles')


</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts._footer')
</div>

<!-- JS -->
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>

<script>
    $(document).ready(function () {
        // 监听创建订单按钮的点击事件
        $('.btn-create-order').click(function () {

            //传入当前文件的id
            var req = {
                // file_share_id: $('#order-form').find('input[name=file_share_id]').val,
                file_share_id: 38,
            };

            axios.post('{{ route('orders.store') }}', req)
                .then(function (response) {
                    swal('订单提交成功', '', 'success');
                }, function (error) {
                    if (error.response.status === 422) {
                        // http 状态码为 422 代表用户输入校验失败
                        var html = '<div>';
                        _.each(error.response.data.errors, function (errors) {
                            _.each(errors, function (error) {
                                html += error+'<br>';
                            })
                        });
                        html += '</div>';
                        swal({content: $(html)[0], icon: 'error'})
                    } else {
                        // 其他情况应该是系统挂了
                        swal('系统错误', '', 'error');
                    }
                });
        });

    });
</script>

<script>
    {{--$(document).ready(function () {--}}
    {{--    // 监听创建订单按钮的点击事件--}}
    {{--    $('.btn-create-order').click(function () {--}}

    {{--        //传入当前文件的id--}}
    {{--        var req = {--}}
    {{--            file_share_id: $('#order-form').find('input[name=file_share_id]').val,--}}
    {{--        };--}}
    {{--        // 构建请求参数，将用户选择的地址的 id 和备注内容写入请求参数--}}
    {{--        // var req = {--}}
    {{--        //     address_id: $('#order-form').find('select[name=address]').val(),--}}
    {{--        //     items: [],--}}
    {{--        //     remark: $('#order-form').find('textarea[name=remark]').val(),--}}
    {{--        // };--}}
    {{--        // 遍历 <table> 标签内所有带有 data-id 属性的 <tr> 标签，也就是每一个购物车中的商品 SKU--}}
    {{--        // $('table tr[data-id]').each(function () {--}}
    {{--        //     // 获取当前行的单选框--}}
    {{--        //     var $checkbox = $(this).find('input[name=select][type=checkbox]');--}}
    {{--        //     // 如果单选框被禁用或者没有被选中则跳过--}}
    {{--        //     if ($checkbox.prop('disabled') || !$checkbox.prop('checked')) {--}}
    {{--        //         return;--}}
    {{--        //     }--}}
    {{--        //     // 获取当前行中数量输入框--}}
    {{--        //     var $input = $(this).find('input[name=amount]');--}}
    {{--        //     // 如果用户将数量设为 0 或者不是一个数字，则也跳过--}}
    {{--        //     if ($input.val() == 0 || isNaN($input.val())) {--}}
    {{--        //         return;--}}
    {{--        //     }--}}
    {{--        //     // 把 SKU id 和数量存入请求参数数组中--}}
    {{--        //     req.items.push({--}}
    {{--        //         sku_id: $(this).data('id'),--}}
    {{--        //         amount: $input.val(),--}}
    {{--        //     })--}}
    {{--        // });--}}
    {{--        axios.post('{{ route('orders.store') }}', req)--}}
    {{--            // .then(function (response) {--}}
    {{--            //     swal('订单提交成功', '', 'success');--}}
    {{--            // }, function (error) {--}}
    {{--            //     if (error.response.status === 422) {--}}
    {{--            //         // http 状态码为 422 代表用户输入校验失败--}}
    {{--            //         var html = '<div>';--}}
    {{--            //         _.each(error.response.data.errors, function (errors) {--}}
    {{--            //             _.each(errors, function (error) {--}}
    {{--            //                 html += error+'<br>';--}}
    {{--            //             })--}}
    {{--            //         });--}}
    {{--            //         html += '</div>';--}}
    {{--            //         swal({content: $(html)[0], icon: 'error'})--}}
    {{--            //     } else {--}}
    {{--            //         // 其他情况应该是系统挂了--}}
    {{--            //         swal('系统错误', '', 'error');--}}
    {{--            //     }--}}
    {{--            // });--}}
    {{--    });--}}

    {{--    // 监听 移除 按钮的点击事件--}}
    {{--    // $('.btn-remove').click(function () {--}}
    {{--    //     // $(this) 可以获取到当前点击的 移除 按钮的 jQuery 对象--}}
    {{--    //     // closest() 方法可以获取到匹配选择器的第一个祖先元素，在这里就是当前点击的 移除 按钮之上的 <tr> 标签--}}
    {{--    //     // data('id') 方法可以获取到我们之前设置的 data-id 属性的值，也就是对应的 SKU id--}}
    {{--    //     var id = $(this).closest('tr').data('id');--}}
    {{--    //     swal({--}}
    {{--    //         title: "确认要将该商品移除？",--}}
    {{--    //         icon: "warning",--}}
    {{--    //         buttons: ['取消', '确定'],--}}
    {{--    //         dangerMode: true,--}}
    {{--    //     })--}}
    {{--    //         .then(function(willDelete) {--}}
    {{--    //             // 用户点击 确定 按钮，willDelete 的值就会是 true，否则为 false--}}
    {{--    //             if (!willDelete) {--}}
    {{--    //                 return;--}}
    {{--    //             }--}}
    {{--    //             axios.delete('/cart/' + id)--}}
    {{--    //                 .then(function () {--}}
    {{--    //                     location.reload();--}}
    {{--    //                 })--}}
    {{--    //         });--}}
    {{--    // });--}}

    {{--});--}}
</script>

@yield('scripts')



</body>
</html>
