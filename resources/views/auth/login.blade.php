@extends('layouts.app')

@section('content')
    <div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative"
         style="background-image: url(images/media/img_26.webp);">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-heading d-inline-block position-relative">
                        تسجيل الدخول
                        <img src="images/shape/shape_33.svg" alt="">
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-40">ادخل إلى حسابك لإدارة الأجهزة والحساسات</p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>تسجيل الدخول</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-section pt-150 lg-pt-80">
        <div class="container">
            <div class="bg-wrapper light-bg mt-80 lg-mt-40">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="d-flex flex-column flex-lg-column-reverse">
                            <div class="row">
                                <div class="col-md-8 col-6 me-auto ms-auto">
                                    <img src="images/lazy.svg" data-src="images/assets/ils_07.svg" alt="" class="lazy-img me-auto ms-auto">
                                </div>
                            </div>
                            <div class="title-one text-center text-lg-start md-mt-20 mb-70 md-mb-30">
                                <h2>مرحباً بك</h2>
                                <p class="text-lg m0">سجّل دخولك للوصول إلى لوحة الأجهزة.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-style-one ps-xl-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row controls">
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>البريد الإلكتروني*</label>
                                            <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="example@domain.com" class="@error('email') is-invalid @enderror">
                                            @error('email')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-20">
                                            <label>كلمة المرور*</label>
                                            <input type="password" name="password" required autocomplete="current-password" placeholder="********" >
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                            <div>
                                                <input type="checkbox" id="remember" name="remember" @checked(old('remember'))>
                                                <label for="remember">تذكرني</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn-four tran3s w-100 d-block mt-20">دخول</button>
                                    </div>

                                    <div class="col-12 text-center mt-20">
                                        <span class="text-muted">ما عندك حساب؟</span>
                                        <a href="{{ route('register') }}" class="fw-500">إنشاء حساب</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
