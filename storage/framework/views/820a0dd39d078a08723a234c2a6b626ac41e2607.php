

<link rel="stylesheet" href="<?php echo e(mix('css/offerVaucherPageV2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(mix('css/giftcard02.css')); ?>">
<link rel="stylesheet" href="<?php echo e(mix('css/giftcard03.css')); ?>">
    <div class="container-fluid">
        <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <form id="offerVouchForm1">
		<div id="bookingVouchers1" class="container-fluid contDefCss bookingSteps bookingInvalid <?php echo e($stInd==1 || $stInd=='' ? 'stepShowBooking':''); ?>">

        <div class="row Title">
            <div class="col-12">
                <span class = "title_span">Freude und Freizeit mit einem Geschenkgutschein schenken</span>
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
                    <a style="background: linear-gradient(to bottom,#00499a 0,#0083c5 100%)!important;width: 100%;
    color: #fff;
    font-size: 21px;
    height: 40px;
    text-transform: uppercase;
    margin-top: 22px;
    font-weight: 700;" class="btn" id="voucherStepb1" onClick="scrollToVoucher();">Erlebnisgutschein</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 info2Warp">
                <div class="titleButton2">
                    <a class="btn" style="background: linear-gradient(to bottom,#00499a 0,#0083c5 100%)!important;width: 100%;
    color: #fff;
    font-size: 21px;
    height: 40px;
    text-transform: uppercase;
    margin-top: 22px;
    font-weight: 700;"  href="https://www.meinweekend.ch/geschenkgutschein/">Wertgutschein</a>
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
            <!-- <a name="showCurrentVaucher"></a> --> 
            <?php $__currentLoopData = $vaucherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 Title">
                <h1><?php echo $d->title; ?> als Erlebnisgutschein</h1>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-6 col-md-6 vouchPart1">
                <div class="giftImgHolder" style="text-align:center;">
                <div class="vouchHolder" style="text-align:center; width: 450px;display: inline-block;">
                    <img class="img-fluid" src="<?php echo e(url('/assets/voucher/headlogo.PNG')); ?>" alt="headlogo">
                        <div id="onePhoto" style="display:none;" class="">
                            <img id="onePhotoSwitch" class="img-fluid"  style="width:100%;" src="<?php echo e(url('assets/img'.$images[0]->image)); ?>" alt="Gutschein">
                        </div>
                        <div id="multiplePhoto" class="imagesWarper">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <div class="multiImageHld">
                                                    <img id='mainImage<?php echo e($key.$key.$key); ?>' class="img-fluid" src="<?php echo e(url('assets/img'.$i->image)); ?>" alt="meinweekend Gutschein">
                                                </div>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="voucherInfo">
                    <?php $__currentLoopData = $vaucherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $di): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h6 class="offerTitle" style="color:#b53232;"><?php echo e($di->title); ?></h6>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <h4 id="vouchNameTag">Laura & David Muster </h4>
                    <div id="voucherDescArea">
                            <?php echo \App\Helpers\Helpers::clean_text($di->list_subtitle); ?>

                    </div>
                    <div class="priceNdate">
                    <?php $__currentLoopData = $vaucherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                        <div class="offerInfo1">
                            <div class="offersIncluded1">
                                <?php echo \App\Helpers\Helpers::clean_text($od->included); ?>

                            </div>
                        </div>
                        <div class="offerInfo2">
                            <?php echo \App\Helpers\Helpers::clean_text($od->informacion); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </div>
                    </div>
                    <div class="FakevoucherFooter">
                            <h6>wir bitten sie um frühzeitig reservation</h6>
                            <p> Swiss Insier GmbH
                            <br> more long info for meinweekend
                            <br> Tel. +41 (0)43 288 06 26 | www.meinweekend.ch</p>
                            <br>
                            <br>
                            <p><b>another longer than the first long info for meinweekend.ch</b>
                            <br>an even longer info than the first and the second infos from www.myweekend.ch heehhe</p>
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
                    <ul>
                        <li>
    
                            <div class="thumbImg" onClick="showImageVoucherMultiple()">
                                <table class="table allImgs">
                                    <tbody>
                                        <tr>
                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td style="vertical-align:top !important;"><img id='mainImage<?php echo e($key); ?>'  class="img-fluid" src="<?php echo e(url('assets/img'.$i->image)); ?>" alt="meinweekend Gutschein"></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        
                        <?php
                        $vCount=0;
                        $pCount=1;
                        ?>
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="thumbImg" onClick='showImageVoucherSingle("<?php echo e('assets/img'.$i->image); ?>",<?php echo e($pCount); ?>)'>
                            <img class="img-fluid"  src="<?php echo e(url('assets/img'.$i->image)); ?>" alt="meinweekend Gutschein">
                        </div>
                    </li>
                    
                    <?php
                    $vCount++;
                    $pCount++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                    <?php echo e(csrf_field()); ?>

                    <div id="bookingTable">
                        <?php if(Session::has('firstTable')): ?>
                            <?php echo Session::get('firstTable'); ?>

                        <?php else: ?>
                <div class="form-group">
                    <label for="vouchName">Ausgestellt auf *</label>
                    <input type="text" id="vouchName" name="vouchName" class="form-control" placeholder="" required autocomplete="off"/>
                    <input type="hidden" id="voucherType" value="0"/>
                </div>
                <div class="form-group">
                    <label for="offerVaucherTextarea">Text auf Gutschein *</label>
                    <textarea maxlength="400" class="form-control vouchDescAr" name="vouchText" id="offerVaucherTextarea" rows="5"><?php echo strip_tags($di->list_subtitle, '');; ?></textarea>
                </div>
                <div class="form-group row">
                    <label for="user_validFrom" class="col-2 col-form-label">Gültig ab *</label>
                    <div class="col-12">
                    <input id="user_validFrom" class="form-control" type="date" name="vouchDate" autocomplete="off">
                    </div>
                </div>
                <?php $__currentLoopData = $vaucherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="leistungsumfang">
                    <div class="offersIncluded">
                        <h3>Leistungsumfang</h3>
                        <h6>LEISTUNGSUMFANG PRO PERSON</h6>
                        <?php echo \App\Helpers\Helpers::clean_text($od->included); ?>

                    </div>
                </div>
                        
                <div class="priceDiv">
                    <?php echo \App\Helpers\Helpers::clean_text($prices); ?>

                </div>
                <div class="offerVaucherPriceHold">
                <div class="priceTotWarp">
                        <input type="hidden" value="<?php echo e($data2['s_currency']); ?>" id="s_curr" autocomplete="off"/>
                    <input type="hidden" value="<?php echo e($data2['exchange']); ?>" id="s_exch" autocomplete="off"/>
                    <h4>Gesamtbetrag</h4><h2><?php echo e($data2['s_currency'] ==0 ? 'CHF':'EUR'); ?> <span id="bookingTotal">0</span><span>.00</span></h2><h5><?php echo e($data2['s_currency']== 0 ? 'EUR':'CHF'); ?> <span id="shiftBookingTotal" >0</span>*</h5>
                </div>
                <div class="totalText">
                    <p>* Der Gutschein ist gültig für 12 Monate ab Ausstellungsdatum. Kann im Wert um 5 Jahre verlängert werden.</p>
                </div>
				</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            
            
            <input type="hidden" id="vauchTemp" name="vauchTemp"/>
            </div>

            </div>
            <div class="col-12 submitButton">
                <div class="submitVoucher weiter-btn">
                    <div class="loadingStepStyle" >
                        <img src="<?php echo e(url('loading.gif')); ?>" alt="Loading"/>
                    </div>
                <button class="btn" id="voucherOffers2" type="submit">Weiter</button>
                </div>
            </div>
        </div>
		</div>
	</form>
                    <div id="bookingVouchers2" class="container-fluid bookingInvalid bookingSteps <?php echo e($stInd==2 ? 'stepShowBooking':''); ?>">
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
                            <span class="title_span">Ihre Kontaktdaten - Bestellung Geschenkgutschein</span>
                        </div>
                        <div class="row textWraper">
                            <div class="col-12 bookingText">
                                <h3><?php echo $d->title; ?></h3>  
                            </div>
                            <div class="col-12 bookingRow">
                                <div class="tableText1">
                                    <p>Dauer:</p>
                                    <p class="firstP">Gutscheinerlebnis:</p>
                                </div>
                                <div class="col-12 tableText2" style="padding-left:50px !important;">                 
                                    <?php if($vaucherData[0]->day!=0): ?>
                                        <?php echo e($vaucherData[0]->day); ?>

                                        <?php echo e($vaucherData[0]->day>1?"Tage":"Tag"); ?>

                                    <?php endif; ?>
                                    <?php if($vaucherData[0]->night!=0): ?>
                                    , <?php echo e($vaucherData[0]->night); ?>

                                    <?php echo e($vaucherData[0]->night>1?"Nächte":"Nacht"); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row offerVauchStep22">
                            <div class="col-12">
                                <div id="selectedPricesTable" class="table-responsive">
                                        <?php if(Session::has('tableSelPrices')): ?>
                                        <?php echo Session::get('tableSelPrices'); ?>


                                      <?php endif; ?>
                                </div>
                            </div>

                            <div style="margin-top:20px;color:#626262;" class="col-12 colwithColorMarg">
                                <div id="vaucherOfferT1" class="table-responsive" style="border-bottom: 1px solid #b4b4b4;">
                                        <?php if(Session::has('offerVaucherD')): ?>
                                            <?php echo Session::get('offerVaucherD'); ?>

                                        <?php else: ?>
                                        <table class="table tablleLayotFix" style="table-layout:fixed;">
                                            <tbody>
                                                <tr>
                                                    <td class="tdWidthW" style="width:165px;">
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
                                            </tbody>
                                        </table>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div id="offerVaucherContact">
                            <?php if(Session::has('offerVaucherUserContact')): ?>
                                <?php echo Session::get('offerVaucherUserContact'); ?>

                            <?php else: ?>
								<div style="margin-top:30px;" class="row offerContactTopMRG">
									<div class="col-12 col-lg-6">
										<h6 class="formTitle">RECHNUNGSADRESSE</h6>
											<div class="form-row row">
												<label class="col-3 col-form-label">Anrede:*</label>
												<div class="col-2 form-check form-check-inline">
													<input class="form-check-input" type="radio" name="andreOp" value="Herr" checked="checked">
													<label class="form-check-label">Herr</label>
												</div>
												<div class="col-2 form-check form-check-inline">
													<input class="form-check-input" type="radio" name="andreOp" value="Frau">
													<label class="form-check-label">Frau</label>
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
													<select class="selectOfferPadd form-control" style="padding: 0px;" id="user_country" name="user_country" autocomplete="off">
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
																
																<option value="Rechnung">Rechnung</option>
															</select>
														</div>
												</div>
												<div class="form-row row">
														<label class="col-3 col-md-2 col-lg-2" for="user_shipping">Versand: *</label>
														<div class="col-9 col-md-10 col-lg-10">
															<select class="form-control"  id="user_shipping" name="user_shipping">
																<option value="print@home" selected="selected">print @ home</option>
																<!--<option value="Postversand">Postversand</option>-->
															</select>
														</div>
												</div>
										</div>
									</div>
						<?php endif; ?>
						</div>
            
                <div class="row checkBoxRow">
                    <div class="col-12">
                            <div class="checkRowAlign form-check" style="text-align: right;">
                                <input type="checkbox" class="form-check-input" id="termsCheck" name="termsCheck">
                                <label style="font-size:13px;" class="form-check-label">ICH AKZEPTIERE DIE <a  href="<?php echo e(URL('agb')); ?>">AGB</a> VON WWW.MEINWEEKEND.CH</label>
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
                                    <img src="<?php echo e(url('loading.gif')); ?>" alt="Loading"/>
                                </div>
                            <button type="submit" id="voucherOffers3" class="btn btn-lg">Weiter</button>
                        </div>
                    </div>
                </div>
			</form>
            </div>
            <div id="bookingVouchers3" class="container-fluid bookingInvalid bookingSteps <?php echo e($stInd==3 || $stInd==4 ? 'stepShowBooking':''); ?>">
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
                                <span class="title_span">Bitte prüfen Sie Ihre Eingaben - Bestellung Geschenkgutschein</span>
                            </div>
                <div class="row textWraper">
                    <div class="col-12 bookingText">
                            <h3><?php echo $d->title; ?></h3>  
                    </div>
                    <div class="col-12 bookingRow">
                        <div class="tableText1">
                            <p>Dauer:</p>
                            <p class="firstP">Gutscheinerlebnis:</p>
                        </div>
                        <div class="col-12 tableText2" style="padding-left:50px !important;">                 
                            <?php if($vaucherData[0]->day!=0): ?>
                                <?php echo e($vaucherData[0]->day); ?>

                                <?php echo e($vaucherData[0]->day>1?"Tage":"Tag"); ?>

                            <?php endif; ?>
                            <?php if($vaucherData[0]->night!=0): ?>
                            , <?php echo e($vaucherData[0]->night); ?>

                            <?php echo e($vaucherData[0]->night>1?"Nächte":"Nacht"); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row offerVauchStep22">
                    <div class="col-12">
                        <div id="lastStepPrices" class="table-responsive">
                                <?php if(Session::has('tableSelPrices')): ?>
                                <?php echo Session::get('tableSelPrices'); ?>


                              <?php endif; ?>
                        </div>
                    </div>

                    <div class="colwithColorMarg col-12" style="margin-top:20px;color:#626262;">
                        <div class="table-responsive">
                            <?php if(Session::has('offerVaucherD')): ?>
                                <?php echo Session::get('offerVaucherD'); ?>

                            <?php else: ?>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="widthTableRow" style="width:210px;">
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
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div id="vaucherConfirmationInfo">
                    <?php if(Session::has('userConfData')): ?>
                        <?php echo Session::get('userConfData'); ?>

                    <?php else: ?>
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
                    <?php endif; ?>
                    </div>
                    <div class="row button">
                        <div class="col-12">
                            <div class="buttonBack">
                                <button type="button" class="btn  btn-lg" id="voucherOffersRet3">Zurück</button>
                            </div>
                            <div class="buttonSuc">
                                    <div class="loadingStepStyle" >
                                        <img src="<?php echo e(url('loading.gif')); ?>" alt="Loading"/>
                                    </div>
                                <button type="button" class="btn btn-lg" id="voucherOffers4">Bestellung abschicken</button>
                            </div>
                        </div>
                    </div>
            </div>
            <div id="bookingVouchers4" class="container-fluid bookingInvalid bookingSteps">
                <div class="row">
                    <div class="col-12 step2Title">
                        <span class = "step2_title_span">Bestellung Geschenkgutschein</span>
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
$(document).ready(function(){setOffer("<?php echo e($offer); ?>"),changeDetectorInput(),activateDate()});
        </script>
              <?php if(Session::has('selectedPrices')): ?>
              <textarea class="selectedPricesTextAreaDpNone" id="sessionPrice" style="display:none;">
                    <?php echo e(json_encode(Session::get('selectedPrices'))); ?>

              </textarea>
              <script>
let preSessP=$("#sessionPrice").val();let sessPrice=JSON.parse(preSessP);var pricesSelected=sessPrice.prices;if(sessPrice.additionals!=null)
{aditionalSelected=sessPrice.additionals}
              </script>
            <?php endif; ?>