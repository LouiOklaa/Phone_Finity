@extends('layouts.master')
@section('title')
    Allgemeine Informationen
@endsection
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('Edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Edit') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </strong>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-inline text-center">
                                <li class="list-inline-item">A</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">L</li>
                                <li class="list-inline-item">G</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">M</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">F</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">R</li>
                                <li class="list-inline-item">M</li>
                                <li class="list-inline-item">A</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                            </ul>
                            <div class="edit_modal">
                                <button style="height: 30px" type="button"
                                        class="btn btn-inverse-primary btn-fw embed-responsive btn-rounded"
                                        href="#edit_modal" data-id="{{$information->id}}"
                                        data-phone_number="{{$information->phone_number}}"
                                        data-email="{{$information->email}}" data-address="{{$information->address}}"
                                        data-address_link="{{$information->address_link}}"
                                        data-facebook_link="{{$information->facebook_link}}"
                                        data-instagram_link="{{$information->instagram_link}}"
                                        data-tiktok_link="{{$information->tiktok_link}}" data-toggle="modal">Allgemeine
                                    Informationen Bearbeiten
                                </button>
                            </div>
                            <br>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="name">Handynummer</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                           placeholder="{{$information->phone_number}}" readonly
                                           style="background: #2A3038">
                                </div>
                                <div class="form-group">
                                    <label for="age">E-Mail</label>
                                    <input type="number" class="form-control" id="email" name="email"
                                           placeholder="{{$information->email}}" readonly style="background: #2A3038">
                                </div>
                                <div class="form-group">
                                    <label for="work">Adresse</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="{{$information->address}}" readonly style="background: #2A3038">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Adresse Link</label>
                                    <input type="text" class="form-control" id="address_link" name="address_link"
                                           placeholder="{{$information->address_link}}" readonly
                                           style="background: #2A3038">
                                </div>
                                <div class="form-group">
                                    <label for="address">Facebook Link</label>
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link"
                                           placeholder="{{$information->facebook_link}}" readonly
                                           style="background: #2A3038">
                                </div>
                                <div class="form-group">
                                    <label for="language">Instagram Link</label>
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                           placeholder="{{$information->instagram_link}}" readonly
                                           style="background: #2A3038">
                                </div>
                                <div class="form-group">
                                    <label for="language">TikTok Link</label>
                                    <input type="text" class="form-control" id="tiktok_link" name="tiktok_link"
                                           placeholder="{{$information->tiktok_link}}" readonly
                                           style="background: #2A3038">
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-center">
                                            <th> Startseitenfoto 1</th>
                                            <th> Startseitenfoto 2</th>
                                            <th> Startseitenfoto 3</th>
                                            <th> Startseitenfoto 4</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="text-center">
                                            <td><a href="{{asset( 'Attachments/Home_Page/' . $information->img1)}}"><img
                                                            src="Attachments/Home_Page/{{$information->img1}}"
                                                            style="height:30px; width:50px; border-radius: 0;"></a></td>
                                            <td><a href="{{asset( 'Attachments/Home_Page/' . $information->img2)}}"><img
                                                            src="Attachments/Home_Page/{{$information->img2}}"
                                                            style="height:30px; width:50px; border-radius: 0;"></a></td>
                                            <td><a href="{{asset( 'Attachments/Home_Page/' . $information->img3)}}"><img
                                                            src="Attachments/Home_Page/{{$information->img3}}"
                                                            style="height:30px; width:50px; border-radius: 0;"></a></td>
                                            <td><a href="{{asset( 'Attachments/Home_Page/' . $information->img4)}}"><img
                                                            src="Attachments/Home_Page/{{$information->img4}}"
                                                            style="height:30px; width:50px; border-radius: 0;"></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{--  Start Edit Modal --}}
                <div class="modal fade" id="edit_modal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h4 class="modal-title">Allgemeine Informationen Bearbeiten</h4>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="allgemeineinformationen/update" method="post"
                                      enctype="multipart/form-data" autocomplete="off">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="phone_number">Handynummer :</label>
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">E-Mail :</label>
                                            <input class="form-control" name="email" id="email" type="text"
                                                   style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Adresse :</label>
                                            <input class="form-control" name="address" id="address" type="text"
                                                   style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="address_link" class="col-form-label">Adresse Link :</label>
                                            <input class="form-control" name="address_link" id="address_link"
                                                   type="text" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook_link" class="col-form-label">Facebook Link :</label>
                                            <input class="form-control" name="facebook_link" id="facebook_link"
                                                   type="text" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram_link" class="col-form-label">Instagram Link :</label>
                                            <input class="form-control" name="instagram_link" id="instagram_link"
                                                   type="text" style="color: #6C7293">
                                        </div>
                                        <div class="form-group">
                                            <label for="tiktok_link" class="col-form-label">TikTok Link :</label>
                                            <input class="form-control" name="tiktok_link" id="tiktok_link" type="text"
                                                   style="color: #6C7293">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Startseitenfoto 1</label>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" id="img1" name="img1" class="dropify"
                                                   accept=".jpg, .png, image/jpeg, image/png" data-height="30"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Startseitenfoto 2</label>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" id="img2" name="img2" class="dropify"
                                                   accept=".jpg, .png, image/jpeg, image/png" data-height="30"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Startseitenfoto 3</label>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" id="img3" name="img3" class="dropify"
                                                   accept=".jpg, .png, image/jpeg, image/png" data-height="30"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Startseitenfoto 4</label>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" id="img4" name="img4" class="dropify"
                                                   accept=".jpg, .png, image/jpeg, image/png" data-height="30"/>
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
                    var phone_number = button.data('phone_number')
                    var email = button.data('email')
                    var address = button.data('address')
                    var address_link = button.data('address_link')
                    var facebook_link = button.data('facebook_link')
                    var instagram_link = button.data('instagram_link')
                    var tiktok_link = button.data('tiktok_link')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #phone_number').val(phone_number);
                    modal.find('.modal-body #email').val(email);
                    modal.find('.modal-body #address').val(address);
                    modal.find('.modal-body #address_link').val(address_link);
                    modal.find('.modal-body #facebook_link').val(facebook_link);
                    modal.find('.modal-body #instagram_link').val(instagram_link);
                    modal.find('.modal-body #tiktok_link').val(tiktok_link);
                })
            </script>
@endsection
