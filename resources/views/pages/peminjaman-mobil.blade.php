@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div class="row">
            <div class="col-12 col-md-12">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peminjaman Mobil</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-md-12">
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a href="{{ route('peminjaman.formPeminjaman') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="user-plus"></i>
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Mulai Sewa</th>
                                    <th>Tanggal Selesai Sewa</th>
                                    <th>Mobil</th>                                                                   
                                    <th>No. Plat Mobil</th>                                                                   
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($peminjaman as $no => $p)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $p->tgl_mulai_sewa }}</td>
                                        <td>{{ $p->tgl_selesai_sewa }}</td>
                                        <td>{{ $p->mobil->merek }} {{ $p->mobil->model }}</td>
                                        <td>{{ $p->mobil->no_plat }}</td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
