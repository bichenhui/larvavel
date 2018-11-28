<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collect;
use App\Models\Zan;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //重写 排序
	public function notifications()
	{
		return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('read_at', 'asc')->orderBy('created_at', 'desc');
	}
    //icon
    public function getIconAttribute($key){
    	return $key?:asset ('org/images/user.jpg');
	}
	//用户关联附件
	public function attachment(){
    	return $this->hasmany(Attachment::class);
	}
	//获取指定用户粉丝
	public function fans(){
		return $this->belongsToMany (User::class,'followers','user_id','following_id');
	}
	//获取关注的人
	public function following(){
		return $this->belongsToMany (User::class,'followers','following_id','user_id');
	}
	//收藏
	public function collect(){
    	return $this->hasMany (Collect::class) ;
	}
	//点赞
	public function zan(){
    	return $this->hasMany (Zan::class);
	}
}
