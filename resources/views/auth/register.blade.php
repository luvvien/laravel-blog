@extends('home.layouts.app')

@section('css_ext')
    <style>
        :root {
            --input-padding-x: .75rem;
            --input-padding-y: .75rem;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 420px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group > input,
        .form-label-group > label {
            padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group > label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0; /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown) ~ label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
        }

    </style>
@endsection

@section('content')
    <form class="form-signin" method="post" action="{{ route('register') }}">
        @csrf
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">欢迎注册 Vien Blog</h1>
            <a href="{{ route('login') }}">已有账号? 直接登录</a></p>
        </div>

        <div class="form-label-group">
            <input type="text" id="name" name="name" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name"
                   value="{{ old('name') }}" required autofocus>
            <label for="name">Name</label>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address"
                   value="{{ old('email') }}" required autofocus>
            <label for="email">Email address</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password"
                   value="{{ old('password') }}" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <label for="password">Password</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" placeholder="Password Confirm" required>
            <label for="password-confirm">Password Confirm</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; {{ date('Y') }} <a href="https://vienblog.com">vienblog.com</a> </p>
    </form>
@endsection