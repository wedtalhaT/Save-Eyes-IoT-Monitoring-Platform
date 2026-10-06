@extends('layouts.app')

@section('content')
    <div class="hero-banner-eight pt-200 lg-pt-150 pb-225 xl-pb-150 lg-pb-150 md-pb-120 sm-pb-20 position-relative z-1">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-7 col-md-9">
                    <h1 class="hero-heading text-white position-relative wow fadeInUp">
                        منصة مراقبة إنترنت الأشياء
                    </h1>
                    <div class="row">
                        <div class="col-xl-11">
                            <p class="text-xl text-white pt-25 lg-pt-20 pb-40 lg-pb-30 md-pb-20 wow fadeInUp" data-wow-delay="0.1s">
                                اربط أجهزتك بالحساسات، وعرّف مفاتيح الطلبات (Keys) عشان تكون البيانات واضحة وسهلة المتابعة.
                            </p>
                        </div>
                    </div>
                    <div class="d-lg-inline-flex align-items-center wow fadeInUp" data-wow-delay="0.2s">
                        <ul class="style-none d-flex flex-wrap align-items-center">
                            @auth
                                <li class="me-3 mt-10"><a href="{{ route('devices.index') }}" class="btn-twentyOne">لوحة الأجهزة</a></li>
                            @else
                                <li class="me-3 mt-10"><a href="{{ route('login') }}" class="btn-twentyOne">تسجيل الدخول</a></li>
                                <li class="mt-10"><a href="{{ route('register') }}" class="btn-twentytwo">إنشاء حساب</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="media-wrapper wow fadeInUp">
            <img src="images/lazy.svg" data-src="images/assets/businessman_04.webp" alt="" class="lazy-img w-100">
            <img src="images/assets/screen_26.png" alt="" class="shapes shape_01">
            <img src="images/assets/screen_27.png" alt="" class="shapes shape_02">
        </div>
    </div>

    <div class="block-feature-seventeen position-relative z-1 light-bg-deep mt-150 lg-mt-90 pt-140 lg-pt-80 pb-140 lg-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="title-one mb-30">
                        <h2 class="color-deep">وش تسوي المنصة؟</h2>
                    </div>
                    <p class="text-lg color-deep mb-40">
                        تجمع إدارة الأجهزة والحساسات ومفاتيح الطلبات في مكان واحد. الهدف إن قراءة البيانات تكون منظمة بدل ما تكون JSON مبعثر بدون تسمية أو وحدة.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 d-flex wow fadeInUp">
                    <div class="card-style-twentyTwo w-100">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-cpu fs-1"></i>
                        </div>
                        <h4 class="title">إدارة الأجهزة</h4>
                        <p class="text">أنشئ Devices وربطها بحساسات متعددة، وتابع آخر ظهور للجهاز.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card-style-twentyTwo w-100">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-activity fs-1"></i>
                        </div>
                        <h4 class="title">تعريف الحساسات</h4>
                        <p class="text">عرّف Sensors مرة وحدة وخلها قابلة للربط على أكثر من جهاز.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-style-twentyTwo w-100">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-key fs-1"></i>
                        </div>
                        <h4 class="title">مفاتيح الطلبات (Keys)</h4>
                        <p class="text">حوّل أسماء الحقول اللي تجي من الجهاز (مثل <code>temperature</code>) إلى Label ووحدة (Unit) عشان العرض يصير واضح.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card-style-twentyTwo w-100">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-lightning-charge fs-1"></i>
                        </div>
                        <h4 class="title">متابعة لحظية</h4>
                        <p class="text">تحديث بيانات الجهاز ووضعه (Last seen) بشكل مباشر، وتظهر القراءات في صفحة الجهاز بشكل منظّم.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-150 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-one mb-30">
                        <h2 class="color-deep">طريقة العمل</h2>
                    </div>
                    <div class="accordion accordion-style-four" id="howItWorks">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#s1" aria-expanded="true" aria-controls="s1">
                                    <span>01.</span> أضف حساس
                                </button>
                            </h2>
                            <div id="s1" class="accordion-collapse collapse show" data-bs-parent="#howItWorks">
                                <div class="accordion-body">
                                    <p>عرّف اسم الحساس (مثل Temperature) في النظام.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s2" aria-expanded="false" aria-controls="s2">
                                    <span>02.</span> أضف جهاز
                                </button>
                            </h2>
                            <div id="s2" class="accordion-collapse collapse" data-bs-parent="#howItWorks">
                                <div class="accordion-body">
                                    <p>أنشئ Device جديد واربطه بحساسات (اختياري).</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s3" aria-expanded="false" aria-controls="s3">
                                    <span>03.</span> اربط الحساس بالجهاز
                                </button>
                            </h2>
                            <div id="s3" class="accordion-collapse collapse" data-bs-parent="#howItWorks">
                                <div class="accordion-body">
                                    <p>من صفحة “ربط حساس” اختر الجهاز والحساس لإتمام الربط.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s4" aria-expanded="false" aria-controls="s4">
                                    <span>04.</span> النتيجة النهائية: قراءات واضحة
                                </button>
                            </h2>
                            <div id="s4" class="accordion-collapse collapse" data-bs-parent="#howItWorks">
                                <div class="accordion-body">
                                    <p>
                                        بعد الربط وتعريف مفاتيح الطلبات (Keys) للحساس، خل جهازك يرسل JSON للتحديث على
                                        <code>/api/device/{uuid}/update</code>.
                                        بعدها بتشوف القراءات مرتبة داخل صفحة الجهاز بدل ما تكون بيانات خام.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
