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
                            图片管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route ('photo.index')}}" class="nav-link active">
                                    图片列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route ('photo.create')}}" class="nav-link ">
                                    添加图片
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>图片标题</th>
                        <th>图片</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($photos as $photo)
                        <tr>
                            <td>{{$photo['id']}}</td>
                            <td>{{$photo['title']}}</td>
                            <td>
                                <img width="60" src="{{$photo['image']}}" alt="">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a href="{{route ('photo.edit',$photo)}}" class="btn btn-white">编辑</a>
                                    <button onclick="del(this)" type="button" class="btn btn-white">删除</button>
                                    <form action="{{route ('photo.destroy',$photo)}}" method="post">
                                        @csrf  @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$photos->links()}}
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                swal("确定删除?", {
                    icon: 'warning',
                    buttons: {
                        cancel: "取消",
                        defeat: '确定',
                    },
                }).then((value) => {
                    switch (value) {
                        case "defeat":
                            $(obj).next('form').submit();
                            break;
                        default:

                    }
                });
            })
        }
    </script>
@endpush