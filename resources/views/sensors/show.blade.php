@extends('layouts.app')

@section('content')
    <div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative"
         style="background-image: url(images/media/img_26.webp);">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-heading d-inline-block position-relative">
                        {{ $sensor->name }}
                        <img src="images/shape/shape_33.svg" alt="">
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-40">تفاصيل الحساس ومفاتيح الطلبات</p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>الحساس</li>
                        <li>/</li>
                        <li>{{ $sensor->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-150 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-30">
                <div class="title-one mb-10">
                    <h2>مفاتيح الطلبات</h2>
                </div>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('sensors.keys.create', $sensor->id) }}" class="btn-four">إضافة مفتاح</a>
                @endif
            </div>

            <p class="text-muted mb-20">
                مفاتيح الطلبات هي أسماء الحقول (Keys) اللي يرسلها جهاز ESP32 ضمن JSON عند تحديث بيانات الجهاز.
                مثال: لو الجهاز يرسل <code>{"temperature":27.4}</code> لازم يكون عندك مفتاح <code>temperature</code> عشان نعرف وش نعرض (Label) وبأي وحدة (Unit).
            </p>

            @if ($sensor->deviceRequests->isEmpty())
                <div class="alert alert-info" role="alert">
                    ما فيه مفاتيح طلبات للحساس هذا.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th>Key</th>
                            <th>Label</th>
                            <th>Unit</th>
                            <th>تاريخ الإضافة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sensor->deviceRequests as $req)
                            <tr>
                                <td class="fw-500">{{ $req->key }}</td>
                                <td>{{ $req->label }}</td>
                                <td>{{ $req->unit ?? '-' }}</td>
                                <td>{{ $req->created_at?->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-30">
                <a href="{{ route('devices.index') }}" class="btn btn-outline-secondary">رجوع للأجهزة</a>
            </div>
        </div>
    </div>
@endsection
