@extends('user.template.base')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Lengkapi Berkas Berikut</h4>
    </div>
    <form id="form" action="personal/store" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <p>Berkas - berkas berikut bertujuan untuk keperluan pendaftaran nikah, berkas bisa difotocopy ataupun
                    melalui scan.
                </p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="name" class="form-label">Surat Pengantar Nikah (Model N1)</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="name" class="form-label">Persetujuan Calon Mempelai (Model N3)</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Berkas Mempelai Pria</h6>
                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="name" class="form-label">Berkas Blabla</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>
                            <div class="mb-2">
                                <label for="name" class="form-label">Berkas Blabla</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>

                            <div class="mb-2">
                                <label for="name" class="form-label">Berkas Blabla</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Berkas Mempelai Wanita</h6>
                        <div class="mt-4">
                            <div class="mb-2">
                                <label for="name" class="form-label">Berkas Blabla</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>
                            <div class="mb-2">
                                <label for="name" class="form-label">Berkas Blabla</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>

                            <div class="mb-2">
                                <label for="name" class="form-label">Berkas Blabla</label>
                                <input id="name" type="file" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('user.template.sections.page')
        <button id="submit" class="btn btn-success float-end" disabled>Kirim</button>
        <a href="partner" class="btn btn-outline-secondary float-end mx-2">Kembali</a>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("input[type='radio'][name='gender']").on('change', function(e) {
                if ($(this).val() == 1) {
                    $("#wrapperStatus").html(
                        '<div class="row">\
                                                    <div class="col-3">\
                                                        <div class="form-check">\
                                                            <input class="form-check-input" type="radio" name="status" id="virgin" value="1">\
                                                            <label class="form-check-label ms-2" for="virgin">Jejaka</label>\
                                                        </div>\
                                                    </div>\
                                                    <div class="col-4">\
                                                        <div class="form-check">\
                                                            <input class="form-check-input" type="radio" name="status" id="divorce" value="2">\
                                                            <label class="form-check-label ms-2" for="divorce">Duda</label>\
                                                        </div>\
                                                    </div>\
                                                    <div class="col-4">\
                                                        <div class="form-check">\
                                                            <input class="form-check-input" type="radio" name="status" id="polygamy" value="3">\
                                                            <label class="form-check-label ms-2" for="polygamy">Beristri ke</label>\
                                                        </div>\
                                                    </div>\
                                                </div>'
                    );
                } else {
                    $("#wrapperStatus").html(
                        '<div class="row">\
                                                    <div class="col-3">\
                                                        <div class="form-check">\
                                                            <input class="form-check-input" type="radio" name="status" id="virgin" value="1">\
                                                            <label class="form-check-label ms-2" for="virgin">Perawan</label>\
                                                        </div>\
                                                    </div>\
                                                    <div class="col-4">\
                                                        <div class="form-check">\
                                                            <input class="form-check-input" type="radio" name="status" id="divorce" value="2">\
                                                            <label class="form-check-label ms-2" for="divorce">Janda</label>\
                                                        </div>\
                                                    </div>\
                                                </div>'
                    );
                }
            });

            $("input[type='radio'][name='status']").on('change', function(e) {
                console.log($(this).val());
                if ($(this).val() == 1) {
                    $("#wrapperLocation").html('');
                } else {
                    $("#wrapperLocation").html(
                        '<div class="mb-2">\
                                                            <label for="location" class="form-label">Nama Istri Terdahulu</label>\
                                                            <input id="location" type="text" class="form-control" name="location">\
                                                            <span id="locationError" class="invalid-feedback"></span>\
                                                        </div>'
                    );
                }
            });

            $("#form").on('submit', function(e) {
                // e.preventDefault();

                // $.ajax({
                //     url: $(this).attr('action'),
                //     method: $(this).attr('method'),
                //     data: new FormData(this),
                //     processData: false,
                //     dataType: "json",
                //     contentType: false,
                //     beforeSend: function() {
                //         $("#marriedDateError").html('');
                //         $("#marriedTimeError").html('');
                //         $("#marriedLocationOptionError").html('');
                //         $("#date").removeClass("is-invalid");
                //         $("#time").removeClass("is-invalid");

                //         $("#submit").html(
                //             '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                //         );
                //     },
                //     success: function(response) {
                //         if (response.code == 200) {
                //             window.location.href = 'personal';
                //         }

                //         $("#submit").html("Lanjut");
                //     },
                //     error: function(error) {
                //         console.error(error);
                //         if (error.status == 422) {
                //             var rspError = error["responseJSON"]["errors"];
                //             $("#marriedDateError").html(rspError["married_date"]);
                //             $("#marriedTimeError").html(rspError["married_time"]);
                //             $("#marriedLocationOptionError").html(
                //                 rspError["married_location_option"]);
                //             $("#locationError").html(rspError["location"]);

                //             if (rspError["married_date"]) {
                //                 $("#date").addClass("is-invalid");
                //             }

                //             if (rspError["married_time"]) {
                //                 $("#time").addClass("is-invalid");
                //             }

                //             if (rspError["location"]) {
                //                 $("#location").addClass("is-invalid");
                //             }
                //         }

                //         $("#submit").html("Lanjut");
                //     }
                // });
            });
        });
    </script>
@endpush
