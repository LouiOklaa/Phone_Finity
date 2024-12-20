@extends('layouts.master_home_page')
@section('title')
    Kontakt
@endsection
@section('current_page')
    Kontakt
@endsection
@section('contents')
<section class="map-section" data-inview-showup="showup-translate-up">
    <div class="gmap" data-lat="13.43312005807037" data-lng="52.48489494840933" id="map"></div>
    <div class="info-wrap">
        <div class="info-container">
            <div class="our-info side main-bg">
                <div class="info-block">
                    <div class="info-title text-upper">Kontaktiere Sie uns</div>
                    <div class="info-line"><span class="info-icon"><i class="fas fa-map-marker-alt fa-fw" aria-hidden="true"></i></span>{{$information->address}}</div>
                    <div class="info-line"><span class="info-icon"><i class="fas fa-phone fa-fw" aria-hidden="true"></i></span>{{$information->phone_number}}</div>
                    <div class="info-line"><span class="info-icon"><i class="far fa-envelope fa-fw" aria-hidden="true"></i></span>{{$information->email}}</div>
                </div>
                <div class="info-block">
                    <div class="info-title text-upper">Öffnungszeit</div>
                    <div class="info-line">Montag-Samstag<span class="pull-right">10:00 - 21:00</span></div>
                    <div class="info-line">Sonntag<span class="pull-right">geschlossen</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content-section">
                <div class="container">

                    <div class="section-head text-center container-md">

                        <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Request a Callback</h2>

                        <p data-inview-showup="showup-translate-left">if your need personal assistance, fill the form bellow we will reply back to your asap!</p>
                    </div>
                    <form id="contact-form" action="{{ route('send_email') }}" method="post" class="md-col-8 md-col-offs-2" data-inview-showup="showup-translate-down">
                        @csrf
                        <div class="field-group">
                            <div class="field-wrap">
                                <input type="text" class="field-control" name="name" id="name" placeholder="Name"  required/>
                                <span class="field-back"></span>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-wrap">
                                <input type="email" class="field-control" name="email" id="email" placeholder="E-Mail" required/>
                                <span class="field-back"></span>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-wrap">
                                <input type="text" class="field-control" name="phone" id="phone" placeholder="E-Telefonnummer" required/>
                                <span class="field-back"></span>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-wrap">
                                <textarea class="field-control" name="message" placeholder="Ihr Nachricht" required></textarea>
                                <span class="field-back"></span>
                            </div>
                        </div>
                        <div class="my-3">
                            <div id="error-message" style="color: red;"></div>
                            <div id="success-message" style="color: #CA5098; font-weight: bolder"></div>
                        </div>
                        <div class="btn-block text-center">
                            <button class="btn text-upper ajax-disabled" type="submit" id="submit-btn">
                                Senden
                            </button>
                        </div>
                    </form>
                </div>
            </section>

    <div class="loader-block">
        <div class="loader-back alt-bg"></div>
        <div class="loader-image"><img class="image" src="./assets/images/parts/loader.gif" alt=""/></div>
    </div>
@endsection
@section('JS')
    <!-- Google Maps -->
    <script>
        function initMap() {
            var location = { lat: 52.48489494840933, lng: 13.43312005807037 };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "Standort",
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/pink-dot.png",
                    scaledSize: new google.maps.Size(50, 50)
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADTYd1v2wopvONfGy3sG7kq2iHwnISVKo&callback=initMap"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(event) {
                event.preventDefault(); // Prevent page reload

                // Hide success and error messages initially
                $('#success-message').hide();
                $('#error-message').hide();

                // Disable the button after form submission
                $('#submit-btn').prop('disabled', true); // Disable the button to prevent multiple submissions

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Check if the response contains success and show success message if available
                        if (response.success) {
                            $('#success-message').text(response.success).fadeIn();

                            // Hide the success message after 5 seconds
                            setTimeout(function() {
                                $('#success-message').fadeOut();
                            }, 4000);

                            // Clear the form fields after successful submission
                            $('#contact-form')[0].reset();

                            // Hide the submit button after the submission
                            $('#submit-btn').hide();

                            // Re-enable and show the submit button after 5 seconds
                            setTimeout(function() {
                                $('#submit-btn').show(); // Show the button again
                                $('#submit-btn').prop('disabled', false); // Re-enable the button
                            }, 5000);
                        } else {
                            // Show error message if no success response
                            $('#error-message').text('Beim Senden der Nachricht ist ein Fehler aufgetreten.').fadeIn();
                        }
                    },
                    error: function(xhr) {
                        // Show error message if there's an issue with the request
                        $('#error-message').text('Beim Senden der Nachricht ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal.').fadeIn();

                        // Re-enable the button if there's an error
                        $('#submit-btn').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
