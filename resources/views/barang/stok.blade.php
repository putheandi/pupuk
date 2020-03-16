@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Stok Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
                            <li class="breadcrumb-item active">Tambah Stok Barang</li>
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
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('stok.store', $barang) }}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('inc.messages')
                        <div class="form-group row">
                            <label for="" class="col-xl-2 col-form-label">Jumlah Stok</label>
                            <div class="col-xl-8">
                                <input name="jumlah" value="{{ old('jumlah') }}" id=""
                                       class="form-control" placeholder="Jumlah Stok" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-xl-2 col-form-label">Keterangan</label>
                            <div class="col-xl-8">
                                <input name="keterangan" type="text" value="{{ old('keterangan') }}"
                                       class="form-control" id=""
                                       placeholder="Keterangan">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
