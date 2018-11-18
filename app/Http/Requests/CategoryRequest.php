<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

    	//相当于true 又进行一次拦截
        return auth ()->check ();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

//    	dd ($this->route ('category'));//接受路由参数
		//编辑的时候不能让它唯一 所以给他一个判断
		$id=$this->route ('category') ?$this->route ('category')->id : null;
//		dd ($id);
        return [
            'title'=>'required|unique:categories,title,'.$id,
			'icon'=>'required'
        ];
    }
    public function messages ()
	{
		return [
			'title.required'=>'请输入栏目名称',
			'title.unique'=>'栏目已存在',
			'icon.required'=>'请输入栏目图标'
		];
	}
}
