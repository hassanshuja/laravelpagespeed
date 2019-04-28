  <div id="fb-root"></div>
            {{-- {{dd($allData['singleOfferData'])}} --}}
            {{-- {{dd($allData['singleOfferData'][0]->prices)}} --}}

            {{-- {{dd($allData['singleOfferData'][0])}} --}}
                    {{-- {{dd($allData['exchange'])}} --}}
                    {{-- <script type="application/ld+json">
                        {
                          "@context": "http://schema.org",
                          "@type": "Organization",
                          "name": "Meinweekend corporation",
                          "url": "{{Request::url()}}",
                          "sameAs": [
                            "https://www.facebook.com/MeinWeekend/"
                            ],
                          "contactPoint": {
                            "@type": "ContactPoint",
                            "telephone": "+377 45 870 050",
                            "contactType": "Customer service"
                          },
                          "logo": "https://www.meinweekend.ch/images/_logo-pdf.jpg"
                        }

                        </script>
                        <script type="application/ld+json">
                            {
                              "@context": "http://schema.org",
                              "@type": "BreadcrumbList",
                              "itemListElement": [{
                                "@type": "ListItem",
                                "position": 1,
                                "item": {
                                  "@id": "https://example.com/books",
                                  "name": "Books",
                                  "image": "http://example.com/images/icon-book.png"
                                }
                              },{
                                "@type": "ListItem",
                                "position": 2,
                                "item": {
                                  "@id": "https://example.com/books/authors",
                                  "name": "Authors",
                                  "image": "http://example.com/images/icon-author.png"
                                }
                              },{
                                "@type": "ListItem",
                                "position": 3,
                                "item": {
                                  "@id": "https://example.com/books/authors/annleckie",
                                  "name": "Ann Leckie",
                                  "image": "http://example.com/images/author-leckie-ann.png"
                                }
                              },{
                                "@type": "ListItem",
                                "position": 4,
                                "item": {
                                  "@id": "https://example.com/books/authors/ancillaryjustice",
                                  "name": "Ancillary Justice",
                                  "image": "http://example.com/images/cover-ancillary-justice.png"
                                }
                              }]
                            }
                            </script> --}}
    <div class="container-fluid">
        @include('navoverview2')
        @include('navoverview3')
        @include('navoverview4')
    </div>

    <div class="container-fluid stepsCont">
        <div class="row stepsHold justify-content-center">
            <div class="col-3 nopadding step1">
                <h5>01 </h5> <h5 class="mobileStepTextHide">ANKUNFTSDATUM</h5>
            </div>
            <div class="col-3 nopadding">
                <h5>02 </h5> <h5 class="mobileStepTextHide">IHRE RESERVATION</h5>
            </div>
            <div class="col-3 nopadding">
                <h5>03 </h5> <h5 class="mobileStepTextHide">KONTAKTDATEN</h5>
            </div>
            <div class="col-3 nopadding">
                <h5>04 </h5> <h5 class="mobileStepTextHide">ANFRAGEBESTÄTIGUNG</h5>
            </div>
            {{-- {{print_r($allData['singleOfferData'])}} --}}
            @foreach($allData['singleOfferData'] as $od)

        </div>
        <div class="row maxWidthnAutoMrg">
            <div class="col-12 titleWarp">
                <h1 class="underLine">{{$od->title}}</h1>
            </div>
        </div>
    </div>
<div class="part1N2">
    <div id="bookingStep1" class="section1 bookingSteps stepShowBookingSpecial">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 carouselCol">
                        <script>
                        $(document).ready(function () {
                                activateSlider();
                            });
                        </script>
                        <div class="slider1ContainerStyle" id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 780px; height: 300px;">
                            <!-- Slides Container -->
                            <div class="slider1Style" data-u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 780px; height: 300px;">
                                @foreach($allData['singleOfferData'][0]->images as $i)
                                <div>
                                    <img data-u="image" src="{{url('assets/img/'.ltrim($i->identifier, '/'))}}" title = "{{$i->title}}" alt="{{$i->title}}"/>
                                    @if($i->title !='')
                                        <div data-u="image" class="sliderImageDescription">
                                                {{$i->title}}
                                        </div>
                                        @endif
                                            <img data-u="thumb" src="{{url('assets/img/'.ltrim($i->identifier, '/'))}}" title = "{{$i->title}}" alt="{{$i->title}}"/>
                                </div>
                                @endforeach
                            </div>
                            <!-- ThumbnailNavigator Skin Begin -->
                           
                            <div data-u="thumbnavigator" class="jssort052 hideOnMobile" style="position:absolute;top: 300px;left:0px !important;bottom:0px;width:780px;height:100px;" data-autocenter="1" data-scale-bottom="0.75">
                                <div data-u="slides">
                                    <div data-u="prototype" class="p sliderThumbP" style="width:200px;height:100px;">
                                        <div data-u="thumbnailtemplate" class="t"></div>
                                    </div>
                                </div>
                                    <!--#region Arrow Navigator Skin Begin -->
                                <div data-u="arrowleft" class="jssora055 slider1ArrowStyleR" style="width:35px;height:67px;top:0px;left:0px;background: rgba(255, 255, 255, 0.8);" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora055 slider1ArrowStyleL" style="width:35px;height:67px;top:0px;right:-1px;background: rgba(255, 255, 255, 0.8);" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                                    </svg>
                                </div>
                                <!--#endregion Arrow Navigator Skin End -->

                            </div>
                            <!--#endregion Thumbnail Navigator Skin End -->

                            <!-- Trigger -->
                        </div>


                    </div>
                </div>
            </div>
            <div class="container">
            <div class="row infoHold">
                <div class="col-12 likeWarp">
                      <div class="fb-like" data-href="{{url()->full()}}" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="false" style="font-size: 17px;"></div>
                </div>
                <div class="col-12 col-lg-6 soloInfo" id="toggleHolder1" onclick="toggleDivWithclass('toggle3','toggleHolder1')">
                    @if($allData['singleOfferData'][0]->included_unit_text!=null)
                        <h4 class='click' >Leistungsumfang {{$allData['singleOfferData'][0]->included_unit_text}}<i class="fas fa-chevron-down rotateBack"></i></h4>
                    @else
                        <h4 class='click' >Leistungsumfang pro person<i class="fas fa-chevron-down rotateBack"></i></h4>
                    @endif

                    <div id="toggle3" class="switchDiv hiddeDiv">
                        {!!\App\Helpers\Helpers::clean_text($od->included); !!}
                    </div>
                </div>
                <div class="col-12 col-lg-6 soloInfo" id="toggleHolder2" onclick="toggleDivWithclass('toggle2','toggleHolder2')">
                @if($allData['singleOfferData'][0]->price_unit_text!=null)
                    <h4 class='click' >Preise {{$allData['singleOfferData'][0]->price_unit_text}}<i class="fas fa-chevron-down rotateBack"></i></h4>
                @else
                    <h4 class='click' >Preise pro person<i class="fas fa-chevron-down rotateBack"></i></h4>
                @endif

                    <div id="toggle2" class="switchDiv hiddeDiv">
                        {!!\App\Helpers\Helpers::clean_text($od->priceinfo) !!}
                    </div>
                </div>
            </div>
            <div class="row soloWarp">
                <div class="col-12 soloInfo" id="toggleHolder3" onclick="toggleDivWithclass('toggle1','toggleHolder3')">
                    <h4 class='click' >{{$od->title}}<i class="fas fa-chevron-down rotateBack"></i></h4>
                    <div id="toggle1" class="switchDiv hiddeDiv">
                        <p class="subHold">
                            {!!\App\Helpers\Helpers::clean_text($od->subtitle)!!}
                        </p>

                        <div>{!!\App\Helpers\Helpers::clean_text($od->bodytext)!!}</div>

                        
                    </div>
                </div>
            </div>
        </div>
        <div id="bookingStepb1"></div>
    </div>
    <div id="bookingStep1S2" class="section2 bookingSteps stepShowBookingSpecial">
        <div class="container">
            <div class="row">
                <div class="col-12">
              <div class="">
                    <input type="hidden" value="{{$od->calendar['firstOpenDate']}}" id="defDate"/>
                    <input type="hidden" value="{{$od->calendar['min']}}" id="stTime"/>
                    <input type="hidden" value="{{$od->calendar['max']}}" id="endTime"/>
                    <input type="hidden" value="{{$od->calendar['calendarValid']}}" id="calendarValid"/>
                    <textarea id="closedDates">
                            [@foreach($od->calendar['cd'] as $cdate)
                            "{{$cdate}}"
                                @if(!$loop->last)
                                ,
                                @endif
                            @endforeach]
                    </textarea>
                    <textarea id="openedDates">
                        [@foreach($od->calendar['od'] as $odate)
                        "{{$odate}}"
                            @if(!$loop->last)
                            ,
                            @endif
                        @endforeach]
                </textarea>
                <textarea id="availableDays">
                        [@foreach($od->calendar['availableDays'] as $ad)
                        "{{$ad}}"
                            @if(!$loop->last)
                            ,
                            @endif
                        @endforeach]
                </textarea>
                    <div class="form-group">  
                    @if($allData['singleOfferData'][0]->calendar['showCalendar']!=0)   
                        <div class="calendarHeaderTermin">
                            Termin wählen &amp; buchen
                        </div>
                      <div id="datetimepicker12"></div>
                    @endif
                    @if($allData['singleOfferData'][0]->hasgroupoffer==1)
                    <div class="groupCalendar">
                    <div class="calendarHeaderTermin">
                    <i class="fas fa-angle-up"></i>{{$allData['singleOfferData'][0]->groupoffertitle}}
                    </div>
                        <div class="groupCalendarContent">
                            <p>Datum Anreise:</p>
                            <input class="groupInputCal" placeholder="Datum Anreise" onChange="startGroupReservation(event)" type="text" id="groupOfferCalendar"/><div class="calHolder"><i class="fas fa-calendar-alt"></i></div><i class="fas fa-angle-right nextStepCal"></i>
                        </div>
                    </div>
                    @endif
                    </div>
                  </div>
                  <a  href="https://www.meinweekend.ch/angebote/geschenkgutschein-geschenkidee/ideen/{{ $offerUrl }}/">
                    <img src="{{url('images/gutschein.svg')}}" class="img-fluid" alt = 'gutschein'>
                  </a>
                </div>
                <div class="col-12 kontTit">
                    <h4>Kontaktdaten</h4>
                </div>

                <div class="col-12 kontInfo marginBottom">
                    <table>
                        <tr>
                            <td class="boldTdTable">Online</td>
                            <td>Datum wählen</td>
                        </tr>
                        <tr>
                            <td class="boldTdTable">E-mail</td>
                            <td>info@meinweekend.ch</td>
                        </tr>
                        <tr>
                            <td class="boldTdTable"> Telefon</td>
                            <td>+41 (0)43 288 06 26</td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-12 kontTit">
                    <h4>Anreise / Abreise</h4>
                </div>
                @php
                $pattern = "/<p[^>]*><\\/p[^>]*>/";
                $showInfoFixed=preg_replace($pattern, '', $od->informacion);
                @endphp
                <div class="col-12 kontInfo marginBottom">
                    {!!\App\Helpers\Helpers::clean_text($od->informacion) !!}
                </div>
                <div class="col-12 mapHold nopadding">
                    <div id="gMapWarp" class="kontTit">
                        <i class="fas fa-angle-down rotateBack"></i><h4 class="nopadding" onclick='toggleDivWithclass("gMap1", "gMapWarp")'>Lageplan / Anfahrt</h4>
                    </div>
                    @php
                        if($allData['singleOfferData'][0]->address!=''){
                            $address=str_replace([" ","  "],"+",$allData['singleOfferData'][0]->address);
                        }else{
                            $address=$allData['singleOfferData'][0]->region_title;
                        }
                    @endphp
                    <div id="gMap1" style="overflow: hidden; /*margin-top: -23px*/">
                    </div>
                </div>
                @if(count($od->related_offers)>0)
                <div class="col-12 mapHold nopadding marginBottom">
                    <div  class="kontTit interRot">
                        <i class="fas fa-angle-down rotateBack"></i><h4 class="nopadding" onclick='toggleDivWithclass_2("inLinks1","interRot")'>Interessante Links</h4>
                    </div>
                    <div id="hiddeAdditionalOff">
                        @foreach($od->related_offers as $rl)
                        <div class="additionalBorder inLinks1" >
                            <a href="https://www.meinweekend.ch/ausflug/{{ $rl->link_name }}/">
                            <div class="relLinkImgHld">
                                <img alt = 'offers' class="img-fluid" src="{{url('assets/img/'.ltrim($rl->related_offer_image, '/'))}}">
                            </div>
                                <br>
                                <h3>{!!$rl->related_offer_title!!}</h3>
                            </a>
                            <p class="marginBttom0">{!! str_limit($rl->subtitle, $limit = 170, $end = '...') !!}</p>
                        <p>{!!$rl->related_offer_days!!} {{$rl->related_offer_days>1?"Tage":"Tag"}} / {!!$rl->related_offer_nights!!} {{$rl->related_offer_nights>1?"Nächte":"Nacht"}}
                            @if($rl->hasspeciallistsettings==1)
                                <span class="priceStyle">ab {{$rl->special_list_currency==0?'CHF':'EURO'}} {!!$rl->special_list_price!!}</span>
                            @else
                                <span class="priceStyle">ab {{$currency==0?'CHF':'EURO'}} {!!$rl->related_offer_price!!}</span>
                            @endif
                        </div>
                        @endforeach
                    </div>

                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    mapsrc = "https://maps.googleapis.com/maps/api/staticmap?center={{$address}}&zoom=14&scale=1&size=450x315&maptype=roadmap&key=AIzaSyDQsfgIe6tnFtM7ar67k7tZTpAlZA1gcIA&format=webp&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C{{$address}}";
    var img = new Image();
    img.onload = function () { document.getElementById("gMap1").appendChild(img); };
    img.src = mapsrc;
img.style.width = "100%"

window.onload = function () {

            setOffer("{{$allData['singleOfferData'][0]->uid}}");
            setTimeout(function(){activateDateCalendar()},300);

            $("#groupOfferCalendar").datepicker({ 
                format: 'yyyy-mm-dd'
            });


};
</script>

