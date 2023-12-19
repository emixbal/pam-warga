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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            Total Tagihan
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 6.000.000
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Total Terbayar
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 5.700.000
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Total Terbayar Cash
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 4.000.000
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Total Terbayar BCA
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 700.000
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Total Terbayar Gopay
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 500.000
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Total Terbayar OVO
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 500.000
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Belum terbayar
                                        </th>
                                        <td style="text-align:right;">
                                            Rp 300.000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@stop

@section('js')
@stop
