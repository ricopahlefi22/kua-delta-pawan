@extends('admin.template.base')

@section('content')
    <div class="main">
        <div class="page-header flex justify-content-between">
            <h4 class="page-title">Verifikasi Data Pernikahan</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <p>Tabel ini menampilkan data-data pernikahan</p>

            </div>
        </div>
        <form id="form" action="{{ url('registrations/verification') }}" method="POST">
            <input type="hidden" name="wedding_id" value="{{ $wedding->id }}">
            <button id="submit" class="btn btn-success float-end">Verifikasi</button>
        </form>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-end mx-2">Kembali</a>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
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

                        $("#genderError").html('');

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        console.log(response);

                        location.reload();

                        $("#submit").html("Verifikasi");
                    },
                    error: function(error) {
                        console.error(error);

                        $("#submit").html("Verifikasi");
                    }
                });
            });
        });
    </script>
@endpush
