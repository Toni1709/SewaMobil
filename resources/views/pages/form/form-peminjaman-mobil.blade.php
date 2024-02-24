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
                                            <form action="{{ route('peminjaman.add') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for=""><b>Tanggal Mulai Sewa</b></label>
                                                        <input type="date" name="tgl_mulai_sewa" id="start" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for=""><b>Tanggal Selesai Sewa</b></label>
                                                        <input type="date" name="tgl_selesai_sewa" id="end" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for=""><b>Mobil</b></label>
                                                        <select name="mobil_id" class="js-example-basic-single form-select" data-width="100%"
                                                            id="mobil_id">
                                                            <option disabled selected>-- Choose Option --</option>
                                                            @foreach ($mobil as $m)
                                                                <option value="{{ $m->id }}">{{ $m->merek }} |
                                                                    {{ $m->model }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2 col-12 mb-3">
                                                        <a type="button" id="cari" class="btn btn-info form-control">Cari</a>
                                                    </div>
                                                </div>
                                                <div class="row" id="formTarif">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for=""><b>Tarif/Hari</b></label>
                                                        <input type="text" id="tarif" readonly class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row" id="button">
                                                    <div class="col-md-6 col-6">
                                                       <a href="{{ route('peminjaman') }}" class="btn btn-secondary form-control">Back</a>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                       <button type="submit" class="btn btn-primary form-control">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                <span id="pesan"></span>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formTarif').hide();
            $('#button').hide();
            $('#cari').click(function(e) {
                var id = $('#mobil_id').val();;
                var start = $('#start').val();
                var end = $('#end').val();
                $.ajax({
                    type: "get",
                    url: "{{ route('peminjaman.ajax.cekStatusMobil') }}",
                    data: {
                        id,
                        start,
                        end
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#formTarif').show();
                        $('#tarif').val(data.mobil.tarif);
                        $('#pesan').html(data.pesan);
                        if(data.pesan == 'Tersedia'){
                            $('#button').show();
                        }
                    }
                });
            });
        });
    </script>
@endsection
