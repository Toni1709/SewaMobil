@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div class="row">
            <div class="col-12 col-md-12">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row col-md-12 col-12 mx-auto">
                                        <img src="{{ $data->foto ? asset('img/'.$data->foto) : asset('assets/images/placeholder.jpg') }}" alt=""
                                            style="width: 150px; height: 150px; border-radius: 50%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Data Pengguna</h6>
                                </div>
                                <form action="{{ route('profile.update', $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for=""><b>Nama Lengkap</b></label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="text" name="nama"
                                                    value="{{ $data->nama }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for=""><b>Email</b></label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="email" name="email" value="{{ $data->email }}"
                                                    class="form-control">
                                            </div>
                                        </div>                                      
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <label for=""><b>Password</b></label>
                                            </div>
                                            <div class="col-md-9 col-12 mb-3">
                                                <input type="text" name="password"
                                                    placeholder="Masukkan password baru...." class="form-control">
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
                                        <div class="row">
                                            <div class="col-md-3 col-12"></div>
                                            <div class="col-md-2 col-6">
                                                <a href="{{ route('profile') }}"
                                                    class="btn btn-secondary form-control">Back</a>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <button type="submit" class="btn btn-primary form-control">Save
                                                    Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
