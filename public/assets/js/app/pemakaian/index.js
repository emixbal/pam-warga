new DataTable('#pemakaian');
$(document).ready(function () {
    $(".bayar-pemakaian-btn").on("click", function () {
        $('#modal_bayar').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var pemakaian_id = $("#pemakaian_id").val()
        var method_id = $("#method_id").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `pemakaian`,
            type: "POST",
            data: {
                method_id,
                pemakaian_id,
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
