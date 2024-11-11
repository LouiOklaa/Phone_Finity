@extends('layouts.master')
@section('title')
    Rollen Bearbeiten
@endsection
@section('CSS')
    <style>
        /* Treeview Styles */
        #treeview1, #treeview1 ul {
            list-style: none;
            margin-left: -52px;

        }

        #treeview1 ul {
            display: none;
        }

        #treeview1 li a {
            cursor: pointer;
        }

        #treeview1 > li > a::after {
            content: "▼";
            font-size: 12px;
            margin-left: 5px;
        }

        #treeview1 > li.open > a::after {
            content: "▲";
        }

        .d-flex {
            display: flex;
            align-items: center;
        }

        .label-container {
            flex: 1 1 8%;
        }

        .input-container {
            flex: 1 1 92%;
        }
    </style>
@endsection
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            {!! Form::model($role, ['method' => 'PATCH','route' => ['rollen.update', $role->id]]) !!}
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <ul style="color: #00c292" class="list-inline text-center">
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
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
                            @if ($role->name !== 'Owner')
                                <div class="col-md-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="label-container">
                                        <label for="name" class="col-form-label">Rollenname:</label>
                                    </div>
                                    <div class="input-container">
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control' , 'style' => 'color: #6C7293;')) !!}
                                    </div>
                                </div>
                            </div>

                                <!-- Treeview for Permissions -->
                                <div class="col-md-12">
                                    <ul id="treeview1">
                                        <li>
                                            <a style="text-decoration: none " href="#">Rollen</a>
                                            <ul>
                                                @foreach($permission as $value)
                                                    <li>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-check-input , name')) }}
                                                                {{ $value->name }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /col -->
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-rounded btn-primary">Aktualisieren</button>
                                </div>
                            @else
                                <p style="font-size: 1.5rem;font-weight: 600;color: #3e4b5b; text-align: center">Die Besitzer Berechtigung kann nicht geändert werden.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- content-wrapper ends -->
        @endsection

        @section('JS')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Toggle Treeview display
                    const treeToggle = document.querySelector('#treeview1 > li > a');
                    treeToggle.addEventListener('click', function () {
                        const parentLi = this.parentElement;
                        parentLi.classList.toggle('open');
                        const nestedUl = parentLi.querySelector('ul');
                        if (nestedUl) {
                            nestedUl.style.display = nestedUl.style.display === 'block' ? 'none' : 'block';
                        }
                    });
                });
            </script>
@endsection
