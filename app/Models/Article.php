<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Scout\Searchable;

class Article extends Model
{
	////引入 trait 类
	use LogsActivity,Searchable;
	protected $fillable = ['title', 'content','id'];
	//设置记录动态的属性
//	protected static $logAttributes = ['name', 'text'];

//如果需要记录所有$fillable设置的填充属性，可以使用
	protected static $logFillable = true;
	protected static $recordEvents = ['created','updated'];
	//自定义日志名称
	protected static $logName = 'article';

	//定义文章与用户的关联
	public function user(){
		return $this->belongsTo (User::class);
	}
	public function category(){
		//定义栏目关联
		return $this->belongsTo (Category::class);
	}
	//定义  多态关联
	public function zan(){
		return $this->morphMany (Zan::class,'zan');
	}
//	//定义 多态关联
	public function collect(){
		//第一个参数关联模型,第二个参数跟数据迁移  zan_id  zan_type
		return $this->morphMany (Collect::class,'collect');
	}
}
