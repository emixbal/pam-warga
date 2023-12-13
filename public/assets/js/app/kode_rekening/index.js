new DataTable('#anggaran');
$(document).ready(function () {
    $("#modal_add_btn").on("click", function () {
        $('#modal_add').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var kode = $("#kode").val()
        var description = $("#description").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `kode-rekening`,
            type: "POST",
            data: {
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

    $(".edit-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var anggaran = JSON.parse(data)

        $("#id_edit").val(anggaran.id)
        $("#kode_edit").val(anggaran.kode)
        $("#description_edit").val(anggaran.description)

        $('#modal_edit').modal('show');
    })

    $("#modal_edit_save_btn").on("click", function () {
        var id = $("#id_edit").val()
        var kode = $("#kode_edit").val()
        var description = $("#description_edit").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `kode-rekening/${id}`,
            type: "PUT",
            data: {
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
                $('#modal_edit').modal('hide');
                return
            }
        });
    })

    $(".remove-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var anggaran = JSON.parse(data)

        $("#id_delete").val(anggaran.id)
        $("#kode_delete").val(anggaran.kode)
        $("#description_delete").val(anggaran.description)

        $('#modal_delete').modal('show');
    })

    $("#modal_delete_save_btn").on("click", function () {
        var id = $("#id_delete").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `kode-rekening/${id}`,
            type: "DELETE",
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
                $('#modal_delete').modal('hide');
                return
            }
        });
    })

})
