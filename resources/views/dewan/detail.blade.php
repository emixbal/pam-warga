@extends('layout')
@php($dewan = $data['dewan'])
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            Nama
                                        </th>
                                        <td>
                                            {{ $dewan->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Tempat, Tanggal Lahir
                                        </th>
                                        <td>
                                            {{ $dewan->pob }},
                                            {{ \Carbon\Carbon::parse($dewan->dob)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Partai
                                        </th>
                                        <td>
                                            {{ $dewan->partai }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Periode
                                        </th>
                                        <td>
                                            {{ $dewan->period }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            NIK
                                        </th>
                                        <td>
                                            {{ $dewan->nik }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            NPWP
                                        </th>
                                        <td>{{ $dewan->npwp }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Bank
                                        </th>
                                        <td>{{ $dewan->bank }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nomer Rekening
                                        </th>
                                        <td>{{ $dewan->nomer_rekening }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nama Istri/Suami
                                        </th>
                                        <td>{{ $dewan->spouses }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nama Anak
                                        </th>
                                        <td>{{ $dewan->children }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Alamat
                                        </th>
                                        <td>{{ $dewan->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="float-sm-end">
                                <a href="{{ route('dewan.upload-form', $dewan->id) }}" type="button" class="btn btn-info">
                                    <span>Upload Dokumen <i class="ri-file-upload-line align-bottom me-1"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            Gambar Dokumen
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Foto
                                        </th>
                                        <td>
                                            @if ($dewan->doc_foto)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'foto_dewan',
                                                        'filename' => $dewan->doc_foto,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            KTP
                                        </th>
                                        <td>
                                            @if ($dewan->doc_ktp)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'ktp_dewan',
                                                        'filename' => $dewan->doc_ktp,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            KK
                                        </th>
                                        <td>
                                            @if ($dewan->doc_kk)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'kk_dewan',
                                                        'filename' => $dewan->doc_kk,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            NPWP
                                        </th>
                                        <td>
                                            @if ($dewan->doc_npwp)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'npwp_dewan',
                                                        'filename' => $dewan->doc_npwp,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Buku Tabungan
                                        </th>
                                        <td>
                                            @if ($dewan->doc_buku_tabungan)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'buku_tabungan_dewan',
                                                        'filename' => $dewan->doc_buku_tabungan,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Keterangan Kuliah
                                        </th>
                                        <td>
                                            @if ($dewan->doc_keterangan_kuliah)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'keterangan_kuliah_dewan',
                                                        'filename' => $dewan->doc_keterangan_kuliah,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Dokumen Lain
                                        </th>
                                        <td>
                                            @if ($dewan->doc_lain)
                                                <img style="width: 200px;"
                                                    src="{{ route('file', [
                                                        'dir' => 'doc_lain_dewan',
                                                        'filename' => $dewan->doc_lain,
                                                    ]) }}" />
                                            @else
                                            <span class="no-doc-data">
                                                Belum Ada Data
                                            </span>
                                            @endif
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
