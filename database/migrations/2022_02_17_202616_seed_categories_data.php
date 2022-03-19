<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '郑式通知',
                'description' => '足不出户就能了解郑航二三事儿',
            ],
            [
                'name'        => '失物招领&寻物启事',
                'description' => '东西丢了别着急，速速发布失物/寻物信息',
            ],
            [
                'name'        => '兼职发布/勤工俭学',
                'description' => '你想让你的大学生活更加丰富多彩吗？',
            ],
            [
                'name'        => '社团/组织/比赛招募',
                'description' => '快来“在郑航”平台招兵买马',
            ],
            [
                'name'        => '考研人',
                'description' => '考研人，考研魂，考研都是人上人，加油各位！',
            ],
            [
                'name'        => '职来职往',
                'description' => '又是一年就业季~',
            ],
            [
                'name'        => '其他帖子',
                'description' => '各种帖子（吐槽、提醒、倡议、求助、表白等等）',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
