<?php

namespace App\Admin\Controllers;

use App\Emails;

use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class EmailController extends Controller
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

            $content->header('订阅列表');
            $content->description('用来给展示订阅邮箱');

            $content->body($this->grid());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Emails::class, function (Grid $grid) {
            $grid->disableCreation();
            $grid->disableRowSelector();
            $grid->disableFilter();
            $grid->disableExport();
            $grid->disableActions();

            $grid->id('ID')->sortable();

            $grid->column('address', '邮箱地址');
            $grid->column('created_at', '申请时间');
        });
    }
}
