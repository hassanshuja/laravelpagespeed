    <link rel="stylesheet" href="{{url('css/newsletter.css')}}">      
    <div class="container-fluid">
        @include('navoverview2')
        @include('navoverview3')            
        @include('navoverview4')
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
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nachname">
                </div>
                <div class="form-group inputEmail">
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Adresse">
                </div>
                <div class="contentVer">
                    <div class="imagesVerfication">
                        {{--<img class="img-fluid" src="{{url('https://www.meinweekend.ch/index.php?eID=sr_freecap_EidDispatcher&id=8&vendorName=SJBR&extensionName=SrFreecap&pluginName=ImageGenerator&controllerName=ImageGenerator&actionName=show&formatName=png&L=0&set=74d7f')}}">--}}
                    </div>
                    <div class="buttonSubmit">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Zahlenkombination eingeben">
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