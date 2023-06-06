@extends('user.template.base')

@section('content')
    <div class="page-header justify-content-between">
        <h4 class="page-title">Lengkapi Data Pribadi Anda</h4>
        @include('user.template.sections.countdown')
    </div>
    <form id="form" action="personal/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <p>Data-data berikut kami butuhkan untuk kelengkapan syarat pendaftaran nikah. kemudian, klik tombol simpan setelelah mengisi formulir.</p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nama Lengkap<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ empty($personal_data->name) ? Auth::user()->name : $personal_data->name }}">
                                <span id="nameError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="phoneNumber" class="form-label">Nomor Handphone / Whatsapp<span
                                        class="text-danger" title="Wajib Diisi">*</span></label>
                                <input id="phoneNumber" type="tel" class="form-control" name="phone_number"
                                    value="{{ empty($personal_data->phone_number) ? null : $personal_data->phone_number }}">
                                <span id="phoneNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="birthplace" class="form-label">Tempat Lahir<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <input id="birthplace" type="text" class="form-control" name="birthplace"
                                    value="{{ empty($personal_data->birthplace) ? null : $personal_data->birthplace }}">
                                <span id="birthplaceError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="employment" class="form-label">Pekerjaan<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <select id="employment" name="employment" class="form-control">
                                    <option value="" disabled hidden selected>*Pilih Pekerjaan</option>
                                    <option value="Belum Bekerja"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'Belum Bekerja' ? 'selected' : null }} @endif>
                                        Belum Bekerja
                                    </option>
                                    <option value="Wirausaha"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'Wirausaha' ? 'selected' : null }} @endif>
                                        Wirausaha
                                    </option>
                                    <option value="Nelayan"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'Nelayan' ? 'selected' : null }} @endif>
                                        Nelayan
                                    </option>
                                    <option value="Petani"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'Petani' ? 'selected' : null }} @endif>
                                        Petani
                                    </option>
                                    <option value="TNI/Polri"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'TNI/Polri' ? 'selected' : null }} @endif>
                                        TNI/Polri
                                    </option>
                                    <option value="Pegawai Swasta"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'Pegawai Swasta' ? 'selected' : null }} @endif>
                                        Pegawai Swasta
                                    </option>
                                    <option value="Pegawai Negeri Sipil"
                                        @if (!empty($personal_data)) {{ $personal_data->employment == 'Pegawai Negeri Sipil' ? 'selected' : null }} @endif>
                                        Pegawai Negeri Sipil
                                    </option>
                                </select>
                                <span id="employmentError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Jenis Kelamin<span class="text-danger"
                                        title="Wajib Diisi">*</span> <span id="genderError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="Laki-Laki"
                                                @if (!empty($personal_data)) {{ $personal_data->gender == 'Laki-Laki' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="male">
                                                Laki-Laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="Perempuan"
                                                @if (!empty($personal_data)) {{ $personal_data->gender == 'Perempuan' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="female">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="idNumber" class="form-label">Nomor Induk Kependudukan<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <input id="idNumber" class="form-control" name="id_number"
                                    data-inputmask='"mask": "9999 9999 9999 9999"' data-mask
                                    value="{{ empty($personal_data->id_number) ? null : $personal_data->id_number }}">
                                <span id="idNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="address" class="form-label">Alamat<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <input id="address" type="text" class="form-control" name="address"
                                    value="{{ empty($personal_data->address) ? null : $personal_data->address }}">
                                <span id="addressError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="birthday" class="form-label">Tanggal Lahir<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <input id="birthday" type="date" class="form-control" name="birthday"
                                    value="{{ empty($personal_data->birthday) ? null : $personal_data->birthday }}">
                                <span id="birthdayError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Kewarganegaraan<span class="text-danger"
                                        title="Wajib Diisi">*</span> <span id="citizenshipError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship"
                                                id="wni" value="WNI"
                                                @if (!empty($personal_data)) {{ $personal_data->citizenship == 'WNI' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="wni">WNI</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship"
                                                id="wna" value="WNA"
                                                @if (!empty($personal_data)) {{ $personal_data->citizenship == 'WNA' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="wna">WNA</label>
                                        </div>
                                    </div>
                                    <div id="wrapperCitizenship" class="col-7"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Status Perkawinan<span class="text-danger"
                                        title="Wajib Diisi">*</span> <span id="statusError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="virgin"
                                                value="Belum Menikah"
                                                @if (!empty($personal_data)) {{ $personal_data->status == 'Belum Menikah' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="virgin">Belum Menikah</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="divorce"
                                                value="Pernah Menikah"
                                                @if (!empty($personal_data)) {{ $personal_data->status == 'Pernah Menikah' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="divorce">Pernah Menikah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p>Foto harus diunggah dengan format yang benar, yaitu JPG atau JPEG.</p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Pas Foto (Latar Belakang Biru)<span class="text-danger"
                                        title="Wajib Diisi">*</span> <span id="photoError"
                                        class="text-danger"></span></label>
                                <input id="hiddenPhoto" type="hidden" name="hidden_photo"
                                    value="{{ empty($personal_data->photo) ? null : $personal_data->photo }}">
                                @if (empty($personal_data->photo))
                                    <div class="text-center">
                                        <img id="photoPreview" class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="photoButton" for="photo" class="btn btn-primary w-100">
                                                Unggah Pas Foto
                                            </label>
                                        </div>
                                        <input id="photo" type="file" name="photo" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img id="photoPreview" src="{{ asset($personal_data->photo) }}"
                                            class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="photoButton" for="photo" class="btn btn-primary w-100">
                                                Ganti Pas Foto
                                            </label>
                                        </div>
                                        <input id="photo" type="file" name="photo" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Foto KTP<span class="text-danger" title="Wajib Diisi">*</span>
                                    <span id="ktpError" class="text-danger"></span></label>
                                <input id="hiddenKTP" type="hidden" name="hidden_ktp"
                                    value="{{ empty($personal_data->ktp) ? null : $personal_data->ktp }}">
                                @if (empty($personal_data->ktp))
                                    <div class="text-center">
                                        <img id="ktpPreview" class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="ktpButton" for="ktp" class="btn btn-primary w-100">
                                                Unggah Foto KTP
                                            </label>
                                        </div>
                                        <input id="ktp" type="file" name="ktp" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img id="ktpPreview" src="{{ asset($personal_data->ktp) }}"
                                            class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="ktpButton" for="ktp" class="btn btn-primary w-100">
                                                Ganti Foto KTP
                                            </label>
                                        </div>
                                        <input id="ktp" type="file" name="ktp" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.template.sections.page')
        <button id="submit" class="btn btn-success float-end">Simpan & Lanjut</button>
        <a href="starter" class="btn btn-outline-secondary float-end mx-2">Kembali</a>
    </form>
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

            $('[data-mask]').inputmask();

            $("#photo").on("change", function(e) {
                var imageFile = e.target.files[0];

                if (imageFile) {
                    const reader = new FileReader();
                    reader.readAsDataURL(imageFile);

                    reader.addEventListener("load", () => {
                        $("#photoPreview").attr("src", reader.result);
                    });

                    $("#photoButton").html('Ganti').addClass('btn-warning');
                    $("#photoError").html('');
                }
            });

            $("#ktp").on("change", function(e) {
                var imageFile = e.target.files[0];

                if (imageFile) {
                    const reader = new FileReader();
                    reader.readAsDataURL(imageFile);

                    reader.addEventListener("load", () => {
                        $("#ktpPreview").attr("src", reader.result);
                    });

                    $("#ktpButton").html('Ganti').addClass('btn-warning');
                    $("#ktpError").html('');
                }
            });

            if ($('input[name="citizenship"]:checked').val() != 'WNA') {
                $("#wrapperCitizenship").html('');
            } else {
                $("#wrapperCitizenship").html(
                    '<input id="country" type="text" name="country" class="form-control" placeholder="Nama Negara" value="{{ empty($personal_data->country) ? null : $personal_data->country }}"> <span id="countryError" class="invalid-feedback"></span>'
                );
            }

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("input[type='radio'][name='citizenship']").on('change', function(e) {
                if ($(this).val() == 'WNI') {
                    $("#wrapperCitizenship").html('');
                } else {
                    $("#wrapperCitizenship").html(
                        '<input id="country" type="text" name="country" class="form-control" placeholder="Nama Negara"><span id="countryError" class="invalid-feedback"></span>'
                    );
                }
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
                        $("#name").removeClass("is-invalid");
                        $("#idNumber").removeClass("is-invalid");
                        $("#phoneNumber").removeClass("is-invalid");
                        $("#address").removeClass("is-invalid");
                        $("#birthplace").removeClass("is-invalid");
                        $("#birthday").removeClass("is-invalid");
                        $("#employment").removeClass("is-invalid");
                        $("#country").removeClass("is-invalid");

                        $("#genderError").html('');
                        $("#statusError").html('');
                        $("#citizenshipError").html('');
                        $("#photoError").html('');
                        $("#ktpError").html('');

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil!\n Data berhasil disimpan.",
                        });

                        setTimeout(() => {
                            if (response.code == 200) {
                                window.location.href = 'partner';
                            }
                        }, 2500);

                        $("#submit").html("Simpan & Lanjut");
                    },
                    error: function(error) {
                        console.error(error);
                        if (error.status == 422) {
                            var rspError = error["responseJSON"]["errors"];
                            $("#nameError").html(rspError["name"]);
                            $("#idNumberError").html(rspError["id_number"]);
                            $("#phoneNumberError").html(rspError["phone_number"]);
                            $("#addressError").html(rspError["address"]);
                            $("#birthplaceError").html(rspError["birthplace"]);
                            $("#birthdayError").html(rspError["birthday"]);
                            $("#employmentError").html(rspError["employment"]);
                            $("#genderError").html(rspError["gender"]);
                            $("#statusError").html(rspError["status"]);
                            $("#citizenshipError").html(rspError["citizenship"]);
                            $("#countryError").html(rspError["country"]);
                            $("#photoError").html(rspError["photo"]);
                            $("#ktpError").html(rspError["ktp"]);

                            if (rspError["name"]) {
                                $("#name").addClass("is-invalid");
                            }

                            if (rspError["id_number"]) {
                                $("#idNumber").addClass("is-invalid");
                            }

                            if (rspError["phone_number"]) {
                                $("#phoneNumber").addClass("is-invalid");
                            }

                            if (rspError["address"]) {
                                $("#address").addClass("is-invalid");
                            }

                            if (rspError["birthplace"]) {
                                $("#birthplace").addClass("is-invalid");
                            }

                            if (rspError["birthday"]) {
                                $("#birthday").addClass("is-invalid");
                            }

                            if (rspError["employment"]) {
                                $("#employment").addClass("is-invalid");
                            }

                            if (rspError["country"]) {
                                $("#country").addClass("is-invalid");
                            }

                            if (rspError["photo"]) {
                                $("#photo").addClass("is-invalid");
                            }

                            if (rspError["ktp"]) {
                                $("#ktp").addClass("is-invalid");
                            }
                        }

                        $("#submit").html("Simpan & Lanjut");
                    }
                });
            });
        });
    </script>
@endpush
