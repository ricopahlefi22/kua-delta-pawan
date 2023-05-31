@extends('user.template.base')

@section('content')
    <div class="page-header justify-content-between">
        <h4 class="page-title">Formulir Pendaftaran Nikah</h4>
        @include('user.template.sections.countdown')
    </div>
    <form id="form" action="starter/store" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ empty($married_data->id) ? null : $married_data->id }}">
        <input type="hidden" name="user_id"
            value="{{ empty($married_data->user_id) ? Auth::user()->id : $married_data->user_id }}">
        <div class="card">
            <div class="card-body">
                <p>Tentukan perencanaan pernikahan anda, isi kolom tanggal, waktu dan tempat pelaksanaan akad pernikahan.
                </p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-5 order-md-last">
                            <img src="{{ asset('images/steps.jpeg') }}" class="img-fluid mb-2"
                                alt="">
                        </div>
                        <div class="col-md-7">
                            <div class="mb-2">
                                <label for="date" class="form-label">Tanggal Pernikahan</label>
                                <input id="date" type="date" class="form-control" name="married_date"
                                    value="{{ empty($married_data->date) ? null : $married_data->date }}">
                                <span id="marriedDateError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="time" class="form-label">Jam</label>
                                <input id="time" type="time" class="form-control" name="married_time"
                                    value="{{ empty($married_data->time) ? null : $married_data->time }}">
                                <span id="marriedTimeError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Apakah Akad Nikah akan dilakukan di kantor KUA
                                    Delta Pawan? <span id="marriedLocationOptionError" class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="married_location_option"
                                                id="optionTrue" value="1"
                                                @if (!empty($married_data)) {{ $married_data->married_on_office == 1 ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="optionTrue">
                                                Ya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="married_location_option"
                                                id="optionFalse" value="0"
                                                @if (!empty($married_data)) {{ $married_data->married_on_office == 0 ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="optionFalse">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wrapperLocation"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.template.sections.page')
        <button id="submit" class="btn btn-success float-end">Simpan & Lanjut</button>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            if ($('input[name="married_location_option"]:checked').val() != 0) {
                $("#wrapperLocation").html('');
            } else {
                $("#wrapperLocation").html(
                    '<div class="mb-2">\
                        <label for="location" class="form-label">Tempat Lokasi Pernikahan (Alamat)</label>\
                        <input id="location" type="text" class="form-control" name="location" placeholder="Nama Jalan, Desa, Kecamatan" value="{{ empty($married_data->married_address) ? null : $married_data->married_address }}">\
                        <span id="locationError" class="invalid-feedback"></span>\
                    </div>'
                );
            }

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("input[type='radio'][name='married_location_option']").on('change', function(e) {
                if ($(this).val() == 1) {
                    $("#wrapperLocation").html('');
                } else {
                    $("#wrapperLocation").html(
                        '<div class="mb-2">\
                            <label for="location" class="form-label">Tempat Lokasi Pernikahan (Alamat)</label>\
                            <input id="location" type="text" class="form-control" name="location" placeholder="Nama Jalan, Desa, Kecamatan">\
                            <span id="locationError" class="invalid-feedback"></span>\
                        </div>'
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
                        $("#date").removeClass("is-invalid");
                        $("#time").removeClass("is-invalid");
                        $("#location").removeClass("is-invalid");
                        $("#marriedLocationOptionError").html('');

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            window.location.href = 'personal';
                        }

                        $("#submit").html("Simpan & Lanjut");
                    },
                    error: function(error) {
                        console.error(error);
                        if (error.status == 422) {
                            var rspError = error["responseJSON"]["errors"];
                            $("#marriedDateError").html(rspError["married_date"]);
                            $("#marriedTimeError").html(rspError["married_time"]);
                            $("#marriedLocationOptionError").html(
                                rspError["married_location_option"]);
                            $("#locationError").html(rspError["location"]);

                            if (rspError["married_date"]) {
                                $("#date").addClass("is-invalid");
                            }

                            if (rspError["married_time"]) {
                                $("#time").addClass("is-invalid");
                            }

                            if (rspError["location"]) {
                                $("#location").addClass("is-invalid");
                            }
                        }

                        $("#submit").html("Simpan & Lanjut");
                    }
                });
            });
        });
    </script>
@endpush
