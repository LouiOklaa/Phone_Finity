@extends('layouts.master')
@section('title')
    Handys Berichte
@endsection
@section('CSS')
    <style>
        .btn-inverse-primary {
            border-radius: 25px;
            padding: 10px 20px;
            border: none;
            width: auto;
        }
        .row .col-lg-3 {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .form-control {
            height: 40px;
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
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">C</li>
                                <li class="list-inline-item">H</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">E</li>
                            </ul>
                            <div class="card">
                                <form action="{{route('mobiles_search')}}" method="POST" role="search" autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="col-lg-4">
                                        <label class="radiobox">
                                            <input checked name="radio" type="radio" value="1" id="type_div">
                                            <span>Suchen Sie nach Handytyp und Zustand</span>
                                        </label>
                                    </div>

                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <label class="radiobox">
                                            <input name="radio" value="2" type="radio" id="name_div">
                                            <span>Suche nach Handynamen</span>
                                        </label>
                                    </div><br><br>

                                    <div class="row">
                                        <!-- Search by type and status -->
                                        <div class="col-lg-3" id="mobiles_type">
                                            <p class="mg-b-10">Kategorie des Handys</p>
                                            <select id="kategorie" class="form-control select" name="mobiles_type" style="color: #6C7293;" required>
                                                <option value="null" disabled {{ (old('mobiles_type') == null && !isset($mobiles_type)) ? 'selected' : '' }}>Kategorie wählen</option>
                                                @foreach($categories as $one)
                                                    <option value="{{ $one->id }}" {{ (old('mobiles_type') == $one->id || isset($mobiles_type) && $mobiles_type == $one->id) ? 'selected' : '' }}>{{ $one->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-lg-3" id="mobiles_status">
                                            <p class="mg-b-10">Zustand des Handys</p>
                                            <select id="zustand" class="form-control select2" name="mobiles_status" style="color: #6C7293;" required>
                                                <option value="null" disabled {{ (old('mobiles_status') == null && !isset($mobiles_status)) ? 'selected' : '' }}>Zustand wählen</option>
                                                <option value="Alle" {{ (old('mobiles_status') == 'Alle' || isset($mobiles_status) && $mobiles_status == 'Alle') ? 'selected' : '' }}>Alle</option>
                                                <option value="Neu" {{ (old('mobiles_status') == 'Neu' || isset($mobiles_status) && $mobiles_status == 'Neu') ? 'selected' : '' }}>Neu</option>
                                                <option value="Gebraucht" {{ (old('mobiles_status') == 'Gebraucht' || isset($mobiles_status) && $mobiles_status == 'Gebraucht') ? 'selected' : '' }}>Gebraucht</option>
                                            </select>

                                        </div>

                                        <!-- Search by name -->
                                        <div class="col-lg-3" id="mobile_name" style="display: none;">
                                            <p class="mg-b-10">Name des Handys</p>
                                            <input type="text" name="mobile_name" class="form-control" placeholder="Geben Sie den Handynamen ein">
                                        </div>

                                        <div class="col-lg-3" id="start_at">
                                            <p class="mg-b-10">Von Datum</p>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="mdi mdi-18px mdi-calendar"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control fc-datepicker" value="{{ $start_at ?? '' }}" name="start_at" placeholder="TT.MM.JJJJ" type="text" style="color: #6C7293;">
                                            </div>
                                        </div>

                                        <div class="col-lg-3" id="end_at">
                                            <p class="mg-b-10">Bis Datum</p>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="mdi mdi-18px mdi-calendar"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control fc-datepicker" value="{{ $end_at ?? '' }}" name="end_at" placeholder="TT.MM.JJJJ" type="text" style="color: #6C7293;">
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <button class="btn btn-inverse-primary btn-block">suchen</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @if (isset($details))
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50' style=" text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Kategorie</th>
                                            <th>Zustand</th>
                                            <th>Preis</th>
                                            <th>Menge</th>
                                            <th>Beschreibung</th>
                                            <th>Foto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0?>
                                        @foreach($details as $x)
                                            <?php $i ++?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$x->name}}</td>
                                                <td>{{$x->section_name}}</td>
                                                <td>{{$x->status}}</td>
                                                <td>{{$x->preis}}</td>
                                                <td>{{$x->amount}}</td>
                                                @if($x->note == NULL)
                                                    <td style="text-align: center;">---</td>
                                                @else
                                                    <td style="text-align: center">{{$x->note}}</td>
                                                @endif
                                                <td><a href="{{asset( 'Attachments/Handys/' . $x->image)}}"><img
                                                            src="Attachments/Handys/{{$x->image}}"
                                                            style="height:30px; width:50px; border-radius: 0;"></a></td>
                                                <td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if(count($details) === 0)
                                        <br>
                                        <p class="text-center text-muted" style="font-size: 18px">Keine Daten gefunden</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('JS')
            <script>
                var date = $('.fc-datepicker').datepicker({
                    dateFormat: 'yy-dd-mm'
                }).val();
            </script>
            <script>
                $(document).ready(function() {
                    $('#mobile_name').hide();
                    $('input[type="radio"]').click(function() {
                        if ($(this).attr('id') == 'type_div') {
                            $('#mobile_name').hide();
                            $('#mobiles_type').show();
                            $('#mobiles_status').show();
                            $('#start_at').show();
                            $('#end_at').show();
                        } else {
                            $('#mobile_name').show();
                            $('#mobiles_type').hide();
                            $('#mobiles_status').hide();
                            $('#start_at').hide();
                            $('#end_at').hide();
                        }
                    });
                });
            </script>

@endsection
