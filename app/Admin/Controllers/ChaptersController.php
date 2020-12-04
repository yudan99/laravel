<?php

namespace App\Admin\Controllers;

use App\Models\Chapter;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class ChaptersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Chapter';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Chapter());

        $grid->column('id', __('Id'));
        $grid->column('edition_id', __('Edition id'));
        $grid->column('chapter_name', __('Chapter name'));
        $grid->column('chapter_introduce', __('Chapter introduce'));
        $grid->column('is_open', __('Is open'));
        $grid->column('care', __('Care'));
        $grid->column('order', __('Order'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Chapter::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('edition_id', __('Edition id'));
        $show->field('chapter_name', __('Chapter name'));
        $show->field('chapter_introduce', __('Chapter introduce'));
        $show->field('is_open', __('Is open'));
        $show->field('care', __('Care'));
        $show->field('order', __('Order'));
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
        $form = new Form(new Chapter());


// 当前admin版本不支持表单联动when方法
//        $courses = DB::table('courses')->pluck('id','course_name');
//        $form->select('edition_id','当前章节隶属的版本')->options($courses)->when('>',1, function (Form $form){
//            $editions = DB::table('editions')->where('course_id','=','id')->pluck('edition_version','id');
//            $form->select('edition_id', '隶属教程版本')->options($editions);
//        });

        $editions = DB::table('editions')->pluck('edition_version','id');
        $form->select('edition_id', '隶属教程版本')->options($editions);

        //$form->number('edition_id', __('隶属教程版本'));

        $form->text('chapter_name', __('章节名称'));
        $form->text('chapter_introduce', __('章节介绍'));
        $form->switch('is_open', __('是否公开'));
        $form->text('care', __('内部备注'));
        $form->number('order', __('排序号'));

        return $form;
    }
}
