new DataTable('#period');
$(document).ready(function () {
    $("#modal_add_btn").on("click", function () {
        $('#modal_add').modal('show');
    })

    $("#modal_add_save_btn").on("click", function () {
        var name = $("#name").val()
        var date = $("#date").val()

        if (!name) {
            alert("Nama harus diisi")
            return
        }

        if (!date) {
            alert("Kode harus diisi")
            return
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `period`,
            type: "POST",
            data: {
                name,
                date,
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

    $(".remove-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var period = JSON.parse(data)

        $("#id_delete").val(period.id)
        $("#date_delete").val(period.date)
        $("#name_delete").val(period.name)

        $('#modal_delete').modal('show');
    })

    $("#modal_delete_save_btn").on("click", function () {
        var id = $("#id_delete").val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `period/${id}`,
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
