new DataTable('#tarif');
$(document).ready(function () {
    $(".edit-item-btn").on("click", function (event) {
        event.preventDefault();
        var data = $(this).attr("data");
        var tarif = JSON.parse(data)

        $("#id_edit").val(tarif.id)
        $("#per_meter_edit").val(tarif.per_meter)
        $("#abonemen_edit").val(tarif.abonemen)

        new Cleave('#per_meter_edit', {
            numeral: !0,
            delimiter: ' ',
            numeralDecimalScale: 0, // Set decimal scale to zero
        });

        new Cleave('#abonemen_edit', {
            numeral: !0,
            delimiter: ' ',
            numeralDecimalScale: 0, // Set decimal scale to zero
        });

        $('#modal_edit').modal('show');
    })

    $("#modal_edit_save_btn").on("click", function () {
        var id = $("#id_edit").val()
        var per_meter_txt = $("#per_meter_edit").val()
        var per_meter = per_meter_txt.replace(/\s/g, '');

        var abonemen_txt = $("#abonemen_edit").val()
        var abonemen = abonemen_txt.replace(/\s/g, '');


        if (!per_meter_txt) {
            alert("Tarif per meter harus diisi")
            return
        }

        if (!abonemen_txt) {
            alert("Tarif abondemen harus diisi")
            return
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `tarif/${id}`,
            type: "PUT",
            data: {
                per_meter,
                abonemen,
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
                $("#abonemen").val('')
                $("#description").val('')
                $('#modal_edit').modal('hide');
                return
            }
        });
    })
})
