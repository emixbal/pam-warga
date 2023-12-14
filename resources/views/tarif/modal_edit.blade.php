<!-- Default Modals -->
<div id="modal_edit" class="modal fade" tabindex="-1" aria-labelledby="modal_edit_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_label">Edit Data Tarif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="hidden" class="form-control" id="id_edit" name="id_edit">

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="abonemen_edit" class="form-label">Abonemen (Rp)</label>
                    <input type="text" class="form-control" id="abonemen_edit" name="abonemen_edit">
                </div>
                <div class="form-group mb-3">
                    <label for="per_meter_edit" class="form-label">Per Meter Kubik (Rp)</label>
                    <input type="text" class="form-control" id="per_meter_edit" name="per_meter_edit">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary" id="modal_edit_save_btn">Simpan Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
