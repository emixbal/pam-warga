@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title p-1 mb-0">Input Data Pemakaian Rutin</h5>
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
                        <div class="col-md-6 col-sm-12">
                            <form method="POST" action="{{ route('pemakaian.store') }}"
                                enctype="multipart/form-data"
                                onsubmit="return confirm('Apakah data yang diisikan sudah benar?');">
                                @csrf

                                <div class="mb-3">
                                    <label for="id_warga" class="form-label">ID Warga</label>
                                    <input type="text" class="form-control" id="id_warga"
                                        name="id_warga" value="{{ old('id_warga') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="foto_1" class="form-label">Foto 1</label>
                                    <input type="file" class="form-control" id="foto_1" name="foto_1">
                                </div>
                                <div class="mb-3">
                                    <label for="foto_2" class="form-label">Foto 2</label>
                                    <input type="file" class="form-control" id="foto_2" name="foto_2">
                                </div>

                                <div class="mb-3">
                                    <label for="meteran_pemakaian" class="form-label">Nilai Meteran Pemakaian</label>
                                    <input type="text" class="form-control" id="meteran_pemakaian"
                                        name="meteran_pemakaian" value="{{ old('meteran_pemakaian') }}">
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
@endsection
