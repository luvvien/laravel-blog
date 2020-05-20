@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">更多功能</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="submit" class="btn btn-sm btn-primary mr-1"
                        onclick="event.preventDefault();document.getElementById('edit-form').submit();">
                    提交
                </button>
            </div>
        </div>

        {{--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}
        <form action="{{ route('admin.setting.update') }}" id="edit-form" method="post">
            @csrf
            <h3>Watermark</h3>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input"
                           {{ $setting['watermark']['open'] == 1 ? "checked" : "" }}
                           id="watermark-open" name="watermark-open">
                    <label class="custom-control-label" for="watermark-open">开关</label>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="watermark-content">水印内容</label>
                    <input class="form-control" id="watermark-content" name="watermark-content" value="{{  $setting['watermark']['content'] }}"/>
                </div>
            </div>

            <h3>Theme</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="theme">主题颜色</label>
                    {{--<input class="form-control" id="theme" name="theme" value="{{ $setting['theme'] }}"/>--}}
                    <select class="custom-select mr-sm-2" id="theme" name="theme">
                        <option value="gray" {{ $setting['theme'] == "gray" ? "selected" : "" }}>gray</option>
                        <option value="pink" {{ $setting['theme'] == "pink" ? "selected" : "" }}>pink</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="mt-2 ml-3 btn btn-sm btn-primary">提交</button>
        </form>
    </main>
@endsection