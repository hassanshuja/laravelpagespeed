{{--  {{dd($data)}}  --}}
<div class="container-fluid">
        <link rel="stylesheet" href="{{url('css/booking02.css')}}">  
        @include('navoverview2')
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
<div class="col-12 tableBooking">
<table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Person</th>
        <th scope="col">Price</th>
        <th scope="col">Zimmer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Einzelzimmer</td>
        <td>1</td>
        <td>EUR 345 CHF 362</td>
        <td>
          <select class="custom-select">
            <option selected>Choose...</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Doppelzimmer</td>
        <td>2</td>
        <td>EUR 690	 CHF 725</td>
        <td>
          <select class="custom-select">
            <option selected>Choose...</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Dreibettzimmer</td>
        <td>3</td>
        <td>EUR 1'035 CHF 10'087</td>
        <td>
          <select class="custom-select">
            <option selected>Choose...</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
    <div class="row">
        <div class="col-12 ">
          <div class="totalPrice">
            <h5>Gesamtbetrag</h5>
            <h1>Euro 0</h1>
            <h5>CHF 0*</h5>
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