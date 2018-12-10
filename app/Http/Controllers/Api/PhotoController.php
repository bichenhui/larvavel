<?php

namespace App\Http\Controllers\Api;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends CommonController
{
    public function photo(){

        $limit=request()->query('limit',10);
//        dd ($limit);
        return $this->response->array(Photo::limit($limit)->get());

    }
}
