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
                            角色管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('role.role.index')}}" class="nav-link ">
                                    角色列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('role.role.create')}}" class="nav-link active">
                                    添加角色
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{route('role.role.create')}}" class="btn btn-white btn-sm">
                            添加角色
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">


                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{route('role.role.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">中文名称</label>
                                <input type="text" name="title" class="form-control  text-muted" id="exampleInputEmail1" placeholder="请输入中文名称">
                            </div>

                            <label for="exampleInputEmail1">角色标识</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control  text-muted" aria-label="Amount (to the nearest dollar)"  placeholder="请输入角色标识">
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
    </script>
@endpush
