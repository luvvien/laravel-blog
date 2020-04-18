@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">网站信息</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="submit" class="btn btn-sm btn-primary mr-1"
                        onclick="event.preventDefault();document.getElementById('edit-form').submit();">
                    提交
                </button>
            </div>
        </div>

        {{--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}
        <form action="{{ route('admin.info.update') }}" id="edit-form" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $information['id'] }}">
            <div class="form-group col-md-4">
                <label for="site_title">网站名</label>
                <input type="text" class="form-control" id="site_title" name="site_title"
                       value="{{ $information['site_title'] }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="site_description">网站描述</label>
                <input type="text" class="form-control" id="site_description" name="site_description"
                       value="{{ $information['site_description'] }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="site_keywords">网站关键字</label>
                <input type="text" class="form-control" id="site_keywords" name="site_keywords"
                       value="{{ $information['site_keywords'] }}" placeholder="用英文逗号分隔 建议2-5个词" required>
            </div>

            <div class="form-group col-md-4">
                <label for="author_name">作者名称</label>
                <input type="text" class="form-control" id="author_name" name="author_name"
                       value="{{ $information['author_name'] }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="author_intro">作者介绍</label>
                <input type="text" class="form-control" id="author_intro" name="author_intro"
                       value="{{ $information['author_intro'] }}" required>
            </div>


            <div class="form-group col-md-4">
                <label for="author_avatar">头像</label>
                <input type="text" class="form-control" id="author_avatar" name="author_avatar"
                       value="{{ $information['author_avatar'] }}" required>
            </div>

            <button type="submit" class="mt-2 ml-3 btn btn-sm btn-primary">提交</button>
        </form>
    </main>
@endsection