@extends('layout')
@section('content')

    <div class="row">
        @foreach ($data['dewans'] as $dewan)
            @php
                $link = url('public/assets/images/users/avatar-8.jpg');
                if ($dewan->doc_foto) {
                    $link = route('file', [
                        'dir' => 'foto_dewan',
                        'filename' => $dewan->doc_foto,
                    ]);
                }
            @endphp
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <div class="mx-auto avatar-md mb-3">
                            <img src="{{ $link }}" alt="" class="img-fluid rounded-circle">
                        </div>
                        <a href="{{ route('dewan.detail', $dewan->id) }}">
                            <h5 class="card-title mb-1">{{ $dewan->name }}</h5>
                            <p class="text-muted mb-0">{{ $dewan->pob }}, {{ $dewan->dob }}</p>
                        </a>

                    </div>
                    <div class="card-body">
                        <h4 class="card-title">INFORMASI</h4>
                        <table>
                            <tr class="informasi">
                                <th style="width: 150px">NPWP</th>
                                <td>{{ $dewan->npwp }}</td>
                            </tr>
                            <tr class="informasi">
                                <th style="width: 150px">Alamat</th>
                                <td>{{ $dewan->address }}</td>
                            </tr>
                            <tr class="informasi">
                                <th style="width: 150px">Status</th>
                                <td>{{ $dewan->status }}</td>
                            </tr>
                            <tr class="informasi">
                                <th style="width: 150px">Partai</th>
                                <td>{{ $dewan->partai }}</td>
                            </tr>
                            <tr class="informasi">
                                <th style="width: 150px">Periode</th>
                                <td>{{ $dewan->period }}</td>
                            </tr>
                            <tr class="informasi">
                                <th style="width: 150px">Nomer Rekening</th>
                                <td>{{ $dewan->nomer_rekening }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row mb-2">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('dewan.edit', $dewan->id) }}" type="button"
                                    class="btn btn-soft-info btn-sm">
                                    <span><i class="ri-edit-box-line align-bottom me-1"></i> Edit</span>
                                </a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('dewan.upload-form', $dewan->id) }}" type="button"
                                    class="btn btn-info btn-sm">
                                    <span>Upload Dokumen <i class="ri-file-upload-line align-bottom me-1"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 d-grid">
                            <a href="{{ route('dewan.detail', $dewan->id) }}" type="button"
                                class="btn btn-primary btn-sm">
                                <span><i class="ri-shield-user-line align-bottom me-1"></i> Detail</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        @endforeach
    </div><!-- end row -->

    {{-- @include('dewan.some_file') --}}

@endsection

@section('css')
    <style>
        .informasi {
            height: 30px;
        }

        .lingkaran {
            background: skin-tone.jpg;
            background-size: cover;
            border-radius: 50% 50% 50% 50%;
            width: 100px;
            height: 100px;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('js/app/dewan/index.js') }}"></script>
@stop
