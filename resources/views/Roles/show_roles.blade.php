@extends('layouts.master')
@section('title')
    Benutzer Rollen
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
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                            </ul>
                            @can('RollenHinzufügen')
                                <div class="add-btn">
                                    <a style="height: 30px; display: flex; justify-content: center; align-items: center; text-align: center; padding: 5px 15px;"
                                       class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded"
                                       href="{{ route('add_roles') }}">Rollen hinzufügen
                                    </a>
                                </div>
                            @endcan
                            <div class="row justify-content-between align-items-center mt-3">
                                <div class="col-md-6">
                                    <input id="search-input" type="text" class="form-control text-muted"
                                           placeholder="Suchen..."
                                           style="width: 200px; height: 30px; font-size: 14px; border-radius: 15px;">
                                </div>
                                <div class=" col-md-6 text-muted text-right" style="font-size: 14px">
                                    Anzeigen von @if($roles->firstItem()==0)
                                        0
                                    @else
                                        {{ $roles->firstItem() }}
                                    @endif
                                    bis @if($roles->lastItem()==0)
                                        0
                                    @else
                                        {{ $roles->lastItem() }}
                                    @endif
                                    von {{ $roles->total() }} gesamt
                                </div>
                            </div>
                            <div id="order-listing" class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Rollenname</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                    @foreach ($roles as $key => $role)
                                            <?php $i++ ?>
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @can('AlleRollenAnzeigen')
                                                    <a class="btn btn-sm btn-rounded btn-inverse-warning"
                                                       href="{{ route('show_roles' , $role->id)}}" title="Anzeigen">Anzeigen
                                                    </a>
                                                @endcan
                                                @if ($role->name !== 'Owner')
                                                    @can('RollenBearbeiten')
                                                        <a class="btn btn-sm btn-rounded btn-inverse-primary"
                                                           href="{{ route('edit_roles' , $role->id)}}"
                                                           title="Bearbeiten">Bearbeiten
                                                        </a>
                                                    @endcan
                                                    @can('RollenLöschen')
                                                        <button class="btn btn-sm btn-rounded btn-inverse-danger"
                                                                title="Löschen"
                                                                href="#delete_modal" data-id="{{$role->id}}"
                                                                data-name="{{$role->name}}" data-toggle="modal">Löschen
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
                                    @if ($roles->onFirstPage())
                                        <span class="previous disabled"><i class="fas fa-angle-left"
                                                                           aria-hidden="true"></i></span>
                                    @else
                                        <a href="{{ $roles->previousPageUrl() }}" class="previous"><i
                                                class="fas fa-angle-left" aria-hidden="true"></i></a>
                                    @endif

                                    {{-- Loop through available pages --}}
                                    @for ($i = 1; $i <= $roles->lastPage(); $i++)
                                        @if ($i === 1 || $i === $roles->lastPage() || abs($roles->currentPage() - $i) <= 1)
                                            {{-- Show current, first, last, and neighboring pages --}}
                                            @if ($i === $roles->currentPage())
                                                <span class="active">{{ $i }}</span>
                                            @else
                                                <a href="{{ $roles->url($i) }}">{{ $i }}</a>
                                            @endif
                                        @elseif ($i === 2 && $roles->currentPage() > 3)
                                            {{-- Show ellipsis after the first page --}}
                                            <span class="ellipsis">...</span>
                                        @elseif ($i === $roles->lastPage() - 1 && $roles->currentPage() < $roles->lastPage() - 2)
                                            {{-- Show ellipsis before the last page --}}
                                            <span class="ellipsis">...</span>
                                        @endif
                                    @endfor

                                    {{-- Link to Next Page --}}
                                    @if ($roles->hasMorePages())
                                        <a href="{{ $roles->nextPageUrl() }}" class="next"><i class="fas fa-angle-right"
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

                {{--  Start Delete Modal  --}}
                <div class="modal fade" id="delete_modal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h4 class="modal-title">Sind Sie sicher, dass Sie diese Rollen löschen möchten ?</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="rollen/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Rollenname :</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input class="form-control" name="name" id="name" type="text"
                                                   style="color: #6C7293; background: #2A3038" readonly>
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
