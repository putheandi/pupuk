@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
                            <li class="breadcrumb-item active">Edit Barang</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Horizontal Form -->
            <div class="card card-solid">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('barang.update', $barang) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('inc.messages')
                        <div class="form-group row">
                            <label for="" class="col-xl-2 col-form-label">Nama Barang</label>
                            <div class="col-xl-8">
                                <input name="nama_barang" type="text"
                                       value="{{ $barang->nama_barang ?? old('nama_barang') }}" class="form-control"
                                       id=""
                                       placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <input name="merk" type="text" value="{{ $barang->merk ?? old('merk') }}"
                                       class="form-control" id=""
                                       placeholder="Merk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input name="harga" type="text" value="{{ $barang->harga ?? old('harga') }}"
                                       class="form-control" id=""
                                       placeholder="Jumlah">
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
