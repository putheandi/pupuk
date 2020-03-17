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
                            <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
                            <li class="breadcrumb-item active">Tambah Barang</li>
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
                <form class="form-horizontal" action="{{ route('barang.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('inc.messages')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input name="nama_barang" value="{{ old('nama_barang') }}" id=""
                                       placeholder="Nama Barang" class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input name="jumlah" value="{{ old('jumlah') }}"  id=""
                                       class="form-control" placeholder="Jumlah" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Paket</label>
                            <div class="col-sm-10">
                                <select name="jenis_paket" class="form-control" required>
                                    <option disabled>-Select-</option>
                                    @foreach($items as $item)
                                        <option value="{{ $item->jumlah_isi }}">{{$item->nama}} ({{ $item->jumlah_isi }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input name="harga" value="{{ old('harga') }}" id=""
                                       placeholder="Harga" class="form-control" type="text" required>
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
