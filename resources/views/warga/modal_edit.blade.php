<!-- Default Modals -->
<div id="modal_edit" class="modal fade" tabindex="-1" aria-labelledby="modal_edit_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_label">Edit Data Warga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="type" class="form-control" id="id_edit" name="id_edit" hidden>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="lingkungan_id_edit" class="form-label">Lingkungan</label>
                    <select class="form-select" id="lingkungan_id_edit" name="lingkungan_id_edit">
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
                    <label for="kode_edit" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="kode_edit" name="kode_edit">
                </div>

                <div class="form-group mb-3">
                    <label for="nama_edit" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_edit" name="nama_edit">
                </div>

                <div class="form-group mb-3">
                    <label for="alamat_edit" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat_edit" rows="3" name="alamat_edit"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary" id="modal_edit_save_btn">Simpan Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
