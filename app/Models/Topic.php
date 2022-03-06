<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithOrder($query,$order)
    {
//        不同的排序使用不同的数据读取逻辑
        switch ($order){
            case 'recent':
                $query->recent();
                break;
            default:
                $query->recentReplied();
                break;
        }
//        预防N+1问题
        return $query->with('user','category');
    }

    public function scopeRecentReplied($query)
    {
//        按更新时间排序
        return $query->orderBy('updated_at','desc');
    }

    public function scopeRecent($query)
    {
//        按创建时间排序
        return $query->orderBy('created_at','desc');
    }
}