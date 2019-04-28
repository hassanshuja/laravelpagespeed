
<link rel="stylesheet" href="<?php echo e(url('css/gruppenanfrage.css')); ?>">      
<?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('navoverview3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div style="margin-bottom:40px;" id="groupOfferFirstStep" class="container-fluid">
    
    <div style="max-width:1240px;margin:auto;margin-top:50px;padding-bottom:20px;" class="row">        
        <div class="col-12 titleWraper">
            <h1>Ihre Gruppenanfrage</h1>
        </div>  
    </div>
    <div style="max-width:1240px;margin:auto;" class="row">
    <div style="margin-bottom:30px;" class="col-12 col-lg-12 col-md-12 col-sm-12">
        <div class="textWraper">
        <p>Swiss Insider GmbH
        <br>Email info@meinweekend.ch
        <br>Telefon +41 (0)43 288 06 26
        <br>
        <br>Für Fragen stehen wir Ihnen gerne zur Verfügung. 
        </p>
        </div>
    </div>
    <div class="col-7 gruppenanfrageForm">
        <h4>Ihre Kontaktadresse</h4>
        <form id="groupOfferForm">
                <?php echo e(csrf_field()); ?>

            <div class="form-row row">
                <label class="col-2 col-form-label">Ausflugspackage</label>
                <div class="col-10">
                    <input type="text" id="excursion_package" name="excursion_package" class="form-control" value="<?php echo e($offerName); ?>" placeholder="<?php echo e($offerName); ?>">
                </div>
            </div>
            <div class="form-row row">
                <label class="col-2 col-form-label">Gewünschtes Datum</label>
                <div class="col-10">
                <input type="date" id="group_date" name="group_date" class="form-control" placeholder="Datum" value="<?php echo e($date); ?>">
                </div>
            </div>    
            <div class="form-row row">
                <label class="col-2 col-form-label"> Name / Vorname</label>
                <div class="col-10 col-lg-5">
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="">
                </div>
                <div class="col-10 col-lg-5">
                    <input type="text" id="user_surname" name="user_surname" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-row row">
                <label class="col-2 col-form-label">Firma:</label>
                <div class="col-10">
                    <input type="text" id="user_company" name="user_company" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-row row">
                <label class="col-2 col-form-label">Strasse</label>
                <div class="col-10">
                    <input type="text" id="user_address" name="user_address" class="form-control" placeholder="">
                </div>
            </div>

            <div class="form-row row">
                <label class="col-2 col-form-label">PLZ/Ort: *</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="user_postalCode" name="user_postalCode" placeholder="">
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" id="user_postalPlace" name="user_postalPlace" placeholder="">
                </div>
            </div>

            <div class="form-row row">
                <label class="col-2 col-form-label">Telefon: *</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="user_telephone" name="user_telephone" placeholder="">
                </div>
            </div>
            <div class="form-row row">
                <label class="col-2 col-form-label">E-Mail: *</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="">
                </div>
            </div>
        </form>
    </div>
    <div class="col-5 gruppenanfrageForm2">
        <h4>Zusatzinformationen</h4>
        <form>
            <div class="form-row row">
                <label class="col-4 col-form-label">Alternativ-Termine</label>
                <div class="col-8">
                    <input type="text" id="alternativ_Termine" name="alternativ_Termine" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-row row">
                <label class="col-4 col-form-label">Gewünschte Startzeit</label>
                <div class="col-8">
                    <input type="text" id="desired_start_time" name="desired_start_time" class="form-control" placeholder="">
                </div>
            </div>    
            <div class="form-row row">
                <label class="col-4 col-form-label">Anzahl Teinehmer</label>
                <div class="col-8">
                    <input type="text" id="no_participants" name="no_participants" class="form-control" placeholder="Erwachsene / Kinder">
                </div>
            </div>
            <div class="form-row row">
                <label class="col-4 col-form-label">Bemerkungen</label>
                <div class="col-8">
                    <input type="text" id="remarks" name="remarks" class="form-control" placeholder="">
                </div>
            </div>
        </form>
    </div>
    <div style="margin-top:25px;margin-bottom:40px;" class="col-12">
        <div class="submitVoucher weiter-btn">
            <button type="button" class="btn" id="sendGroupOffer">Weiter</button>
        </div>
    </div>
    </div>
</div>
<div style="margin-bottom:40px;display:none;" class="container-fluid" id="groupOfferSecondStep">
    <div style="max-width:1240px;margin:auto;margin-top:50px;padding-bottom:20px;" class="row">        
        <div class="col-12 titleWraper">
            <h1>Anfragebestätigung</h1>
        </div>
        <div class="textWraper">
                <p style="display:block;padding-left:15px;">Herzlichen Dank für Ihre Kontaktaufnahme.</p>
                <p style="display:block;padding-left:15px;">Wir werden uns umgehend mit Ihnen in Verbindung setzen.</p>
        </div>
    </div>
    <div style="max-width:1240px;margin:auto;" class="row">
        <div style="margin-bottom:30px;" class="col-12 col-lg-12 col-md-12 col-sm-12">
            <div class="textWraper">
                <p>Swiss Insider GmbH
                <br>Email info@meinweekend.ch
                <br>Telefon +41 (0)43 288 06 26
                <br>
                <br>Für Fragen stehen wir Ihnen gerne zur Verfügung. 
                </p>
            </div>
        </div>
    </div>
</div>