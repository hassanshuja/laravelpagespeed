    <link rel="stylesheet" href="<?php echo e(url('css/newsletter.css')); ?>">      
    <div class="container-fluid">
        <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
        <?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row justify-content-center textHoler">
            <div class="col-12  textWraper">
                <h1>Aktuelle Weekend-Angebote und Specials</h1>
                <p>Exklusive Neuigkeiten und Sonderangebote von Meinweekend abonnieren!
                <br> Bitte senden Sie mir den Newsletter künftig per E-Mail zu. 
                </p>
            </div>
            <div class="col-12 col-md-7 formLetter">
              <form>
              <div class="form-group inputSelect">
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option value="" hidden>Andrede</option>
                    <option>Herr</option>
                    <option>Frau</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vorname">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Nachname">
                </div>
                <div class="form-group inputEmail">
                  <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Adresse">
                </div>
                <div class="contentVer">
                    <div class="imagesVerfication">
                        
                    </div>
                    <div class="buttonSubmit">
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Zahlenkombination eingeben">
                        <button type="button" class="btn btn-primary btn-block">Anmelden</button>
                    </div>
                </div>
              </form>
            </div>
        </div>
        <div style="margin-bottom:50px;" class="row justify-content-center">
            <div class="col-12 col-md-7">
              <div class="changeLink">
                 <p>Newsletter-Abonnement bearbeiten oder löschen</p>
              </div>
            </div>
        </div>
    </div>