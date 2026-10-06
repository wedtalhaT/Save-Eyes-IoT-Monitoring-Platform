@extends('layouts.app')

@section('content')

		<!--
		=============================================
			Inner Banner
		==============================================
		-->
		<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(images/media/img_26.webp);">
			<div class="container position-relative">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<h1 class="hero-heading d-inline-block position-relative">تواصل معنا للاستفسارات <img src="images/shape/shape_33.svg" alt=""></h1>
					</div>
                    <div class="col-xl-4 col-lg-5 ms-auto">
                        <p class="text-white text-lg mb-70 lg-mb-40">اطّلع على معلومات التواصل ويمكنك مراسلتنا مباشرة من هنا</p>
                        <ul class="style-none d-inline-flex pager">
                            <li><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li>/</li>
                            <li>تواصل معنا</li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
		<!-- /.inner-banner-one -->




		<!--
		=============================================
			Contact Us
		==============================================
		-->
		<div class="contact-us-section pt-150 lg-pt-80">
			<div class="container">
                <div class="position-relative">
                    <div class="row">
						<div class="col-12 m-auto">
							<div class="row">
								<div class="col-md-4">
									<div class="address-block-one text-center mb-40 wow fadeInUp">
										<div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="images/icon/icon_90.svg" alt="" class="lazy-img"></div>
										<h5 class="title">العنوان</h5>
										<p>كلية التقنية بجدة <br>جدة، المملكة العربية السعودية</p>
									</div> <!-- /.address-block-one -->
								</div>
								<div class="col-md-4">
									<div class="address-block-one text-center mb-40 wow fadeInUp">
										<div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="images/icon/icon_91.svg" alt="" class="lazy-img"></div>
										<h5 class="title">معلومات التواصل</h5>
										<p>يمكنك التواصل معنا عبر الهاتف <br><a href="tel:05555555555" class="call text-lg fw-500">05555555555</a></p>
									</div> <!-- /.address-block-one -->
								</div>
								<div class="col-md-4">
									<div class="address-block-one text-center mb-40 wow fadeInUp">
										<div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="images/icon/icon_92.svg" alt="" class="lazy-img"></div>
										<h5 class="title">الدعم المباشر</h5>
										<p>خدمة المحادثة المباشرة <br><a href="#" class="webaddress">www.example.test</a></p>
									</div> <!-- /.address-block-one -->
								</div>
							</div>
						</div>
					</div>

                    <div class="bg-wrapper light-bg mt-80 lg-mt-40">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="d-flex flex-column flex-lg-column-reverse">
									<div class="row">
										<div class="col-md-8 col-6 me-auto ms-auto"><img src="images/lazy.svg" data-src="images/assets/ils_07.svg" alt="" class="lazy-img me-auto ms-auto"></div>
									</div>
									<div class="title-one text-center text-lg-start md-mt-20 mb-70 md-mb-30">
										<h2>لديك استفسار؟ راسلنا عبر النموذج</h2>
									</div>
									<!-- /.title-one -->
								</div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-style-one ps-xl-5">
                                    <form action="https://html.creativegigstf.com/babun/RTL/inc/contact.php" id="contact-form" data-toggle="validator">
                                        <div class="messages"></div>
                                        <div class="row controls">
                                            <div class="col-12">
                                                <div class="input-group-meta form-group mb-30">
                                                    <label for="">الاسم*</label>
                                                    <input type="text" placeholder="اسمك*" name="name" required="required" data-error="الاسم مطلوب.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta form-group mb-40">
                                                    <label for="">البريد الإلكتروني*</label>
                                                    <input type="email" placeholder="البريد الإلكتروني*" name="email" required="required" data-error="يرجى إدخال بريد إلكتروني صحيح.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta form-group mb-35">
                                                    <textarea placeholder="رسالتك*" name="message" required="required" data-error="يرجى كتابة رسالة."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12"><button class="btn-four tran3s w-100 d-block">إرسال الرسالة</button></div>
                                        </div>
                                    </form>
                                </div> <!-- /.form-style-one -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-banner mt-120 lg-mt-80">
                <div class="gmap_canvas h-100 w-100">
                    <iframe class="gmap_iframe h-100 w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3714.855700510894!2d39.352978099999994!3d21.395585699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c2348d978ce1fb%3A0x35baf2d409e1626e!2z2KfZhNmD2YTZitipINin2YTYqtmC2YbZitipINmE2YTYqNmG2KfYqiDYqNis2K_YqQ!5e0!3m2!1sar!2ssa!4v1777049263507!5m2!1sar!2ssa"></iframe>
                </div>
            </div>
		</div>
		<!-- ./contact-us-section -->




		<!--
		=====================================================
			Newsletter Banner
		=====================================================
		-->
        <div class="newsletter-banner mt-40">
            <div class="container">
                <div class="main-wrapper bottom-border">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="fw-bold">النشرة البريدية</h2>
                            <p class="text-lg md-pb-20">اشترك لتصلك آخر المستجدات مباشرة</p>
                        </div>
                        <div class="col-lg-6">
                            <form action="#" class="me-auto ms-auto me-lg-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <input type="email" placeholder="أدخل بريدك الإلكتروني">
                                    <button class="rounded-circle tran3s"><i class="bi bi-arrow-left"></i></button>
                                </div>
                                <p class="text-center text-lg-end m0 pt-5">مشترك بالفعل؟ <a href="#" class="text-dark fw-500">إلغاء الاشتراك</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.main-wrapper -->
            </div>
        </div>


@endsection
