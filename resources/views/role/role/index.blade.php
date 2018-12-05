@extends('admin.layouts.master');
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <!-- Header -->
                <div class="header mt-md-2">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h2 class="header-title">
                                    栏目管理
                                </h2>

                            </div>

                        </div> <!-- / .row -->
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-overflow header-tabs">
                                    <li class="nav-item">
                                        <a href="{{route('role.role.index')}}" class="nav-link active">
                                            角色列表
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route ('role.role.create')}}" class="nav-link ">
                                            添加角色
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">

                                <!-- Buttons -->
                                <a href="{{route ('role.role.create')}}" class="btn btn-white btn-sm">
                                    添加角色
                                </a>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div> <!-- / .row -->
        <div class="card">
            <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <th>编号</th>
                    <th>超级管理员</th>
                    <th>名称</th>
                    <th>操作</th>
                    </thead>
                    <tbody class="list">
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role['id']}}</td>
                            <td>{{$role['title']}}</td>
                            <td><span class="">{{$role['name']}}</span></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a href="" class="btn btn-white">设置权限</a>
                                    <a href="{{route ('role.role.edit',$role)}}" class="btn btn-white">编辑</a>

                                    <button  type="button" onclick="del(this)" class="btn btn-white">删除</button>
                                    <form action="{{route ('role.role.destroy',$role)}}" method="post">
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
        {{$roles->links()}}

    </div>
@endsection
<script>
    function del(obj) {
        require(['hdjs','bootstrap'], function (hdjs) {
            hdjs.confirm('确定删除吗?', function () {
                $(obj).next('form').submit();
            })
        })
    }
</script>