<!-- Default Modals -->
<div id="modal_add" class="modal fade modal-lg" tabindex="-1" aria-labelledby="modal_add_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_add_label">Tambah Data Warga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="lingkungan_id" class="form-label">Lingkungan</label>
                    <select class="form-select" id="lingkungan_id" name="lingkungan_id">
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
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode">
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary" id="modal_add_save_btn">Simpan Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
