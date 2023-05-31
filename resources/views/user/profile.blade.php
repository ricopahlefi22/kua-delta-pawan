@extends('user.template.base')

@section('content')
    <div class="card">
        <div class="container-fluid">
            <div class="row content-min-height">
                <div class="p-0 column-panel border-end" style="max-width: 130px; min-width: 130px; left: -130px;">
                    <div class="columns-panel-item-group">
                        <a href="requirements" class="columns-panel-item columns-panel-item-link">
                            <div class="d-flex align-items-center">
                                <i class="feather font-size-lg icon-chevron-left"></i>
                                <span class="ms-3">Kembali</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="mb-4 d-md-flex align-items-center justify-content-between">
                            <div>
                                <h4>Profil</h4>
                                <p>Memuat data pribadi anda dan mengganti password jika diperlukan.</p>
                            </div>

                            @if (empty(Auth::user()->password))
                                <button id="createPassword" class="btn btn-primary">Buat Password</button>
                            @else
                                <button id="changePassword" class="btn btn-primary">Ganti Password</button>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class="py-4">Nama</th>
                                            <td class="py-4">{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-4">Email</th>
                                            <td class="py-4">{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-4">Nomor Handphone</th>
                                            <td class="py-4">
                                                {{ empty(Auth::user()->phone_number) ? '-' : Auth::user()->phone_number }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="createPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHeader" class="modal-header">
                    <h5 id="modalTitle" class="modal-title">Buat Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formCreate" action="change-password" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="createPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="createPassword" name="password"
                                placeholder="Password Baru">
                            <span id="createPasswordError" class="invalid-feedback"></span>

                        </div>
                        <div class="mb-2">
                            <label for="createPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="createPasswordConfirmation"
                                name="password_confirmation" placeholder="Konfirmasi Password">
                            <span id="createPasswordConfirmationError" class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button id="createSubmit" type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHeader" class="modal-header">
                    <h5 id="modalTitle" class="modal-title">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" action="change-password" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password Baru">
                            <span id="passwordError" class="invalid-feedback"></span>

                        </div>
                        <div class="mb-2">
                            <label for="passwordConfirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="passwordConfirmation"
                                name="password_confirmation" placeholder="Konfirmasi Password">
                            <span id="passwordConfirmationError" class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button id="submit" type="submit" class="btn btn-warning">Ganti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
            });

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("#createPassword").click(function() {
                $("#createPasswordModal").modal('show');
            });

            $("#changePassword").click(function() {
                $("#changePasswordModal").modal('show');
            });

            $("#formCreate").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $("#createPassword").removeClass("is-invalid");
                        $("#createPasswordConfirmation").removeClass("is-invalid");

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        console.log(response);
                        Toast.fire({
                            icon: "success",
                            title: response.status + "\n" + response.message,
                        });

                        $("#submit").html("Simpan");
                        $("#createPasswordModal").modal('hide');
                    },
                    error: function(error) {
                        console.error(error);
                        if (error.status == 422) {
                            var rspError = error["responseJSON"]["errors"];
                            $("#createPasswordError").html(rspError["password"]);
                            $("#createPasswordConfirmationError").html(rspError[
                                "password_confirmation"]);

                            if (rspError["password"]) {
                                $("#createPassword").addClass("is-invalid");
                            }

                            if (rspError["password_confirmation"]) {
                                $("#createPasswordConfirmation").addClass("is-invalid");
                            }
                        }

                        $("#submit").html("Simpan");
                    }
                });
            });

            $("#form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $("#oldPassword").removeClass("is-invalid");
                        $("#password").removeClass("is-invalid");
                        $("#passwordConfirmation").removeClass("is-invalid");

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        console.log(response);
                        Toast.fire({
                            icon: "success",
                            title: response.status + "\n" + response.message,
                        });

                        $("#submit").html("Ganti");
                        $("#changePasswordModal").modal('hide');
                    },
                    error: function(error) {
                        console.error(error);
                        if (error.status == 422) {
                            var rspError = error["responseJSON"]["errors"];
                            $("#passwordError").html(rspError["password"]);
                            $("#passwordConfirmationError").html(rspError[
                                "password_confirmation"]);

                            if (rspError["password"]) {
                                $("#password").addClass("is-invalid");
                            }

                            if (rspError["password_confirmation"]) {
                                $("#passwordConfirmation").addClass("is-invalid");
                            }
                        }

                        $("#submit").html("Ganti");
                    }
                });
            });
        });
    </script>
@endpush
