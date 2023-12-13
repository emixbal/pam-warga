@extends('layout')

@php($dewan = $data['dewan'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title p-1 mb-0">Edit Data Dewan</h5>
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

                    <form method="POST" action="{{ route('dewan.update', $dewan->id) }}" enctype="multipart/form-data"
                        onsubmit="return confirm('Apakah data yang diisikan sudah benar?');">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $dewan->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ $dewan->nik }}">
                        </div>

                        <div class="mb-3">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp"
                                value="{{ $dewan->npwp }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="periode">Periode</label>
                            <select class="form-select" id="period" name="period">
                                <option {{ $dewan->period_id == '' ? 'selected' : '' }} value="">Pilih Periode...</option>
                                @foreach ($data['periods'] as $period)
                                    <option value="{{ $period->id }}"
                                        {{ $dewan->period_id == $period->id ? 'selected' : '' }}>
                                        {{ $period->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="partaie">Partai</label>
                            <select class="form-select" id="partai" name="partai">
                                <option {{ $dewan->partai_id == '' ? 'selected' : '' }} value="">Pilih Partai...</option>
                                @foreach ($data['partais'] as $partai)
                                    <option value="{{ $partai->id }}"
                                        {{ $dewan->partai_id == $partai->id ? 'selected' : '' }}>
                                        {{ $partai->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pob" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="pob" name="pob"
                                        value="{{ $dewan->pob }}">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="cleave-date" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" placeholder="DD-MM-YYYY" id="cleave-date"
                                        name="dob" value="{{ $dewan->dob }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nomer_rekening" class="form-label">Nomer Rekening</label>
                            <input type="text" class="form-control" id="nomer_rekening" name="nomer_rekening"
                                value="{{ $dewan->nomer_rekening }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" id="address" name="address">{{ $dewan->address }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="spouses" class="form-label">Suami/Istri</label>
                            <input type="text" class="form-control" id="spouses" name="spouses"
                                value="{{ $dewan->spouses }}">
                        </div>

                        <div class="mb-3">
                            <label for="children" class="form-label">Anak</label>
                            <input type="text" class="form-control" id="children" name="children"
                                value="{{ $dewan->children }}">
                        </div>
                        <div class="float-sm-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Data</button>
                        </div>
                    </form>
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
