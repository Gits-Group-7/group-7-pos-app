@extends('layouts.customer.template-customer')

@section('title')
    <title>Manajemen Tranksaksi | Gadget Web Store</title>
@endsection

@php
    // fungsi konversi data tipe date ke tanggal
    function dateConversion($date)
    {
        $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $slug = explode('-', $date);
        return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
    }
    
    function priceConversion($price)
    {
        $formattedPrice = number_format($price, 0, ',', '.');
        return $formattedPrice;
    }
    
    // fungsi auto repair one word
    function underscore($string)
    {
        // Ubah string menjadi lowercase
        $string = strtolower($string);
    
        // Ganti spasi dengan underscore
        $string = str_replace(' ', '_', $string);
    
        return $string;
    }
@endphp

@section('content')
    <!-- cart + summary -->
    <section class="my-5">
        <div class="container">
            <h4 class="card-title mb-4 alert alert-primary mt-3">Manajemen Tranksaksi</h4>

            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="card shadow-sm border card-hover">
                        <div class="card-body">
                            <div class="card-title">
                                <span class="fw-bold">Detail Transaksi :</span>
                            </div>

                            <span class="">
                                Tanggal Order :
                                <i>11 April 2023</i>
                            </span>
                            <span class="">
                                Status :
                                <i>Transaction Proccess</i>
                            </span>

                            <div class="mt-3">
                                <a href="#" class="btn btn-cancel w-100 shadow-0 mb-2">Batalkan / Delete
                                    Tranksaksi</a>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('customer.transaction.proccess', 1) }}"
                                    class="btn btn-checklist w-100 shadow-0 mb-2">Checkout Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <div class="card shadow-sm border card-hover">
                        <div class="card-body">
                            <div class="card-title">
                                <span class="fw-bold">Detail Transaksi :</span>
                            </div>

                            <span class="">
                                Tanggal Order :
                                <i>11 April 2023</i>
                            </span>
                            <span class="">
                                Status :
                                <i>Success Order</i>
                            </span>

                            <div class="mt-3">
                                <a href="#" class="btn btn-cancel w-100 shadow-0 mb-2">Delete
                                    Log Tranksaksi</a>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('customer.transaction.detail', 1) }}"
                                    class="btn btn-checklist w-100 shadow-0 mb-2">Lihat
                                    Tranksaksi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
