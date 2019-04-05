@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">管理员信息</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="submit" class="btn btn-sm btn-primary mr-1"
                        onclick="event.preventDefault();document.getElementById('edit-form').submit();">
                    提交
                </button>
            </div>
        </div>

        {{--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}
        <form action="{{ route('admin.user.update') }}" id="edit-form" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user['id'] }}">
            <div class="form-group col-md-4">
                <label for="name">用户名</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ $user['name'] }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="{{ $user['email'] }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="不修改密码不用填写">
            </div>

            <button type="submit" class="mt-2 ml-3 btn btn-sm btn-primary">提交</button>
        </form>
    </main>
@endsection