<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>ProFix - Computer & Mobile Phone Repair Service Company HTML5 Template</title>







<!-- Animate.css -->

<link href="./assets/animate.css/animate.css" rel="stylesheet" type="text/css" />



<!-- Font Awesome iconic font -->

<link href="./assets/fontawesome/css/all.css" rel="stylesheet" type="text/css" />









<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet" />


<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,800,900" rel="stylesheet" />







<!-- Chosen -->
<link href="./assets/chosen/chosen.min.css" rel="stylesheet" type="text/css" />


<!-- jQuery UI custom - slider only -->
<link href="./assets/jquery-ui-custom/jquery-ui.min.css" rel="stylesheet" type="text/css">

<!-- Pentix styles start -->
<!-- Core styles -->

<link href="./assets/pentix/css/pentix.css" rel="stylesheet" type="text/css">


<!-- Theme styles -->

<link href="./assets/css/pex-theme.css" rel="stylesheet" type="text/css">




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

<div class="list-item"><span class="info-icon"><i class="fas fa-phone" style="color: #CA5098;"></i></span>Hilfe : {{$information->phone_number}}
</div>


</div>
<div class="cols-list pull-right cols-md socials">


<div class="list-item"><a href="{{$information->facebook_link}}"><i class="fab fa-facebook-f" aria-hidden="true"></i>
</a></div>

<div class="list-item"><a href="{{$information->instagram_link}}"><i class="fab fa-instagram" aria-hidden="true"></i>
</a></div>

<div class="list-item"><a href="{{$information->tiktok_link}}"><i class="fab fa-tiktok" aria-hidden="true"></i>
</a></div>


</div>
</div>
</div>

<nav class="stick-menu menu-wrap simple line transparent">
<div class="menu-container menu-row">
<div class="logo"><a href="index.html"><img src="{{url('/assets/images/icons/phonephinity.png')}}" alt="ProFix" /></a></div>
<div class="header-toggler pull-right xs-shown">
<label class="header-shown-sign" for="header-hidden"><i class="fas fa-times" aria-hidden="true"></i></label>
<label class="header-hidden-sign" for="header-shown"><i class="fas fa-bars" aria-hidden="true"></i></label>
</div>
<div class="clearfix xs-shown"></div>
<div class="menu">
<ul class="menu-items">
    <li>
     <a href="index.html">Startseite</a><span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
    </li>
    <li>
        <span class="menu-item">Neue Handys</span>
        <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
        <ul class="right">
            <li><a href="contact-us.html">Samsung</a></li>
            <li><a href="contact-us.html">Iphone</a></li>
            <li><a href="contact-us.html">Redmi</a></li>
        </ul>
    </li>
    <li>
        <span class="menu-item">Gebrauchte Handys</span>
        <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
        <ul class="right">
            <li><a href="contact-us.html">Samsung</a></li>
            <li><a href="contact-us.html">Iphone</a></li>
            <li><a href="contact-us.html">Redmi</a></li>
        </ul>
    </li>
    <li>
        <span class="menu-item">Zubehör</span>
        <span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span>
        <ul class="right">
            <li><a href="contact-us.html">Samsung</a></li>
            <li><a href="contact-us.html">Iphone</a></li>
            <li><a href="contact-us.html">Redmi</a></li>
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
<section>


<div class="flexslider screen-height">

<div class="slides">

<div class="slide">




<img src="{{url('/Attachments/Home_Page/' .$information->img1)}}" alt="" data-cover-image="true" />

<div class="theme-back"></div>



<div class="pos-center text-center col-12 text-white">



<div class="banner-title res-text-xxl">Schnelle und zügige Reparatur</div>

<div class="banner-subtitle res-text-md">Senden Sie einfach wertvolle Laptops, PCs, Macs, Handys,<br /> Gaming-Geräte oder PlayStation, und wir kümmern uns darum.</div>



</div>




</div>

<div class="slide">




<img src="{{url('/Attachments/Home_Page/' .$information->img2)}}" alt="" data-cover-image="true" />

<div class="theme-back"></div>



<div class="pos-center text-center col-12 text-white">



<div class="banner-title res-text-xxl">Alle Arten von Smartphones</div>

<div class="banner-subtitle res-text-md">Samsung - Apple - Xiaomi - Redmi - Honor - Pixel</div>


</div>




</div>

<div class="slide">




<img src="{{url('/Attachments/Home_Page/' .$information->img3)}}" alt="" data-cover-image="true" />

<div class="theme-back"></div>



<div class="pos-center text-center col-12 text-white">



<div class="banner-title res-text-xxl">Alle Handy-Zubehör</div>

<div class="banner-subtitle res-text-md">Panzerglas - Handyhüllen - Powerbank - Kopfhörer</div>



</div>




</div>

</div>


<div class="flex-custom-navigation">
<!-- Arrow Navigator -->
<a href="#" class="flex-prev">
<i class="fas fa-angle-left" aria-hidden="true"></i>
</a>
<a href="#" class="flex-next">
<i class="fas fa-angle-right" aria-hidden="true"></i>
</a>
</div>


</div>

</section>

<div class="clearfix muted-bg">



<section class="md-stuck-top content-section">
<div class="container hyped-block">


<div class="row cols-md rows-md">
<div class="md-col-6">
<div class="row cols-md rows-md">
<div class="sm-col-6">
<div class="price-block simple" data-inview-showup="showup-translate-up">
<div class="price-back"></div>

<div class="price-image">
<img class="image" src="./assets/images/icons/printer-dark.png" alt="" />
</div>

<div class="price-title">Neue Handys</div>
<div class="price-subtext">Ab...</div>
<div class="price" style="color: #CA5098;">85.00€</div>
</div>
</div>
<div class="sm-col-6">
<div class="price-block simple" data-inview-showup="showup-translate-up">
<div class="price-back"></div>

<div class="price-image">
<img class="image" src="./assets/images/icons/mobile-dark.png" alt="" />
</div>

<div class="price-title">Smartphone Reparatur</div>
<div class="price-subtext">Ab...</div>
<div class="price" style="color: #CA5098;">20.00€</div>
</div>
</div>
</div>
</div>
<div class="md-col-6">
<div class="row cols-md rows-md">
<div class="sm-col-6">
<div class="price-block simple" data-inview-showup="showup-translate-up">
<div class="price-back"></div>

<div class="price-image">
<img class="image" src="./assets/images/icons/notebook-dark.png" alt="" />
</div>

<div class="price-title">Laptop Reparatur</div>
<div class="price-subtext">Ab...</div>
<div class="price" style="color: #CA5098;">20.00€</div>
</div>
</div>
<div class="sm-col-6">
<div class="price-block simple" data-inview-showup="showup-translate-up">
<div class="price-back"></div>

<div class="price-image">
<img class="image" src="./assets/images/icons/computer-dark.png" alt="" />
</div>

<div class="price-title">Computer Reparatur</div>
<div class="price-subtext">Ab...</div>
<div class="price" style="color: #CA5098;">20.00€</div>
</div>
</div>
</div>
</div>
</div>

</div>
</section>

<section class="content-section">
<div class="container">

<div class="section-head text-center container-md">

<h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Warum uns wählen ?</h2>

<p data-inview-showup="showup-translate-left">Einige unserer Funktionen.</p>
</div>
<div class="row cols-md rows-lg text-center">
<div class="md-col-6">
<div class="row cols-md rows-lg">
<div class="sm-col-6">
<div class="feature feature-side text-left" data-inview-showup="showup-translate-up">
<div class="feature-icon"><i class="fas fa-rocket" aria-hidden="true"></i></div>
<div class="feature-title text-upper">Wir sind schnell.</div><br>
<div class="feature-text">Wir bieten schnelle Reparaturen, damit Sie Ihr Gerät so schnell wie möglich zurückbekommen.</div>
</div>
</div>
<div class="sm-col-6">
<div class="feature feature-side text-left" data-inview-showup="showup-translate-up">
<div class="feature-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></div>
<div class="feature-title text-upper">Keine Reparatur, keine Gebühr.</div>
<div class="feature-text" style="margin-top: -2px;">Unsere 30-tägige Garantie sorgt dafür, dass Sie mit Ihrer Reparatur vollkommen zufrieden sind.</div>
</div>
</div>
</div>
</div>
<div class="md-col-6">
<div class="row cols-md rows-lg">
<div class="sm-col-6">
<div class="feature feature-side text-left" data-inview-showup="showup-translate-up">
<div class="feature-icon"><i class="far fa-calendar-check" aria-hidden="true"></i></div>
<div class="feature-title text-upper">30 Tage Garantie.</div><br>
<div class="feature-text">Wenn wir Ihr Gerät nicht reparieren können, zahlen Sie nichts – ganz einfach!</div>
</div>
</div>
<div class="sm-col-6">
<div class="feature feature-side text-left" data-inview-showup="showup-translate-up">
<div class="feature-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
<div class="feature-title text-upper">Expertenpersonal.</div><br>
<div class="feature-text">Unser Team aus Experten sorgt dafür, dass Ihr Gerät von den besten Händen behandelt wird.</div>
</div>
</div>
</div>
</div>
</div>

</div>
</section>



</div>
<section class="with-bg solid-section">

<div class="fix-image-wrap" data-image-src="{{url('/Attachments/Home_Page/' .$information->img4)}}" data-parallax="scroll"></div>
<div class="theme-back inner-shadow"></div>
<div class="container text-center">

<div class="section-head text-center container-md">

<h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Serviceprozess</h2>

<p data-inview-showup="showup-translate-left">Ein einfacher und effektiver Weg, um Ihr Gerät reparieren zu lassen.</p>
</div>
<div class="service-steps text-upper" data-inview-showup="showup-scale">

<div class="step"><span class="step-number active">1</span>Beschädigtes Gerät</div>

<div class="step"><span class="step-number">2</span>Schicken Sie es uns</div>

<div class="step"><span class="step-number active">3</span>Schnelle Reparatur</div>

<div class="step"><span class="step-number">4</span>Schnelle Rückgabe</div>

</div>

</div>

</section>
<section class="muted-bg solid-section">
<div class="container">

<div class="section-head text-center container-md">

<h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Handys</h2>

<p data-inview-showup="showup-translate-left">Wir bieten die neuesten Smartphones auf dem Markt an. Entdecken Sie moderne Handys mit fortschrittlicher Technologie und innovativen Funktionen.</p>
</div>
<div class="row cols-md rows-md">


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Data backup &amp; recovery</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Laptop &amp; Mac Upgrade</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Repair Smartphone</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Tablet Repair</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Repair PC &amp; Laptop Hardware</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>

<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Network Solution</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>

</div>
<div class="text-center shift-xl">
<a class="btn text-upper" href="services.html" data-inview-showup="showup-translate-up"><i class="fas fa-th-large" aria-hidden="true"></i>&nbsp;&nbsp;Alle Handys anzeigen</a>
</div>

</div>
</section>

<section class="main-bg" data-inview-showup="showup-translate-up">
<div class="container">


<div class="contact-table only-xs-text-center">
<div class="contact-icon"><a href="{{$information->facebook_link}}" style="color: #FFFFFF" class="fab fa-facebook" aria-hidden="true"></a></div>
<div class="contact-icon"><a href="{{$information->instagram_link}}" style="color: #FFFFFF" class="fab fa-instagram" aria-hidden="true"></a></div>
<div class="contact-icon"><a href="{{$information->tiktok_link}}" style="color: #FFFFFF" class="fab fa-tiktok" aria-hidden="true"></a></div>
<div class="contact-content">
<div class="contact-title">Folgen Sie uns !</div>
<div class="text-justify only-xs-text-justify-center"> Bleiben Sie informiert und werden Sie Teil unserer Familie. Wir freuen uns, Sie bei uns zu haben !</div>
</div>
</div>

</div>
</section>

<section class="muted-bg solid-section">
<div class="container">

<div class="section-head text-center container-md">

<h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Dienstleistungen</h2>

<p data-inview-showup="showup-translate-left">Wir bieten ein umfassendes Angebot an Reparaturdiensten, die von einem erfahrenen und spezialisierten Team durchgeführt werden.</p>
</div>
<div class="row cols-md rows-md">


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Data backup &amp; recovery</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Laptop &amp; Mac Upgrade</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Repair Smartphone</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Tablet Repair</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Repair PC &amp; Laptop Hardware</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>


<div class="md-col-4 sm-col-6">
<div class="item" data-inview-showup="showup-translate-up">
<a href="service.html" class="block-link text-center">
<span class="image-wrap"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></span>
<span class="hover">
<span class="hover-show">
<span class="back"></span>
<span class="content"><i class="fas fa-search" aria-hidden="true"></i></span>
</span>
</span>
</a>
<div class="item-content">
<div class="item-title text-upper"><a href="service.html">Network Solution</a></div>
<div class="item-text">We working hard to build a reputation of customer satisfaction through technical excellence and friendly staff
</div>
<a href="service.html" class="btn btn-md btns-bordered pull-right text-upper">read more</a>
</div>
</div>
</div>

</div>
<div class="text-center shift-xl">
<a class="btn text-upper" href="services.html" data-inview-showup="showup-translate-up"><i class="fas fa-th-large" aria-hidden="true"></i>&nbsp;&nbsp;Alle Dienstleistungen anzeigen</a>
</div>

</div>
</section>

<section class="main-bg decorated-bg text-center tight solid-section">
<div class="container">


<div class="row cols-md rows-xl" data-inview-showup="showup-translate-up">
<div class="sm-col-3">
<div class="counter">
<div class="counter-title text-upper">Zufriedener Kunde</div>
<div class="counter-value" data-waypoint-counter="3720">3720</div>
</div>
</div>
<div class="sm-col-3">
<div class="counter">
<div class="counter-title text-upper">Abgeschlossene Projekte</div>
<div class="counter-value" data-waypoint-counter="4170">4170</div>
</div>
</div>
<div class="sm-col-3">
<div class="counter">
<div class="counter-title text-upper">Computer gewartet</div>
<div class="counter-value" data-waypoint-counter="2730">2730</div>
</div>
</div>
<div class="sm-col-3">
<div class="counter">
<div class="counter-title text-upper">Handy gewartet</div>
<div class="counter-value" data-waypoint-counter="1510">1510</div>
</div>
</div>
</div>

</div>
</section>
<section class="content-section">
<div class="container">

<div class="section-head text-center container-md">

<h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Was die Leute sagen</h2>

<p data-inview-showup="showup-translate-left">Echte Kundenbewertungen</p>
</div>
<div class="owl-carousel" data-inview-showup="showup-translate-up" data-owl-dots="true">
<div class="item">
<div class="simple-testimonial text-center">
<div class="tt-title">Great customer support</div>
<div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i></div>
<div class="tt-content">
<div class="tt-quote">&#8220;</div>
Thanks John, I was really pleased with Profix’s service. Would definitely recommend you and have alredy given out some of your business cards that were left with me. All the best for future succes.
</div>
<div class="tt-icon"><img src="./assets/images/icons/notebook-sm.png" alt=""></div>
<div class="pexx-tt-user-title">Michale John</div>
<div class="pexx-tt-user-subtitle">Co-Founder, InfoLabs</div>
</div>
</div>
<div class="item">
<div class="simple-testimonial text-center">
<div class="tt-title">Flexible services</div>
<div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i></div>
<div class="tt-content">
<div class="tt-quote">&#8220;</div>
Profix did great job with fixing my laptop for a good price. I recommend any body with laptop problems, they will give you excellent service to all his customers.
</div>
<div class="tt-icon"><img src="./assets/images/icons/computer-sm.png" alt=""></div>
<div class="pexx-tt-user-title">Merry Smith</div>
<div class="pexx-tt-user-subtitle">CFO, InfoTech</div>
</div>
</div>
<div class="item">
<div class="simple-testimonial text-center">
<div class="tt-title">Excellent team</div>
<div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i></div>
<div class="tt-content">
<div class="tt-quote">&#8220;</div>
Keep up the excellent work. Thank you so much for your help. This is simply unbelievable!
</div>
<div class="tt-icon"><img src="./assets/images/icons/printer-sm.png" alt=""></div>
<div class="pexx-tt-user-title">Michale John</div>
<div class="pexx-tt-user-subtitle">Co-Founder, InfoLabs</div>
</div>
</div>
<div class="item">
<div class="simple-testimonial text-center">
<div class="tt-title">Flexible services</div>
<div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i></div>
<div class="tt-content">
<div class="tt-quote">&#8220;</div>
Profix did great job with fixing my laptop for a good price. I recommend any body with laptop problems, they will give you excellent service to all his customers.
</div>
<div class="tt-icon"><img src="./assets/images/icons/mobile-sm.png" alt=""></div>
<div class="pexx-tt-user-title">Merry Smith</div>
<div class="pexx-tt-user-subtitle">CFO, InfoTech</div>
</div>
</div>
<div class="item">
<div class="simple-testimonial text-center">
<div class="tt-title">Great customer support</div>
<div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i></div>
<div class="tt-content">
<div class="tt-quote">&#8220;</div>
Thanks John, I was really pleased with Profix’s service. Would definitely recommend you and have alredy given out some of your business cards that were left with me. All the best for future succes.
</div>
<div class="tt-icon"><img src="./assets/images/icons/computer-sm.png" alt=""></div>
<div class="pexx-tt-user-title">Michale John</div>
<div class="pexx-tt-user-subtitle">Co-Founder, InfoLabs</div>
</div>
</div>
<div class="item">
<div class="simple-testimonial text-center">
<div class="tt-title">Excellent team</div>
<div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i></div>
<div class="tt-content">
<div class="tt-quote">&#8220;</div>
Keep up the excellent work. Thank you so much for your help. This is simply unbelievable!
</div>
<div class="tt-icon"><img src="./assets/images/icons/printer-sm.png" alt=""></div>
<div class="pexx-tt-user-title">Michale John</div>
<div class="pexx-tt-user-subtitle">Co-Founder, InfoLabs</div>
</div>
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
<div class="text-justify only-xs-text-justify-center">Holen Sie sich Antworten und Ratschläge von den Fachleuten im Bereich.</div>
</div>
<div class="contact-btn">
<a href="contact-us.html" class="btn btns-white text-upper">Kontaktiere Sie uns</a>
</div>
</div>

</div>
</section>
<section class="text-center content-section">
<div class="container">

<div class="section-head text-center container-md">

<h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">Wir sind autorisiert</h2>


</div>
<div class="owl-carousel" data-inview-showup="showup-translate-up" data-owl-responsive="2;3;4;5" data-owl-items="5">

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

<div class="item">
<a class="grayscale-link" href="#"><img class="image" src="http://via.placeholder.com/720x405" alt="" /></a>
</div>

</div>

</div>
</section>
<section class="map-section" data-inview-showup="showup-translate-right">


<div class="gmap" data-lat="-33.878897" data-lng="151.103737"></div>
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
<div class="block-cart collapse" data-block="cart" data-show-block-class="animation-scale-top-right" data-hide-block-class="animation-unscale-top-right">
<div class="cart-inner">
<a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
<h4 class="text-upper text-center">Your cart</h4>
<div class="items">
<div class="items collapse" data-block="cart" data-show-block-class="animation-scale-top-right" data-hide-block-class="animation-unscale-top-right">





<div class="shop-side-item cart-item">
<a href="#" class="remove"><i class="fas fa-times"></i></a>
<div class="item-side-image">
<a href="shop-item.html" class="item-image responsive-1by1"><img src="http://via.placeholder.com/500x500" alt="" /></a>
</div>
<div class="item-side">
<div class="item-title">


<a class="item-label-sm item-label-sale item-label" href="#">sale</a>


<a href="shop-item.html" class="content-link text-upper">USB 3.0 HUB</a>
</div>
<div class="item-quantity">Quantity - 1</div>
<div class="item-prices">
<div class="item-price">$67.05</div>

<div class="item-old-price">$102.5</div>

</div>
</div>
</div>




<div class="shop-side-item cart-item">
<a href="#" class="remove"><i class="fas fa-times"></i></a>
<div class="item-side-image">
<a href="shop-item.html" class="item-image responsive-1by1"><img src="http://via.placeholder.com/500x500" alt="" /></a>
</div>
<div class="item-side">
<div class="item-title">


<a class="item-label-sm item-label-new item-label" href="#">new</a>


<a href="shop-item.html" class="content-link text-upper">Cable Organizer</a>
</div>
<div class="item-quantity">Quantity - 1</div>
<div class="item-prices">
<div class="item-price">$15.25</div>

</div>
</div>
</div>




<div class="shop-side-item cart-item">
<a href="#" class="remove"><i class="fas fa-times"></i></a>
<div class="item-side-image">
<a href="shop-item.html" class="item-image responsive-1by1"><img src="http://via.placeholder.com/500x500" alt="" /></a>
</div>
<div class="item-side">
<div class="item-title">

<a href="shop-item.html" class="content-link text-upper">10" Octa Core Tablet</a>
</div>
<div class="item-quantity">Quantity - 1</div>
<div class="item-prices">
<div class="item-price">$145.99</div>

</div>
</div>
</div>

</div>

</div>
<div class="line-sides main-bg shift-lg"></div>
<div class="row out-md">
<div class="col-6 cart-price-title">Subtotal:</div>
<div class="col-6 text-right cart-price">$105.20</div>
</div>
<div class="line-sides main-bg offs-lg"></div>
<div class="clearfix">
<a href="./cart.html" class="btn text-upper btn-md btns-bordered pull-left">view cart</a>
<a href="./checkout.html" class="btn text-upper btn-md pull-right">checkout</a>
</div>
</div>
</div><a href="#" class="scroll-top disabled"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<div class="singlepage-block collapse alt-bg" data-block="search" data-show-block-class="animation-scale-top-right" data-hide-block-class="animation-unscale-top-right">
<a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
<div class="pos-v-center col-12">
<div class="container">
<form action="#">
<div class="row cols-md rows-md">
<div class="lg-col-9 md-col-8 sm-col-12">
<div class="field-group">

<div class="field-wrap">
<input class="field-control" name="search" placeholder="Search Tags" required="required" />




<span class="field-back"></span>

</div>


</div>
</div>
<div class="lg-col-3 md-col-4 sm-col-6">
<button class="btn btns-white-bordered text-upper" type="submit">
search
</button></div>
</div>
</form>
</div>
</div>
</div>
<div class="loader-block">



<div class="loader-back alt-bg"></div>

<div class="loader-image"><img class="image" src="./assets/images/parts/loader.gif" alt="" /></div>


</div>
<footer class="footer">
<div class="container only-xs-text-justify-center">
<div class="solid-section">
<div class="row cols-md">
<div class="sm-col-3">
<div class="footer-logo">
<img src="{{url('/assets/images/icons/phonephinity.png')}}" alt="Phone_Finity" />
</div>
<div class="footer-text sm-text-justify" style="margin-left: 12px;">Profix is a Premium PSD Template. Best choice for your online store. Let purchase it to enjoy now</div>
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
<div class="footer-copyrights text-center top-separator ins-md">&copy; <script>document.write(new Date().getFullYear());</script> <b>Loui Oklaa</b> Alle Rechte vorbehalten.</div>
</div>
</footer>




<!-- jQuery library -->
<script src="./assets/jquery/jquery-3.3.1.js"></script>








<!-- Paralax.js -->
<script src="./assets/parallax.js/parallax.js"></script>



<!-- FlexSlider -->
<script src="./assets/flexslider/jquery.flexslider-min.js"></script>



<!-- OwlCarousel2 -->
<script src="./assets/owlcarousel2/owl.carousel.min.js"></script>



<!-- Shuffle -->
<script src="./assets/shuffle/shuffle.min.js"></script>



<!-- Waypoints -->
<script src="./assets/waypoints/jquery.waypoints.min.js"></script>



<!-- Chosen -->
<script src="./assets/chosen/chosen.jquery.min.js"></script>




















<!-- jQuery UI custom - slider only -->
<script src="./assets/jquery-ui-custom/jquery-ui.min.js" type="text/javascript"></script>

<!-- Pentix scripts start -->

<script src="./assets/pentix/js/pentix.js" type="text/javascript"></script>

<!-- Pentix scripts end -->

<!-- Inits theme scripts -->

<script src="./assets/js/script.js" type="text/javascript"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADqmeC3KqUupDX0ztEBAAqI9W_J3kKVBc"></script>


</body>

</html>
