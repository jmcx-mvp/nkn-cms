<?php

namespace App\Admin\Controllers;

use App\News;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('新闻');
            $content->description('用来给官网提供展示新闻/新闻/公告等信息');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('修改新闻');
            $content->description('修改新闻的内容或状态（停用的新闻将不会在钱包显示）');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新建新闻');
            $content->description('新建的新闻(状态：启用)，会通过API直接暴露到调用了接口的web钱包公告列表中。');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(News::class, function (Grid $grid) {
            $grid->disableRowSelector();
            $grid->disableFilter();
            $grid->disableExport();

            $grid->id('ID')->sortable();

            $grid->column('title', '标题')->editable();
            $grid->column('focus_img_url', '展示图')->image('', 300, 100);
            $grid->column('summary', '摘要');
            $grid->column('status', '状态')->editable('select', [
                '1' => '启用',
                '0' => '禁用'
            ]);

            $grid->created_at();
            $grid->updated_at();

            $grid->actions(function ($actions) {
                $actions->disableDelete();
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(News::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('title', '标题');
            $form->image('focus_img_url', '展示图');
            $form->textarea('summary', '摘要');
            $form->editor('content', '内容');
            $form->select('status', '状态')->options([
                '1' => '启用',
                '0' => '停用'
            ])->default('1');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
