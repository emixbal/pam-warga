<!-- Default Modals -->
<div id="modal_add" class="modal fade modal-lg" tabindex="-1" aria-labelledby="modal_add_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_add_label">Tambah Data Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="year" class="form-label">Tahun</label>
                    <select class="form-select mb-3" aria-label="Default select example" id="year" name="year">
                        <option selected>Pilih Tahun</option>
                        @php
                            $currentYear = now()->year;
                            for ($i = $currentYear - 1; $i <= $currentYear + 10; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                        @endphp
                    </select>

                </div>

                <div class="form-group">
                    <label for="kode_rekening_id" class="form-label">Kode Rekening</label>
                    <select class="form-select" id="kode_rekening_id" name="kode_rekening_id">
                        <option {{ old('kode_rekening_id') == '' ? 'selected' : '' }} value="">Pilih Periode...</option>
                        @foreach ($data['kode_rekenings'] as $kode_rekening)
                            <option value="{{ $kode_rekening->id }}"
                                {{ old('kode_rekening') == $kode_rekening->id ? 'selected' : '' }}>
                                {{ $kode_rekening->kode }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nominal" class="form-label">Nominal (Rp)</label>
                    <input type="text" class="form-control" id="nominal" name="nominal">
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Uraian</label>
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
