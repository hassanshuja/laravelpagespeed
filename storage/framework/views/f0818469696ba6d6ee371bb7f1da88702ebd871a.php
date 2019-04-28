
            
            

            
                    

                   
                   


    <div class="container-fluid">
        <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="container-fluid stepsCont">
        <div class="row stepsHold justify-content-center">
            <div id="step1I" class="col-3 nopadding stepsIndic ">
                <h5>01</h5> <h5 class="mobileStepTextHide">ANKUNFTSDATUM</h5>
            </div>
            <div id="step2I" class="col-3 nopadding stepsIndic <?php echo e($stInd==2 ? 'step1':''); ?>">
                <h5>02</h5> <h5 class="mobileStepTextHide">IHRE RESERVATION</h5>
            </div>
            <div id="step3I" class="col-3 nopadding stepsIndic <?php echo e($stInd==3 ? 'step1':''); ?>">
                <h5>03</h5> <h5 class="mobileStepTextHide">KONTAKTDATEN</h5>
            </div>
            <div id="step4I" class="col-3 nopadding stepsIndic <?php echo e($stInd==4 ? 'step1':''); ?>">
                <h5>04</h5> <h5 class="mobileStepTextHide">ANFRAGEBESTÄTIGUNG</h5>
            </div>
            

        </div>
        <?php $__currentLoopData = $allData['singleOfferData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="max-width:1240px;margin:auto;" class="row">
            <div class="col-12 titleWarp">
                <h4 class="underLine"><?php echo e($od->title); ?><h4>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="section3" style="position: relative;display: flex;">
    <div id="bookingStep2" class="container-fluid bookingValid bookingSteps <?php echo e($stInd==2 ? 'stepShowBooking':''); ?>">
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

				    <?php if(!empty($selDateF)): ?>
				        <?php echo e($selDateF); ?>

                                    <?php endif; ?>

                                </p>
                                <p>
                                    <?php if($allData['singleOfferData'][0]->day!=0): ?>
                                        <?php echo e($allData['singleOfferData'][0]->day); ?>

                                        <?php echo e($allData['singleOfferData'][0]->day>1?"Tage":"Tag"); ?>

                                    <?php endif; ?>
                                    <?php if($allData['singleOfferData'][0]->night!=0): ?>
                                    , <?php echo e($allData['singleOfferData'][0]->night); ?>

                                    <?php echo e($allData['singleOfferData'][0]->night>1?"Nächte":"Nacht"); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php $__currentLoopData = $allData['singleOfferData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-6 offersIncluded">
                        <h6>LEISTUNGSUMFANG PRO PERSON</h6>
                        <?php echo \App\Helpers\Helpers::clean_text($od->included); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        <div class="row">
        <div id="bookingTable" class="col-12 tableBooking">
                <?php if(session()->has('firstTable')): ?>
                <?php else: ?>
                <?php endif; ?>
                
                
                    <script>
                            var ss="<?php echo e($allData['singleOfferData'][0]->uid); ?>";
                            console.log("aslkdjlkasjdlkjasdlkj",ss);
                            console.log("offer",ss);
                            setOffer("<?php echo e($allData['singleOfferData'][0]->uid); ?>");
                        </script>
                <?php if(Session::has('firstTable')): ?>
                    <?php echo Session::get('firstTable'); ?>

                    <script>
                            $(document).ready(function () {
                                console.log('changing inputs');
                                $("body select").change();
                            });
                        </script>
                <?php else: ?>
                    <?php if($selecedPrices): ?>
                        <?php echo $selecedPrices; ?>

                    <?php endif; ?>
                <?php endif; ?>
                <div class="bookingS1PEH">
                    <form id="bookingValid1">
                        <input type="text" name="selectedPricesInp" id="selectedPricesInp" class="input option"/>
                    </form>
                </div>
        </div>
            
    </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="totalPrice">
                            <form>
                                    <?php echo e(csrf_field()); ?>

                            </form>
                        <h5>Gesamtbetrag</h5>
                        <input type="hidden" value="<?php echo e($allData['s_currency']); ?>" id="s_curr" />
                    <input type="hidden" value="<?php echo e($allData['exchange']); ?>" id="s_exch" />
                    <h1 ><span id="bookingTotal">0</span> <?php echo e($allData['s_currency'] ==0 ? 'CHF':'EUR'); ?></h1>
                        <h5><?php echo e($allData['s_currency']== 0 ? 'EUR':'CHF'); ?> <span id="shiftBookingTotal">0</span>*</h5>
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
                                <img src="<?php echo e(url('loading.gif')); ?>" title = "loading" alt="loading"/>
                            </div>
                        <button type="button" class="btn btn-lg" id="bookingStepb2" >Weiter</button>
                    </div>
                    </div>
                </div>
            </div>

    <div id="bookingStep3" class="container-fluid bookingInvalid bookingSteps <?php echo e($stInd==3 || $stInd==4 ? 'stepShowBooking':''); ?>">
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
                        <?php if(isset($selDate) && $selDate != ''): ?>
                            <?php
                            $selDate = str_replace("/","",$selDate);
			    $date = explode(".",$selDate);
			    setlocale(LC_TIME, "de_DE");
                            ?>
                            <?php if(isset($date['1'])): ?>
                                <?php if($date['1'] == '3'): ?>
                                    <?php echo e(strftime("%A", strtotime($selDate))); ?>, <?php echo e($date['0']); ?>. März, <?php echo e($date['2']); ?>

                                <?php else: ?>
                                <?php echo e(strftime("%A, %d. %B %Y", strtotime($selDate))); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                    </p>
                    <p>
                        <?php if($allData['singleOfferData'][0]->day!=0): ?>
                            <?php echo e($allData['singleOfferData'][0]->day); ?>

                            <?php echo e($allData['singleOfferData'][0]->day>1?"Tage":"Tag"); ?>

                        <?php endif; ?>
                        <?php if($allData['singleOfferData'][0]->night!=0): ?>
                            ,<?php echo e($allData['singleOfferData'][0]->night); ?>

                            <?php echo e($allData['singleOfferData'][0]->night>1?"Nächte":"Nacht"); ?>

                        <?php endif; ?>
                        <span id="additionalNight">
                        <?php if(Session::has('isAdditinalNight')): ?>
                            <?php echo Session::get('isAdditinalNight'); ?>

                        <?php else: ?>
                            
                        <?php endif; ?>
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
                    <?php if(Session::has('tableSelPrices')): ?>
                    <?php echo Session::get('tableSelPrices'); ?>

                  <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(Session::has('userContactForm')): ?>
        <div class="row hhhhh" id="step2row">
            <?php echo Session::get('userContactForm'); ?>

        </div>
        <?php else: ?>
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
                        <?php if($allData['singleOfferData'][0]->terms!='' || $allData['singleOfferData'][0]->to_terms!=''): ?>
                        <h3 style="font-size: 14px;margin-top: 20px;"><b>ZAHLUNGSKONDITIONEN</b></h3>
                        <?php endif; ?>
                        <?php if($allData['singleOfferData'][0]->terms!=null): ?>
                            <?php echo \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->terms); ?>

                        <?php else: ?>
                            <?php echo \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->to_terms); ?>

                        <?php endif; ?>
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
                        <?php if($allData['singleOfferData'][0]->cancellationterms!='' || $allData['singleOfferData'][0]->to_cancellationterms!=''): ?>
                            <h3>Annullationsbedingungen:</h3>
                        <?php endif; ?>
                        <?php if($allData['singleOfferData'][0]->cancellationterms!=null): ?>
                            <?php echo \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->cancellationterms); ?>

                        <?php else: ?>
                            <?php echo \App\Helpers\Helpers::clean_text($allData['singleOfferData'][0]->to_cancellationterms); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row checkBoxRow">
            <div class="col-12">
                <div class="termsAccept">
                    <div style="text-align: right;" class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termsCheck">
                        <label style="font-size:14px;" class="form-check-label" for="exampleCheck1">ICH AKZEPTIERE DIE <a  href="<?php echo e(url('agb')); ?>">AGB</a> VON WWW.MEINWEEKEND.CH</label>
                    </div>
                </div>
            </div>
        </div>
        <?php if($allData['singleOfferData'][0]->creditcard_required == 1): ?>
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
        <?php endif; ?>
        <div class="row button">
            <div class="col-6">
                <div class="buttonBack">
                    <button type="button" class="btn btn-lg" id="bookingStepRet3">Zurück</button>
                </div>
            </div>
            <div class="col-6">
                <div class="buttonSuc">
                        <div class="loadingStepStyle" >
                            <img src="<?php echo e(url('loading.gif')); ?>" alt="loading" title = "loading"/>
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
                        <?php if(isset($selDate) && $selDate != ''): ?>
                            <?php
                            $selDate = str_replace("/","",$selDate);
			    $date = explode(".",$selDate);
			    setlocale(LC_TIME, "de_DE");
                            ?>
                            <?php if(isset($date['1'])): ?>
                                <?php if($date['1'] == '3'): ?>
                                    <?php echo e(strftime("%A", strtotime($selDate))); ?>, <?php echo e($date['0']); ?>. März, <?php echo e($date['2']); ?>

                                <?php else: ?>
                                <?php echo e(strftime("%A, %d. %B %Y", strtotime($selDate))); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        </p>
                        <p>
                            <?php if($allData['singleOfferData'][0]->day!=0): ?>
                                <?php echo e($allData['singleOfferData'][0]->day); ?> Tage
                            <?php endif; ?>
                            <?php if($allData['singleOfferData'][0]->day!=0): ?>
                            , <?php echo e($allData['singleOfferData'][0]->night); ?> Nächte
                            <?php endif; ?>
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
                            <?php if(Session::has('tableSelPrices')): ?>
                            <?php echo Session::get('tableSelPrices'); ?>

                          <?php endif; ?>
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
                                <p>E-Mail:          <a style="padding-bottom: 8px !important;" href="<?php echo e(url('info@meinweekend.ch')); ?>"> info@meinweekend.ch</a></p>
                                <p>URL:             <a href="<?php echo e(url('https://www.meinweekend.ch')); ?>"> MeinWeekend.ch</a></p>
                            </div>
                            <h6>Beste Grüsse</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <input type="hidden" id="bookingDate" value="<?php echo e($selDate); ?>">
<script>
    $(document).ready(function () {
        changeDetectorInput();
        //validateVoucherOffer();
    });
    address="<?php echo e($allData['singleOfferData'][0]->address); ?>";
    bookingDate="<?php echo e($selDate); ?>";
    booking_date="<?php echo e($selDate); ?>";
    creditCardR="<?php echo e($allData['singleOfferData'][0]->creditcard_required); ?>";
</script>

<style>

#reservationTableBorders tr td{

    border: 0px;
    padding-right: 20px;
}
</style>
