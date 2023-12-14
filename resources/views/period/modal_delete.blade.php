<!-- Default Modals -->
<div id="modal_delete" class="modal fade" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_delete_label">Apa anda yakin menhapus data pratai ini?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="text" disabled id="id_delete" hidden>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="name_delete" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name_delete" name="name_delete" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="date_delete" class="form-label">Bulan</label>
                    <input type="text" class="form-control" id="date_delete" name="date_delete" disabled>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-danger" id="modal_delete_save_btn">Hapus Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
