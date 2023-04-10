@extends('layouts.customer.template-customer')

@section('title')
    <title>Daftar Produk Keranjang | Gadget Web Store</title>
@endsection

@section('css')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
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
    <section class="my-4">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-sm card-hover">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Daftar Produk Keranjang</h4>

                            @foreach ($products as $item)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-7">
                                        <div class="me-lg-5">
                                            <div class="d-flex pt-3">
                                                <img src="{{ Storage::url($item->photo) }}" class="border rounded me-3 p-2"
                                                    style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link pt-2 fw-bold">{{ $item->name }}</a>
                                                    <span class="text-muted">Kategori :
                                                        {{ $item->category->name }}</span><br>
                                                    <span class="text-muted">Kondisi : {{ $item->condition }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 d-flex">
                                        <div class="row mx-auto">
                                            <div class="col">
                                                <div class="pt-2">
                                                    <small class="text-muted text-nowrap"> Rp.
                                                        {{ priceConversion($item->price) }} /
                                                        per item
                                                    </small> <br>
                                                    <span class="h6 fw-bold">Total : Rp. 10.000</span>

                                                    {{-- manage cart --}}
                                                    <form action="" method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="form-group">
                                                            <input type="number" class="form-control mt-3" id="quantity"
                                                                name="quantity" value="1" min="1"
                                                                max="99">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col d-flex">
                                                <div class="float-md-start my-auto">
                                                    <button type="submit" class="btn btn-checklist px-2">
                                                        <i class="fa-solid fa-check fa-lg px-1"></i>
                                                    </button>
                                                    </form>

                                                    <a href="" class="btn btn-delete px-2">
                                                        <i class="fa-solid fa-trash fa-lg px-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- cart -->

                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card shadow-sm border card-hover">
                        <div class="card-body">
                            @foreach ($products as $item)
                                <div class="d-flex">
                                    <p class="mb-2">
                                        <span class="limit-text-title fw-medium" title="{{ $item->name }}">
                                            {{ $item->name }}
                                        </span>
                                        <span class="limit-text-title">
                                            Jumlah(5) :
                                            <i>Rp.
                                                {{ priceConversion($item->price) }}
                                            </i>
                                        </span>
                                    </p>
                                </div>
                            @endforeach

                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2 fw-bold">Total :</p>
                                <p class="mb-2 fw-bold">IDR 337.500</p>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-checklist w-100 shadow-0 mb-2">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>

    <section>
        <div class="container my-4">
            <div class="row">
                <div class="slider owl-carousel owl-theme">
                    @foreach ($products as $value)
                        <form action="" method="POST">
                            @csrf

                            <div class="item col-md-12 d-flex justify-content-center p-1">
                                <div class="card my-2 shadow-sm p-4 card-hover">
                                    <a href="#!" class="img-wrap">
                                        <img src="{{ Storage::url($value->photo) }}" class="card-img-top rounded"
                                            title="{{ $value->name }}" style="aspect-ratio: 1 / 1">
                                    </a>
                                    <div class="card-body p-0 pt-2">
                                        <h6 class="card-title mt-2 pt-2 limit-text" title="{{ $value->name }}">
                                            <span class="text-black fw-bold">{{ $value->name }}</span>
                                        </h6>

                                        <div class="row justify-content-between my-2">
                                            <div class="col-6 d-flex">
                                                <span class="card-text">
                                                    <span class="text-theme-two fw-bold">Rp.
                                                        {{ priceConversion($value->price) }}</span>
                                                    <br>
                                                    <span class="fw-medium text-theme">{{ $value->condition }}</span>
                                                </span>
                                            </div>

                                            <div class="col-6 d-flex">
                                                @if ($value->status == 'Tersedia')
                                                    <div class="btn ready-content my-auto mx-auto">
                                                        {{ $value->status }}
                                                    </div>
                                                @elseif ($value->status == 'Pre Order')
                                                    <div class="btn pre-order-content my-auto mx-auto">
                                                        {{ $value->status }}
                                                    </div>
                                                @elseif ($value->status == 'Habis')
                                                    <div class="btn run-out-content my-auto mx-auto">
                                                        {{ $value->status }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-checklist icon-cart-hover mt-2"
                                        title="Add to cart?">
                                        ADD TO CART
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(".slider").owlCarousel({
            center: false,
            items: 2,
            loop: true,
            margin: 5,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                },
            }
        });
    </script>
@endsection
