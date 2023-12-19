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
                    <table id="pembayaran" class="table nowrap dt-responsive align-middle table-hover" style="width:100%">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Lingkungan</th>
                                <th>Kode Warga</th>
                                <th>Nama Warga</th>
                                <th>Nominal Bayar (Rp)</th>
                                <th>Metode Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data['pembayarans'] as $pembayaran)
                                <tr>
                                    <td>{{ $pembayaran->lingkungan }}</td>
                                    <td>{{ $pembayaran->warga_kode }}</td>
                                    <td>{{ $pembayaran->warga_nama }}</td>
                                    <td style="text-align:right;">{{ $pembayaran->nominal }}</td>

                                    <td style="text-align:center;">
                                        {{ $pembayaran->payment_methods->name }}
                                    </td>
                                </tr>
                            @endforeach --}}
                            <tr>
                                <td>Lingkungan 1</td>
                                <td>Ak20</td>
                                <td>Alex</td>
                                <td style="text-align: right">70.000</td>
                                <td style="text-align: center">BCA</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 1</td>
                                <td>Ak20</td>
                                <td>Alex</td>
                                <td style="text-align: right">70.000</td>
                                <td style="text-align: center">OVO</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 2</td>
                                <td>Bk21</td>
                                <td>Bob</td>
                                <td style="text-align: right">85.000</td>
                                <td style="text-align: center">BRI</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 3</td>
                                <td>Ck22</td>
                                <td>Charlie</td>
                                <td style="text-align: right">60.000</td>
                                <td style="text-align: center">Mandiri</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 1</td>
                                <td>Ak20</td>
                                <td>Alex</td>
                                <td style="text-align: right">70.000</td>
                                <td style="text-align: center">Deposit</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 2</td>
                                <td>Bk21</td>
                                <td>Bob</td>
                                <td style="text-align: right">85.000</td>
                                <td style="text-align: center">BRI</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 3</td>
                                <td>Ck22</td>
                                <td>Charlie</td>
                                <td style="text-align: right">60.000</td>
                                <td style="text-align: center">Mandiri</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 1</td>
                                <td>Ak20</td>
                                <td>Alex</td>
                                <td style="text-align: right">70.000</td>
                                <td style="text-align: center">BCA</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 2</td>
                                <td>Bk21</td>
                                <td>Bob</td>
                                <td style="text-align: right">85.000</td>
                                <td style="text-align: center">BRI</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 3</td>
                                <td>Ck22</td>
                                <td>Charlie</td>
                                <td style="text-align: right">60.000</td>
                                <td style="text-align: center">Mandiri</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 1</td>
                                <td>Ak20</td>
                                <td>Alex</td>
                                <td style="text-align: right">70.000</td>
                                <td style="text-align: center">BCA</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 2</td>
                                <td>Bk21</td>
                                <td>Bob</td>
                                <td style="text-align: right">85.000</td>
                                <td style="text-align: center">BRI</td>
                            </tr>
                            <tr>
                                <td>Lingkungan 3</td>
                                <td>Ck22</td>
                                <td>Charlie</td>
                                <td style="text-align: right">60.000</td>
                                <td style="text-align: center">Mandiri</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{ url('public/assets/js/app/pembayaran/index.js') }}"></script>
@stop
