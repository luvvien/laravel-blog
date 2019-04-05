@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">文章</h1>
            <form class="form-inline" action="{{ route('admin.blog.article.list') }}">
                <label class="sr-only col-form-label-sm" for="slug">slug</label>
                <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" id="slug" name="slug" value="{{ $history['slug'] }}"
                       placeholder="slug">

                <label class="sr-only col-form-label-sm" for="title">标题</label>
                <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" id="title" name="title" value="{{ $history['title'] }}"
                       placeholder="标题">

                <div class="input-group mb-2 mr-sm-2">
                    <label class="sr-only" for="cate_id">分类</label>
                    <select class="form-control form-control-sm" id="cate_id" name="cate_id">
                        <option value="" selected>--不分类--</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" {{ $history['cate_id'] == $category['id'] ? 'selected' : '' }}>{{ $category['cate_name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check mb-2 mr-sm-2">
                    <input class="form-check-input" type="checkbox" name="is_top" id="is_top"
                           value="1" {{ $history['is_top'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_top">
                        只看置顶
                    </label>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mb-2">查找</button>
            </form>

            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.blog.article.new') }}">创作</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.blog.article.list') }}">列表</a>
                    {{--<button class="btn btn-sm btn-outline-secondary">Share</button>--}}
                    {{--<button class="btn btn-sm btn-outline-secondary">Export</button>--}}
                </div>
                {{--<button class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
                {{--<span data-feather="calendar"></span>--}}
                {{--This week--}}
                {{--</button>--}}
            </div>
        </div>


        {{--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}
        @include('admin.layouts.pagination')
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    {{--<th>Slug</th>--}}
                    <th>标题</th>
                    <th>分类</th>
                    <th>阅读</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $i => $article)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        {{--                        <td>{{ $article['slug'] }}</td>--}}
                        <td class="text-nowrap overflow-slh">{{ $article['title'] }}</td>
                        <td>{{ $article['category']['cate_name'] }}</td>
                        <td>{{ $article['read_count'] }}</td>
                        <td>{{ vn_time($article['created_at']) }}</td>
                        <td>
                            <a href="{{ route('admin.blog.article.edit', ['id' => $article['id']]) }}"
                               class="btn btn-sm btn-outline-secondary py-0 pr-1 pl-1">编辑</a>
                            <a href="{{ route('admin.blog.article.top') }}"
                               class="btn btn-sm btn-outline-secondary py-0 pr-1 pl-1"
                               onclick="event.preventDefault();document.getElementById('top-form-{{$article['id']}}').submit();">
                                @if($article['is_top'])
                                    {{ __('取消') }}
                                @else
                                    {{ __('置顶') }}
                                @endif
                            </a>
                            <a href="{{ route('admin.blog.article.delete') }}"
                               class="btn btn-sm btn-outline-secondary py-0 pr-1 pl-1"
                               onclick="event.preventDefault();document.getElementById('delete-form-{{$article['id']}}').submit();">
                                {{ __('删除') }}
                            </a>

                            <form id="top-form-{{$article['id']}}" action="{{ route('admin.blog.article.top') }}"
                                  method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $article['id'] }}">
                                <input type="hidden" name="is_top" value="{{ $article['is_top'] ? 0 : 1 }}">
                            </form>

                            <form id="delete-form-{{$article['id']}}" action="{{ route('admin.blog.article.delete') }}"
                                  method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $article['id'] }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection