{{-- {{dd($allData)}} --}}
            {{-- {{dd($allData['singleOfferData'])}} --}}
            {{-- {{dd($allData['singleOfferData'][0]->prices)}} --}}

            {{-- {{dd($allData['singleOfferData'][0])}} --}}
                    {{-- {{dd($allData['exchange'])}} --}}

                   {{-- {{print_r(Session::all())}}  --}}
                   {{-- {{$request->step}} --}}
{{-- <link rel="stylesheet" href="{{url('css/offerpage.css')}}"> --}}

    <div class="container-fluid">
        @include('navoverview2')
        @include('navoverview3')
        @include('navoverview4')
    </div>

    <div class="container-fluid stepsCont">
        <div class="row stepsHold justify-content-center">
            <div id="step1I" class="col-3 nopadding stepsIndic ">
                <h5>01</h5> <h5 class="mobileStepTextHide">ANKUNFTSDATUM</h5>
            </div>
            <div id="step2I" class="col-3 nopadding stepsIndic {{$stInd==2 ? 'step1':''}}">
                <h5>02</h5> <h5 class="mobileStepTextHide">IHRE RESERVATION</h5>
            </div>
            <div id="step3I" class="col-3 nopadding stepsIndic {{$stInd==3 ? 'step1':''}}">
                <h5>03</h5> <h5 class="mobileStepTextHide">KONTAKTDATEN</h5>
            </div>
            <div id="step4I" class="col-3 nopadding stepsIndic {{$stInd==4 ? 'step1':''}}">
                <h5>04</h5> <h5 class="mobileStepTextHide">ANFRAGEBESTÄTIGUNG</h5>
            </div>
            {{-- {{print_r($allData['singleOfferData'])}} --}}

        </div>
        @foreach($allData['singleOfferData'] as $od)
        <div style="max-width:1240px;margin:auto;" class="row">
            <div class="col-12 titleWarp">
                <h4 class="underLine">{{$od->title}}<h4>
            </div>
        </div>
        @endforeach
    </div>
    <div class="section3" style="position: relative;display: flex;">
    <div id="bookingStep2" class="container-fluid bookingValid bookingSteps {{$stInd==2 ? 'stepShowBooking':''}}">
                <div class="row textWraper">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="bookingText">
                            <h3>IHR AUFENTHALT</h3>
                        </div>
                        <div class="bookingRow">
                            <div class="tableText1">
                                <p class="firstP">Ankunftsdatum:</p>
                                <p>Dauer:</p>
                            </div>
                            <div class="tableText2">
				<p id="userDatePickShow" class="secondaryP">

				    @if (!empty($selDateF))
				        {{$selDateF}}
                                    @endif

                                </p>
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
                    <div class="col-12 col-md-6 col-lg-6 offersIncluded">
                        <h6>LEISTUNGSUMFANG PRO PERSON</h6>
                        {!!\App\Helpers\Helpers::clean_text($od->included)!!}
                    </div>
                    @endforeach
                </div>
        <div class="row">
        <div id="bookingTable" class="col-12 tableBooking">
                @if(session()->has('firstTable'))
                @else
                @endif
                {{-- @if(isset(Session::get('tableSelPrices'))) --}}
                {{-- {!!Session::get('firstTable')!!} --}}
                    <script>
                            var ss="{{$allData['singleOfferData'][0]->uid}}";
                            console.log("aslkdjlkasjdlkjasdlkj",ss);
                            console.log("offer",ss);
                            setOffer("{{$allData['singleOfferData'][0]->uid}}");
                        </script>
                @if(Session::has('firstTable'))
                    {!!Session::get('firstTable')!!}
                    <script>
                            $(document).ready(function () {
                                console.log('changing inputs');
                                $("body select").change();
                            });
                        </script>
                @else
                    @if($selecedPrices)
                        {!!$selecedPrices!!}
                    @endif
                @endif
                <div class="bookingS1PEH">
                    <form id="bookingValid1">
                        <input type="text" name="selectedPricesInp" id="selectedPricesInp" class="input option"/>
                    </form>
                </div>
        </div>
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
            <script>
                    $(document).on('change','#price_{{$oPrices->uid}}',function(e){
                   console.log('price event',e);
                   var nItem=$(this).find("option:selected").attr('value');
                   var nItemPrice=$(this).find("option:selected").attr('data-price');
                   var totalPrice=(Number(nItem)*Number(nItemPrice));
                   totalBookingPrice=totalPrice+totalBookingPrice;
                   console.log('total ',totalPrice);
                   console.log('total totalBookingPrice',totalBookingPrice);
                   $("#bookingTotal").text(totalBookingPrice+' EUR');
              });
                    </script>

            @php
                $prCount++;
            @endphp
            @endforeach
                    </tbody>
            </table> --}}
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
                            <div class="loadingStepStyle" >
                                <img src="{{url('loading.gif')}}" title = "loading" alt="loading"/>
                            </div>
                        <button type="button" class="btn btn-lg" id="bookingStepb2" >Weiter</button>
                    </div>
                    </div>
                </div>
            </div>

    <div id="bookingStep3" class="container-fluid bookingInvalid bookingSteps {{$stInd==3 || $stInd==4 ? 'stepShowBooking':''}}">
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
                    <p id="userDatePickShow2" class="secondaryP">
                        @if(isset($selDate) && $selDate != '')
                            @php
                            $selDate = str_replace("/","",$selDate);
			    $date = explode(".",$selDate);
			    setlocale(LC_TIME, "de_DE");
                            @endphp
                            @if(isset($date['1']))
                                @if($date['1'] == '3')
                                    {{strftime("%A", strtotime($selDate))}}, {{$date['0']}}. März, {{$date['2']}}
                                @else
                                {{strftime("%A, %d. %B %Y", strtotime($selDate)) }}
                                @endif
                            @endif
                        @endif

                    </p>
                    <p>
                        @if($allData['singleOfferData'][0]->day!=0)
                            {{$allData['singleOfferData'][0]->day}}
                            {{$allData['singleOfferData'][0]->day>1?"Tage":"Tag"}}
                        @endif
                        @if($allData['singleOfferData'][0]->night!=0)
                            ,{{$allData['singleOfferData'][0]->night}}
                            {{$allData['singleOfferData'][0]->night>1?"Nächte":"Nacht"}}
                        @endif
                        <span id="additionalNight">
                        @if(Session::has('isAdditinalNight'))
                            {!!Session::get('isAdditinalNight')!!}
                        @else
                            {{-- @if($isAdditinalNight)
                                {!!$isAdditinalNight!!}
                            @endif --}}
                        @endif
                        </span>
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
                    @if(Session::has('tableSelPrices'))
                    {!!Session::get('tableSelPrices')!!}
                  @endif
                </div>
            </div>
        </div>
        @if(Session::has('userContactForm'))
        <div class="row hhhhh" id="step2row">
            {!!Session::get('userContactForm')!!}
        </div>
        @else
        <div class="row hhhhh" id="step2row">
            <div class="col-12 col-md-7 col-lg-7 mmmmm">
                <div class="bookingText" >
                <h3>BUCHUNGSANFRAGE:</h3>
                </div>
                <div class="allInfo">
                            <div class="form-group">
                                    <label class="col-3 col-form-label">Anrede:*</label>
                                    <div class="col-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="andreOp" id="anredeH" checked="checked" value="Herr">
                                        <label class="form-check-label" for="inlineRadio1">Herr</label>
                                    </div>
                                    <div class="col-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="andreOp" id="anredeF" value="Frau">
                                        <label class="form-check-label" for="inlineRadio2">Frau</label>
                                    </div>
                            </div>
                            <div class="inputInfo">
                                <div class="form-group input1">
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Vorname*" autocomplete="given-name">
                                </div>
                                <div class="form-group input2">
                                <input type="text" class="form-control" id="user_surname" name="user_surname" placeholder="Nachname*" autocomplete="family-name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_company" name="user_company" autocomplete='organization' placeholder="Firma">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_address" name="user_address" autocomplete='address-line1' placeholder="Adresse*">
                            </div>
                            <div class="inputInfo">
                                <div class="form-group input1">
                                        <input type="text" class="form-control" id="user_postalCode" name="user_postalCode" autocomplete='postal-code' placeholder="PLZ*">
                                </div>
                                <div class="form-group input2">
                                    <input type="text" class="form-control" id="user_postalPlace" name="user_postalPlace" autocomplete='address-level2' placeholder="Ort*">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="col-12 form-control" id="user_country" name="user_country" autocomplete='country-name'>
                                    <option cost="1" value="Schweiz" selected>Schweiz</option>
                                    <option cost="2" value="Deutschland">Deutschland</option>
                                    <option cost="3" value="Österreich">Österreich</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_telephone" name="user_telephone" autocomplete='tel' placeholder="Telefon*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="user_email" name="user_email" autocomplete='email' placeholder="E-mail*">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Zusätzliche Informationen</label>
                                <textarea class="form-control" id="user_message" name="user_message" placeholder="Ihre Wünsche" rows="3"></textarea>
                                <div class="">
                                        <div class="textHolder">
                                                <span>Ihre Buchungsanfrage wird geprüft. Sie erhalten spätestens innerhalb 0 - 24 Stunden eine Reservations–Bestätigung.</span>
                                            </div>
                                </div>
                            </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-5 nnnnn">
                <div class="">
                    <div class=" allInfo">
                        @if($allData['singleOfferData'][0]->terms!='' || $allData['singleOfferData'][0]->to_terms!='')
                        <h3 style="font-size: 14px;margin-top: 20px;"><b>ZAHLUNGSKONDITIONEN</b></h3>
                        @endif
                        @if($allData['singleOfferData'][0]->terms!=null)
                            {!! \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->terms)!!}
                        @else
                            {!!\App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->to_terms)!!}
                        @endif
                    </div>
                    <div class=""   style=" margin-top: 13px;" >
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
                    <div class="bookingText" style="font-size:14px;">
                        @if($allData['singleOfferData'][0]->cancellationterms!='' || $allData['singleOfferData'][0]->to_cancellationterms!='')
                            <h3>Annullationsbedingungen:</h3>
                        @endif
                        @if($allData['singleOfferData'][0]->cancellationterms!=null)
                            {!! \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->cancellationterms) !!}
                        @else
                            {!! \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->to_cancellationterms) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row checkBoxRow">
            <div class="col-12">
                <div class="termsAccept">
                    <div style="text-align: right;" class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termsCheck">
                        <label style="font-size:14px;" class="form-check-label" for="exampleCheck1">ICH AKZEPTIERE DIE <a  href="{{url('agb')}}">AGB</a> VON WWW.MEINWEEKEND.CH</label>
                    </div>
                </div>
            </div>
        </div>
        @if($allData['singleOfferData'][0]->creditcard_required == 1)
        <div class="row">
            <div id="creditCardInfo" style="margin-top:20px;border-bottom:1px solid grey;padding:20px 0;" class="col-12 creditCardInfo">
                <h6>Ihre Kreditkarte dient lediglich als Reservationsgarantie und wird zum Zeitpunkt der Reservationsanfrage nicht belastet.</h6>
                    <div class="form-group">
                        <label class="col-2 col-form-label">Kreditkartentyp</label>
                        <select class="col-5 form-control" id="reservationgarantee_cardtype" name="reservationgarantee_cardtype" autocomplete='cc-type'>
                            <option selected>Visa</option>
                            <option>Mastercard</option>
                            <option>American Express</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-2 col-form-label">Kreditkartennummer</label>
                        <input class="col-5 form-control" type="text" placeholder="" id="reservationgarantee_cardno" name="reservationgarantee_cardno" suggested: autocomplete='cc-number'>
                    </div>

                    <div class="form-group">
                        <label class="col-2 col-form-label">Gültig: Monat/Jahr</label>
                        <select class="col-1 form-control" id="reservationgarantee_exp_month" name="reservationgarantee_exp_month" autocomplete='cc-exp-month'>
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
                        <select class="col-1 form-control" id="reservationgarantee_exp_year" name="reservationgarantee_exp_year" autocomplete='cc-exp-year'>
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
                        <input class="col-5 form-control" type="text" id="reservationgarantee_name" autocomplete='cc-name' placeholder="" name="reservationgarantee_name">
                    </div>
                    <div class="col-12 checkText">
                        <form id="mycheck">
                        <input type="checkbox" id="reservationgarantee_check" name="reservationgarantee_nocard" val="0"/> <p> ICH HABE KEINE KREDITKARTE. BITTE KONTAKTIEREN SIE MICH.</p></form>
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
                        <div class="loadingStepStyle" >
                            <img src="{{url('loading.gif')}}" alt="loading" title = "loading"/>
                        </div>
                    <button type="button" class="btn btn-lg" id="bookingStepb3">Weiter</button>
            </div>
            </div>
        </div>
    </form>
    </div>

    <div id="bookingStep4" class="container-fluid bookingInvalid bookingSteps">
            <div class="row textWraper">
                <div class="col-12 bookingText" style="border-bottom: 1px solid #bfbfbf;">
                    <h3>LIEBE<span id="uStatus"></span> <span id="uName"></span></h3>
                    <p>Herzlichen Dank für Ihre Buchungsanfrage.</p>
                    <p class="textHolderConfirm"><span>Ihre Reservation wird geprüft. Die definitive Reservations-Bestätigung erhalten Sie spätestens innerhalb 24 Stunden.<span></p>

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
                        <p id="userDatePickShow3" class="secondaryP">
                        @if(isset($selDate) && $selDate != '')
                            @php
                            $selDate = str_replace("/","",$selDate);
			    $date = explode(".",$selDate);
			    setlocale(LC_TIME, "de_DE");
                            @endphp
                            @if(isset($date['1']))
                                @if($date['1'] == '3')
                                    {{strftime("%A", strtotime($selDate))}}, {{$date['0']}}. März, {{$date['2']}}
                                @else
                                {{strftime("%A, %d. %B %Y", strtotime($selDate)) }}
                                @endif
                            @endif
                        @endif
                        </p>
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
            <div style="margin-bottom:60px;" class="row">
                <div class="col-12 bookingText">
                    <h3>Reservationsanfrage:</h3>
                </div>
                <div class="col-12 resConf">
                    <div id="lastStepPrices" class="table-responsive">
                            @if(Session::has('tableSelPrices'))
                            {!!Session::get('tableSelPrices')!!}
                          @endif
                     </div>
                </div>
            </div>
            <div style="margin-top:10px;margin-bottom:50px;border-top: 1px solid #bfbfbf;" class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="bookingLeft" style="width: auto;">
                        <div class="bookingText">
                            <h3>IHRE KONTAKTANGABEN:</h3>
                        </div>
                        <div class="PersonInfo">
                                <div class="table-responsive topGeichHld">
                                    <table id="reservationTableBorders" class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Anrede:
                                                </td>
                                                <td>
                                                    <span id="userStatusHolder" ></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Vorname:
                                                </td>
                                                <td>
                                                    <span id="userName" ></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nachname:
                                                </td>
                                                <td>
                                                    <span id="userSurname" ></span>
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
                            {{-- <div class="bookingInfo">
                                <p id="userStatusHolder"></p>
                                <p id="userName"></p>
                                <p id="userSurname"></p>
                                <p id="userCompanyHolder"></p>
                                <p id="userAddressHolder"></p>
                                <p id="userPLZOrtHolder"></p>
                                <p id="userCountryHolder"></p>
                                <p id="userTelephoneHolder"></p>
                                <p id="userEmailHolder"></p>
                            </div> --}}
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
                                <p>E-Mail:          <a style="padding-bottom: 8px !important;" href="{{url('info@meinweekend.ch')}}"> info@meinweekend.ch</a></p>
                                <p>URL:             <a href="{{url('https://www.meinweekend.ch')}}"> MeinWeekend.ch</a></p>
                            </div>
                            <h6>Beste Grüsse</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <input type="hidden" id="bookingDate" value="{{$selDate}}">
<script>
    $(document).ready(function () {
        changeDetectorInput();
        //validateVoucherOffer();
    });
    address="{{$allData['singleOfferData'][0]->address}}";
    bookingDate="{{$selDate}}";
    booking_date="{{$selDate}}";
    creditCardR="{{$allData['singleOfferData'][0]->creditcard_required}}";
</script>

<style>

#reservationTableBorders tr td{

    border: 0px;
    padding-right: 20px;
}
</style>
