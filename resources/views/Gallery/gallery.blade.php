@extends('layouts.master')
@section('title')
    Galerie
@endsection
@section('contents')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            @if (session()->has('Add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Add') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session()->has('Edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Edit') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session()->has('Delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Delete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </strong>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">G</li>
                        <li class="list-inline-item">A</li>
                        <li class="list-inline-item">L</li>
                        <li class="list-inline-item">E</li>
                        <li class="list-inline-item">R</li>
                        <li class="list-inline-item">I</li>
                        <li class="list-inline-item">E</li>
                    </ul>
                    <div class="add-btn">
                        <button style="height: 30px" type="button"
                                class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded" href="#add_modal"
                                data-toggle="modal">Hinzufügen
                        </button>
                    </div>
                    <br>
                    <div class="showing shop-results-text">
                        Anzeigen von @if($projects->firstItem()==0)0 @else {{ $projects->firstItem() }} @endif bis @if($projects->lastItem()==0) 0 @else {{ $projects->lastItem() }} @endif von {{ $projects->total() }} gesamt
                    </div>
                    <div class="gallery">
                        <div class="row">
                            <?php $i = 0 ?>
                            @foreach($projects as $one)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="cc-porfolio-image img-raised card-body"
                                             data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="{{ asset('Attachments/Galerie/' . $one->media) }}">
                                                <figure class="cc-effect">
                                                        <?php $mediaExtensions = pathinfo("Attachments/Galerie/$one->media", PATHINFO_EXTENSION) ?>
                                                    @if(in_array($mediaExtensions, ['jpg', 'jpeg', 'png', 'gif']))
                                                        <img style="width: 100%; height: 300px; object-fit: cover;"
                                                             src="Attachments/Galerie/{{ $one->media }}" alt="Image"/>
                                                    @elseif(in_array($mediaExtensions, ['mp4', 'mkv', 'mov']))
                                                        <video controls
                                                               style="width: 100%; height: 300px; object-fit: cover;"
                                                               src="Attachments/Galerie/{{ $one->media }}"></video>
                                                    @endif
                                                    <figcaption>
                                                        <div class="h4">{{ $one->name }}</div>
                                                        <p>{{ $one->note }}</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <br>
                                        <div class="text-center" style="margin-bottom: 10px;">
                                            <button class="btn btn-sm btn-rounded btn-inverse-primary" href="#edit_modal" title="Edit"
                                                    data-id="{{ $one->id }}" data-name="{{ $one->name }}" data-note="{{ $one->note }}"
                                                    data-toggle="modal">Bearbeiten
                                            </button>
                                            <button class="btn btn-sm btn-rounded btn-inverse-danger" href="#delete_modal" title="Delete"
                                                    data-id="{{ $one->id }}" data-name="{{ $one->name }}" data-toggle="modal">Löschen
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center shift-lg paginator-container" data-inview-showup="showup-translate-up">
                            <div class="paginator">
                                {{-- Link to Previous Page --}}
                                @if ($projects->onFirstPage())
                                    <span class="previous disabled"><i class="fas fa-angle-left" aria-hidden="true"></i></span>
                                @else
                                    <a href="{{ $projects->previousPageUrl() }}" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
                                @endif

                                {{-- Loop through available pages --}}
                                @for ($i = 1; $i <= $projects->lastPage(); $i++)
                                    @if ($i === 1 || $i === $projects->lastPage() || abs($projects->currentPage() - $i) <= 1)
                                        {{-- Show current, first, last, and neighboring pages --}}
                                        @if ($i === $projects->currentPage())
                                            <span class="active">{{ $i }}</span>
                                        @else
                                            <a href="{{ $projects->url($i) }}">{{ $i }}</a>
                                        @endif
                                    @elseif ($i === 2 && $projects->currentPage() > 3)
                                        {{-- Show ellipsis after the first page --}}
                                        <span class="ellipsis">...</span>
                                    @elseif ($i === $projects->lastPage() - 1 && $projects->currentPage() < $projects->lastPage() - 2)
                                        {{-- Show ellipsis before the last page --}}
                                        <span class="ellipsis">...</span>
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

                        <!--Start Add Modal -->
                        <div class="modal fade" id="add_modal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Projekt Hinzufügen</h6>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('galerie.store')}}" method="post"
                                              enctype="multipart/form-data" autocomplete="off">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                                <label for="name" class="col-form-label">Projekt Name :</label>
                                                <input class="form-control" name="name" id="name" type="text"
                                                       style="color: #6C7293">
                                            </div>
                                            <div class="form-group">
                                                <label for="note">Beschreibung :</label>
                                                <textarea class="form-control" name="note" id="note" rows="3"
                                                          style="color: #6C7293"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Projekt Foto oder Video </label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="file" id="media" name="media" class="dropify"
                                                           accept=".jpg, .png, image/jpeg, image/png ,mp4 ,mkv ,mov"
                                                           data-height="40"/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-rounded btn-primary">Bestätigung
                                                </button>
                                                <button type="button" class="btn btn-rounded btn-danger"
                                                        data-dismiss="modal">Abbrechen
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Add Modal -->
                        {{--  Start Edit Modal --}}
                        <div class="modal fade" id="edit_modal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Projekt bearbeiten</h4>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="galerie/update" method="post" enctype="multipart/form-data"
                                              autocomplete="off">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Projekt Name :</label>
                                                    <input type="hidden" class="form-control" id="id" name="id">
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           style="color: #6C7293">
                                                </div>
                                                <div class="form-group">
                                                    <label for="note">Beschreibung :</label>
                                                    <textarea class="form-control" name="note" id="note" rows="3"
                                                              style="color: #6C7293"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Projekt Foto oder Video </label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="file" id="media" name="media" class="dropify"
                                                               accept=".jpg, .png, image/jpeg, image/png ,mp4 ,mkv ,mov"
                                                               data-height="40"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                        class="btn btn-md btn-outline-primary btn-rounded ">
                                                    Aktualisieren
                                                </button>
                                                <button type="button"
                                                        class="btn btn-md btn-outline-secondary btn-rounded"
                                                        data-dismiss="modal">Abbrechen
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  End Edit Modal --}}
                        {{--  Start Delete Modal  --}}
                        <div class="modal fade" id="delete_modal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Sind Sie sicher, dass Sie dieses Projekt löschen möchten
                                            ?</h4>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="galerie/destroy" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Projekt Name :</label>
                                                    <input type="hidden" class="form-control" id="id" name="id">
                                                    <input class="form-control" name="name" id="name" type="text"
                                                           style="color: #6C7293; background: #2A3038" readonly>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                        class="btn btn-md btn-outline-danger btn-rounded ">Löschen
                                                </button>
                                                <button type="button"
                                                        class="btn btn-md btn-outline-secondary btn-rounded"
                                                        data-dismiss="modal">Abbrechen
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  End Delete Modal  --}}
                    </div>
                </div>
            </div>
        </div>
        <style>
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
        @section('JS')
            {{--  Edit Modal Script  --}}
            <script>
                $('#edit_modal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var note = button.data('note')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                    modal.find('.modal-body #note').val(note);
                })
            </script>
            {{--  Delete Modal Script  --}}
            <script>
                $('#delete_modal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                })
            </script>
@endsection
