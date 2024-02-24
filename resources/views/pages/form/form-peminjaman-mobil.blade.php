@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div class="row">
            <div class="col-12 col-md-12">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peminjaman Mobil</li>
                        <li class="breadcrumb-item active" aria-current="page">Form Peminjaman</li>
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
                        <div class="col-md-6 col-12 mb-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="text-center">Cari Mobil</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <label for=""><b>Mobil</b></label>
                                                    <select class="js-example-basic-single form-select" data-width="100%">
                                                        <option disabled selected>-- Choose Option --</option>                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="text-center">Status Mobil</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <h3 class="text-center">
                                                <span>Tersedia</span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
