@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Transaksi</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Horizontal Form -->
            <div class="card card-solid">
                <!-- /.card-header -->
                <form class="form-horizontal" action="" method="">
                    {{--                    @csrf--}}
                    <div class="card-body">
                        @include('inc.messages')
                        <div id="dom" class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-2">
                                <select id="barang" name="nama_barang" class="form-control">
                                    <option value="0" disabled="true" selected="true">-Select-</option>
                                    @foreach($barang as $data)
                                        <option data-harga="{{ $data->harga }}" data-barang="{{ $data->nama_barang }}"
                                                data-id_barang="{{ $data->id }}"
                                                value="{{ $data->nama_barang }}">{{ $data->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="" class="offset-sm-1 col-lg-1 col-form-label">Harga</label>
                            <div class="col-sm-2">
                                <label id="harga" class="form-control"></label>
                            </div>

                            <label for="" class="offset-sm-1 col-lg-1 col-form-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input id="jumlah1" name="jumlah" type="text" value="{{ old('jumlah') }}"
                                        class="form-control"
                                        placeholder="Jumlah">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button id="tambah" type="button" class="btn btn-primary">
                            Tambah
                            </button>
                        </div>
                        <div class="form-group text-center">
                            <button id="cek_harga" type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal-secondary">
                                Cek Harga
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Modal -->
                <div class="modal fade" id="modal-secondary">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                            <div class="modal-header">
                                <h4 class="modal-title">Daftar Belanja</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>

                            <div class="modal-body">

                                <!-- form start -->

                                <div class="card-body">
                                    {{--                        @include('inc.messages')--}}
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
                                        <div class="col-sm-10">
                                            <label id="show-barang" class="form-control"></label>
                                        </div>
                                        {{--                                            <input type="text" name="nama_barang" id="nama_barang" value="" style="display: none" required>--}}

                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <label id="show-jumlah" class="form-control"></label>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Total Harga</label>
                                        <div class="col-sm-10">
                                            <label id="show-total_harga" class="form-control"></label>
                                        </div>

                                    </div>
                                    {{--                                        <div class="form-group text-center">--}}
                                    {{--                                            <button type="submit" class="btn btn-success">Submit</button>--}}
                                    {{--                                        </div>--}}
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close
                                </button>
                                <form class="form-horizontal" action="{{ route('penjualan.store') }}" method="post">
                                    @csrf
                                    <input type="text" id="id_barang" name="id_barang"
                                           style="display: none" required>
                                    <input type="text" id="jumlah2" name="jumlah"  style="display: none"
                                           required>
                                    <input type="text" id="total_harga" name="harga"  style="display: none"
                                           required>
                                    <button type="submit" class="btn btn-outline-light">Bayar</button>
                                </form>
                            </div>


                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- /.card-body -->
                {{--                </form>--}}
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('script')
    <script>
        function namaBarang(e){
            console.log(e);
            var harga = $(e).find('option:selected').data('harga'); //data('harga') adalah tag dari select option data-harga
            $(e).parent().siblings().find('.harga').html(harga);
        };
        $(document).ready(function () {

            $('#tambah').on('click', function(){
                $('#dom').append('<label class="col-sm-2 col-form-label">Nama Barang</label><div class="col-sm-2"><select onchange="namaBarang(this)" id="barang" name="nama_barang" class="form-control"><option value="0" disabled="true" selected="true">-Select-</option>@foreach($barang as $data)<option data-harga="{{ $data->harga }}" data-barang="{{ $data->nama_barang }}"data-id_barang="{{ $data->id }}"value="{{ $data->nama_barang }}">{{ $data->nama_barang }}</option>@endforeach</select></div><label for="" class="offset-sm-1 col-lg-1 col-form-label">Harga</label><div class="col-sm-2"><label id="harga" class="form-control harga"></label></div><label for="" class="offset-sm-1 col-lg-1 col-form-label">Jumlah</label><div class="col-sm-2"><input id="jumlah1" name="jumlah" type="text" value="{{ old('jumlah') }}"class="form-control"placeholder="Jumlah"></div>');
            });

            $('#barang').on('change', function () {
                // var id_barang = $(this).val();
                var harga = $('#barang>option:selected').data('harga'); //data('harga') adalah tag dari select option data-harga
                $('#harga').html(harga);
                // console.log(harga);
            });

            $('#cek_harga').on('click', function () {

                var id_barang = $('#barang>option:selected').data('id_barang');
                var nama_barang = $('#barang').val();
                var harga = $('#barang>option:selected').data('harga');
                var jumlah = $('#jumlah1').val();
                var total_harga = harga * jumlah;

                $('#show-barang').html(nama_barang);
                $('#id_barang').val(id_barang);

                $('#show-jumlah').html(jumlah);
                $('#jumlah2').val(jumlah);

                $('#show-total_harga').html(total_harga);
                $('#total_harga').val(total_harga);

                console.log(id_barang, nama_barang, harga, jumlah, total_harga)
            })
        });
    </script>
@endpush
