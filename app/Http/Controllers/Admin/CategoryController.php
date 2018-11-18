<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$categories=Category::paginate(3);
//		$categories=Category::all ();//获取数据表中数据 然后传给index模板 否则会提示报错$categories未找到
//		dd ($categories);
     return view ('admin.category.index',compact ('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
    	//如果没提示要先引入message提示消息 在父集（master）引入
//		dd ($request->all ());
		Category::create ($request->all ());
//		dd ($request->all ());
		return redirect ()->route ('admin.category.index')->with ('success','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
		//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//		dd ($category);
		return view ('admin.category.edit',compact ('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
//    	dd ($request->all ());  update属于 PUT 请求  需要创建一个虚拟请求 @mothed('PUT')
		//添加时候要有唯一性
		//编辑的时候不能让它唯一  把当前字段排除掉
		$category->update ($request->all ());
		return redirect ()->route ('admin.category.index')->with ('success','更新成功');
    }
//readonly="readonly" readonly 属性规定输入字段为只读只读字段是不能修改的
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
    	$category->delete ();
    	return redirect ()->route ('admin.category.index')->with ('success','删除成功');
    }
}
