@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--                            <li class="breadcrumb-item"><a href="#">Barang</a></li>--}}
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            @include('inc.messages')
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <a class="btn btn-success btn-sm float-right" href="{{ route('penjualan.create') }}">
                                <i class="fas fa-pencil-alt"></i>
                                Transaksi
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Total</th>
                                    <th>Harga Total</th>
                                    <th>Waktu</th>
                                    <th>Kode Transaksi</th>
                                    <th>Sisa Stok</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Total</th>
                                    <th>Harga Total</th>
                                    <th>Waktu</th>
                                    <th>Kode Transaksi</th>
                                    <th>Sisa Stok</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if(count($penjualan) > 0)
                                    @foreach($penjualan as $data)
                                        <tr>
                                            <td>{{ $data->barang->nama_barang }}</td>
                                            <td>{{ $data->jumlah_total }}</td>
                                            <td>{{ $data->harga_total }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->barang->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('script')
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
