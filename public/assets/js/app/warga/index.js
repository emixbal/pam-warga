new DataTable('#warga');
$(document).ready(function () {
    $("#modal_add_btn").on("click", function () {
        $('#modal_add').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var nama = $("#nama").val()
        var kode = $("#kode").val()
        var alamat = $("#alamat").val()
        var lingkungan_id = $("#lingkungan_id").val()

        if (!nama) {
            alert('Tahun harus di isi')
            return
        }

        if (!kode) {
            alert('Kode rekeningin harus di isi')
            return
        }

        if (!lingkungan_id) {
            alert('Uraian harus di isi')
            return
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `warga`,
            type: "POST",
            data: {
                nama,
                kode,
                alamat,
                lingkungan_id,
            },
            success: async function (response, textStatus, xhr) {
                location.reload();
                return
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("terjadi kesalahan");
                console.log(jqXHR, textStatus, errorThrown);
                alert(JSON.stringify(jqXHR?.responseJSON?.message))
                return
            },
            complete: function (params) {
                $("#nama").val('')
                $("#lingkungan_id").val('')
                $("#nominal").val('')
                $("#alamat").val('')
                $('#modal_add').modal('hide');
                return
            }
        });
    })

    $(".edit-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var warga = JSON.parse(data)

        $("#id_edit").val(warga.id)
        $("#nama_edit").val(warga.nama)
        $("#kode_edit").val(warga.kode)
        $("#lingkungan_id_edit").val(warga.lingkungan_id)
        $("#alamat_edit").val(warga.alamat)

        $('#modal_edit').modal('show');
    })

    $("#modal_edit_save_btn").on("click", function () {
        var id = $("#id_edit").val()
        var nama = $("#nama_edit").val()
        var kode = $("#kode_edit").val()
        var lingkungan_id = $("#lingkungan_id_edit").val()
        var alamat = $("#alamat_edit").val()

        if (!nama) {
            alert('Tahun harus di isi')
            return
        }

        if (!lingkungan_id) {
            alert('Kode rekeningin harus di isi')
            return
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `warga/${id}`,
            type: "PUT",
            data: {
                nama, kode,
                lingkungan_id,
                alamat
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
                $('#modal_edit').modal('hide');
                return
            }
        });
    })

    $(".remove-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var warga = JSON.parse(data)

        $("#id_delete").val(warga.id)
        $("#nama_delete").val(warga.nama)
        $("#kode_delete").val(warga.kode)
        $("#lingkungan_id_delete").val(warga.lingkungan_id)
        $("#alamat_delete").val(warga.alamat)

        $('#modal_delete').modal('show');
    })

    $("#modal_delete_save_btn").on("click", function () {
        var id = $("#id_delete").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `warga/${id}`,
            type: "DELETE",
            success: async function (response, textStatus, xhr) {
                location.reload();
                return
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("terjadi kesalahan");
                console.log(jqXHR, textStatus, errorThrown);
                alert(JSON.stringify(jqXHR?.responseJSON?.message))
                return
            },
            complete: function (params) {
                $("#kode").val('')
                $("#alamat").val('')
                $('#modal_delete').modal('hide');
                return
            }
        });
    })

})
