<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }} "></script>
<!-- waves js -->
<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }} "></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript"
    src="bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/common-pages.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/js/sweetalert2/sweetaler2.min.js') }}"></script>
@if (session('success'))
    <script type="text/javascript">
        let timerInterval;
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            timer: 5000,
            icon: 'success',
            timerProgressBar: true,
            confirmButtonText: 'Oke',
            didOpen: () => {
                timerInterval = setInterval(() => {}, 100)
            },
            willClose: () => {

            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {

            }
        });
    </script>
@endif
@if (session('loginError'))
    <script type="text/javascript">
        let timerInterval;
        Swal.fire({
            title: "Fail!",
            text: "{{ session('loginError') }}",
            timer: 500000,
            icon: 'error',
            timerProgressBar: true,
            confirmButtonText: 'Oke',
            didOpen: () => {
                timerInterval = setInterval(() => {}, 100)
            },
            willClose: () => {

            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {

            }
        });
    </script>
@endif
</body>

</html>
