new DataTable('#pemakaian');
$(document).ready(function () {
    $("#modal_add_btn").on("click", function () {
        $('#modal_add').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var nama = $("#nama").val()
        var kode = $("#kode").val()
        var description = $("#description").val()

        if (!nama) {
            alert("Nama harus diisi")
            return
        }

        if (!kode) {
            alert("Kode harus diisi")
            return
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `pemakaian`,
            type: "POST",
            data: {
                nama,
                kode,
                description
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
                $('#modal_add').modal('hide');
                return
            }
        });
    })

})
