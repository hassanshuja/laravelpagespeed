<link rel="stylesheet" href="{{url('css/style.css')}}">
  {{-- {{dd($data)}} --}}
  @include('navoverview2')
<div class="container-fluid">
{{-- <div class="row"> --}}
{{-- <div class="col-12 nopadding">
    <div class="grid">
        <!-- width of .grid-sizer used for columnWidth -->
        @php
      $gridCount=1;
      $rowCount=1;
    @endphp
        @foreach($data['categoryData'] as $p)
        @if($gridCount==1)
        <div class="grid-sizer"></div>
        <div class="grid-item grid-item--height2">
            <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
              <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
            </a>
        </div>
        @else
        <div class="grid-sizer"></div>
        <div class="grid-item">
            <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
              <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
            </a>
        </div>
        @endif
  @php
        $gridCount++;
      @endphp
        @endforeach
      </div>
    </div> --}}
      {{-- </div> --}}
@php
      $gridCount=1;
      $rowCount=1;
      $rowCreate=0;
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
      $previousSeason=0;
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
    if($previousSeason!=$seasonConvert)
    {
      $seasonChange=true;
    }
    $nextBox=$catForeachCount+1;
    $nextBoxS=$nextBox+1;
    $nextBoxT=$nextBoxS+1;
    if($nextBox<count($data['categoryData']))
    {
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
    //$boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
    //echo "Box Layout: ".$p->box_layout;
    @endphp
    @if($pushCreateRow===true || $pushFirstTime===true)
        @php
          $pushFirstTime=false;
          $pushCreateRow=false;
          $rowCreate=0;
        @endphp
          @if($p->box_layout==1 || $p->box_layout==3)
          <div style="background:white;" class="row rowLong">
          @php
            $rowType=1;
          @endphp
          @else
            @if($p->box_layout==0 && $boxNextLayout==0)
            <div style="background:white;" class="row rowLong">
              @php
                $rowType=1;
              @endphp
            @else
            <div style="background:white;" class="row rowShort">
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
              <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
                <img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/>
              </a>
              <div class="titleWarp">
                <div class="titleCont">
                  <h5>
                    {{$p->title}}
                    next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// 
                  </h5>
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
            <div style="background:white;" class="row rowLong">
            @php
              $rowType=1;
            @endphp
          @else
            @if($p->box_layout==0 && $boxNextLayout==0)
              <div style="background:white;" class="row rowLong">
                @php
                  $rowType=1;
                @endphp
            @else
              <div style="background:white;" class="row rowShort">
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
              <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
                <img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/>
              </a>
              <div class="titleWarp">
                <div class="titleCont">
                  <h5>
                    {{$p->title}}
                    next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// 
                  </h5>
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
            <div style="background:white;" class="row rowLong">
            @php
              $rowType=1;
            @endphp
          @else
            @if($p->box_layout==0 && $boxNextLayout==0)
              <div style="background:white;" class="row rowLong">
                @php
                  $rowType=1;
                @endphp
            @else
              <div style="background:white;" class="row rowShort">
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
          Please add a 1x1 here rc gc= {{$rowCreate}}
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
            <div style="background:white;" class="row rowLong">
          @php
            $rowType=1;
          @endphp
        @else
          @if($p->box_layout==0 && $boxNextLayout==0)
            <div style="background:white;" class="row rowLong">
            @php
              $rowType=1;
            @endphp
          @else
            <div style="background:white;" class="row rowShort">
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
      @if($rowCreate==3 && ($p->box_layout==1 || $p->box_layout==2 || $p->box_layout==3))
        <div class="col-3 masonry-column sss">
          Please add a 1x1 here rc= {{$rowCreate}}
        </div>
      </div>
      @if($p->box_layout==1 || $p->box_layout==3)
        <div style="background:white;" class="row rowLong">
        @php
          $rowType=1;
        @endphp
      @else
          @if($p->box_layout==0 && $boxNextLayout==0)
          <div style="background:white;" class="row rowLong">
            @php
              $rowType=1;
            @endphp
          @else
           <div style="background:white;" class="row rowShort">
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
    <div class="col-3 masonry-column">
        <div class="boxSize1 boxCollapsed">
    @else
      <div class="col-3 masonry-column">
    @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>
                {{$p->title}} 
                next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// 
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
    <div class="col-3 masonry-column boxSize2">
      <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>
              {{$p->title}}
              next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// 
            </h5>
          </div>
        </div>
      </div>
    </div>
      @php
        $rowCreate+=1;
      @endphp
    @elseif($p->box_layout==2)
    @if($rowType==1 && $rowCreate>1)
    <div class="col-6 masonry-column">
      <div class="boxSize3 boxCollapsed">
          @php
          $gridExpentency=true;
          $gridExpentencyChanged=false;
        @endphp
    @else
    <div class="col-6 masonry-column">
    @endif
      <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>
              {{$p->title}}
              next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// 
            </h5>
          </div>
        </div>
      </div>
    </div>
    @php
      $rowCreate+=2;
    @endphp
    @elseif($p->box_layout==3)
    <div class="col-6 masonry-column boxSize4">
      <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>
              {{$p->title}}
              next: {{$boxNextLayout}} c: {{$gridCount}} rc: {{$rowCreate}} bl:{{$p->box_layout}}| //{{$gridExpentency}}// 
            </h5>
          </div>
        </div>
      </div>
    </div>
    @php
      $rowCreate+=2;
    @endphp
    @else
    @endif
       @if($rowCreate==4 && !$gridExpentency)
        </div>
        @php
        $pushCreateRow=true;
        @endphp
        @elseif($rowCreate==4 && $gridExpentency)
        @php
          $pushCreateRowGridExp=true;
        @endphp
       @endif
    @endif
    @if($loop->last)
    @if($rowCreate!=4)
    </div>
    @endif
    @php
    if($seasonChange===true)
    {
      echo "Season changed here";
    }
        //echo "row create".$rowCreate."<br>";
    @endphp
    @endif
    {{-- @if($p->parent==1)
      @if($gridCount==1 || $gridCount==5  || $gridCount==8 || $gridCount==11 || $gridCount==14 || $gridCount==16 || $gridCount==18)
        <div style="background:white;" id="massonaryHolderP_{{$rowCount}}" class="row">
            @php
            $rowCount++;
          @endphp
      @endif
      @if($gridCount==2 || $gridCount==3)
        @if($gridCount==2)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>{{$p->title}}
            </h5>
          </div>
        </div>
        </div>
        @if($gridCount==3)
          </div>
        @endif
      @elseif($gridCount==19 || $gridCount==20)
        @if($gridCount==19)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>{{$p->title}}
            </h5>
          </div>
        </div>
        </div>                  
        @if($gridCount==20)
          </div>
        @endif
        
      @elseif($gridCount==21 || $gridCount==22)
        @if($gridCount==21)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>{{$p->title}}
            </h5>
          </div>
        </div>
        </div>                  
        @if($gridCount==22)
          </div>
        @endif

        @else
          <div class="{{$p->category_class}} masonry-column ">
            <div class="masonryWarp">
            <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
              <img  class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
            </a>
            <div class="titleWarp">
              <div class="titleCont">
                <h5>{{$p->title}}
                </h5>
              </div>
            </div>
            </div>
          </div>
        @endif
          
          @if($gridCount==4 || $gridCount==7 || $gridCount==10 || $gridCount==13 || $gridCount==15 || $gridCount==17 || $gridCount==22)
        </div>
      @endif
    
    @elseif($p->parent==2)
      @if($gridCount==1 || $gridCount==6 || $gridCount==11 || $gridCount==15 || $gridCount==18 || $gridCount==21)
        <div style="background:white;" id="massonaryHolderP2_{{$rowCount}}" class="row">
        @php
        $rowCount++;
        @endphp
      @endif
      @if($gridCount==2 || $gridCount==3)
        @if($gridCount==2)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div> 
        @if($gridCount==3)
          </div>
        @endif
      @elseif($gridCount==4 || $gridCount==5)
        @if($gridCount==4)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>                  
        @if($gridCount==5)
          </div>
        @endif
      @elseif($gridCount==6 || $gridCount==7)
        @if($gridCount==6)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
        @if($gridCount==7)
          </div>
        @endif
      @elseif($gridCount==9 || $gridCount==10)
        @if($gridCount==9)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
            <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
        @if($gridCount==10)
          </div>
        @endif
      @elseif($gridCount==16 || $gridCount==17)
        @if($gridCount==16)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
        @if($gridCount==17)
          </div>
        @endif
      @elseif($gridCount==22 || $gridCount==23 || $gridCount==24 || $gridCount==25)
        @if($gridCount==22)
          <div class="{{$p->category_class}} masonry-column"><div class="groupHorizontal">
        @endif
        @if($gridCount==24)
        <div class="groupHorizontal">
      @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
        
        @if($gridCount==23)
          </div>
        @endif
        @if($gridCount==25)
          </div></div>
        @endif
        
      @else
      <div class="{{$p->category_class}} masonry-column">
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
      </div>
      @endif
      
      @if($gridCount==5 || $gridCount==10 || $gridCount==14 || $gridCount==17 || $gridCount==20 || $gridCount==26)
        </div>
      @endif

    @elseif($p->parent==3)
      @if($gridCount==1 || $gridCount==3 || $gridCount==5 || $gridCount==9 || $gridCount==15)
        <div style="background:white;" id="massonaryHolderP3_{{$rowCount}}" class="row">
        @php
        $rowCount++;
        @endphp
      @endif
      
      @if($gridCount==5 || $gridCount==6 || $gridCount==7)
        @if($gridCount==5)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
        @if($gridCount==7)
          </div>
        @endif
      @elseif($gridCount==10 || $gridCount==11)
        @if($gridCount==10)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>
        @if($gridCount==11)
          </div>
        @endif

      @elseif($gridCount==13 || $gridCount==14)
        @if($gridCount==13)
          <div class="{{$p->category_class}} masonry-column">
        @endif
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>{{$p->title}}
              </h5>
            </div>
          </div>
        </div>                  
        @if($gridCount==14)
          </div>
        @endif
      
      @else
        <div class="{{$p->category_class}} masonry-column">
          <div class="masonryWarp">
            <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle" class="thumbnail">
              <img class="img-fluid imgPerRow_{{$gridCount}}" src="{{url('assets'.$p->identifier)}}"/>
            </a>
            <div class="titleWarp">
              <div class="titleCont">
                <h5>{{$p->title}}
                  </h5>
              </div>
            </div>
          </div>
        </div>
      @endif
    
      @if($gridCount==2 || $gridCount==4 || $gridCount==8 || $gridCount==14 || $gridCount==19)
        </div>
      @endif
    @endif
   --}}
      @php
        $gridCount++;
        $catForeachCount++;
      @endphp
       
       {{-- This closes row from pushCreateRow variable --}}
        
  @endforeach
    {{--  <div class="col-md-6 col-lg-4 masonry-column">
      <div>
        <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry1.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry2.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry8.jpg"></a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 masonry-column">
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry4.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry9.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry6.jpg"></a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 masonry-column">
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry10.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry11.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry12.jpg"></a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 masonry-column">
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry13.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry14.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry15.jpg"></a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 masonry-column">
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry16.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry3.png"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry5.jpg"></a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 masonry-column">
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry7.jpg"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry3.png"></a>
      </div>
      <div>
      <a href="http://placeholder.com" class="thumbnail"><img class="img-fluid" src="images/masonry5.jpg"></a>
      </div>
    </div>  --}}
  </div>
  <div class="container-fluid mainCont hiddeDiv">
    <div class="row">
      <div class="col-12 nopadding dropDwn">
        <div style="width:100%;" class="btn-group">
          <button style="width:100%;text-align:left;color:white;" type="button" class="btn"><strong>Filter</strong></button>
          <button style="color:white;" type="button" class="btn btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" >Action</a>
            <a class="dropdown-item" >Another action</a>
            <a class="dropdown-item" >Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" >Separated link</a>
          </div>
        </div>
      </div>
    </div>
    @foreach($data['categoryData'] as $cd)
    <div class="row cardWarper">
      <div class="col-6 nopadding">
        <a  href="{{URL('https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url}}/duration/alle/keyword/alle')}}" class="thumbnail"><img class="img-fluid" src="{{url('assets'.$p->identifier)}}"/></a>
      </div>
      <div class="col-6">
      <div class="catHold">
        <p>{{$cd->title}}</p>
      </div>
      </div>
    </div>
    @endforeach
  </div>
