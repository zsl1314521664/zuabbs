<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\Category;
use App\Models\Link;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','search']]);
    }

	public function index(Request $request,Topic $topic,Link $link)
	{
//		$topics = Topic::with('user','category')->paginate(30);
//        航友圈分页
        $topics=$topic->withOrder($request->order)->paginate(8);
        $links=$link->getAllCached();
		return view('topics.index', compact('topics','links'));
	}

    public function show(Topic $topic,Link $link)
    {
        $links=$link->getAllCached();
        return view('topics.show', compact('topic','links'));
    }

	public function create(Topic $topic)
	{
	    $categories=Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function store(TopicRequest $request,Topic $topic)
	{
	    $topic->fill($request->all());
//		$topic = Topic::create($request->all());
        $topic->user_id=Auth::id();
        $topic->save();
		return redirect()->route('topics.show', $topic->id)->with('success', '帖子创建成功');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories=Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('success', '更新成功！');
	}
//搜索功能
    public function search(Request $request,Topic $topic,Link $link)
    {
        $links=$link->getAllCached();
        $search=$request->input('name');
//        dd($search);
        if (empty($search)){
            dd('请输入内容');
        }else{
            $lists=Topic::where([
                ['title','like',"%{$search}%"]
            ])->orWhere([
                ['body','like',"%{$search}%"]
            ])->paginate(5);
//            dd($lists);
            return view('topics.search', compact('lists','links'));
        }
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();
		return redirect()->route('topics.index')->with('success', '删除成功！');
	}
//	文本框上传图片
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}