<link rel="stylesheet" href="{{url('css/giftcard02.css')}}">  
<div class="container-fluid">
    @include('navoverview')
    @include('navoverview2')
    
    <div class="row stepsHold justify-content-center">
        <div class="col-4 nopadding step1">
            <h5> 01 GUTSCHEIN ERSTELLEN</h5>
        </div>
        <div class="col-4 nopadding step2">
            <h5> 02 PERSONALIEN DES KÄUFERS</h5>
        </div>
        <div class="col-4 nopadding step3">
            <h5> 03 BESTÄTIGUNG | ZAHLUNG</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12 step2Title">
            <h1>Kontaktdaten - Bestellung Geschenkgutschein</h1>
        </div>
    </div>

    <div class="row giftStep2Row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <h6><b>IHR WERTGUTSCHEIN<b></h6>
                            <td>
                                Ausgestellt auf:
                            </td>
                            <td>
                                hehehehehehe 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Text auf Gutschein:
                            </td>
                            <td>
                                Suchen Sie sich Ihr Erlebnis auf www.meinweekend.ch selbst aus. Verwöhnen Sie sich mit einem wunderschönen Wochenende in der Schweiz oder in einer der angrenzenden Regionen. Die Angebote sind immer aktuell und saisonal angepasst.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Wert:
                            </td>
                            <td>
                                500
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <h6 class="formTitle">RECHNUNGSADRESSE</h6>
            <form>
                <div class="form-row row">
                    <label class="col-2 col-form-label">Anrede:*</label>
                    <div class="col-2 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Herr</label>
                    </div>
                    <div class="col-2 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Frau</label>
                    </div>
                </div>
            </form>
            <form>   
                <div class="form-row row">
                    <label class="col-2 col-form-label">Vorname / Nachname: *</label>
                    <div class="col-10 col-lg-5">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <label class="col-2 col-form-label hideLabel"></label>
                    <div class="col-10 col-lg-5">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-row row">
                    <label class="col-2 col-form-label">Firma:</label>
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-row row">
                    <label class="col-2 col-form-label">Adresse: *</label>
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-row row">
                    <label class="col-2 col-form-label">PLZ/Ort: *</label>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-row row">
                    <label class="col-2" for="exampleFormControlSelect1">Land: *</label>
                    <select class="form-control col-10" id="exampleFormControlSelect1">
                        <option>Schweiz</option>
                        <option>Deutschland</option>
                        <option>Österreich</option>
                    </select>
                </div>
                <div class="form-row row">
                    <label class="col-2 col-form-label">Telefon: *</label>
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-row row">
                    <label class="col-2 col-form-label">E-Mail: *</label>
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-6">
                <form>
                    <h6 class="formTitle">ZUSÄTZLICHE INFORMATIONEN</h6>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </form>
        </div>
    </div>

    <div class="row giftStep2Row">
        <div class="col-12 col-lg-6">
            <form>
                <div class="form-row row">
                    <label class="col-2" for="exampleFormControlSelect1">Zahlungsart: *</label>
                    <select class="form-control col-10" id="exampleFormControlSelect1">
                        <option>Kreditkarte/Postcard</option>
                        <option>Rechnung</option>
                    </select>
                </div>
                <div class="form-row row">
                    <label class="col-2" for="exampleFormControlSelect1">Versand: *</label>
                    <select class="form-control col-10" id="exampleFormControlSelect1">
                        <option>print@home</option>
                        <option>Postversand</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="row checkBoxRow">
        <div class="col-12">
            <form>
                <div style="text-align: right;" class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">ICH AKZEPTIERE DIE AGB VON WWW.MEINWEEKEND.CH</label>
                </div>
            </form>
        </div>
    </div>

    <div class="row button">
        <div class="col-12">
            <div class="buttonBack">
                <button type="button" class="btn  btn-lg">Zurück</button>
            </div>
            <div class="buttonSuc">
                <button type="button" class="btn btn-lg">Weiter</button>
            </div>
        </div>
    </div>

    <div>

    </div>

</div>