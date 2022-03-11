<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
//    注册后默认头像
    public function saving(User $user)
    {
        if(empty($user->avatar)){
            $user->avatar='http://localhost:8000/uploads/images/avatars/202202/18/10_1645153385_gnqp7N4NSq.png';
        }
    }
    public function creating(User $user)
    {
        //
    }

    public function updating(User $user)
    {
        //
    }
}