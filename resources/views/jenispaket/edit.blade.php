@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Jenis Paket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('jenisPaket.index') }}">Jenis Paket</a></li>
                            <li class="breadcrumb-item active">Edit Jenis Paket</li>
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
                <form class="form-horizontal" action="{{ route('jenisPaket.update', [$jenisPaket]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('inc.messages')
                        @include('jenispaket.form')
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
