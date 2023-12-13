<!-- Default Modals -->
<div id="modal_delete" class="modal fade" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_delete_label">Apa anda yakin menhapus data pratai ini?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <input type="hidden" class="form-control" id="id_delete" name="id_delete">
                <div class="form-group">
                    <label for="name_delete" class="form-label">Nama Partai</label>
                    <input type="text" class="form-control" id="name_delete" name="name_delete" readonly>
                </div>
                <div class="form-group">
                    <label for="description_delete" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="description_delete" rows="3" name="description_delete" readonly></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-danger" id="modal_delete_save_btn">Hapus Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
