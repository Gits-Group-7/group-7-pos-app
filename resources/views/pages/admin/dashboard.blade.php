@extends('layouts.admin.template-admin')

@section('title')
    <title>Dashboard Admin | POS APP</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0 text-secondary mt-3">Selamat datang di Dashboard
                            - Panel Manajemen Data Admin,
                            <span class="text-primary"><b>yuk mulai manage data kamu 😊</b></span>
                        </h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i>
                                    Hari ini :
                                    <script>
                                        var d = (new Date()).toString().split(' ').splice(1, 3).join(' ');
                                        document.write(d)
                                    </script>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card card-hover">
                    <div class="card-people p-3">
                        <img src="{{ asset('admin/images/banner-admin.jpg') }}" alt="people">
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <a href="{{ route('product.index') }}" class="menu-card">
                                <div class="card-body">
                                    <p class="mb-4 font-weight-bold">Manajemen Produk</p>
                                    <p class="fs-30 mb-2">4006</p>
                                    <p>CRUD Data Product</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <a href="{{ route('category.index') }}" class="menu-card">
                                <div class="card-body">
                                    <p class="mb-4 font-weight-bold">Manajemen Kategori</p>
                                    <p class="fs-30 mb-2">61344</p>
                                    <p>CRUD Data Category</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <a href="#!" class="menu-card">
                                <div class="card-body">
                                    <p class="mb-4 font-weight-bold">List Data Tranksaksi</p>
                                    <p class="fs-30 mb-2">34040</p>
                                    <p>Datatable Data Transaction</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <a href="#!" class="menu-card">
                                <div class="card-body">
                                    <p class="mb-4 font-weight-bold">List Data Detail Tranksaksi</p>
                                    <p class="fs-30 mb-2">47033</p>
                                    <p>Datatable Data Transaction Details</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body card-hover rounded">
                        <p class="card-title">Transaction Data List</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>8 April 2023</td>
                                                <td>Success Order</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>9 April 2023</td>
                                                <td>Transaction Proccess</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
