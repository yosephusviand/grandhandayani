    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('flexstart') }}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('flexstart') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('flexstart') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('flexstart') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('flexstart') }}/assets/vendor/purecounter/purecounter.js"></script>
    <script src="{{ asset('flexstart') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('flexstart') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('flexstart') }}/assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        function showNotif(text) {

            $('#text-notif').html(text);
            $('#topbar-notification').fadeIn();

            setTimeout(function() {
                $('#topbar-notification').fadeOut();
            }, 2000)
        }

        function showAlert(text) {

            $('#alert-notif').html(text);
            $('#alert-notification').fadeIn();

            setTimeout(function() {
                $('#alert-notification').fadeOut();
            }, 2000)
        }
    </script>
    @if (!empty(Session::get('status')) && Session::get('status') == '1')
        <script>
            showNotif("{{ Session::get('message') }}");
        </script>
    @endif

    @if (!empty(Session::get('status')) && Session::get('status') == '2')
        <script>
            showAlert("{{ Session::get('message') }}");
        </script>
    @endif

    </body>

    </html>
