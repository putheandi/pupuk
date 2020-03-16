@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--                            <li class="breadcrumb-item"><a href="#">Barang</a></li>--}}
                            <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title"></h3>
                            <a class="btn btn-success btn-sm float-right" href="{{ route('user.create') }}">
                                <i class="fas fa-pencil-alt"></i>
                                Tambah
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if(count($user) > 0)
                                    @foreach($user as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->username }}</td>
                                            <td class="project-actions">
                                                <a href="{{ route('user.edit', [$data]) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('user.destroy', [$data]) }}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-delete btn-danger btn-sm" type="submit">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
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

        $('.btn-delete').on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Anda tidak akan bisa mengembalikannya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak!'
            }).then((result) => {
                if (result.value) {
                    $(this).parent().submit();
                }
            })
        })
    </script>
@endpush
