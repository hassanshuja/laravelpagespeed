 {{-- {{dd($data)}} --}}

<style>
    .dDownsHide {

display: none;
}
.titleNinfo h1 {
    color: #013a89;
    text-decoration: none;
    font-family: 'Roboto Condensed',sans-serif;
    font-size: 18px;
    line-height: 120%;
}
.offerPrice h5{
    font-size: 16.002px;
    color: #013a89;
    font-style: italic;
    
}
.subMainCatWarp h6{
    margin: 0;
    padding-right: 10px;
    padding-left: 10px;
    border-right: 1px solid #8694a9;
    
}
.titleNinfo-test-1{
    color: #013a89;
    text-decoration: none;
    font-family: 'Roboto Condensed',sans-serif;
    font-size: 18px;
    line-height: 120%;
}
    .titleNinfo h2 {
        color: #013a89;
        text-decoration: none;
        font-family: 'Roboto Condensed',sans-serif;
        font-size: 18px;
        line-height: 120%;
    }
    @media (max-width:767px){
     .cardOfferNoWrap .leftHolder {
    max-height: none!important;
    }
    .img-listing-card{
    width:100%!important;
 }
}
</style>

    <div class="container-fluid">
        @include('navoverview')
        @include('navoverview2')
        @include('navoverview3')
        @include('navoverview4')
    </div>
    <div class="container-fluid container1">
        <div class="row titleH">
            <div class="col-12 titleCol">
                <h1>{{$redText}} </h1>
            </div>
        </div>
        @foreach($data['offerData'] as $od)  
        <div class="row cardOffer">
            <div class="col-12 col-sm-5 col-md-5 cardOfferNoWrap">
                <div class="leftHolder">
                <div class="col-12 cardImg">
                <a href="{{url('ausflug/'.$od->title_link)}}/" title="{{$od->title}}/" style="display: block;">
                <!--  <img class="img-fluid img-listing-card" src="{{url('assets/img'.$od->image)}}" title="meinweekend" alt="{{$od->title}}" /> -->

                <img class="img-fluid img-listing-card avc" src="{{url('assets/img'.$od->image)}}">
                    

                </a>          
                </div>
                <div class="offerDays">
                    <div class="dayz">
                    <span>{!!$od->day!!}</span><span> {{$od->day>1?"Tage":"Tag"}}</span>
                    </div>
                    <div class="nightz">
                    <span>{!!$od->night!!}</span><span> {{$od->night>1?"Nächte":"Nacht"}}</span>    
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-sm-7 col-md-7 cardRight">
                <div class="titleNinfo">
                <a href="{{url('ausflug/'.$od->title_link)}}/" title="{{$od->title}}" style="display: block;padding:20px 0px">
                    <h2>{!!$od->title!!}
                            {{-- <span class="imgHOlder">
                                <img class="img-fluid" src="{{url('assets'.$od->region_image)}}.png" title="meinweekend" alt="meinweekend"></span> --}}
                        </h2>
                    </a>
                    <p>{!! strip_tags($od->list_subtitle) !!}</p>
                </div>
                <div class="offerInfo">    
                    <div class="offerPerson">
                        <h5>{!! strip_tags($od->list_status!='' ? $od->list_status : $od->address) !!}</h5>
                        <br>
                    @if($od->hasspeciallistsettings==1)
                        <p>ab {!!$od->special_list_min_persons!!} {{$od->special_list_min_persons>1 ? 'Personen': 'Person'}}</p>
                        
                    @else
                        <p>ab {!!$od->min_persons!!} {{$od->min_persons>1 ? 'Personen': 'Person'}}</p>

                    @endif
                    </div>
                    <div class="offerPrice">
                        @if ($od->hasspeciallistsettings==1)
                        @if ($od->special_list_currency==0)
                            <h5>ab CHF {{floor($od->special_list_price)}}</h5>
                            {{--  {!!$od->priceinfo!!}  --}}
                            <p class="offerPriceP1">&nbsp; EUR {{floor($od->special_list_price/$data['exchange'])}}*</p>
                            <p class="offerPriceP2">Pro {{$od->personType}}</p>
                            <p class="offerPriceP3">* Richtwert</p>
                        @endif    
                        @if ($od->special_list_currency==1)
                            <h5>ab EUR {{floor($od->special_list_price)}}</h5>
                        
                            {{--  {!!$od->priceinfo!!}  --}}
                            <p class="offerPriceP1">&nbsp; CHF {{floor($od->special_list_price*$data['exchange'])}}*</p>
                            <p class="offerPriceP2">Pro {{$od->personType}}</p>
                            <p class="offerPriceP3">* Richtwert</p>
                        @endif
                           
                        @else
                            
                        @foreach($od->prices as $p)
                            @if ($loop->first)
                                @if ($p->currency==0)
                                    {{--  {!!$od->priceinfo!!}  --}}
                                    <h5>ab CHF {{$p->adult_price}}</h5>
                                    <p class="offerPriceP1">EUR {{floor($p->adult_price/$data['exchange'])}}* </p>
                                    <p class="paddP offerPriceP2">Pro {{$od->personType}}</p>
                                    <p class="offerPriceP3">* Richtwert</p>
                                @endif
                                @if ($p->currency==1)
                                    <h5>ab EUR {{$p->adult_price}}</h5> 
                                    <p class="offerPriceP1">CHF {{floor($p->adult_price*$data['exchange'])}}*</p>
                                {{--  {!!$od->priceinfo!!}  --}}
                                    <p class="offerPriceP2">Pro {{$od->personType}}</p>
                                    <p class="offerPriceP3">* Richtwert</p>
                                @endif
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="buttHolder">
                    {{-- <a  class="btn btn-secondary" href="ausflug/{{$od->title_link}}">Mehr Infos</a> --}}
                    <a class="btn btn-secondary" href="{{url('ausflug/'.$od->title_link)}}/"  title="{{$od->title_link}}">Mehr Infos</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 catFooter1">
                {!! str_replace('h1', 'h2',$cat_seo[0]) !!}
            </div>
            <div class="col-12 col-md-12 col-lg-6 catFooter2">
                @if(count($cat_seo)>1)
                    <br>
                    {!!$cat_seo[1]!!}
                @endif
            </div>
        </div>
    </div>

    