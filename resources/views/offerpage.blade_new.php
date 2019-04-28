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

                    {{-- <script>

                    jssor_slider1_init = function (containerId) {
                                                var options = {
                                    $FillMode: 2,
                                    $AutoPlay: 1,
                                    $Loop: 1,
                                $SlideshowOptions: {
                                    $Class: $JssorSlideshowRunner$,

                                    $Transitions: ['']
                                },
                                $ThumbnailNavigatorOptions: {
                                    $Class: $JssorThumbnailNavigator$,
                                    $ChanceToShow: 2,
                                    $ArrowKeyNavigation: 1,
                                    $ArrowNavigatorOptions: {
                                        $Class: $JssorArrowNavigator$,
                                        $ChanceToShow: 2,
                                        $Steps:1
                                    }
                                }
                            };
                            var jssor_slider1 = new $JssorSlider$(containerId, options);

                        };

                    </script> --}}
                    <script defer="defer">
                        $(document).ready(function(){document.getElementById("innerSlider").style.width="780px",document.getElementById("innerSlider").style.height="300px",activateSlider()});
                    </script>
                    <div class="slider1ContainerStyle" id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 780px; height: 300px;">
                        <style>
                            .sliderImageDescription{z-index:11111111111;position:absolute;left:0;background:rgba(0,0,0,.5);bottom:0;right:0;color:#fff;padding:5px;font-size:16px;text-align:center;text-transform:uppercase}@media (max-width:576px){.sliderImageDescription{z-index:11111111111;position:absolute;left:0;background:rgba(0,0,0,.5);bottom:0;right:0;color:#fff;padding:19px;font-size:16px;text-align:center;text-transform:uppercase}}
                        </style>
                        <!-- Slides Container -->
                        <div class="slider1Style" data-u="slides" id='innerSlider' style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 260px; height: 100px;">
                            @foreach($allData['singleOfferData'][0]->images as $i)
                                <div>
                                    <img  class="lazy" data-u="image" data-src="https://css-tricks.com/examples/LazyLoading/blank.gif" src="{{URL::asset('assets/img/'.ltrim($i->identifier, '/'))}}" alt="{{$i->title}}"/>
                                    @if($i->title !='')
                                        <div data-u="image" class="sliderImageDescription">
                                            {{$i->title}}
                                        </div>
                                    @endif
                                    <img class="lazy"  data-u="thumb" src="{{url('assets/img/'.ltrim($i->identifier, '/'))}}" alt="{{$i->title}}"/>
                                </div>
                            @endforeach
                        </div>
                        <!-- ThumbnailNavigator Skin Begin -->
                        <style>
                            .jssort052 .p,.jssort052 .t{position:absolute;top:0;left:0}.jssort052 .p{background-color:#fff}.jssort052 .t{width:100%;height:100%;border:none;opacity:.45}.jssort052 .p:hover .t{opacity:.8}.jssort052 .p:hover.pdn .t,.jssort052 .pav .t,.jssort052 .pdn .t{opacity:1}.sliderThumbP{display:flex}.sliderThumbP img{width:100%;object-fit:cover}
                        </style>
                        <div data-u="thumbnavigator" class="jssort052 hideOnMobile" style="position:absolute;top: 300px;left:0px !important;bottom:0px;width:780px;height:100px;" data-autocenter="1" data-scale-bottom="0.75">
                            <div data-u="slides">
                                <div data-u="prototype" class="p sliderThumbP" style="width:200px;height:100px;">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                </div>
                            </div>
                            <!--#region Arrow Navigator Skin Begin -->
                            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
                            <style>
                                .jssora055{display:block;position:absolute;cursor:pointer}.jssora055 .a{fill:none;stroke:#fff;stroke-width:960;stroke-miterlimit:10}.jssora055:hover{opacity:.8}.jssora055.jssora055dn{opacity:.5}.jssora055.jssora055ds{opacity:.3;pointer-events:none}
                            </style>
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


                    {{-- <script></script> --}}


                    <!-- ThumbnailNavigator Skin End -->
                    </div>
                    {{-- <script>


                        jQuery(document).ready(function(i){jssor_slider1_init("slider1_container");var n=new $JssorSlider$("slider1_container",{});function e(){var d=i("#slider1_container").parent().width();d?n.$ScaleWidth(d):window.setTimeout(e,30)}e(),i(window).bind("load",e),i(window).bind("resize",e),i(window).bind("orientationchange",e)});


                    </script> --}}

                </div>
                {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($allData['singleOfferData'][0]->images as $i)
                                @if($loop->first)
                                    <div class='carousel-item active'>
                                    <img class="d-block w-100 lazy" src="../../assets/img/{{$i->identifier}}" alt="{{$i->identifier}}">
                                    </div>
                                @else
                                    <div class='carousel-item'>
                                        <img class="d-block w-100 lazy" src="../../assets/img/{{$i->identifier}}" alt="{{$i->identifier}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <ol class="navigationArrow">
                            <li class="leftWarp">
                            <a class="leftArrow" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                            <li class="rightWarp">
                            <a class="rightArrow" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                        </ol>
                        <ol class="carousel-indicators">
                            @foreach($allData['singleOfferData'][0]->images as $i)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="active">

                                    <img class="img-fluid lazy" src="../../assets/img/{{$i->identifier}}" alt="{{$i->identifier}}">
                                    <div class="inactiveSlie"></div>

                                </li>
                            @endforeach
                            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="7"><img class="img-fluid lazy" src="../../assets/images/home/fliegen.jpg" alt="First slide"><div class="inactiveSlie"></div></li> --}}
                {{-- </ol> --}}
                {{-- </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="row infoHold">
                <div class="col-12 likeWarp">
                    <div class="fb-like" data-href="{{url()->full()}}" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="false" style="font-size: 17px;"></div>
                </div>
                <div class="col-12 col-lg-6 soloInfo" id="toggleHolder1" onclick="toggleDivWithclass('toggle3','toggleHolder1')">
                    @if($allData['singleOfferData'][0]->included_unit_text!=null)
                        <h4 id='click' >Leistungsumfang {{$allData['singleOfferData'][0]->included_unit_text}}<i class="fas fa-chevron-down rotateBack"></i></h4>
                    @else
                        <h4 id='click' >Leistungsumfang pro person<i class="fas fa-chevron-down rotateBack"></i></h4>
                    @endif

                    <div id="toggle3" class="switchDiv hiddeDiv">
                        <p>{!!$od->included!!}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 soloInfo" id="toggleHolder2" onclick="toggleDivWithclass('toggle2','toggleHolder2')">
                    @if($allData['singleOfferData'][0]->price_unit_text!=null)
                        <h4 id='click' >Preise {{$allData['singleOfferData'][0]->price_unit_text}}<i class="fas fa-chevron-down rotateBack"></i></h4>
                    @else
                        <h4 id='click' >Preise pro person<i class="fas fa-chevron-down rotateBack"></i></h4>
                    @endif

                    <div id="toggle2" class="switchDiv hiddeDiv">
                        {!! $od->priceinfo !!}
                    </div>
                </div>
            </div>
            <div class="row soloWarp">
                <div class="col-12 soloInfo" id="toggleHolder3" onclick="toggleDivWithclass('toggle1','toggleHolder3')">
                    <h4 id='click' >{{$od->title}}<i class="fas fa-chevron-down rotateBack"></i></h4>
                    <div id="toggle1" class="switchDiv hiddeDiv">
                        <p class="subHold">
                            {!!$od->subtitle!!}
                        </p>

                        <p>{!!$od->bodytext!!}</p>
                        {{--  <p>
                            <strong>September bis Februar</strong>
                        <br>
                            Buchen Sie jetzt Ihren Wunschtermin. Erleben Sie Wellness in Bern mit Superlativen. Oder bestellen Sie einen Geschenkgutschein. Der Geschenkgutschein ist mit Bild und Text auf das Wellness Erlebnis in Bern ausgestellt.
                        <br>
                            Mit kaum geraden Wänden erwartet Sie das top moderne Wellness Erlebnis in Bern. Sie geniessen eine prima Erreichbarkeit mit ÖV und mit dem Auto. Stadtnah und trotzdem im Grünen. City Wellness in Bern nach neustem Standard. In der Nähe befindet sich die Produktionsstätte der Toblerone und ein Einkaufszentrum mit Food Court und Kino.
                        <br>
                            Ihnen stehen eine Loungebar und ein Restaurant mit Terrasse zur Verfügung, in dem man Sie mit frischer Küche aus der Region verwöhnt. Alle Zimmer sind klimatisiert und mit kostenfreiem WLAN ausgestattet.
                        </p>
                        <p>
                            <strong>Wellness in Bern mit Superlativen</strong>
                        <br>
                            Erleben Sie Wellness in Bern mit absoluten Highlights. Das Erlebnisbad Bernaqua gehört mit einer Wasserfläche von 2000 Quadratmetern und 18 Innen- und Aussenbecken zu den grössten Bädern in der Schweiz. Es verfügt über die längsten gedeckten Rutschbahnen im Land. Zudem geniessen Sie einen grossen Saunabereich, Spa/Beauty und ein Fitnesscenter. Eine absolute Spezialität ist das Römisch-Irische-Baderitual (ca. 2 Stunden), das Sie im Hotel dazu buchen können.
                        </p>
                        <p>
                            <strong>Asian Spa - Treatments für Geniesser</strong>
                        <br>
                            Der Spa-Bereich ist im asiatischen Stil gebaut und gehört zu den führenden Wellness Erlebnissen in Bern und in der Schweiz. Buchbar ist ein römisch-irisches Dampfbad, traditionelle Thai- und Bürsten-Massagen mit aromatischen Natur-Seifen, Thalasso, Algenpackungen, Peelings, japanische Bäder und eine einzigartige, grosszügige Saunalandschaft.
                        </p>
                        <p>
                            <strong>Themen Saunas/ Dampfbäder</strong>
                        <br>
                            1. ‚Salz-der-Erde-Sauna', betörende Heissluft-Sauna (60 bis 70 ° C).
                        <br>
                            2. ‚Feuer-und-Eis-Sauna', Ein Spiel von Licht und Wasser bei 100 ° C.
                        <br>
                            3. ‚Ein-Stück-Natur-Sauna', kreislaufschonende Bio-Sauna mit Himmels-Projektionen, 65° C.
                        <br>
                            4. ‚Nebelmeer-Dampfbad', Harmonie pur, 45° C.
                        <br>
                            5. ‚Lavaglut-Sauna', auf glühenden Kohlen bei 90° C.
                        <br>
                            6. ‚Kerzen-Sauna' – Romantik-pur, 75° C.
                        <br>
                            7. ,Polar-Licht-Dampfbad', eindrucksvolles Farb-Schauspiel, 45° C.
                        <br>
                            Ein absolutes Highlight ist das Römisch-Irische-Bad ist ein 2stündiges Baderitual zur aboluten Tiefenentspannung, das wie eine Anwendung kostenpflichtig ist und im Hotel dazu gebucht werden kann. Sie durchqueren zwei Warmlufträume und erhalten anschliessend Ihre Seifenbürstenmassage mit der von Ihnen ausgesuchten Naturseife. Die Badezeremonie führt weiter durch zwei Dampfräume und endet mit einem Gang durch spezielle Warm- und Kaltwasserbäder. Sie begeben sich zur Cremestation und zur abschliessenden Entspannung in den Ruheraum.
                        <br>
                            Ein traumhaftes Erlebnis bietet Ihnen das Bernaqua Beauty und Wellness in Bern. Ob Mann oder Frau, ob jung oder alt – im Bernaqua Beauty finden Sie das perfekte Beauty Treatment: von ausgewählten Facials (Gesichtsbehandlungen) über Körperbehandlungen bis zu Maniküren und Pediküren. Lassen Sie sich verwöhnen. Ein Beauty Treatment lässt Ihre Schönheit erstrahlen und ist eine Wohltat für Körper, Geist und Seele.
                        <br>
                            Das Wellness Arrangement in Bern bietet für alle ein fantastisches Erlebnis für die Sinne. Kontaktieren Sie MeinWeekend.ch und reservieren Sie Ihren Traumtermin online oder per E-Mail. Gerne beraten wir Sie zum fantastischen Wellness Erlebnis in Bern.
                        </p>  --}}
                    </div>
                </div>
            </div>
        </div>
        <div id="bookingStepb1"></div>
    </div>
    <div id="bookingStep1S2" id="offerStart02" class="section2 bookingSteps stepShowBookingSpecial">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <script defer="defer">
                            //console.log('variables');
                            var stTime=new Date("{{$od->starttime}}"),endTime=new Date("{{$od->starttime}}");$(document).ready(function(){activateDateCalendar()});
                        </script>
                        {{-- {{dd($od->calendar)}} --}}
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
                                        <input class="groupInputCal" onChange="startGroupReservation(event)" type="date" id="groupOfferCalendar"/><div class="calHolder"><i class="fas fa-calendar-alt"></i></div><i class="fas fa-angle-right nextStepCal"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <a  href="{{url('angebote/geschenkgutschein-geschenkidee/ideen/'.$offerUrl)}}/" >
                        <img src="{{url('images/gutschein.jpg')}}" class="img-fluid lazy">
                    </a>
                </div>
                <div class="col-12 kontTit">
                    <h4>Kontaktdaten</h4>
                </div>

                <div class="col-12 kontInfo marginBottom">
                    <table>
                        <tr>
                            <td class="boldTdTable" width="100px">Online</td>
                            <td>Datum wählen</td>
                        </tr>
                        <tr>
                            <td class="boldTdTable" width="100px">E-mail</td>
                            <td>info@meinweekend.ch</td>
                        </tr>
                        <tr>
                            <td class="boldTdTable" width="100px"> Telefon</td>
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
                    {!!$od->informacion!!}
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
                    <div id="gMap1">
                        <a href="https://www.google.com/maps/dir/{{$address}}">
                            <img   src="https://maps.googleapis.com/maps/api/staticmap?center={{$address}}&zoom=14&scale=1&size=450x520&maptype=roadmap&key=AIzaSyDQsfgIe6tnFtM7ar67k7tZTpAlZA1gcIA&format=webp&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C{{$address}}" alt="Google Map of {{$address}}" width="100%">
                        </a>
                    </div>
                </div>
                @if(count($od->related_offers)>0)
                    <div class="col-12 mapHold nopadding marginBottom">
                        <div id="interRot" class="kontTit">
                            <i class="fas fa-angle-down rotateBack"></i><h4 class="nopadding" onclick='toggleDivWithclass("inLinks1","interRot")'>Interessante Links</h4>
                        </div>
                        <div id="hiddeAdditionalOff">
                            @foreach($od->related_offers as $rl)
                                <div class="additionalBorder" id="inLinks1">
                                    <a href="{{url('ausflug/'.$rl->link_name)}}/">
                                        <div class="relLinkImgHld">
                                            <img  class="img-fluid lazy" src="{{url('assets/img/'.ltrim($rl->related_offer_image, '/'))}}">
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
<div class="section3">
    {{-- <div id="bookingStep2" class="container-fluid bookingValid bookingSteps">
        <div class="row textWraper">
            <div class="col-6">
                <div class="bookingText">
                    <h3>IHR AUFENTHALT</h3>
                </div>
                <div class="bookingRow">
                    <div class="tableText1">
                        <p class="firstP">Ankunftsdatum:</p>
                        <p>Dauer:</p>
                    </div>
                    <div class="tableText2">
                        <p id="userDatePickShow" class="secondaryP"></p>
                        <p>
                            @if($allData['singleOfferData'][0]->day!=0)
                                {{$allData['singleOfferData'][0]->day}}
                                {{$allData['singleOfferData'][0]->day>1?"Tage":"Tag"}}
                            @endif
                            @if($allData['singleOfferData'][0]->night!=0)
                            , {{$allData['singleOfferData'][0]->night}}
                            {{$allData['singleOfferData'][0]->night>1?"Nächte":"Nacht"}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @foreach($allData['singleOfferData'] as $od)
            <div class="col-6 offersIncluded">
                <h6>LEISTUNGSUMFANG PRO PERSON</h6>
                {!!$od->included!!}
            </div>
            @endforeach
        </div>
<div class="row">
<div id="bookingTable" class="col-12 tableBooking">
    {{-- {{print_r($allData['singleOfferData'][0])}}
    <table class="table">
            {{-- <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Person</th>
                <th scope="col">Price</th>
                <th scope="col">{{$allData['singleOfferData'][0]->prices[0]->person_type}}</th>
            </tr>
            </thead>
            <tbody>
                @php
                $prCount=1;
                @endphp
    @foreach($allData['singleOfferData'][0]->prices as $oPrices)
    <tr>
        <td>{{$oPrices->title}}</td>
        <td>{{$oPrices->subtitle}}</td>
        <td style="color:#013a89">{{$oPrices->adult_price}}</td>
        <td>
        <select class="custom-select" id="price_{{$oPrices->uid}}">
                <option selected>Choose...</option>
                @for($i=$allData['singleOfferData'][0]->min_persons;$i<=$allData['singleOfferData'][0]->max_persons;$i++)
        <option data-price="{{$oPrices->adult_price}}" value="{{$i}}">{{$i}} {{$allData['singleOfferData'][0]->person_type}}</option>
                @endfor
        </select>
        </td>
    </tr>
    <script defer="defer">
$(document).on("change","#price_{{$oPrices->uid}}",function(o){console.log("price event",o);var t=$(this).find("option:selected").attr("value"),e=$(this).find("option:selected").attr("data-price"),i=Number(t)*Number(e);totalBookingPrice=i+totalBookingPrice,console.log("total ",i),console.log("total totalBookingPrice",totalBookingPrice),$("#bookingTotal").text(totalBookingPrice+" EUR")});
            </script>

    @php
        $prCount++;
    @endphp
    @endforeach
            </tbody>
    </table> --}}
    {{-- </div>
        <form id="bookingValid1">
            <input type="text" name="selectedPricesInp" id="selectedPricesInp" />
        </form>
    </div>
        <div class="row">
            <div class="col-12 ">
                <div class="totalPrice">
                        <form>
                                {{ csrf_field() }}
                        </form>
                    <h5>Gesamtbetrag</h5>
                    <input type="hidden" value="{{$allData['s_currency']}}" id="s_curr" />
                <input type="hidden" value="{{$allData['exchange']}}" id="s_exch" />
                <h1 ><span id="bookingTotal">0</span> {{$allData['s_currency'] ==0 ? 'CHF':'EUR'}}</h1>
                    <h5>{{$allData['s_currency']== 0 ? 'EUR':'CHF'}} <span id="shiftBookingTotal">0</span>*</h5>
                </div>
            </div>
        </div>
        <div class="row button">
                <div class="col-6">
                <div class="buttonBack">
                    <button type="button" class="btn  btn-lg" id="bookingStepRet2">Zurück</button>
                </div>
                </div>
                <div class="col-6">
                <div class="buttonSuc">
                    <button type="button" class="btn btn-lg" id="bookingStepb2" >Weiter</button>
                </div>
                </div>
            </div>
        </div> --}}

    {{-- <div id="bookingStep3" class="container-fluid bookingInvalid bookingSteps">
        <form id="bookingContactForm">
        <div class="row textWraper">
            <div class="col-12 bookingText">
                <h3>IHR AUFENTHALT</h3>
            </div>
            <div class="col-12 bookingRow IhrAuf">
                <div class="tableText1">
                    <p class="firstP">Ankunftsdatum:</p>
                    <p>Dauer:</p>
                </div>
                <div class="col-12 tableText2">
                    <p id="userDatePickShow2" class="secondaryP">Samstag, 17. März 2018</p>
                    <p>
                    @if($allData['singleOfferData'][0]->day!=0)
                        {{$allData['singleOfferData'][0]->day}}
                        {{$allData['singleOfferData'][0]->day>1?"Tage":"Tag"}}
                    @endif
                    @if($allData['singleOfferData'][0]->night!=0)
                        ,{{$allData['singleOfferData'][0]->night}}
                        {{$allData['singleOfferData'][0]->night>1?"Nächte":"Nacht"}}
                    @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 bookingText">
                <h3>Ihre Reservation:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="selectedPricesTable" class="table-responsive">
                </div>
            </div>
        </div>
        <div class="row hhhhh">
            <div class="col-12 col-md-7 col-lg-7 mmmmm">
                <div class="bookingText">
                <h3>BUCHUNGSANFRAGE:</h3>
                </div>
                <div class="allInfo">
                            <div class="form-group">
                                    <label class="col-3 col-form-label">Anrede:*</label>
                                    <div class="col-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anredeOp" id="anredeH" checked="checked" value="Herr">
                                        <label class="form-check-label" for="inlineRadio1">Herr</label>
                                    </div>
                                    <div class="col-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anredeOp" id="anredeF" value="Frau">
                                        <label class="form-check-label" for="inlineRadio2">Frau</label>
                                    </div>
                            </div>
                            <div class="inputInfo">
                                <div class="form-group input1">
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Vorname*">
                                </div>
                                <div class="form-group input2">
                                <input type="text" class="form-control" id="user_surname" name="user_surname" placeholder="Nachname*">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_company" name="user_company" placeholder="Firma">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Adresse*">
                            </div>
                            <div class="inputInfo">
                                <div class="form-group input1">
                                        <input type="text" class="form-control" id="user_postalCode" name="user_postalCode" placeholder="PLZ*">
                                </div>
                                <div class="form-group input2">
                                    <input type="text" class="form-control" id="user_postalPlace" name="user_postalPlace" placeholder="Ort*">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="col-12 form-control" id="user_country" name="user_country">
                                    <option selected>Schweiz</option>
                                    <option>Deutschland</option>
                                    <option>Österreich</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_telephone" name="user_telephone" placeholder="Telefon*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="E-mail*">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Zusätzliche Informationen</label>
                                <textarea class="form-control" id="user_message" name="user_message" placeholder="Ihre Wünsche" rows="3"></textarea>
                            </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-5 nnnnn">
                <div class="">
                    <div class=" allInfo">
                        <h3 style="font-size: 14px;
                        margin-top: 20px;"><b>ZAHLUNGSKONDITIONEN</b></h3>
                        @if($allData['singleOfferData'][0]->terms!=null)
                            {!!$allData['singleOfferData'][0]->terms!!}
                        @else
                            {!!$allData['singleOfferData'][0]->to_terms!!}
                        @endif
                    </div>
                    <div class="allInfoSecond"   style=" margin-top: 13px;" >
                        <div class=" bookingText" style="margin-left:0px;">
                            <h3>GUTSCHEIN</h3>
                        </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="vouCode" placeholder="Gutschein Code">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="marketingCode" placeholder="Marketing Code">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="totalBetrag" placeholder="Total Betrag">
                            </div>
                    </div>
                    <div class="bookingText bookingTextFontSize" style="font-size:14px;">
                        <h3>Annullationsbedingungen:</h3>
                        @if($allData['singleOfferData'][0]->cancellationterms!=null)
                            {!!$allData['singleOfferData'][0]->cancellationterms!!}
                        @else
                            {!!$allData['singleOfferData'][0]->to_cancellationterms!!}
                        @endif
                    </div>
                </div>
                <div class="">
                    <div class="textHolder">
                        <span>Ihre Buchungsanfrage wird geprüft. Sie erhalten spätestens innerhalb 0 - 24 Stunden eine Reservations–Bestätigung.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row checkBoxRow">
            <div class="col-12">
                    <div style="text-align: right;" class="form-check formCheckAlign">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termsCheck">
                        <label style="font-size:14px;" class="form-check-label" for="exampleCheck1">ICH AKZEPTIERE DIE <a  href="{{URL('agb')}}">AGB</a> VON WWW.MEINWEEKEND.CH</label>
                    </div>
            </div>
        </div>
        @if($allData['singleOfferData'][0]->creditcard_required == 1)
        <div class="row">
            <div style="margin-top:20px; border-top:1px solid grey;border-bottom:1px solid grey;padding:20px 0;" class="col-12 creditCardInfo">
                <h6>Ihre Kreditkarte dient lediglich als Reservationsgarantie und wird zum Zeitpunkt der Reservationsanfrage nicht belastet.</h6>
                    <div class="form-group">
                        <label class="col-2 col-form-label">Kreditkartentyp</label>
                        <select class="col-5 form-control" id="reservationgarantee_cardtype" name="reservationgarantee_cardtype">
                            <option selected>Visa</option>
                            <option>Mastercard</option>
                            <option>American Express</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-2 col-form-label">Kreditkartennummer</label>
                        <input class="col-5 form-control" type="text" placeholder="" id="reservationgarantee_cardno" name="reservationgarantee_cardno">
                    </div>

                    <div class="form-group">
                        <label class="col-2 col-form-label">Gültig: Monat/Jahr</label>
                        <select class="col-1 form-control" id="reservationgarantee_exp_month" name="reservationgarantee_exp_month">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <select class="col-1 form-control" id="reservationgarantee_exp_year" name="reservationgarantee_exp_year">
                            <option selected>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-2 col-form-label">Name und Vorname des Karteninhabers</label>
                        <input class="col-5 form-control" type="text" id="reservationgarantee_name" placeholder="" name="reservationgarantee_name">
                    </div>
                    <div class="col-12 checkText">
                        <input type="checkbox" id="reservationgarantee_check" name="reservationgarantee_nocard"> <p> ICH HABE KEINE KREDITKARTE. BITTE KONTAKTIEREN SIE MICH.</p>
                    </div>
            </div>
        </div>
        @endif
        <div class="row button">
            <div class="col-6">
                <div class="buttonBack">
                    <button type="button" class="btn btn-lg" id="bookingStepRet3">Zurück</button>
                </div>
            </div>
            <div class="col-6">
                <div class="buttonSuc">
                    <button type="submit" class="btn btn-lg" id="bookingStepb3">Weiter</button>
            </div>
            </div>
        </div>
    </form>
    </div> --}}

    {{-- <div id="bookingStep4" class="container-fluid bookingInvalid bookingSteps">
            <div class="row textWraper">
                <div class="col-12 bookingText bookingTextUniqueCss" style="border-bottom: 1px solid #bfbfbf;">
                    <h3>LIEBE <span id="uStatus"></span> <span id="uName"></span></h3>
                    <p>Herzlichen Dank für Ihre Buchungsanfrage.</p>
                    <p class="textHolder"><span>Ihre Reservation wird geprüft. Die definitive Reservations-Bestätigung erhalten Sie spätestens innerhalb 24 Stunden.<span></p>

                </div>
                <div class="col-12 bookingText">
                    <h3>IHRE BUCHUNGSANFRAGE</h3>
                </div>
                <div class="col-12 bookingRow IhrAuf">
                    <div class="tableText1">
                        <p class="firstP">Ankunftsdatum:</p>
                        <p>Dauer:</p>
                    </div>
                    <div class="col-12 tableText2">
                        <p id="userDatePickShow3" class="secondaryP">Samstag, 17. März 2018</p>
                        <p>
                            @if($allData['singleOfferData'][0]->day!=0)
                                {{$allData['singleOfferData'][0]->day}} Tage
                            @endif
                            @if($allData['singleOfferData'][0]->day!=0)
                            , {{$allData['singleOfferData'][0]->night}} Nächte
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div style="margin-bottom:60px;" class="row bookingTextRow">
                <div class="col-12 bookingText">
                    <h3>Reservationsanfrage:</h3>
                </div>
                <div class="col-12 resConf">
                    <div id="lastStepPrices" class="table-responsive">
                     </div>
                </div>
            </div>
            <div style="margin-top:10px;margin-bottom:50px;border-top: 1px solid #bfbfbf;" class="row bookingTextRow2">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="bookingLeft" style="width: auto;">
                        <div class="bookingText">
                            <h3>IHRE KONTAKTANGABEN:</h3>
                        </div>
                        <div class="PersonInfo">
                            <div class="formGroup">
                                <p>Anrede:</p>
                                <p>Vorname:</p>
                                <p>Nachname:</p>
                                <p>Firma:</p>
                                <p>Adresse:</p>
                                <p>PLZ/Ort:</p>
                                <p>Land:</p>
                                <p>Telefon:</p>
                                <p>E-Mail:</p>
                            </div>
                            <div class="bookingInfo">
                                <p id="userStatusHolder"></p>
                                <p id="userName"></p>
                                <p id="userSurname"></p>
                                <p id="userCompanyHolder"></p>
                                <p id="userAddressHolder"></p>
                                <p id="userPLZOrtHolder"></p>
                                <p id="userCountryHolder"></p>
                                <p id="userTelephoneHolder"></p>
                                <p id="userEmailHolder"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="bokkingRight">
                        <div class="col-sm-12 bookingText">
                            <h3>UNSERE KONTAKTANGABEN</h3>
                            <p>Für Fragen stehen wir Ihnen gerne zur Verfügung.</p>
                        </div>
                        <div class="about">
                            <div class="textInfo">
                                <p>Telefon:         +41 (0)43 288 06 26</p>
                                <p>E-Mail:          <a class="textInfoLinkStyle" style="padding-bottom: 8px !important;" href="/{{url('info@meinweekend.ch')}}"> info@meinweekend.ch</a></p>
                                <p>URL:             <a href="{{url('https://www.meinweekend.ch')}}"> MeinWeekend.ch</a></p>
                            </div>
                            <h6>Beste Grüsse</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
</div>

<script>

    var address="{{$allData['singleOfferData'][0]->address}}";
    $(document).ready(
        function(){
            setOffer("{{$allData['singleOfferData'][0]->uid}}");
            setTimeout(function(){activateDateCalendar()},300);
        });
</script>
