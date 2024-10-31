@extends('layouts.master_home_page')
@section('title')
    Galerie
@endsection
@section('current_page')
    Galerie
@endsection
@section('contents')
    <section class="content-section">
        <div class="container">
            <div class="showing shop-results-text">
                Anzeigen von @if($projects->firstItem()==0)0 @else {{ $projects->firstItem() }} @endif bis @if($projects->lastItem()==0) 0 @else {{ $projects->lastItem() }} @endif von {{ $projects->total() }} gesamt
            </div>
            <div class="shuffle-js">
                <div class="row cols-tiny rows-tiny shuffle-items">
                    @foreach($projects as $one)
                      <?php $mediaExtensions = pathinfo("Attachments/Galerie/$one->media", PATHINFO_EXTENSION) ?>
                        <div class="shuffle-item col-12 md-col-4 sm-col-6">
                            <a href="{{asset( 'Attachments/Galerie/' . $one->media)}}">
                                <div class="item muted-bg" data-inview-showup="showup-scale">
                                    <div class="block-link">
                                        <div class="image-wrap">
                                            @if(in_array($mediaExtensions , ['jpg' , 'jpeg' , 'png' , 'gif']))
                                             <img class="image" src="Attachments/Galerie/{{$one->media}}" alt=""/>
                                            @elseif(in_array($mediaExtensions , ['mp4' , 'mkv' , 'mov']))
                                                <video class="image" src="Attachments/Galerie/{{$one->media}}" alt=""></video>
                                            @endif
                                        </div>
                                        <div class="hover">
                                            <div class="hover-lines">
                                                <div class="back"></div>
                                                <div class="line-content">
                                                    <h5 class="text-white">{{$one->name}}</h5>
                                                    <p>{{$one->note}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
        <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
            <div class="paginator">
                {{-- Link to Previous Page --}}
                @if ($projects->onFirstPage())
                    <span class="previous disabled"><i class="fas fa-angle-left" aria-hidden="true"></i></span>
                @else
                    <a href="{{ $projects->previousPageUrl() }}" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
                @endif

                {{-- Loop through available pages --}}
                @for ($i = 1; $i <= $projects->lastPage(); $i++)
                    @if ($i === $projects->currentPage())
                        <span class="active">{{ $i }}</span>
                    @else
                        <a href="{{ $projects->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Link to Next Page --}}
                @if ($projects->hasMorePages())
                    <a href="{{ $projects->nextPageUrl() }}" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                @else
                    <span class="next disabled"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                @endif
            </div>
        </div>
    </section>
    <div class="loader-block">
        <div class="loader-back alt-bg"></div>
        <div class="loader-image"><img class="image" src="./assets/images/parts/loader.gif" alt=""/></div>
    </div>
@endsection
