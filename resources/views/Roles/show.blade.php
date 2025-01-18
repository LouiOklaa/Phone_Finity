@extends('layouts.master')
@section('title')
    Berechtigungen Anzeigen
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

        #treeview1 li {
            position: relative;
            padding-left: 20px;
        }

        #treeview1 li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: #6C7293;
        }

        #treeview1 li::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 10px;
            height: 1px;
            background-color: #6C7293;
        }
    </style>
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
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">C</li>
                                <li class="list-inline-item">H</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">G</li>
                                <li class="list-inline-item">U</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">G</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item">A</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">Z</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">G</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                            </ul>

                            <!-- Treeview for Permissions -->
                            <div class="col-md-12">
                                <ul id="treeview1">
                                    <li>
                                        <a style="text-decoration: none " href="#">{{ $role->name }}</a>
                                        <ul>
                                            @if(!empty($rolePermissions))
                                                @foreach($rolePermissions as $v)
                                                    <li style="color: #6C7293;">{{ $v->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
