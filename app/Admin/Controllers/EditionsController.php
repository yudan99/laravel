<?php

namespace App\Admin\Controllers;

use App\Models\Edition;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class EditionsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Edition';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Edition());

        $grid->column('id', __('Id'));
        $grid->column('course_id', __('Course id'));
        $grid->column('edition_version', __('Edition version'));
        $grid->column('edition_introduce', __('Edition introduce'));
        $grid->column('is_open', __('Is open'));
        $grid->column('is_newest', __('Is newest'));
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
        $show = new Show(Edition::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('course_id', __('Course id'));
        $show->field('edition_version', __('Edition version'));
        $show->field('edition_introduce', __('Edition introduce'));
        $show->field('is_open', __('Is open'));
        $show->field('is_newest', __('Is newest'));
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
        $form = new Form(new Edition());

        $courses = DB::table('courses')->pluck('course_name','id');
        $form->select('course_id', '关联的教程')->options($courses);

        //$form->number('course_id', __('关联的教程ID'));
        $form->decimal('edition_version', __('版本号'));
        $form->text('edition_introduce', __('版本介绍'));
        $form->radio('is_open', __('版本是否公开'))->options(['1' => '公开', '0'=> '不公开'])->default('0');
        //$form->switch('is_newest', __('Is newest'));
        $form->text('care', __('内部备注'));
        //$form->number('order', __('Order'));

        return $form;
    }

    // public function unicodeDecode($name){

    //     $json = '{"str":"'.$name.'"}';
    //     $arr = json_decode($json,true);
    //     if(empty($arr)) return '';
    //     return $arr['str'];

    // }

    public function store()
    {


        $data = \request()->all();

        $course = DB::table('courses')->where('id' , $data['course_id'])->pluck('course_name');
        $arr = json_decode($course);
        //$course_name = unicodeDecode($course);
        //$arr = array($course);
        $course_name = implode('-',$arr);


        //内部备注自动处理
        $data['care'] = '【'.$course_name.'】-【版本号'.$data['edition_version'].'】---内部备注：'.$data['care'];

        //dd($data);

        // parent::store();
        Edition::create($data);
        return redirect()->route('editions.create');


//         //创建成功后,返回成功对象
//         $course = Course::create($data);

//         //$editions = $data['edition'];
//         //dd($editions);
//         //$course->addEditions($editions);    //写入关联

// //        dd($data);
// //        parent::store();

//         return redirect()->route('courses.create');
//         //return $this->redirectAfterStore();
    }


}
