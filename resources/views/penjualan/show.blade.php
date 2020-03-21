@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Penjualan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
                            <li class="breadcrumb-item active">Detail Penjualan Kode ...</li>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if(count($penjualan) > 0)
                                    @foreach($penjualan as $p)
                                        @foreach($p->barang as $b)
                                            <tr>
                                                <td>{{ $p->kode_transaksi }}</td>
                                                <td>{{ $b->nama_barang }}</td>
                                                <td>{{ $b->pivot->jumlah }}</td>
                                                <td>{{ $b->pivot->harga }}</td>
                                                <td>{{ $b->pivot->harga_total }}</td>
                                            </tr>
                                        @endforeach
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
