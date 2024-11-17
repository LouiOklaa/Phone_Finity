@extends('layouts.master')
@section('title')
    Alle Nachrichten
@endsection
@section('CSS')
    <style>
    .preview-item:hover {
        background-color: #2B2F3A;
        cursor: pointer;
        transition: background-color 0.3s ease;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 20px;
    }

    .paginator-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .paginator {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.8rem;
    }
    .paginator a, .paginator span {
        padding: 6px 10px;
        margin: 0 2px;
        border-radius: 5px;
        text-decoration: none;
        color: #6C7293;
        transition: all 0.3s;
    }
    .paginator a:hover {
        background-color: #007bff;
        color: white;
    }
    .paginator .active {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }
    .paginator .disabled {
        color: #ccc;
        cursor: not-allowed;
    }
    .paginator .previous,
    .paginator .next {
        color: #007BFF;
        font-size: 1rem;
        padding: 6px 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
    }
    .paginator .previous:after {
        content: "<";
        font-weight: bold;
    }
    .paginator .next:after {
        content: ">";
        font-weight: bold;
    }
    .paginator .previous:hover,
    .paginator .next:hover {
        color: white;
        background-color: #007bff;
    }
    .paginator .ellipsis {
        padding: 6px 8px;
        color: #6C7293;
        font-weight: bold;
    }
    .paginator .ellipsis {
        padding: 6px 8px;
        color: #6C7293;
        font-weight: bold;
        display: inline-block;
    }
    </style>
@endsection
@section('contents')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <ul style="color: #00c292" class="list-inline text-center">
                        <li class="list-inline-item">A</li>
                        <li class="list-inline-item">L</li>
                        <li class="list-inline-item">L</li>
                        <li class="list-inline-item">E</li>
                        <li class="list-inline-item"> </li>
                        <li class="list-inline-item"> </li>
                        <li class="list-inline-item">N</li>
                        <li class="list-inline-item">A</li>
                        <li class="list-inline-item">C</li>
                        <li class="list-inline-item">H</li>
                        <li class="list-inline-item">R</li>
                        <li class="list-inline-item">I</li>
                        <li class="list-inline-item">C</li>
                        <li class="list-inline-item">T</li>
                        <li class="list-inline-item">E</li>
                        <li class="list-inline-item">N</li>
                    </ul>
                    <div class="card">
                        <div class="card-body">
                            <div class="preview-list">
                                @foreach($latestEmails as $one)
                                    <a @can('Nachricht') href="{{route('show_message' , $one->id)}}" @endcan class="preview-item border-bottom text-decoration-none" style="color: inherit;">
                                        <div class="preview-thumbnail">
                                            <img src="{{ URL::asset('assets/images/faces/face2.jpg') }}" alt="image" class="rounded-circle"/>
                                        </div>
                                        <div class="preview-item-content d-flex flex-grow">
                                            <div class="flex-grow">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                    <h6 class="preview-subject">{{$one->name}}</h6>
                                                    <p class="text-muted text-small">{{$one->sent_at_formatted}}</p>
                                                </div>
                                                <p class="text-muted">{{$one->email}}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-center shift-lg paginator-container" data-inview-showup="showup-translate-up">
                                <div class="paginator">
                                    {{-- Link to Previous Page --}}
                                    @if ($latestEmails->onFirstPage())
                                        <span class="previous disabled"><i class="fas fa-angle-left" aria-hidden="true"></i></span>
                                    @else
                                        <a href="{{ $latestEmails->previousPageUrl() }}" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
                                    @endif

                                    {{-- Loop through available pages --}}
                                    @for ($i = 1; $i <= $latestEmails->lastPage(); $i++)
                                        @if ($i === 1 || $i === $latestEmails->lastPage() || abs($latestEmails->currentPage() - $i) <= 1)
                                            {{-- Show current, first, last, and neighboring pages --}}
                                            @if ($i === $latestEmails->currentPage())
                                                <span class="active">{{ $i }}</span>
                                            @else
                                                <a href="{{ $latestEmails->url($i) }}">{{ $i }}</a>
                                            @endif
                                        @elseif ($i === 2 && $latestEmails->currentPage() > 3)
                                            {{-- Show ellipsis after the first page --}}
                                            <span class="ellipsis">...</span>
                                        @elseif ($i === $latestEmails->lastPage() - 1 && $latestEmails->currentPage() < $latestEmails->lastPage() - 2)
                                            {{-- Show ellipsis before the last page --}}
                                            <span class="ellipsis">...</span>
                                        @endif
                                    @endfor

                                    {{-- Link to Next Page --}}
                                    @if ($latestEmails->hasMorePages())
                                        <a href="{{ $latestEmails->nextPageUrl() }}" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                                    @else
                                        <span class="next disabled"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

