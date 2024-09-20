<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;


class Like extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function comment()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Comment::class);
    }



}


