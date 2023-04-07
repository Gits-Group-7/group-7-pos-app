@extends('layouts.admin.template-admin')

@section('title')
    <title>Index Kategori | POS APP</title>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-start">
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert" data-aos="fade-down">
                        <span class="badge badge-pill badge-success px-3 py-2">Selamat Datang
                            {{ Auth::user()->name }}</span>&ensp;
                        di Manajemen data Kategori
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Index Tabel Data Kategori</strong>
                            <p class="mt-2 text-secondary">Pada halaman ini Anda dapat menambah, mengubah dan menghapus data
                                Kategori.
                            </p>
                        </div>
                        <div class="container-fluid">
                            <div class="row justify-content-around">
                                <div class="col-md-12">
                                    <a href="{{ route('category.create') }}" class="btn btn-outline-primary mt-4">Tambah
                                        Kategori</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr class="mx-auto">
                                            <th width="10%" class="text-center">No</th>
                                            <th width="25%" class="text-center">Nama</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th width="15%" class="text-center">Status</th>
                                            <th class="text-center">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="shadow-sm">
                                            <td class="text-center">1</td>
                                            <td class="text-center">Makanan</td>
                                            <td class="text-center">Kategori makanan meliputi makanan ringan dan berat</td>
                                            <td class="text-center">Aktif</td>
                                            <td class="text-center">
                                                <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                                    <a href="" type="button"
                                                        class="btn btn-inverse-success py-3 px-3">Edit</a>
                                                    <button type="button" class="btn btn-inverse-danger py-3 px-3"
                                                        data-toggle="modal" data-target="#exampleModal">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="shadow-sm">
                                            <td class="text-center">2</td>
                                            <td class="text-center">Minuman</td>
                                            <td class="text-center">Kategori minuman meliputi minuman kaleng dan air</td>
                                            <td class="text-center">Tidak Aktif</td>
                                            <td class="text-center">
                                                <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                                    <a href="" type="button"
                                                        class="btn btn-inverse-success py-3 px-3">Edit</a>
                                                    <button type="button" class="btn btn-inverse-danger py-3 px-3"
                                                        data-toggle="modal" data-target="#exampleModal">Delete</button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori "Nama
                                                            Kategori"</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Nama : Makanan<br>
                                                            Status : Aktif </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="" type="button" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection