<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('order_no', __('订单流水号'));
        $grid->column('user.name', __('买家'));
        $grid->column('total_amount', __('金额'));
        $grid->column('deal_amount', __('Deal amount'));
        $grid->column('deal_type', __('交易状态'));
        $grid->column('paid_at', __('支付时间'));
        $grid->column('paid_type', __('支付方式'));
        $grid->column('paid_no', __('支付平台流水号'));
        $grid->refund_status('退款状态')->display(function($value) {
            return Order::$refundStatusMap[$value];
        });
        // 禁用创建按钮，后台不需要创建订单
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            // 禁用删除和编辑按钮
            $actions->disableDelete();
            $actions->disableEdit();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_no', __('Order no'));
        $show->field('user_id', __('User id'));
        $show->field('total_amount', __('Total amount'));
        $show->field('deal_amount', __('Deal amount'));
        $show->field('deal_type', __('Deal type'));
        $show->field('paid_at', __('Paid at'));
        $show->field('paid_type', __('Paid type'));
        $show->field('paid_no', __('Paid no'));
        $show->field('refund_status', __('Refund status'));
        $show->field('refund_no', __('Refund no'));
        $show->field('is_closed', __('Is closed'));
        $show->field('is_open', __('Is open'));
        $show->field('remake', __('Remake'));
        $show->field('extra', __('Extra'));
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
        $form = new Form(new Order());

        $form->text('order_no', __('Order no'));
        $form->number('user_id', __('User id'));
        $form->decimal('total_amount', __('Total amount'))->default(0.00);
        $form->decimal('deal_amount', __('Deal amount'))->default(0.00);
        $form->text('deal_type', __('Deal type'));
        $form->datetime('paid_at', __('Paid at'))->default(date('Y-m-d H:i:s'));
        $form->text('paid_type', __('Paid type'));
        $form->text('paid_no', __('Paid no'));
        $form->text('refund_status', __('Refund status'))->default('pending');
        $form->text('refund_no', __('Refund no'));
        $form->switch('is_closed', __('Is closed'));
        $form->switch('is_open', __('Is open'))->default(1);
        $form->textarea('remake', __('Remake'));
        $form->textarea('extra', __('Extra'));

        return $form;
    }
}
