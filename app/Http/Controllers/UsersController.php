<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    //用户信息
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
//    用户信息渲染到前台
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
//    更新个人信息
    public function update(UserRequest $request,ImageUploadHandler $uploader,User $user)
    {
//        dd($request->all());
//        dd($request->avatar);
        $data=$request->all();
//        dd($data);
        if($request->avatar){
            $result=$uploader->save($request->avatar,'avatars',$user->id);
        }
        if($result){
            $data['avatar']=$result['path'];
        }
//        $user->update($request->all());
        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功！');
    }
}
