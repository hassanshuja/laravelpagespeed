
<div class="container-fluid">    
    <div class="row navInfoH">
        <div class="col-0 col-sm-0 col-md-0 col-lg-7 navBARText">
            <div class="">
                    @if(isset($data['title_tag']))
                        <p id="titleTag">{{$data['title_tag']}}</p>
                    @else
                        <p id="titleTag">Wellness Romantik Weekend Tagesausflüge Gruppenausflüge - Erlebnis Schweiz zum Buchen oder als Geschenkgutschein</p>
                    @endif
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 navBARNum">
            <div class="workingHoursHoldMain navBarRight" style="display:inline-block;">

                    <p> Mo - Fr 09.00 - 18.00 </p>

                    <p>Sa - 09.00 - 12.00 </p>

            </div>
            <div class="numHoldER">
            <p>Rufen Sie uns an:</p><span style="cursor: pointer" id="calltoDevice" class="linkPushNoAjax"></span><h4>+41 (0) 43 288 06 26</h4>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 navWarp nopadding">
            <div class="navBackImg"></div>
            <nav class="navbar navbar-expand-lg nopadding">
                <a class="navbar-brand"  href="https://www.meinweekend.ch/"><img src="https://www.meinweekend.ch/images/meinweekend.svg" title="meinweekend" alt="meinweekend" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 384 448">
                        <g id="icomoon-ignore"> </g>
                        <path style="fill:#013a89;" d="M384 336v32c0 8.75-7.25 16-16 16h-352c-8.75 0-16-7.25-16-16v-32c0-8.75 7.25-16 16-16h352c8.75 0 16 7.25 16 16zM384 208v32c0 8.75-7.25 16-16 16h-352c-8.75 0-16-7.25-16-16v-32c0-8.75 7.25-16 16-16h352c8.75 0 16 7.25 16 16zM384 80v32c0 8.75-7.25 16-16 16h-352c-8.75 0-16-7.25-16-16v-32c0-8.75 7.25-16 16-16h352c8.75 0 16 7.25 16 16z"></path>
                        </svg>
                </button>

                <div class="navWarpCollapse collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="desktopVersionMainMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link"  href="{{url('/')}}/" >Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link"  href="{{url('/erlebnis-schweiz')}}/" >Alle Erlebnisse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/geschenkgutschein')}}/" >Geschenkgutschein</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{url('/newsletter')}}/" >Newsletter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{url('/ueber-uns')}}/" >Über uns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{url('/kontakt')}}/" >Kontakt</a>
                        </li>
                        
                    </ul>
                    </div>
                    <div class="mobileVersionMainMenu">
                    <ul class="navbar-nav">
                        <li data-toggle="collapse" data-target="#navbarSupportedContent" class="nav-item active">
                            <a class="nav-link"  href="{{url('/')}}/" >Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li data-toggle="collapse" data-target="#navbarSupportedContent" class="nav-item active">
                            <a class="nav-link"  href="{{url('/erlebnis-schweiz')}}/" >Alle Erlebnisse</a>
                        </li>
                        <li data-toggle="collapse" data-target="#navbarSupportedContent" class="nav-item">
                            <a class="nav-link" href="{{url('/geschenkgutschein')}}/" >Geschenkgutschein</a>
                        </li>
                        <li data-toggle="collapse" data-target="#navbarSupportedContent" class="nav-item">
                            <a class="nav-link"  href="{{url('/newsletter')}}/" >Newsletter</a>
                        </li>
                        <li data-toggle="collapse" data-target="#navbarSupportedContent" class="nav-item">
                            <a class="nav-link"  href="{{url('/ueber-uns')}}/">Über uns</a>
                        </li>
                        <li data-toggle="collapse" data-target="#navbarSupportedContent" class="nav-item">
                            <a class="nav-link"  href="{{url('/kontakt')}}/" >Kontakt</a>
                        </li>
                        
                    </ul>
                    </div>
                    <div class="navCatWarper">
                        <ul>
                            @foreach($data['categories'] as $nc)
                            @php
                                $mainCat='weekend';
                                if($nc->uid==2){
                                    $mainCat='tagesausflug';
                                }else if($nc->uid==3){
                                    $mainCat='gruppenausfluege';
                                }
                            @endphp
                               
                                <li>
                                <span class="rotateIconNav" onclick="toggleDivWithFilter('ulShow{{$nc->uid}}', 'rotateIcon')">{{$nc->title}}</span>
                                    <ul id="ulShow{{$nc->uid}}" class="navHideSubCat">
                                    @foreach($nc->subCategories as $nsc)
                                    {{-- {{dd($nsc->uid)}} --}}
                                    <li>
                                        <span class="rotateIconNav" onclick="toggleDivWithFilter('subUlShow{{$nsc->uid}}')">{{$nsc->title}}</span>
                                        <ul id="subUlShow{{$nsc->uid}}" class="navHideSubCat2"> 
                                            @foreach($data['subCategoriesMS'] as $msc)
                                                @if($msc->parent==$nsc->uid)
                                                    {{-- <li data-toggle="collapse" data-target="#navbarSupportedContent"><a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$nsc->title_url}}/duration/alle/keyword/alle">{{$msc->title}}</a></li> --}}
                                                    <li data-toggle="collapse" data-target="#navbarSupportedContent"><a  href="{{url('/'.$mainCat.'/'.$msc->title_urls)}}/">{{$msc->title}}</a></li>
                                                
                                                
                                                @endif
                                            @endforeach
                                        </ul>    
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
    (function() {
  if (window.innerWidth < 1000) {
  document.getElementById("calltoDevice").onclick = function() {
    var wnd = window.open("tel:+41-43-288-06-26");
    setTimeout(function() {
      wnd.close();
    }, 10);
    return false;
  };
}
})();
</script>