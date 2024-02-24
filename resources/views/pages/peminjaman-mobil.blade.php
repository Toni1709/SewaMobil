@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div class="row">
            <div class="col-12 col-md-12">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen Mobil</li>
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
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($manajemenMobil as $no => $m)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>
                                            <img src="{{ $m->foto ? asset('img/' . $m->foto) : asset('assets/images/others/placeholder.jpg') }}"
                                                alt="" style="width: 30px; border-radius: 50%;">
                                        </td>
                                        <td>{{ $m->pengguna->nama }}</td>
                                        <td>{{ $m->merek }}</td>
                                        <td>{{ $m->model }}</td>
                                        <td>{{ $m->no_plat }}</td>
                                        <td>Rp {{ number_format($m->tarif, 0, ',', '.') }}</td>
                                        <td>{{ $m->status }}</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#addNew{{ $m->id }}">
                                                <i data-feather="edit"></i>
                                            </button>
                                            <a href="{{ route('manajemenMobil.delete', $m->id) }}" class="btn btn-icon btn-danger">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="addNew{{ $m->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Manajemen Mobil</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="btn-close"></button>
                                                </div>
                                                <form action="{{ route('manajemenMobil.update', $m->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-3 col-12">
                                                                <label for=""><b>Merek</b></label>
                                                            </div>
                                                            <div class="col-md-9 col-12 mb-3">
                                                                <input type="text" name="merek" value="{{ $m->merek }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 col-12">
                                                                <label for=""><b>Model</b></label>
                                                            </div>
                                                            <div class="col-md-9 col-12 mb-3">
                                                                <input type="text" name="model" value="{{ $m->model }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 col-12">
                                                                <label for=""><b>No. Plat</b></label>
                                                            </div>
                                                            <div class="col-md-9 col-12 mb-3">
                                                                <input type="text" name="no_plat" value="{{ $m->no_plat }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 col-12">
                                                                <label for=""><b>Tarif/Hari</b></label>
                                                            </div>
                                                            <div class="col-md-9 col-12 mb-3">
                                                                <input type="number" name="tarif" value="{{ $m->tarif }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 col-12">
                                                                <label for=""><b>Foto</b></label>
                                                            </div>
                                                            <div class="col-md-9 col-12 mb-3">
                                                                <input type="file" name="foto" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
