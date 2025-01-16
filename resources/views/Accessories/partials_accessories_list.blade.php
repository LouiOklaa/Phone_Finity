@foreach($accessories as $one)
    <div class="md-col-4">
        <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
            <div class="item-back"></div>
            <a href="{{asset( 'Attachments/Accessories/' . $one->image)}}"
               class="item-image responsive-1by1"><img
                    src="{{url('/Attachments/Accessories/' .$one->image)}}" alt=""/></a>
            <div class="item-content shift-md">
                <div class="item-textes">
                    <div class="item-title text-upper hover"><i style="font-style: normal; font-size: 18px;" class="content-link">{{$one->name}}</i>
                    </div>
                </div>
                <div class="item-prices">
                    <div class="item-price" style="color: #CA5098; ">{{$one->price}}€</div>
                </div>
            </div>
            <div class="item-content">
                <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Typ : </b><b>{{$one->section_name}}</b></div>
                <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">{{$one->section_name}} für : </b><b>{{$one->brand}}</b></div>
            </div>
            <div>
                <b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px; margin-bottom: 15px;">Spezifikationen : </b>
                <b>
                    @if($one->note != 0)
                        @php
                            $maxLength = 10;
                            $note = $one->note;
                        @endphp
                        @if(strlen($note) > $maxLength)
                            {{ substr($note, 0, $maxLength) }}...
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#noteModal{{ $one->id }}" style="color: #CA5098;">Mehr erfahren</a>
                        @else
                            {{ $note }}
                        @endif
                    @else
                        Unverfügbar
                    @endif
                </b>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="noteModal{{ $one->id }}" tabindex="-1" aria-labelledby="noteModal{{ $one->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModal{{ $one->id }}">Spezifikationen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b> {!! nl2br(e($one->note)) !!}</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
