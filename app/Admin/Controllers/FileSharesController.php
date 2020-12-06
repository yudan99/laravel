<?php

namespace App\Admin\Controllers;

use App\Http\Requests\FileShareRequest;
use App\Models\Fiel;
use App\Models\FileShare;
use App\Models\Model;
use Barryvdh\Debugbar\DataCollector\ModelsCollector;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use App\Handlers\FileUploadHandler;
use App\Handlers\Base64ToFileHandler;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public function fiels()
    {
        return $this->belongsToMany(Fiel::class);
    }
}

class FileSharesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文件分享管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

//    public function index(Content $content)
//    {
//        return $content->header('文件分享管理')->body($this->grid());
//    }

    protected function grid()
    {
        $grid = new Grid(new FileShare());

        //$grid->id('ID')->sortable();
        $grid->column('id', __('ID'));
        $grid->column('user_id', __('用户ID'));

        $grid->column('file_verify', __('文件审核'));
        $grid->column('file_status', __('文件状态'));
        $grid->column('file_type', __('文件类型'));
        $grid->column('file_introduction', __('File introduction'));
        $grid->column('fiels', __('领域'));
        $grid->column('tags', __('个性Tags'));
//        $grid->column('video_preview', __('Video preview'));
//        $grid->column('pic_preview', __('Pic preview'));
//        $grid->column('tem_path', __('Tem path'));
//        $grid->column('st_path', __('St path'));
//        $grid->column('ini_price', __('Ini price'));
//        $grid->column('cur_price', __('Cur price'));
//        $grid->column('read_count', __('Read count'));
//        $grid->column('read_times', __('Read times'));
//        $grid->column('collect_count', __('Collect count'));
//        $grid->column('forward_count', __('Forward count'));
//        $grid->column('pay_count', __('Pay count'));
//        $grid->column('down_count', __('Down count'));
//        $grid->column('down_times', __('Down times'));
//        $grid->column('email_count', __('Email count'));
//        $grid->column('email_times', __('Email times'));
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
        $show = new Show(FileShare::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('sh_time', __('Sh time'));
        $show->field('sub_time', __('Sub time'));
        $show->field('file_verify', __('File verify'));
        $show->field('file_status', __('File status'));
        $show->field('file_type', __('File type'));
        $show->field('file_introduction', __('File introduction'));
        $show->field('fiels', __('Fiels'));
        $show->field('tags', __('Tags'));
        $show->field('video_preview', __('Video preview'));
        $show->field('pic_preview', __('Pic preview'));
        $show->field('tem_path', __('Tem path'));
        $show->field('st_path', __('St path'));
        $show->field('ini_price', __('Ini price'));
        $show->field('cur_price', __('Cur price'));
        $show->field('read_count', __('Read count'));
        $show->field('read_times', __('Read times'));
        $show->field('collect_count', __('Collect count'));
        $show->field('forward_count', __('Forward count'));
        $show->field('pay_count', __('Pay count'));
        $show->field('down_count', __('Down count'));
        $show->field('down_times', __('Down times'));
        $show->field('email_count', __('Email count'));
        $show->field('email_times', __('Email times'));
        $show->field('order', __('Order'));
        $show->field('excerpt', __('Excerpt'));
        $show->field('slug', __('Slug'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.laravel\vendor\encore\laravel-admin\src\Form.php
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FileShare());

        $form->number('user_id', __('文件归属用户'))->default(1);
//        $form->datetime('sh_time', __('Sh time'))->default(date('Y-m-d H:i:s'));
//        $form->datetime('sub_time', __('Sub time'))->default(date('Y-m-d H:i:s'));
//        $form->number('file_verify', __('File verify'));
//        $form->text('file_status', __('File status'));
//        $form->text('file_type', __('File type'));

        $form->ckeditor('file_introduction', __('文件详情描述'))->default('测试666');

        //$form->checkbox('on_sale', '上架')->options(['1' => '是', '0'=> '否'])->default('0');




        $fiels = DB::table('fiels')->where('level','!=',0)->pluck('name','id');
        $form->checkbox('fiels', '领域')->options($fiels);

        //$form->multipleSelect('fiels',__('领域'))->options(Fiel::all()->pluck('name','id'));
        //$form->checkbox('fiels', '领域')->options(Fiel::all()->pluck('name','id'));

        $form->text('tags', __('Tags'))->default('测试666');
        $form->text('video_preview', __('Video preview'))->default('测试666');
        $form->text('pic_preview', __('Pic preview'))->default('测试666');

        //$form->file('tem_path', __('文件上传'));

        // 修改文件上传路径和文件名
        $form->file('tem_path','文件上传');

        //$form->text('st_path', __('St path'));

        $form->decimal('ini_price', __('起步价'))->default(2.00);
        $form->decimal('cur_price', __('现价'))->default(2.00);

//        $form->number('read_count', __('Read count'));
//        $form->number('read_times', __('Read times'));
//        $form->number('collect_count', __('Collect count'));
//        $form->number('forward_count', __('Forward count'));
//        $form->number('pay_count', __('Pay count'));
//        $form->number('down_count', __('Down count'));
//        $form->number('down_times', __('Down times'));
//        $form->number('email_count', __('Email count'));
//        $form->number('email_times', __('Email times'));
//        $form->number('order', __('Order'));
//        $form->textarea('excerpt', __('Excerpt'));
//        $form->text('slug', __('Slug'));

        return $form;
    }

    public function store()
    {
        $data = \request()->all();



        $fiel_ids = $data['fiels'];
        $fiel_ids = array_filter($fiel_ids);    //过滤空值
        $data['fiels'] = $fiel_ids;
        //图片转码储存
        $data['file_introduction'] = Base64ToFileHandler::base64ToFile(\request()['file_introduction']);

        //增加对文件的判断和处理方式
        if ($_FILES) {
            $uploader = new FileUploadHandler();
            $st_path = $_FILES['tem_path']['name'];
            $data['st_path'] = $st_path;
            $data['file_type'] = strtolower(\request()->tem_path->getClientOriginalExtension());

            if (\request()->tem_path) {
                $result = $uploader->save(\request()->tem_path, 'tem_path', 'admin');
                //dd($result);
                if ($result) {
                    $data['tem_path'] = $result['tem_path'];
                }
            }
        }

        //创建成功后，回调写入多对多关联表

        $file_share = FileShare::create($data);
        $file_share->addFiel($fiel_ids);    //写入多对多关联


        return redirect()->route('file-shares.create');
        //return $this->redirectAfterStore();
    }

}
