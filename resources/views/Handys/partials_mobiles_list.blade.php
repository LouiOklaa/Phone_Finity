@foreach($handys as $one)
    <div class="md-col-4">
        <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
            <div class="item-back"></div>
            <a href="{{asset( 'Attachments/Handys/' . $one->image)}}"
               class="item-image responsive-1by1"><img
                    src="{{url('/Attachments/Handys/' .$one->image)}}" alt=""/></a>
            <div class="item-content shift-md">
                <div class="item-textes">
                    <div class="item-title text-upper hover"><i style="font-style: normal; font-size: 18px;" class="content-link">{{$one->name}}</i>
                    </div>
                </div>
                <div class="item-prices">
                    <div class="item-price" style="color: #CA5098; ">{{$one->preis}}€</div>
                </div>
            </div>
            <div class="item-content">
                <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Zustand : </b><b>{{$one->status}}</b></div>
                <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Hersteller : </b><b>{{$one->section_name}}</b></div>
                <div><b style="font-family: Montserrat; font-weight: 600; color: #CA5098; font-size: 16px;  margin-bottom: 15px;">Spezifikationen : </b>
                    <b>
                        @if($one->note != 0)
                            {{$one->note}}
                        @else
                            Unverfügbar.
                        @endif
                    </b></div>
            </div>
        </div>
    </div>
@endforeach
