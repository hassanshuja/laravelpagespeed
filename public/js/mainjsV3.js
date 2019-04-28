var br="https://www.meinweekend.ch/",offerType='alle',offerRegion='alle',offerDuration='alle',keyw='alle',vaucherCustom=100,activateEnter=false,jssor1_slider=null,validator=null,scrollHistory=[]; 

function toggleDivWithclass(togglediv,thName) {
    if($(window).width()<768){
    $('#'+togglediv).slideToggle('slow', function(){
    });
    var th=$('#'+thName);
        if(th)
        {
            th.find("i").toggleClass("rotateBack rotate");
        }
    }
}
function activateDate(){
    if ( $('[type="date"]').prop('type') != 'date' ) {
        $('[type="date"]').datepicker();
    }
}
function toggleDivWithFilter(togglediv,thName) {
    if($(window).width()<992){
        $('#'+togglediv).slideToggle('slow', function(){
        });
    }
    var th=$('#'+thName);
    if(th)
    {
        th.toggleClass("clickedFilt");
    }
}
function showImage(image,vType){
    $('#mainImage').attr('src',image);
    $('#mainImage').fadeOut();
    $('#mainImage').fadeIn();
    $('#voucherType').val(vType);
}
function showImageVoucherMultiple(){
    $('#multiplePhoto').show();
    $('#onePhoto').hide();
    $('#vauchTemp').val(0);
}
function showImageVoucherSingle(image,vType){
    $('#multiplePhoto').hide();
    $('#onePhoto').show();
    $('#onePhotoSwitch').attr('src',br+image);
    $('#voucherType').val(vType);
    $('#vauchTemp').val(vType);
}
function changeDetectorInput(){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1;
  var yyyy = today.getFullYear();
  if(dd<10){
    dd='0'+dd;
  }
  if(mm<10){
    mm='0'+mm;
  }
  today = yyyy+'-'+mm+'-'+dd;
  var maxTime = document.getElementById("minDateChange");
  if (maxTime){
    maxTime.setAttribute("min", today);
  }
  $( "#minDateChange" ).on('change', function() {
    var txtVal = this.value;
    $("#vouchDate").text(txtVal);
  });
  $( document ).on('keyup',"#otherValue", function() {
    var txtVal = this.value;
    var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
    if(vaucherCustom=="other")
    {
    $("#vouchPrice").text('CHF ' +txtVal);
    }
  });
  $( document ).on('change',"input[type=radio][name=optionsRadios]", function(){
    vaucherCustom=this.value;
    var parsed = (parseInt($( this ).attr('data-update-h'))-1);
    $('input[type=radio][name=optionsRadios]').each(function( index ) {
        var nin=index+1;
        if(index==parsed)
        {
            $('#optionsRadios'+nin).attr("checked","checked");
        }
        else
        {
            $('#optionsRadios'+nin).removeAttr("checked");
        }
      });
    if(this.value=='other'){
      var txtVal = $("#otherValue").val();
      $("#vouchPrice").text('CHF ' +txtVal);
    } else {
      $('#vouchPrice').text('CHF '+ this.value);
    }
  });

  $( document ).on('keyup',"#exampleTextarea", function() {
      var txtVal = this.value;
      $("#voucherDescArea").text(txtVal);
    });
    $( document ).on('keyup',"#offerVaucherTextarea", function(e) {
        var txtVal = this.value;
        e.currentTarget.innerHTML=txtVal;
        $("#voucherDescArea").html("<p>"+txtVal+"<p>");
      });
    $( document ).on('keyup',"#vouchName",function() {
      var txtVal = this.value;
      $("#vouchNameTag").text(txtVal);
    });
    var offerTxtAr=$("#offerVaucherTextarea");
    if(offerTxtAr.length>0)
    {
        var initialText=offerTxtAr.val();
        if(initialText!='')
        {
            $("#voucherDescArea").html("<p>"+initialText+"<p>");
        }
    }
    var vouchNameInit=$("#vouchName");
    if(vouchNameInit.length>0)
    {
        var initialText=vouchNameInit.val();
        if(initialText!='')
        {
            $("#vouchNameTag").text(initialText);
        }
    }
    var mainVauchInit=$("#exampleTextarea");
    if(mainVauchInit.length>0)
    {
        var initialText=mainVauchInit.val();
        if(initialText!='')
        {
            $("#voucherDescArea").text(initialText);
        }
    }
}
function validateCap(){
    if(grecaptcha)
    {
        var captcha = grecaptcha.getResponse();
        if(captcha =='')
        {
            $(".g-recaptcha").children().first().attr("style","width: 304px; height: 78px;border:1px solid red;");
            setTimeout(() => {
                $(".g-recaptcha").children().first().attr("style","width: 304px;");
            }, 1000);
            return false;
        }
        else
        {
            return true;
        }
    }
}
$(document).ready(function () {
    var sendData={};
    $( document ).on('click',".g-recaptcha div", function(eve) {
        //console.log('.g-recaptcha');
            if(grecaptcha)
            {
                var captcha = grecaptcha.getResponse();
                $(".g-recaptcha").children().first().attr("style","width: 304px; height: 78px;border:1px solid red");
                //console.log('clikcsad');
                //return false;
            }
    });
    $( document ).on('click',"#confirmContact", function(eve) {
        
    var captcha = grecaptcha.getResponse();
        //console.log("captcha",captcha);
            cRules={
                user_name: "required",
                user_surname: "required",
                user_address: "required",
                user_postalCode: "required",
                user_postalPlace: "required",
                user_country: "required",
                user_telephone: "required",
                user_email: "required",
                user_comment: "required",
                andreOp:"required"
            };
            cMessages={
                user_name:{
                    required:"Bitte um Ihre Angaben: Vorname"
                },
                user_surname:{
                    required:"Bitte um Ihre Angaben: Nachname"
                },
                user_address:{
                    required:"Bitte um Ihre Angaben: Adresse"
                },
                user_postalCode:{
                    required:"Bitte um Ihre Angaben: PLZ"
                },
                user_postalPlace:{
                    required:"Bitte um Ihre Angaben: Ort"
                },
                user_country:{
                    required:"Bitte um Ihre Angaben: Land"
                },
                user_telephone:{
                    required:"Bitte um Ihre Angaben: Telefon"
                },
                user_email:{
                    required:"Bitte um Ihre Angaben: E-Mail"
                },
                user_comment:{
                    required:"Bitte um Ihre Angaben: Mein Anliegen"
                },
                andreOp:{
                    required:"Bitte um Ihre Angaben: Andrede"
                }
            };
        $("#contactForm").validate({
            errorClass: "bad-message",
            rules: cRules,
            messages:cMessages,
            submitHandler: function(form) {
                
            var uSurname=$('#user_surname').val();
            var uName=$('#user_name').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uPostalCode=$('#user_postalCode').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uComment=$('#user_comment').val();
            var urandCode=$('#userRandomCode').val();
            var uOffer=$('#user_offer').val();
            var token = $("input[name=_token]").val();
            var uStatus=$("input[name='anredeOp']:checked").val();
            sendData = {
                _token:token,
                andrede:uStatus,
                name:uName,
                vorname:uSurname,
                strasse:uAddress,
                ort:uPostalCode,
                plz:uPostalPlace,
                telefon:uTelephone,
                email:uEmail,
                company:uCompany,
                message:uComment,
                offer:uOffer,
            }
            var valC;
            valC=validateCap();
            if(valC)
            {
                submitContact(sendData);
            }
            else
            {
                return false;
            }
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            }
          });
          $("#contactForm").submit();
    });
    $( document ).on('click',"#sendGroupOffer", function(eve) {
        cRules={
            user_postalCode: "required",
            user_postalPlace: "required",
            user_telephone: "required",
            user_email: "required",
        };
        cMessages={
            user_postalCode:{
                required:"Bitte um Ihre Angaben: PLZ"
            },
            user_postalPlace:{
                required:"Bitte um Ihre Angaben: Ort"
            },
            user_telephone:{
                required:"Bitte um Ihre Angaben: Telefon"
            },
            user_email:{
                required:"Bitte um Ihre Angaben: E-Mail"
            },
        };
        $("#groupOfferForm").validate({
            errorClass: "bad-message",
            rules: cRules,
            messages:cMessages,
            submitHandler: function(form) {
            var excursionPack=$('#excursion_package').val();
            var gDate=$('#group_date').val();
            var uSurname=$('#user_surname').val();
            var uName=$('#user_name').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uPostalCode=$('#user_postalCode').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var alternativT=$('#alternativ_Termine').val();
            var desiredStTime=$('#desired_start_time').val();
            var noParticipants=$('#no_participants').val();
            var uRemarks=$('#remarks').val();
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                offer:excursionPack,
                date:gDate,
                lastName:uSurname,
                firstName:uName,
                company:uCompany,
                street:uAddress,
                plz:uPostalPlace,
                ort:uPostalCode,
                telefon:uTelephone,
                email:uEmail,
                alternative:alternativT,
                starttime:desiredStTime,
                remarks:uRemarks,
                total_people:noParticipants
            }
            submitGroupOffer(sendData);
        },
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        }
    });
    $("#groupOfferForm").submit();
    });
    var liberInd="";
    $( document ).on('click',"#voucherStepb1,#voucherStepb2,#voucherStepb2Pay,#voucherStepb3", function(eve) {
        var vStepId=$(eve.target).attr('id');
        if(vStepId=='voucherStepb1')
        {
            var vFor=$('#vouchName').val();
            var vText=$('#exampleTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            $("#voucherFor").text(vFor);
            $("#voucherFor1").text(vFor);
            $("#voucherText").text(vText);
            $("#voucherText1").text(vText);
            if(vaucherCustom=="other")
            {
                $("#voucherPrice").text(vPrice);
                $("#voucherPrice1").text(vPrice);
            }
            else
            {
                $("#voucherPrice").text(optionsValues.val());
                $("#voucherPrice1").text(optionsValues.val());
            }
            validateVoucherOffer(2,1,'#VouchForm1',{});
        }
        else if(vStepId=='voucherStepb2')
        {
            var uName=$('#user_name').val();
            var uSurname=$('#user_surname').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalCode=$('#user_postalCode').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uCountry=$('#user_country').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uMessage=$('#user_message').val();
            var uPayment=$('#user_payment').val();
            var uShipping=$('#user_shipping').val();
            var uValidFrom=$('#user_validFrom').val();
            var voucherType=$('#voucherType').val();
            uStatus=$("input[name='anredeOp']:checked").val();
            var dbPay=0;
            var dbPayVal=0;
            var vFor=$('#vouchName').val();
            var vText=$('#exampleTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            liberInd=uStatus;
            if(vaucherCustom=="other")
            {
                dbPayVal=vPrice;
            }
            else
            {
                dbPayVal=optionsValues.val();
            }
            if(uPayment!="Rechnung")
            {
                dbPay=1;
                $('#creditCardRules').show();
            }
            else{
                $('#creditCardRules').hide();
            }
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                vaucher_type:2,
                payment_id:dbPay,
                offer:0,
                valid_from:uValidFrom,
                vaucher_for:vFor,
                vaucher_text:vText,
                items:'',
                payment_type:uPayment,
                send_type:uShipping,
                message:uMessage,
                vaucher_template:voucherType,
                total_price:dbPayVal,
                user:{
                    username:uEmail,
                    name:uName+' '+uSurname,
                    first_name:uName,
                    last_name:uSurname,
                    address:uAddress,
                    telephone:uTelephone,
                    fax:'',
                    email:uEmail,
                    title:uStatus,
                    zip:uPostalCode,
                    city:uPostalPlace,
                    country:uCountry,
                    www:'',
                    company:uCompany,
                    gender:uStatus,
                }
            }
            $('#userFullnameHolder').text(uName+" "+uSurname);
            $('#userCompanyHolder').text(uCompany);
            $('#userAddressHolder').text(uAddress);
            $('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);
            $('#userCountryHolder').text(uCountry);
            $('#userTelephoneHolder').text(uTelephone);
            $('#userEmailHolder').text(uEmail);
            $('#userMessageHolder').text(uMessage);
            $('#userPaymentHolder').text(uPayment);
            $('#userShippingHolder').text(uShipping);
            $('#userStatusHolder').text(uStatus);
            $("input[name=AMOUNT]").val(dbPayVal);
            $("input[name=CN]").val(uName+" "+uSurname);
            $("input[name=CURRENCY]").val('CHF');
            $("input[name=EMAIL]").val(uEmail);
            $("input[name=LANGUAGE]").val('de_DE');
            var nowD=new Date();
            $("input[name=ORDERID]").val(uSurname+'/'+nowD);
            $("input[name=OWNERADDRESS]").val(uCountry);
            $("input[name=OWNERTELNO]").val(uTelephone);
            $("input[name=OWNERTOWN]").val(uPostalPlace);
            $("input[name=OWNERTOWN]").val(uPostalPlace);
            $("input[name=OWNERZIP]").val(uPostalCode);
            validateVoucherOffer(2,2,'#VouchForm2',sendData);
        }
        else if(vStepId=='voucherStepb2Pay')
        {
            var uName=$('#user_name').val();
            var uSurname=$('#user_surname').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalCode=$('#user_postalCode').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uCountry=$('#user_country').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uMessage=$('#user_message').val();
            var uPayment=$('#user_payment').val();
            var uShipping=$('#user_shipping').val();
            var uValidFrom=$('#user_validFrom').val();
            var voucherType=$('#voucherType').val();
            uStatus=$("input[name='anredeOp']:checked").val();
            var dbPay=0;
            var dbPayVal=0;
            var vFor=$('#vouchName').val();
            var vText=$('#exampleTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            liberInd=uStatus;
            if(vaucherCustom=="other")
            {
                dbPayVal=vPrice;
            }
            else
            {
                dbPayVal=optionsValues.val();
            }
            if(uPayment!="Rechnung")
            {
                dbPay=1;
                $('#creditCardRules').show();
            }
            else{
                $('#creditCardRules').hide();
            }
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                vaucher_type:2,
                payment_id:dbPay,
                offer:0,
                valid_from:uValidFrom,
                vaucher_for:vFor,
                vaucher_text:vText,
                items:'',
                payment_type:uPayment,
                send_type:uShipping,
                message:uMessage,
                vaucher_template:voucherType,
                total_price:dbPayVal,
                user:{
                    username:uEmail,
                    name:uName+' '+uSurname,
                    first_name:uName,
                    last_name:uSurname,
                    address:uAddress,
                    telephone:uTelephone,
                    fax:'',
                    email:uEmail,
                    title:uStatus,
                    zip:uPostalCode,
                    city:uPostalPlace,
                    country:uCountry,
                    www:'',
                    company:uCompany,
                    gender:uStatus,
                }
            }
            $('#userFullnameHolder').text(uName+" "+uSurname);
            $('#userCompanyHolder').text(uCompany);
            $('#userAddressHolder').text(uAddress);
            $('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);
            $('#userCountryHolder').text(uCountry);
            $('#userTelephoneHolder').text(uTelephone);
            $('#userEmailHolder').text(uEmail);
            $('#userMessageHolder').text(uMessage);
            $('#userPaymentHolder').text(uPayment);
            $('#userShippingHolder').text(uShipping);
            $('#userStatusHolder').text(uStatus);
            $("input[name=AMOUNT]").val(dbPayVal);
            $("input[name=CN]").val(uName+" "+uSurname);
            $("input[name=CURRENCY]").val('CHF');
            $("input[name=EMAIL]").val(uEmail);
            $("input[name=LANGUAGE]").val('de_DE');
            var nowD=new Date();
            $("input[name=ORDERID]").val(uSurname+'/'+nowD);
            $("input[name=OWNERADDRESS]").val(uCountry);
            $("input[name=OWNERTELNO]").val(uTelephone);
            $("input[name=OWNERTOWN]").val(uPostalPlace);
            $("input[name=OWNERTOWN]").val(uPostalPlace);
            $("input[name=OWNERZIP]").val(uPostalCode);
            validateVoucherOffer(2,3,'#VouchForm2',sendData);
        }
        else if(vStepId=='voucherStepb3')
        {
            var uName=$('#user_name').val();
            var uSurname=$('#user_surname').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalCode=$('#user_postalCode').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uCountry=$('#user_country').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uMessage=$('#user_message').val();
            var uPayment=$('#user_payment').val();
            var uShipping=$('#user_shipping').val();
            var uValidFrom=$('#user_validFrom').val();
            var voucherType=$('#voucherType').val();
            uStatus=$("input[name='anredeOp']:checked").val();
            var dbPay=0;
            var dbPayVal=0;
            var vFor=$('#vouchName').val();
            var vText=$('#exampleTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            liberInd=uStatus;
            if(vaucherCustom=="other")
            {
                dbPayVal=vPrice;
            }
            else
            {
                dbPayVal=optionsValues.val();
            }
            if(uPayment!="Rechnung")
            {
                dbPay=1;
                $('#creditCardRules').show();
            }
            else{
                $('#creditCardRules').hide();
            }
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                vaucher_type:2,
                payment_id:dbPay,
                offer:0,
                valid_from:uValidFrom,
                vaucher_for:vFor,
                vaucher_text:vText,
                items:'',
                payment_type:uPayment,
                send_type:uShipping,
                message:uMessage,
                vaucher_template:voucherType,
                total_price:dbPayVal,
                user:{
                    username:uEmail,
                    name:uName+' '+uSurname,
                    first_name:uName,
                    last_name:uSurname,
                    address:uAddress,
                    telephone:uTelephone,
                    fax:'',
                    email:uEmail,
                    title:uStatus,
                    zip:uPostalCode,
                    city:uPostalPlace,
                    country:uCountry,
                    www:'',
                    company:uCompany,
                    gender:uStatus,
                }
            }
            $('#userFullnameHolder').text(uName+" "+uSurname);
            $('#userCompanyHolder').text(uCompany);
            $('#userAddressHolder').text(uAddress);
            $('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);
            $('#userCountryHolder').text(uCountry);
            $('#userTelephoneHolder').text(uTelephone);
            $('#userEmailHolder').text(uEmail);
            $('#userMessageHolder').text(uMessage);
            $('#userPaymentHolder').text(uPayment);
            $('#userShippingHolder').text(uShipping);
            $('#userStatusHolder').text(uStatus);
            $("input[name=AMOUNT]").val(dbPayVal);
            $("input[name=CN]").val(uName+" "+uSurname);
            $("input[name=CURRENCY]").val('CHF');
            $("input[name=EMAIL]").val(uEmail);
            $("input[name=LANGUAGE]").val('de_DE');
            var nowD=new Date();
            $("input[name=ORDERID]").val(uSurname+'/'+nowD);
            $("input[name=OWNERADDRESS]").val(uCountry);
            $("input[name=OWNERTELNO]").val(uTelephone);
            $("input[name=OWNERTOWN]").val(uPostalPlace);
            $("input[name=OWNERTOWN]").val(uPostalPlace);
            $("input[name=OWNERZIP]").val(uPostalCode);
            var uShipping=$('#user_shipping').val();
        if(uShipping!="Postversand")
        {
            $('#clientConfirmationEmail').text($('#userEmailHolder').text());
            $('#printHome').attr("style","display:block;");
            $('#postVersand').attr("style","display:none;");
        }
        else
        {
            $('#printHome').attr("style","display:none;");
            $('#postVersand').attr("style","display:block;");
        }
            if(liberInd=="Herr")
            {
                $('#senderName').text("R "+$('#userStatusHolder').text()+" "+$('#user_surname').val());
            }
            else
            {
                $('#senderName').text(" "+ $('#userStatusHolder').text()+" "+$('#user_surname').val());
            }
            $('.voucherSteps').removeClass('stepShowVoucher');
            $('#voucherStep4').addClass('stepShowVoucher');
            submitVoucher(sendData);
        }
      });
      $( document ).on('click',"#voucherStepRet1,#voucherStepRet2,#voucherStepRet3", function(eve) {
        var vStepId=$(eve.target).attr('id');
        $('.voucherSteps').removeClass('stepShowVoucher');
        if(vStepId=='voucherStepRet1')
        {
        }
        else if(vStepId=='voucherStepRet2')
        {
            window.history.back();
        }
        else if(vStepId=='voucherStepRet3')
        {
            window.history.back();
        }
      });
      $( document ).on('click',"#bookingStepb1,#bookingStepb2,#bookingStepb3", function(eve) {
        var vStepId=$(eve.target).attr('id');
        if(vStepId=='bookingStepb1')
        {
            $('.bookingSteps').removeClass('stepShowBooking');
            $('.bookingSteps').removeClass('stepShowBookingSpecial');
            $('#bookingStep2').addClass('stepShowBooking');
        }
        else if(vStepId=='bookingStepb2')
        {
            validateVoucherOffer(1,1,'#bookingValid1',{});
        }
        else if(vStepId=='bookingStepb3')
        {
            var uName=$('#user_name').val();
            var uSurname=$('#user_surname').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalCode=$('#user_postalCode').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uCountry=$('#user_country').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uMessage=$('#user_message').val();
            var uPayment=$('#user_payment').val();
            var uShipping=$('#user_shipping').val();
            var uValidFrom=$('#user_validFrom').val();
            var guaranteeCheck=$('#reservationgarantee_check');
            var cardType=$('#reservationgarantee_cardtype').val();
            var cardNo=$('#reservationgarantee_cardno').val();
            var cardExpMonth=$('#reservationgarantee_exp_month').val();
            var cardExpYear=$('#reservationgarantee_exp_year').val();
            var cardName=$('#reservationgarantee_name').val();
            if (guaranteeCheck.is(":checked"))
            {
            guaranteeCheck=1;
            }
            else
            {
            guaranteeCheck=0;

            }
            var voucherOfferCode=$('#vouCode').val();
            var marketingCode=$('#marketingCode').val();
            var totalBetrag=$('#totalBetrag').val();
            var uStatus=$('input[name=andreOp]:checked').val();
            var dbPay=0;
            var dbPayVal=0;
            var vFor=$('#vouchName').val();
            var vText=$('#exampleTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            if(vaucherCustom=="other")
            {
                dbPayVal=vPrice;
            }
            else
            {
                dbPayVal=optionsValues.val();
            }
            if(uPayment!="Rechnung")
            {
                dbPay=1;
                $('#creditCardRules').show();
            }
            else{
                $('#creditCardRules').hide();
            }
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                offer:activeOffer,
                prices:pricesSelected,
                additionals:aditionalSelected,
                booking_date:bookingDate,
                reservationgarantee_nocard:guaranteeCheck,
                reservationgarantee_cardno:cardNo,
                reservationgarantee_cardtype:cardType,
                reservationgarantee_exp_month:cardExpMonth,
                reservationgarantee_exp_year:cardExpYear,
                reservationgarantee_name:cardName,
                vaucher_code:voucherOfferCode,
                marketing_code:marketingCode,
                message:uMessage,
                vaucher_amount:totalBetrag,
                saveUserContact:$("#step2row").html(),
                user:{
                    username:uEmail,
                    name:uName+' '+uSurname,
                    first_name:uName,
                    last_name:uSurname,
                    address:uAddress,
                    telephone:uTelephone,
                    fax:'',
                    email:uEmail,
                    title:uStatus,
                    zip:uPostalCode,
                    city:uPostalPlace,
                    country:uCountry,
                    www:'',
                    company:uCompany,
                    gender:uStatus,
                }
            }
            $('#userName').text(uName);
            $('#userSurname').text(uSurname);
            $('#uName').text(uSurname);
            $('#userCompanyHolder').text(uCompany);
            $('#userAddressHolder').text(uAddress);
            $('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);
            $('#userCountryHolder').text(uCountry);
            $('#userTelephoneHolder').text(uTelephone);
            $('#userEmailHolder').text(uEmail);
            $('#userMessageHolder').text(uMessage);
            $('#userPaymentHolder').text(uPayment);
            $('#userShippingHolder').text(uShipping);
            $('#userStatusHolder').text(uStatus);
            if(uStatus=="Herr")
            {
                $('#uStatus').text("R "+uStatus);
            }
            else
            {
                $('#uStatus').text(" "+uStatus);
            }
            $('.stepsIndic').removeClass('step1');
            $('#step4I').addClass('step1');
            validateVoucherOffer(1,2,'#bookingContactForm',sendData);
        }
      });
      $( document ).on('click',"#bookingStepRet1,#bookingStepRet2,#bookingStepRet3", function(eve) {
        var vStepId=$(eve.target).attr('id');
        if(vStepId=='bookingStepRet1')
        {
        }
        else if(vStepId=='bookingStepRet2')
        {
            window.history.back();
        }
        else if(vStepId=='bookingStepRet3')
        {
            window.history.back();
        }
      });
      $( document ).on('click',"#voucherOffersRet1,#voucherOffersRet2,#voucherOffersRet3", function(eve) {
        var vStepId=$(eve.target).attr('id');
        if(vStepId=='voucherOffersRet1')
        {
        }
        else if(vStepId=='voucherOffersRet2')
        {
            window.history.back();
        }
        else if(vStepId=='voucherOffersRet3')
        {
            window.history.back();
        }
      });
      $( document ).on('click',"#voucherOffers2,#voucherOffers3,#voucherOffers4", function(eve) {
        var vStepId=$(eve.target).attr('id');
        if(vStepId=='voucherOffers1')
        {
            $('.bookingSteps').removeClass('stepShowBookingSpecial');
            $('#bookingVouchers2').addClass('stepShowBooking');
        }
        else if(vStepId=='voucherOffers2')
        {
            var vFor=$('#vouchName').val();
            var vText=$('#offerVaucherTextarea').val();
            $("#voucherFor").text(vFor);
            $("#voucherFor1").text(vFor);
            $("#voucherText").text(vText);
            $("#voucherText1").text(vText);
            validateVoucherOffer(3,1,'#offerVouchForm1',{});
        }
        else if(vStepId=='voucherOffers3')
        {
            var uName=$('#user_name').val();
            var uSurname=$('#user_surname').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalCode=$('#user_postalCode').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uCountry=$('#user_country').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uMessage=$('#user_message').val();
            var uPayment=$('#user_payment').val();
            var uShipping=$('#user_shipping').val();
            var uValidFrom=$('#user_validFrom').val();
            var cardType=$('#reservationgarantee_cardtype').val();
            var cardNo=$('#reservationgarantee_cardno').val();
            var cardExpMonth=$('#reservationgarantee_exp_month').val();
            var cardExpYear=$('#reservationgarantee_exp_year').val();
            var cardName=$('#reservationgarantee_name').val();
            var voucherOfferCode=$('#vouCode').val();
            var marketingCode=$('#marketingCode').val();
            var totalBetrag=$('#totalBetrag').val();

            var uStatus=$('input[name=andreOp]:checked').val();
            var dbPay=0;
            var dbPayVal=0;
            var vFor=$('#vouchName').val();
            var vText=$('#offerVaucherTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            if(vaucherCustom=="other")
            {
                dbPayVal=vPrice;
            }
            else
            {
                dbPayVal=optionsValues.val();
            }
            if(uPayment!="Rechnung")
            {
                dbPay=1;
                $('#creditCardRules').show();
            }
            else{
                $('#creditCardRules').hide();
            }
            liberInd=uStatus;
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                offer:activeOffer,
                prices:pricesSelected,
                additionals:aditionalSelected,
                booking_date:bookingDate,
                payment_type:uPayment,
                send_type:uShipping,
                reservationgarantee_cardno:cardNo,
                reservationgarantee_cardtype:cardType,
                reservationgarantee_exp_month:cardExpMonth,
                reservationgarantee_exp_year:cardExpYear,
                reservationgarantee_name:cardName,
                vaucher_code:voucherOfferCode,
                marketing_code:marketingCode,
                vaucher_amount:totalBetrag,
                valid_from:uValidFrom,
                vaucher_for:vFor,
                message:uMessage,
                vaucher_text:vText,
                user:{
                    username:uEmail,
                    name:uName+' '+uSurname,
                    first_name:uName,
                    last_name:uSurname,
                    address:uAddress,
                    telephone:uTelephone,
                    fax:'',
                    email:uEmail,
                    title:uStatus,
                    zip:uPostalCode,
                    city:uPostalPlace,
                    country:uCountry,
                    www:'',
                    company:uCompany,
                    gender:uStatus,
                }
            }
            $('#userName').text(uName);
            $('#userSurname').text(uSurname);
            $('#uName').text(uSurname);
            $('#userFullnameHolder').text(uName+" "+uSurname);
            $('#userCompanyHolder').text(uCompany);
            $('#userAddressHolder').text(uAddress);
            $('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);
            $('#userCountryHolder').text(uCountry);
            $('#userTelephoneHolder').text(uTelephone);
            $('#userEmailHolder').text(uEmail);
            $('#userMessageHolder').text(uMessage);
            $('#userPaymentHolder').text(uPayment);
            $('#userShippingHolder').text(uShipping);
            $('#userStatusHolder').text(uStatus);
            if(uStatus=="Herr")
            {
                $('#uStatus').text("R "+uStatus);
            }
            else
            {
                $('#uStatus').text(" "+uStatus);
            }
            validateVoucherOffer(3,2,'#offerVouchForm2',{});
        }
        else if (vStepId=="voucherOffers4")
        {
            var uName=$('#user_name').val();
            var uSurname=$('#user_surname').val();
            var uCompany=$('#user_company').val();
            var uAddress=$('#user_address').val();
            var uPostalCode=$('#user_postalCode').val();
            var uPostalPlace=$('#user_postalPlace').val();
            var uCountry=$('#user_country').val();
            var uTelephone=$('#user_telephone').val();
            var uEmail=$('#user_email').val();
            var uMessage=$('#user_message').val();
            var uPayment=$('#user_payment').val();
            var uShipping=$('#user_shipping').val();
            var uValidFrom=$('#user_validFrom').val();

            var cardType=$('#reservationgarantee_cardtype').val();
            var cardNo=$('#reservationgarantee_cardno').val();
            var cardExpMonth=$('#reservationgarantee_exp_month').val();
            var cardExpYear=$('#reservationgarantee_exp_year').val();
            var cardName=$('#reservationgarantee_name').val();
            var voucherOfferCode=$('#vouCode').val();
            var marketingCode=$('#marketingCode').val();
            var totalBetrag=$('#totalBetrag').val();

            var uStatus=$('input[name=andreOp]:checked').val();
            var dbPay=0;
            var dbPayVal=0;
            var vFor=$('#vouchName').val();
            var vText=$('#offerVaucherTextarea').val();
            var vPrice=$('#otherValue').val();
            var optionsValues=$('input[type=radio][name=optionsRadios]:checked');
            var vaucherTempl = $('#vauchTemp').val();
            if(vaucherCustom=="other")
            {
                dbPayVal=vPrice;
            }
            else
            {
                dbPayVal=optionsValues.val();
            }
            if(uPayment!="Rechnung")
            {
                dbPay=1;
                $('#creditCardRules').show();
            }
            else{
                $('#creditCardRules').hide();
            }
            liberInd=uStatus;
            var token = $("input[name=_token]").val();
            sendData = {
                _token:token,
                offer:activeOffer,
                prices:pricesSelected,
                additionals:aditionalSelected,
                booking_date:bookingDate,
                payment_type:uPayment,
                send_type:uShipping,
                reservationgarantee_cardno:cardNo,
                reservationgarantee_cardtype:cardType,
                reservationgarantee_exp_month:cardExpMonth,
                reservationgarantee_exp_year:cardExpYear,
                reservationgarantee_name:cardName,
                vaucher_code:voucherOfferCode,
                marketing_code:marketingCode,
                vaucher_amount:totalBetrag,
                valid_from:uValidFrom,
                vaucher_for:vFor,
                message:uMessage,
                vaucher_template:vaucherTempl,
                vaucher_text:vText,
                user:{
                    username:uEmail,
                    name:uName+' '+uSurname,
                    first_name:uName,
                    last_name:uSurname,
                    address:uAddress,
                    telephone:uTelephone,
                    fax:'',
                    email:uEmail,
                    title:uStatus,
                    zip:uPostalCode,
                    city:uPostalPlace,
                    country:uCountry,
                    www:'',
                    company:uCompany,
                    gender:uStatus,
                }
            }
            var uShipping=$('#user_shipping').val();
            if(uShipping!="Postversand")
            {
                $('#clientConfirmationEmail').text($('#userEmailHolder').text());
                $('#printHome').attr("style","display:block;");
                $('#postVersand').attr("style","display:none;");
            }
            else
            {
                $('#printHome').attr("style","display:none;");
                $('#postVersand').attr("style","display:block;");
            }
            if(liberInd=="Herr")
            {
                $('#senderName').text("R "+$('#userStatusHolder').text()+" "+$('#user_surname').val());
            }
            else
            {
                $('#senderName').text(" "+ $('#userStatusHolder').text()+" "+$('#user_surname').val());
            }
            $('#clientConfirmationEmail').text($('#userEmailHolder').text());
            $('.bookingSteps').removeClass('stepShowBookingSpecial');
            $('.bookingSteps').removeClass('stepShowBooking');
            $('#bookingVouchers4').addClass('stepShowBooking');
            var confDataOffV=$('#vaucherConfirmationInfo').html();
            sendData.saveConfOffVau=confDataOffV;
            var currFullUrl = window.location.href;
            var pre_url=currFullUrl.substr(currFullUrl.indexOf('?')+1);
            if(currFullUrl==window.location.href)
            {
                pre_url='';
            }
            var push_url='';
            if(pre_url.indexOf('step=3') !== -1)
            {
                push_url=pre_url.replace("step=3", "step=4");
            }
            else
            {
                if(pre_url.indexOf('step=4') !== -1)
                {
                    push_url=pre_url;
                }
                else
                {
                    push_url=pre_url+"?step=4";
                }
            }
            console.log('bookingVouchers4 ',push_url);
            window.history.pushState(null, null, push_url);
            //window.history.replaceState(null, null,push_url);
            submitOfferBooking(sendData);
        }
      });
    $(window).resize(function(){
        if($(window).width()>768){
            $('#gMap1,#inLinks1,#toggle1,#toggle2,#toggle3', document).removeAttr("id");           
        }
       });
        $(window).on("popstate", function(e) 
        {
            history.scrollRestoration = "manual";
            end_l_of_c_s=false;
            if (e.state !== null) 
            {
                var g_url=location.href;
                var o_a_wh="#pageDynamic";
                var wSearch=window.location.search;
                wSearch=wSearch.replace("?navigate=1",'');
                if(wSearch !='')
                {
                    if ( wSearch.charAt( 0 ) == '?' ) {
                        wSearch=wSearch.replace("?",'?navigate=1&');
                    }
                }
                else
                {
                    wSearch='?navigate=1';
                }
                var pathNew=window.location.pathname.replace('/','');
                g_url=pathNew+wSearch;
                o_nav='';
                if(!$(o_a_wh).length)
                {
                    //console.log('console.log',window.location.host);
                    window.location.href=window.location.host+"/"+g_url;
                }
                else
                {
                    if(g_url.indexOf("?") > -1)
                    {
                    }
                    else
                    {
                    }
                    if(scrollHistory>0)
                    {
                        // $("html, body").scrollTop(scrollHistory);
                        // console.log('pushing scroll');
                        // scrollHistory=0;
                    }
                    //console.log("pushing back "+window.location.host+g_url);
                    var get_res=navigateMaster(g_url,{urlCorrect:1,scrollBack:1,backPressed:1});
                }
            }
      });
      //console.log("window.location.host",window.location.host);
    $(document).on("click","a", function(e){
        var clicked = $(this);
        // var checkAncor=clicked.attr('data-ancorPush');
        // if (checkAncor)
        // {
        //     console.log("ancorPush");
        // }
        // else
        // {
        //     e.preventDefault();
        // }
        e.preventDefault();
        
        // var externLink=false;
        // externLink=clicked.hasClass('external-link-new-window');
        // if (externLink===true)
        // {
        //     window.location=clicked.attr('href');
        //     return true;
        // }
        // else
        // {
        //     e.preventDefault();
        // }
		var o_a_wh="#pageDynamic";
        var options = {};
        var goToPre=clicked.attr('href');
        var prepareUrl =goToPre.replace("https://www.meinweekend.ch/", "");
        var remDoubleSl = prepareUrl.replace("//", "/");
        var remFirstSl=remDoubleSl.replace(/^\/|\/$/g, '');
        var goTo = remFirstSl.replace(".html", "");
        //var goTo = goToRHtml.replace("erlebnis/", "ausflug/");
        var goType=clicked.attr('data-urlType');
        $(".navbar-nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
		if(!$(o_a_wh).length)
		{
		}
		else
		{
            if(goType)
            {
                options.gtype=goType;
            }
            navigateMaster(goTo,options);
            //console.log('push state',window.location);
            //console.log('replaceState',"/"+goTo);
			//window.history.replaceState(null, null,"/"+goTo);
		}
    });
    //console.log('window.location',window.location);
    $(document).on("click tap","#masterSearch", function(e){
        searchFilter();
    });
    $(document).on("change","#offerType", function(e){
        var select = $(this);
        var newVal = select.val();
        offerType=newVal;
    });
    $(document).on("change","#offerRegion", function(e){
        var select = $(this);
        var newVal = select.val();
        offerRegion=newVal;
    });
    $(document).on("change","#offerDuration", function(e){
        var select = $(this);
        var newVal = select.val();
        offerDuration=newVal;
    });
    $(document).on("keyup","#searchUser", function(e){
        var select = $(this);
        var newVal = select.val();
        keyw=newVal;
    });
});
function validateVoucherOffer(stIn,stNow,fId,fData){
    var cRules={},cMessages={};
    if(stIn==1)
    {
        if(stNow==1)
        {
            cRules={
                selectedPricesInp: "required",
            };
            cMessages={
                selectedPricesInp:{
                    required:"Bitte um Ihre Angaben: Ihre Reservationen."
                }
            };
        }
        else if(stNow==2)
        {
            var creditCardRParsed=parseInt(creditCardR);
            if(creditCardR==1)
            {
                if(validator)
                {
                    validator.resetForm();
                }
                cRules={
                    user_name: "required",
                    user_surname: "required",
                    user_address: "required",
                    user_postalCode: "required",
                    user_postalPlace: "required",
                    user_country: "required",
                    user_telephone: "required",
                    user_email: "required",
                    user_payment: "required",
                    user_shipping: "required",
                    termsCheck: "required"
                };
                var noCredit=$('#reservationgarantee_check');
                cMessages={
                    user_name:{
                        required:"Bitte um Ihre Angaben: Vorname"
                    },
                    user_surname:{
                        required:"Bitte um Ihre Angaben: Nachname"
                    },
                    user_address:{
                        required:"Bitte um Ihre Angaben: Adresse"
                    },
                    user_postalCode:{
                        required:"Bitte um Ihre Angaben: PLZ"
                    },
                    user_postalPlace:{
                        required:"Bitte um Ihre Angaben: Ort"
                    },
                    user_country:{
                        required:"Bitte um Ihre Angaben: Land"
                    },
                    user_telephone:{
                        required:"Bitte um Ihre Angaben: Telefon"
                    },
                    user_email:{
                        required:"Bitte um Ihre Angaben: E-Mail"
                    },
                    user_payment:{
                        required:"Bitte um Ihre Angaben: Zahlungsart"
                    },
                    user_shipping:{
                        required:"Bitte um Ihre Angaben: Versand"
                    },
                    termsCheck:{
                        required:"Bitte AGB‘s akzeptieren"
                    }
                };
                if(noCredit.attr('val')=='1')
                {
                }
                else
                {
                }
            }
            else
            {
                cRules={
                    user_name: "required",
                    user_surname: "required",
                    user_address: "required",
                    user_postalCode: "required",
                    user_postalPlace: "required",
                    user_country: "required",
                    user_telephone: "required",
                    user_email: "required",
                    user_payment: "required",
                    user_shipping: "required",
                    termsCheck: "required",
                };
                cMessages={
                    user_name:{
                        required:"Bitte um Ihre Angaben: Vorname"
                    },
                    user_surname:{
                        required:"Bitte um Ihre Angaben: Nachname"
                    },
                    user_address:{
                        required:"Bitte um Ihre Angaben: Adresse"
                    },
                    user_postalCode:{
                        required:"Bitte um Ihre Angaben: PLZ"
                    },
                    user_postalPlace:{
                        required:"Bitte um Ihre Angaben: Ort"
                    },
                    user_country:{
                        required:"Bitte um Ihre Angaben: Land"
                    },
                    user_telephone:{
                        required:"Bitte um Ihre Angaben: Telefon"
                    },
                    user_email:{
                        required:"Bitte um Ihre Angaben: E-Mail"
                    },
                    user_payment:{
                        required:"Bitte um Ihre Angaben: Zahlungsart"
                    },
                    user_shipping:{
                        required:"Bitte um Ihre Angaben: Versand"
                    },
                    termsCheck:{
                        required:"Bitte AGB‘s akzeptieren"
                    }
                };

            }
        }
        $(fId).validate({
            errorClass: "bad-message",
            rules: cRules,
            messages:cMessages,
            submitHandler: function(form) {
                if(stNow==1)
                {
                    $('.bookingSteps').removeClass('stepShowBooking');
                    $('.stepsIndic').removeClass('step1');
                    $('#step3I').addClass('step1');
                    var token = $("input[name=_token]").val();
                    selectPrices(token);
                    $('#bookingStep3').addClass('stepShowBooking');
                    var currFullUrl = window.location.href; 
                    var pre_url=currFullUrl.replace(br+"/reservation", "");
                    var push_url=pre_url.replace("step=2", "step=3");
                    //console.log("vaucher submitted push url",push_url);
                    window.history.pushState(null, null, push_url);
                    //window.history.replaceState(null, null,push_url);
                }
                else if(stNow==2)
                {
                    submitBooking(fData);
                }
              return false;
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            }
          });
          if(stNow==1 || stNow==2)
          {
            if(stNow==2)
            {
            var noCredit=$('#reservationgarantee_check');
            if(noCredit.attr('val')!='1')
            {
                if($("#reservationgarantee_cardno").length>0)
                {
                $('body #reservationgarantee_cardno').rules('add', { 
                    required: true,
                    messages: {
                        required: "Bitte um Ihre Angaben: Kreditkartennummer"
                      }
                 });  
                 $(fId).validate().element("#reservationgarantee_cardno");
                }
                if($("#reservationgarantee_cardno").length>0)
                {
                $('body  #reservationgarantee_name').rules('add',{ 
                    required: true,
                    messages: {
                        required: "Name und Vorname des Karteninhabers"
                      } 
                });  
                $(fId).validate().element("#reservationgarantee_name");
                }
            }
            else
            {
                if($("#reservationgarantee_cardno").length>0)
                {
                    $("#reservationgarantee_cardno").rules('remove');  
                    $(fId).validate().element("#reservationgarantee_cardno");
                }
                if($("#reservationgarantee_name").length>0)
                {
                    $("#reservationgarantee_name").rules('remove');  
                    $(fId).validate().element("#reservationgarantee_name");
                }
            }
            }
            $(fId).submit();
          }
    }
    else if(stIn==2)
    {
        if(stNow==1)
        {
            cRules={
                vouchName: "required",
                vouchText: "required",
                vouchDate: "required",
            };
            cMessages={
                vouchName:{
                    required:"Bitte um Ihre Angaben: Ausgestellt auf"
                },
                vouchText:{
                    required:"Bitte um Ihre Angaben: Text auf Gutschein"
                },
                vouchDate:{
                    required:"Bitte um Ihre Angaben: Date auf Gutschein"
                }
            };
        }
        else if(stNow==2)
        {
            cRules={
                user_name: "required",
                user_surname: "required",
                user_address: "required",
                user_postalCode: "required",
                user_postalPlace: "required",
                user_country: "required",
                user_telephone: "required",
                user_email: "required",
                user_payment: "required",
                user_shipping: "required",
                termsCheck: "required",
            };
            cMessages={
                user_name:{
                    required:"Bitte um Ihre Angaben: Vorname"
                },
                user_surname:{
                    required:"Bitte um Ihre Angaben: Nachname"
                },
                user_address:{
                    required:"Bitte um Ihre Angaben: Adresse"
                },
                user_postalCode:{
                    required:"Bitte um Ihre Angaben: PLZ"
                },
                user_postalPlace:{
                    required:"Bitte um Ihre Angaben: Ort"
                },
                user_country:{
                    required:"Bitte um Ihre Angaben: Land"
                },
                user_telephone:{
                    required:"Bitte um Ihre Angaben: Telefon"
                },
                user_email:{
                    required:"Bitte um Ihre Angaben: E-Mail"
                },
                user_payment:{
                    required:"Bitte um Ihre Angaben: Zahlungsart"
                },
                user_shipping:{
                    required:"Bitte um Ihre Angaben: Versand"
                },
                termsCheck:{
                    required:"Bitte AGB‘s akzeptieren"
                }
            };
        }
        else if(stNow==3)
        {
            cRules={
                user_name: "required",
                user_surname: "required",
                user_address: "required",
                user_postalCode: "required",
                user_postalPlace: "required",
                user_country: "required",
                user_telephone: "required",
                user_email: "required",
                user_payment: "required",
                user_shipping: "required",
                termsCheck: "required",
            };
            cMessages={
                user_name:{
                    required:"Bitte um Ihre Angaben: Vorname"
                },
                user_surname:{
                    required:"Bitte um Ihre Angaben: Nachname"
                },
                user_address:{
                    required:"Bitte um Ihre Angaben: Adresse"
                },
                user_postalCode:{
                    required:"Bitte um Ihre Angaben: PLZ"
                },
                user_postalPlace:{
                    required:"Bitte um Ihre Angaben: Ort"
                },
                user_country:{
                    required:"Bitte um Ihre Angaben: Land"
                },
                user_telephone:{
                    required:"Bitte um Ihre Angaben: Telefon"
                },
                user_email:{
                    required:"Bitte um Ihre Angaben: E-Mail"
                },
                user_payment:{
                    required:"Bitte um Ihre Angaben: Zahlungsart"
                },
                user_shipping:{
                    required:"Bitte um Ihre Angaben: Versand"
                },
                termsCheck:{
                    required:"Bitte AGB‘s akzeptieren"
                }
            };
        }
        $(fId).validate({
            errorClass: "bad-message",
            rules: cRules,
            messages:cMessages,
            submitHandler: function(form) {
                if(stNow==1)
                {
                    var mvfs1=$('#mainVaucherFormS1').html();
                    var pData={
                        step:2,
                        imgForm:mvfs1
                    };
                    submitVaucherStFirst(pData);
                    var token = $("input[name=_token]").val();
                    $('.voucherSteps').removeClass('stepShowVoucher');
                    $('#voucherStep2').addClass('stepShowVoucher');
                    var currFullUrl = window.location.href; 
                    var pre_url=currFullUrl.replace(br+"/geschenkgutschein", "");
                    var push_url='';
                    if(pre_url.indexOf('step=1') !== -1)
                    {
                        push_url=pre_url.replace("step=1", "step=2");
                    }
                    else
                    {
                        if(pre_url.indexOf('step=2') !== -1)
                        {
                            push_url=pre_url;
                        }
                        else
                        {
                            //console.log('pushhing questionmarksss');
                            push_url=pre_url+"?step=2";
                        }
                    }
                    if(pre_url.indexOf('step=1') == -1 || pre_url.indexOf('step=2') !== -1 || pre_url.indexOf('step=3') !== -1)
                    {
                        window.history.replaceState(null, null,'/geschenkgutschein?step=1');
                    }
                    //console.log("geschenkgutschein",push_url);
                    window.history.pushState(null, null, push_url);
                    //window.history.replaceState(null, null,push_url);
                }
                else if(stNow==2)
                {
                    var mvfs1=$('#voucherStep2').html();
                    $('.voucherSteps').removeClass('stepShowVoucher');
                    $('#voucherStep3').addClass('stepShowVoucher');
                    var currFullUrl = window.location.href; 
                    var pre_url=currFullUrl.replace(br+"/geschenkgutschein", "");
                    var push_url='';
                    if(pre_url.indexOf('step=2') !== -1)
                    {
                        push_url=pre_url.replace("step=2", "step=3");
                    }
                    else
                    {
                        if(pre_url.indexOf('step=3') !== -1)
                        {
                            push_url=pre_url;
                        }
                        else
                        {
                            push_url=pre_url+"?step=3";
                        }
                       
                    }
                    //console.log('voucherStep2',push_url);
                    window.history.pushState(null, null, push_url);
                    //window.history.replaceState(null, null,push_url);
                    // var pData={
                    //     step:2,
                    //     imgForm:mvfs1,
                    //     fData
                    // };
                    fData['step']=2;
                    fData['imgForm']=mvfs1;
                    submitVaucherStSecond(fData);
                }
                else if(stNow==3)
                {
                    var mvfs1=$('#voucherStep2').html();
                    $('.voucherSteps').removeClass('stepShowVoucher');
                    $('#voucherStep3').addClass('stepShowVoucher');
                    var currFullUrl = window.location.href; 
                    var pre_url=currFullUrl.replace(br+"/geschenkgutschein", "");
                    var push_url='';
                    if(pre_url.indexOf('step=2') !== -1)
                    {
                        push_url=pre_url.replace("step=2", "step=3");
                    }
                    else
                    {
                        if(pre_url.indexOf('step=3') !== -1)
                        {
                            push_url=pre_url;
                        }
                        else
                        {
                            push_url=pre_url+"?step=3";
                        }
                       
                    }
                    //console.log('voucherStep2',push_url);
                    window.history.pushState(null, null, push_url);
                    //window.history.replaceState(null, null,push_url);
                    // var pData={
                    //     step:2,
                    //     imgForm:mvfs1,
                    //     fData
                    // };
                    fData['step']=2;
                    fData['imgForm']=mvfs1;
                    submitVaucherStSecondPay(fData);
                }
              return false;
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            }
          });
    }
    else if(stIn==3)
    {
        if(stNow==1)
        {
            cRules={
                vouchName: "required",
                selectedPricesInp: "required",
                vouchText: "required",
                vouchDate: "required",
            };
            cMessages={
                vouchName:{
                    required:"Bitte um Ihre Angaben: Ausgestellt auf"
                },
                vouchText:{
                    required:"Bitte um Ihre Angaben: Text auf Gutschein"
                },
                vouchDate:{
                    required:"Bitte um Ihre Angaben: Date auf Gutschein"
                },
                selectedPricesInp:{
                    required:"Bitte um Ihre Angaben: Ihre Reservationen."
                }
            };
        }
        else if(stNow==2)
        {
            cRules={
                user_name: "required",
                user_surname: "required",
                user_address: "required",
                user_postalCode: "required",
                user_postalPlace: "required",
                user_country: "required",
                user_telephone: "required",
                user_email: "required",
                user_payment: "required",
                user_shipping: "required",
                termsCheck: "required",
            };
            cMessages={
                user_name:{
                    required:"Bitte um Ihre Angaben: Vorname"
                },
                user_surname:{
                    required:"Bitte um Ihre Angaben: Nachname"
                },
                user_address:{
                    required:"Bitte um Ihre Angaben: Adresse"
                },
                user_postalCode:{
                    required:"Bitte um Ihre Angaben: PLZ"
                },
                user_postalPlace:{
                    required:"Bitte um Ihre Angaben: Ort"
                },
                user_country:{
                    required:"Bitte um Ihre Angaben: Land"
                },
                user_telephone:{
                    required:"Bitte um Ihre Angaben: Telefon"
                },
                user_email:{
                    required:"Bitte um Ihre Angaben: E-Mail"
                },
                user_payment:{
                    required:"Bitte um Ihre Angaben: Zahlungsart"
                },
                user_shipping:{
                    required:"Bitte um Ihre Angaben: Versand"
                },
                termsCheck:{
                    required:"Bitte AGB‘s akzeptieren"
                }
            };
        }
        $(fId).validate({
            errorClass: "bad-message",
            rules: cRules,
            messages:cMessages,
            submitHandler: function(form) {
                if(stNow==1)
                {
                    var token = $("input[name=_token]").val();
                    selectPrices(token);
                    $('.bookingSteps').removeClass('stepShowBooking');
                    $('#bookingStep3').addClass('stepShowBooking');
        
                    $('.bookingSteps').removeClass('stepShowBookingSpecial');
                    $('#bookingVouchers2').addClass('stepShowBooking');
                    var currFullUrl = window.location.href; 
                    var pre_url=currFullUrl.substr(currFullUrl.indexOf('?')+1);
                    if(currFullUrl==window.location.href)
                    {
                        pre_url='';
                    }
                    var push_url='';
                    if(pre_url.indexOf('step=1') !== -1)
                    {
                        push_url=pre_url.replace("step=1", "step=2");
                    }
                    else
                    {
                        if(pre_url.indexOf('step=2') !== -1)
                        {
                            push_url=pre_url;
                        }
                        else
                        {
                            //console.log('pushhing questionmark');
                            push_url=pre_url+"?step=2";
                        }
                    }
                    if(pre_url.indexOf('step=1') == -1 || pre_url.indexOf('step=2') !== -1 || pre_url.indexOf('step=3') !== -1)
                    {
                        window.history.replaceState(null, null,window.location.pathname+'?step=1');
                    }
                    //console.log("push state from replace offer vaucher now",push_url);
                    //var offVauLin = br+window.location.pathname+'?step=1';
                    //var createGoodLink=offVauLin.replace("//", "/");
                    window.history.pushState(null, null, push_url);
                    //window.history.replaceState(null, null,push_url);
                }
                else if(stNow==2)
                {
                    $('.bookingSteps').removeClass('stepShowBooking');
                    $('.bookingSteps').removeClass('stepShowBookingSpecial');
                    $('#bookingVouchers3').addClass('stepShowBooking');
                    var mvfs1=$('#offerVaucherContact').html();
                    var confDataOffV=$('#vaucherConfirmationInfo').html();
                    var pData={
                        step:3,
                        imgForm:mvfs1,
                        saveConfOffVau:confDataOffV
                    };
                    submitOfferVaucherTable(pData);
                    var currFullUrl = window.location.href;
                    var pre_url=currFullUrl.substr(currFullUrl.indexOf('?')+1);
                    if(currFullUrl==window.location.href)
                    {
                        pre_url='';
                    }
                    var push_url='';
                    if(pre_url.indexOf('step=2') !== -1)
                    {
                        push_url=pre_url.replace("step=2", "step=3");
                    }
                    else
                    {
                        if(pre_url.indexOf('step=3') !== -1)
                        {
                            push_url=pre_url;
                        }
                        else
                        {
                            push_url=pre_url+"?step=3";
                        }
                    }
                    //console.log('bookingSteps step=3',push_url);
                    window.history.pushState(null, null, push_url);
                    //window.history.replaceState(null, null,push_url);
                }
              return false;
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            }
          });
          
            if(stNow==2)
            {
            var noCredit=$('#reservationgarantee_check');
            if(noCredit.attr('val')!='1')
            {
                if($("#reservationgarantee_cardno").length>0)
                {
                $('body #reservationgarantee_cardno').rules('add', { 
                    required: true,
                    messages: {
                        required: "Bitte um Ihre Angaben: Kreditkartennummer"
                      }
                 });  
                 $(fId).validate().element("#reservationgarantee_cardno");
                }
                if($("#reservationgarantee_cardno").length>0)
                {
                $('body  #reservationgarantee_name').rules('add',{ 
                    required: true,
                    messages: {
                        required: "Name und Vorname des Karteninhabers"
                      } 
                });  
                $(fId).validate().element("#reservationgarantee_name");
                }
            }
            else
            {
                if($("#reservationgarantee_cardno").length>0)
                {
                    $("#reservationgarantee_cardno").rules('remove');  
                    $(fId).validate().element("#reservationgarantee_cardno");
                }
                if($("#reservationgarantee_name").length>0)
                {
                    $("#reservationgarantee_name").rules('remove');  
                    $(fId).validate().element("#reservationgarantee_name");
                }
            }
        }
    }
}
function submitGroupOffer(submitData){
    $.ajax({
        method: "POST",
        url: br+"submitGroupApplication",
        data: submitData
      })
        .done(function( msg ) {
            
            $("#groupOfferFirstStep").hide();
            $("#groupOfferSecondStep").show();
        });
}
function submitVaucherStFirst(submitData){    
var crf=$('meta[name="csrf-token"]').attr('content');
if(!crf)
{
    crf = $("input[name=_token]").val();
}
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': crf
          },
        url: br+"submitVaucherStepFirst",
        data: submitData
      })
        .done(function( msg ) {
            var mvfs1=$('#voucherStep2').html();
            var pData={
                step:2,
                imgForm:mvfs1
            };
            submitVaucherStSecond(pData);
        });
}
function submitVaucherStSecond(submitData){
    var crf=$('meta[name="csrf-token"]').attr('content');
    if(!crf)
    {
        crf = $("input[name=_token]").val();
    }
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': crf
          },
        url: br+"submitVaucherStepSecond",
        data: submitData
      })
        .done(function( msg ) {
            var mvfs1=$('#voucherStep3').html();
            var pData={
                step:3,
                imgForm:mvfs1
            };
            submitVaucherStThird(pData);
        });
}
function submitVaucherStSecondPay(submitData){
    var crf=$('meta[name="csrf-token"]').attr('content');
    if(!crf)
    {
        crf = $("input[name=_token]").val();
    }
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': crf
          },
        url: br+"submitVaucherStepSecondTest",
        data: submitData
      })
        .done(function( msg ) {
            //console.log('msg',msg);
            $('#voucherStep5').html(msg);
            $('#creditSub').trigger('click');
            // var mvfs1=$('#voucherStep3').html();
            // var pData={
            //     step:3,
            //     imgForm:mvfs1
            // };
            // submitVaucherStThird(pData);
            //submitCreditCardData(vals);
        });
}
function submitVaucherStThird(submitData){
    var crf=$('meta[name="csrf-token"]').attr('content');
    if(!crf)
    {
        crf = $("input[name=_token]").val();
    }
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': crf
          },
        url: br+"submitVaucherStepThird",
        data: submitData
      })
        .done(function( msg ) {
        });
}
function submitOfferVaucherTable(submitData){
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: br+"submitOfferVaucherTable",
        data: submitData
      })
        .done(function( msg ) {
        });
}
function submitContact(submitData){
    $.ajax({
        method: "POST",
        url: br+"submitContact",
        data: submitData
      })
        .done(function( msg ) {
            $('#contactTitleHolder').hide();
            $('#contactFormHolder').hide();
            $('#contactItemsHolder').hide();
            $('#contactSendConfirmation').show();
        });
}
function submitVoucher(submitData){
    $.ajax({
        method: "POST",
        url: br+"submitVaucher",
        data: submitData
      })
        .done(function( msg ) {
        });
}
function submitBooking(submitData){
    $.ajax({
        method: "POST",
        url: br+"submitBooking",
        data: submitData
      })
        .done(function( msg ) {
            var currFullUrl = window.location.href; 
            var pre_url=currFullUrl.replace(br+"/reservation", "");
            var push_url=pre_url.replace("step=3", "step=4");
            //console.log('submitBooking',push_url);
            window.history.pushState(null, null, push_url);
            //window.history.replaceState(null, null,push_url);
            $('.bookingSteps').removeClass('stepShowBooking');
            $('#bookingStep4').addClass('stepShowBooking');
        });
}
function submitOfferBooking(submitData){
    $.ajax({
        method: "POST",
        url: br+"submitOfferVaucher",
        data: submitData
      })
        .done(function( msg ) {
        });
}
function navigateMaster(cUrl,opt)
{
    var prepareUrl = cUrl;
    var fullUrl='';
    if(opt.urlCorrect)
    {
        fullUrl=br+prepareUrl;
    }
    else
    {
        fullUrl=br+prepareUrl+"?navigate=1";
    }
    if(opt)
    {
        if(opt.gtype)
        {
            fullUrl=br+prepareUrl+"/"+opt.gtype+"?navigate=1";
        }
    }
    if(opt.manualPushState)
    {
        //console.log('manualPushState',"/"+opt.manualPushState);
        window.history.pushState(null, null, br+"/"+opt.manualPushState);
        //window.history.replaceState(null, null,"/"+opt.manualPushState);
    }
    var prepScrollHistory=$("html, body").scrollTop();
    scrollHistory.push(prepScrollHistory);
    $.ajax({
        url: fullUrl,
        type: 'GET',
        headers: {
            'allowNavigate': 1
          },
        context: document.body,
        success: function (r,status,xhr) {
            if(fullUrl=="https://www.meinweekend.ch/kontakt")
            {
                $.getScript( "https://www.google.com/recaptcha/api.js", function( data, textStatus, jqxhr ) {
                  });
            }
        },
        error: function (jqXHR, exception) {
        }
      }).done(function(r,status,xhr) {
          if(!opt.backPressed)
          {
              var pushUrlFin=fullUrl.replace("?navigate=1&",'?');
              var secRpushUrlFin=pushUrlFin.replace("?navigate=1",'');
              window.history.pushState(null, null, secRpushUrlFin);
          }
        if(r.title_tag)
        {
            var ttV=$('#titleTag');
            if(ttV.length>0)
            {
                ttV.text(r.title_tag);
            }
        }
        else
        {
            var ttV=$('#titleTag');
            if(ttV.length>0)
            {
                ttV.text('Wellness Romantik Weekend Tagesausflüge Gruppenausflüge - Erlebnis Schweiz zum Buchen oder als Geschenkgutschein');
            }
        }
        if(r.view)
        {
            $('#pageDynamic').html(r.view);
        }
        else
        {
            location.reload();
        }
        if(r.metaView)
        {
            $( "head meta" ).remove();
            $( "head title" ).remove();
            var cannL=$( 'head link[rel="canonical"]' );
            if(cannL.length>0)
            {
                $( "head link[rel='canonical']" ).remove();
            }
            $('head').prepend(r.metaView);
        }
        $( this ).addClass( "done" );
        var substring1 ="categoryType/weekend";
        var substring2 ="categoryType/Tagesausflug";
        var substring3 ="categoryType/Gruppenausflüge";
        if(fullUrl.indexOf(substring1) !== -1)
        {
            $('.wrapEr').removeClass('active');
            $('#allWeekend .wrapEr').addClass('active');
        }
        else if(fullUrl.indexOf(substring2) !== -1)
        {
            $('.wrapEr').removeClass('active');
            $('#allTagesausflug .wrapEr').addClass('active');
        }
        else if(fullUrl.indexOf(substring3) !== -1)
        {
            $('.wrapEr').removeClass('active');
            $('#allGruppenausfluge .wrapEr').addClass('active');
        }
        if(fullUrl.indexOf('geschenkgutschein') !== -1)
        {
        }
        if(opt.scrollBack)
        {
            if(opt.scrollBack)
            {
                var lngSc=scrollHistory.length-2;
                    if(scrollHistory[lngSc])
                    {
                        if(scrollHistory[lngSc]!=0)
                        {
                            $('#pageDynamic').ready(function() {
                                // Handler for .ready() called.
                                $("html, body").scrollTop(scrollHistory[lngSc]);
                              });
                        }
                    }
                    scrollHistory.splice(lngSc, 2);
            }
            else
            {
                $("html, body").scrollTop(0);
            }
        }
        else
        {
            $("html, body").scrollTop(0);
        }
        if($("#slider1_container").length>0)
        {
            setTimeout(() => {
                ScaleSlider();
            }, 500);
        }
        //ga('send','pageview', "/"+prepareUrl);
        // if ("ga" in window) {
        //     tracker = ga.getAll()[0];
        //     console.log('manual send');
        //     if (tracker)
        //         tracker.send("send", "pageview", location.pathname);
        // }
        //gtag('send', 'pageview', location.pathname);
        gtag('config', 'UA-8788907-1', {'page_path': location.pathname});
      }).fail(function(r,status,xhr) {
        //console.log( "error");
      });
}
function searchFilter()
{
    var searchLink="",regionLink="",offerTypeLink="",offerDurationLink="",keywLink="";
    if(offerRegion!="alle")
    {
        regionLink="/region/"+offerRegion;
    }
    if(offerType!="alle")
    {
        offerTypeLink="/"+offerType;
    }
    if(offerDuration!="alle")
    {
        offerDurationLink="/fuer/"+offerDuration;
    }
    if(keyw!="alle")
    {
        keywLink="/geschenkideen/"+keyw;
    }
    var prepareSearchLink=offerTypeLink+regionLink+offerDurationLink+keywLink;
    var fixSearchLink=prepareSearchLink.replace(/^\/|\/$/g, '');
    searchLink = fixSearchLink.replace("//", "/");
    $.ajax({
        url: br+searchLink+'?navigate=1',
        type:"GET",
        headers: {
            'allowNavigate': 1
          },
        context: document.body
      }).done(function(r) {
          //console.log('searchLink ',br+searchLink);
        window.history.pushState(null, null, br+searchLink);
        //window.history.replaceState(null, null,searchLink);
        if(r.view)
        {
            $('#pageDynamic').html(r.view);
        }
        if(r.metaView)
        {
            $( "head meta" ).remove();
            $( "head title" ).remove();
            var cannL=$( 'head link[rel="canonical"]' );
            if(cannL.length>0)
            {
                $( "head link[rel='canonical']" ).remove();
            }
            $('head').prepend(r.metaView);
        }
        $( this ).addClass( "done" );
      });
}

$(document).ready(function () {
    $( document ).on( "keyup", function(event) {
        var checkHome=$("#homeindicator");
        if(checkHome.length>0)
        {
            if(event.which == 13)
            {
                searchFilter();
            }
        }
      });
    $('.wrapEr').click(function(e) {
        $('.wrapEr.active').removeClass('active');
        var $parent = $(this).parent();
        $parent.addClass('active');
        e.preventDefault();
    });
});
function scrollToVoucher(){
    $("html, body").scrollTop(700);
}

function ScaleSlider() {
    var parentWidth = $('#slider1_container').parent().width();
    if (parentWidth) {
        jssor1_slider.$ScaleWidth(parentWidth);
    }
    else
        window.setTimeout(ScaleSlider, 30);
    }
function activateSlider(){
    var options = {
        $FillMode: 2,
        $AutoPlay: 1,
        $Loop: 1,
    $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        
        $Transitions: ['']
    },
    $ThumbnailNavigatorOptions: {
        $Class: $JssorThumbnailNavigator$,
        $ChanceToShow: 2,
        $ArrowKeyNavigation: 1,
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
            $ChanceToShow: 2,
            $Steps:1
        }
    }
};
jssor1_slider = new $JssorSlider$("slider1_container", options);
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
}
