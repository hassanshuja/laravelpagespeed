<link rel="stylesheet" href="{{url('css/booking03.css')}}">    
 <div class="container-fluid">
    <div class="allPage">
    <div class="row stepsHold justify-content-center" style="margin-top:60px;">
         <div class="col-3 nopadding">
            <h5>01</h5>
         </div>
        <div class="col-3 nopadding">
              <h5>02 IHRE</h5>
         </div>
        <div class="col-3 nopadding">
            <h5>03</h5>
        </div>
        <div class="col-3 nopadding">
             <h5>04</h5>
         </div>
    </div>
    <div class="row textWraper">
        <div class="col-12 stepsHoldText">
            <h1> Lady Wellness im Dreilaendereck</h1>  
        </div>
        <div class="col-12 bookingText">
            <h3>IHR AUFENTHALT</h3>  
        </div>
        <div class="col-12 bookingRow">
            <div class="tableText1">
                 <p class="firstP">Ankunftsdatum:</p>
                <p>Dauer:</p>
            </div>
            <div class="col-12 tableText2">                 
                <p class="secondaryP">Samstag, 17. März 2018</p>
                <p>3 Tage, 2 Nächte</p>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-12 bookingText">
            <h3>Ihre Reservation:</h3>  
        </div>
     </div>
        <div class="table">
            <table class="col-12">
                <thead>
                  <tr>
                    <th scope="col">Angebot</th>
                    <th scope="col">Person</th>
                    <th scope="col">Preis</th>
                    <th scope="col">Anzahl</th>
                    <th scope="col">Total</th>
                 </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Einzelzimmer</td>
                        <td>1</td>
                        <td>EUR 345</td>
                        <td>2 Zimmer</td>
                        <td>EUR	690</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Gesamtbetrag:</td>
                        <td>EUR690  CHF725*</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="hhhhh">
        <div class="row mmmmm">
          <div class="col-12 bookingText">
            <h3>BUCHUNGSANFRAGE:</h3>  
          </div>
          <div class="col-12 allInfo">
                <form class="formInfo">
                        <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected>Andred</option>
                            <option>Herr</option>
                            <option>Frau</option>
                         </select>
                        </div>
                        <div class="inputInfo">
                         <div class="form-group input1">
                             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vorname">
                          </div>
                          <div class="form-group input2">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nachname">
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Firma">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Adresse">
                        </div>
                        <div class="inputInfo">
                            <div class="form-group input1">
                                 <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="PLZ">
                            </div>
                            <div class="form-group input2">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ort">
                            </div>
                        </div>
                        <div class="form-group">
                          <select class="form-control" id="exampleFormControlSelect1">
                             <option selected>Schewiz</option>
                             <option>Deutschland</option>
                             <option>Österreich</option>
                           </select>
                         </div>
                         <div class="form-group">
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Telefon">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        </div>                        
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Zusätzliche Informationen</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Ihre Wünsche" rows="3"></textarea>
                        </div>
                      </form>
          </div>
        </div>
        <div class="nnnnn">
        <div class="row">
          <div class="col-12 allInfo">
             <h3 style="font-size: 14px;
             margin-top: 20px;">ZAHLUNGSKONDITIONEN2</h3>  
             {!!$data['singleOfferData'][0]->terms!!}
           
          </div>
          <div class="col-12"   style=" margin-top: 13px;" >
              <div class="col-12 bookingText" style="margin-left:0px;">
                  <h3>GUTSCHEIN</h3>
              </div>
           <form class="formInfo">
             <div class="form-group">
                 <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Gutschein Code">
            </div>
             <div class="form-group">
                 <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Marketing Code">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Total Betrag">
            </div>                      
           </form>
          </div>
          <div class="col-12 bookingText">
            <h3>Annullationsbedingungen:</h3>  
            <span>31 bis 11 Tage vor Ankunft 40 % Leistungen
                 <br>11 bis 06 Tage vor Ankunft 80 % Leistungen
                 <br>06 bis 00 Tage vor Ankunft 100 % Leistungen
            </span>
        </div>
        </div>
        <div class="row">
          <div class="col-12 textHolder">
            <span>Ihre Buchungsanfrage wird geprüft. Sie erhalten spätestens innerhalb 0 - 24 Stunden eine Reservations–Bestätigung.</span>
          </div>
          <div class="col-12 checkText">
              <input type="checkbox"><p>Ich akzeptiere die AGB von www.meinweekend.ch</p>
          </div>
          </div>
        </div>
        </div>
          <div class="row button">
                <div class="col-6">
                  <div class="buttonBack">
                     <button type="button" class="btn  btn-lg">Zurück</button>
                  </div>
                </div>
                <div class="col-6">
                 <div class="buttonSuc">
                     <button type="button" class="btn btn-lg">Weiter</button>
                </div>
                </div>
            </div>
        </div>



        {{--  ------------ Booking04 ------------  --}}

        

        {{--  ------------ Booking04 ------------  --}}
</div>  