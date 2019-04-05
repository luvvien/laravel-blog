@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">友情链接</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.links.friend.new') }}">添加</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.links.friend.list') }}">列表</a>
                </div>
            </div>
        </div>

        @include('admin.layouts.pagination')
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>站点名称</th>
                    <th>链接类型</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $i => $link)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td class="text-nowrap overflow-slh">{{ $link['title'] }}</td>
                        <td>{{ $link['follow'] ? '友情链接' : '普通(nofollow)' }}</td>
                        <td>{{ vn_time($link['created_at']) }}</td>
                        <td>
                            <a href="{{ route('admin.links.friend.edit', ['id' => $link['id']]) }}" class="btn btn-sm btn-outline-secondary py-0 pr-1 pl-1">编辑</a>
                            <a href="{{ route('admin.links.friend.delete') }}" class="btn btn-sm btn-outline-secondary py-0 pr-1 pl-1" onclick="event.preventDefault();document.getElementById('delete-form-{{$link['id']}}').submit();">
                                {{ __('删除') }}
                            </a>

                            <form id="delete-form-{{$link['id']}}" action="{{ route('admin.links.friend.delete') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $link['id'] }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection