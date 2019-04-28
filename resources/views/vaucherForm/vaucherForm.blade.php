<form method="post" action="https://e-payment.postfinance.ch/ncol/prod/orderstandard.asp" id="tx-travel-payment" name="tx-travel-payment">
    {{-- <input type="hidden" name="ACCEPTURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
    <input type="hidden" name="AMOUNT" value="{{$request->total_price}}">
    <input type="hidden" name="BGCOLOR" value="#003c90">
    <input type="hidden" name="BUTTONBGCOLOR" value="#007dc0">
    <input type="hidden" name="BUTTONTXTCOLOR" value="#FFFFFF">
    <input type="hidden" name="CN" value="{{$request->user['name']}}">
    <input type="hidden" name="CURRENCY" value="CHF">
    <input type="hidden" name="DECLINEURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
    <input type="hidden" name="EMAIL" value="{{$request->user['email']}}">
    <input type="hidden" name="EXCEPTIONURL" value="https://www.meinweekend.ch/geschenkgutschein?step=2">
    <input type="hidden" name="LANGUAGE" value="de_DE">
    <input type="hidden" name="ORDERID" value="{{$request->user['user_surname']}}/{{$data['time']}}">
    <input type="hidden" name="OWNERADDRESS" value="{{$request->user['address']}}">
    <input type="hidden" name="OWNERTELNO" value="{{$request->['telephone']}}">
    <input type="hidden" name="OWNERTOWN" value="{{$request->['city']}}">
    <input type="hidden" name="OWNERZIP" value="{{$request->['zip']}}">
    <input type="hidden" name="PSPID" value="meinweekend">
    <input type="hidden" name="TBLBGCOLOR" value="#e6e8ee">
    <input type="hidden" name="TBLTXTCOLOR" value="#000000">
    <input type="hidden" name="TITLE" value="MeinWeekend.ch">
    <input type="hidden" name="TXTCOLOR" value="#FFFFFF">
    --}}
    @foreach($formFields as $k=>$v)
        <input type="hidden" name="{{$k}}" value="{{$v}}">
    @endforeach
    <input type="hidden" name="SHASIGN" value="{{$shasign}}">
    <input type="submit" name="submit" id="creditSub" value="online bezahlen">
</form>