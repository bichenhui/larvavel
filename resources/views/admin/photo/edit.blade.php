@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            轮播图管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('photo.index')}}" class="nav-link ">
                                    轮播图列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('photo.create')}}" class="nav-link active">
                                    添加轮播图
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{route('photo.create')}}" class="btn btn-white btn-sm">
                            添加轮播图
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">


                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{route('photo.update',$photo)}}">
                            @csrf  @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">轮播图标题</label>
                                <input type="text" value="{{$photo->title}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>

                            <label for="exampleInputEmail1">轮播图图标</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-1">
                                    <input class="form-control" name="thumb" readonly="" value="">
                                    <div class="input-group-append">
                                        <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
                                    </div>
                                </div>
                                <div style="display: inline-block;position: relative;">
                                    <img src="{{asset('org/hdjs/image/nopic.jpg')}}" class="img-responsive img-thumbnail" width="150">
                                    <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                        onclick="removeImg(this)">×</em>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function choose() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    //alert(icon)
                    $('input[name=icon]').val(icon)
                    $('#icon').addClass(icon)
                })
            })
        }

        require(['hdjs','bootstrap']);
        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    $("[name='thumb']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }
        //移除图片
        function removeImg(obj) {
            $(obj).prev('img').attr('src', '../dist/static/image/nopic.jpg');
            $(obj).parent().prev().find('input').val('');
        }

    </script>
@endpush
