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
            'http://localhost:8000/uploads/images/avatars/202202/18/001.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/002.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/003.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/004.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/005.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/006.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/007.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/008.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/009.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/010.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/011.jpg',
            'http://localhost:8000/uploads/images/avatars/202202/18/012.jpg',
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
        $user->avatar='http://localhost:8000/uploads/images/avatars/001.jpg';
        $user->save();

        // 初始化用户角色，将 1 号用户指派为『站长』
        $user->assignRole('Founder');

        // 将 2 号用户指派为『管理员』
        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
