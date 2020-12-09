<?php

namespace App\Admin\Controllers;

use App\Models\Section;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Section';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Section());

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

        $grid->column('chapter_id', __('隶属章节'))
            ->display(function (){
                if (isset($this->chapter->chapter_name)){
                    return $this->chapter->chapter_name;
                }
        });

        $grid->column('section_name', __('小节名'));
        $grid->column('section_introduce', __('小节介绍'));
        //$grid->column('section_detail', __('小节详情'));
        $grid->column('is_open', __('是否公开'));
        $grid->column('is_charge', __('是否付费'));
//        $grid->column('read_count', __('Read count'));
//        $grid->column('read_times', __('Read times'));
//        $grid->column('collect_count', __('Collect count'));
//        $grid->column('forward_count', __('Forward count'));
//        $grid->column('pay_count', __('Pay count'));
//        $grid->column('clock_count', __('Clock count'));
//        $grid->column('comment_count', __('Comment count'));
//        $grid->column('problem_count', __('Problem count'));
//        $grid->column('reply_count', __('Reply count'));
//        $grid->column('care', __('Care'));
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
        $show = new Show(Section::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('chapter_id', __('Chapter id'));
        $show->field('section_name', __('Section name'));
        $show->field('section_introduce', __('Section introduce'));
        $show->field('section_detail', __('Section detail'));
        $show->field('is_open', __('Is open'));
        $show->field('is_charge', __('Is charge'));
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
        $form = new Form(new Section());

        $form->select('course_id', '关联的教程')->options(function (){
            return DB::table('courses')->pluck('course_name','id');
        })->load('edition_id', '/admin/ed');

        $form->select('edition_id', '隶属教程版本')->options(function ($id){
            return DB::table('editions')->where('id',$id)->pluck("edition_version",'id');
        })->load('chapter_id', '/admin/cha');

        $form->select('chapter_id', '隶属章节')->options(function ($id){
            return DB::table('chapters')->where('id',$id)->pluck("chapter_name",'id');
        });


//        $courses = DB::table('courses')->pluck('care','id');
//        $form->select('course_id', '关联的教程')->options($courses);
//
//        $editions = DB::table('editions')->pluck('care','id');
//        $form->select('edition_id', '隶属教程版本')->options($editions);
//
//        $chapters = DB::table('chapters')->pluck('care','id');
//        $form->select('chapter_id', '当前小节隶属的章节')->options($chapters);

        //$form->number('chapter_id', __('Chapter id'));
        $form->text('section_name', __('小节名'));
        $form->textarea('section_introduce', __('小节介绍'));
        $form->editor('section_detail', __('小节正文'));

        $form->radio('is_open', __('小节是否公开'))->options(['1' => '公开', '0'=> '不公开'])->default('0');
        $form->radio('is_charge', __('小节是否收费'))->options(['1' => '公开', '0'=> '不公开'])->default('1');

        // $form->switch('is_open', __('是否公开'));
        // $form->switch('is_charge', __('是否付费'))->default(1);
//        $form->number('read_count', __('Read count'));
//        $form->number('read_times', __('Read times'));
//        $form->number('collect_count', __('Collect count'));
//        $form->number('forward_count', __('Forward count'));
//        $form->number('pay_count', __('Pay count'));
//        $form->number('clock_count', __('Clock count'));
//        $form->number('comment_count', __('Comment count'));
//        $form->number('problem_count', __('Problem count'));
//        $form->number('reply_count', __('Reply count'));
        $form->text('care', __('内部备注'));
        $form->number('order', __('自定义排序号'));
        // $form->textarea('excerpt', __('Excerpt'));
        // $form->text('slug', __('Slug'));

        return $form;
    }

    public function ed(Request $request)
    {
        $provinceId = $request->get('q');
        return DB::table('editions')->where('course_id',$provinceId)->get(['id', DB::raw('edition_version as text')]);
    }

    public function cha(Request $request)
    {
        $provinceId = $request->get('q');
        return DB::table('chapters')->where('edition_id',$provinceId)->get(['id', DB::raw('chapter_name as text')]);
    }

    public function store()
    {


        $data = \request()->all();

        //富文本图片转码储存
        $data['section_detail'] = base64ToFile(\request()['section_detail']);

        //获取教程名
        $course = DB::table('courses')->where('id' , $data['course_id'])->pluck('course_name');
        $arr = json_decode($course);
        $course_name = implode('-',$arr);

        //获取版本号
        $edition = DB::table('editions')->where('id', $data['edition_id'])->pluck('edition_version');
        $arr = json_decode($edition);
        $edition_version = implode('-',$arr);

        //获取章节名
        $chapter = DB::table('chapters')->where('id', $data['chapter_id'])->pluck('chapter_name');
        $arr = json_decode($chapter);
        $chapter_name = implode('-',$arr);


        //内部备注自动处理
        $data['care'] = '【'.$course_name.'】-【版本号'.$edition_version.'】-【章节：'.$chapter_name.'】-【小节：'.$data['section_name'].'】---内部备注：'.$data['care'];

        //parent::store();


        //创建成功后,返回成功对象
        $section = Section::create($data);
        return redirect()->route('sections.create');

//         //$editions = $data['edition'];
//         //dd($editions);
//         //$course->addEditions($editions);    //写入关联

// //        dd($data);
// //        parent::store();

//         return redirect()->route('courses.create');
//         //return $this->redirectAfterStore();
    }
}
