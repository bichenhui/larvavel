<?php

namespace App\Http\Controllers\Photo;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{

    public function index()
    {
		$photos=Photo::latest()->paginate(1);
		return view ('admin.photo.index',compact ('photos'));
    }
	public function edit(Photo $photo)
	{
		return view ('admin.photo.edit',compact ('photo'));
	}

    public function create()
    {
		return view ('admin.photo.create');
    }


    public function store(Request $request)
    {
//dd ($request->all ());
        Photo::create($request->all ());
        return redirect ()->route ('photo.index')->with ('succes','上传成功');
    }
	public function update(Request $request, Photo $photo)
	{
		$photo->update ($request->all ());
		return redirect()->route ('photo.index')->with ('success','菜单更新成功');
	}

    public function destroy(Photo $photo)
    {
        $photo->delete ();
		return redirect ()->route ('photo.index')->with ('success','删除成功');
    }
}