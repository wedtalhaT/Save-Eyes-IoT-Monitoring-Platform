@extends('layouts.app')

@section('content')
    <div class="inner-banner-two light-bg text-center pt-200 md-pt-150 pb-85 lg-pb-50 position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-7 m-auto">
                    <ul class="style-none d-inline-flex justify-content-center pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>الأجهزة</li>
                    </ul>
                    <h1 class="hero-heading">الأجهزة</h1>
                    <p class="text-lg">إدارة أجهزتك وربطها بالحساسات</p>
                </div>
            </div>
        </div>
        <img src="images/lazy.svg" data-src="images/assets/ils_01.svg" alt="" class="lazy-img shapes shape_01">
        <img src="images/lazy.svg" data-src="images/assets/ils_02.svg" alt="" class="lazy-img shapes shape_02">
        <img src="images/lazy.svg" data-src="images/shape/shape_05.svg" alt="" class="lazy-img shapes shape_03">
        <img src="images/lazy.svg" data-src="images/shape/shape_05.svg" alt="" class="lazy-img shapes shape_04">
    </div>

    <div class="light-bg border-top pt-120 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-30">
                <div class="title-one mb-10">
                    <h2>قائمة الأجهزة</h2>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('devices.sensors.create') }}" class="btn-one fw-500 tran3s">ربط حساس</a>
                    <a href="{{ route('devices.create') }}" class="btn-four">إضافة جهاز</a>
                </div>
            </div>

            @if ($devices->isEmpty())
                <div class="alert alert-info" role="alert">
                    ما عندك أجهزة حالياً. ابدأ بإضافة جهاز جديد.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>عدد الحساسات</th>
                            <th>آخر ظهور</th>
                            <th class="text-end">إجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($devices as $device)
                            <tr>
                                <td class="fw-500">{{ $device->name }}</td>
                                <td>{{ $device->sensors_count }}</td>
                                <td>
                                    {{ $device->last_seen_at?->format('Y-m-d H:i') ?? 'غير متوفر' }}
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex flex-wrap gap-2">
                                        <a href="{{ route('devices.show', $device->uuid) }}" class="btn btn-sm btn-outline-primary">
                                            عرض
                                        </a>
                                        <form method="POST" action="{{ route('devices.destroy', $device->uuid) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('متأكد تبي تحذف الجهاز؟');">
                                                حذف
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

