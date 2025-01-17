@extends('layouts.master')
@section('title')
    Dienste Kategorien
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
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <ul style="color: #00c292" class="list-inline text-center">
                                <li class="list-inline-item">D</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">S</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">S</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">U</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">G</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item">K</li>
                                <li class="list-inline-item">A</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">G</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                            </ul>
                            @can('DienstKategorienHinzufügen')
                            <div class="add-btn">
                                <button style="height: 30px" type="button"
                                        class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded"
                                        href="#add_modal" data-toggle="modal">Kategorie Hinzufügen
                                </button>
                            </div>
                            @endcan
                            <div class="row justify-content-between align-items-center mt-3">
                                <div class="col-md-6">
                                    <input id="search-input" type="text" class="form-control text-muted" placeholder="Suchen..."
                                           style="width: 200px; height: 30px; font-size: 14px; border-radius: 15px;">
                                </div>
                                <div class=" col-md-6 text-muted text-right" style="font-size: 14px">
                                    Anzeigen von @if($sections->firstItem()==0)0 @else {{ $sections->firstItem() }} @endif
                                    bis @if($sections->lastItem()==0) 0 @else {{ $sections->lastItem() }} @endif
                                    von {{ $sections->total() }} gesamt
                                </div>
                            </div>
                            <div id="order-listing" class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Kategorie Name</th>
                                        <th>Beschreibung</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0 ?>
                                    @foreach($sections as $one)
                                            <?php $i++ ?>
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td>{{$one->name}}</td>
                                            <td>{{$one->note}}</td>
                                            <td>
                                                @can('DienstKategorienBearbeite')
                                                <button class="btn btn-sm btn-rounded btn-inverse-primary"
                                                        href="#edit_modal" title="Edit" data-id="{{$one->id}}"
                                                        data-name="{{$one->name}}" data-note="{{$one->note}}"
                                                        data-toggle="modal">Bearbeiten
                                                </button>
                                                @endcan
                                                @can('DienstKategorienLöschen')
                                                <button class="btn btn-sm btn-rounded btn-inverse-danger" title="Delete"
                                                        href="#delete_modal" data-id="{{$one->id}}"
                                                        data-name="{{$one->name}}" data-toggle="modal">Löschen
                                                </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center shift-lg paginator-container" data-inview-showup="showup-translate-up">
                                <div class="paginator">
                                    {{-- Link to Previous Page --}}
                                    @if ($sections->onFirstPage())
                                        <span class="previous disabled"><i class="fas fa-angle-left" aria-hidden="true"></i></span>
                                    @else
                                        <a href="{{ $sections->previousPageUrl() }}" class="previous"><i class="fas fa-angle-left" aria-hidden="true"></i></a>
                                    @endif

                                    {{-- Loop through available pages --}}
                                    @for ($i = 1; $i <= $sections->lastPage(); $i++)
                                        @if ($i === 1 || $i === $sections->lastPage() || abs($sections->currentPage() - $i) <= 1)
                                            {{-- Show current, first, last, and neighboring pages --}}
                                            @if ($i === $sections->currentPage())
                                                <span class="active">{{ $i }}</span>
                                            @else
                                                <a href="{{ $sections->url($i) }}">{{ $i }}</a>
                                            @endif
                                        @elseif ($i === 2 && $sections->currentPage() > 3)
                                            {{-- Show ellipsis after the first page --}}
                                            <span class="ellipsis">...</span>
                                        @elseif ($i === $sections->lastPage() - 1 && $sections->currentPage() < $sections->lastPage() - 2)
                                            {{-- Show ellipsis before the last page --}}
                                            <span class="ellipsis">...</span>
                                        @endif
                                    @endfor

                                    {{-- Link to Next Page --}}
                                    @if ($sections->hasMorePages())
                                        <a href="{{ $sections->nextPageUrl() }}" class="next"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                                    @else
                                        <span class="next disabled"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Start Add Modal -->
                <div class="modal fade" id="add_modal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Kategorie Hinzufügen</h6>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('dienste_kategorien.store')}}" method="post"
                                      autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="name" class="col-form-label">Kategorie Name :</label>
                                        <input class="form-control text-muted" name="name" id="name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Beschreibung :</label>
                                        <textarea class="form-control text-muted" name="note" id="note" rows="3"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-rounded btn-outline-primary">Bestätigung</button>
                                        <button type="button" class="btn btn-rounded btn-outline-secondary" data-dismiss="modal">
                                            Abbrechen
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
                                <h4 class="modal-title">Kategorie bearbeiten</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="dienste_kategorien/update" method="post" autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Kategorie Name</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input type="text" class="form-control text-muted" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Beschreibung</label>
                                            <textarea class="form-control text-muted" id="note" name="note" rows="4"
                                                      style="height:75px"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-md btn-outline-primary btn-rounded ">
                                            Aktualisieren
                                        </button>
                                        <button type="button" class="btn btn-md btn-outline-secondary btn-rounded"
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
                                <h4 class="modal-title">Sind Sie sicher, dass Sie diesen Kategorie löschen möchten
                                    ?</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="dienste_kategorien/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="company_name">Kategorie Name</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input class="form-control text-muted" name="name" id="name" type="text"
                                                   style="background: #2A3038" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-md btn-outline-danger btn-rounded ">
                                            Löschen
                                        </button>
                                        <button type="button" class="btn btn-md btn-outline-secondary btn-rounded"
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

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
