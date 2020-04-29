@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('admin.layouts.alert')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">所有文件</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                {{--<button type="submit" class="btn btn-sm btn-primary mr-1"--}}
                        {{--onclick="event.preventDefault();document.getElementById('edit-form').submit();">--}}
                    {{--ojbk, 快上传--}}
                {{--</button>--}}
            </div>
        </div>

        <div class="card-columns">
            @foreach($files as $file)

                <div class="card">
                    @if($file["type"] == "img")
                        <img src="{{ $file["path"] }}" class="card-img-top" alt="{{ $file["path"] }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">From {{ $file["category"] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $file['created_at'] }}</h6>
                        <p class="card-text">{{ $file["path"] }}</p>
                        <a href="{{ $file["path"] }}" class="card-link">Click here to preview.</a>
                    </div>
                </div>

            @endforeach
        </div>

    </main>
@endsection