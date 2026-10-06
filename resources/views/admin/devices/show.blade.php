@extends('layouts.app')

@section('content')
    <div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative"
         style="background-image: url(images/media/img_26.webp);">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-heading d-inline-block position-relative">
                        {{ $device->name }}
                        <img src="images/shape/shape_33.svg" alt="">
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-40">
                        تفاصيل الجهاز (لوحة الأدمن)
                    </p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li><a href="{{ route('admin.devices.index') }}">إدارة الأجهزة</a></li>
                        <li>/</li>
                        <li>{{ $device->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-150 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="fw-500 mb-10">معلومات</div>
                            <div class="mb-2"><span class="text-muted">UUID:</span> <span class="fw-500">{{ $device->uuid }}</span></div>
                            <div class="mb-2"><span class="text-muted">المالك:</span> <span class="fw-500">{{ $device->user?->email ?? '-' }}</span></div>
                            <div class="mb-2">
                                <span class="text-muted">آخر ظهور:</span>
                                <span class="fw-500">{{ $device->last_seen_at?->format('Y-m-d H:i') ?? 'غير متوفر' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="text-muted">عدد الحساسات:</span>
                                <span class="fw-500">{{ $device->sensors->count() }}</span>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-20">
                                <a href="{{ route('admin.devices.index') }}" class="btn btn-outline-secondary">
                                    رجوع
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="title-one mb-20">
                        <h2>الحساسات المرتبطة</h2>
                    </div>

                    @if ($device->sensors->isEmpty())
                        <div class="alert alert-info" role="alert">
                            ما فيه حساسات مرتبطة بهذا الجهاز.
                        </div>
                    @else
                        <div class="accordion" id="adminDeviceSensors">
                            @foreach ($device->sensors as $sensor)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading_{{ $sensor->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse_{{ $sensor->id }}" aria-expanded="false"
                                                aria-controls="collapse_{{ $sensor->id }}">
                                            {{ $sensor->name }}
                                        </button>
                                    </h2>
                                    <div id="collapse_{{ $sensor->id }}" class="accordion-collapse collapse"
                                         aria-labelledby="heading_{{ $sensor->id }}" data-bs-parent="#adminDeviceSensors">
                                        <div class="accordion-body">
                                            <div class="d-flex flex-wrap gap-2 mb-20">
                                                <a href="{{ route('admin.sensors.show', $sensor->id) }}" class="btn btn-sm btn-outline-primary">
                                                    صفحة الحساس
                                                </a>
                                                <a href="{{ route('sensors.keys.create', $sensor->id) }}" class="btn btn-sm btn-outline-success">
                                                    إضافة مفتاح
                                                </a>
                                            </div>

                                            @if ($sensor->deviceRequests->isEmpty())
                                                <div class="text-muted">لا توجد مفاتيح طلبات لهذا الحساس.</div>
                                            @else
                                                <div class="row">
                                                    @foreach ($sensor->deviceRequests as $request)
                                                        <div class="col-md-6 mb-10">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="text-muted">{{ $request->label }}</div>
                                                                <div class="fw-500">
                                                                    {{ data_get($device->data, $request->key) ?? '-' }}
                                                                    @if ($request->unit) {{ $request->unit }} @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
