<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic,Link $link)
    {
//        $topics=Topic::where('category_id',$category->id)->paginate(20);
        $topics=$topic->withOrder($request->order)->where('category_id',$category->id)->paginate(20);
//        资源链接
        $links=$link->getAllCached();
        return view('topics.index',compact('topics','category','links'));
    }
}
