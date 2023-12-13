<!-- Default Modals -->
<div id="modal_delete" class="modal fade" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_delete_label">Apa anda yakin menhapus data anggaran ini?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="type" class="form-control" id="id_delete" name="id_delete" hidden>

            <div class="modal-body">
                <div class="form-group">
                    <label for="year_delete" class="form-label">Tahun</label>
                    <input type="text" class="form-control" id="year_delete" name="year_delete" disabled>
                </div>

                <div class="form-group">
                    <label for="kode_rekening_id_delete" class="form-label">Kode Rekening</label>
                    <input type="text" class="form-control" id="kode_rekening_id_delete" name="kode_rekening_id_delete" disabled>
                </div>

                <div class="form-group">
                    <label for="nominal_delete" class="form-label">Nominal (Rp)</label>
                    <input type="text" class="form-control" id="nominal_delete" name="nominal_delete" disabled>
                </div>

                <div class="form-group">
                    <label for="description_delete" class="form-label">Uraian</label>
                    <textarea class="form-control" id="description_delete" rows="3" name="description_delete" disabled></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-danger" id="modal_delete_save_btn">Hapus Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
