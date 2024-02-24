@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div class="row">
            <div class="col-12 col-md-12">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengembalian Mobil</li>
                        <li class="breadcrumb-item active" aria-current="page">Form Pengembalian</li>
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
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label for=""><b>No. Plat</b></label>
                                                    <input type="text" id="noPlat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12 mb-3">
                                                    <a type="button" id="cari"
                                                        class="btn btn-info form-control">Cari</a>
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
                                    <h4 class="text-center">Data Penyewaan</h4>
                                </div>
                                <form action="{{ route('pengembalian.add') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row" id="data">
                                            <div class="col-md-12 col-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td><span id="nama"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobil</td>
                                                        <td>:</td>
                                                        <td><span id="mobil"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Plat</td>
                                                        <td>:</td>
                                                        <td> <span id="no_plat"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tgl Mulai Sewa</td>
                                                        <td>:</td>
                                                        <td><span id="start"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tgl Selesai Sewa</td>
                                                        <td>:</td>
                                                        <td><span id="end"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Sewa</td>
                                                        <td>:</td>
                                                        <td><span id="lamaSewa"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Harga Sewa</td>
                                                        <td>:</td>
                                                        <td><span id="total"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <input type="hidden" name="mobil_id" id="mobil_id">
                                            <input type="hidden" name="total_harga" id="total_harga">
                                            <input type="hidden" name="lama_sewa" id="lama_sewa">
                                            <div class="col-md-4 col-12 mt-3">
                                                <button type="submit"
                                                    class="btn btn-primary form-control">Kembalikan</button>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').hide();
            $('#cari').click(function() {
                var noPlat = $('#noPlat').val();
                $.ajax({
                    type: "get",
                    url: "{{ route('pengembalian.ajax.cariData') }}",
                    data: {
                        noPlat
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#data').show();
                        $('#nama').text(data.peminjaman.pengguna.nama);
                        $('#mobil').text(`${data.mobil.merek} ${data.mobil.model}`);
                        $('#no_plat').text(data.mobil.no_plat);
                        $('#start').text(data.peminjaman.tgl_mulai_sewa);
                        $('#end').text(data.peminjaman.tgl_selesai_sewa);
                        $('#lamaSewa').text(`${data.lamaSewa} Hari`);
                        $('#total').text((data.lamaSewa) * (data.mobil.tarif));

                        $('#mobil_id').val(data.mobil.id);
                        $('#lama_sewa').val(data.lamaSewa);
                        $('#total_harga').val((data.lamaSewa) * (data.mobil.tarif));
                    }
                });
            });
        });
    </script>
@endsection
