$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function() {
                $("#name").removeClass("is-invalid");
                $("#email").removeClass("is-invalid");
                $("#password").removeClass("is-invalid");
                $("#passwordConfirmation").removeClass("is-invalid");
                $("#submit").html(
                    '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                );
            },
            success: function(response) {
                if (response.code == 200) {
                    Swal.fire({
                        icon: "success",
                        title: response.status,
                        text: response.message,
                        confirmButtonText: "Lanjut",
                        confirmButtonColor: "#007BFF",
                        backdrop: true,
                        allowOutsideClick: () => {
                            console.log("Klik Tombol Lanjut");
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: response.status,
                        text: response.message,
                        confirmButtonText: "Tutup",
                        confirmButtonColor: "#6C757D",
                    });
                }

                $("#submit").html("Masuk");
            },
            error: function(error) {
                console.error(error);
                if (error.status == 422) {
                    var rspError = error["responseJSON"]["errors"];
                    $("#nameError").html(rspError["name"]);
                    $("#emailError").html(rspError["email"]);
                    $("#passwordError").html(rspError["password"]);
                    $("#passwordConfirmationError").html(rspError["password_confirmation"]);

                    if (rspError["name"]) {
                        $("#name").addClass("is-invalid");
                    }

                    if (rspError["email"]) {
                        $("#email").addClass("is-invalid");
                    }

                    if (rspError["password"]) {
                        $("#password").addClass("is-invalid");
                    }

                    if (rspError["password_confirmation"]) {
                        $("#passwordConfirmation").addClass("is-invalid");
                    }
                }

                $("#submit").html("Masuk");
            },
        });

    });
});
