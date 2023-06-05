<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Admin - Kantor Urusan Agama</title>

    <!-- Favicons -->
    <link href="{{ asset('favicon.png') }}" rel="icon">
    <link href="{{ asset('favicon.png') }}" rel="apple-touch-icon">
    <!-- Sweet Alert 2 -->
    <link href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Style -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="auth-full-height">
        <div class="row m-0">
            <div class="col p-0 auth-full-height" style="background-image: url('assets/images/others/bg-login.png');background-size:cover;">
                <div class="d-flex justify-content-between flex-column h-100 px-5 py-3">
                    <div></div>
                    <div class="d-flex justify-content-between">
                        <span class="text-white">Hak Cipta © 2023. <a href="https://kayong-developer.com" class="text-white">Kayong Developer</a></span>
                        <div>
                            <a href="#" class="text-white text-link">{{ env('APP_NAME') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 auth-full-height bg-white" style="max-width: 450px;">
                <div class="d-flex h-100 align-items-center p-5">
                    <div class="w-100">
                        <div class="d-flex justify-content-center mt-3">
                            <div class="text-center logo">
                                <img alt="logo" class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}"
                                    style="height: 70px;">
                            </div>
                        </div>
                        <div class="mt-4">
                            <form id="form" action="login" method="POST">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="text" name="email" class="form-control" />
                                    <span id="emailError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-flex justify-content-between">
                                        <span>Kata Sandi</span>
                                        {{-- <a href="#" class="text-primary text-muted font">Lupa kata sandi?</a> --}}
                                    </label>
                                    <div class="form-group input-affix flex-column">
                                        <input id="password" name="password" class="form-control" type="password">
                                        <span id="passwordError" class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <button id="submit" type="submit" class="btn btn-success w-100">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Sweet Alert 2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Login Script -->
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
