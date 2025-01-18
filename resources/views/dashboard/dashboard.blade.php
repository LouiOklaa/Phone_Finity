@extends('layouts.master')
@section('title')
    LouiSoft Admin
@endsection
@section('CSS')
    <style>
        .preview-item:hover {
            background-color: #16181b;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
@endsection
@section('contents')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @can('Statistiken')
            <div class="row">
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4>Neue Handys</h4>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <?php
                                        $total_new = \App\Models\handys::where('status', 'Neu')
                                            ->sum(\DB::raw('preis * amount'));
                                        ?>
                                        <h3 class="mb-0">{{ number_format($total_new, 2) }} €</h3>
                                        <?php
                                        $totalDevices = \App\Models\handys::count();
                                        $newDevices = \App\Models\handys::where('status', 'Neu')->count();

                                        $percentageNew = $totalDevices > 0 ? ($newDevices / $totalDevices) * 100 : 0;
                                        $color = '';
                                        if ($percentageNew < 25) {
                                            $color = '#FC424A';
                                        } elseif ($percentageNew >= 25 && $percentageNew <= 75) {
                                            $color = '#F26522';
                                        } else {
                                            $color = '#00D25B';
                                        }
                                        ?>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: {{ $color }};">&nbsp{{ number_format($percentageNew, 1) }}%</span></p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\handys::where('status' , 'Neu')->sum('amount'))}} Stk.</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-cellphone-iphone text-primary ms-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4>Gebrauchte Handys</h4>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <?php
                                        $total_used = \App\Models\handys::where('status', 'Gebraucht')
                                            ->sum(\DB::raw('preis * amount'));
                                        ?>
                                        <h3 class="mb-0">{{ number_format($total_used, 2) }} €</h3>
                                        <?php
                                        $usedDevices = \App\Models\handys::where('status', 'Gebraucht')->count();

                                        $percentageUsed = $totalDevices > 0 ? ($usedDevices / $totalDevices) * 100 : 0;
                                        $color = '';
                                        if ($percentageUsed < 25) {
                                            $color = '#FC424A';
                                        } elseif ($percentageUsed >= 25 && $percentageUsed <= 75) {
                                            $color = '#F26522';
                                        } else {
                                            $color = '#00D25B';
                                        }
                                        ?>
                                        <p class="text-or ms-2 mb-0 font-weight-medium"><span style="color: {{ $color }};">&nbsp{{ number_format($percentageUsed, 1) }}%</span></p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\handys::where('status' , 'Gebraucht')->sum('amount'))}} Stk.</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-cellphone-android text-danger ms-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4>Zubehör</h4>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">{{number_format(\App\Models\Accessories::sum('price') , 2)}} €</h3>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\Accessories::count())}} Stk.</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-headphones text-success ms-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center font-weight-normal">Neue Samsung Handys</h5><br>
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <?php
                                        $totalNewSam = \App\Models\handys::where([['status' , 'Neu'] , ['section_name' , 'samsung']])
                                            ->sum(\DB::raw('preis * amount'));
                                        ?>
                                        <h4 class="mb-0">{{ number_format($totalNewSam, 2) }} €</h4>
                                        <?php
                                        $newSamDevices = \App\Models\handys::where([['status' , 'Neu'] , ['section_name' , 'samsung']])->count();

                                        $percentageNewSam = $totalDevices > 0 ? ($newSamDevices / $totalDevices) * 100 : 0;
                                        $color = '';
                                        if ($percentageNewSam < 25) {
                                            $color = '#FC424A';
                                        } elseif ($percentageNewSam >= 25 && $percentageNewSam <= 75) {
                                            $color = '#F26522';
                                        } else {
                                            $color = '#00D25B';
                                        }
                                        ?>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: {{ $color }};">&nbsp{{ number_format($percentageNewSam, 1) }}%</span></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-secondary ">
                                        <span class="mdi mdi-chart-line icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\handys::where([['status' , 'Neu'] , ['section_name' , 'samsung']])->sum('amount'))}} Stk.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center font-weight-normal">Gebrauchte Samsung Handys</h5><br>
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <?php
                                        $totalUsedSam = \App\Models\handys::where([['status' , 'Gebraucht'] , ['section_name' , 'samsung']])
                                        ->sum(\DB::raw('preis * amount'));
                                        ?>
                                        <h4 class="mb-0">{{ number_format($totalUsedSam, 2) }} €</h4>
                                        <?php
                                        $usedSamDevices = \App\Models\handys::where([['status' , 'gebraucht'] , ['section_name' , 'samsung']])->count();

                                        $percentageUsedSam = $totalDevices > 0 ? ($usedSamDevices / $totalDevices) * 100 : 0;
                                        $color = '';
                                        if ($percentageUsedSam < 25) {
                                            $color = '#FC424A';
                                        } elseif ($percentageUsedSam >= 25 && $percentageUsedSam <= 75) {
                                            $color = '#F26522';
                                        } else {
                                            $color = '#00D25B';
                                        }
                                        ?>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: {{ $color }};">&nbsp{{ number_format($percentageUsedSam, 1) }}%</span></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-info">
                                        <span class="mdi mdi-chart-arc icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\handys::where([['status' , 'Gebraucht'] , ['section_name' , 'samsung']])->sum('amount'))}} Stk.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center font-weight-normal">Neue Apple Handys</h5><br>
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <?php
                                        $totalNewApl = \App\Models\handys::where([['status' , 'Neu'] , ['section_name' , 'apple']])
                                            ->sum(\DB::raw('preis * amount'));
                                        ?>
                                        <h4 class="mb-0">{{ number_format($totalNewApl, 2) }} €</h4>
                                        <?php
                                        $newAplDevices = \App\Models\handys::where([['status' , 'Neu'] , ['section_name' , 'apple']])->count();

                                        $percentageNewApl = $totalDevices > 0 ? ($newAplDevices / $totalDevices) * 100 : 0;
                                        $color = '';
                                        if ($percentageNewApl < 25) {
                                            $color = '#FC424A';
                                        } elseif ($percentageNewApl >= 25 && $percentageNewApl <= 75) {
                                            $color = '#F26522';
                                        } else {
                                            $color = '#00D25B';
                                        }
                                        ?>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: {{ $color }};">&nbsp{{ number_format($percentageNewApl, 1) }}%</span></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-primary">
                                        <span class="mdi mdi-chart-areaspline icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\handys::where([['status' , 'Neu'] , ['section_name' , 'apple']])->sum('amount'))}} Stk.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center font-weight-normal">Gebrauchte Apple Handys</h5><br>
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <?php
                                        $totalUsedApl = \App\Models\handys::where([['status' , 'Gebraucht'] , ['section_name' , 'apple']])
                                            ->sum(\DB::raw('preis * amount'));
                                        ?>
                                        <h4 class="mb-0">{{ number_format($totalUsedApl, 2) }} €</h4>
                                        <?php
                                        $usedAplDevices = \App\Models\handys::where([['status' , 'Gebraucht'] , ['section_name' , 'apple']])->count();

                                        $percentageUsedApl = $totalDevices > 0 ? ($usedAplDevices / $totalDevices) * 100 : 0;
                                        $color = '';
                                        if ($percentageUsedApl < 25) {
                                            $color = '#FC424A';
                                        } elseif ($percentageUsedApl >= 25 && $percentageUsedApl <= 75) {
                                            $color = '#F26522';
                                        } else {
                                            $color = '#00D25B';
                                        }
                                        ?>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: {{ $color }};">&nbsp{{ number_format($percentageUsedApl, 1) }}%</span></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-warning ">
                                        <span class="mdi mdi-chart-bar icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Gesamtzahl {{number_format(\App\Models\handys::where([['status' , 'Gebraucht'] , ['section_name' , 'apple']])->sum('amount'))}} Stk.</h6>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            <div class="row">
                @can('AlleNachrichtenAnzeigen')
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title">Neueste Nachrichten</h4>
                                @can('AlleNachrichtenAnzeigen')
                                <a href="{{route('show_all_messages')}}" class="text-muted mb-1 small">Alle anzeigen</a>
                                @endcan
                            </div>
                            <div class="preview-list">
                                @foreach($latestEmails as $one)
                                    <a @can('Nachricht') href="{{route('show_message' , $one->id)}}" @endcan class="text-decoration-none" style="color: inherit;">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <img src="{{ URL::asset('assets/images/faces/face2.jpg') }}" alt="image" class="rounded-circle"/>
                                            </div>
                                            <div class="preview-item-content d-flex flex-grow">
                                                <div class="flex-grow">
                                                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                        <h6 class="preview-subject">{{$one->name}}</h6>
                                                        <p class="text-muted text-small">{{$one->sent_at_formatted}}</p>
                                                    </div>
                                                    <p class="text-muted">{{$one->email}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
                @can('Statistiken')
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1">Handys Diagramm</h4>
                                <p class="text-muted mb-1">Der Status Ihres Geräts</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="bar_Chart" style="height:230px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
                <!-- Modal for Cookies -->
                <div class="modal fade" id="cookieModalAdmin" tabindex="-1" aria-labelledby="cookieModalAdminLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cookieModalAdminLabel">Cookies Zustimmung</h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Wir verwenden Cookies, um Ihre Erfahrung auf unserer Website zu verbessern und relevante Inhalte anzuzeigen.
                                    Indem Sie auf "Akzeptieren" klicken, stimmen Sie der Verwendung von Cookies zu.
                                    <a href="{{route('data_protection')}}" target="_blank">Mehr erfahren</a>.
                                </p>
                                <div class="modal-footer">
                                    <button id="acceptCookiesAdmin" type="submit" class="btn btn-rounded btn-outline-primary">Akzeptieren</button>
                                    <button type="button" class="btn btn-rounded btn-outline-secondary" data-dismiss="modal">Ablehnen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
@section('JS')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('bar_Chart').getContext('2d');
                    var barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Neue Handys', 'Gebrauchte Handys', 'Neue Samsung Handys', 'Gebrauchte Samsung Handys', 'Neue Apple Handys', 'Gebrauchte Apple Handys'],
                            datasets: [{
                                label: '',
                                data: [
                                    {{ $percentageNew }},
                                    {{ $percentageUsed }},
                                    {{ $percentageNewSam }},
                                    {{ $percentageUsedSam }},
                                    {{ $percentageNewApl }},
                                    {{ $percentageUsedApl }}
                                ],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(153, 255, 51, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(153, 255, 51, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                        }
                    });
                });
            </script>

@endsection
