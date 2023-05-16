@extends('user.template.base')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Lengkapi Data Calon {{ Auth::user()->gender == 1 ? 'Istri' : 'Suami' }} Anda</h4>
    </div>
    <form id="form" action="partner/store" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <p>Lengkapi formulir berikut untuk keperluan pendaftaran nikah via daring.
                </p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ empty($partner_data->name) ? null : $partner_data->name }}">
                                <span id="nameError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="phoneNumber" class="form-label">Nomor Handphone</label>
                                <input id="phoneNumber" type="tel" class="form-control" name="phone_number"
                                    value="{{ empty($partner_data->phone_number) ? null : $partner_data->phone_number }}">
                                <span id="phoneNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="birthplace" class="form-label">Tempat Lahir</label>
                                <input id="birthplace" type="text" class="form-control" name="birthplace"
                                    value="{{ empty($partner_data->birthplace) ? null : $partner_data->birthplace }}">
                                <span id="birthplaceError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="employment" class="form-label">Pekerjaan</label>
                                <select id="employment" name="employment" class="form-control">
                                    <option value="" disabled hidden selected>*Pilih Pekerjaan</option>
                                    <option value="Petani"
                                        @if (!empty($partner_data)) {{ $partner_data->employment == 'Petani' ? 'selected' : null }} @endif>
                                        Petani
                                    </option>
                                    <option value="TNI/Polri"
                                        @if (!empty($partner_data)) {{ $partner_data->employment == 'TNI/Polri' ? 'selected' : null }} @endif>
                                        TNI/Polri
                                    </option>
                                    <option value="Pegawai Swasta"
                                        @if (!empty($partner_data)) {{ $partner_data->employment == 'Pegawai Swasta' ? 'selected' : null }} @endif>
                                        Pegawai Swasta
                                    </option>
                                    <option value="Pegawai Negeri Sipil"
                                        @if (!empty($partner_data)) {{ $partner_data->employment == 'Pegawai Negeri Sipil' ? 'selected' : null }} @endif>
                                        Pegawai Negeri Sipil
                                    </option>
                                </select>
                                <span id="employmentError" class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="idNumber" class="form-label">Nomor Induk Kependudukan</label>
                                <input id="idNumber" type="number" class="form-control" name="id_number"
                                    value="{{ empty($partner_data->id_number) ? null : $partner_data->id_number }}">
                                <span id="idNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="address" class="form-label">Alamat</label>
                                <input id="address" type="text" class="form-control" name="address"
                                    value="{{ empty($partner_data->address) ? null : $partner_data->address }}">
                                <span id="addressError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="birthday" class="form-label">Tanggal Lahir</label>
                                <input id="birthday" type="date" class="form-control" name="birthday"
                                    value="{{ empty($partner_data->birthday) ? null : $partner_data->birthday }}">
                                <span id="birthdayError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Kewarganegaraan <span id="citizenshipError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship" id="wni"
                                                value="wni"
                                                @if (!empty($partner_data)) {{ $partner_data->citizenship == 'wni' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="wni">WNI</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship"
                                                id="wna" value="wna"
                                                @if (!empty($partner_data)) {{ $partner_data->citizenship == 'wna' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="wna">WNA</label>
                                        </div>
                                    </div>
                                    <div id="wrapperCitizenship" class="col-7"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Status Perkawinan <span id="statusError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="virgin"
                                                value="1"
                                                @if (!empty($partner_data)) {{ $partner_data->status == 1 ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="virgin">Belum Menikah</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="divorce"
                                                value="2"
                                                @if (!empty($partner_data)) {{ $partner_data->status == 2 ? 'checked' : null }} @endif>
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
        @include('user.template.sections.page')
        <button id="submit" class="btn btn-success float-end">Simpan & Lanjut</button>
        <a href="personal" class="btn btn-outline-secondary float-end mx-2">Kembali</a>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            if ($('input[name="citizenship"]:checked').val() != 'wna') {
                $("#wrapperCitizenship").html('');
            } else {
                $("#wrapperCitizenship").html(
                    '<input id="country" type="text" name="country" class="form-control" placeholder="Nama Negara" value="{{ empty($personal_data->country) ? null : $personal_data->country }}">\
                    <span id="countryError" class="invalid-feedback"></span>'
                );
            }

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("input[type='radio'][name='citizenship']").on('change', function(e) {
                if ($(this).val() == 'wni') {
                    $("#wrapperCitizenship").html('');
                } else {
                    $("#wrapperCitizenship").html(
                        '<input id="country" type="text" name="country" class="form-control" placeholder="Nama Negara">\
                        <span id="countryError" class="invalid-feedback"></span>'
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

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            window.location.href = 'requirements';
                        }

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
                        }

                        $("#submit").html("Simpan & Lanjut");
                    }
                });
            });
        });
    </script>
@endpush
