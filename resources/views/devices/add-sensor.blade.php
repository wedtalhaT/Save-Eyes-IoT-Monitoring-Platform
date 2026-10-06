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
                        <li>ربط حساس</li>
                    </ul>
                    <h1 class="hero-heading">ربط حساس بجهاز</h1>
                    <p class="text-lg">اختر جهاز وحساس لإتمام الربط</p>
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
                            <h2>نموذج الربط</h2>
                        </div>

                        @if ($devices->isEmpty())
                            <div class="alert alert-warning" role="alert">
                                ما عندك أجهزة. لازم تضيف جهاز أولاً.
                            </div>
                        @elseif ($sensors->isEmpty())
                            <div class="alert alert-warning" role="alert">
                                ما فيه حساسات. لازم تضيف حساس أولاً.
                            </div>
                        @else
                            <div class="form-style-one">
                                <form method="POST" action="{{ route('devices.sensors.store') }}">
                                    @csrf

                                    <div class="row controls">
                                        <div class="col-12">
                                            <div class="input-group-meta form-group mb-30">
                                                <label>الجهاز*</label>
                                                <select name="device_uuid" @class(['form-select', 'is-invalid' => $errors->has('device_uuid')]) required>
                                                    <option value="" disabled selected>اختر جهاز</option>
                                                    @foreach ($devices as $device)
                                                        <option value="{{ $device->uuid }}" @selected(old('device_uuid') === $device->uuid)>
                                                            {{ $device->name }} ({{ $device->uuid }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('device_uuid')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-group-meta form-group mb-30">
                                                <label>الحساس*</label>
                                                <select name="sensor_id" @class(['form-select', 'is-invalid' => $errors->has('sensor_id')]) required>
                                                    <option value="" disabled selected>اختر حساس</option>
                                                    @foreach ($sensors as $sensor)
                                                        <option value="{{ $sensor->id }}" @selected((string) old('sensor_id') === (string) $sensor->id)>
                                                            {{ $sensor->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('sensor_id')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-wrap gap-2 mt-10">
                                            <button class="btn-four tran3s">ربط</button>
                                            <a href="{{ route('devices.index') }}" class="btn btn-outline-secondary">
                                                رجوع
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
