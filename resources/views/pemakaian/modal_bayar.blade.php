<!-- Default Modals -->
@php
    $methods = [
        (object) [
            'id' => 1,
            'name' => 'deposit',
        ],
        (object) [
            'id' => 1,
            'name' => 'cash',
        ],
        (object) [
            'id' => 1,
            'name' => 'bca',
        ],
        (object) [
            'id' => 1,
            'name' => 'gopay',
        ],
        (object) [
            'id' => 1,
            'name' => 'ovo',
        ],
    ];
@endphp
<div id="modal_bayar" class="modal fade modal-lg" tabindex="-1" aria-labelledby="modal_bayar_label" aria-hidden="true"
    style="display: none;" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_bayar_label">Bayar Tagihan?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="method_id" class="form-label">Pembayaran Via</label>
                    <select class="form-select" id="method_id" name="method_id">
                        <option selected>
                            Pilih Metode Pembayaran...
                        </option>
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}">
                                {{ $method->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary" id="modal_bayar_save_btn">Simpan Data</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
