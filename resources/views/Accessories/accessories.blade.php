@extends('layouts.master')
@section('title')
    Zubehör
@endsection
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('Add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>&nbsp &nbsp &nbsp &nbsp{{ session()->get('Add') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('Edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>&nbsp &nbsp &nbsp &nbsp{{ session()->get('Edit') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('Delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>&nbsp &nbsp &nbsp &nbsp{{ session()->get('Delete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <ul style="color: #00c292" class="list-inline text-center">
                                <li class="list-inline-item">Z</li>
                                <li class="list-inline-item">U</li>
                                <li class="list-inline-item">B</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">H</li>
                                <li class="list-inline-item">Ö</li>
                                <li class="list-inline-item">R</li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                @can('ExportExcel')
                                    <a href="{{route('export_accessories' , 2)}}"
                                       style="width: 160px; height: 30px; margin-right: 10px; text-align: center"
                                       type="button" class="btn btn-inverse-success btn-rounded">Export Excel</a>
                                @endcan
                                @can('HandysZubehörHinzufügen')
                                    <button style="height: 30px" type="button"
                                            class="add-btn btn btn-inverse-primary btn-fw embed-responsive btn-rounded"
                                            href="#add_modal" data-toggle="modal">Produkt Hinzufügen
                                    </button>
                                @endcan
                            </div>
                            <div class="row justify-content-between align-items-center mt-3">
                                <div class="col-md-6">
                                    <input id="search-input" type="text" class="form-control text-muted"
                                           placeholder="Suchen..."
                                           style="width: 200px; height: 30px; font-size: 14px; border-radius: 15px;">
                                </div>
                                <div class=" col-md-6 text-muted text-right" style="font-size: 14px">
                                    Anzeigen von @if($accessories->firstItem()==0)
                                        0
                                    @else
                                        {{ $accessories->firstItem() }}
                                    @endif
                                    bis @if($accessories->lastItem()==0)
                                        0
                                    @else
                                        {{ $accessories->lastItem() }}
                                    @endif
                                    von {{ $accessories->total() }} gesamt
                                </div>
                            </div>
                            <div id="order-listing" class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Name</th>
                                        <th>Kategorie</th>
                                        <th>Marke</th>
                                        <th>Preis</th>
                                        <th>Beschreibung</th>
                                        <th>Foto</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                    @foreach($accessories as $one)
                                            <?php $i++ ?>
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td>{{$one->name}}</td>
                                            <td>{{$one->section_name}}</td>
                                            <td>{{$one->brand}}</td>
                                            <td>{{$one->price}} €</td>
                                            @if($one->note == NULL)
                                                <td>---</td>
                                            @else
                                                <td>{{$one->note}}</td>
                                            @endif
                                            <td><a href="{{asset( 'Attachments/Accessories/' . $one->image)}}"><img
                                                        src="Attachments/Accessories/{{$one->image}}"
                                                        style="height:30px; width:50px; border-radius: 0;"></a></td>
                                            <td>
                                                @can('HandysZubehörBearbeiten')
                                                    <button class="btn btn-sm btn-rounded btn-inverse-primary"
                                                            href="#edit_modal" title="Edit" data-id="{{$one->id}}"
                                                            data-name="{{$one->name}}"
                                                            data-section_name="{{$one->section_name}}"
                                                            data-brand="{{$one->brand}}" data-price="{{$one->price}}"
                                                            data-note="{{$one->note}}" data-toggle="modal">Bearbeiten
                                                    </button>
                                                @endcan
                                                @can('HandysZubehörLöschen')
                                                    <button class="btn btn-sm btn-rounded btn-inverse-danger"
                                                            title="Delete"
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
                            <div class="text-center shift-lg paginator-container"
                                 data-inview-showup="showup-translate-up">
                                <div class="paginator">
                                    {{-- Link to Previous Page --}}
                                    @if ($accessories->onFirstPage())
                                        <span class="previous disabled"><i class="fas fa-angle-left"
                                                                           aria-hidden="true"></i></span>
                                    @else
                                        <a href="{{ $accessories->previousPageUrl() }}" class="previous"><i
                                                class="fas fa-angle-left" aria-hidden="true"></i></a>
                                    @endif

                                    {{-- Loop through available pages --}}
                                    @for ($i = 1; $i <= $accessories->lastPage(); $i++)
                                        @if ($i === 1 || $i === $accessories->lastPage() || abs($accessories->currentPage() - $i) <= 1)
                                            {{-- Show current, first, last, and neighboring pages --}}
                                            @if ($i === $accessories->currentPage())
                                                <span class="active">{{ $i }}</span>
                                            @else
                                                <a href="{{ $accessories->url($i) }}">{{ $i }}</a>
                                            @endif
                                        @elseif ($i === 2 && $accessories->currentPage() > 3)
                                            {{-- Show ellipsis after the first page --}}
                                            <span class="ellipsis">...</span>
                                        @elseif ($i === $accessories->lastPage() - 1 && $accessories->currentPage() < $accessories->lastPage() - 2)
                                            {{-- Show ellipsis before the last page --}}
                                            <span class="ellipsis">...</span>
                                        @endif
                                    @endfor

                                    {{-- Link to Next Page --}}
                                    @if ($accessories->hasMorePages())
                                        <a href="{{ $accessories->nextPageUrl() }}" class="next"><i
                                                class="fas fa-angle-right" aria-hidden="true"></i></a>
                                    @else
                                        <span class="next disabled"><i class="fas fa-angle-right"
                                                                       aria-hidden="true"></i></span>
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
                                <h6 class="modal-title">Zubehör Hinzufügen</h6>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('zubehör.store')}}" method="post" enctype="multipart/form-data"
                                      autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="name" class="col-form-label">Produkt Name :</label>
                                        <input class="form-control text-muted" name="name" id="name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="section_id">Kategorie :</label>
                                        <select name="section_id" id="section_id"
                                                class="form-control text-muted select2">
                                            <option value="#" selected disabled>-- Kategorie auswählen --</option>
                                            @foreach ($sections as $one)
                                                <option value="{{ $one->id }}">{{ $one->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="section_id">Marke :</label>
                                        <select name="brand" id="brand" class="form-control text-muted select2">
                                            <option value="#" selected disabled>-- Marke auswählen --</option>
                                            @foreach ($brand as $one)
                                                <option value="{{ $one }}">{{ $one }}</option>
                                            @endforeach
                                            <option value="Andere">Andere</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Preis :</label>
                                        <input class="form-control text-muted" name="price" id="price" type="number">
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Beschreibung :</label>
                                        <textarea class="form-control text-muted" name="note" id="note"
                                                  rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Zubehör Foto </label>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" id="image" name="image" class="dropify"
                                                   accept=".jpg, .png, image/jpeg, image/png" data-height="40"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-rounded btn-outline-primary">Bestätigung
                                        </button>
                                        <button type="button" class="btn btn-rounded btn-outline-secondary"
                                                data-dismiss="modal">
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
                                <h4 class="modal-title">Produkt bearbeiten</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="zubehör/update" method="post" enctype="multipart/form-data"
                                      autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Produkt Name :</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input type="text" class="form-control text-muted" id="name" name="name"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="section_name">Kategorie :</label>
                                            <select name="section_name" id="section_name"
                                                    class="form-control text-muted">
                                                @foreach ($sections as $one)
                                                    <option> {{$one->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="brand">Marke :</label>
                                            <select name="brand" id="brand" class="form-control text-muted">
                                                @foreach ($brand as $one)
                                                    <option> {{$one}} </option>
                                                @endforeach
                                                <option value="Andere">Andere</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Preis :</label>
                                            <input class="form-control text-muted" name="price" id="price" type="number"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Beschreibung :</label>
                                            <textarea class="form-control text-muted" name="note" id="note"
                                                      rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Handy Foto </label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" id="image" name="image" class="dropify"
                                                       accept=".jpg, .png, image/jpeg, image/png" data-height="40"/>
                                            </div>
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
                                <h4 class="modal-title">Sind Sie sicher, dass Sie dieses Produkt löschen möchten ?</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="zubehör/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="company_name">Produkt Name</label>
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
                    var section_name = button.data('section_name')
                    var brand = button.data('brand')
                    var price = button.data('price')
                    var note = button.data('note')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                    modal.find('.modal-body #section_name').val(section_name);
                    modal.find('.modal-body #brand').val(brand);
                    modal.find('.modal-body #price').val(price);
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
