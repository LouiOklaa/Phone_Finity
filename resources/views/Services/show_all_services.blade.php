@extends('layouts.master_home_page')
@section('title')
    Alle Dienstleistungen
@endsection
@section('current_page')
    Alle Dienstleistungen
@endsection
@section('contents')
    <div class="clearfix container">
        <div class="page-content">
            <section class="content-section">
                <form method="post" action="{{ route('sort_all_services') }}" id="sortForm" onsubmit="return false;">
                    @csrf
                    <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
                    <div class="row">
                        <div class="sm-col-6 md-col-4">
                            <div class="field-group shop-line-field chosen-field">
                                <label>Sortieren nach</label>
                                <div class="field-wrap">
                                    <select class="field-control shop-results-text2" name="sort5" id="sort5"
                                            onchange="handleSortChange()">
                                        <option value="" disabled selected>Filter</option>
                                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name
                                        </option>
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                            Neueste
                                        </option>
                                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                            Älteste
                                        </option>
                                        <option value="price1" {{ request('sort') == 'price1' ? 'selected' : '' }}>
                                            Niedrigster Preis
                                        </option>
                                        <option value="price2" {{ request('sort') == 'price2' ? 'selected' : '' }}>
                                            Höchster Preis
                                        </option>
                                    </select>
                                    <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                                    <span class="field-back"></span>
                                </div>
                            </div>
                        </div>
                        <div class="showing shop-results-text">
                            Anzeigen von @if($services->firstItem()==0)
                                0
                            @else
                                {{ $services->firstItem() }}
                            @endif bis @if($services->lastItem()==0)
                                0
                            @else
                                {{ $services->lastItem() }}
                            @endif von {{ $services->total() }} gesamt
                        </div>
                    </div>
                </form>
                <div class="row cols-md rows-md">
                    @if(count($services) !== 0)
                        @include('Services.partials_services_list')
                    @else
                        <div class="text-center" style="margin-top: 30px;">
                            <h3>Derzeit sind keine Dienstleistungen 😞</h3>
                        </div>
                    @endif
                </div>
                <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
                    <div class="paginator">
                        {{-- Link to Previous Page --}}
                        @if ($services->onFirstPage())
                            <span class="previous disabled"><i class="fas fa-angle-left" aria-hidden="true"></i></span>
                        @else
                            <a href="{{ $services->previousPageUrl() }}" class="previous"><i class="fas fa-angle-left"
                                                                                             aria-hidden="true"></i></a>
                        @endif

                        {{-- Loop through available pages --}}
                        @for ($i = 1; $i <= $services->lastPage(); $i++)
                            @if ($i === $services->currentPage())
                                <span class="active">{{ $i }}</span>
                            @else
                                <a href="{{ $services->url($i) }}">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Link to Next Page --}}
                        @if ($services->hasMorePages())
                            <a href="{{ $services->nextPageUrl() }}" class="next"><i class="fas fa-angle-right"
                                                                                     aria-hidden="true"></i></a>
                        @else
                            <span class="next disabled"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="loader-block">
        <div class="loader-back alt-bg"></div>
        <div class="loader-image"><img class="image" src="./assets/images/parts/loader.gif" alt=""/></div>
    </div>
@endsection
