@extends('layouts.app')

@section('content')
    <div class="inner-banner-two light-bg text-center pt-200 md-pt-150 pb-85 lg-pb-50 position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-7 m-auto">
                    <ul class="style-none d-inline-flex justify-content-center pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li><a href="{{ route('devices.index') }}">الأجهزة</a></li>
                        <li>/</li>
                        <li>إضافة جهاز</li>
                    </ul>
                    <h1 class="hero-heading">إضافة جهاز</h1>
                    <p class="text-lg">أنشئ جهاز جديد وربطه بحساسات (اختياري)</p>
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
                        <div class="row">
                            <div class="col-12">
                                <div class="title-one text-center mb-40">
                                    <h2>بيانات الجهاز</h2>
                                </div>
                            </div>
                        </div>

                        <div class="form-style-one">
                            <form method="POST" action="{{ route('devices.store') }}">
                                @csrf

                                <div class="row controls">
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>اسم الجهاز*</label>
                                            <input
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="مثال: جهاز غرفة السيرفر"
                                                required
                                                class="@error('name') is-invalid @enderror"
                                            >
                                            @error('name')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-10 fw-500">ربط حساسات (اختياري)</div>
                                        @if ($sensors->isEmpty())
                                            <div class="alert alert-warning" role="alert">
                                                ما فيه حساسات حالياً. تقدر تضيف حساس من صفحة الحساسات.
                                            </div>
                                        @else
                                            <div class="row">
                                                @foreach ($sensors as $sensor)
                                                    <div class="col-md-6 mb-15">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input @error('sensor_ids') is-invalid @enderror"
                                                                type="checkbox"
                                                                name="sensor_ids[{{ $sensor->id }}]"
                                                                value="1"
                                                                id="sensor_{{ $sensor->id }}"
                                                                @checked(old('sensor_ids.' . $sensor->id))
                                                            >
                                                            <label class="form-check-label" for="sensor_{{ $sensor->id }}">
                                                                {{ $sensor->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('sensor_ids')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="col-12 d-flex flex-wrap gap-2 mt-30">
                                        <button class="btn-four tran3s">حفظ</button>
                                        <a href="{{ route('devices.index') }}" class="btn btn-outline-secondary">
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
