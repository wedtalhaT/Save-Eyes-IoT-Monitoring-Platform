<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ url('/') }}/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="theme-color" content="#1A4137">
    <meta name="msapplication-navbutton-color" content="#1A4137">
    <meta name="apple-mobile-web-app-status-bar-style" content="#1A4137">

    <title>IoT Monitoring Platform</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.rtl.min.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" media="all">
    @stack('styles')
</head>

<body>
<div class="main-page-wrapper">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="icon">
                <img src="{{ asset('images/loader.svg') }}" alt="" class="m-auto d-block" width="60">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="o" class="letters-loading">o</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
            </div>
        </div>
    </div>

    <header class="theme-main-menu menu-overlay menu-style-four white-vr sticky-menu fixed">
        <div class="inner-content position-relative">
            <div class="top-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo order-lg-0">
                        <a href="{{ url('/') }}" class="d-flex align-items-center">
                            <img src="{{ asset('images/logo/logo.png') }}" style="width: 82px;" alt="">
                        </a>
                    </div>

                    <div class="right-widget d-none d-md-block ms-auto ms-lg-0 me-3 me-lg-0 order-lg-3">
                        @auth
                            <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="quote-one fw-500 tran3s border-0 bg-transparent">
                                    تسجيل الخروج
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="quote-one fw-500 tran3s">تسجيل الدخول</a>
                        @endauth
                    </div>

                    <nav class="navbar navbar-expand-lg p0 order-lg-2">
                        <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav align-items-lg-center">
                                <li class="d-block d-lg-none">
                                    <div class="logo">
                                        <a href="{{ url('/') }}" class="d-block">
                                            <img src="{{ asset('images/logo/logo_01.svg') }}" alt="">
                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">الرئيسية</a>
                                </li>

                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('devices.index') }}">الأجهزة</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('devices.create') }}">إضافة جهاز</a>
                                    </li>
                                    @if (auth()->user()->isAdmin())
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.sensors.create') }}">إضافة حساس</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.devices.index') }}">إدارة الأجهزة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.users.index') }}">إدارة المستخدمين</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('devices.sensors.create') }}">ربط حساس</a>
                                    </li>
                                @endauth

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('faq') }}">الأسئلة الشائعة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a>
                                </li>

                                @guest
                                    <li class="d-md-none ps-2 pe-2 mt-15">
                                        <a href="{{ route('login') }}" class="btn-one text-center w-100 fw-500 tran3s">
                                            تسجيل الدخول
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
