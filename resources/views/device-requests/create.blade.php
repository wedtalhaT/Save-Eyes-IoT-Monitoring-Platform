@extends('layouts.app')

@section('content')
    <div class="inner-banner-two light-bg text-center pt-200 md-pt-150 pb-85 lg-pb-50 position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-7 m-auto">
                    <ul class="style-none d-inline-flex justify-content-center pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li><a href="{{ route('admin.sensors.show', $sensor->id) }}">الحساس</a></li>
                        <li>/</li>
                        <li>إضافة مفتاح</li>
                    </ul>
                    <h1 class="hero-heading">إضافة مفتاح طلب</h1>
                    <p class="text-lg">الحساس: {{ $sensor->name }}</p>
                </div>
            </div>
        </div>
        <img src="images/lazy.svg" data-src="images/assets/ils_01.svg" alt="" class="lazy-img shapes shape_01">
        <img src="images/lazy.svg" data-src="images/assets/ils_02.svg" alt="" class="lazy-img shapes shape_02">
    </div>

    <div class="light-bg border-top pt-120 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="bg-wrapper light-bg">
                        <div class="title-one text-center mb-40">
                            <h2>بيانات المفتاح</h2>
                        </div>

                        <p class="text-muted mb-25">
                            الـ <b>Key</b> لازم يطابق اسم الحقل اللي يرسله ESP32 ضمن JSON (مثل <code>humidity</code> أو <code>pressure</code>).
                            الـ <b>Label</b> اسم العرض للمستخدم، و<b>Unit</b> وحدة.
                        </p>

                        <div class="form-style-one">
                            <form method="POST" action="{{ route('sensors.keys.store', $sensor->id) }}">
                                @csrf

                                <div class="row controls">
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>Key*</label>
                                            <input
                                                type="text"
                                                name="key"
                                                value="{{ old('key') }}"
                                                placeholder="مثال: temperature"
                                                required
                                                class="@error('key') is-invalid @enderror"
                                            >
                                            <small class="text-muted d-block mt-2">لازم يكون فريد داخل نفس الحساس هذا الي راح يتم ارسال القيم عن طريقه من ESP32 الى الموقع.</small>
                                            @error('key')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>Label*</label>
                                            <input
                                                type="text"
                                                name="label"
                                                value="{{ old('label') }}"
                                                placeholder="مثال: درجة الحرارة"
                                                required
                                                class="@error('label') is-invalid @enderror"
                                            >
                                            @error('label')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>Unit</label>
                                            <input
                                                type="text"
                                                name="unit"
                                                value="{{ old('unit') }}"
                                                placeholder=" اختياري مثال: C"
                                                class="@error('unit') is-invalid @enderror"
                                            >
                                            @error('unit')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-wrap gap-2">
                                        <button class="btn-four tran3s">حفظ</button>
                                        <a href="{{ route('admin.sensors.show', $sensor->id) }}" class="btn btn-outline-secondary">
                                            رجوع
                                        </a>
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
