@extends('layouts.customer.template-customer')

@section('title')
    <title>Dashboard Product | Gadget Web Store</title>
@endsection

@section('content')
    <div class="container p-5">
        <center>
            <h3>Ini Beranda</h3>

            @auth
                <p>Anda Sudah Login, <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></p>
            @endauth

            @guest
                <p>Anda belum <a href="{{ route('login.page') }}">login</a></p>
                <p>Jika anda belum punya akun <a href="{{ route('register.page') }}">register</a></p>
            @endguest

            <p class="text-justify">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem, esse atque? Enim architecto tempore, modi
                maiores fuga ratione minus in vero porro quibusdam similique hic natus libero omnis nemo quaerat dignissimos
                repudiandae laudantium quae autem cupiditate. Voluptatum eos nisi eum explicabo. Quam ipsam incidunt
                consectetur
                id! Cupiditate dolor ea sint quia ex maxime saepe, amet aliquam delectus alias totam culpa eaque quidem
                autem,
                consequatur mollitia tenetur excepturi. Distinctio atque reiciendis minus consectetur provident. Ipsa error
                totam voluptatibus dignissimos autem aut inventore. Nesciunt iusto porro assumenda provident animi facere
                eaque
                ab, corrupti distinctio laboriosam magni nobis adipisci rerum illo optio, quae odio. Ea, ipsam beatae fuga
                minus, exercitationem officia veniam placeat magni fugit rem sequi in, enim maxime provident accusantium
                velit
                ullam molestias reiciendis eum cumque! Molestiae atque autem earum aliquam perferendis voluptates. Excepturi
                accusantium cupiditate rem veritatis accusamus, molestiae aliquid a, deleniti ipsam similique laudantium,
                repudiandae dolorum asperiores. Possimus repellendus labore totam ducimus aperiam, quod dicta quia nesciunt
                molestias non hic dignissimos eum, error ullam consequatur dolorem. Deserunt doloremque esse vitae
                necessitatibus deleniti recusandae quae nesciunt veritatis, saepe voluptatem iusto excepturi, voluptates
                assumenda placeat veniam! Veniam excepturi officia mollitia rem omnis, tempora dolore, quia vitae,
                doloremque
                eos laborum. Aut, voluptates.
            </p>

        </center>
    </div>
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
