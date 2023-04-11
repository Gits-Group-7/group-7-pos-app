@extends('layouts.customer.template-customer')

@section('title')
    <title>Dashboard Product | Gadget Web Store</title>
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
    <!--  intro  -->
    <section class="mt-5">
        <div class="container">
            <main class="card p-3 shadow-2-strong">
                <div class="row">
                    <div class="col-lg-4 d-flex mb-3">
                        <div class="card-banner h-auto p-5 bg-theme rounded-5" style="height: 350px;">
                            <div>
                                <h4 class="text-white">
                                    Selamat datang di Gadget Web Store! 🥰<br />
                                </h4>
                                <p class="text-white text-justify">
                                    Kami adalah toko online yang menyediakan berbagai
                                    macam gadget terbaru dengan harga terjangkau dan kualitas yang terjamin. Dari
                                    smartphone, laptop, tablet, hingga aksesoris gadget lainnya, semua tersedia di sini
                                    dengan pilihan merek terkenal dan spesifikasi terbaik. Dapatkan pengalaman belanja
                                    gadget online yang menyenangkan dan memuaskan hanya di Gadget Web Store!
                                </p>
                                <a href="#produk" class="btn btn-theme shadow-0">Lihat Produk Yuk</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('customer/images/banner/sample-banner-1.jpg') }}"
                                        class="d-block w-100 rounded" alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('customer/images/banner/sample-banner-2.jpg') }}"
                                        class="d-block w-100 rounded" alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('customer/images/banner/sample-banner-3.jpg') }}"
                                        class="d-block w-100 rounded" alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('customer/images/banner/sample-banner-4.jpg') }}"
                                        class="d-block w-100 rounded" alt="" />
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- container end.// -->
    </section>
    <!-- intro -->

    <section id="produk">
        {{-- diynamic content product --}}
        @foreach ($categories as $item)
            @if ($item->category->status == 'Aktif')
                <section id="{{ underscore($item->category->name) }}">
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="alert alert-primary" role="alert">
                                    <h3 class="text-center">{{ $item->category->name }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="slider owl-carousel owl-theme">

                                @foreach ($products as $value)
                                    @if ($item->category_id == $value->category_id)
                                        <form action="{{ route('cart.store', $value->id) }}" method="POST">
                                            @csrf

                                            <div class="item col-md-12 d-flex justify-content-center p-1">
                                                <div class="card my-2 shadow-sm p-4 card-hover">
                                                    <a href="#!" class="img-wrap">
                                                        <img src="{{ Storage::url($value->photo) }}"
                                                            class="card-img-top rounded" title="{{ $value->name }}"
                                                            style="aspect-ratio: 1 / 1">
                                                    </a>
                                                    <div class="card-body p-0 pt-2">
                                                        <h6 class="card-title mt-2 pt-2 limit-text"
                                                            title="{{ $value->name }}">
                                                            <span class="text-black fw-bold">{{ $value->name }}</span>
                                                        </h6>

                                                        <div class="row justify-content-between my-2">
                                                            <div class="col-6 d-flex">
                                                                <span class="card-text">
                                                                    <span class="text-theme-two fw-bold">Rp.
                                                                        {{ priceConversion($value->price) }}</span>
                                                                    <br>
                                                                    <span
                                                                        class="fw-medium text-theme">{{ $value->condition }}</span>
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

                                                    @if ($carts->contains('product_id', $value->id))
                                                        <a href="#!" type="button"
                                                            class="btn btn-checklist-on icon-cart-hover mt-2"
                                                            title="Produk ada di keranjang"> On My Cart
                                                        </a>
                                                    @else
                                                        <button type="submit"
                                                            class="btn btn-checklist icon-cart-hover mt-2"
                                                            title="Tambah ke keranjang?"> ADD TO CART
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>

                                        </form>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
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
