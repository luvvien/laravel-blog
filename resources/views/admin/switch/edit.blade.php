@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">设置</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="submit" class="btn btn-sm btn-primary mr-1"
                        onclick="event.preventDefault();document.getElementById('edit-form').submit();">
                    提交
                </button>
            </div>
        </div>

        {{--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}
        <form action="{{ route('admin.switch.update') }}" id="edit-form" method="post">
            @csrf
            <h3>Carousel</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['carousel']['open'] == 1 ? "checked" : "" }}
                           id="carousel-switch" name="carousel-switch">
                    <label class="custom-control-label" for="carousel-switch">开关</label>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="carousel-image-1">图片地址1</label>
                    <input type="text" class="form-control" id="carousel-image-1" name="carousel-image-1"
                           value="{{ $switches['sidebar']['carousel']['banners'][0]['image'] }}" required>

                </div>
                <div class="form-group col-md-3">
                    <label for="carousel-url-1">跳转链接1</label>
                    <input type="text" class="form-control" id="carousel-url-1" name="carousel-url-1"
                           value="{{ $switches['sidebar']['carousel']['banners'][0]['url'] }}" required/>
                </div>
                <div class="form-group col-md-3">
                    <label for="carousel-description-1">相关描述1</label>
                    <input type="text" class="form-control" id="carousel-description-1" name="carousel-description-1"
                           value="{{ $switches['sidebar']['carousel']['banners'][0]['description'] }}" required/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="carousel-image-2">图片地址2</label>
                    <input type="text" class="form-control" id="carousel-image-2" name="carousel-image-2"
                           value="{{ $switches['sidebar']['carousel']['banners'][1]['image'] }}" required>

                </div>
                <div class="form-group col-md-3">
                    <label for="carousel-url-2">跳转链接2</label>
                    <input type="text" class="form-control" id="carousel-url-2" name="carousel-url-2"
                           value="{{ $switches['sidebar']['carousel']['banners'][1]['url'] }}" required/>
                </div>
                <div class="form-group col-md-3">
                    <label for="carousel-description-2">相关描述2</label>
                    <input type="text" class="form-control" id="carousel-description-2" name="carousel-description-2"
                           value="{{ $switches['sidebar']['carousel']['banners'][1]['description'] }}" required/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="carousel-image-3">图片地址3</label>
                    <input type="text" class="form-control" id="carousel-image-3" name="carousel-image-3"
                           value="{{ $switches['sidebar']['carousel']['banners'][2]['image'] }}" required>

                </div>
                <div class="form-group col-md-3">
                    <label for="carousel-url-3">跳转链接3</label>
                    <input type="text" class="form-control" id="carousel-url-3" name="carousel-url-3"
                           value="{{ $switches['sidebar']['carousel']['banners'][2]['url'] }}" required/>
                </div>
                <div class="form-group col-md-3">
                    <label for="carousel-description-3">相关描述3</label>
                    <input type="text" class="form-control" id="carousel-description-3" name="carousel-description-3"
                           value="{{ $switches['sidebar']['carousel']['banners'][2]['description'] }}" required/>
                </div>
            </div>

            <h3>Motto</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['motto']['open'] == 1 ? "checked" : "" }}
                           id="motto-switch" name="motto-switch">
                    <label class="custom-control-label" for="motto-switch">开关</label>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="motto-title">标题</label>
                    <input type="text" class="form-control" id="motto-title" name="motto-title"
                           value="{{ $switches['sidebar']['motto']['title'] }}" required>

                </div>
                <div class="form-group col-md-4">
                    <label for="motto-content">内容</label>
                    <input type="text" class="form-control" id="motto-content" name="motto-content"
                           value="{{ $switches['sidebar']['motto']['content'] }}" required/>
                </div>
            </div>

            <h3>Tag</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['tag']['open'] == 1 ? "checked" : "" }}
                           id="tag-switch" name="tag-switch">
                    <label class="custom-control-label" for="tag-switch">开关</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tag-title">标题</label>
                    <input type="text" class="form-control" id="tag-title" name="tag-title"
                           value="{{ $switches['sidebar']['tag']['title'] }}" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="tag-count">数量</label>
                    <input type="text" class="form-control" id="tag-count" name="tag-count"
                           value="{{ $switches['sidebar']['tag']['count'] }}" required/>
                </div>
            </div>

            <h3>Category</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['category']['open'] == 1 ? "checked" : "" }}
                           id="category-switch" name="category-switch">
                    <label class="custom-control-label" for="category-switch">开关</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="category-title">标题</label>
                    <input type="text" class="form-control" id="category-title" name="category-title"
                           value="{{ $switches['sidebar']['category']['title'] }}" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="category-count">数量</label>
                    <input type="text" class="form-control" id="category-count" name="category-count"
                           value="{{ $switches['sidebar']['category']['count'] }}" required/>
                </div>
            </div>

            <h3>Hot</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['hot']['open'] == 1 ? "checked" : "" }}
                           id="hot-switch" name="hot-switch">
                    <label class="custom-control-label" for="hot-switch">开关</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="hot-title">标题</label>
                    <input type="text" class="form-control" id="hot-title" name="hot-title"
                           value="{{ $switches['sidebar']['hot']['title'] }}" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="hot-count">数量</label>
                    <input type="text" class="form-control" id="hot-count" name="hot-count"
                           value="{{ $switches['sidebar']['hot']['count'] }}" required/>
                </div>
            </div>

            <h3>Latest</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['latest']['open'] == 1 ? "checked" : "" }}
                           id="latest-switch" name="latest-switch">
                    <label class="custom-control-label" for="latest-switch">开关</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="latest-title">标题</label>
                    <input type="text" class="form-control" id="latest-title" name="latest-title"
                           value="{{ $switches['sidebar']['latest']['title'] }}" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="latest-count">数量</label>
                    <input type="text" class="form-control" id="latest-count" name="latest-count"
                           value="{{ $switches['sidebar']['latest']['count'] }}" required/>
                </div>
            </div>

            <h3>Popular</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['sidebar']['popular']['open'] == 1 ? "checked" : "" }}
                           id="popular-switch" name="popular-switch">
                    <label class="custom-control-label" for="popular-switch">开关</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="popular-title">标题</label>
                    <input type="text" class="form-control" id="popular-title" name="popular-title"
                           value="{{ $switches['sidebar']['popular']['title'] }}" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="popular-count">数量</label>
                    <input type="text" class="form-control" id="popular-count" name="popular-count"
                           value="{{ $switches['sidebar']['popular']['count'] }}" required/>
                </div>
            </div>

            <h3>Baidu</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['baidu_autopush'] == 1 ? "checked" : "" }}
                           id="baidu_autopush-switch" name="baidu_autopush-switch">
                    <label class="custom-control-label" for="baidu_autopush-switch">是否自动提交链接到百度搜索引擎</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="baidupush-domain">手动推送 博客地址</label>
                    <input type="text" class="form-control" id="baidupush-domain" name="baidupush-domain"
                           value="{{ $switches['baidu_push']['domain'] }}" placeholder="示例: https://vienblog.com">

                </div>
                <div class="form-group col-md-4">
                    <label for="baidupush-api">手动推送 百度API</label>
                    <input type="text" class="form-control" id="baidupush-api" name="baidupush-api"
                           value="{{ $switches['baidu_push']['api'] }}" placeholder="请到百度站长平台获取"/>
                </div>
            </div>

            <h3>AdSense</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['adsense']['open'] == 1 ? "checked" : "" }}
                           id="adsense-switch" name="adsense-switch">
                    <label class="custom-control-label" for="adsense-switch">开关</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adsense-script">谷歌AdSense代码</label>
                    <textarea class="form-control" id="adsense-script" name="adsense-script"
                              placeholder="谷歌AdSense代码" rows="5">
                            {{ $switches['adsense']['script'] }}
                        </textarea>
                </div>
            </div>

            <h3>Counter</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $switches['counter']['open'] == 1 ? "checked" : "" }}
                           id="counter-switch" name="counter-switch">
                    <label class="custom-control-label" for="counter-switch">开关</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="counter-script">流量统计代码</label>
                    <textarea class="form-control" id="counter-script" name="counter-script"
                              placeholder="流量统计代码" rows="5">
                            {{ $switches['counter']['script'] }}
                        </textarea>
                </div>
            </div>

            <button type="submit" class="mt-2 ml-3 btn btn-sm btn-primary">提交</button>
        </form>
    </main>
@endsection