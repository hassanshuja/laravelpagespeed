    <link rel="stylesheet" href="{{url('css/contact.css')}}"> 
    <div style="margin-bottom:40px;" class="container-fluid">
      @include('navoverview2')
      @include('navoverview3')            
      @include('navoverview4')
     <div style="max-width:1240px;margin:auto;margin-top:50px;padding-bottom:20px;" class="row" id="contactTitleHolder">        
        <div class="col-12 titleWraper">
          <h1>Kontakformular</h1>
        </div>  
     </div>
     <div style="max-width:1240px;margin:auto;" class="row" id="contactItemsHolder">
      <div class="col-12 col-lg-3 col-md-12 col-sm-12">
       <div class="textWraper">
        <p>Swiss Insider GmbH
        <br>Alpenblickstrasse 19
        <br>CH-8340 Hinwil
        <br>
        <br>Telefon
        <br>+41 (0) 43 288 06 26
        <br>
        <br>Email
        <br>info@meinweekend.ch
        <br>
        <br>*Bitte füllen Sie alle Felder aus.  
        </p>
       </div>
      </div>
      <div class="col-12 col-lg-9 col-md-12 col-sm-12 contactInfo" id="contactFormHolder">
              <form id="contactForm">
                {{ csrf_field() }}
              <div class="form-group inputSelect">
                  <select style="color:#626262;" class="form-control" id="andreOp" name="andreOp">
                    <option value="" selected>Andrede*</option>
                    <option value="Herr">Herr</option>
                    <option value="Frau">Frau</option>
                  </select>
              </div>
               <div class="nameWarp">
                <div class="form-group inputVorname">
                  <input type="text" class="form-control" id="user_surname" name="user_surname" placeholder="Vorname*">
                </div>
                <div class="form-group inputName">
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name*">
                </div>
               </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="user_company" name="user_company" placeholder="Firma">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Strasse*">
                </div>
                <div class="inputPlzandOrt">
                 <div class="form-group inputPLZ">
                   <input type="text" class="form-control" id="user_postalCode" name="user_postalCode" placeholder="PLZ*">
                 </div>
                 <div class="form-group inputOrt">
                   <input type="text" class="form-control" id="user_postalPlace" name="user_postalPlace" placeholder="Ort*">
                 </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="user_telephone" name="user_telephone" placeholder="Telefon*">
                </div>
                <div class="form-group inputEmail">
                  <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email Adresse*">
                </div>
                <div class="form-group inputEmail">
                  <input type="text" class="form-control" id="user_offer" name="user_offer" placeholder="Gewünschtes Erlebnis">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="5" id="user_comment" name="user_comment" placeholder="Mein Anliegen*"></textarea>
                </div>          
                <div class="contentVer">
                    <div class="imagesVerfication">
                      <div class="g-recaptcha" data-sitekey="6Ld6YGEUAAAAAHsWdHTWdHz81qCVOes_KdHSXCxG"></div>
                    </div>
                    <div class="buttonSubmit">
                        {{-- <input type="text" class="form-control" id="userRandomCode" placeholder="Zahlenkombination eingeben" name="userRandomCode"> --}}
                        <button type="button" class="btn btn-primary btn-block" id="confirmContact" >Senden</button>
                    </div>
                </div>
              </form>
        </div>
        
    </div>
    <div id="contactSendConfirmation" style="max-width:1240px;margin:auto;margin-top:50px;padding-bottom:20px;display:none;" class="row">
          <div class="col-12 titleWraper clearPaddingContact">
            <h1>Anfragebestätigung</h1>
          </div>
          <div class="successContactText">
          <p>Vielen Dank für Ihre Nachricht!
            <br>Vielen Dank für Ihre Anfrage.
            <br>Wir nehmen innerhalb 24 Stunden Kontakt mit Ihnen auf.
            <br>
            <br>Mit freundlichen Grüssen,
            <br>Ihr MeinWeekend-Team
          </p>
          </div>
        </div>
