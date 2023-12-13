<!-- Default Modals -->
<div id="modal_edit" class="modal fade" tabindex="-1" aria-labelledby="modal_edit_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_label">Edit Data Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <input type="type" class="form-control" id="id_edit" name="id_edit" hidden>

            <div class="modal-body">
                <div class="form-group">
                    <label for="year_edit" class="form-label">Tahun</label>
                    <select class="form-select mb-3" aria-label="Default select example" id="year_edit"
                        name="year_edit">
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
                    <label for="kode_rekening_id_edit" class="form-label">Kode Rekening</label>
                    <select class="form-select" id="kode_rekening_id_edit" name="kode_rekening_id_edit">
                        <option value="0">Pilih Periode...
                        </option>
                        @foreach ($data['kode_rekenings'] as $kode_rekening)
                            <option value="{{ $kode_rekening->id }}">{{ $kode_rekening->kode }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nominal_edit" class="form-label">Nominal (Rp)</label>
                    <input type="text" class="form-control" id="nominal_edit" name="nominal_edit">
                </div>

                <div class="form-group">
                    <label for="description_edit" class="form-label">Uraian</label>
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
