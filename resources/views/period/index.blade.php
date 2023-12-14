@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title p-1 mb-0">List Periode</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="float-sm-end">
                                <button id="modal_add_btn" class="btn btn-primary btn-sm">+ Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="period" class="table nowrap dt-responsive align-middle table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Bulan</th>
                                <th>Ditambah Oleh</th>
                                <th style="width: 20px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $period)
                                <tr>
                                    <td>{{ $period->name }}</td>
                                    <td>{{ $period->date }}</td>
                                    <td>{{ $period->user->name }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <button data="{{ json_encode($period) }}"
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

    @include('period.modal_add')
    @include('period.modal_delete')

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
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('public/assets/js/app/period/index.js') }}"></script>
@stop
