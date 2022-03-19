<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpandController extends Controller
{
//   校内地图
    public function schoolmap()
    {
        return view('pages.schoolmap');
    }
}
