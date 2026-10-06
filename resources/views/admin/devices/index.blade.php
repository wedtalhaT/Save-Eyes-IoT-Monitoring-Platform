@extends('layouts.app')

@section('content')
    <div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative"
         style="background-image: url(images/media/img_26.webp);">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-heading d-inline-block position-relative">
                        إدارة الأجهزة
                        <img src="images/shape/shape_33.svg" alt="">
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-40">
                        عرض جميع الأجهزة ومتابعة المالك والحساسات
                    </p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>إدارة الأجهزة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-150 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th>UUID</th>
                                <th>الاسم</th>
                                <th>المالك</th>
                                <th>آخر ظهور</th>
                                <th>عدد الحساسات</th>
                                <th class="text-end">إجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($devices as $device)
                                <tr>
                                    <td class="text-muted" style="max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $device->uuid }}
                                    </td>
                                    <td>{{ $device->name }}</td>
                                    <td>{{ $device->user?->email ?? '-' }}</td>
                                    <td>{{ $device->last_seen_at?->format('Y-m-d H:i') ?? '-' }}</td>
                                    <td>{{ $device->sensors_count }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-outline-primary"
                                           href="{{ route('admin.devices.show', $device->uuid) }}">عرض</a>
                                        <form method="POST" action="{{ route('admin.devices.destroy', $device->uuid) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit"
                                                    onclick="return confirm('تأكيد حذف الجهاز؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $devices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

