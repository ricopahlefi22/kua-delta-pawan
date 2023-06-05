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
            data: "user",
            name: "user",
        },
        {
            data: "date",
            name: "date",
        },
        {
            data: "time",
            name: "time",
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

$("#create").click(function () {
    $("#formModal").modal("show");
    $("#modalTitle").html("Tambah Data");
    $("#button").html("Tambah").removeClass("btn-warning");
    $("#id").val("");
    $("#name").val("");
    $("#email").val("");
    $("#photo").val("");
    $("#hiddenPhoto").val("");
    $("#nameError").html("");
    $("#emailError").html("");
    $("#photoPreview").attr("src", "");
});

$("input[type='radio'][name='married_location_option']").on(
    "change",
    function (e) {
        if ($(this).val() == 1) {
            $("#wrapperLocation").addClass("d-none");
        } else {
            $("#wrapperLocation").removeClass("d-none");
        }
    }
);

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
            $("#nameError").html("");
            $("#emailError").html("");
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
            $("#button").html("Simpan");

            if (error.status == 422) {
                var responseError = error["responseJSON"]["errors"];
                $("#nameError").html(responseError["name"]);
                $("#emailError").html(responseError["email"]);

                if (responseError["name"] && responseError["email"]) {
                    $("#name").focus();
                } else if (responseError["name"]) {
                    $("#name").focus();
                } else {
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
            $("#modalTitle").html("Sunting Data Pendaftaran Nikah");
            $("#button").html("Simpan").addClass("btn-warning");
            $("#nameError").html("");
            $("#emailError").html("");
            $("#photo").val("");
            $("#photoPreview").attr("src", "");

            $("#id").val(response.id);
            $("#userId").val(response.user_id);
            $("#partnerId").val(response.partner_id);
            $("#date").val(response.date);
            $("#time").val(response.time);
            $("#location").val(response.married_address);
            $("input[name='married_location_option']").val([
                response.married_on_office,
            ]);

            if (response.married_on_office == 1) {
                $("#wrapperLocation").addClass("d-none");
            } else {
                $("#wrapperLocation").removeClass("d-none");
            }
        },
    });
});

$("body").on("click", ".delete", function () {
    if (confirm("Yakin ingin melanjutkan menghapus data ini?") === true) {
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
                        title: "Gagal! \nServer Bermasalah.",
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
