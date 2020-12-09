<?php

namespace App\Admin\Controllers;

use App\Handlers\Base64ToFileHandler;
use App\Models\Chapter;
use App\Models\Edition;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;

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
        $grid->column('course_id', __('隶属教程'))
            ->display(function (){
            return $this->course->course_name;
        });

        $grid->column('edition_id', __('隶属教程版本'))
            ->display(function (){
            if (isset($this->edition->edition_version)){
                return $this->edition->edition_version;
            }
        });

        $grid->column('chapter_name', __('章节名'));
        $grid->column('chapter_introduce', __('章节介绍'));
        $grid->column('is_open', __('是否公开'));
//        $grid->column('care', __('Care'));
//        $grid->column('order', __('Order'));
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

        $form->select('course_id', '关联的教程')->options(function (){
            return DB::table('courses')->pluck('course_name','id');
        })->load('edition_id', '/admin/ed');

        $form->select('edition_id', '隶属教程版本')->options(function ($id){
            return DB::table('editions')->where('id',$id)->pluck("edition_version",'id');
        });

        $form->text('chapter_name', __('章节名称'));
        $form->text('chapter_introduce', __('章节介绍'));
        $form->radio('is_open', __('章节是否公开'))->options(['1' => '公开', '0'=> '不公开'])->default('0');
        $form->text('care', __('内部备注'));
        $form->number('order', __('排序号'));

        $form->confirm('确定提交吗？');

        return $form;
    }

    public function ed(Request $request)
    {
        $provinceId = $request->get('q');
        return DB::table('editions')->where('course_id',$provinceId)->get(['id', DB::raw('edition_version as text')]);
    }

//    public function store()
//    {
//
//
//        $data = \request()->all();
//
//        //获取教程名
//        $course = DB::table('courses')->where('id' , $data['course_id'])->pluck('course_name');
//        $arr = json_decode($course);
//        $course_name = implode('-',$arr);
//
//        //获取版本号
//        $edition = DB::table('editions')->where('id', $data['edition_id'])->pluck('edition_version');
//        $arr = json_decode($edition);
//        $edition_version = implode('-',$arr);
//
//
//        //内部备注自动处理
//        $data['care'] = '【'.$course_name.'】-【版本号'.$edition_version.'】-【章节：'.$data['chapter_name'].'】---内部备注：'.$data['care'];
//
//        //dd($data);
//
//        // parent::store();
//        Chapter::create($data);
//        return redirect()->route('chapters.create');
//
//
////         //创建成功后,返回成功对象
////         $course = Course::create($data);
//
////         //$editions = $data['edition'];
////         //dd($editions);
////         //$course->addEditions($editions);    //写入关联
//
//// //        dd($data);
//// //        parent::store();
//
////         return redirect()->route('courses.create');
////         //return $this->redirectAfterStore();
//    }
}
