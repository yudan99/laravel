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

        $courses = DB::table('courses')->pluck('care','id');
        $form->select('course_id', '关联的教程')->options($courses);

        $editions = DB::table('editions')->pluck('care','id');
        $form->select('edition_id', '隶属教程版本')->options($editions);

        //$form->number('edition_id', __('隶属教程版本'));

        $form->text('chapter_name', __('章节名称'));
        $form->text('chapter_introduce', __('章节介绍'));
        $form->radio('is_open', __('章节是否公开'))->options(['1' => '公开', '0'=> '不公开'])->default('0');
        $form->text('care', __('内部备注'));
        $form->number('order', __('排序号'));

        return $form;
    }

    public function store()
    {


        $data = \request()->all();

        //获取教程名
        $course = DB::table('courses')->where('id' , $data['course_id'])->pluck('course_name');
        $arr = json_decode($course);
        $course_name = implode('-',$arr);

        //获取版本号
        $edition = DB::table('editions')->where('id', $data['edition_id'])->pluck('edition_version');
        $arr = json_decode($edition);
        $edition_version = implode('-',$arr);


        //内部备注自动处理
        $data['care'] = '【'.$course_name.'】-【版本号'.$edition_version.'】-【章节：'.$data['chapter_name'].'】---内部备注：'.$data['care'];

        //dd($data);

        // parent::store();
        Chapter::create($data);
        return redirect()->route('chapters.create');


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
