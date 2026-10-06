<!--
		=====================================================
			Footer Two
		=====================================================
		-->
<div class="footer-three">

    <div class="container">
        <div class="bottom-footer">
            <div class="row">
                <div class="col-xl-4 col-lg-3 order-lg-3 mb-15">
                    <ul class="style-none d-flex align-items-center justify-content-center justify-content-lg-end social-icon">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-dribbble"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-6 order-lg-2 mb-15">
                    <ul class="style-none bottom-nav d-flex flex-wrap justify-content-center order-lg-last">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li><a href="{{ route('faq') }}">الاسئلة الشائعة</a></li>
                        <li><a href="{{ route('contact') }}">تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-3 order-lg-1 mb-15">
                    <div class="copyright text-center text-lg-start order-lg-first">
                        © {{ date('Y') }} IoT Monitoring Platform
                    </div>
                </div>
            </div>
        </div>
        <!-- /.bottom-footer -->
    </div>
</div>

<!-- /.footer-two -->


<button class="scroll-top">
    <i class="bi bi-arrow-up-short"></i>
</button>




<!-- Optional JavaScript _____________________________  -->

<!-- jQuery first, then Bootstrap JS -->
<!-- jQuery -->
<script src="{{ asset('vendor/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- WOW js -->
<script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<!-- Fancybox -->
<script src="{{ asset('vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
<!-- Lazy -->
<script src="{{ asset('vendor/jquery.lazy.min.js') }}"></script>
<!-- js Counter -->
<script src="{{ asset('vendor/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.waypoints.min.js') }}"></script>

<!-- validator js -->
<script src="{{ asset('vendor/validator.js') }}"></script>

<!-- Theme js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'تم',
            text: @json(session('success')),
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif
@vite('resources/js/app.js')
@stack('scripts')
<script src="{{ asset('js/theme.js') }}"></script>
</div> <!-- /.main-page-wrapper -->
</body>

</html>
