@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="anonymous">
    <style>
        .gps-map {
            height: 360px;
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
@endpush

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
                        تفاصيل الجهاز وربط الحساسات وإدارة مفاتيح الطلبات
                    </p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li><a href="{{ route('devices.index') }}">الأجهزة</a></li>
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
                            <div class="mb-2">
                                <span class="text-muted">آخر ظهور:</span>
                                <span class="fw-500">{{ $device->last_seen_at?->format('Y-m-d H:i') ?? 'غير متوفر' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="text-muted">عدد الحساسات:</span>
                                <span class="fw-500">{{ $device->sensors->count() }}</span>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-20">
                                <a href="{{ route('devices.sensors.create') }}" class="btn-one fw-500 tran3s">
                                    ربط حساس
                                </a>
                                <a href="{{ route('devices.index') }}" class="btn btn-outline-secondary">
                                    رجوع
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-20">
                        <div class="title-one mb-10">
                            <h2>الحساسات المرتبطة</h2>
                        </div>
                    </div>

                    @if ($device->sensors->isEmpty())
                        <div class="alert alert-info" role="alert">
                            ما فيه حساسات مرتبطة بهذا الجهاز.
                        </div>
                    @else
                        <div class="accordion" id="deviceSensors">
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
                                         aria-labelledby="heading_{{ $sensor->id }}" data-bs-parent="#deviceSensors">
                                        <div class="accordion-body">
                                            <div class="d-flex flex-wrap gap-2 mb-20">
                                                @if (auth()->user()->isAdmin())
                                                    <a href="{{ route('admin.sensors.show', $sensor->id) }}" class="btn btn-sm btn-outline-primary">
                                                        صفحة الحساس
                                                    </a>
                                                @endif
                                                @if (auth()->user()->isAdmin())
                                                    <a href="{{ route('sensors.keys.create', $sensor->id) }}" class="btn btn-sm btn-outline-success">
                                                        إضافة مفتاح
                                                    </a>
                                                @endif
                                                <form method="POST" action="{{ route('devices.sensors.destroy') }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden" name="device_uuid" value="{{ $device->uuid }}">
                                                    <input type="hidden" name="sensor_id" value="{{ $sensor->id }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" id="disconnectBtn">
                                                        فصل الحساس
                                                    </button>


                                                </form>
                                            </div>

                                            @if ($sensor->name !== 'GPS')
                                                <div class="fw-500 mb-10">قراءات الحساس</div>
                                                @if ($sensor->deviceRequests->isEmpty())
                                                    <div class="text-muted">لا توجد قراءات معرفة لهذا الحساس.</div>
                                                @else
                                                    <div class="row">
                                                        @foreach ($sensor->deviceRequests as $request)
                                                            <div class="col-md-6 mb-10">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="text-muted">{{ $request->label }}</div>
                                                                    <div class="fw-500">
                                                                        <span class="device-reading" data-key="{{ $request->key }}">
                                                                            {{ data_get($device->data, $request->key) ?? '-' }}
                                                                        </span>
                                                                        @if ($request->unit) {{ $request->unit }} @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endif

                                            @if ($sensor->name === 'GPS')
                                                <hr class="my-4">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-15">
                                                    <div class="fw-500">الخريطة (GPS)</div>
                                                    <div class="text-muted">
                                                        Lat: <span id="gps-lat">{{ data_get($device->data, 'lat') ?? '-' }}</span>,
                                                        Lng: <span id="gps-lng">{{ data_get($device->data, 'lng') ?? '-' }}</span>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-outline-dark"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#gps-map-wrap"
                                                        aria-expanded="false"
                                                        aria-controls="gps-map-wrap">
                                                    عرض الخريطة
                                                </button>

                                                <div class="collapse mt-15" id="gps-map-wrap">
                                                    <div id="gps-map" class="gps-map">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <script>
                                document.getElementById('disconnectBtn').addEventListener('click', function (e) {
                                    e.preventDefault();
                                    const form = this.closest('form');
                                    Swal.fire({
                                        title: "تأكيد فصل الحساس",
                                        text: "هل تريد فصل الحساس عن هذا الجهاز؟ سيتم إلغاء ربطه فقط ولن يتم حذف بيانات الحساس.",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: "نعم، افصل",
                                        cancelButtonText: "الغاء"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            form.submit();
                                        }
                                    });
                                })

                            </script>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="anonymous"></script>
    <script>
        addEventListener('DOMContentLoaded', function () {
            const uuid = @json($device->uuid);
            const latEl = document.getElementById('gps-lat');
            const lngEl = document.getElementById('gps-lng');
            const mapWrap = document.getElementById('gps-map-wrap');
            const mapEl = document.getElementById('gps-map');

            let marker = null;

            mapWrap?.addEventListener('shown.bs.collapse', function () {
                if (!mapEl || marker) return;

                let lat = parseFloat(latEl?.textContent || '24.7136');
                let lng = parseFloat(lngEl?.textContent || '46.6753');
                if (!isFinite(lat)) lat = 24.7136;
                if (!isFinite(lng)) lng = 46.6753;

                const map = L.map(mapEl).setView([lat, lng], 12);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19}).addTo(map);
                marker = L.marker([lat, lng]).addTo(map);
                setTimeout(function () { map.invalidateSize(); }, 150);
            });

            window.Echo?.channel('device.' + uuid).listen('.device.updated', function (e) {
                const data = e?.data || {};

                document.querySelectorAll('.device-reading').forEach(function (node) {
                    const key = node.dataset.key; 
                    if (data[key] !== undefined && data[key] !== null) node.textContent = data[key];
                });

                if (data.lat === undefined || data.lng === undefined) return;

                latEl.textContent = Number(data.lat).toFixed(6);
                lngEl.textContent = Number(data.lng).toFixed(6);
                marker?.setLatLng([Number(data.lat), Number(data.lng)]);
            });
        });
    </script>
@endpush
