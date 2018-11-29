<?php

namespace App\Observers;

use App\Models\Config;

class ConfigObserve
{
    public function created(){
//		dd (1);
		$this->saveConfigToCache ();
	}
	//当控制器ConfigController  update方法执行时 数据表没有数据执行添加dd (1)否则执行更新dd（2）;
	public function updated(){
//		dd (2);
		$this->saveConfigToCache ();
	}
	public function saveConfigToCache(){
		//pluck 手册地址:查询构造器
		//pluck('data','value') 获取两列数据,data 作为键名  ,value 键值
		\Cache::forever ('config_cache',Config::pluck('data','name'));
//		dd (Config::pluck('data','name'));
	}
}
