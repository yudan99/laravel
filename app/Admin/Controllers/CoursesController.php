<?php

namespace App\Admin\Controllers;

use App\Models\Course;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CoursesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Course';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Course());

        $grid->column('id', __('Id'));
        $grid->column('course_name', __('Course name'));
        //$grid->column('fiels', __('Fiels'));
        //$grid->column('tags', __('Tags'));
        //$grid->column('cover', __('Cover'));
        $grid->column('author', __('Author'));
        $grid->column('course_introduce', __('Course introduce'));
        $grid->column('ini_price', __('Ini price'));
        $grid->column('cur_price', __('Cur price'));
        $grid->column('is_open', __('Is open'));
        $grid->column('read_count', __('Read count'));
        $grid->column('read_times', __('Read times'));
        $grid->column('collect_count', __('Collect count'));
        $grid->column('forward_count', __('Forward count'));
        $grid->column('pay_count', __('Pay count'));
        $grid->column('clock_count', __('Clock count'));
        $grid->column('comment_count', __('Comment count'));
        $grid->column('problem_count', __('Problem count'));
        $grid->column('reply_count', __('Reply count'));
        $grid->column('care', __('Care'));
//        $grid->column('order', __('Order'));
//        $grid->column('excerpt', __('Excerpt'));
//        $grid->column('slug', __('Slug'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Course::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('course_name', __('Course name'));
        $show->field('fiels', __('Fiels'));
        $show->field('tags', __('Tags'));
        $show->field('cover', __('Cover'));
        $show->field('author', __('Author'));
        $show->field('course_introduce', __('Course introduce'));
        $show->field('ini_price', __('Ini price'));
        $show->field('cur_price', __('Cur price'));
        $show->field('is_open', __('Is open'));
        $show->field('read_count', __('Read count'));
        $show->field('read_times', __('Read times'));
        $show->field('collect_count', __('Collect count'));
        $show->field('forward_count', __('Forward count'));
        $show->field('pay_count', __('Pay count'));
        $show->field('clock_count', __('Clock count'));
        $show->field('comment_count', __('Comment count'));
        $show->field('problem_count', __('Problem count'));
        $show->field('reply_count', __('Reply count'));
        $show->field('care', __('Care'));
        $show->field('order', __('Order'));
        $show->field('excerpt', __('Excerpt'));
        $show->field('slug', __('Slug'));
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
        $form = new Form(new Course());

        $form->text('course_name', __('Course name'));
        $form->text('fiels', __('Fiels'));
        $form->text('tags', __('Tags'));
        $form->image('cover', __('Cover'));
        $form->text('author', __('Author'));
        $form->textarea('course_introduce', __('Course introduce'));
        $form->decimal('ini_price', __('Ini price'))->default(0.00);
        $form->decimal('cur_price', __('Cur price'))->default(0.00);
        $form->switch('is_open', __('Is open'));
        $form->number('read_count', __('Read count'));
        $form->number('read_times', __('Read times'));
        $form->number('collect_count', __('Collect count'));
        $form->number('forward_count', __('Forward count'));
        $form->number('pay_count', __('Pay count'));
        $form->number('clock_count', __('Clock count'));
        $form->number('comment_count', __('Comment count'));
        $form->number('problem_count', __('Problem count'));
        $form->number('reply_count', __('Reply count'));
        $form->text('care', __('Care'));
        $form->number('order', __('Order'));
        $form->textarea('excerpt', __('Excerpt'));
        $form->text('slug', __('Slug'));

        return $form;
    }
}
