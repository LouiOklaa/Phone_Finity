<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LouiSoft Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/auth/favicon.png') }}">
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="main-logo1 d-flex align-items-center tx-28"
                                style="font-size: 28px; margin-bottom: 40px">
                                <img src="{{ URL::asset('assets/images/auth/favicon.png') }}" alt="logo"
                                     style="width: 1em; height: 1em; margin-right: 10px;"> LouiSoft
                            </h2>
                        </div>
                        <h3 style="color: #0a58ca">Willkommen!</h3>
                        <h3 class="card-title text-left mb-3">Anmelden</h3>
                        <!-- Laravel Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Benutzername oder E-Mail <span style="color: #0a58ca;">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                       <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Passwort <span style="color: #0a58ca;">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}> Angemeldet bleiben
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Einloggen</button>
                            </div>
                        </form>
                        <div class="text-center" style="margin-bottom: -30px;">
                            <h6><span class="text-muted">© <script>document.write(new Date().getFullYear());</script> <a
                                        style="color: #0162E8;" href="https://www.facebook.com/loui.oklaa"
                                        target="_blank">Loui Oklaa</a> Alle Rechte vorbehalten.</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
</body>
</html>
