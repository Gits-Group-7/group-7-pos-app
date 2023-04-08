@extends('layouts.admin.template-admin')

@section('title')
    <title>Update Produk | POS APP</title>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-start">
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success px-3 py-2">Selamat Datang
                            {{ Auth::user()->name }}</span>&ensp;
                        di Halaman Update Produk
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Form Update Data Produk</strong>
                            <p class="mt-2 text-secondary">Silahkan ganti field data Produk sesuai dengan yang Anda
                                perlukan.</p>
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
                                    <form action="{{ $action }}" class="forms-sample" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" placeholder="Nama Produk" name="name"
                                                        value="{{ $products->name }}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *field nama harus di isi
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Kategori</label>
                                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                                        id="category_id" name="category_id">
                                                        <option value="">Pilih Kategori Produk</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $products->category_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('category_id'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *option kategori harus di pilih
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo">Foto</label>
                                                    <input type="file" id="photo" class="file-upload-default"
                                                        name="photo">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text"
                                                            class="form-control file-upload-info @error('photo') is-invalid @enderror"
                                                            disabled placeholder="Upload Foto Produk">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('photo'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *field photo harus di upload
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="condition">Kondisi</label>
                                                    <select class="form-control @error('condition') is-invalid @enderror"
                                                        id="condition" name="condition">
                                                        <option value="">Pilih Kondisi Produk</option>
                                                        <option value="Baru"
                                                            {{ $products->condition == 'Baru' ? 'selected' : '' }}>Baru
                                                        </option>
                                                        <option value="Like a New"
                                                            {{ $products->condition == 'Like a New' ? 'selected' : '' }}>
                                                            Like a
                                                            New</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('condition'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *option kondisi harus di pilih
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Harga</label>
                                                    <input type="number"
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        id="price" placeholder="Harga Produk" name="price"
                                                        min="0" value="{{ $products->price }}">
                                                </div>
                                                @if ($errors->has('price'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *field harga harus di isi
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="stock">Stok</label>
                                                    <input type="number"
                                                        class="form-control @error('stock') is-invalid @enderror"
                                                        id="stock" placeholder="Jumlah Stok Produk" name="stock"
                                                        min="0" value="{{ $products->stock }}">
                                                </div>
                                                @if ($errors->has('stock'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *field stock harus di isi
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="warranty">Garansi (Tahun)</label>
                                                    <input type="number"
                                                        class="form-control @error('warranty') is-invalid @enderror"
                                                        id="warranty" placeholder="Tahun Garansi" name="warranty"
                                                        min="0" value="{{ $products->warranty }}">
                                                </div>
                                                @if ($errors->has('warranty'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *field warranty harus di isi
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control @error('status') is-invalid @enderror"
                                                        id="status" name="status">
                                                        <option value="">Pilih Status Produk</option>
                                                        <option value="Tersedia"
                                                            {{ $products->status == 'Tersedia' ? 'selected' : '' }}>
                                                            Tersedia</option>
                                                        <option value="Habis"
                                                            {{ $products->status == 'Habis' ? 'selected' : '' }}>Habis
                                                        </option>
                                                        <option value="Pre Order"
                                                            {{ $products->status == 'Pre Order' ? 'selected' : '' }}>Pre
                                                            Order</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('status'))
                                                    <div class="invalid feedback text-danger mb-3">
                                                        *option status harus di pilih
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea class="form-control" id="description" rows="4" name="description" placeholder="Deskripsi Produk">
                                                    {{ $products->description }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
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
