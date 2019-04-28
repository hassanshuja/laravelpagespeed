                    {{-- {{dd($vauchers)}} --}}
<link rel="stylesheet" href="{{url('css/geschenkgutschein.css')}}">
<link rel="stylesheet" href="{{url('css/giftcard02.css')}}">
<link rel="stylesheet" href="{{url('css/giftcard03.css')}}">
<div class="container-fluid">
    @include('navoverview2')
    @include('navoverview3')            
    @include('navoverview4')
      <div class="container-fluid voucherSteps {{$stInd==1 || $stInd=='' ? 'stepShowVoucher':''}}" id="voucherStep1">
        <div class="row giftCard">
          <div class="col-12 erlebnis-title">
            <h1>Erlebnis Schweiz als Geschenkgutschein</h1>
          </div>
          <div class="col-12 col-sm-12 col-md-6 hiddeMobileT2">
            <div class="topGeichHld">
                <h2 class="erlebnis-headingtwo">Freude und Freizeit mit einem Wertgutschein schenken</h2>
                <div class="erlebnis-paragraphs">
                <p  style="color:#212529 !important;">Ein Geschenkgutschein ist eine tolle Geschenkidee zum Geburtstag, zum Jubiläum, zu Weihnachten, zur Hochzeit oder als Hauptgewinn an einem Wettbewerb.</p>
                <p style="color:#212529;">www.meinweekend.ch bietet Ihnen eine breite Auswahl für ein spannendes Weekend oder einen Tagesausflug in der Schweiz. Für Freizeit-Aktivisten und Romantiker – einfach für alle Menschen, die in ihrer Freizeit einmal etwas ganz Besonderes erleben möchten.</p>
                </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6">
            <h2 class="erlebnis-headingtwo">Ihr Geschenkgutschein als Wertgutschein</h2>
            <ul>
              <li>Für jeden etwas dabei - Weekends und Tagesausflüge</li>
              <li>Der Gutschein ist als pdf oder in Papierform erhältlich</li>
              <li>Gültigkeitsdauer ist 5 Jahre, kann um 1 Jahr verlängert werden</li>
              <li>Wert kann über eine oder mehrere Buchungen eingelöst werden</li>
              <li>Einfache Buchung: telefonisch, per E-Mail oder online möglich</li>
              <li>Ausgewählte Veranstalter und kompetente Beratung</li>
            </ul>
          </div>
        </div>
        <div class="row stepsHold justify-content-center">
                <div class="col-4 nopadding step1 stepVoucherSteps">
                        <h5> 01 </h5> <h5 class="mobileStepTextHide"> GUTSCHEIN ERSTELLEN</h5>
                    </div>
                    <div class="col-4 nopadding stepVoucherSteps">
                        <h5> 02 </h5> <h5 class="mobileStepTextHide"> PERSONALIEN DES KÄUFERS</h5>
                    </div>
                    <div class="col-4 nopadding stepVoucherSteps">
                        <h5> 03 </h5> <h5 class="mobileStepTextHide"> BESTÄTIGUNG | ZAHLUNG</h5>
                    </div>
        </div>
        <form id="VouchForm1">
        <div class="row voucherImgForm ">
          <div class="col-12 wb-title">
            <h1>Wertgutschein bestellen</h1>
          </div>
          <div class="col-12 col-sm-6 col-md-6 vouchPart1">
             
            <div class="giftImgHolder">
              <div class="vouchHolder" style="text-align:center;">
                    <img class="img-fluid" src="{{url('/assets/voucher/headlogo.PNG')}}" alt="Wertgutschein bestellen">
                <img id='mainImage' class="img-fluid" src="{{url('assets/voucher/'.$vauchers[0]->image)}}" alt="Wertgutschein bestellen">
                <div class="voucherInfo">
                  <h4 id="vouchNameTag">Laura & David Muster </h4>
                  <h5 id="voucherDescArea">Suchen Sie sich Ihr Erlebnis auf www.meinweekend.ch selbst aus. Verwöhnen Sie sich mit einem wunderschönen Wochenende in der Schweiz oder in einer der angrenzenden Regionen. Die Angebote sind immer aktuell und saisonal angepasst.</h5>
                  <div class="priceNdate geschukeN">
                    <h6 class="priceNdateLeft" style="float:left; padding-left:5px;">Wert:<span id="vouchPrice"> CHF 100</span><span>.00</span></h6><h6 class="priceNdateRight" style="float:right;padding-right:5px;">Gültig ab: <span id="vouchDate"> 02.04.2018</span></h6>
                  </div>
                </div>
                <div class="voucherFooter">
                  <h6>wir bitten sie um frühzeitig reservation</h6>
                  <p> Swiss Insider GmbH
                  <br> Tel. +41 (0)43 288 06 26 | www.meinweekend.ch</p>
                  <br>
                  <br>
                  <p><b>Die Preisgarantie ist 1 Jahr ab Ausstellungsdatum 18.04.2019.</b>
                  <br>Der Gutschein-Wert kann 5 Jahre eingelöst werden<br>
                  Der Wert des Gutscheines ist auf allen Angeboten in den Kategorien "Weekend" und "Tagesausflüge" einlösbar
                </p>
                </div>
              </div>
              <div>
                {{-- <ul>
                  <li>
                    <div class="thumbImg">
                      <img class="img-fluid" onClick='showImage("giftImage.png")' src="{{url('images/giftImage.png')}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                  <li>
                    <div class="thumbImg">
                      <img class="img-fluid" onClick='showImage("giftImage.png")' src="{{url('images/giftImage.png')}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                  <li>
                    <div class="thumbImg">
                      <img class="img-fluid" onClick='showImage("giftImage.png")' src="{{url('images/giftImage.png')}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                  <li>
                    <div class="thumbImg">
                      <img class="img-fluid" onClick='showImage("giftImage.png")' src="{{url('images/giftImage.png')}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                  <li>
                    <div class="thumbImg">
                      <img class="img-fluid" onClick='showImage("giftImage.png")' src="{{url('images/giftImage.png')}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                  <li>
                    <div class="thumbImg">
                      <img class="img-fluid" onClick='showImage("giftImage.png")' src="{{url('images/giftImage.png')}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                </ul> --}}
                <ul>
                    @php
                     $vCount=0;
                    @endphp
                    @foreach($vauchers as $d)
                  <li>
                    <div class="thumbImg" onClick='showImage("{{'assets/voucher/'.$d->image}}",{{$vCount}})'>
                    <img class="img-fluid"  src="{{url('assets/voucher/'.$d->image)}}" alt="Wertgutschein bestellen">
                    </div>
                  </li>
                  
                  @php
                  $vCount++;
                 @endphp
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6">
                  {{ csrf_field() }}
            <div id="mainVaucherFormS1">
                    @if(Session::has('mainVaucherFormVaucher'))
                    {!!Session::get('mainVaucherFormVaucher')!!}
                @else
					
              <div class="form-group">
				 <input type="hidden" id="voucherType" value="0"/>
                <label>Ausgestellt auf *</label>
                <input type="text" id="vouchName" name="vouchName" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Text auf Gutschein *</label>
                <textarea maxlength="400" class="form-control vouchDescAr" name="vouchText" id="exampleTextarea" rows="5">Suchen Sie sich Ihr Erlebnis auf www.meinweekend.ch selbst aus. Verwöhnen Sie sich mit einem wunderschönen Wochenende in der Schweiz oder in einer der angrenzenden Regionen. Die Angebote sind immer aktuell und saisonal angepasst.</textarea>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-2 col-lg-2 col-form-label">Gültig ab *</label>
                <div class="col-12">
                  <input id="user_validFrom" class="form-control" type="date" name="vouchDate">
                </div>
              </div>
              <fieldset class="form-group radioButton">
                <label>Wert</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" data-update-h="1" name="optionsRadios" id="optionsRadios1" value="100" checked>
                    CHF 100.00
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" data-update-h="2" name="optionsRadios" id="optionsRadios2" value="250">
                    CHF 250.00
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" data-update-h="3" name="optionsRadios" id="optionsRadios3" value="500">
                    CHF 500.00
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" data-update-h="4" name="optionsRadios" id="optionsRadios4" value="1000">
                    CHF 1000.00
                  </label>
                </div>
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" data-update-h="5" name="optionsRadios" id="optionsRadios5" value="other">
                    Anderer Wert CHF
                  </label>
                </div>
                <div class="">
                  <input id="otherValue" type="number" style="width:auto;" class="form-control" value="" placeholder="">
                </div>
              </fieldset>
              @endif
              </div>
          </div>
          <div class="col-12 submitButton">
            <div class="submitVoucher weiter-btn">
                
                    <div class="loadingStepStyle" >
                            <img src="{{url('loading.gif')}}" alt="loading"/>
                        </div>
              <button type="submit" class="btn" id="voucherStepb1">Weiter</button>
            </div>
          </div>
        </div>
    </form>
      </div>
      <form id="VouchForm2">
      <div id="voucherStep2" class="container-fluid voucherSteps {{$stInd==2 ? 'stepShowVoucher':''}}">
        <div id="voucherMainTableTop" class="row giftStep2Row">
            @if(Session::has('st2Price'))
                {!!Session::get('st2Price')!!}
            @else
                    <div class="stepsHold justify-content-center" style="width: 100%;margin-left: 0px;margin-right: 0px;">
                            <div class="col-4 nopadding  stepVoucherSteps">
                                    <h5> 01</h5> <h5 class="mobileStepTextHide">GUTSCHEIN ERSTELLEN s</h5>
                                </div>
                                <div class="col-4 nopadding step1 stepVoucherSteps">
                                    <h5> 02</h5> <h5 class="mobileStepTextHide">PERSONALIEN DES KÄUFERS</h5>
                                </div>
                                <div class="col-4 nopadding stepVoucherSteps">
                                    <h5> 03</h5> <h5 class="mobileStepTextHide">BESTÄTIGUNG | ZAHLUNG</h5>
                                </div>
                            <div class="col-12 step2Title">
                                <h1>Kontaktdaten - Bestellung Geschenkgutschein</h1>
                            </div>
                          </div>
              <div class="col-12">
                  <div class="table-responsive">
                      <table class="table">
                          <tbody>
                                <tr>
                                    <td><b class="blackNbold" style="color:black;">IHR WERTGUTSCHEIN</b></td>
                                    <td>
                                        <br>&nbsp;</td>
                                </tr>

                              <tr>
                                  <td class="tdSizeE" style="width:200px;">
                                      Ausgestellt auf: 
                                  </td>
                                  <td>
                                      <span id="voucherFor" ></span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Text auf Gutschein: 
                                  </td>
                                  <td>
                                        <span id="voucherText" ></span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Wert: 
                                  </td>
                                  <td>
                                        CHF <span id="voucherPrice" ></span>.00
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
              @endif
            </div>
          
          <div id="mainVauchContact" class="row">
              
          @if(Session::has('mainVaucherStep2'))
          {!!Session::get('mainVaucherStep2')!!}
         @else
              <div class="col-12 col-lg-6">
                <div class="topGeichHld">
                  <h6 class="formTitle">RECHNUNGSADRESSE</h6>
                      <div class="form-row row radddIoButton">
                          <label class="col-3 col-form-label">Anrede:*</label>
                          <div class="col-2 form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="anredeOp" id="anredeH" checked="checked" value="Herr">
                              <label class="form-check-label">Herr</label>
                          </div>
                          <div class="col-2 form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="anredeOp" id="anredeF" value="Frau">
                              <label class="form-check-label">Frau</label>
                          </div>
                      </div>
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2 col-form-label">Vorname / Nachname: *</label>
                          <div class="col-6 col-md-5 col-lg-5">
                              <input type="text" id="user_name" name="user_name" class="form-control" placeholder="">
                          </div>
                          <label class="col-12 col-md-2 col-lg-2 col-form-label hideLabel"></label>
                          <div class="col-6 col-md-5 col-lg-5">
                              <input type="text" id="user_surname" name="user_surname" class="form-control" placeholder="">
                          </div>
                      </div>
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2 col-form-label">Firma:</label>
                          <div class="col-12 col-md-10 col-lg-10">
                              <input type="text" id="user_company" name="user_company" class="form-control" placeholder="">
                          </div>
                      </div>
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2 col-form-label">Adresse: *</label>
                          <div class="col-12 col-md-10 col-lg-10">
                              <input type="text" id="user_address" name="user_address" class="form-control" placeholder="">
                          </div>
                      </div>
      
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2 col-form-label">PLZ/Ort: *</label>
                          <div class="col-4 col-md-3 col-lg-3">
                              <input type="text" class="form-control" id="user_postalCode" name="user_postalCode" placeholder="">
                          </div>
                          <div class="col-8 col-md-7 col-lg-7">
                              <input type="text" class="form-control" id="user_postalPlace" name="user_postalPlace" placeholder="">
                          </div>
                      </div>
      
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2 col-form-label" for="user_country">Land: *</label>
                          <div class="col-12 col-md-10 col-lg-10">
                              <select class="formClassGes form-control" style="padding: 0px;" id="user_country" name="user_country">
                                  <option value="Schweiz" selected>Schweiz</option>
                                  <option value="Deutschland">Deutschland</option>
                                  <option value="Österreich">Österreich</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2 col-form-label">Telefon: *</label>
                          <div class="col-12 col-md-10 col-lg-10">
                              <input type="text" class="form-control" id="user_telephone" name="user_telephone" placeholder="">
                          </div>
                      </div>
                      <div class="form-row row">
                          <label class="col-12 col-md-2 col-lg-2col-form-label">E-Mail: *</label>
                          <div class="col-12 col-md-10 col-lg-10">
                              <input type="text" class="form-control" id="user_email" name="user_email" placeholder="">
                          </div>
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
              <div class="col-12 col-lg-6">
              <div class="topGeichHld">
                      <div class="form-row row">
                            <label class="col-3 col-md-2 col-lg-2" for="user_payment">Zahlungsart:*</label>
                            <div class="col-9 col-md-10 col-lg-10">
                                <select class="form-control"  id="user_payment" name="user_payment">
                                    {{-- <option value="Kreditkarte/Postcard" selected="selected">Kreditkarte/Postcard</option> --}}
                                    <option value="Rechnung">Rechnung</option>
                                </select>
                            </div>
                      </div>
                      <div class="form-row row">
                            <label class="col-3 col-md-2 col-lg-2" for="user_shipping">Versand:*</label>
                            <div class="col-9 col-md-10 col-lg-10">
                                <select class="form-control"  id="user_shipping" name="user_shipping">
                                    <option value="print@home" selected="selected">print @ home</option>
                                   <!-- <option value="Postversand">Postversand</option>-->
                                </select>
                            </div>
                      </div>
              </div>
              </div>
              @endif
          </div>
      
          <div class="row checkBoxRow">
              <div class="col-12">
                      <div class="checkBoxStyle form-check" style="text-align: right;">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termsCheck">
                          <label style="font-size:14px;" class="form-check-label" for="exampleCheck1">ICH AKZEPTIERE DIE <a  href="{{URL('agb')}}">AGB</a> VON WWW.MEINWEEKEND.CH</label>
                      </div>
              </div>
          </div>
      
          <div class="row button">
              <div class="col-12">
                  <div class="buttonBack">
                      <button type="button" class="btn  btn-lg" id="voucherStepRet2">Zurück</button>
                  </div>
                  <div class="buttonSuc">
                        <div class="loadingStepStyle" >
                            <img src="{{url('loading.gif')}}" alt="loading"/>
                        </div>
                      <button type="submit" id="voucherStepb2" class="btn btn-lg">Weiter</button>
                      @php
                      $myIp='';
                    //   function get_client_ip() {
                    //         $ipaddress = '';
                    //         if (getenv('HTTP_CLIENT_IP'))
                    //             $ipaddress = getenv('HTTP_CLIENT_IP');
                    //         else if(getenv('HTTP_X_FORWARDED_FOR'))
                    //             $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                    //         else if(getenv('HTTP_X_FORWARDED'))
                    //             $ipaddress = getenv('HTTP_X_FORWARDED');
                    //         else if(getenv('HTTP_FORWARDED_FOR'))
                    //             $ipaddress = getenv('HTTP_FORWARDED_FOR');
                    //         else if(getenv('HTTP_FORWARDED'))
                    //         $ipaddress = getenv('HTTP_FORWARDED');
                    //         else if(getenv('REMOTE_ADDR'))
                    //             $ipaddress = getenv('REMOTE_ADDR');
                    //         else
                    //             $ipaddress = 'UNKNOWN';
                    //         return $ipaddress;
                    //     }
                    //     $myIp=get_client_ip();
                      @endphp
                      @if($myIp=="46.99.187.82")
                        <button type="submit" id="voucherStepb2Pay" class="btn btn-lg" style="display:none;">{{$myIp}} onlinesss payment</button>
                      @endif
                    </div>
              </div>
          </div>
      
          <div>
      
          </div>
        </div>
    </form>
      
      <div id="voucherStep3" class="container-fluid voucherSteps {{$stInd==3 ? 'stepShowVoucher':''}}">
            
            <div class="row stepsHold justify-content-center" id="vaucherLastStepTop">
        @if(Session::has('st3Price'))
                {!!Session::get('st3Price')!!}
            @else
                    <div class="col-4 nopadding  stepVoucherSteps">
                        <h5> 01 GUTSCHEIN ERSTELLEN</h5>
                    </div>
                    <div class="col-4 nopadding stepVoucherSteps">
                        <h5> 02 PERSONALIEN DES KÄUFERS</h5>
                    </div>
                    <div class="col-4 nopadding step1 stepVoucherSteps">
                        <h5> 03 BESTÄTIGUNG | ZAHLUNG</h5>
                    </div>
              <div class="col-12 step2Title">
                  <h1>Bitte prüfen Sie Ihre Eingaben - Bestellung Geschenkgutschein</h1>
              </div>
              <div class="col-12">
                  <div class="table-responsive">
                      <table class="table">
                          <tbody>
                                  <tr>
                                      <td><b class="blackNbold" style="color:black;">IHR WERTGUTSCHEIN</b></td>
                                      <td>
                                          <br>&nbsp;</td>
                                  </tr>
  
                              <tr>
                                  <td class="tdSizeE" style="width:200px;">
                                      Ausgestellt auf: 
                                  </td>
                                  <td>
                                      <span id="voucherFor1" ></span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Text auf Gutschein: 
                                  </td>
                                  <td>
                                          <span id="voucherText1" ></span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Wert: 
                                  </td>
                                  <td>
                                      CHF <span id="voucherPrice1" ></span>.00
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
              @endif
            </div>
            <div id="voucherStep3Confirm" class="row giftStep2Row stepsHold">
      @if(Session::has('mainVaucherStep3'))
            {!!Session::get('mainVaucherStep3')!!}
        @else  
              <div class="col-12 col-md-6 col-lg-6">
                  <div class="table-responsive topGeichHld">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td class="blackNbold" style="color:black;" colspan="2">
                                      <b>RECHNUNGSADRESSE</b>
                                  </td>
                              </tr>
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
              <div class="col-12 col-md-6 col-lg-6">
                  <div class="table-responsive topGeichHld">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td class="blackNbold" style="color:black;" colspan="2">
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
              <div class="col-12 col-md-6 col-lg-6">
                  <div class="table-responsive topGeichHld">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td>
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
              <div class="col-12 col-md-6 col-lg-6">
                  <div id="creditCardRules" class="infoMessage">
                      <h6>Die Zahlung erfolgt via PostFinance. Ihre Daten werden dafür über eine gesicherte Verbindung (SSL) von PostFinance verarbeitet. Nach erfolgreicher Transaktion werden Sie automatisch wieder auf die Website der MeinWeekend.ch umgeleitet.</h6>
                  </div>
              </div>
              <div class="col-12 button giftStep2Row">
                  <div class="buttonBack">
                      <button type="button" class="btn  btn-lg" id="voucherStepRet3">Zurück</button>
                  </div>
                  <div class="buttonSuc">
                        <div class="loadingStepStyle" >
                                <img src="{{url('loading.gif')}}" alt="loading"/>
                            </div>
                      <button type="button" class="btn btn-lg" id="voucherStepb3">Bestellen</button>
                  </div>
              </div>
              @endif
            </div>
      </div>
      <div id="voucherStep4" class="container-fluid voucherSteps">
          <div class="row">
              <div class="col-12 step2Title">
                  <h1>Bestellung Geschenkgutschein.</h1>
                </div>
            </div>
            
            <div class="row giftStep3Row">
                <div class="col-12">
                    <h2>LIEBE<span id="senderName"></span></h2>
                    <div class="confirmFirstPharagraph">
                        <p>Herzlichen Dank für Ihre Gutschein-Bestellung.</p>
                    </div>
                    <div class="confirmSecondPharagraph">
                        <p id="printHome" >
                            Wir senden Ihnen den bestellten Gutschein umgehend an die angegebene Email-Adresse <span class="spanColorGES" id="clientConfirmationEmail" style="color: #013a89;
                            text-decoration: none;"></span> als PDF-Dokument zum selber Ausdrucken.
                        </p>
                        <p id="postVersand">
                            Der bestellte Gutschein wird Ihnen innert 24 Stunden per A-Post zugeschickt.
                        </p>
                    </div>
                    <div class="otherInfo">
                        <p>Beste Grüsse</p>
                        <div class="infoDnH" style="display:block;height:10px;"></div>
                        <p>Ihr Service-Team</p>
                        <p>Swiss Insider GmbH</p>
                        <div class="infoDnH" style="display:block;height:10px;"></div>
                        <p >Telefon 	+41 (0)43 288 06 26</p>
                        <p>E-Mail	info@meinweekend.ch</p>
                        <p>URL	www.meinweekend.ch</p>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" onClick="submitCreditCard()" style="display:none;">test credit card</button>
        <div id="voucherStep5" class="row voucherSteps">
            {{-- <form method="post" action=" https://e-payment.postfinance.ch/ncol/test//orderstandard_utf8.asp" id="tx-travel-payment" name="tx-travel-payment">
                <input type="hidden" name="ACCEPTURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
                <input type="hidden" name="AMOUNT" value="25000">
                <input type="hidden" name="BGCOLOR" value="#003c90">
                <input type="hidden" name="BUTTONBGCOLOR" value="#007dc0">
                <input type="hidden" name="BUTTONTXTCOLOR" value="#FFFFFF">
                <input type="hidden" name="CN" value="herolind luzha">
                <input type="hidden" name="CURRENCY" value="CHF">
                <input type="hidden" name="DECLINEURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
                <input type="hidden" name="EMAIL" value="herolindl@live.com">
                <input type="hidden" name="EXCEPTIONURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
                <input type="hidden" name="LANGUAGE" value="de_DE">
                <input type="hidden" name="ORDERID" value="LUZHA/1523884507">
                <input type="hidden" name="OWNERADDRESS" value="kosovo">
                <input type="hidden" name="OWNERTELNO" value="+37745870050">
                <input type="hidden" name="OWNERTOWN" value="gjilan">
                <input type="hidden" name="OWNERZIP" value="60000">
                <input type="hidden" name="PSPID" value="meinweekend">
                <input type="hidden" name="TBLBGCOLOR" value="#e6e8ee">
                <input type="hidden" name="TBLTXTCOLOR" value="#000000">
                <input type="hidden" name="TITLE" value="MeinWeekend.ch">
                <input type="hidden" name="TXTCOLOR" value="#FFFFFF">
                <input type="hidden" name="SHASIGN" value="{{}}">
                <input type="submit" name="submit" id="creditSub" value="online bezahlen">
                </form> --}}
        </div>
    </div>
    <script>
        $(document).ready(function () {
            changeDetectorInput();
                activateDate();
        });
    </script>
                    {{-- <input type="hidden" name="ACCEPTURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
                <input type="hidden" name="AMOUNT" value="25000">
                <input type="hidden" name="BGCOLOR" value="#003c90">
                <input type="hidden" name="BUTTONBGCOLOR" value="#007dc0">
                <input type="hidden" name="BUTTONTXTCOLOR" value="#FFFFFF">
                <input type="hidden" name="CN" value="herolind luzha">
                <input type="hidden" name="CURRENCY" value="CHF">
                <input type="hidden" name="DECLINEURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
                <input type="hidden" name="EMAIL" value="herolindl@live.com">
                <input type="hidden" name="EXCEPTIONURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
                <input type="hidden" name="LANGUAGE" value="de_DE">
                <input type="hidden" name="ORDERID" value="LUZHA/1523884507">
                <input type="hidden" name="OWNERADDRESS" value="kosovo">
                <input type="hidden" name="OWNERTELNO" value="+37745870050">
                <input type="hidden" name="OWNERTOWN" value="gjilan">
                <input type="hidden" name="OWNERZIP" value="60000">
                <input type="hidden" name="PSPID" value="meinweekend">
                <input type="hidden" name="TBLBGCOLOR" value="#e6e8ee">
                <input type="hidden" name="TBLTXTCOLOR" value="#000000">
                <input type="hidden" name="TITLE" value="MeinWeekend.ch">
                <input type="hidden" name="TXTCOLOR" value="#FFFFFF">
                <input type="hidden" name="SHASIGN" value="8117B9A18DF984F21BFD73EF37D4B9C0F9C8C0EE">
                <input type="submit" name="submit" value="online bezahlen">
                <button type=""onClick="submitCreditCard()" style="display:none;">test credit card</button> --}}
