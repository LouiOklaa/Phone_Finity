@extends('layouts.master_home_page')
@section('title')
    Über uns
@endsection
@section('current_page')
    Über uns
@endsection
@section('contents')
    <section class="muted-bg solid-section" data-inview-showup="showup-translate-up">
        <div class="container">
            <div class="row cols-xl rows-lg">
                <div class="md-col-6 text-center md-text-left">
                    <h2 class="text-upper text-semibold">Was wir tun ?</h2>
                    <p>Die umfassendsten Reparaturen bei Phony Finity. Jedes Gerät, Handy, Tablet oder Laptop kann von
                        uns repariert oder aufgerüstet werden. Erfahren Sie mehr über uns und sehen Sie, warum wir die
                        beste Wahl für Gerätereparaturen und -aufrüstungen sind.</p>
                    <blockquote class="hard-line-right text-right">
                        <p>Über 15 Jahre Berufserfahrung in hochwertigen Reparaturdiensten.</p>
                    </blockquote>
                    <p>Wir verfügen über eine umfassend geschulte und erfahrene Serviceabteilung, die sich um alle Ihre
                        Serviceanforderungen kümmert. Wir sind seit dem Jahr 2000 im Reparatur- und Servicegeschäft
                        tätig.</p>

                </div>
                <div class="md-col-6 md-fix-container">
                    <img class="image" src="{{url('/assets/images/About.jpg')}}" alt=""/>
                </div>
            </div>
        </div>
    </section>
    <section class="main-bg" data-inview-showup="showup-translate-up">
        <div class="container">


            <div class="contact-table only-xs-text-center">
                <div class="contact-icon xs-hidden"><i class="fas fa-bicycle" aria-hidden="true"></i></div>
                <div class="contact-content">
                    <div class="contact-title">Kostenlose Beratung anfordern</div>
                    <div class="text-justify only-xs-text-justify-center">Holen Sie sich Antworten und Ratschläge von den Leuten, von denen Sie sie brauchen.
                    </div>
                </div>
                <div class="contact-btn">
                    <a href="{{route('contact_us')}}" class="btn btns-white text-upper">Kontaktiere Sie uns</a>
                </div>
            </div>

        </div>
    </section>
    <section class="map-section" data-inview-showup="showup-translate-right">
        <div class="gmap" data-lat="13.43312005807037" data-lng="52.48489494840933" id="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.6837276016236!2d13.430518076190484!3d52.4848619388312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a84f002a2e23b7%3A0x2f726219b273d37e!2sPhone%20Finity!5e0!3m2!1sen!2sde!4v1736719772120!5m2!1sen!2sde"
                frameborder="0" style="border:0; width: 100%; height: 500px;" allowfullscreen></iframe>
        </div>
        <div class="info-wrap">
            <div class="info-container">
                <div class="our-info side main-bg">
                    <div class="info-block">
                        <div class="info-title text-upper">Kontaktiere Sie uns</div>
                        <div class="info-line"><span class="info-icon"><i class="fas fa-map-marker-alt fa-fw"
                                                                          aria-hidden="true"></i></span>{{$information->address}}
                        </div>
                        <div class="info-line"><span class="info-icon"><i class="fas fa-phone fa-fw"
                                                                          aria-hidden="true"></i></span>{{$information->phone_number}}
                        </div>
                        <div class="info-line"><span class="info-icon"><i class="far fa-envelope fa-fw"
                                                                          aria-hidden="true"></i></span>{{$information->email}}
                        </div>
                    </div>
                    <div class="info-block">
                        <div class="info-title text-upper">Öffnungszeit</div>
                        <div class="info-line">Montag-Samstag<span class="pull-right">12:00 - 20:00</span></div>
                        <div class="info-line">Sonntag<span class="pull-right">geschlossen</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
