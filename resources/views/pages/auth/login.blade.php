@extends('layouts.auth.template-auth')

@section('title')
    <title>Login Page | POS APP</title>
@endsection

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0 body-theme">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 card-hover rounded">
                            <div class="mb-4">
                                <img src="{{ asset('admin/images/title-logo-new.svg') }}" width="45" alt="logo">
                            </div>
                            <h4>Hai, kamu kembali lagi..</h4>
                            <h6 class="font-weight-light text-secondary mt-2">Selamat datang kembali..</h6>
                            <form class="pt-3">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg rounded" id="email"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg rounded" id="password"
                                        placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="">SIGN IN</a>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    <b>Belum punya akun?</b> <a href="{{ route('register.page') }}"
                                        class="text-primary"><b>Signup</b></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
