@extends('layouts.admin.template-admin')

@section('title')
    <title>Tambah Produk | POS APP</title>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-start">
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success px-3 py-2">Selamat Datang
                            {{ Auth::user()->name }}</span>&ensp;
                        di Halaman Tambah Produk
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Form Tambah Data Produk</strong>
                            <p class="mt-2 text-secondary">Silahkan isi field sesuai dengan data Produk yang ingin Anda
                                tambahkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Form Produk</h4>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" class="forms-sample" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Nama Produk" name="name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Kategori</label>
                                                    <select class="form-control" id="category_id" name="category_id">
                                                        <option>Pilih Kategori Produk</option>
                                                        <option value="Laptop">Laptop</option>
                                                        <option value="Gaming Device">Gaming Device</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo">Foto</label>
                                                    <input type="file" id="photo" class="file-upload-default"
                                                        name="photo">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled
                                                            placeholder="Upload Foto Produk">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="condition">Kondisi</label>
                                                    <select class="form-control" id="condition" name="condition">
                                                        <option>Pilih Kondisi Produk</option>
                                                        <option value="Baru">Baru</option>
                                                        <option value="Like a New">Like a New</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Harga</label>
                                                    <input type="number" class="form-control" id="price"
                                                        placeholder="Harga Produk" name="price" min="0">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="stock">Stok</label>
                                                    <input type="number" class="form-control" id="stock"
                                                        placeholder="Jumlah Stok Produk" name="stock" min="0">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="warranty">Garansi (Tahun)</label>
                                                    <input type="number" class="form-control" id="warranty"
                                                        placeholder="Tahun Garansi" name="warranty" min="0">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option>Pilih Status Produk</option>
                                                        <option value="Tersedia">Tersedia</option>
                                                        <option value="Habis">Habis</option>
                                                        <option value="Pre Order">Pre Order</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea class="form-control" id="description" rows="4" name="description" placeholder="Deskripsi Produk"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                                        <a href="{{ route('product.index') }}"
                                            class="btn btn-outline-primary shadow-sm">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
@endsection
