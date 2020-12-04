<?php

namespace App\Admin\Controllers;

use App\Models\Section;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
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
        $grid->column('chapter_id', __('Chapter id'));
        $grid->column('section_name', __('Section name'));
        $grid->column('section_introduce', __('Section introduce'));
        $grid->column('section_detail', __('Section detail'));
        $grid->column('is_open', __('Is open'));
        $grid->column('is_charge', __('Is charge'));
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
        $grid->column('order', __('Order'));
        $grid->column('excerpt', __('Excerpt'));
        $grid->column('slug', __('Slug'));
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

        $chapters = DB::table('chapters')->pluck('chapter_name','id');
        $form->select('chapter_id', '当前小节隶属的章节')->options($chapters);

        //$form->number('chapter_id', __('Chapter id'));
        $form->text('section_name', __('小节名'));
        $form->textarea('section_introduce', __('小节介绍'));
        $form->quill('section_detail', __('小节正文'));
        $form->switch('is_open', __('是否公开'));
        $form->switch('is_charge', __('是否付费'))->default(1);
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

    public function store()
    {


        $data = \request()->all();

        //富文本图片转码储存
        $data['section_detail'] = base64ToFile(\request()['section_detail']);

        parent::store();


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
