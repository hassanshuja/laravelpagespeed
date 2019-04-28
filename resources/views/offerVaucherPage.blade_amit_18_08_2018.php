{{-- {{dd($images)}} --}}
{{-- {{dd($vaucherData)}} --}}
<link rel="stylesheet" href="{{mix('css/offerVaucherPageV2.css')}}">
<link rel="stylesheet" href="{{mix('css/giftcard02.css')}}">
<link rel="stylesheet" href="{{mix('css/giftcard03.css')}}">
<style>
    .giftStep3Row p{
        display:inherit !important;
    }
    </style>
    <div class="container-fluid">
        @include('navoverview2')
        @include('navoverview4')
    </div>
    <form id="offerVouchForm1">
    <div id="bookingVouchers1" class="container-fluid contDefCss bookingSteps bookingInvalid {{$stInd==1 || $stInd=='' ? 'stepShowBooking':''}}">

        <div class="row Title">
            <div class="col-12">
                <h1>Freude und Freizeit mit einem Geschenkgutschein schenken</h1>
            </div>
        </div>
        <div class="row InfoPart">
            <div class="col-12 col-md-6 col-lg-6 bottDistVauchP">
                <h4>Erlebnisgutschein bestellen</h4>
                <p class="hiddeMobileT2">Die Geschenkgutscheine sind mit attraktiven Bildern und Texten auf Ihr gewünschtes Erlebnis ausgestellt, und das ansprechende MeinWekend.ch Design macht das Schenken zum vollen Erfolg.</p>
            </div>
            <div class="col-12 col-md-6 col-lg-6 info2Warp hiddeMobileT2">
                <h4>Wertgutschein bestellen</h4>
                <p>Wählen Sie einen gewünschten Wert. Der Wertgutschein kann auf allen Weekend-Packages und Tagesausflügen eingelöst werden.</p>
            </div>
        </div>
        <div class="row InfoPart">
            <div class="col-12 col-md-6 col-lg-6">
                    <p><br>- PREISGARANTIE 1 JAHR </p>
                    <br>
                    <p>- WERT KANN WÄHREND 5 JAHREN EINGELÖST WERDEN</p>
            </div>
            <div class="col-12 col-md-6 col-lg-6 info2Warp hiddeMobileT2">
                    <p>- WERT KANN WÄHREND 5 JAHREN EINGELÖST WERDEN</p>   
            </div>
        </div>
        <div class="row hiddeMobileT2">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="titleButton1">
                    <button type="button" class="btn" id="voucherStepb1" onClick="scrollToVoucher();">Erlebnisgutschein</button>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 info2Warp">
                <div class="titleButton2">
                    <a  href="{{URL('geschenkgutschein')}}"><button type="button" class="btn" >Wertgutschein</button><a>
                </div>
            </div>
        </div>
        <div class="row stepsHold justify-content-center">
            <div class="col-4 nopadding step1">
                <h5> 01 </h5> <h5 class="mobileStepTextHide">GUTSCHEIN ERSTELLEN</h5>
            </div>
            <div class="col-4 nopadding">
                <h5> 02 </h5> <h5 class="mobileStepTextHide">PERSONALIEN DES KÄUFERS</h5>
            </div>
            <div class="col-4 nopadding">
                <h5> 03 </h5> <h5 class="mobileStepTextHide">BESTÄTIGUNG | ZAHLUNG</h5>
            </div>
        </div>

        <div class="row voucherImgForm ">
            <a name="showCurrentVaucher"></a> 
            @foreach($vaucherData as $d)
            <div class="col-12 Title">
                <h1 class="">{!!$d->title!!} als Erlebnisgutschein bestellen</h1>
            </div>
            @endforeach
            <div class="col-12 col-sm-6 col-md-6 vouchPart1">
                <input type="hidden" id="voucherType" value="0"/>
                <div class="giftImgHolder" style="text-align:center;">
                <div class="vouchHolder" style="text-align:center; width: 450px;display: inline-block;">
                    <img class="img-fluid" src="{{url('/assets/voucher/headlogo.PNG')}}">
                        <div id="onePhoto" style="display:none;" class="">
                            <img id="onePhotoSwitch" class="img-fluid"  style="width:100%;" src="{{url('assets/img/'.$images[0]->image)}}">
                        </div>
                        <div id="multiplePhoto" class="imagesWarper">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        @foreach($images as $i)
                                            <td scope="col">
                                                <div class="multiImageHld">
                                                    <img id='mainImage' class="img-fluid" src="{{url('assets/img/'.$i->image)}}">
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="voucherInfo">
                    @foreach($vaucherData as $di)
                        <h6 class="offerTitle" style="color:#b53232;">{{$di->title}}</h6>
                    @endforeach
                    
                    <h4 id="vouchNameTag">Laura & David Muster </h4>
                    <div id="voucherDescArea">
                            {!! $di->list_subtitle !!}
                    </div>
                    <div class="priceNdate">
                    @foreach($vaucherData as $od)                        
                        <div class="offerInfo1">
                            <div class="offersIncluded1">
                                {!!$od->included!!}
                            </div>
                        </div>
                        <div class="offerInfo2">
                            {!!$od->informacion!!}
                        </div>
                    @endforeach                        
                    </div>
                    </div>
                    <div class="FakevoucherFooter">
                            <h6>wir bitten sie um frühzeitig reservation</h6>
                            <p> Swiss Insier GmbH
                            <br> more long info for meinweekend
                            <br> Tel. +41 (0)43 268 06 26 | www.meinweekend.ch</p>
                            <br>
                            <br>
                            <p><b>another longer than the first long info for meinweekend.ch</b>
                            <br>an even longer info than the first and the second infos from www.myweekend.ch heehhe</p>
                            </div>
                    <div class="voucherFooter">
                    <h6>wir bitten sie um frühzeitig reservation</h6>
                    <p> Swiss Insier GmbH
                    <br> more long info for meinweekend
                    <br> Tel. +41 (0)43 268 06 26 | www.meinweekend.ch</p>
                    <br>
                    <br>
                   <p><b>Die Preisgarantie ist 1 Jahr ab Ausstellungsdatum 18.04.2019.</b>
                  <br>Der Gutschein-Wert kann 5 Jahre eingelöst werden<br>
                  Der Wert des Gutscheines ist auf allen Angeboten in den Kategorien "Weekend" und "Tagesausflüge" einlösbar
                </p>
                    </div>
                </div>
                <div>
                    <ul>
                        <li>
    
                            <div class="thumbImg" onClick="showImageVoucherMultiple()">
                                <table class="table allImgs" on>
                                    <tbody>
                                        <tr>
                                            @foreach($images as $i)
                                                <td scope="col" style="vertical-align:top !important;"><img id='mainImage'  class="img-fluid" src="{{url('assets/img/'.$i->image)}}"></td>
                                            @endforeach                     
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        
                        @php
                        $vCount=0;
                        $pCount=1;
                        @endphp
                        @foreach($images as $i)
                    <li>
                        <div class="thumbImg" onClick='showImageVoucherSingle("{{'assets/img'.$i->image}}",{{$pCount}})'>
                            <img class="img-fluid"  src="{{url('assets/img'.$i->image)}}">
                        </div>
                    </li>
                    
                    @php
                    $vCount++;
                    $pCount++;
                    @endphp
                    @endforeach
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                    {{ csrf_field() }}
                    <div id="bookingTable">
                        @if(Session::has('firstTable'))
                            {!!Session::get('firstTable')!!}
                        @else
                <div class="form-group">
                    <label for="exampleInputEmail1">Ausgestellt auf *</label>
                    <input type="text" id="vouchName" name="vouchName" class="form-control" placeholder="" required autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label for="offerVaucherTextarea">Text auf Gutschein *</label>
                    <textarea maxlength="400" class="form-control vouchDescAr" name="vouchText" id="offerVaucherTextarea" rows="5">{!!strip_tags($di->list_subtitle, ''); !!}</textarea>
                </div>
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Gültig ab *</label>
                    <div class="col-12">
                    <input id="user_validFrom" class="form-control" type="date" name="vouchDate" min="" placeholder="dd/mm/yyyy" id="example-date-input" autocomplete="off">
                    </div>
                </div>
                @foreach($vaucherData as $od)
                <div class="leistungsumfang">
                    <div class="offersIncluded">
                        <h3>Leistungsumfang</h3>
                        <h6>LEISTUNGSUMFANG PRO PERSON</h6>
                        {!!$od->included!!}
                    </div>
                </div>
                        
                <div class="priceDiv">
                    {!!$prices!!}                        
                </div>
                <style>
                .offerVaucherPriceHold {
                        width:100%;
                        overflow: visible;
                    }
                    .offerVaucherPriceHold input{
                        height:0;
                        visibility: hidden;
                    }
                </style>
                <div class="offerVaucherPriceHold">
                            <input type="text" name="selectedPricesInp" id="selectedPricesInp" class="input option"/>
                    </div>
                {{-- <div class="priceTotWarp">
                        <form>
                                {{ csrf_field() }}
                        </form>
                    <h4>Gesamtbetrag</h4>
                    <input type="hidden" value="{{$data2['s_currency']}}" id="s_curr" />
                <input type="hidden" value="{{$data2['exchange']}}" id="s_exch" />
                <h1 ><span id="bookingTotal" style="price-total">0</span> {{$data2['s_currency'] ==0 ? 'CHF':'EUR'}}</h1>
                    <h5>{{$data2['s_currency']== 0 ? 'EUR':'CHF'}} <span id="shiftBookingTotal">0</span>*</h5>
                </div> --}}
                <div class="priceTotWarp">
                        <input type="hidden" value="{{$data2['s_currency']}}" id="s_curr" autocomplete="off"/>
                    <input type="hidden" value="{{$data2['exchange']}}" id="s_exch" autocomplete="off"/>
                    <h4>Gesamtbetrag</h4><h2>{{$data2['s_currency'] ==0 ? 'CHF':'EUR'}} <span id="bookingTotal" style="price-total">0</span><span>.00</span></h2><h5>{{$data2['s_currency']== 0 ? 'EUR':'CHF'}} <span id="shiftBookingTotal" style="price-total">0</span>*</h5>
                </div>
                <div class="totalText">
                    <p>* Der Gutschein ist gültig für 12 Monate ab Ausstellungsdatum. Kann im Wert um 5 Jahre verlängert werden.</p>
                </div>
                @endforeach
                @endif
            </div>
            
            <input type="hidden" id="vauchTemp" name="vauchTemp"/>
            </div>

            </div>
            <div class="col-12 submitButton">
                <div class="submitVoucher weiter-btn">
                    <div class="loadingStepStyle" >
                        <img src="{{url('loading.gif')}}"/>
                    </div>
                <button class="btn" id="voucherOffers2" type="submit">Weiter</button>
                </div>
            </div>
        </div>
    </form>
                    <div id="bookingVouchers2" class="container-fluid bookingInvalid bookingSteps {{$stInd==2 ? 'stepShowBooking':''}}">
                            <div class="row stepsHold justify-content-center">
                                    <div class="col-4 nopadding">
                                        <h5> 01 </h5> <h5 class="mobileStepTextHide">GUTSCHEIN ERSTELLEN</h5>
                                    </div>
                                    <div class="col-4 nopadding step2">
                                        <h5> 02 </h5> <h5 class="mobileStepTextHide">PERSONALIEN DES KÄUFERS</h5>
                                    </div>
                                    <div class="col-4 nopadding">
                                        <h5> 03 </h5> <h5 class="mobileStepTextHide">BESTÄTIGUNG | ZAHLUNG</h5>
                                    </div>
                                </div>
            <form id="offerVouchForm2" autocomplete="on">
                    <div class="col-12 Title tittleTitle" style="padding-left:0px;border-bottom:2px solid #b4b4b4;">
                            <h1 class="">Ihre Kontaktdaten - Bestellung Geschenkgutschein</h1>
                        </div>
                        <div class="row textWraper">
                            <div class="col-12 bookingText">
                                <h3>{!!$d->title!!}</h3>  
                            </div>
                            <div class="col-12 bookingRow">
                                <div class="tableText1">
                                    <p>Dauer:</p>
                                    <p class="firstP">Gutscheinerlebnis:</p>
                                </div>
                                <div class="col-12 tableText2" style="padding-left:50px !important;">                 
                                    @if($vaucherData[0]->day!=0)
                                        {{$vaucherData[0]->day}}
                                        {{$vaucherData[0]->day>1?"Tage":"Tag"}}
                                    @endif
                                    @if($vaucherData[0]->night!=0)
                                    , {{$vaucherData[0]->night}}
                                    {{$vaucherData[0]->night>1?"Nächte":"Nacht"}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row offerVauchStep22">
                            <div class="col-12">
                                <div id="selectedPricesTable" class="table-responsive">
                                        @if(Session::has('tableSelPrices'))
                                        {!!Session::get('tableSelPrices')!!}
                                        <script>
                                            $(document).ready(function () {
                                                console.log('changing inputs');
                                                //$("body select").change();
                                            });
                                        </script>
                                      @endif
                                </div>
                            </div>

                            <div style="margin-top:20px;color:#626262;" class="col-12 colwithColorMarg">
                                <div id="vaucherOfferT1" class="table-responsive" style="border-bottom: 1px solid #b4b4b4;">
                                        @if(Session::has('offerVaucherD'))
                                            {!!Session::get('offerVaucherD')!!}
                                        @else
                                        <table class="table tablleLayotFix" style="table-layout:fixed;">
                                            <tbody>
                                                <tr>
                                                    <td class="tdWidthW" style="width:165px;"   colspan="4">
                                                        Ausgestellt auf: 
                                                    </td>
                                                    <td>
                                                        <span id="voucherFor" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        Text auf Gutschein: 
                                                    </td>
                                                    <td>
                                                            <span id="voucherText" ></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div id="offerVaucherContact">
                                @if(Session::has('offerVaucherUserContact'))
                                {!!Session::get('offerVaucherUserContact')!!}
                            @else
                        <div style="margin-top:30px;" class="row offerContactTopMRG">
                            <div class="col-12 col-lg-6">
                                <h6 class="formTitle">RECHNUNGSADRESSE</h6>
                                    <div class="form-row row">
                                        <label class="col-3 col-form-label">Anrede:*</label>
                                        <div class="col-2 form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="andreOp" value="Herr" checked="checked" autocomplete="off">
                                            <label class="form-check-label" for="inlineRadio1">Herr</label>
                                        </div>
                                        <div class="col-2 form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="andreOp" value="Frau" autocomplete="off">
                                            <label class="form-check-label" for="inlineRadio2">Frau</label>
                                        </div>
                                    </div> 
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label">Vorname / Nachname: *</label>
                                        <div class="col-6 col-md-5 col-lg-5">
                                            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="" required autocomplete="given-name">
                                        </div>
                                        <div class="col-6 col-md-5 col-lg-5">
                                            <input type="text" id="user_surname" name="user_surname" class="form-control" placeholder="" autocomplete="family-name">
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label">Firma:</label>
                                        <div class="col-12 col-md-10 col-lg-10">
                                            <input type="text" id="user_company" name="user_company" class="form-control" placeholder="" autocomplete="organization" />
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label">Adresse: *</label>
                                        <div class="col-12 col-md-10 col-lg-10">
                                            <input type="text" id="user_address" name="user_address" class="form-control" placeholder="" autocomplete="address-line1">
                                        </div>
                                    </div>
                    
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label">PLZ/Ort: *</label>
                                        <div class="col-4 col-md-3 col-lg-3">
                                            <input type="text" class="form-control" id="user_postalCode" name="user_postalCode" placeholder="" autocomplete="postal-code">
                                        </div>
                                        <div class="col-8 col-md-7 col-lg-7">
                                            <input type="text" class="form-control" id="user_postalPlace" name="user_postalPlace" placeholder="" autocomplete="address-level2">
                                        </div>
                                    </div>
                    
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label" for="user_country">Land: *</label>
                                        <div class="col-12 col-md-10 col-lg-10">
                                            <select class="selectOfferPadd form-control" style="padding: 0px;" class="form-control" id="user_country" name="user_country" autocomplete="off">
                                                <option>Schweiz</option>
                                                <option>Deutschland</option>
                                                <option>Österreich</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label">Telefon: *</label>
                                        <div class="col-12 col-md-10 col-lg-10">
                                            <input type="text" class="form-control" id="user_telephone" name="user_telephone" placeholder="" autocomplete="tel">
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <label class="col-12 col-md-2 col-lg-2 col-form-label">E-Mail: *</label>
                                        <div class="col-12 col-md-10 col-lg-10">
                                            <input type="text" class="form-control" id="user_email" name="user_email" placeholder="" autocomplete="email">
                                        </div>
                                    </div>
                            </div>
                        
                            <div class="col-12 col-lg-6">
                                    <h6 class="formTitle">ZUSÄTZLICHE INFORMATIONEN</h6>
                                    <div class="form-group">
                                        <label for="user_message">Ihre Wünsche</label>
                                        <textarea class="form-control" id="user_message" name="user_message" rows="3"></textarea>
                                    </div>
                            </div>
                        </div>
                    
                <div class="row giftStep2Row">
                    <div class="col-12 col-lg-6">
                            <div class="form-row row">
                                    <label class="col-3 col-md-2 col-lg-2" for="user_payment">Zahlungsart: *</label>
                                    <div class="col-9 col-md-10 col-lg-10">
                                        <select class="form-control"  id="user_payment" name="user_payment">
                                            {{-- <option value="Kreditkarte/Postcard" selected="selected">Kreditkarte/Postcard</option> --}}
                                            <option value="Rechnung">Rechnung</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-row row">
                                    <label class="col-3 col-md-2 col-lg-2" for="user_shipping">Versand: *</label>
                                    <div class="col-9 col-md-10 col-lg-10">
                                        <select class="form-control"  id="user_shipping" name="user_shipping">
                                            <option value="print@home" selected="selected">print@home</option>
                                            <!--<option value="Postversand">Postversand</option>-->
                                        </select>
                                    </div>
                            </div>
                    </div>
                </div>
                @endif
                </div>
            
                <div class="row checkBoxRow">
                    <div class="col-12">
                            <div class="checkRowAlign" style="text-align: right;" class="form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck" name="termsCheck" autocomplete="off">
                                <label style="font-size:13px;" class="form-check-label" for="exampleCheck1">ICH AKZEPTIERE DIE <a  href="{{URL('agb')}}">AGB</a> VON WWW.MEINWEEKEND.CH</label>
                            </div>
                    </div>
                </div>
                <div class="row button">
                    <div class="col-12">
                        <div class="buttonBack">
                            <button type="button" class="btn  btn-lg" id="voucherOffersRet2">Zurück</button>
                        </div>
                        <div class="buttonSuc">
                                <div class="loadingStepStyle" >
                                    <img src="{{url('loading.gif')}}"/>
                                </div>
                            <button type="submit" id="voucherOffers3" class="btn btn-lg">Weiter</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div id="bookingVouchers3" class="container-fluid bookingInvalid bookingSteps {{$stInd==3 || $stInd==4 ? 'stepShowBooking':''}}">
                    <div class="row stepsHold justify-content-center">
                            <div class="col-4 nopadding">
                                <h5> 01 </h5> <h5 class="mobileStepTextHide">GUTSCHEIN ERSTELLEN</h5>
                            </div>
                            <div class="col-4 nopadding">
                                <h5> 02 </h5> <h5 class="mobileStepTextHide">PERSONALIEN DES KÄUFERS</h5>
                            </div>
                            <div class="col-4 nopadding step3">
                                <h5> 03 </h5> <h5 class="mobileStepTextHide">BESTÄTIGUNG | ZAHLUNG</h5>
                            </div>
                        </div>
                        <div class="col-12 Title" style="padding-left:0px;border-bottom:2px solid #b4b4b4;">
                                <h1 class="">Bitte prüfen Sie Ihre Eingaben - Bestellung Geschenkgutschein</h1>
                            </div>
                <div class="row textWraper">
                    <div class="col-12 bookingText">
                            <h3>{!!$d->title!!}</h3>  
                    </div>
                    <div class="col-12 bookingRow">
                        <div class="tableText1">
                            <p>Dauer:</p>
                            <p class="firstP">Gutscheinerlebnis:</p>
                        </div>
                        <div class="col-12 tableText2" style="padding-left:50px !important;">                 
                            @if($vaucherData[0]->day!=0)
                                {{$vaucherData[0]->day}}
                                {{$vaucherData[0]->day>1?"Tage":"Tag"}}
                            @endif
                            @if($vaucherData[0]->night!=0)
                            , {{$vaucherData[0]->night}}
                            {{$vaucherData[0]->night>1?"Nächte":"Nacht"}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row offerVauchStep22">
                    <div class="col-12">
                        <div id="lastStepPrices" class="table-responsive">
                                @if(Session::has('tableSelPrices'))
                                {!!Session::get('tableSelPrices')!!}
                                <script>
                                    $(document).ready(function () {
                                        console.log('changing inputs');
                                        //$("body select").change();
                                    });
                                </script>
                              @endif
                        </div>
                    </div>

                    <div class="colwithColorMarg" style="margin-top:20px;color:#626262;" class="col-12">
                        <div class="table-responsive">
                                @if(Session::has('offerVaucherD'))
                                {!!Session::get('offerVaucherD')!!}
                            @else
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="widthTableRow" style="width:210px;"   colspan="4">
                                            Ausgestellt auf: 
                                        </td>
                                        <td>
                                            <span id="voucherFor1" ></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            Text auf Gutschein: 
                                        </td>
                                        <td>
                                                <span id="voucherText1" ></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div id="vaucherConfirmationInfo">
                    @if(Session::has('userConfData'))
                        {!!Session::get('userConfData')!!}
                    @else
                <div class="row giftStep2Row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="blackColor" style="color:black;" colspan="2">
                                                <b>RECHNUNGSADRESSE</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="giftTableWidth" style="width: 144px;">
                                                Anrede:
                                            </td>
                                            <td>
                                                <span id="userStatusHolder" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Vorname / Nachname:
                                            </td>
                                            <td>
                                                <span id="userFullnameHolder" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Firma:
                                            </td>
                                            <td>
                                                  <span id="userCompanyHolder" ></span>
                                            </td>
                                        </tr>
            
                                        <tr>
                                            <td>
                                                Adresse
                                            </td>
                                            <td>
                                                  <span id="userAddressHolder" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                PLZ/Ort
                                            </td>
                                            <td>
                                                  <span id="userPLZOrtHolder" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Land:
                                            </td>
                                            <td>
                                                <span id="userCountryHolder" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Telefon:
                                            </td>
                                            <td>
                                                  <span id="userTelephoneHolder" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                E-Mail:
                                            </td>
                                            <td>
                                                  <span id="userEmailHolder" ></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="blackColor" style="color:black;" colspan="2">
                                                <b>ZUSÄTZLICHE INFORMATIONEN</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Ihre Wünsche
                                            </td>
                                            <td>
                                                <span id="userMessageHolder" ></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <div style="border-top:none;" class="row giftStep2Row giftStep2RowTopBorNo">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="giftTableWidth" style="width: 144px;">
                                                Zahlungsart:
                                            </td>
                                            <td>
                                                  <b><span id="userPaymentHolder" ></span></b>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Versand:
                                            </td>
                                            <td>
                                                  <b><span id="userShippingHolder" ></span></b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div id="creditCardRules" class="infoMessage">
                                <h6>Die Zahlung erfolgt via PostFinance. Ihre Daten werden dafür über eine gesicherte Verbindung (SSL) von PostFinance verarbeitet. Nach erfolgreicher Transaktion werden Sie automatisch wieder auf die Website der MeinWeekend.ch umgeleitet.
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endif
                    </div>
                    <div class="row button">
                        <div class="col-12">
                            <div class="buttonBack">
                                <button type="button" class="btn  btn-lg" id="voucherOffersRet3">Zurück</button>
                            </div>
                            <div class="buttonSuc">
                                    <div class="loadingStepStyle" >
                                        <img src="{{url('loading.gif')}}"/>
                                    </div>
                                <button type="button" class="btn btn-lg" id="voucherOffers4">Bestellung abschicken</button>
                            </div>
                        </div>
                    </div>
            </div>
            <div id="bookingVouchers4" class="container-fluid bookingInvalid bookingSteps">
                <div class="row">
                    <div class="col-12 step2Title">
                        <h1>Bestellung Geschenkgutschein</h1>
                      </div>
                  </div>
                  
                  <div class="row giftStep3Row">
                      <div class="col-12">
                          <h2>LIEBE<span id="senderName"></span></h2>
                          <div class="confirmFirstPharagraph">
                              <p>Herzlichen Dank für Ihre Gutschein-Bestellung.</p><br>
                          </div>
                          <div class="confirmSecondPharagraph">
                              <p id="printHome" >
                                  Wir senden Ihnen den bestellten Gutschein umgehend an die angegebene Email-Adresse <span class="spanColorNtextDec" id="clientConfirmationEmail" style="color: #013a89;
                                  text-decoration: none;"></span> als PDF-Dokument zum selber Ausdrucken.
                              </p>
                              <p id="postVersand">
                                  Der bestellte Gutschein wird Ihnen innert 24 Stunden per A-Post zugeschickt.
                              </p>
                          </div>
                          <div class="otherInfo"><br>
                              <p>Beste Grüsse</p>
                              <p><br>Ihr Service-Team</p>
                              <p>Swiss Insider GmbH</p><br>
                              <p >Telefon 	+41 (0)43 288 06 26</p>
                              <p>E-Mail	info@meinweekend.ch</p>
                              <p>URL	www.meinweekend.ch</p>
                          </div>
                      </div>
                  </div>
              </div>
        <script>
            
            
            $(document).ready(function () {
                setOffer("{{$offer}}");
                changeDetectorInput();
                activateDate();
                //validateVoucherOffer();
            });
        </script>
              @if(Session::has('selectedPrices'))
              <textarea class="selectedPricesTextAreaDpNone" id="sessionPrice" style="display:none;">
                    {{json_encode(Session::get('selectedPrices'))}}
              </textarea>
              <script>
                  let preSessP=$("#sessionPrice").val();
                  let sessPrice=JSON.parse(preSessP);
                  var pricesSelected=sessPrice.prices;
                  if(sessPrice.additionals != null)
                  {
                    aditionalSelected=sessPrice.additionals;
                  }
              </script>
              <script>
                </script>
            @endif