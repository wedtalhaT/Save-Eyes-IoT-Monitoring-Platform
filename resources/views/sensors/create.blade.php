@extends('layouts.app')

@section('content')
    <div class="inner-banner-two light-bg text-center pt-200 md-pt-150 pb-85 lg-pb-50 position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-7 m-auto">
                    <ul class="style-none d-inline-flex justify-content-center pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>إضافة حساس</li>
                    </ul>
                    <h1 class="hero-heading">إضافة حساس</h1>
                    <p class="text-lg">تعريف حساس جديد في النظام</p>
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
                            <h2>بيانات الحساس</h2>
                        </div>

                        <div class="form-style-one">
                            <form method="POST" action="{{ route('admin.sensors.store') }}">
                                @csrf

                                <div class="row controls">
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>اسم الحساس*</label>
                                            <input
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="مثال: Temperature"
                                                required
                                                class="@error('name') is-invalid @enderror"
                                            >
                                            @error('name')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-wrap gap-2">
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
