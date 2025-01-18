@extends('layouts.master')
@section('CSS')
    <style>

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #00c292;
            margin-right: 20px;
        }

        .profile-info {
            flex-grow: 1;
        }

        .main-profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #3e4b5b;
        }

        .main-profile-role {
            color: #888888;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .description-label {
            color: #3e4b5b;
            font-size: 1rem;
            font-weight: 500;
            margin-top: 15px;
        }

        .main-profile-bio {
            color: #666666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .social-label {
            font-size: 1rem;
            font-weight: 600;
            color: #3e4b5b;
            margin-bottom: 10px;
        }

        .media-icon {
            font-size: 1.5rem;
        }

        .icon-color {
            color: #00c292;
        }

        .text-size {
            font-size: 13px;
        }
    </style>
@endsection
@section('title')
    Mein Profil
@endsection
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-inline text-center icon-color">
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
                                <li class="list-inline-item">P</li>
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">F</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">L</li>
                            </ul>
                            <div class="main-profile-overview">
                                <div class="main-img-user profile-user">
                                    <img alt="Profile Picture" src="{{ URL::asset('assets/images/faces/face.jpg') }}"
                                         class="profile-picture">
                                </div>
                                <br>
                                <div class="profile-info">
                                    <h5 class="main-profile-name">{{$user->name}}<span
                                            class="main-profile-role"> - {{$user->role_name}}</span></h5>
                                    <p class="main-profile-bio">{{$user->email}}</p>

                                    <h6 class="description-label">Beschreibung</h6>
                                    <p class="main-profile-bio">Er arbeitet als {{$user->role_name}} bei Loui-Soft</p>

                                    <label class="social-label">Kontaktieren Sie Loui-Soft</label>
                                    <div class="main-profile-social-list">
                                        <div class="media">
                                            <div class="media-icon">
                                                <a href="https://github.com/LouiOklaa"
                                                   class="mdi mdi-github-circle icon-color"></a>
                                                <a href="https://www.facebook.com/loui.oklaa/"
                                                   class="mdi mdi-facebook icon-color"></a>
                                                <a href="https://www.linkedin.com/in/loui-oklaa/"
                                                   class="mdi mdi-linkedin icon-color"></a>
                                                <a href="https://www.instagram.com/loui_oklaa/"
                                                   class="mdi mdi-instagram icon-color"></a>
                                                <a href="https://wa.me/+4917670352663"
                                                   class="mdi mdi-whatsapp icon-color"></a>
                                                <a href="https://x.com/loui_oklaa">
                                                    <svg style="margin-bottom: 11px" xmlns="http://www.w3.org/2000/svg"
                                                         width="18" height="18" fill="currentColor"
                                                         class="bi bi-twitter-x icon-color" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8" style="margin-top: 7px">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="text-left text-size">Hinzugefügte Handys</h5>
                                            <h4 class="text-muted font-weight-normal text-left">{{number_format(\App\Models\handys::where('created_by' , '=' , $user->id)->count())}}</h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-info ">
                                                <span class="mdi mdi-cellphone-iphone icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="text-left text-size">Hinzugefügte Zubehör</h5>
                                            <h4 class="text-muted font-weight-normal text-left">{{number_format(\App\Models\Accessories::where('created_by' , '=' , $user->id)->count())}}</h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-headphones icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="text-left text-size">Hinzugefügte Dienste</h5>
                                            <h4 class="text-muted font-weight-normal text-left">{{number_format(\App\Models\Services::where('created_by' , '=' , $user->id)->count())}}</h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-danger ">
                                                <span class="mdi mdi-worker icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="text-left text-size">Hinzugefügte Anhänge</h5>
                                            <h4 class="text-muted font-weight-normal text-left">{{number_format(\App\Models\Gallery::where('created_by' , '=' , $user->id)->count())}}</h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-warning ">
                                                <span class="mdi mdi-attachment icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="text-left text-size" style="font-size: 12px">Erteilte
                                                Berechtigungen</h5>
                                            <h4 class="text-muted font-weight-normal text-left">{{number_format(\Spatie\Permission\Models\Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$user->id)->count())}}</h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-primary ">
                                                <span class="mdi mdi-shield-outline icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="text-left text-size">Benutzerrolle</h5>
                                            <h4 class="text-muted font-weight-normal text-left">{{$user->role_name}}</h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-secondary ">
                                                <span class="mdi mdi-account icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

@endsection
