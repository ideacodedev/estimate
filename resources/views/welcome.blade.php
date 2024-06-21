<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{ title() }}</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('resources/img/logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('resources/tem/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('resources/tem/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('resources/tem/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('resources/tem/assets/css/demo.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('resources/tem/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('resources/tem/assets/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('resources/tem/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('resources/tem/assets/js/config.js') }}"></script>
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('resources/css/loader.css') }}">
</head>

<body>
    <div class="loader"></div>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link d-flex justify-content-center">
                                <img src="{{ asset('resources/img/logo.png') }}" width="20%" alt="">
                                <span class="app-brand-text demo menu-text fw-bolder ms-3">
                                    <font class="text-primary">IT</font>
                                    <font class="text-warning">Evaluate</font>
                                </span>
                            </a>
                        </div>
                        <h4 class="mb-2">ล็อกอินเข้าสู่ระบบ! 👋</h4>
                        <p class="mb-4">{{ title() }}</p>
                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.script')
</body>

</html>
@include('layout.alert')
