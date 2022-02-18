<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取Faker实例
        $faker=app(Faker\Generator::class);
//        头像数据
        $avatars=[
            'http://localhost:8000/uploads/images/avatars/202202/17/10_1645093168_noBNYSKKK8.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/10_1645153385_gnqp7N4NSq.png',
            'http://localhost:8000/uploads/images/avatars/202202/18/10_1645153486_PblXuZWnWr.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/10_1645153516_qAUKBOYqx1.jpg',
        ];
//        生成数据集合
        $users=factory(User::class)
            ->times(10)
            ->make()
            ->each(function ($user,$index) use ($faker,$avatars){
//        从头像数组中随机取出一个并赋值
                $user->avatar=$faker->randomElement($avatars);
            });
//        让隐藏字段可见，并将数据集合转换为数组
        $user_array=$users->makeVisible(['password','remember_token'])->toArray();
//        插入到数据库中
        User::insert($user_array);
//        单独处理第一个用户数据
        $user=User::find(1);
        $user->name='zuazsl';
        $user->email='zuazsl@163.com';
        $user->avatar='http://localhost:8000/uploads/images/avatars/202202/18/10_1645153486_PblXuZWnWr.jpg';
        $user->save();
    }
}
