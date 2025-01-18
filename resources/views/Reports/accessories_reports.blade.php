@extends('layouts.master')
@section('title')
    Zubehör Berichte
@endsection
@section('CSS')
    <style>
        .btn-inverse-primary {
            border-radius: 25px;
            padding: 5px 10px;
            border: none;
            width: auto;
        }

        .btn-inverse-success {
            border-radius: 25px;
            padding: 5px 10px;
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
                                <form action="{{route('accessories_search')}}" method="POST" role="search"
                                      autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="col-lg-5">
                                        <label class="radiobox">
                                            <input checked name="radio" type="radio" value="1" id="type_div">
                                            <span>Suchen nach Produktkategorie und Produktmarke</span>
                                        </label>
                                    </div>

                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <label class="radiobox">
                                            <input name="radio" value="2" type="radio" id="name_div">
                                            <span>Suche nach Produktname</span>
                                        </label>
                                    </div>
                                    <br><br>

                                    <div class="row">
                                        <!-- Search by category and brand -->
                                        <div class="col-lg-3" id="product_category">
                                            <p class="mg-b-10">Kategorie des Produkts</p>
                                            <select id="kategorie" class="form-control select" name="product_category"
                                                    style="color: #6C7293;" required>
                                                <option value="null"
                                                        disabled {{ (old('product_category') == null && !isset($product_category)) ? 'selected' : '' }}>
                                                    Kategorie wählen
                                                </option>
                                                @foreach($categories as $one)
                                                    <option
                                                        value="{{ $one->id }}" {{ (old('product_category') == $one->id || isset($product_category) && $product_category == $one->id) ? 'selected' : '' }}>{{ $one->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-lg-3" id="product_brand">
                                            <p class="mg-b-10">Marke des Produkts</p>
                                            <select id="brand" class="form-control select2" name="product_brand"
                                                    style="color: #6C7293;" required>
                                                <option value="null"
                                                        disabled {{ (old('product_brand') == null && !isset($product_brand)) ? 'selected' : '' }}>
                                                    Marke wählen
                                                </option>
                                                <option
                                                    value="Alle" {{ (old('product_brand') == 'Alle' || isset($product_brand) && $product_brand == 'Alle') ? 'selected' : '' }}>
                                                    Alle
                                                </option>
                                                @foreach($brands as $one)
                                                    <option
                                                        value="{{ $one->name }}" {{ (old('product_brand') == $one->name || isset($product_brand) && $product_brand == $one->name) ? 'selected' : '' }}>{{ $one->name }}</option>
                                                @endforeach
                                                <option
                                                    value="Andere" {{ (old('product_brand') == 'Andere' || isset($product_brand) && $product_brand == 'Andere') ? 'selected' : '' }}>
                                                    Andere
                                                </option>
                                            </select>

                                        </div>

                                        <!-- Search by name -->
                                        <div class="col-lg-3" id="product_name" style="display: none;">
                                            <p class="mg-b-10">Name des Produkts</p>
                                            <input type="text" name="product_name" class="form-control text-muted"
                                                   placeholder="Geben Sie das Produktname ein">
                                        </div>

                                        <div class="col-lg-3" id="start_at">
                                            <p class="mg-b-10">Von Datum</p>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="mdi mdi-18px mdi-calendar"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control fc-datepicker" value="{{ $start_at ?? '' }}"
                                                       name="start_at" placeholder="TT.MM.JJJJ" type="text"
                                                       style="color: #6C7293;">
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
                                                <input class="form-control fc-datepicker" value="{{ $end_at ?? '' }}"
                                                       name="end_at" placeholder="TT.MM.JJJJ" type="text"
                                                       style="color: #6C7293;">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-inverse-primary btn-block mt-3">suchen</button>
                                </form>
                                @if (isset($details))
                                    @can('ExportExcel')
                                        <form action="{{ route('export_AccessoriesReports', 4) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="details" value="{{ json_encode($details) }}">
                                            <button type="submit" class="btn btn-inverse-success btn-block mt-3">Export
                                                Excel
                                            </button>
                                        </form>
                                    @endcan
                                @endif
                            </div>

                            @if (isset($details))
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                                           style=" text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Kategorie</th>
                                            <th>Marke</th>
                                            <th>Preis</th>
                                            <th>Beschreibung</th>
                                            <th>Foto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                        @foreach($details as $x)
                                                <?php $i++ ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$x->name}}</td>
                                                <td>{{$x->section_name}}</td>
                                                <td>{{$x->brand}}</td>
                                                <td>{{$x->price}}</td>
                                                @if($x->note == NULL)
                                                    <td style="text-align: center;">---</td>
                                                @else
                                                    <td style="text-align: center">{{$x->note}}</td>
                                                @endif
                                                <td><a href="{{asset( 'Attachments/Accessories/' . $x->image)}}"><img
                                                            src="Attachments/Accessories/{{$x->image}}"
                                                            style="height:30px; width:50px; border-radius: 0;"></a></td>
                                                <td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if(count($details) === 0)
                                        <br>
                                        <p class="text-center text-muted" style="font-size: 18px">Keine Daten
                                            gefunden</p>
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
                    dateFormat: 'dd.mm.yy'
                }).val();
            </script>
            <script>
                $(document).ready(function () {
                    $('#product_name').hide();
                    $('input[type="radio"]').click(function () {
                        if ($(this).attr('id') == 'type_div') {
                            $('#product_name').hide();
                            $('#product_category').show();
                            $('#product_brand').show();
                            $('#start_at').show();
                            $('#end_at').show();
                        } else {
                            $('#product_name').show();
                            $('#product_category').hide();
                            $('#product_brand').hide();
                            $('#start_at').hide();
                            $('#end_at').hide();
                        }
                    });
                });
            </script>

@endsection
