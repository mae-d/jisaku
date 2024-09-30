<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Api\Auth\ResetPasswordNotification;
use Comment;
use Like;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comment() {
        return $this->hasMany('App\Comment');
    }

    public function image() {
      return $this->hasMany('App\Image');
  }

  public function likes()
  {
      return $this->belongsToMany('App\Comment','likes','user_id','comment_id')->withTimestamps();
  }
  public function isLike($commentId)
  {

    return $this->likes()->where('comment_id',$commentId)->exists();
  }

  //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
  public function like($commentId)
  {

    if($this->isLike($commentId)){

      $this->likes()->detach($commentId);
    } else {

      $this->likes()->attach($commentId);
    }
  }


}
