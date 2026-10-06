@extends('layouts.app')

@section('content')
    <div class="inner-banner-two light-bg text-center pt-200 md-pt-150 pb-85 lg-pb-50 position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-7 m-auto">
                    <ul class="style-none d-inline-flex justify-content-center pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>الأسئلة الشائعة</li>
                    </ul>
                    <h1 class="hero-heading">الأسئلة الشائعة</h1>
                    <p class="text-lg">أجوبة سريعة عن استخدام منصة مراقبة إنترنت الأشياء</p>
                </div>
            </div>
        </div>
        <img src="images/lazy.svg" data-src="images/assets/ils_01.svg" alt="" class="lazy-img shapes shape_01">
        <img src="images/lazy.svg" data-src="images/assets/ils_02.svg" alt="" class="lazy-img shapes shape_02">
        <img src="images/lazy.svg" data-src="images/shape/shape_05.svg" alt="" class="lazy-img shapes shape_03">
        <img src="images/lazy.svg" data-src="images/shape/shape_05.svg" alt="" class="lazy-img shapes shape_04">
    </div>

    <div class="faq-section-three light-bg border-top pt-120 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="tab-content mt-60 lg-mt-40">
                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionOne">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    وش فكرة المشروع باختصار؟
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionOne" style="">
                                <div class="accordion-body">
                                    <p>منصة لإدارة أجهزة إنترنت الأشياء: تضيف الأجهزة، تربطها بالحساسات، وتتابع حالتها من مكان واحد.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    وش الفرق بين Device و Sensor؟
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>الـ Device هو الجهاز نفسه (الهاردوير)، والـ Sensor هو الحساس/نوع القراءة (حرارة، رطوبة...). تقدر تربط أكثر من حساس على نفس الجهاز.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    كيف أضيف جهاز وأربطه بحساس؟
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionOne" style="">
                                <div class="accordion-body">
                                    <p>بعد تسجيل الدخول: أضف حساس، ثم أضف جهاز، وبعدها من صفحة “ربط حساس” اختر الجهاز والحساس لإتمام الربط.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    كيف أعرف إذا الجهاز متصل؟
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>بتشوف “آخر ظهور” (Last Seen) للجهاز. إذا ما صار فيه تحديثات لفترة، غالباً الجهاز غير متصل أو متوقف عن الإرسال.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    هل أقدر أربط أكثر من حساس مع جهاز واحد؟
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>نعم. تقدر تربط أكثر من حساس على نفس الجهاز حسب احتياجك.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    هل بياناتي خاصة فيني؟
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>نعم. الأجهزة مربوطة بحساب المستخدم، وما تقدر تشوف أجهزة غيرك.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    كيف أتواصل معكم إذا احتجت مساعدة؟
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>من صفحة “تواصل معنا” تقدر ترسل رسالة، وبنرد عليك بأقرب وقت.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-marketing" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionTwo">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneA" aria-expanded="false" aria-controls="collapseOneA">
                                    هل أقدر أستخدم المنصة لأكثر من موقع؟
                                </button>
                            </h2>
                            <div id="collapseOneA" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>نعم. تقدر تضيف أجهزة متعددة وتسمّيها حسب الموقع أو القسم لتسهيل المتابعة.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoA" aria-expanded="false" aria-controls="collapseTwoA">
                                    هل فيه صلاحيات/حسابات متعددة؟
                                </button>
                            </h2>
                            <div id="collapseTwoA" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>حالياً كل جهاز مرتبط بمستخدم واحد (حساب واحد). تقدر توسعها لاحقاً لصلاحيات وأدوار حسب متطلباتك.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-banking" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionThree">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixB" aria-expanded="false" aria-controls="collapseSixB">
                                    هل لازم أسجل دخول عشان أضيف أجهزة؟
                                </button>
                            </h2>
                            <div id="collapseSixB" class="accordion-collapse collapse" data-bs-parent="#accordionThree">
                                <div class="accordion-body">
                                    <p>نعم. الإضافة والإدارة داخل لوحة المستخدم وتتطلب تسجيل دخول.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSevenB" aria-expanded="false" aria-controls="collapseSevenB">
                                    وش يصير لو انقطع الجهاز؟
                                </button>
                            </h2>
                            <div id="collapseSevenB" class="accordion-collapse collapse" data-bs-parent="#accordionThree">
                                <div class="accordion-body">
                                    <p>بتلاحظ أن “آخر ظهور” ما يتحدث. تقدر تستخدمه كمؤشر سريع إن الجهاز غير متصل.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-finance" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionFour">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneC" aria-expanded="false" aria-controls="collapseOneC">
                                    كيف أربط حساس بجهاز؟
                                </button>
                            </h2>
                            <div id="collapseOneC" class="accordion-collapse collapse" data-bs-parent="#accordionFour">
                                <div class="accordion-body">
                                    <p>من “ربط حساس” اختر الجهاز ثم الحساس واضغط ربط. بعدها يظهر الحساس ضمن تفاصيل الجهاز.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourC" aria-expanded="false" aria-controls="collapseFourC">
                                    هل أقدر أفصل حساس من جهاز؟
                                </button>
                            </h2>
                            <div id="collapseFourC" class="accordion-collapse collapse" data-bs-parent="#accordionFour">
                                <div class="accordion-body">
                                    <p>نعم. من صفحة الجهاز تقدر تفصل الحساس إذا ما عاد تحتاج الربط.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveC" aria-expanded="false" aria-controls="collapseFiveC">
                                    هل أقدر أحذف جهاز؟
                                </button>
                            </h2>
                            <div id="collapseFiveC" class="accordion-collapse collapse" data-bs-parent="#accordionFour">
                                <div class="accordion-body">
                                    <p>نعم. من قائمة الأجهزة تقدر حذف الجهاز إذا ما عاد تحتاجه.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-payment" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionFive">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveD" aria-expanded="false" aria-controls="collapseFiveD">
                                    وين ألقى تفاصيل الجهاز؟
                                </button>
                            </h2>
                            <div id="collapseFiveD" class="accordion-collapse collapse" data-bs-parent="#accordionFive">
                                <div class="accordion-body">
                                    <p>من صفحة “الأجهزة” اضغط على الجهاز، بتطلع لك صفحة التفاصيل والحساسات المرتبطة.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixD" aria-expanded="false" aria-controls="collapseSixD">
                                    كيف أضيف حساس جديد؟
                                </button>
                            </h2>
                            <div id="collapseSixD" class="accordion-collapse collapse" data-bs-parent="#accordionFive">
                                <div class="accordion-body">
                                    <p>من “إضافة حساس” اكتب اسم الحساس واحفظه، وبعدها تقدر تربطه بأي جهاز.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-terms" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionSix">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneE" aria-expanded="false" aria-controls="collapseOneE">
                                    وش معنى مفاتيح الطلبات (Keys)؟
                                </button>
                            </h2>
                            <div id="collapseOneE" class="accordion-collapse collapse" data-bs-parent="#accordionSix">
                                <div class="accordion-body">
                                    <p>الـ Key هو اسم المتغير اللي يجي من الجهاز (مثل <code>temperature</code>)، ومعه تقدر تحفظ اسم عرض ووحدة عشان البيانات تكون واضحة.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeE" aria-expanded="false" aria-controls="collapseThreeE">
                                    هل لازم اسم الحساس يكون فريد؟
                                </button>
                            </h2>
                            <div id="collapseThreeE" class="accordion-collapse collapse" data-bs-parent="#accordionSix">
                                <div class="accordion-body">
                                    <p>نعم، اسم الحساس فريد عشان ما يصير تعارض في التعريف والربط.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSevenE" aria-expanded="false" aria-controls="collapseSevenE">
                                    كيف أتواصل مع الدعم؟
                                </button>
                            </h2>
                            <div id="collapseSevenE" class="accordion-collapse collapse" data-bs-parent="#accordionSix">
                                <div class="accordion-body">
                                    <p>من صفحة “تواصل معنا” ارسل رسالتك، أو استخدم معلومات التواصل الموجودة في الصفحة.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-account" role="tabpanel" tabindex="0">
                    <div class="accordion accordion-style-one" id="accordionSeven">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourF" aria-expanded="false" aria-controls="collapseFourF">
                                    كيف أسترجع كلمة المرور؟
                                </button>
                            </h2>
                            <div id="collapseFourF" class="accordion-collapse collapse" data-bs-parent="#accordionSeven">
                                <div class="accordion-body">
                                    <p>من صفحة تسجيل الدخول اختر “نسيت كلمة المرور؟” واكتب بريدك، وبيرسلك رابط الاستعادة.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveF" aria-expanded="false" aria-controls="collapseFiveF">
                                    كيف أسوي حساب جديد؟
                                </button>
                            </h2>
                            <div id="collapseFiveF" class="accordion-collapse collapse" data-bs-parent="#accordionSeven">
                                <div class="accordion-body">
                                    <p>من صفحة “إنشاء حساب” اكتب بياناتك وسجل، وبعدها تقدر تبدأ بإضافة الأجهزة والحساسات.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fancy-banner-three position-relative">
        <div class="container">
            <div class="row align-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="title-one mb-20 lg-mb-10">
                        <h2 class="text-white">عندك سؤال إضافي؟ تواصل معنا</h2>
                    </div>
                    <p class="text-lg m0 text-white opacity-75">نرد عليك ونساعدك في الإعداد والاستخدام.</p>
                </div>
                <div class="col-lg-4 col-md-3">
                    <a href="{{ route('contact') }}" class="quote-btn tran5s rounded-circle d-flex align-items-center justify-content-center ms-auto">
                        <img src="images/lazy.svg" data-src="images/icon/icon_30.svg" alt="" class="lazy-img">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
