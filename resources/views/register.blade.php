<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar | KUA Delta Pawan</title>

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
                                        <img alt="logo" class="mb-3" src="{{ asset('assets/images/logo/logo.png') }}"
                                            style="height: 50px;">
                                    </div>
                                </div>
                                <form id="form" action="register" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label">Nama</label>
                                        <input id="name" type="text" name="name" class="form-control" />
                                        <span id="nameError" class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Email</label>
                                        <input id="email" type="text" name="email" class="form-control" />
                                        <span id="emailError" class="invalid-feedback"></span>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-flex justify-content-between">
                                            <span>Kata Sandi</span>
                                        </label>
                                        <div class="form-group input-affix flex-column">
                                            <input id="password" name="password" class="form-control" type="password">
                                            <span id="passwordError" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-flex justify-content-between">
                                            <span>Konfirmasi Kata Sandi</span>
                                        </label>
                                        <div class="form-group input-affix flex-column">
                                            <input id="passwordConfirmation" name="password_confirmation" class="form-control" type="password">
                                            <span id="passwordConfirmationError" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-success w-100">Daftar</button>
                                </form>
                                <div class="text-center mt-4">
                                    <p class="text-muted">Sudah punya akun? <a href="login">Masuk disini</a></p>
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
    <script src="{{ asset('js/register.js') }}"></script>
</body>

</html>
