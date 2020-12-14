<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderItemsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderItem';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderItem());

        //$grid->column('id', __('Id'));

        $grid->column('order.order_no', __('订单号'));

        $grid->column('order_id', __('买家'))->display(function (){
            return $this->order->user->name;
        });

        //$grid->column('product_type', __('商品类型'));

        $grid->product_type('商品类型')->display(function($value) {
            return OrderItem::$productTypeMap[$value];
        });

        $grid->column('product_name', __('商品名'))->display(function (){
            switch ($this->product_type){
                case OrderItem::PRODUCT_FILE:
                    return $this->fileShare->st_path;
                    break;
                case OrderItem::PRODUCT_COURSE:
                    return $this->course->course_name;
                    break;
//            case 'PRODUCT_MEM':
//                return $this->course->course_name;
//                break;
            }
        });

//        $grid->refund_status('退款状态')->display(function($value) {
//            return Order::$refundStatusMap[$value];
//        });



//        switch ($this->product_type){
//            case 'RPODUCT_FILE':
//                $grid->column('file_share_id', __('商品名'))->display(function (){
//                    return $this->fileShare->st_path;
//                });
//                break;
//            case 'PRODUCT_COURSE':
//                $grid->column('course_id', __('商品名'))->display(function (){
//                    return $this->course->course_name;
//                });
//                break;
////            case 'PRODUCT_MEM':
////                $grid->column('course_id', __('商品名'))->display(function (){
////                    return $this->course->course_name;
////                });
////                break;
//        }



//        $grid->column('course_id', __('课程名'));
//        $grid->column('mem_id', __('会员名'));
//        $grid->column('amount', __('数量'));
        $grid->column('price', __('价格'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('order.paid_at', __('支付时间'))->display(function (){
            if ($this->order->paid_at){

                return $this->order->paid_type.' | '.$this->order->paid_at;
            }else{
                return '未支付';
            }
        });
        //$grid->column('updated_at', __('更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(OrderItem::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_id', __('Order id'));
        $show->field('product_type', __('Product type'));
        $show->field('file_share_id', __('File share id'));
        $show->field('course_id', __('Course id'));
        $show->field('mem_id', __('Mem id'));
        $show->field('amount', __('Amount'));
        $show->field('price', __('Price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderItem());

        $form->number('order_id', __('Order id'));
        $form->text('product_type', __('Product type'));
        $form->number('file_share_id', __('File share id'));
        $form->number('course_id', __('Course id'));
        $form->number('mem_id', __('Mem id'));
        $form->number('amount', __('Amount'))->default(1);
        $form->decimal('price', __('Price'))->default(0.00);

        return $form;
    }
}
