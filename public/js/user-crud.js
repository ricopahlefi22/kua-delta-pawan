$(document).ready(function () {
    $("[data-mask]").inputmask();

    var Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
    });

    var table = $("#table").DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: document.URL,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                searchable: false,
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "email",
                name: "email",
            },
            {
                data: "phone_number",
                name: "phone_number",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
                class: "text-center",
            },
        ],
        oLanguage: {
            sSearch: "Pencarian",
            sInfoEmpty: "Data Belum Tersedia",
            sInfo: "Menampilkan _PAGE_ dari _PAGES_ halaman",
            sEmptyTable: "Data Belum Tersedia",
            sLengthMenu: "Tampilkan _MENU_ Baris",
            sZeroRecords: "Data Tidak Ditemukan",
            sProcessing: "Sedang Memproses...",
            oPaginate: {
                sFirst: "Pertama",
                sPrevious: "Sebelumnya",
                sNext: "Selanjutnya",
                sLast: "Terakhir",
            },
        },
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#photo").on("change", function (e) {
        var imageFile = e.target.files[0];

        if (imageFile) {
            const reader = new FileReader();
            reader.readAsDataURL(imageFile);

            reader.addEventListener("load", () => {
                $("#photoPreview").attr("src", reader.result);
            });

            $("#photoButton").html("Ganti").addClass("btn-warning");
            $("#photoError").html("");
        }
    });

    $("#ktp").on("change", function (e) {
        var imageFile = e.target.files[0];

        if (imageFile) {
            const reader = new FileReader();
            reader.readAsDataURL(imageFile);

            reader.addEventListener("load", () => {
                $("#ktpPreview").attr("src", reader.result);
            });

            $("#ktpButton").html("Ganti").addClass("btn-warning");
            $("#ktpError").html("");
        }
    });

    $("#create").click(function () {
        $("#formModal").modal("show");
        $("#modalTitle").html("Tambah Data");
        $("#button").html("Tambah").removeClass("btn-warning");
        $("#id").val("");
        $("#name").val("");
        $("#email").val("").prop("readonly", false);
        $("#phoneNumber").val("");
        $("#idNumber").val("");
        $("#birthplace").val("");
        $("#address").val("");
        $("#birthday").val("");
        $("#country").val("");
        $("#employment").val("");

        $("#name").removeClass("is-invalid");
        $("#email").removeClass("is-invalid");

        $('input[name="gender"]').val([]);
        $('input[name="status"]').val([]);
        $('input[name="citizenship"]').val([]);

        $("#photo").val("");
        $("#hiddenPhoto").val("");
        $("#nameError").html("");
        $("#emailError").html("");

        $("#photoButton").html("Unggah Pas Foto").removeClass("btn-warning");
        $("#photoPreview").attr("src", "");

        $("#ktpButton").html("Unggah Foto KTP").removeClass("btn-warning");
        $("#ktpPreview").attr("src", "");
    });

    $("input[type='radio'][name='citizenship']").on("change", function (e) {
        if ($(this).val() != "WNA") {
            $("#countryWrapper").addClass("d-none");
        } else {
            $("#countryWrapper").removeClass("d-none");
        }
    });

    $("#form").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: document.URL + "/store",
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $("#name").removeClass("is-invalid");
                $("#email").removeClass("is-invalid");
                $("#button").html(
                    '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> Memproses...</div>'
                );
            },
            success: function (response) {
                table.draw();
                $("#formModal").modal("hide");

                Toast.fire({
                    icon: "success",
                    title: response.status + "\n" + response.message,
                });
            },
            error: function (error) {
                console.log(error);
                $("#button").html("Simpan");

                if (error.status == 422) {
                    var responseError = error["responseJSON"]["errors"];
                    $("#nameError").html(responseError["name"]);
                    $("#emailError").html(responseError["email"]);

                    if (responseError["name"]) {
                        $("#name").addClass("is-invalid");
                        $("#name").focus();
                    }

                    if (responseError["email"]) {
                        $("#email").addClass("is-invalid");
                        $("#email").focus();
                    }
                }
            },
        });
    });

    $("body").on("click", ".edit", function () {
        $.ajax({
            type: "POST",
            url: document.URL + "/check",
            data: {
                id: $(this).data("id"),
            },
            success: function (response) {
                console.log(response);
                $("#formModal").modal("show");
                $("#modalTitle").html("Sunting Data");
                $("#name").removeClass("is-invalid");
                $("#email").removeClass("is-invalid");
                $("#button").html("Simpan").addClass("btn-warning");
                $("#photo").val("");
                $("#photoPreview").attr("src", "");

                $("#photoButton").html("Ganti").addClass("btn-warning");
                $("#ktpButton").html("Ganti").addClass("btn-warning");

                $("#id").val(response.id);
                $("#name").val(response.name);
                $("#email").val(response.email).prop("readonly", true);
                $("#phoneNumber").val(response.phone_number);
                $("#idNumber").val(response.id_number);
                $("#birthplace").val(response.birthplace);
                $("#address").val(response.address);
                $("#birthday").val(response.birthday);
                $("#country").val(response.country);
                $("#employment").val(response.employment);
                $('input[name="gender"]').val([response.gender]);
                $('input[name="status"]').val([response.status]);

                $('input[name="citizenship"]').val([response.citizenship]);
                if (response.citizenship != "WNA") {
                    $("#countryWrapper").addClass("d-none");
                } else {
                    $("#countryWrapper").removeClass("d-none");
                }

                $("#hiddenPhoto").val(response.photo);
                $("#photoPreview").attr("src", response.photo);
                $("#hiddenKTP").val(response.ktp);
                $("#ktpPreview").attr("src", response.ktp);
            },
        });
    });

    $("body").on("click", ".delete", function () {
        if (
            confirm(
                "Menghapus data ini juga akan menghapus seluruh data terkait. Yakin ingin melanjutkan?"
            ) === true
        ) {
            $.ajax({
                type: "DELETE",
                url: document.URL + "/destroy",
                data: {
                    id: $(this).data("id"),
                },
                success: function (response) {
                    table.draw();
                    Toast.fire({
                        icon: "success",
                        title: response.status + "\n" + response.message,
                    });
                },
                error: function (error) {
                    if (error.status == 500) {
                        Toast.fire({
                            icon: "error",
                            title: "Gagal! \nPeriksa koneksi databasemu.",
                        });
                    } else if (error.status == 404) {
                        Toast.fire({
                            icon: "error",
                            title: "Data Tidak Ditemukan! \nData mungkin telah terhapus sebelumnya.",
                        });
                        table.draw();
                    } else if (error.status == 419) {
                        Toast.fire({
                            icon: "error",
                            title: "Sesi Telah Berakhir! \nMemuat ulang sistem untuk anda.",
                        });

                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: "Masalah Tidak Dikenali! \nMencoba memuat kembali untuk anda.",
                        });

                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    }
                },
            });
        }
    });
});
