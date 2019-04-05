@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">添加友链</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="submit" class="btn btn-sm btn-primary mr-1"
                        onclick="event.preventDefault();document.getElementById('new-form').submit();">
                    提交
                </button>
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.links.friend.list') }}">List</a>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.links.friend.store') }}" id="new-form" method="post">
            @csrf
            <div class="form-group">
                <label for="title">站点名称</label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url"
                       value="{{ old('url') }}" required>
            </div>
            <div class="form-group">
                <label for="follow">类型</label>
                <select class="form-control" id="follow" name="follow">
                    <option disabled selected>---请选择---</option>
                    <option value="0">普通(nofollow)</option>
                    <option value="1">友情链接</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">描述</label>
                <input type="text" class="form-control" id="description" name="description"
                       value="{{ old('description') }}" required>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">提交</button>
        </form>
    </main>
@endsection