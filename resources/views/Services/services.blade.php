@extends('master')
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
                            <ul class="list-inline text-center">
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
                            </ul>
                            <div class="add-btn" >
                                <button style="height: 30px" type="button" class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded" href="#add_modal" data-toggle="modal">Dienstleistungen Hinzufügen</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Name</th>
                                        <th>Abschnitt</th>
                                        <th>Preis</th>
                                        <th>Beschreibung</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0?>
                                    @foreach($services as $one)
                                        <?php $i++?>
                                            <tr>
                                                <td> {{$i}} </td>
                                                <td>{{$one->name}}</td>
                                                <td>{{$one->section_name}}</td>
                                                <td>{{$one->price}} €</td>
                                                <td>{{$one->note}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-rounded btn-inverse-primary" href="#edit_modal" title="Edit" data-id="{{$one->id}}" data-name="{{$one->name}}"  data-section_name="{{$one->section_name}}" data-price="{{$one->price}}" data-note="{{$one->note}}"  data-toggle="modal">Bearbeitens</button>
                                                    <button class="btn btn-sm btn-rounded btn-inverse-danger" title="Delete" href="#delete_modal" data-id="{{$one->id}}" data-name="{{$one->name}}" data-toggle="modal">Löschen</button>
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('dienstleistungen.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="name" class="col-form-label">Dienstleistungen Name :</label>
                                        <input class="form-control" name="name" id="name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="section_id">Abschnitt :</label>
                                        <select name="section_id" id="section_id" class="form-control select2">
                                            <option value="#" selected disabled>-- Abschnitt auswählen --</option>
                                            @foreach ($sections as $one)
                                                <option value="{{ $one->id }}">{{ $one->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Preis :</label>
                                        <input class="form-control" name="price" id="price" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Beschreibung :</label>
                                        <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Dienstleistungen Foto </label>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" id="image" name="image" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="40" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-rounded btn-primary">Bestätigung</button>
                                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Abbrechen</button>
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
                                <h4 class="modal-title">Dienstleistungen bearbeiten</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="dienstleistungen/update" method="post" enctype="multipart/form-data" autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Dienstleistungen Name :</label>
                                            <input  type="hidden" class="form-control" id="id" name="id">
                                            <input type="text" class="form-control" id="name" name="name" style="color: #6C7293" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="section_name">Abschnitt :</label>
                                            <select name="section_name" id="section_name" class="form-control">
                                                @foreach ($sections as $one)
                                                    <option> {{$one->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Preis :</label>
                                            <input class="form-control" name="price" id="price" type="text" style="color: #6C7293" required>
                                        </div>
                                       <div class="form-group">
                                            <label for="note">Beschreibung :</label>
                                            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Dienstleistungen Foto </label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" id="image" name="image" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="40" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-md btn-outline-primary btn-rounded ">Aktualisieren</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary btn-rounded" data-dismiss="modal">Abbrechen</button>
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
                                <h4 class="modal-title">Sind Sie sicher, dass Sie dieses Dienstleistungen löschen möchten ?</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="dienstleistungen/destroy" method="post" >
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="company_name">Dienstleistungen Name</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input class="form-control" name="name" id="name" type="text" style="color: #6C7293; background: #2A3038"  readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-md btn-outline-danger btn-rounded ">Löschen</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary btn-rounded" data-dismiss="modal">Abbrechen</button>
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
        $('#edit_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var section_name = button.data('section_name')
            var price = button.data('price')
            var note = button.data('note')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #note').val(note);
        })
    </script>
            {{--  Delete Modal Script  --}}
            <script>
                $('#delete_modal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                })
            </script>
@endsection
