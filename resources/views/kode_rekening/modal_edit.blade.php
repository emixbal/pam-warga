<!-- Default Modals -->
<div id="modal_edit" class="modal fade" tabindex="-1" aria-labelledby="modal_edit_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_label">Edit Data Kode Rekening</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="hidden" class="form-control" id="id_edit" name="id_edit">

            <div class="modal-body">
                <div class="form-group">
                    <label for="kode_edit" class="form-label">Kode Rekening</label>
                    <input type="text" class="form-control" id="kode_edit" name="kode_edit">
                </div>
                <div class="form-group">
                    <label for="description_edit" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="description_edit" rows="3" name="description_edit"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary" id="modal_edit_save_btn">Simpan Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
