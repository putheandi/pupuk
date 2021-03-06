@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @foreach($penjualan as $p)
                            <h1>Detail Transaksi {{ $p->kode_transaksi }}</h1>
                        @endforeach
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Daftar Penjualan</a></li>
                            <li class="breadcrumb-item active">Detail Transaksi</li>
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
                                                <td>{{ number_format($b->pivot->jumlah,0,',','.') }}</td>
                                                <td>Rp. {{ number_format($b->pivot->harga,0,',','.') }}</td>

                                                <td>Rp. {{ number_format($b->pivot->harga_total,0,',','.') }}</td>
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
