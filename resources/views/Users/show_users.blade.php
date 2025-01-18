@extends('layouts.master')
@section('title')
    Benutzer
@endsection
@section('CSS')
    <style>

        .dot-label {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .blink {
            animation: blink-animation 1s infinite;
        }

        @keyframes blink-animation {
            0%, 100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

        }

        .btn-dark-gradient {
            background: linear-gradient(45deg, #000000, #555);
            color: white;
            border: none;
        }
    </style>
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
                                <li class="list-inline-item">B</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">U</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">Z</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">R</li>
                            </ul>
                            @can('BenutzerHinzufügen')
                                <div class="add-btn">
                                    <button style="height: 30px" type="button"
                                            class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded"
                                            href="#add_modal" data-toggle="modal">Benutzer hinzufügen
                                    </button>
                                </div>
                            @endcan
                            <div class="row justify-content-between align-items-center mt-3">
                                <div class="col-md-6">
                                    <input id="search-input" type="text" class="form-control text-muted"
                                           placeholder="Suchen..."
                                           style="width: 200px; height: 30px; font-size: 14px; border-radius: 15px;">
                                </div>
                                <div class=" col-md-6 text-muted text-right" style="font-size: 14px">
                                    Anzeigen von @if($data->firstItem()==0)
                                        0
                                    @else
                                        {{ $data->firstItem() }}
                                    @endif
                                    bis @if($data->lastItem()==0)
                                        0
                                    @else
                                        {{ $data->lastItem() }}
                                    @endif
                                    von {{ $data->total() }} gesamt
                                </div>
                            </div>
                            <div id="order-listing" class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Benutzername</th>
                                        <th>E-Mail</th>
                                        <th>Benutzerstatus</th>
                                        <th>Benutzertyp</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                    @foreach ($data as $key => $user)
                                            <?php $i++ ?>
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td>
                                                <a @can('AlleProfileAnzeigen') href="{{route('profile' , $user->id)}}" @endcan>{{$user->name}}</a>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if ($user->status == 'Active')
                                                    <span class="d-flex align-items-center">
                                                        <span class="dot-label bg-success blink mr-2"></span>
                                                        <span class="text-success">Aktiv</span>
                                                     </span>
                                                @elseif($user->status == 'Inactive')
                                                    <span class="d-flex align-items-center">
                                                        <span class="dot-label bg-danger blink mr-2"></span>
                                                        <span class="text-danger">Inaktiv</span>
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <span
                                                            class="btn btn-sm btn-rounded btn-dark-gradient">{{ $v }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->role_name !== 'Owner')
                                                    @can('BenutzerBearbeiten')
                                                        <button class="btn btn-sm btn-rounded btn-inverse-primary"
                                                                href="#edit_modal" title="Edit" data-id="{{$user->id}}"
                                                                data-name="{{$user->name}}"
                                                                data-email="{{$user->email}}"
                                                                data-role_name="{{$user->role_name}}"
                                                                data-status="{{$user->status}}"
                                                                data-toggle="modal">Bearbeiten
                                                        </button>
                                                    @endcan
                                                    @can('BenutzerLöschen')
                                                        <button class="btn btn-sm btn-rounded btn-inverse-danger"
                                                                title="Delete"
                                                                href="#delete_modal" data-id="{{$user->id}}"
                                                                data-name="{{$user->name}}" data-toggle="modal">Löschen
                                                        </button>
                                                    @endcan
                                                @endif
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
                                    @if ($data->onFirstPage())
                                        <span class="previous disabled"><i class="fas fa-angle-left"
                                                                           aria-hidden="true"></i></span>
                                    @else
                                        <a href="{{ $data->previousPageUrl() }}" class="previous"><i
                                                class="fas fa-angle-left" aria-hidden="true"></i></a>
                                    @endif

                                    {{-- Loop through available pages --}}
                                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                                        @if ($i === 1 || $i === $data->lastPage() || abs($data->currentPage() - $i) <= 1)
                                            {{-- Show current, first, last, and neighboring pages --}}
                                            @if ($i === $data->currentPage())
                                                <span class="active">{{ $i }}</span>
                                            @else
                                                <a href="{{ $data->url($i) }}">{{ $i }}</a>
                                            @endif
                                        @elseif ($i === 2 && $data->currentPage() > 3)
                                            {{-- Show ellipsis after the first page --}}
                                            <span class="ellipsis">...</span>
                                        @elseif ($i === $data->lastPage() - 1 && $data->currentPage() < $data->lastPage() - 2)
                                            {{-- Show ellipsis before the last page --}}
                                            <span class="ellipsis">...</span>
                                        @endif
                                    @endfor

                                    {{-- Link to Next Page --}}
                                    @if ($data->hasMorePages())
                                        <a href="{{ $data->nextPageUrl() }}" class="next"><i class="fas fa-angle-right"
                                                                                             aria-hidden="true"></i></a>
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
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Benutyer Hinzufügen</h6>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('benutzer.store')}}" method="post" enctype="multipart/form-data"
                                      autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Benutzername :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-muted" name="name"
                                                           id="name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">E-Mail :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-muted" name="email"
                                                           id="email"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Passwort :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control text-muted"
                                                           name="password"
                                                           id="password"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="confirm-password" class="col-sm-3 col-form-label">PW
                                                    bestätigen :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control text-muted"
                                                           name="confirm-password"
                                                           id="confirm-password"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="role_name" class="col-sm-3 col-form-label">Benutzerrecht
                                                    :</label>
                                                <div class="col-sm-9">
                                                    <select name="role_name" id="role_name"
                                                            class="form-control text-muted select2">
                                                        <option value="#" selected disabled>-- Benutzerrecht auswählen
                                                            --
                                                        </option>
                                                        @foreach ($roles as $one)
                                                            <option value="{{ $one }}">{{ $one }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="status">Benutzerstatus
                                                    :</label>
                                                <div class="col-sm-9">
                                                    <select name="status" id="status"
                                                            class="form-control text-muted select2">
                                                        <option value="#" selected disabled>-- Benutzerstatus auswählen
                                                            --
                                                        </option>
                                                        <option value="Active">Aktive</option>
                                                        <option value="Inactive">Inaktiv</option>
                                                    </select>
                                                </div>
                                            </div>
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
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h4 class="modal-title">Benutzer bearbeiten</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="benutzer/update" method="post" enctype="multipart/form-data"
                                      autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <input type="hidden" class="form-control" id="id" name="id">
                                                <label for="name" class="col-sm-3 col-form-label">Benutzername :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-muted" id="name"
                                                           name="name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">E-Mail :</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control text-muted" id="email"
                                                           name="email"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Passwort :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control text-muted"
                                                           name="password"
                                                           id="password"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="confirm-password" class="col-sm-3 col-form-label">PW
                                                    bestätigen :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control text-muted"
                                                           name="confirm-password"
                                                           id="confirm-password"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="role_name" class="col-sm-3 col-form-label">Benutzerrecht
                                                    :</label>
                                                <div class="col-sm-9">
                                                    <select name="role_name" id="role_name"
                                                            class="form-control text-muted">
                                                        @foreach ($roles as $one)
                                                            <option> {{$one}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3 col-form-label">Benutzerstatus
                                                    :</label>
                                                <div class="col-sm-9">
                                                    <select name="status" id="status" class="form-control text-muted">
                                                        <option value="{{ $user->status}}">{{ $user->status}}</option>
                                                        @if($user->status == "Inactive")
                                                            <option value="Active">Aktive</option>
                                                        @else
                                                            <option value="Inactive">Inaktiv</option>
                                                        @endif
                                                    </select>
                                                </div>
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
                                <h4 class="modal-title">Sind Sie sicher, dass Sie diesen Benutzer löschen möchten ?</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="benutzer/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="company_name">Benutzername :</label>
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
                    var email = button.data('email')
                    var role_name = button.data('role_name')
                    var status = button.data('status')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                    modal.find('.modal-body #email').val(email);
                    modal.find('.modal-body #role_name').val(role_name);
                    modal.find('.modal-body #status').val(status);
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
