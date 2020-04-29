@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">上传文件</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="submit" class="btn btn-sm btn-primary mr-1"
                        onclick="event.preventDefault();document.getElementById('edit-form').submit();">
                    ojbk, 快上传
                </button>
            </div>
        </div>

        {{--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>--}}
        <form action="{{ route('admin.upload.file.store') }}" id="edit-form" method="post" enctype="multipart/form-data">
            @csrf

            {{--<div class="custom-file">--}}
                {{--<input type="file" class="custom-file-input" id="file" name="file">--}}
                {{--<label class="custom-file-label" for="customFile">Choose file</label>--}}
            {{--</div>--}}

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="file"
                       onchange="showFilename(this.files[0])" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            </div>

            <button type="submit" class="mt-2 btn btn-sm btn-primary">ojbk, 快上传</button>
        </form>

        <hr>

        @if(isset($filename))
        {{--<div class="card" style="width: 18rem;">--}}
            {{--<div class="card-body">--}}
                {{--<h5 class="card-title">Path</h5>--}}
                {{--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>--}}
                {{--<p class="card-text">{{ $filename }}</p>--}}
                {{--<a href="{{ $filename }}" class="card-link">Click here to preview.</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="card" style="width: 18rem;">
            @if($type == "img")
                <img src="{{ $filename }}" class="card-img-top" alt="{{ $filename }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">Path: </h5>
                {{--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>--}}
                <p class="card-text">{{ $filename }}</p>
                <a href="{{ $filename }}" class="card-link">Click here to preview.</a>
            </div>
        </div>
        @endif

    </main>
@endsection


@section('js_ext')
    <script>
        function showFilename(file){
            $(".custom-file-label").html(file.name);
        }
    </script>
@endsection