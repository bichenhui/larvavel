<?php
//助手函数
if (!function_exists ('hd_config')){
	//帮助读取后台配置项数据
	function hd_config($var){
//		dd ($var);
		static $cache=[];
		$info=explode ('.',$var);
//		dd ($info);
		if (!$cache){
			//获取缓存中config_cache数据,如果数据不存在,那么会以第二个参数作为默认值
			$cache=Cache::get ('config_cache',function (){
				return \App\Models\Config::pluck('data','name');
			});
//			dd ($cache);
		}
			return $cache[$info[0]][$info[1]]??'';
	}
}