<?php

namespace App\Admin\Controllers;

use App\Handlers\Base64ToFileHandler;
use App\Handlers\AvatarUploadHandler;
use App\Handlers\FileUploadHandler;
use App\Models\Course;
use App\Models\FileShare;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Form\Field;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        // $grid->column('read_count', __('Read count'));
        // $grid->column('read_times', __('Read times'));
        // $grid->column('collect_count', __('Collect count'));
        // $grid->column('forward_count', __('Forward count'));
        // $grid->column('pay_count', __('Pay count'));
        // $grid->column('clock_count', __('Clock count'));
        // $grid->column('comment_count', __('Comment count'));
        // $grid->column('problem_count', __('Problem count'));
        // $grid->column('reply_count', __('Reply count'));
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

        $form->text('course_name', __('教程名'))->rules('required')->default('这是一段教程名');
        //$form->text('fiels', __('Fiels'));
        //$form->text('tags', __('Tags'));
        $form->image('cover', __('教程封面'))->rules('required|image');
        $form->text('author', __('作者信息'))->default('小黑猪&小粉猪');


        $form->quill('course_introduce', __('教程介绍'))->default('这是一段教程介绍');
        $form->decimal('ini_price', __('初始价'))->default(19.80);
        $form->decimal('cur_price', __('现价'))->default(25.80);

//        $states = [
//            'on'  => ['value' => 1, 'text' => '公开', 'color' => 'success'],
//            'off' => ['value' => 0, 'text' => '不公开', 'color' => 'danger'],
//        ];
//        $form->switch('is_open', __('教程是否公开'))->states($states);

        $form->radio('is_open', __('教程是否公开'))->options(['1' => '公开', '0'=> '不公开'])->default('0');

//        $form->number('read_count', __('Read count'));
//        $form->number('read_times', __('Read times'));
//        $form->number('collect_count', __('Collect count'));
//        $form->number('forward_count', __('Forward count'));
//        $form->number('pay_count', __('Pay count'));
//        $form->number('clock_count', __('Clock count'));
//        $form->number('comment_count', __('Comment count'));
//        $form->number('problem_count', __('Problem count'));
//        $form->number('reply_count', __('Reply count'));

        $form->text('care', __('补充备注'))->default('这是一段教程备注');


        // 直接添加一对多的关联模型
//        $form->hasMany('edition', '教程版本', function (Form\NestedForm $form) {
//            $form->text('edition_version', '版本号')->rules('required')->default('1.22');
//            $form->text('edition_introduce', '版本描述')->rules('required')->default('这是一段版本描述');
//            $form->radio('is_open', __('版本是否公开'))->options(['1' => '公开', '0'=> '不公开'])->default('0');
//            $form->text('care', '版本备注')->default('这是一段版本备注');
//        });


        //$form->number('order', __('Order'));
        //$form->textarea('excerpt', __('Excerpt'));
        //$form->text('slug', __('Slug'));

        return $form;
    }

    public function store()
    {


        $data = \request()->all();

        //对领域多选的处理
//        $fiel_ids = $data['fiels'];
//        $fiel_ids = array_filter($fiel_ids);    //过滤空值
//        $data['fiels'] = $fiel_ids;

        //富文本图片转码储存
        $data['course_introduce'] = Base64ToFileHandler::base64ToFile(\request()['course_introduce']);

        //对封面图片的处理和存储
        if (\request()->cover){
            $img = new AvatarUploadHandler();
            $result = $img->save(\request()->cover, 'cover', 'admin',400);
            if ($result){
                $data['cover'] = $result['path'];
            }
        }

         //内部备注自动处理
         $data['care'] = '【'.$data['course_name'].'】---内部备注：'.$data['care'];


        //创建成功后,返回成功对象
        $course = Course::create($data);

        //$editions = $data['edition'];
        //dd($editions);
        //$course->addEditions($editions);    //写入关联

//        dd($data);
//        parent::store();

        return redirect()->route('courses.create');
        //return $this->redirectAfterStore();
    }

}
