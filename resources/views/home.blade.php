{{-- {{dd($data)}} --}}
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"name": "Meinweekend corporation",
"url": "https://www.meinweekend.ch",
"sameAs": [
"https://www.facebook.com/MeinWeekend/"
],
"contactPoint": {
"@type": "ContactPoint",
"url": "+41 (0) 43 288 06 26",
"contactType": "Customer service"
},
"logo": "https://www.meinweekend.ch/images/_logo-pdf.jpg"
}


</script>

<div id="homeindicator"></div>
{{-- <div class="specialMessage">
Do Not Test
</div> --}}
<div class="container-fluid slFiHeight">
    <div class="row slFiHeight">
        <div class="col-12 carWarp nopadding slFiHeight">
            <div id="carouselExampleSlidesOnly" class="carousel slide slFiHeight" data-ride="carousel">
                <div class="carousel-inner slFiHeight">
                    <div class="carousel-item flexPushC active slFiHeight">
                        <img class="img-fluid slImg slFiHeight" src="{{url('assets/images/header/slider.jpg')}}"
                             title="Ein unvergessliches Erlebnis" alt="Ein unvergessliches Erlebnis">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Ein<br>unvergessliches<br>Erlebnis</h1>
                            <p>MeinWeekend</p>
                        </div>
                    </div>
                    <div class="carousel-item flexPushC slFiHeight">
                        <img class="img-fluid slImg slFiHeight"
                             src="{{url('assets/img/FloraAlpina/0417e_Sonnenuntergang.jpg')}}"
                             title="Etwas für die Seele" alt="Etwas für die Seele">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Etwas<br>für die Seele</h2>
                            <p>MeinWeekend</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mainCont">
    @include('navoverview')
    @include('navoverview2')
    @include('navoverview4')
</div>
<div class="container-fluid mobileMassonaryHide">
    @php
        $gridCount=1;
        $rowCount=1;
        $rowCreate=0;
        $horizontalSpanB0='col-3';
        $horizontalSpanB1='col-3';
        $horizontalSpanB2='col-6';
        $horizontalSpanB3='col-6';
        $rowLongH='rowLong';
        $rowShortH='rowShort';
        $rowLimitPrew=3;
        $rowLimit=4;
        $rowLimitOriginal=4;
        $seasonDetect=0;
        $catForeachCount=0;
        $pushFirstTime=true;
        $pushCreateRow=true;
        $pushEndRow=false;
        $gridExpentencyChanged=false;
        $pushCreateRowGridExp=false;
        $gridExpentency=false;
        $rowType=1;
        $boxNextLayout=20000;
        $boxCheckRun=false;
        $specialSingleRow=false;
        $currentSeason=0;
        $seasonChange=false;
        $seasonConvert=0;
        $seasonCompleted=false;
        $previousSeason=0;
        $nextVarAvailable=false;
        $seasonFinalIndic=false;
    @endphp
    {{-- {{dd($data['categoryData'])}} --}}
    @foreach($data['categoryData'] as $p)
        @php
            $seasonDetect=$catForeachCount-1;
            if($seasonDetect>-1)
            {
            if($data['categoryData'][$seasonDetect]->category_season==3 || $data['categoryData'][$seasonDetect]->category_season==4)
            {
            $previousSeason=1;
            }
            else {
            $previousSeason=0;
            }
            }
            if($p->category_season==3 || $p->category_season==4)
            {
            $seasonConvert=1;
            }
            else {
            $seasonConvert=0;
            }
            //echo "previousSeason ".$previousSeason.' $seasonConvert '.$seasonConvert;
            if($previousSeason!=$seasonConvert)
            {
            $seasonChange=true;
            $horizontalSpanB0='col-2';
            $horizontalSpanB1='col-2';
            $horizontalSpanB2='col-4';
            $horizontalSpanB3='col-4';

            $rowLongH = "rowLongSecondary";
            $rowShortH = "rowShortSecondary";
            $rowLimitPrew=5;
            $rowLimit=6;
            }
        @endphp

        @php
            $nextBox=$catForeachCount+1;
            $nextBoxS=$nextBox+1;
            $nextBoxT=$nextBoxS+1;
            if($nextBox<count($data['categoryData']))
            {
            $nextVarAvailable=true;
            if($nextBoxS<count($data['categoryData']) && $nextBoxT<count($data['categoryData']))
            {
            $boxCheckRun =true;
            if($data['categoryData'][$nextBox]->box_layout==0 && $data['categoryData'][$nextBoxS]->box_layout==0 && $data['categoryData'][$nextBoxT]->box_layout==0)
            {
            //echo "else";
            $boxNextLayout=20000;
            }
            else {
            if($data['categoryData'][$nextBox])
            {
            $boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
            }
            }
            }
            else {
            if($data['categoryData'][$nextBox])
            {
            $boxNextLayout=20000;
            //$boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
            }
            }
            //print_r(count($data['categoryData']));
            }
            else {
            $boxNextLayout=20000;
            }
            $seasonDetect=$catForeachCount-1;
            if($seasonDetect>0)
            {

            }
            //$boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
            //echo "Box Layout: ".$p->box_layout;

        @endphp
        @if($seasonChange===true && $seasonCompleted === false)
            @php
                $seasonChange=false;
                if($rowCreate!=0)
                {
                $pushCreateRowGridExp=true;
                }
                $seasonFinalIndic=true;
            @endphp


            @if($pushCreateRowGridExp)
                @if($rowCreate != $rowLimitOriginal)
                    {{$rowLimit}}</div>
@endif
@php
    //$rowCreate=0;
    //$gridExpentency=false;
@endphp
<div class=" row seasonChangeIndicator">
</div>
@if($p->box_layout==1 || $p->box_layout==3)
    <div class="row {{$rowLongH}}">
        @php
            $rowType=1;
        @endphp
        @else
            @if($p->box_layout==0 && $boxNextLayout==0)
                <div class="row {{$rowLongH}}">
                    @php
                        $rowType=1;
                    @endphp
                    @else
                        <div class="row {{$rowShortH}}">
                            @php
                                //echo $boxNextLayout;
                                $rowType=2;
                            @endphp
                            @endif
                            @endif
                            @php
                                $rowCreate=0;
                                $pushCreateRowGridExp=false;
                                $pushCreateRow=false;
                            @endphp
                            @endif
                            @endif
                            @if($pushCreateRow===true || $pushFirstTime===true)
                                @php
                                    $pushFirstTime=false;
                                    $pushCreateRow=false;
                                    $rowCreate=0;
                                @endphp
                                @if($p->box_layout==1 || $p->box_layout==3)
                                    <div class="row {{$rowLongH}}">
                                        @php
                                            $rowType=1;
                                        @endphp
                                        @else
                                            @if($p->box_layout==0 && $boxNextLayout==0)
                                                <div class="row {{$rowLongH}}">
                                                    @php
                                                        $rowType=1;
                                                    @endphp
                                                    @else
                                                        <div class="row {{$rowShortH}}">
                                                            @php
                                                                $rowType=2;
                                                            @endphp
                                                            @endif
                                                            @endif
                                                            @endif
                                                            {{-- {{$rowCreate}} pre --}}
                                                            @if($gridExpentency === true)

                                                                {{-- post in {{$rowCreate}} --}}
                                                                @php
                                                                    //$rowCreate-=1;
                                                                    $gridExpentencyChanged=true;
                                                                    $gridExpentency=false;
                                                                @endphp
                                                                @if($p->box_layout==0)
                                                                    <div class="boxSize1 boxCollapsed">
                                                                        <div class="masonryWarp">
                                                                            @if($p->parent==1)
                                                                                <a href="{{url('weekend/'.$p->value_alias)}}/"
                                                                                   class="thumbnail"
                                                                                   title="{{$p->title}}">
                                                                                    <img class="img-fluid"
                                                                                         src="{{url('assets'.$p->identifier)}}"
                                                                                         alt="{{$p->title}}"
                                                                                         title="{{$p->title}}"/>
                                                                                </a>
                                                                            @elseif($p->parent==2)
                                                                                <a href="{{url('tagesausflug/'.$p->value_alias)}}/"
                                                                                   class="thumbnail"
                                                                                   title="{{$p->title}}">
                                                                                    <img class="img-fluid"
                                                                                         src="{{url('assets'.$p->identifier)}}"
                                                                                         alt="{{$p->title}}"
                                                                                         title="{{$p->title}}"/>
                                                                                </a>
                                                                            @else
                                                                                <a href="{{url('gruppenausfluege/'.$p->value_alias)}}/"
                                                                                   class="thumbnail"
                                                                                   title="{{$p->title}}">
                                                                                    <img class="img-fluid"
                                                                                         src="{{url('assets'.$p->identifier)}}"
                                                                                         alt="{{$p->title}}"
                                                                                         title="{{$p->title}}"/>
                                                                                </a>
                                                                            @endif
                                                                            <div class="titleWarp">
                                                                                <div class="titleCont">
                                                                                    <span class="masonryWarp-test">{{$p->title}} {{-- next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}//  --}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                        @if($pushCreateRowGridExp)
                                                </div>
                                                @php
                                                    //$rowCreate=0;
                                                    //$gridExpentency=false;
                                                @endphp


                                                @if($p->box_layout==1 || $p->box_layout==3)
                                                    <div class="row {{$rowLongH}}">
                                                        @php
                                                            $rowType=1;
                                                        @endphp
                                                        @else
                                                            @if($p->box_layout==0 && $boxNextLayout==0)
                                                                <div class="row {{$rowLongH}}">
                                                                    @php
                                                                        $rowType=1;
                                                                    @endphp
                                                                    @else
                                                                        @php
                                                                            $seasonDetect=$catForeachCount+1;
                                                                            if($seasonDetect<count($data['categoryData']))
                                                                            {
                                                                            if($data['categoryData'][$seasonDetect]->category_season==3 || $data['categoryData'][$seasonDetect]->category_season==4)
                                                                            {
                                                                            $previousSeason=1;
                                                                            }
                                                                            else {
                                                                            $previousSeason=0;
                                                                            }
                                                                            }
                                                                            if($p->category_season==3 || $p->category_season==4)
                                                                            {
                                                                            $seasonConvert=1;
                                                                            }
                                                                            else {
                                                                            $seasonConvert=0;
                                                                            }
                                                                            //echo "previousSeason ".$previousSeason.' $seasonConvert '.$seasonConvert;
                                                                            if($previousSeason!=$seasonConvert)
                                                                            {
                                                                            $seasonChange=true;
                                                                            $horizontalSpanB0='col-2';
                                                                            $horizontalSpanB1='col-2';
                                                                            $horizontalSpanB2='col-4';
                                                                            $horizontalSpanB3='col-4';
                                                                            $rowLongH = "rowLongSecondary";
                                                                            $rowShortH = "rowShortSecondary";
                                                                            $rowLimitPrew=5;
                                                                            $rowLimit=6;
                                                                            }
                                                                        @endphp
                                                                        @if($seasonChange===true)
                                                                            @php
                                                                                $seasonFinalIndic=true;
                                                                                $seasonCompleted=true;
                                                                            @endphp
                                                                            <div class="row seasonChangeIndicator">
                                                                            </div>
                                                                        @endif

                                                                        <div class="row {{$rowShortH}}">
                                                                            @php
                                                                                //echo $boxNextLayout;
                                                                                $rowType=2;
                                                                            @endphp
                                                                            @endif
                                                                            @endif
                                                                            @php
                                                                                $rowCreate=0;
                                                                                $pushCreateRowGridExp=false;
                                                                            @endphp
                                                                            @endif

                                                                            @elseif($p->box_layout==2)
                                                                                <div class="boxCollapsed">
                                                                                    <div class="masonryWarp">
                                                                                        @if($p->parent==1)
                                                                                            <a href="{{url('weekend/'.$p->value_alias)}}/"
                                                                                               class="thumbnail"
                                                                                               title="{{$p->title}}">
                                                                                                <img class="img-fluid"
                                                                                                     src="{{url('assets'.$p->identifier)}}"
                                                                                                     title="{{$p->title}}"
                                                                                                     alt="{{$p->title}}"/>
                                                                                            </a>
                                                                                        @elseif($p->parent==2)
                                                                                            <a href="{{url('tagesausflug/'.$p->value_alias)}}/"
                                                                                               class="thumbnail"
                                                                                               title="{{$p->title}}">
                                                                                                <img class="img-fluid"
                                                                                                     src="{{url('assets'.$p->identifier)}}"
                                                                                                     title="{{$p->title}}"
                                                                                                     alt="{{$p->title}}"/>
                                                                                            </a>
                                                                                        @else
                                                                                            <a href="{{url('gruppenausfluege/'.$p->value_alias)}}/"
                                                                                               class="thumbnail"
                                                                                               title="{{$p->title}}">
                                                                                                <img class="img-fluid"
                                                                                                     src="{{url('assets'.$p->identifier)}}"
                                                                                                     title="{{$p->title}}"
                                                                                                     alt="{{$p->title}}"/>
                                                                                            </a>
                                                                                        @endif
                                                                                        <div class="titleWarp">
                                                                                            <div class="titleCont">
                                                                                                <span class="masonryWarp-test">{{$p->title}} {{-- next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}//  season: {{$seasonFinalIndic}} --}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        @php
                                                                            if($loop->last)
                                                                            {
                                                                            $rowCreate=0;
                                                                            $pushCreateRowGridExp=false;
                                                                            }
                                                                        @endphp
                                                                        @if($pushCreateRowGridExp)
                                                                </div>
                                                                @php
                                                                    //$rowCreate=0;
                                                                    //$gridExpentency=false;
                                                                @endphp
                                                                @if($p->box_layout==1 || $p->box_layout==3)
                                                                    <div class="row {{$rowLongH}}">
                                                                        @php
                                                                            $rowType=1;
                                                                        @endphp
                                                                        @else
                                                                            @if($p->box_layout==0 && $boxNextLayout==0)
                                                                                <div class="row {{$rowLongH}}">
                                                                                    @php
                                                                                        $rowType=1;
                                                                                    @endphp
                                                                                    @else
                                                                                        <div class="row {{$rowShortH}}">
                                                                                            @php
                                                                                                $rowType=2;
                                                                                            @endphp
                                                                                            @endif
                                                                                            @endif
                                                                                            @php
                                                                                                $rowCreate=0;
                                                                                                $pushCreateRowGridExp=false;
                                                                                            @endphp
                                                                                            @endif
                                                                                            @else
                                                                                                Please add a 1x1 here rc
                                                                                                gc= {{$rowCreate}}
                                                                                                @php
                                                                                                    //$rowCreate-=1;
                                                                                                    //$gridExpentency=false;
                                                                                                @endphp
                                                                                        </div>
                                                                                        @if($pushCreateRowGridExp)
                                                                                </div>
                                                                                @php
                                                                                    //$rowCreate=0;
                                                                                    //$gridExpentency=false;
                                                                                @endphp
                                                                                @if($p->box_layout==1 || $p->box_layout==3)
                                                                                    <div class="row {{$rowLongH}}">
                                                                                        @php
                                                                                            $rowType=1;
                                                                                        @endphp
                                                                                        @else
                                                                                            @if($p->box_layout==0 && $boxNextLayout==0)
                                                                                                <div class="row {{$rowLongH}}">
                                                                                                    @php
                                                                                                        $rowType=1;
                                                                                                    @endphp
                                                                                                    @else
                                                                                                        <div class="row {{$rowShortH}}">
                                                                                                            @php
                                                                                                                $rowType=2;
                                                                                                            @endphp
                                                                                                            @endif
                                                                                                            @endif
                                                                                                            @php
                                                                                                                $rowCreate=0;
                                                                                                                $pushCreateRowGridExp=false;
                                                                                                            @endphp
                                                                                                            @endif
                                                                                                            @endif

                                                                                                            @else
                                                                                                                {{-- post out {{$rowCreate}} --}}
                                                                                                                @if($rowCreate==$rowLimitPrew && ($p->box_layout==2 || $p->box_layout==3))
                                                                                                                    <div class="{{$horizontalSpanB1}} masonry-column">
                                                                                                                        Please
                                                                                                                        add
                                                                                                                        a
                                                                                                                        1x1
                                                                                                                        here
                                                                                                                        rc= {{$rowCreate}}
                                                                                                                    </div>
                                                                                                        </div>
                                                                                                        @if($p->box_layout==1 || $p->box_layout==3)
                                                                                                            <div class="row {{$rowLongH}}">
                                                                                                                @php
                                                                                                                    $rowType=1;
                                                                                                                @endphp
                                                                                                                @else
                                                                                                                    @if($p->box_layout==0 && $boxNextLayout==0)
                                                                                                                        <div class="row {{$rowLongH}}">
                                                                                                                            @php
                                                                                                                                $rowType=1;
                                                                                                                            @endphp
                                                                                                                            @else
                                                                                                                                <div class="row {{$rowShortH}}">
                                                                                                                                    @php
                                                                                                                                        $rowType=2;
                                                                                                                                    @endphp
                                                                                                                                    @endif
                                                                                                                                    @endif
                                                                                                                                    @php
                                                                                                                                        $rowCreate=0;
                                                                                                                                        //$gridExpentency=false;
                                                                                                                                    @endphp
                                                                                                                                    @endif
                                                                                                                                    @if($p->box_layout==0)
                                                                                                                                        {{-- this div is closed in grid Expentency --}}
                                                                                                                                        @if($rowType==1)
                                                                                                                                            <div class="{{$horizontalSpanB0}} masonry-column">
                                                                                                                                                <div class="boxSize1 boxCollapsed">
                                                                                                                                                    @else
                                                                                                                                                        <div class="{{$horizontalSpanB0}} masonry-column">
                                                                                                                                                            @endif
                                                                                                                                                            <div class="masonryWarp">
                                                                                                                                                                @if($p->parent==1)
                                                                                                                                                                    <a href="{{url('weekend/'.$p->value_alias)}}/"
                                                                                                                                                                       class="thumbnail"
                                                                                                                                                                       title="{{$p->title}}">
                                                                                                                                                                        <img class="img-fluid"
                                                                                                                                                                             src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                             title="{{$p->title}}"
                                                                                                                                                                             alt="{{$p->title}}"/>
                                                                                                                                                                    </a>
                                                                                                                                                                @elseif($p->parent==2)
                                                                                                                                                                    <a href="{{url('tagesausflug/'.$p->value_alias)}}/"
                                                                                                                                                                       class="thumbnail"
                                                                                                                                                                       title="{{$p->title}}">
                                                                                                                                                                        <img class="img-fluid"
                                                                                                                                                                             src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                             title="{{$p->title}}"
                                                                                                                                                                             alt="{{$p->title}}"/>
                                                                                                                                                                    </a>
                                                                                                                                                                @else
                                                                                                                                                                    <a href="{{url('gruppenausfluege/'.$p->value_alias)}}/"
                                                                                                                                                                       class="thumbnail"
                                                                                                                                                                       title="{{$p->title}}">
                                                                                                                                                                        <img class="img-fluid"
                                                                                                                                                                             src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                             title="{{$p->title}}"
                                                                                                                                                                             alt="{{$p->title}}"/>
                                                                                                                                                                    </a>
                                                                                                                                                                @endif
                                                                                                                                                                <div class="titleWarp">
                                                                                                                                                                    <div class="titleCont">
                                                                                                                                                                        <h5>
                                                                                                                                                                            {{$p->title}}
                                                                                                                                                                            {{-- next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}//  season: {{$seasonFinalIndic}} --}}
                                                                                                                                                                        </h5>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>

                                                                                                                                                            @if($rowType==1)
                                                                                                                                                                @php
                                                                                                                                                                    $gridExpentency=true;
                                                                                                                                                                    $gridExpentencyChanged=false;
                                                                                                                                                                @endphp
                                                                                                                                                            @endif
                                                                                                                                                            @php
                                                                                                                                                                $rowCreate+=1;
                                                                                                                                                            @endphp
                                                                                                                                                        </div>
                                                                                                                                                        @elseif($p->box_layout==1)
                                                                                                                                                            <div class="{{$horizontalSpanB1}} masonry-column boxSize2">
                                                                                                                                                                <div class="masonryWarp">
                                                                                                                                                                    @if($p->parent==1)
                                                                                                                                                                        <a href="{{url('weekend/'.$p->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$p->title}}">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                 title="{{$p->title}}"
                                                                                                                                                                                 alt="{{$p->title}}"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    @elseif($p->parent==2)
                                                                                                                                                                        <a href="{{url('tagesausflug/'.$p->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$p->title}}">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                 title="{{$p->title}}"
                                                                                                                                                                                 alt="{{$p->title}}"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    @else
                                                                                                                                                                        <a href="{{url('gruppenausfluege/'.$p->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$p->title}}">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                 title="{{$p->title}}"
                                                                                                                                                                                 alt="{{$p->title}}"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    @endif
                                                                                                                                                                    <div class="titleWarp">
                                                                                                                                                                        <div class="titleCont">
                                                                                                                                                                            <span class="masonryWarp-test">{{$p->title}} {{-- next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}//  season: {{$seasonFinalIndic}} --}}</span>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            @php
                                                                                                                                                                $rowCreate+=1;
                                                                                                                                                            @endphp
                                                                                                                                                        @elseif($p->box_layout==2)
                                                                                                                                                            @if($rowType==1 && $rowCreate>1)
                                                                                                                                                                <div class="{{$horizontalSpanB2}} masonry-column">
                                                                                                                                                                    <div class="boxSize3 boxCollapsed">
                                                                                                                                                                        @php
                                                                                                                                                                            $gridExpentency=true;
                                                                                                                                                                            $gridExpentencyChanged=false;
                                                                                                                                                                        @endphp
                                                                                                                                                                        @else
                                                                                                                                                                            <div class="{{$horizontalSpanB3}} masonry-column">
                                                                                                                                                                                @endif
                                                                                                                                                                                <div class="masonryWarp">
                                                                                                                                                                                    @if($p->parent==1)
                                                                                                                                                                                        <a href="{{url('weekend/'.$p->value_alias)}}/"
                                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                                           title="{{$p->title}}">
                                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                                 src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                                 title="{{$p->title}}"
                                                                                                                                                                                                 alt="{{$p->title}}"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    @elseif($p->parent==2)
                                                                                                                                                                                        <a href="{{url('tagesausflug/'.$p->value_alias)}}/"
                                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                                           title="{{$p->title}}">
                                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                                 src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                                 title="{{$p->title}}"
                                                                                                                                                                                                 alt="{{$p->title}}"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    @else
                                                                                                                                                                                        <a href="{{url('gruppenausfluege/'.$p->value_alias)}}/"
                                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                                           title="{{$p->title}}">
                                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                                 src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                                 title="{{$p->title}}"
                                                                                                                                                                                                 alt="{{$p->title}}"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    @endif
                                                                                                                                                                                    <div class="titleWarp">
                                                                                                                                                                                        <div class="titleCont">
                                                                                                                                                                                            <span class="masonryWarp-test">{{$p->title}} {{-- next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}//  season: {{$seasonFinalIndic}} --}}</span>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            @php
                                                                                                                                                                                $rowCreate+=2;
                                                                                                                                                                            @endphp
                                                                                                                                                                            @elseif($p->box_layout==3)
                                                                                                                                                                                <div class="{{$horizontalSpanB3}} masonry-column boxSize4">
                                                                                                                                                                                    <div class="masonryWarp">
                                                                                                                                                                                        @if($p->parent==1)
                                                                                                                                                                                            <a href="{{url('weekend/'.$p->value_alias)}}/"
                                                                                                                                                                                               class="thumbnail"
                                                                                                                                                                                               title="{{$p->title}}">
                                                                                                                                                                                                <img class="img-fluid"
                                                                                                                                                                                                     src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                                     title="{{$p->title}}"
                                                                                                                                                                                                     alt="{{$p->title}}"/>
                                                                                                                                                                                            </a>
                                                                                                                                                                                        @elseif($p->parent==2)
                                                                                                                                                                                            <a href="{{url('tagesausflug/'.$p->value_alias)}}/"
                                                                                                                                                                                               class="thumbnail"
                                                                                                                                                                                               title="{{$p->title}}">
                                                                                                                                                                                                <img class="img-fluid"
                                                                                                                                                                                                     src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                                     title="{{$p->title}}"
                                                                                                                                                                                                     alt="{{$p->title}}"/>
                                                                                                                                                                                            </a>
                                                                                                                                                                                        @else
                                                                                                                                                                                            <a href="{{url('gruppenausfluege/'.$p->value_alias)}}/"
                                                                                                                                                                                               class="thumbnail"
                                                                                                                                                                                               title="{{$p->title}}">
                                                                                                                                                                                                <img class="img-fluid"
                                                                                                                                                                                                     src="{{url('assets'.$p->identifier)}}"
                                                                                                                                                                                                     title="{{$p->title}}"
                                                                                                                                                                                                     alt="{{$p->title}}"/>
                                                                                                                                                                                            </a>
                                                                                                                                                                                        @endif
                                                                                                                                                                                        <div class="titleWarp">
                                                                                                                                                                                            <div class="titleCont">
                                                                                                                                                                                                <span class="masonryWarp-test">{{$p->title}} {{-- next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// season: {{$seasonFinalIndic}}  --}}</span>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                @php
                                                                                                                                                                                    $rowCreate+=2;
                                                                                                                                                                                @endphp
                                                                                                                                                                            @else
                                                                                                                                                                            @endif
                                                                                                                                                                            @if($rowCreate==$rowLimit && !$gridExpentency)
                                                                                                                                                                    </div>
                                                                                                                                                                    @php
                                                                                                                                                                        $pushCreateRow=true;
                                                                                                                                                                    @endphp
                                                                                                                                                                    @elseif($rowCreate==$rowLimit && $gridExpentency)
                                                                                                                                                                        @php
                                                                                                                                                                            $pushCreateRowGridExp=true;
                                                                                                                                                                        @endphp
                                                                                                                                                                    @endif
                                                                                                                                                                    @endif
                                                                                                                                                                    @if($loop->last)
                                                                                                                                                                        @if($rowCreate!=$rowLimit)
                                                                                                                                                                </div>
                                                                                                                                                            @endif
                                                                                                                                                        @endif
                                                                                                                                                        @php
                                                                                                                                                                @endphp
                                                                                                                                                        @php
                                                                                                                                                            $gridCount++;
                                                                                                                                                            $catForeachCount++;
                                                                                                                                                        @endphp

                                                                                                                                                        {{-- This closes row from pushCreateRow variable --}}

                                                                                                                                                        @endforeach
                                                                                                                                                        <div class="row seasonChangeIndicator">
                                                                                                                                                        </div>

                                                                                                                                                        @include('navoverview2')

                                                                                                                                                </div>
                                                                                                                                                <div class="container-fluid mainCont2 hiddeDiv">
                                                                                                                                                    @foreach($data['categoryData'] as $cd)
                                                                                                                                                        @if($cd->parent==1)
                                                                                                                                                            <div class="row cardWarper">
                                                                                                                                                                <div class="col-5 nopadding imgDivWarp">
                                                                                                                                                                    <div class="mobImgCatHolder">
                                                                                                                                                                        <a href="{{url('weekend/'.$cd->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$cd->title}}">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="{{url('assets'.$cd->identifier)}}"
                                                                                                                                                                                 title="{{$cd->title}}"
                                                                                                                                                                                 alt="{{$cd->title}}"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-7">
                                                                                                                                                                    <div class="catHold">

                                                                                                                                                                        <a href="{{url('weekend/'.$cd->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$cd->title}}">
                                                                                                                                                                            <p>{{$cd->title}}</p>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        @elseif($cd->parent==2)
                                                                                                                                                            <div class="row cardWarper">
                                                                                                                                                                <div class="col-5 nopadding imgDivWarp">
                                                                                                                                                                    <div class="mobImgCatHolder">
                                                                                                                                                                        <a href="{{url('tagesausflug/'.$cd->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$cd->title}}"><img
                                                                                                                                                                                    class="img-fluid"
                                                                                                                                                                                    src="{{url('assets'.$cd->identifier)}}"
                                                                                                                                                                                    alt="{{$cd->title}}"/></a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-7">
                                                                                                                                                                    <div class="catHold">

                                                                                                                                                                        <a href="{{url('tagesausflug/'.$cd->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$cd->title}}">
                                                                                                                                                                            <p>{{$cd->title}}</p>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        @elseif($cd->parent==3)
                                                                                                                                                            <div class="row cardWarper">
                                                                                                                                                                <div class="col-5 nopadding imgDivWarp">
                                                                                                                                                                    <div class="mobImgCatHolder">
                                                                                                                                                                        <a href="{{url('gruppenausfluege/'.$cd->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$cd->title}}"><img
                                                                                                                                                                                    class="img-fluid"
                                                                                                                                                                                    src="{{url('assets'.$cd->identifier)}}"
                                                                                                                                                                                    alt="{{$cd->title}}"/></a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-7">
                                                                                                                                                                    <div class="catHold">

                                                                                                                                                                        <a href="{{url('gruppenausfluege/'.$cd->value_alias)}}/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="{{$cd->title}}">
                                                                                                                                                                            <p>{{$cd->title}}</p>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        @endif
                                                                                                                                                    @endforeach
                                                                                                                                                </div>
                                                                                                                                                <div class="container-fluid footerCont">
                                                                                                                                                    <div class="row nopadding footerPart">
                                                                                                                                                        <div class="col-12 col-md-6 col-lg-6 nopadding fP1">
                                                                                                                                                            {!! \App\Helpers\Helpers::clean_text($seo[0]) !!}
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-12 col-md-6 col-lg-6 nopadding fP2">
                                                                                                                                                            @if(count($seo)>1)
                                                                                                                                                                {!! \App\Helpers\Helpers::clean_text($seo[1]) !!}
                                                                                                                                                            @endif
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>