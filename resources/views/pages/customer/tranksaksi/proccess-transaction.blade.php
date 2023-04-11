@extends('layouts.customer.template-customer')

@section('title')
    <title>Proses Tranksaksi | Gadget Web Store</title>
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
            <h4 class="card-title mb-4 alert alert-primary mt-3">Proses Checkout Tranksaksi</h4>

            <div class="row justify-content-center">
                <div class="col-lg-5 mb-3">
                    <div class="card shadow-sm border card-hover">
                        <div class="card-body">
                            <div class="card-title">
                                <span class="fw-bold">Detail Transaksi :</span>
                            </div>

                            <span class="">
                                Tanggal Order :
                                <i>11 April 2023</i>
                            </span>
                            <br>
                            <span class="">
                                Status :
                                <i>Transaction Proccess</i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mb-3">
                    <div class="card shadow-sm border card-hover">
                        <div class="card-body">
                            <div class="card-title">
                                <span class="fw-bold">Detail Transaksi Produk :</span>
                            </div>

                            <ul>
                                @foreach ($cart_products as $item)
                                    <li>
                                        <span>
                                            {{ $item->name }} ({{ $item->quantity }}) :
                                            <i>Rp. {{ priceConversion($item->total_price) }}</i>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            <span class="fw-bold">Total : Rp. {{ priceConversion($total_price_cart) }}</span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ $action }}" method="POST">
                            @method('put')
                            @csrf

                            <div class="mt-2">
                                <button type="submit" class="btn btn-checklist w-100 shadow-0 mb-2">Checkout
                                    Transaksi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
