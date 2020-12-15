<?php

namespace App\Admin\Controllers;

use App\Models\CouponCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CouponCodesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CouponCode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponCode());

        //默认按时间倒序排序
        $grid->model()->orderBy('created_at','desc');

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('兑换码名称'));
        $grid->column('code', __('兑换码'));

        $grid->description('描述');

        $grid->column('type', __('类型'))->display(function ($value){
            return CouponCode::$typeMap[$value];
        });

//        $grid->column('value', __('折扣'))->display(function ($value){
//            return $this->type === CouponCode::TYPE_FIXED ? '￥'.$value : $value.'%';
//        });

        $grid->column('usage','已使用')->display(function ($value){
           return "{$this->used} / {$this->total}";
        });
//        $grid->column('total', __('发放数'));
//        $grid->column('used', __('已用数'));

        $grid->column('min_amount', __('最低金额可用'));
//        $grid->column('not_before', __('Not before'));
//        $grid->column('not_after', __('Not after'));
        $grid->column('enabled', __('是否生效'))->display(function ($value){
            return $value?'是':'否';
        });

        $grid->column('created_at', __('创建时间'));

        //不要显示actions详情视图
        $grid->actions(function ($actions) {
            $actions->disableView();
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
        $show = new Show(CouponCode::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('code', __('Code'));
        $show->field('type', __('Type'));
        $show->field('value', __('Value'));
        $show->field('total', __('Total'));
        $show->field('used', __('Used'));
        $show->field('min_amount', __('Min amount'));
        $show->field('not_before', __('Not before'));
        $show->field('not_after', __('Not after'));
        $show->field('enabled', __('Enabled'));
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
        $form = new Form(new CouponCode());

        $form->display('id','优惠券ID');

        $form->text('name', __('优惠码名称'))->rules('required');
        $form->text('code', __('优惠码'))->rules(function($form) {
            // 如果 $form->model()->id 不为空，代表是编辑操作
            if ($id = $form->model()->id) {
                return 'required|unique:coupon_codes,code,'.$id.',id';
            } else {
                return 'required|unique:coupon_codes';
            }
        });
        //->rules('required|unique:coupon_codes');


        $form->radio('type', __('类型'))->options(CouponCode::$typeMap)->rules('required')->default(CouponCode::TYPE_FIXED);



        $form->text('value', __('折扣'))->rules(function ($form){
            if (request()->input('type') === CouponCode::TYPE_PERCENT){
                return 'required|numeric|between:1,99';
            }else{
                return 'required|numeric|min:0.01';
            }
        });

        $form->number('total', __('发放总量'))->rules('required|numeric|min:0');
        //$form->number('used', __('Used'));
        $form->decimal('min_amount', __('最低使用金额'))->rules('required|numeric|min:0');

        $form->datetime('not_before', __('开始时间'))->default(date('Y-m-d H:i:s'));
        $form->datetime('not_after', __('结束时间'))->default(date('Y-m-d H:i:s'));

        $form->switch('enabled', __('是否生效'))->options(['1' => '是', '0' => '否'])->default(1);

        return $form;
    }
}
