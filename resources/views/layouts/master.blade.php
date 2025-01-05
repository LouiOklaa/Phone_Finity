<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield("title") </title>
    <!-- Datepicker styles -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/bootstrap-datepicker/datetime/bootstrap-datetimepicker.min.css') }}">
    {{--  Progress bar  --}}
    <link href="{{ URL::asset('css/aos.css?ver=1.1.0" rel="stylesheet') }}">
    <link href="{{ URL::asset('css/bootstrap.min.css?ver=1.1.0" rel="stylesheet') }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!-- Layout styles -->
    <link rel="stylesheet" href=" {{ URL::asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/auth/favicon.png') }}" />
    @yield('CSS')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="d-flex justify-content-center align-items-center">
                <h2 class="main-logo1 d-flex align-items-center tx-28 logo-heading">
                    <a href="{{ url('/' . $page='admin') }}" style="text-decoration: none; color: inherit;">
                   <img src="{{ URL::asset('assets/images/auth/favicon.png') }}" alt="logo" class="logo-img">LouiSoft
                    </a>
                </h2>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{ URL::asset('assets/images/faces/face.jpg') }}" alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                            <span>{{Auth::user()->email}}</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-left sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                        <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Abmelden</p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Hauptmenü</span>
            </li>
            @can('Armaturenbrett')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/admin">
              <span class="menu-icon">
                <i class="mdi mdi-view-dashboard"></i>
              </span>
                    <span class="menu-title">Armaturenbrett</span>
                </a>
            </li>
            @endcan
            @can('AllgemeineInformationen')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/allgemeineinformationen">
              <span class="menu-icon">
                <i class="mdi mdi-information-variant"></i>
              </span>
                    <span class="menu-title">Allg. Informationen</span>
                </a>
            </li>
            @endcan
            @can('Handys')
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi mdi-cellphone"></i>
              </span>
                    <span class="menu-title">Handys</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        @can('Geräte')
                        <li class="nav-item"> <a class="nav-link" href="{{route('devices')}}">Gerätes</a></li>
                        @endcan
                        @can('GeräteKategorien')
                        <li class="nav-item"> <a class="nav-link" href="/handys_kategorien">Gerätes Kategorien</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('Zubehör')
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic-Z" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-headphones"></i>
              </span>
                    <span class="menu-title">Zubehör</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic-Z">
                    <ul class="nav flex-column sub-menu">
                        @can('HandysZubehör')
                        <li class="nav-item"> <a class="nav-link" href="/zubehör">Hanadyzubehör</a></li>
                        @endcan
                        @can('ZubehörKategorien')
                        <li class="nav-item"> <a class="nav-link" href="/zubehör_kategorien">Zubehör Kategorien</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('Dienstleistungen')
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic-D" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-library-books"></i>
              </span>
                    <span class="menu-title">Dienstleistungen</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic-D">
                    <ul class="nav flex-column sub-menu">
                        @can('HandysDienste')
                        <li class="nav-item"> <a class="nav-link" href="/dienstleistungen">Dienstleistungen</a></li>
                        @can('DiensteKategorien')
                        @endcan
                        <li class="nav-item"> <a class="nav-link" href="/dienste_kategorien">Dienste Kategorien</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('Galerie')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/galerie">
              <span class="menu-icon">
                <i class="mdi mdi-collage"></i>
              </span>
                    <span class="menu-title">Galerie</span>
                </a>
            </li>
            @endcan
            @can('AlleNachrichtenAnzeigen')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/alle_nachrichten">
            <span class="menu-icon">
                <i class="mdi mdi-message"></i>
            </span>
                    <span class="menu-title">Nachrichten</span>
                </a>
            </li>
            @endcan
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic-X" aria-expanded="false" aria-controls="ui-basic-E">
            <span class="menu-icon">
                <i class="mdi mdi-file-find"></i>
            </span>
                    <span class="menu-title">Berichte</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic-X">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/handyberichte">Handys Berichte</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/rollen">Zubehör Berichte</a></li>
                    </ul>
                </div>
            </li>
            @can('Einstellungen')
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic-E" aria-expanded="false" aria-controls="ui-basic-E">
            <span class="menu-icon">
                <i class="mdi mdi-settings"></i>
            </span>
                        <span class="menu-title">Einstellungen</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-E">
                        <ul class="nav flex-column sub-menu">
                            @can('Benutzer')
                                <li class="nav-item"> <a class="nav-link" href="/benutzer">Benutzer</a></li>
                            @endcan
                            @can('BenutzerRollen')
                                <li class="nav-item"> <a class="nav-link" href="/rollen">Benutzerrollen</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            <li class="nav-item menu-items">
                <a class="nav-link" href="/dokumentation">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
                    <span class="menu-title">Dokumentation</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="{{ url('/' . $page='admin') }}"><img src="{{ URL::asset('assets/images/auth/favicon.png') }}" style="width: 2em; height: 2em;" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <ul class="w-100"></ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-settings">
                        <a class="nav-link" href="#" id="fullscreenBtn">
                            <i class="mdi mdi-fullscreen" style="font-size: 23px;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown border-left">
                        <div class="nav-link nav-itemd-none d-md-flex">
                            <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('assets/images/icons/palestine_flag.png')}}" alt="img"></span>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <!-- Smaller profile picture for opening dropdown -->
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="{{ URL::asset('assets/images/faces/face.jpg') }}" alt="" style="width: 35px; height: 35px;"> <!-- Reduced size here -->
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <!-- User profile with picture and email in the dropdown -->
                            <div class="dropdown-item preview-item" style="display: flex; flex-direction: column; align-items: center;  pointer-events: none;">
                                <img class="img-md rounded-circle mb-2" src="{{ URL::asset('assets/images/faces/face.jpg') }}" alt="" style="width: 50px; height: 50px;"> <!-- This size remains as it is -->
                                <p class="mb-0 font-weight-bold">{{ Auth::user()->name }}</p>
                                <p class="text-muted small">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="dropdown-divider"></div>

                            @can('ProfilAnzeigen')
                            <!-- Show User Profile -->
                            <a style="height: 40px;" class="dropdown-item preview-item" href="{{ route('profile', Auth::user()->id) }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon menu-icon rounded-circle">
                                        <i class="mdi mdi-account-circle text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Profil Anzeigen</p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            @endcan
                            @can('RollenAnzeigen')
                            <!-- Show User Permission -->
                            <a style="height: 40px;" class="dropdown-item preview-item" href="{{ route('show_roles', \Spatie\Permission\Models\Role::where('name' , '=' , Auth::user()->role_name)->first()) }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon menu-icon rounded-circle">
                                        <i class="mdi mdi-shield-outline text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Konto Berechtigungen</p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            @endcan
                            @can('BenutzerBearbeiten')
                            <!-- Edit User Button -->
                            <a style="height: 40px;" class="dropdown-item preview-item" href="{{ route('edit_user', Auth::user()->id) }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon menu-icon rounded-circle">
                                        <i class="mdi mdi-account-box-outline text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Profil Bearbeiten</p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            @endcan
                            <!-- Logout Button -->
                            <a style="height: 40px;" class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon menu-icon rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Abmelden</p>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- Support Button -->
                            <a style="height: 40px;" class="dropdown-item preview-item" href="https://mail.google.com/mail/?view=cm&fs=1&to=louioklaa2001@gmail.com" target="_blank">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon rounded-circle">
                                        <i class="mdi mdi-contact-mail text-warning"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Support</p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>


        @yield('contents')

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="footer-copyrights text-center top-separator ins-md" style="font-size: 15px; font-weight: bolder;">&copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.louioklaa.de/"  style="font-weight: bolder; color: #0162E8">Loui Oklaa</a> Alle Rechte vorbehalten.
                <a style="color: #FFFFFF" href="https://github.com/LouiOklaa" class="mdi mdi-github-circle"></a>
                <a style="color: #FFFFFF" href="https://www.facebook.com/loui.oklaa/" class="mdi mdi-facebook"></a>
                <a style="color: #FFFFFF" href="https://www.linkedin.com/in/loui-oklaa/" class="mdi mdi-linkedin"></a>
                <a style="color: #FFFFFF" href="https://www.instagram.com/loui_oklaa/" class="mdi mdi-instagram"></a>
                <a style="color: #FFFFFF" href="https://wa.me/+4917670352663" class="mdi mdi-whatsapp"></a>
                <a style="color: #FFFFFF" href="https://x.com/loui_oklaa">
                    <svg style="margin-bottom: 8px" xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                </a></div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ URL::asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ URL::asset('assets/js/data-table.js') }}"></script>
<script src="{{ URL::asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ URL::asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ URL::asset('assets/js/misc.js') }}"></script>
<script src="{{ URL::asset('assets/js/settings.js') }}"></script>
<script src="{{ URL::asset('assets/js/todolist.js') }}"></script>
<script src="{{ URL::asset('assets/js/chart.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
{{--Progress Js--}}
<script src="{{ URL::asset('js/core/jquery.3.2.1.min.js?ver=1.1.0') }}"></script>
<script src="{{ URL::asset('js/core/popper.min.js?ver=1.1.0') }}"></script>
<script src="{{ URL::asset('js/core/bootstrap.min.js?ver=1.1.0') }}"></script>
<script src="{{ URL::asset('js/now-ui-kit.js?ver=1.1.0') }}"></script>
<script src="{{ URL::asset('js/aos.js?ver=1.1.0') }}"></script>
<script src="{{ URL::asset('scripts/main.js?ver=1.1.0') }}"></script>
<script src="{{ URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/bootstrap-datepicker/datetime/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    // Add click event listener to the icon
    document.getElementById('fullscreenBtn').addEventListener('click', function() {
        if (!document.fullscreenElement) {
            // Enter full screen
            document.documentElement.requestFullscreen().catch(err => {
                console.log(`Error: ${err.message}`); // Handle errors
            });
        } else {
            // Exit full screen
            document.exitFullscreen();
        }
    });
</script>

@yield('JS')

</body>
</html>
