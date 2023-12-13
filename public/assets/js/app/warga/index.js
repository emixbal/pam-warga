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
                $("#year").val('')
                $("#kode_rekening_id").val('')
                $("#nominal").val('')
                $("#description").val('')
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
        $("#year_edit").val(warga.year)
        $("#kode_rekening_id_edit").val(warga.kode_rekening_id)
        $("#nominal_edit").val(warga.nominal.replace(/\.00$/, ''))
        $("#description_edit").val(warga.description)

        new Cleave('#nominal_edit', {
            numeral: !0,
            delimiter: ' ',
            numeralDecimalScale: 0, // Set decimal scale to zero
        });

        $('#modal_edit').modal('show');
    })

    $("#modal_edit_save_btn").on("click", function () {
        var id = $("#id_edit").val()
        var year = $("#year_edit").val()
        var nominal_txt = $("#nominal_edit").val()
        var nominal = nominal_txt.replace(/\s/g, '');
        var kode_rekening_id = $("#kode_rekening_id_edit").val()
        var description = $("#description_edit").val()

        if (!year) {
            alert('Tahun harus di isi')
            return
        }

        if (!kode_rekening_id) {
            alert('Kode rekeningin harus di isi')
            return
        }

        if (!nominal_txt) {
            alert('Nominal harus di isi')
            return
        }

        if (!description) {
            alert('Uraian harus di isi')
            return
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `warga/${id}`,
            type: "PUT",
            data: {
                year, nominal,
                kode_rekening_id,
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
        $("#year_delete").val(warga.year)
        $("#kode_rekening_id_delete").val(warga.kode_rekening.kode)
        $("#nominal_delete").val(warga.nominal.replace(/\.00$/, ''))
        $("#description_delete").val(warga.description)

        new Cleave('#nominal_delete', {
            numeral: !0,
            delimiter: ' ',
            numeralDecimalScale: 0, // Set decimal scale to zero
        });

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
                $("#description").val('')
                $('#modal_delete').modal('hide');
                return
            }
        });
    })

})
