@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p>Tampil Berdasar Periode</p>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <select class="form-select form-select-sm" aria-label="Default select example" id="periode"
                                name="periode">
                                @php($periods = $data['periods'])
                                @foreach ($periods as $period)
                                    <option value={{ $period->id }}>{{ $period->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button id="set_year_btn" class="btn btn-primary col-sm-1 btn-sm">Cari</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title p-1 mb-0">List Pemakaian</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="pemakaian" class="table nowrap dt-responsive align-middle table-hover" style="width:100%">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Lingkungan</th>
                                <th>Kode Warga</th>
                                <th>Nama Warga</th>
                                <th>Total Pemakaian</th>
                                <th>Nominal Bayar (Rp)</th>
                                <th>Status Bayar</th>
                                <th style="width: 50px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['pemakaians'] as $pemakaian)
                                <tr>
                                    <th>{{ $pemakaian->lingkungan }}</th>
                                    <th>{{ $pemakaian->warga_kode }}</th>
                                    <th>{{ $pemakaian->warga_nama }}</th>
                                    <th style="text-align:right;">{{ $pemakaian->total }}</th>
                                    <th style="text-align:right;">
                                        {{ number_format($pemakaian->nominal_bayar, 0, ',', ' ') }}</th>
                                    <th style="text-align:center;">
                                        @if ($pemakaian->sudah_bayar)
                                            <span class="badge text-bg-success">Sudah</span>
                                        @else
                                            <span class="badge text-bg-danger">Belum</span>
                                        @endif
                                    </th>
                                    <td style="text-align:center;">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <button data="{{ json_encode($pemakaian) }}"
                                                        class="dropdown-item edit-item-btn" id="modal_edit_btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button data="{{ json_encode($pemakaian) }}"
                                                        class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('pemakaian.modal_add') --}}

@endsection

@section('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('public/assets/js/app/pemakaian/index.js') }}"></script>
    <script src="{{ url('public/assets/libs/cleave.js/cleave.min.js') }}"></script>
    <script>
        new Cleave('#nominal', {
            numeral: !0,
            delimiter: ' ',
            numeralDecimalScale: 0, // Set decimal scale to zero
        });
    </script>
@stop
