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

        $form->text('name', __('Name'));
        $form->text('code', __('Code'));
        $form->text('type', __('Type'));
        $form->decimal('value', __('Value'));
        $form->number('total', __('Total'));
        $form->number('used', __('Used'));
        $form->decimal('min_amount', __('Min amount'));
        $form->datetime('not_before', __('Not before'))->default(date('Y-m-d H:i:s'));
        $form->datetime('not_after', __('Not after'))->default(date('Y-m-d H:i:s'));
        $form->switch('enabled', __('Enabled'));

        return $form;
    }
}
