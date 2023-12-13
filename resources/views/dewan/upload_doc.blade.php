@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title p-1 mb-0">Upload Dokumen Dewan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('dewan.upload-process', $data['dewan']->id) }}"
                                enctype="multipart/form-data"
                                onsubmit="return confirm('Apakah data yang diisikan sudah benar?');">
                                @csrf

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>

                                <div class="mb-3">
                                    <label for="ktp" class="form-label">KTP</label>
                                    <input type="file" class="form-control" id="ktp" name="ktp">
                                </div>

                                <div class="mb-3">
                                    <label for="kk" class="form-label">KK</label>
                                    <input type="file" class="form-control" id="kk" name="kk">
                                </div>

                                <div class="mb-3">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <input type="file" class="form-control" id="npwp" name="npwp">
                                </div>

                                <div class="mb-3">
                                    <label for="buku_tabungan" class="form-label">Buku Tabungan</label>
                                    <input type="file" class="form-control" id="buku_tabungan" name="buku_tabungan">
                                </div>

                                <div class="mb-3">
                                    <label for="keterangan_kuliah" class="form-label">Surat Keterangan Kuliah</label>
                                    <input type="file" class="form-control" id="keterangan_kuliah"
                                        name="keterangan_kuliah">
                                </div>

                                <div class="mb-3">
                                    <label for="doc_lain" class="form-label">Lainnya</label>
                                    <input type="file" class="form-control" id="doc_lain" name="doc_lain">
                                </div>

                                <div class="float-sm-end">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan
                                        Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('dewan.some_file') --}}

@endsection

@section('css')
@stop

@section('js')
    <!-- cleave.js -->
    <script src="{{ url('public') }}/assets/libs/cleave.js/cleave.min.js"></script>
    <!-- form masks init -->
    <script src="{{ url('public') }}/assets/js/pages/form-masks.init.js"></script>
    <script src="{{ url('public/assets/js/app/dewan/index.js') }}"></script>
@stop
