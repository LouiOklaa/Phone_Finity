@extends('layouts.master')
@section('title')
    Benutzer Bearbeiten
@endsection
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
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
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item">B</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">A</li>
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">B</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                            </ul>
                            <br>
                            <form action="{{route('benutzer.update' , $user->id)}}" method="post"
                                  enctype="multipart/form-data" autocomplete="off">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Benutzername :</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                       value="{{ $user->id }}">
                                                @if ($user->role_name !== 'Owner')
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           style="color: #6C7293;background: #2A3038"
                                                           value="{{ $user->name }}"/>
                                                @else
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           style="color: #6C7293;background: #2A3038"
                                                           value="{{ $user->name }}" readonly/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">E-Mail :</label>
                                            <div class="col-sm-9">
                                                @if ($user->role_name !== 'Owner')
                                                    <input type="text" class="form-control" name="email" id="email"
                                                           style="color: #6C7293;background: #2A3038"
                                                           value="{{ $user->email }}"/>
                                                @else
                                                    <input type="text" class="form-control" name="email" id="email"
                                                           style="color: #6C7293;background: #2A3038"
                                                           value="{{ $user->email }}" readonly/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if ($user->role_name !== 'Owner')
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-rounded btn-primary">Aktualisieren</button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

@endsection
