<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LouiSoft Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href=" {{ URL::asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/auth/favicon.png') }}"/>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                        <div class="col-lg-6 text-lg-right pr-lg-4">
                            <h1 class="display-1 mb-0">500</h1>
                        </div>
                        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                            <h2>ENTSCHULDIGUNG!</h2>
                            <h3 class="font-weight-light">Interner Serverfehler!</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center mt-xl-2">
                            <a class="text-white font-weight-medium" href="{{ url('/' . $page='admin') }}">Zurück zum
                                Dashboard</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 mt-xl-2">
                            <div class="footer-copyrights text-center top-separator ins-md"
                                 style="font-size: 15px; font-weight: bolder;">&copy;
                                <script>document.write(new Date().getFullYear());</script>
                                <a href="https://www.louioklaa.com/" style="font-weight: bolder; color: #5F3F9A">Loui
                                    Oklaa</a> Alle Rechte vorbehalten.
                                <a style="color: #5F3F9A" href="https://github.com/LouiOklaa"
                                   class="mdi mdi-github-circle"></a>
                                <a style="color: #5F3F9A" href="https://www.facebook.com/loui.oklaa/"
                                   class="mdi mdi-facebook"></a>
                                <a style="color: #5F3F9A" href="https://www.linkedin.com/in/loui-oklaa/"
                                   class="mdi mdi-linkedin"></a>
                                <a style="color: #5F3F9A" href="https://www.instagram.com/loui_oklaa/"
                                   class="mdi mdi-instagram"></a>
                                <a style="color: #5F3F9A" href="https://wa.me/+4917670352663"
                                   class="mdi mdi-whatsapp"></a>
                                <a style="color: #5F3F9A" href="https://x.com/loui_oklaa">
                                    <svg style="margin-bottom: 8px; color: #5F3F9A" xmlns="http://www.w3.org/2000/svg"
                                         width="13" height="13" fill="currentColor" class="bi bi-twitter-x"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                    </svg>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ URL::asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ URL::asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ URL::asset('assets/js/misc.js') }}"></script>
<script src="{{ URL::asset('assets/js/settings.js') }}"></script>
<script src="{{ URL::asset('assets/js/todolist.js') }}"></script>
<script src="{{ URL::asset('assets/js/chart.js') }}"></script>
<!-- endinject -->
</body>
</html>
