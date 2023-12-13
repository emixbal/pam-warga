new DataTable('#lingkungan');
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
            url: `lingkungan`,
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

    $(".edit-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var lingkungan = JSON.parse(data)

        $("#id_edit").val(lingkungan.id)
        $("#kode_edit").val(lingkungan.kode)
        $("#nama_edit").val(lingkungan.nama)
        $("#description_edit").val(lingkungan.description)

        $('#modal_edit').modal('show');
    })

    $("#modal_edit_save_btn").on("click", function () {
        var id = $("#id_edit").val()
        var nama = $("#nama_edit").val()
        var kode = $("#kode_edit").val()
        var description = $("#description_edit").val()

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
            url: `lingkungan/${id}`,
            type: "PUT",
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
                $('#modal_edit').modal('hide');
                return
            }
        });
    })

    $(".remove-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var lingkungan = JSON.parse(data)

        $("#id_delete").val(lingkungan.id)
        $("#kode_delete").val(lingkungan.kode)
        $("#description_delete").val(lingkungan.description)

        $('#modal_delete').modal('show');
    })

    $("#modal_delete_save_btn").on("click", function () {
        var id = $("#id_delete").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `lingkungan/${id}`,
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
