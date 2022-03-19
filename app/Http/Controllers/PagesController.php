<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }
//    关于我们
    public function about()
    {
        return view('pages.about');
    }
//    无权限提醒页面
    public function permissionDenied()
    {
        {
            // 如果当前用户有权限访问后台，直接跳转访问
            if (config('administrator.permission')()) {
                return redirect(url(config('administrator.uri')), 302);
            }
            // 否则使用视图
            return view('pages.permission_denied');
        }
    }
}
