<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Like;

class Comment extends Model
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    // 後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('comment_id', $this->id)->first() !==null;
    }

    public function image()
    {
        return $this->hasMany('App\Image');
    }
}
