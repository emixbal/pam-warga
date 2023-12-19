new DataTable('#pembayaran');
$(document).ready(function () {
    $(".bayar-pembayaran-btn").on("click", function () {
        $('#modal_bayar').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var pembayaran_id = $("#pembayaran_id").val()
        var method_id = $("#method_id").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `pembayaran`,
            type: "POST",
            data: {
                method_id,
                pembayaran_id,
            },
            success: async function (response, textStatus, xhr) {
                location.reload();
                return
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("terjadi kesalahan");
                console.log(jqXHR, textStatus, errorThrown);
                return
            },
            complete: function (params) {
                $("#kode").val('')
                $("#description").val('')
                $('#modal_bayar').modal('hide');
                return
            }
        });
    })

})
