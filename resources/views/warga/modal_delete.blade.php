<!-- Default Modals -->
<div id="modal_delete" class="modal fade" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_delete_label">Apa anda yakin menhapus data warga ini?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="type" class="form-control" id="id_delete" name="id_delete" hidden>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="lingkungan_id_delete" class="form-label">Lingkungan</label>
                    <select class="form-select" id="lingkungan_id_delete" name="lingkungan_id_delete" disabled>
                        <option {{ old('lingkungan_id') == '' ? 'selected' : '' }} value="">Pilih Lingkungan...
                        </option>
                        @foreach ($data['lingkungans'] as $lingkungan)
                            <option value="{{ $lingkungan->id }}"
                                {{ old('lingkungan') == $lingkungan->id ? 'selected' : '' }}>
                                {{ $lingkungan->kode }} - {{ $lingkungan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="kode_delete" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="kode_delete" name="kode_delete" disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="nama_delete" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_delete" name="nama_delete" disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat_delete" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat_delete" rows="3" name="alamat_delete" disabled></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-danger" id="modal_delete_save_btn">Hapus Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
