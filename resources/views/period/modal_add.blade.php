<!-- Default Modals -->
<div id="modal_add" class="modal fade" tabindex="-1" aria-labelledby="modal_add_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_add_label">Tambah Data Period</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" disabled
                        value="{{ \Carbon\Carbon::parse($date)->translatedFormat('m-Y') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="date_show" class="form-label">Bulan</label>
                    <input type="text" class="form-control" id="date_show" name="date_show"
                        value="{{ \Carbon\Carbon::parse($date)->translatedFormat('F Y') }}" disabled>
                </div>
                <input type="text" class="form-control" id="date" name="date" value="{{ $date }}"
                    disabled hidden>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary" id="modal_add_save_btn">Simpan Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
