{{-- {{dd($filteredNav)}} --}}

@if( (isset($blue) || isset($data['nooffer'])) && isset($filteredNav['gjyshi']) && $filteredNav['gjyshi']>0  && ($filteredNav['gjyshiStatik']==1 || $filteredNav['gjyshiStatik']==2 || $filteredNav['gjyshiStatik']==3))
<div class="row navOver4D">
  
    @foreach($data['categoryData'] as $cd)
        @if($cd->parent2==$filteredNav['selected'])
            <div class="subCatWarp {{$filteredNav['selectedChild']==$cd->uid ? 'subActive':''}}">
                {{-- <a  href="list-offers/region/alle/offer_type/{{$cd->title_url}}/duration/alle/keyword/alle" >{{$cd->title}}</a> --}}
                @if($filteredNav['gjyshiStatik']==1)
                    <a  href="{{url('weekend/'.$cd->value_alias)}}/" class="thumbnail" title="{{$cd->title}}">
                    {{$cd->title}}
                    </a>
                @elseif($filteredNav['gjyshiStatik']==2)
                    <a  href="{{url('tagesausflug/'.$cd->value_alias)}}/" class="thumbnail" title="{{$cd->title}}">
                    {{$cd->title}}
                    </a>
                @else
                    <a  href="{{url('gruppenausfluege/'.$cd->value_alias)}}/" class="thumbnail" title="{{$cd->title}}">
                    {{$cd->title}}
                    </a>
                @endif
            </div>
        @endif
    @endforeach
</div>

@endif
@if( isset($blue))
<div class="row navOver4H">
@else
<div class="row navOver4H">
@endif
{{-- category_link is the  value in the uniquealias table of current category  --}}
    @if(!isset($category_link) || (isset($category_link) && $category_link ==''))
        @php
            $category_link="/";
        @endphp
    @else
        @php
            $category_link='/'.$category_link.'/';
        @endphp
    @endif
        @php
        //we need $maincat to build the link
            $mainCat='erlebnis-schweiz';
            if(isset($filteredNav['gjyshiStatik'])){
                if($filteredNav['gjyshiStatik']==1){
                    $mainCat='weekend';
                }else if($filteredNav['gjyshiStatik']==2){
                    $mainCat='tagesausflug';
                }else if($filteredNav['gjyshiStatik']==3){
                    $mainCat='gruppenausfluege';   
                }
            }
            
        @endphp
    
    <p class="regionenAlle">REGIONEN:</p>
    <a  href="{{url('/'.$mainCat.$category_link)}}/">
        <p class="allRegionOpt">Alle Region</p>
    </a> 
    @foreach($data['regions'] as $r)
    <div class="masterRegionHoler">
        {{-- <a  href="list-offers/region/{{$r->value_alias}}/offer_type/{{$categoryName}}/duration/alle/keyword/alle"> --}}
        <a  href="{{url('/'.$mainCat.$category_link.'region/'.$r->value_alias)}}/" title="{{$r->title}}">
            {{$r->title}}
        </a>
        <ul class="align-self-center">
        @foreach($r->subRegions as $sr)
        <li class="subCats"><a  href="{{url('/'.$mainCat.$category_link.'region/'.$sr->value_alias)}}/" title="{{$sr->title}}">
            
                {{$sr->title}}
            
        </a></li>
        {{-- <li class="subCats"><a  href="list-offers/region/{{$sr->value_alias}}/offer_type/{{$categoryName}}/duration/alle/keyword/alle">
            
                {{$sr->title}}
            
        </a></li> --}}
        @endforeach
        </ul>
    </div>
    @endforeach
</div>