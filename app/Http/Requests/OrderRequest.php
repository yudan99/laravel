<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Models\OrderItem;

class OrderRequest extends Request
{
//    public function rules()
//    {
//        return [
//            // 判断用户提交的地址 ID 是否存在于数据库并且属于当前用户
//            // 后面这个条件非常重要，否则恶意用户可以用不同的地址 ID 不断提交订单来遍历出平台所有用户的收货地址
////            'address_id' => [
////                'required',
////                Rule::exists('user_addresses', 'id')->where('user_id', $this->user()->id),
////            ],
//            'order_items' => ['required', 'array'],
//            'order_items.*.id' => [ // 检查 items 数组下每一个子数组的 id 参数
//                'required',
//                function ($attribute, $value, $fail) {
//                    if (!$item = OrderItem::find($value)) {
//                        return $fail('该内容不存在');
//                    }
//
//                    switch ($item->product_type){
//                        case 'PRODUCT_FILE':
//                            if (!$item->file_share->is_open){
//                                return $fail('该内容未公开');
//                            }
//                            break;
//                        case 'PRODUCT_COURSE':
//                            if (!$item->course->is_open){
//                                return $fail('该内容未公开');
//                            }
//                            break;
//                        case 'PRODUCT_MEM':
//                            if (!$item->mem->is_open){
//                                return $fail('该内容未公开');
//                            }
//                            break;
//                        default:
//                            return $fail('当前内容存在内容异常');
//                    }
//
//                    // 获取当前索引
////                    preg_match('/items\.(\d+)\.*_id/', $attribute, $m);
////                    $index = $m[1];
////                    // 根据索引找到用户所提交的购买数量
////                    $amount = $this->input('items')[$index]['amount'];
////                    if ($amount > 0 && $amount > $sku->stock) {
////                        return $fail('该商品库存不足');
////                    }
//                },
//            ],
//            'items.*.amount' => ['required', 'integer', 'min:1'],
//        ];
//    }

    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
