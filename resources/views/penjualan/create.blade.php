@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Daftar Transaksi</a></li>
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
                        <div id="dom" class="form-group">
                            <div class="row">
                                <label class="col-sm-1 col-form-label">Nama Barang</label>
                                <div class="col-sm-2">
                                    <select id="barang" name="nama_barang[]" class="form-control" required>
                                        <option value="">-Select-</option>
                                        @foreach($barang as $data)
                                            <option data-harga="{{ $data->harga }}"
                                                    data-barang="{{ $data->nama_barang }}"
                                                    data-id_barang="{{ $data->id }}"
                                                    value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="" class="offset-sm-1 col-lg-1 col-form-label">Harga</label>
                                <div class="col-sm-2">
                                    <label id="harga" class="form-control"></label>
                                </div>

                                <label for="" class="offset-sm-1 col-lg-1 col-form-label">Jumlah</label>
                                <div class="col-sm-2">
                                    <input id="jumlah1" name="jumlah[]" type="text" value="{{ old('jumlah') }}"
                                           class="form-control"
                                           placeholder="Jumlah">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button id="tambah" type="button" class="btn btn-primary">
                                Tambah
                            </button>
                        </div>
                        <div class="form-group text-center">
                            <button id="cek_harga" type="button" class="btn btn-success">
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
                                    <div id="cart"></div>
                                    <div class="row">
                                        <label for="" class="col-sm-2 col-form-label">TOTAL</label>
                                        <label for="" class="col-sm-3 col-form-label"></label>
                                        <label for="" class="col-sm-5 col-form-label show-total">: Rp 0</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close
                                </button>
                                <form class="form-horizontal" action="{{ route('penjualan.store') }}" method="post">
                                    @csrf
                                    <div id="for-submit"></div>
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
        function namaBarang(e) {
            var harga = $(e).find('option:selected').data('harga'); //data('harga') adalah tag dari select option data-harga
            harga = harga > 0 ? harga : 0;
            $(e).parent().siblings().find('.harga').html(harga);
        };
        function hapusInput(e){
            $(e).parent().parent().remove();
        }
        function cekForm(){
            var cek = true;
            $('[name*=nama_barang],[name*=jumlah]').each(function(i,e){
                if ($(e).val() == ''){
                    $(e).focus();
                    cek = false;
                }
            });
            return cek;
        }
        $(document).ready(function () {
            $('#tambah').on('click', function () {
                if (cekForm()) {
                    $('#dom').append('<div class="row">' +
                        '<label class="col-sm-1 col-form-label">Nama Barang</label>' +
                        '<div class="col-sm-2">' +
                        '   <select onchange="namaBarang(this)" id="barang" name="nama_barang[]" class="form-control" required>' +
                        '       <option value="" >-Select-</option>' +
                        @foreach($barang as $data)
                            '<option data-harga="{{ $data->harga }}" data-barang="{{ $data->nama_barang }}"data-id_barang="{{ $data->id }}"value="{{ $data->id }}">{{ $data->nama_barang }}</option>' +
                        @endforeach
                            '   </select>' +
                        '</div>' +
                        '<label for="" class="offset-sm-1 col-lg-1 col-form-label">Harga</label>' +
                        '<div class="col-sm-2"><label id="harga" class="form-control harga"></label></div>' +
                        '<label for="" class="offset-sm-1 col-lg-1 col-form-label">Jumlah</label>' +
                        '<div class="col-sm-2"><input id="jumlah1" name="jumlah[]" type="text" value=""class="form-control"placeholder="Jumlah">' +
                        '</div>' +
                        '<div class="col-sm-1"><button onclick="hapusInput(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a></div>' +
                        '</div>');
                }
            });

            $('#barang').on('change', function () {
                // var id_barang = $(this).val();
                var harga = $('#barang>option:selected').data('harga'); //data('harga') adalah tag dari select option data-harga
                var id_barang = $('#barang>option:selected').data('id_barang'); //data('harga') adalah tag dari select option data-harga
                harga = harga > 0 ? harga : 0;
                $('#harga').html(harga);
                // console.log(harga);
            });

            $('#cek_harga').on('click', function () {
                if (cekForm()) {
                    $('#modal-secondary').modal('toggle');
                    $('#cart,#for-submit').html('');
                    var total = 0;
                    $('[name*=nama_barang]').each((i, e) => {
                        var id_barang = $(e).find('option:selected').attr('value');
                        var nama_barang = $(e).find('option:selected').data('barang');
                        nama_barang = nama_barang ? nama_barang : "";
                        var jumlah = $(e).parent().siblings().find('[name="jumlah[]"]').val();
                        jumlah = jumlah > 0 ? jumlah : 0;
                        var harga = $(e).find('option:selected').data('harga');
                        harga = harga > 0 ? harga : 0;
                        var row = '<div class="row">' +
                            '<label for="" class="col-sm-2 col-form-label">' + jumlah + ' ' + nama_barang + '</label>\n' +
                            '<label for="" class="col-sm-3 col-form-label">' + formatter.format(harga) + ' x ' + jumlah + '</label>\n' +
                            '<label for="" class="col-sm-5 col-form-label">: ' + formatter.format(harga * jumlah) + '</label>\n' +
                            '</div>'
                        total += harga * jumlah;
                        var forsubmit = '<input type="hidden" name="barang[' + i + ']" value="' + id_barang + '"/>' +
                            '<input type="hidden" name="qty_barang[' + i + ']" value="' + jumlah + '"/>'
                        $('#cart').append(row);
                        $('#for-submit').append(forsubmit);
                    })
                    $('.show-total').html(': ' + formatter.format(total));
                }
            })
            const formatter = new Intl.NumberFormat('id-ID',{
                style : 'currency',
                currency : 'IDR'
            })
        });
    </script>
@endpush
