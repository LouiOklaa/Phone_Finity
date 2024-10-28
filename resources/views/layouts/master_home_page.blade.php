<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield("title")</title>


    <!-- Animate.css -->

    <link href="{{ asset('assets/css/pex-theme.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome iconic font -->

    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,800,900" rel="stylesheet" />

    <!-- Chosen -->
    <link href="{{ asset('assets/chosen/chosen.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- jQuery UI custom - slider only -->
    <link href="{{ asset('assets/jquery-ui-custom/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Pentix styles start -->
    <!-- Core styles -->

    <link href="{{ asset('assets/pentix/css/pentix.css') }}" rel="stylesheet" type="text/css">


    <!-- Theme styles -->

    <link href="{{ asset('assets/css/pex-theme.css') }}" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="{{ asset('assets/images/icons/icon.png') }}" />


</head>

<body class="body loader-loading">

    <header class="header header-over">

        <input id="header-default" type="radio" class="collapse" checked="checked" name="siteheader" />
        <input id="header-shown" type="radio" class="collapse" name="siteheader" />
        <input id="header-hidden" type="radio" class="collapse" name="siteheader" />

        <div class="infobar transparent bottom-separator xs-hidden">
            <div class="container">
                <div class="cols-list pull-left cols-md">
                    <div class="list-item"><span class="info-icon"><i class="fas fa-home" style="color: #CA5098;" aria-hidden="true"></i></span>{{$information->address}}</div>
                    <div class="list-item"><span class="info-icon"><i class="fas fa-phone" style="color: #CA5098;"></i></span>Hilfe : {{$information->phone_number}}</div>
                </div>
                <div class="cols-list pull-right cols-md socials">
                    <div class="list-item"><a href="{{$information->facebook_link}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></div>
                    <div class="list-item"><a href="{{$information->instagram_link}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></div>
                    <div class="list-item"><a href="{{$information->tiktok_link}}"><i class="fab fa-tiktok" aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>

        <nav class="stick-menu menu-wrap simple line transparent">
            <div class="menu-container menu-row">
                <div class="logo"><a href="{{url('/')}}"><img src="{{url('/assets/images/icons/phonefinity.png')}}"  alt="Phone_Finity" /></a></div>
                <div class="header-toggler pull-right xs-shown">
                    <label class="header-shown-sign" for="header-hidden"><i class="fas fa-times" aria-hidden="true"></i></label>
                    <label class="header-hidden-sign" for="header-shown"><i class="fas fa-bars" aria-hidden="true"></i></label>
                </div>
                <div class="clearfix xs-shown"></div>
                <div class="menu">
                    <ul class="menu-items">
                        <li>
                            <a href="{{url('/')}}">Startseite</a><span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <span class="menu-item">Neue Handys</span>
                            <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
                            <ul class="right">
                                @foreach($handys_sections as $one)
                                    <li><a href="{{ route('new_mobiles', $one->name) }}">{{$one->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <span class="menu-item">Gebrauchte Handys</span>
                            <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
                            <ul class="right">
                                @foreach($handys_sections as $one)
                                    <li><a href="{{ route('used_mobiles', $one->name) }}">{{$one->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <span class="menu-item">Zubehör</span>
                            <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
                            <ul class="right">
                                @foreach($accessories_brand as $one)
                                    <li>
                                        <span class="menu-item">{{$one}}</span>
                                        <span class="menu-sign-right"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                                        <ul>
                                            @php
                                                $displayedSections = []; // An array to store the names of the displayed sections
                                            @endphp
                                            @foreach($accessories as $x)
                                                @if($x->brand == $one && !in_array($x->section_name, $displayedSections))
                                                    <li><a href="{{ route('show_accessories',[$x->brand , $x->section_name]) }}">{{$x->section_name}}</a></li>
                                                    @php
                                                        $displayedSections[] = $x->section_name; // Add sections to the array
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <span class="menu-item">Dienstleistungen</span>
                            <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
                            <ul class="right">
                                @foreach($services_sections as $one)
                                    <li><a href="{{ route('show_services', ['section_name' => urlencode(str_replace(' ', '-', $one->name))]) }}">{{$one->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="projects.html">Galerie</a></li>
                        <li>
                            <a href="contact-us.html">Kontakt</a><span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="line-right xs-hidden"></div>

                </div>
            </div>
        </nav>


    </header>
    <section class="with-bg solid-section">

        <div class="fix-image-wrap" data-image-src="{{url('/Attachments/Home_Page/' .$information->img1)}}" data-parallax="scroll"></div>
        <div class="theme-back"></div>

        <div class="section-footer">
            <div class="container" data-inview-showup="showup-translate-down">

                <ul class="page-path">


                    <li><a href="{{url('/')}}">Startseite</a></li>


                    <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>

                    <li>@yield('current_page')</li>

                </ul>
            </div>
        </div>

    </section>

    @yield('contents')


    <div class="loader-block">
        <div class="loader-back alt-bg"></div>
        <div class="loader-image"><img class="image" src="{{ asset('assets/images/parts/loader.gif') }}" alt="" /></div>
    </div>

    <footer class="footer">
        <div class="container only-xs-text-justify-center">
            <div class="solid-section">
                <div class="row cols-md">
                    <div class="sm-col-3">
                        <div class="footer-logo">
                            <img src="{{url('/assets/images/icons/phonefinity.png')}}" alt="Phone_Finity" />
                        </div>
                        <div class="footer-text sm-text-justify" style="margin-left: 12px;">Phone Finity ist Ihr zuverlässiger Ansprechpartner für Handyreparaturen und den Verkauf der neuesten Smartphones. Ob schnelle Reparatur oder neues Gerät – Phone Finity bietet hochwertige Lösungen, um Sie verbunden zu halten.</div>
                    </div>
                    <div class="sm-col-8 sm-push-1">
                        <div class="row cols-md">
                            <div class="sm-col-4">
                                <div class="footer-title alt-color text-upper">Adresse</div>
                                <div class="footer-text">{{$information->address}}</div>
                            </div>
                            <div class="sm-col-4">
                                <div class="footer-title alt-color text-upper">Kontakte</div>
                                <div class="footer-text">{{$information->phone_number}}<br />{{$information->email}}</div>
                            </div>
                            <div class="sm-col-4">
                                <div class="footer-title alt-color text-upper">Soziale Medien</div>
                                <div class="cols-list socials cols-sm inline-block" style="margin-left: -1px">
                                    <a href="{{$information->facebook_link}}" class="list-item"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                    <a href="{{$information->instagram_link}}" class="list-item"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                    <a href="{{$information->tiktok_link}}" class="list-item"><i class="fab fa-tiktok" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyrights text-center top-separator ins-md">&copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.linkedin.com/in/loui-oklaa/"  style="font-weight: bolder;">Loui Oklaa</a> Alle Rechte vorbehalten.</div>
        </div>
    </footer>

    <!-- jQuery library -->
    <script src="{{ asset('assets/jquery/jquery-3.3.1.js') }}"></script>

    <!-- Paralax.js -->
    <script src="{{ asset('assets/parallax.js/parallax.js') }}"></script>

    <!-- FlexSlider -->
    <script src="{{ asset('assets/flexslider/jquery.flexslider-min.js') }}"></script>

    <!-- OwlCarousel2 -->
    <script src="{{ asset('assets/owlcarousel2/owl.carousel.min.js') }}"></script>

    <!-- Shuffle -->
    <script src="{{ asset('assets/shuffle/shuffle.min.js') }}"></script>

    <!-- Waypoints -->
    <script src="{{ asset('assets/waypoints/jquery.waypoints.min.js') }}"></script>

    <!-- Chosen -->
    <script src="{{ asset('assets/chosen/chosen.jquery.min.js') }}"></script>

    <!-- jQuery UI custom - slider only -->
    <script src="{{ asset('assets/jquery-ui-custom/jquery-ui.min.js') }}" type="text/javascript"></script>

    <!-- Pentix scripts start -->

    <script src="{{ asset('assets/js/pentix.js') }}" type="text/javascript"></script>

    <!-- Pentix scripts end -->

    <!-- Inits theme scripts -->

    <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

    <!-- Sort All mobiles Script -->
    <script>
        document.getElementById('sort').addEventListener('change', function () {
            const sortValue = this.value;

            // Define the filter option as the first option in the list of choices
            const filterOption = this.options[0];
            // Hide or show the filter option based on the selected option
            if (sortValue) {
                filterOption.style.display = 'none'; // Hide the filter option
            } else {
                filterOption.style.display = 'block'; // Show the filter option if nothing is
            }

            const page = new URLSearchParams(window.location.search).get('page') || 1;

            fetch(`{{ route('sort_all_mobiles') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ sort: sortValue, page: page })
            })
                .then(response => response.json())
                .then(data => {
                    // Update the page content with the new value returned.
                    document.querySelector('.rows-md').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- Sort mobiles Script -->
    <script>
        document.getElementById('sort2').addEventListener('change', function () {
            const sortValue = this.value;

            // Define the filter option as the first option in the list of choices
            const filterOption = this.options[0];
            // Hide or show the filter option based on the selected option
            if (sortValue) {
                filterOption.style.display = 'none'; // Hide the filter option
            } else {
                filterOption.style.display = 'block'; // Show the filter option if nothing is
            }

            const page = new URLSearchParams(window.location.search).get('page') || 1;
            const category = document.querySelector('input[name="category"]').value;
            const status = document.querySelector('input[name="status"]').value;

            fetch(`{{ route('sort_mobiles') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ sort: sortValue, page: page , category: category, status: status})
            })
                .then(response => response.json())
                .then(data => {
                    // Update the page content with the new value returned.
                    document.querySelector('.rows-md').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- Sort All Accessories Script -->
    <script>
        document.getElementById('sort3').addEventListener('change', function () {
            const sortValue = this.value;

            // Define the filter option as the first option in the list of choices
            const filterOption = this.options[0];
            // Hide or show the filter option based on the selected option
            if (sortValue) {
                filterOption.style.display = 'none'; // Hide the filter option
            } else {
                filterOption.style.display = 'block'; // Show the filter option if nothing is
            }

            const page = new URLSearchParams(window.location.search).get('page') || 1;

            fetch(`{{ route('sort_all_accessories') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ sort: sortValue, page: page })
            })
                .then(response => response.json())
                .then(data => {
                    // Update the page content with the new value returned.
                    document.querySelector('.rows-md').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- Sort Accessories Script -->
    <script>
        document.getElementById('sort4').addEventListener('change', function () {
            const sortValue = this.value;

            // Define the filter option as the first option in the list of choices
            const filterOption = this.options[0];
            // Hide or show the filter option based on the selected option
            if (sortValue) {
                filterOption.style.display = 'none'; // Hide the filter option
            } else {
                filterOption.style.display = 'block'; // Show the filter option if nothing is
            }

            const page = new URLSearchParams(window.location.search).get('page') || 1;
            const section_name = document.querySelector('input[name="section_name"]').value;
            const brand = document.querySelector('input[name="brand"]').value;

            fetch(`{{ route('sort_accessories') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ sort: sortValue, page: page , section_name: section_name, brand: brand})
            })
                .then(response => response.json())
                .then(data => {
                    // Update the page content with the new value returned.
                    document.querySelector('.rows-md').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- Sort All Services Script -->
    <script>
        document.getElementById('sort5').addEventListener('change', function () {
            const sortValue = this.value;

            // Define the filter option as the first option in the list of choices
            const filterOption = this.options[0];
            // Hide or show the filter option based on the selected option
            if (sortValue) {
                filterOption.style.display = 'none'; // Hide the filter option
            } else {
                filterOption.style.display = 'block'; // Show the filter option if nothing is
            }

            const page = new URLSearchParams(window.location.search).get('page') || 1;

            fetch(`{{ route('sort_all_services') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ sort: sortValue, page: page })
            })
                .then(response => response.json())
                .then(data => {
                    // Update the page content with the new value returned.
                    document.querySelector('.rows-md').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- Sort Services Script -->
    <script>
        document.getElementById('sort6').addEventListener('change', function () {
            const sortValue = this.value;

            // Define the filter option as the first option in the list of choices
            const filterOption = this.options[0];
            // Hide or show the filter option based on the selected option
            if (sortValue) {
                filterOption.style.display = 'none'; // Hide the filter option
            } else {
                filterOption.style.display = 'block'; // Show the filter option if nothing is
            }

            const page = new URLSearchParams(window.location.search).get('page') || 1;
            const sectionName = document.querySelector('input[name="sectionName"]').value;

            fetch(`{{ route('sort_services') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ sort: sortValue, page: page , sectionName: sectionName,})
            })
                .then(response => response.json())
                .then(data => {
                    // Update the page content with the new value returned.
                    document.querySelector('.rows-md').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>
