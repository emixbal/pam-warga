new DataTable('#partai');
$(document).ready(function () {
    $("#modal_add_btn").on("click", function () {
        $('#modal_add').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var name = $("#name").val()
        var description = $("#description").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `partai`,
            type: "POST",
            data: {
                name,
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
                $("#name").val('')
                $("#description").val('')
                $('#modal_add').modal('hide');
                return
            }
        });
    })

    $(".edit-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var partai = JSON.parse(data)

        $("#id_edit").val(partai.id)
        $("#name_edit").val(partai.name)
        $("#description_edit").val(partai.description)

        $('#modal_edit').modal('show');
    })

    $("#modal_edit_save_btn").on("click", function () {
        var id = $("#id_edit").val()
        var name = $("#name_edit").val()
        var description = $("#description_edit").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `partai/${id}`,
            type: "PUT",
            data: {
                name,
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
                $("#name").val('')
                $("#description").val('')
                $('#modal_edit').modal('hide');
                return
            }
        });
    })

    $(".remove-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var partai = JSON.parse(data)

        $("#id_delete").val(partai.id)
        $("#name_delete").val(partai.name)
        $("#description_delete").val(partai.description)

        $('#modal_delete').modal('show');
    })

    $("#modal_delete_save_btn").on("click", function () {
        var id = $("#id_delete").val()
        var name = $("#name_delete").val()
        var description = $("#description_delete").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `partai/${id}`,
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
                $("#name").val('')
                $("#description").val('')
                $('#modal_delete').modal('hide');
                return
            }
        });
    })

})
