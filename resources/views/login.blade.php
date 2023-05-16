<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | KUA Delta Pawan</title>

    <!-- Favicons -->
    <link href="{{ asset('favicon.png') }}" rel="icon">
    <link href="{{ asset('favicon.png') }}" rel="apple-touch-icon">
    <!-- Sweet Alert 2 -->
    <link href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Style -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="auth-full-height d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-2">
                                <div class="d-flex justify-content-center mt-3">
                                    <div class="text-center logo">
                                        <img alt="logo" class="img-fluid" src="{{ asset('favicon.png') }}"
                                            style="height: 70px;">
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <h3 class="fw-bolder">KUA Delta Pawan</h3>
                                    <p class="text-muted">Masuk atau buat akunmu untuk melanjutkan pendaftaran nikah.
                                    </p>
                                </div>
                                <form id="form" action="login" method="POST">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>
                                        <input id="email" type="text" name="email" class="form-control" />
                                        <span id="emailError" class="invalid-feedback"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            <span>Kata Sandi</span>
                                            <a href="#" class="text-primary text-muted font">Lupa kata sandi?</a>
                                        </label>
                                        <div class="form-group input-affix flex-column">
                                            <input id="password" name="password" class="form-control" type="password">
                                            <span id="passwordError" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-primary w-100">Masuk</button>
                                </form>
                                <div class="divider">
                                    <span class="divider-text text-muted">atau lebih mudah menggunakan</span>
                                </div>
                                <div class="row">
                                    <div class="col px-1">
                                        <a href="login/google" class="btn btn-outline-secondary w-100">
                                            <img src="assets/images/thumbs/thumb-1.png" alt="Logo Google"
                                                style="max-width: 20px;">
                                        </a>
                                    </div>
                                    <div class="col px-1">
                                        <a href="login/facebook" class="btn btn-outline-secondary w-100">
                                            <img src="assets/images/thumbs/thumb-2.png" alt="Logo Facebook"
                                                style="max-width: 20px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <p class="text-muted">Belum punya akun? <a class="text-muted">Daftar dulu</a></p>
                                </div>
                            </div>
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
