@extends('layouts.master_home_page')
@section('title')
    @if(request()->routeIs('all_mobiles'))
        Alle Handys
    @else
        Handys
    @endif
@endsection
@section('current_page')
    @if(request()->routeIs('all_mobiles'))
        Alle Handys
    @else
        Handys
    @endif
@endsection
@section('contents')
    <div class="clearfix container">
        <div class="page-content">
            @if(count($handys) !== 0)
                <section class="content-section">
                    <form method="post" action="{{ route('sort_all_mobiles') }}" id="sortForm">
                        @csrf
                        <div class="row">
                            <div class="sm-col-6 md-col-4">
                                <div class="field-group shop-line-field chosen-field">
                                    <label>Sortieren nach</label>
                                    <div class="field-wrap">
                                        <select class="field-control" name="sort" id="sort" onchange="document.getElementById('sortForm').submit();">
                                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Neueste</option>
                                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Älteste</option>
                                            <option value="price1" {{ request('sort') == 'price1' ? 'selected' : '' }}>Niedrigster Preis</option>
                                            <option value="price2" {{ request('sort') == 'price2' ? 'selected' : '' }}>Höchster Preis</option>
                                        </select>
                                        <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                                        <span class="field-back"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="sm-col-6 md-col-4">
                                <div class="field-group shop-line-field chosen-field">
                                    <label>show</label>
                                    <div class="field-wrap">
                                        <select class="field-control" name="show" selected="selected">
                                            <option name="show">4</option>
                                            <option name="show" value="1" selected="selected">8</option>
                                            <option name="show" value="2">10</option>
                                            <option name="show" value="3">20</option>
                                        </select>
                                        <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                                        <span class="field-back"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="sm-col-12 md-col-4 md-text-right shop-results-text">
                                Showing 9 to 16 of 20 total
                            </div>
                        </div>
                    </form>
                    <div class="row cols-md rows-md">
                        @foreach($handys as $one)
                            <div class="md-col-4">
                                <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
                                    <div class="item-back"></div>
                                    <a href="{{asset( 'Attachments/Handys/' . $one->image)}}"
                                       class="item-image responsive-1by1"><img
                                            src="{{url('/Attachments/Handys/' .$one->image)}}" alt=""/></a>
                                    <div class="item-content shift-md">
                                        <div class="item-textes">
                                            <div class="item-title text-upper hover"><i style="font-style: normal; font-size: 18px;" class="content-link">{{$one->name}}</i>
                                            </div>
                                        </div>
                                        <div class="item-prices">
                                            <div class="item-price" style="color: #CA5098; ">{{$one->preis}}€</div>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Zustand : </b><b>{{$one->status}}</b></div>
                                        <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Hersteller : </b><b>{{$one->section_name}}</b></div>
                                        <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Spezifikationen : </b><b>{{$one->note}}</b></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1>Keine zurzeit</h1>
                    @endif
                </div>

                <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
                    <div class="paginator">
                        <a href="#" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
                        <span class="active">2</span>
                        <a href="#">3</a>
                        <span>...</span>
                        <a href="#">12</a>
                        <a href="#" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>


            </section>
        </div>
    </div>
    <div class="block-cart collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
         data-hide-block-class="animation-unscale-top-right">
        <div class="cart-inner">
            <a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
            <h4 class="text-upper text-center">Your cart</h4>
            <div class="items">
                <div class="items collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
                     data-hide-block-class="animation-unscale-top-right">


                    <div class="shop-side-item cart-item">
                        <a href="#" class="remove"><i class="fas fa-times"></i></a>
                        <div class="item-side-image">
                            <a href="shop-item.html" class="item-image responsive-1by1"><img
                                    src="http://via.placeholder.com/500x500" alt=""/></a>
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
                            <a href="shop-item.html" class="item-image responsive-1by1"><img
                                    src="http://via.placeholder.com/500x500" alt=""/></a>
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
                            <a href="shop-item.html" class="item-image responsive-1by1"><img
                                    src="http://via.placeholder.com/500x500" alt=""/></a>
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
    <div class="singlepage-block collapse alt-bg" data-block="search" data-show-block-class="animation-scale-top-right"
         data-hide-block-class="animation-unscale-top-right">
        <a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i></a>
        <div class="pos-v-center col-12">
            <div class="container">
                <form action="#">
                    <div class="row cols-md rows-md">
                        <div class="lg-col-9 md-col-8 sm-col-12">
                            <div class="field-group">

                                <div class="field-wrap">
                                    <input class="field-control" name="search" placeholder="Search Tags"
                                           required="required"/>


                                    <span class="field-back"></span>

                                </div>


                            </div>
                        </div>
                        <div class="lg-col-3 md-col-4 sm-col-6">
                            <button class="btn btns-white-bordered text-upper" type="submit">
                                search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="loader-block">


        <div class="loader-back alt-bg"></div>

        <div class="loader-image"><img class="image" src="./assets/images/parts/loader.gif" alt=""/></div>


    </div>
@endsection
