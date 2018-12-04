<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function uploader(Request $request){
//    	dd (1); 打印出来了
		//文件存储-》上传文件
//		$path = $request->file('上传表单name名')->store('上传文件存储目录'，指定磁盘(对应config/filesystem.php中disk);
//		public_path 指定存储在public目录中
//		dd ($path);
//		dd ($_FILES); 来查看上传表单的name=file
		$file=$request->file ('file');
		//对上传文件的大小以及类型拦截
		$this->checkSize ($file);
		$this->checkType ($file);
		if ($file){
			$path=$file->store ('attachment','attachment');
			//将上传数据存储到数据表
			//我们创建附件的模型与迁移文件 artisan make:model --migration Models/Attachment
			//关联添加  auth ()->user () 获取当前用户对象
			auth ()->user ()->attachment()->create([
			  //$file->getClientOriginalName()获取客户端原始文件名
				'name'=>$file->getClientOriginalName (),
				'path'=>url($path)
			]);
		}
//		dd ($path);attachment/bdRqX8MuAx7YZCrxXFbiggc2nLMX44IKB6tTZlRt.jpeg
//		dd (url($path));"http://laravel-cms.edu/attachment/EfiPXdm9qmu3kK1rQob2UtfXMRW3GEh6Maliv4AR.jpeg"
		return ['file' =>url($path), 'code' => 0];


	}
	//验证文件大小
	private function checkSize($file){
		//$file->getSize()获取上传文件大小
		if ($file->getSize()>hd_config ('update.size')){
			//return  ['message' =>'上传文件过大', 'code' => 403];
			//使用异常类处理上传异常
			//创建异常类:exception
			throw new UploadException('上传文件过大');
		}
	}
	//验证上传类型
	//getClientOriginalExtension  获取文件的扩展名
	private function checkType($file){
    	if (!in_array (strtolower ($file->getClientOriginalExtension()),explode('|',hd_config('update.type')))){
			//return  ['message' =>'类型不允许', 'code' => 403];
			//dd (hd_config('update.type'));
//			dd (hd_config('upload.type'));
			throw new UploadException('文件类型不符');

		}

	}
	//获取图片列表
	public function filesLists(){
		$files=auth ()->user ()->attachment()->paginate(3);
		$data=[];
		foreach ($files as $file){
			$data[]=[
				'path'=>$file['path'],
				'url'=>$file['path']
			];
		}
//		dd ($data);
		return [
			'data'=>$data,
			//这里一定要注意分页后面拼接一个空字符串
			'page'=>$files->links().'',
			'code'=>0
		];
	}



}
