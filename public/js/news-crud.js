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
            data: "title",
            name: "title",
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

$("#image").on("change", function (e) {
    var imageFile = e.target.files[0];

    if (imageFile) {
        const reader = new FileReader();
        reader.readAsDataURL(imageFile);

        reader.addEventListener("load", () => {
            $("#imagePreview").attr("src", reader.result);
        });
    }
});

$("#create").click(function () {
    $("#formModal").modal("show");
    $("#modalTitle").html("Tambah Berita");
    $("#button").html("Tambah").removeClass("btn-warning");
    $("#id").val("");
    $("#title").val("");
    $("#body").val("");
    $("#image").val("");
    $("#hiddenImage").val("");
    $("#titleError").html("");
    $("#bodyError").html("");
    $("#imagePreview").attr("src", "");
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
            $("#titleError").html("");
            $("#bodyError").html("");
            $("#button").html(
                '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> Memproses...</div>'
            );
        },
        success: function (response) {
            console.log(response);
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
                $("#titleError").html(responseError["title"]);
                $("#bodyError").html(responseError["body"]);

                if (responseError["title"] && responseError["body"]) {
                    $("#title").focus();
                } else if (responseError["title"]) {
                    $("#title").focus();
                } else {
                    $("#body").focus();
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
            $("#formModal").modal("show");
            $("#modalTitle").html("Sunting Data");
            $("#button").html("Simpan").addClass("btn-warning");
            $("#titleError").html("");
            $("#bodyError").html("");
            $("#image").val("");
            $("#imagePreview").attr("src", "");


            $("#id").val(response.id);
            $("#title").val(response.title);
            $("#body").val(response.body);
            $("#hiddenImage").val(response.image);
            $("#imagePreview").attr("src", response.image);
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
