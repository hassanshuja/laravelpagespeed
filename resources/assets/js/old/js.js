console.log('script loaded');var br="http://www.itrendin.win/",offerType='alle',offerRegion='alle',offerDuration='alle',keyw='alle',vaucherCustom=100,activateEnter=!1,jssor1_slider=null;function toggleDivWithclass(togglediv,thName){if($(window).width()<768){$('#'+togglediv).slideToggle('slow',function(){});var th=$('#'+thName);if(th)
{th.find("i").toggleClass("rotateBack rotate")}}}
function toggleDivWithFilter(togglediv,thName){if($(window).width()<992){$('#'+togglediv).slideToggle('slow',function(){})}
    var th=$('#'+thName);if(th)
    {th.toggleClass("clickedFilt")}}
function showImage(image,vType){$('#mainImage').attr('src',image);$('#mainImage').fadeOut();$('#mainImage').fadeIn();console.log('vType'+vType);console.log('image',image);$('#voucherType').val(vType)}
function showImageVoucherMultiple(){$('#multiplePhoto').show();$('#onePhoto').hide()}
function showImageVoucherSingle(image,vType){$('#multiplePhoto').hide();$('#onePhoto').show();$('#onePhotoSwitch').attr('src',br+image);console.log('vType'+vType);console.log('image',image);$('#voucherType').val(vType)}
$(document).ready(function(){});function changeDetectorInput(){var today=new Date();var dd=today.getDate();var mm=today.getMonth()+1;var yyyy=today.getFullYear();if(dd<10){dd='0'+dd}
    if(mm<10){mm='0'+mm}
    today=yyyy+'-'+mm+'-'+dd;var maxTime=document.getElementById("minDateChange");if(maxTime){maxTime.setAttribute("min",today)}
    $("#minDateChange").on('change',function(){var txtVal=this.value;$("#vouchDate").text(txtVal)});$(document).on('keyup',"#otherValue",function(){var txtVal=this.value;var optionsValues=$('input[type=radio][name=optionsRadios]:checked');if(vaucherCustom=="other")
    {$("#vouchPrice").text('CHF '+txtVal)}});$(document).on('change',"input[type=radio][name=optionsRadios]",function(){vaucherCustom=this.value;if(this.value=='other'){var txtVal=$("#otherValue").val();$("#vouchPrice").text('CHF '+txtVal)}else{$('#vouchPrice').text('CHF '+this.value)}});$(document).on('keyup',"#exampleTextarea",function(){console.log("keyUp funciton",this.value);var txtVal=this.value;$("#voucherDescArea").text(txtVal)});$(document).on('keyup',"#vouchName",function(){console.log("keyUp funciton",this.value);var txtVal=this.value;$("#vouchNameTag").text(txtVal)})}
$(document).ready(function(){var sendData={};$(document).on('click',"#confirmContact",function(eve){var uSurname=$('#user_surname').val();var uName=$('#user_name').val();var uCompany=$('#user_company').val();var uAddress=$('#user_address').val();var uPostalPlace=$('#user_postalPlace').val();var uPostalCode=$('#user_postalCode').val();var uTelephone=$('#user_telephone').val();var uEmail=$('#user_email').val();var uComment=$('#user_comment').val();var urandCode=$('#userRandomCode').val();var uOffer=$('#user_offer').val();var token=$("input[name=_token]").val();var uStatus=$("input[name='anredeOp']:checked").val();sendData={_token:token,andrede:uStatus,name:uName,vorname:uSurname,strasse:uAddress,ort:uPostalCode,plz:uPostalPlace,telefon:uTelephone,email:uEmail,company:uCompany,message:uComment,offer:uOffer,}
    submitContact(sendData)});$(document).on('click',"#sendGroupOffer",function(eve){var excursionPack=$('#excursion_package').val();var gDate=$('#group_date').val();var uSurname=$('#user_surname').val();var uName=$('#user_name').val();var uCompany=$('#user_company').val();var uAddress=$('#user_address').val();var uPostalPlace=$('#user_postalPlace').val();var uPostalCode=$('#user_postalCode').val();var uTelephone=$('#user_telephone').val();var uEmail=$('#user_email').val();var alternativT=$('#alternativ_Termine').val();var desiredStTime=$('#desired_start_time').val();var noParticipants=$('#no_participants').val();var uRemarks=$('#remarks').val();var token=$("input[name=_token]").val();sendData={_token:token,offer:excursionPack,date:gDate,lastName:uSurname,firstName:uName,company:uCompany,street:uAddress,plz:uPostalPlace,ort:uPostalCode,telefon:uTelephone,email:uEmail,alternative:alternativT,starttime:desiredStTime,remarks:uRemarks,total_people:noParticipants}
    submitGroupOffer(sendData)});var liberInd="";$(document).on('click',"#voucherStepb1,#voucherStepb2,#voucherStepb3",function(eve){var vStepId=$(eve.target).attr('id');console.log('vStepIdsss',vStepId);if(vStepId=='voucherStepb1')
{var vFor=$('#vouchName').val();var vText=$('#exampleTextarea').val();var vPrice=$('#otherValue').val();console.log('vPrice',vPrice,'vText',vText,'vFor',vFor);var optionsValues=$('input[type=radio][name=optionsRadios]:checked');$("#voucherFor").text(vFor);$("#voucherFor1").text(vFor);$("#voucherText").text(vText);$("#voucherText1").text(vText);if(vaucherCustom=="other")
{$("#voucherPrice").text(vPrice);$("#voucherPrice1").text(vPrice)}
else{$("#voucherPrice").text(optionsValues.val());$("#voucherPrice1").text(optionsValues.val())}
    validateVoucherOffer(2,1,'#VouchForm1',{})}
else if(vStepId=='voucherStepb2')
{var uName=$('#user_name').val();var uSurname=$('#user_surname').val();var uCompany=$('#user_company').val();var uAddress=$('#user_address').val();var uPostalCode=$('#user_postalCode').val();var uPostalPlace=$('#user_postalPlace').val();var uCountry=$('#user_country').val();var uTelephone=$('#user_telephone').val();var uEmail=$('#user_email').val();var uMessage=$('#user_message').val();var uPayment=$('#user_payment').val();var uShipping=$('#user_shipping').val();var uValidFrom=$('#user_validFrom').val();var voucherType=$('#voucherType').val();uStatus=$("input[name='anredeOp']:checked").val();var dbPay=0;var dbPayVal=0;var vFor=$('#vouchName').val();var vText=$('#exampleTextarea').val();var vPrice=$('#otherValue').val();var optionsValues=$('input[type=radio][name=optionsRadios]:checked');liberInd=uStatus;if(vaucherCustom=="other")
{dbPayVal=vPrice}
else{dbPayVal=optionsValues.val()}
    console.log(uPayment);if(uPayment!="Rechnung")
{dbPay=1;$('#creditCardRules').show()}
else{$('#creditCardRules').hide()}
    var token=$("input[name=_token]").val();sendData={_token:token,vaucher_type:2,payment_id:dbPay,offer:0,valid_from:uValidFrom,vaucher_for:vFor,vaucher_text:vText,items:'',payment_type:uPayment,send_type:uShipping,message:uMessage,vaucher_template:voucherType,total_price:dbPayVal,user:{username:uEmail,name:uName+' '+uSurname,first_name:uName,last_name:uSurname,address:uAddress,telephone:uTelephone,fax:'',email:uEmail,title:uStatus,zip:uPostalCode,city:uPostalPlace,country:uCountry,www:'',company:uCompany,gender:uStatus,}}
    $('#userFullnameHolder').text(uName+" "+uSurname);$('#userCompanyHolder').text(uCompany);$('#userAddressHolder').text(uAddress);$('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);$('#userCountryHolder').text(uCountry);$('#userTelephoneHolder').text(uTelephone);$('#userEmailHolder').text(uEmail);$('#userMessageHolder').text(uMessage);$('#userPaymentHolder').text(uPayment);$('#userShippingHolder').text(uShipping);$('#userStatusHolder').text(uStatus);$("input[name=AMOUNT]").val(dbPayVal);$("input[name=CN]").val(uName+" "+uSurname);$("input[name=CURRENCY]").val('CHF');$("input[name=EMAIL]").val(uEmail);$("input[name=LANGUAGE]").val('de_DE');var nowD=new Date();$("input[name=ORDERID]").val(uSurname+'/'+nowD);$("input[name=OWNERADDRESS]").val(uCountry);$("input[name=OWNERTELNO]").val(uTelephone);$("input[name=OWNERTOWN]").val(uPostalPlace);$("input[name=OWNERTOWN]").val(uPostalPlace);$("input[name=OWNERZIP]").val(uPostalCode);console.log('uShipping',uShipping);validateVoucherOffer(2,2,'#VouchForm2',{});console.log('uStatus',uStatus)}
else if(vStepId=='voucherStepb3')
{var uShipping=$('#user_shipping').val();if(uShipping!="Postversand")
{console.log('client email',$('#userEmailHolder').text());$('#clientConfirmationEmail').text($('#userEmailHolder').text());$('#printHome').attr("style","display:block;");$('#postVersand').attr("style","display:none;")}
else{$('#printHome').attr("style","display:none;");$('#postVersand').attr("style","display:block;")}
    console.log('liberInd',liberInd);if(liberInd=="Herr")
{$('#senderName').text("R "+$('#userStatusHolder').text()+" "+$('#user_surname').val())}
else{$('#senderName').text(" "+$('#userStatusHolder').text()+" "+$('#user_surname').val())}
    console.log('sendData',sendData);$('.voucherSteps').removeClass('stepShowVoucher');$('#voucherStep4').addClass('stepShowVoucher');submitVoucher(sendData)}});$(document).on('click',"#voucherStepRet1,#voucherStepRet2,#voucherStepRet3",function(eve){var vStepId=$(eve.target).attr('id');console.log('vStepIdsss',vStepId);$('.voucherSteps').removeClass('stepShowVoucher');if(vStepId=='voucherStepRet1')
{}
else if(vStepId=='voucherStepRet2')
{window.history.back()}
else if(vStepId=='voucherStepRet3')
{window.history.back()}});$(document).on('click',"#bookingStepb1,#bookingStepb2,#bookingStepb3",function(eve){var vStepId=$(eve.target).attr('id');console.log('vStepIdsss',vStepId);if(vStepId=='bookingStepb1')
{$('.bookingSteps').removeClass('stepShowBooking');$('.bookingSteps').removeClass('stepShowBookingSpecial');$('#bookingStep2').addClass('stepShowBooking')}
else if(vStepId=='bookingStepb2')
{console.log('next',window.history);validateVoucherOffer(1,1,'#bookingValid1',{})}
else if(vStepId=='bookingStepb3')
{var uName=$('#user_name').val();var uSurname=$('#user_surname').val();var uCompany=$('#user_company').val();var uAddress=$('#user_address').val();var uPostalCode=$('#user_postalCode').val();var uPostalPlace=$('#user_postalPlace').val();var uCountry=$('#user_country').val();var uTelephone=$('#user_telephone').val();var uEmail=$('#user_email').val();var uMessage=$('#user_message').val();var uPayment=$('#user_payment').val();var uShipping=$('#user_shipping').val();var uValidFrom=$('#user_validFrom').val();var guaranteeCheck=$('#reservationgarantee_check');var cardType=$('#reservationgarantee_cardtype').val();var cardNo=$('#reservationgarantee_cardno').val();var cardExpMonth=$('#reservationgarantee_exp_month').val();var cardExpYear=$('#reservationgarantee_exp_year').val();var cardName=$('#reservationgarantee_name').val();if(guaranteeCheck.is(":checked"))
{guaranteeCheck=1}
else{guaranteeCheck=0}
    console.log('guaranteeCheck',guaranteeCheck);var voucherOfferCode=$('#vouCode').val();var marketingCode=$('#marketingCode').val();var totalBetrag=$('#totalBetrag').val();var uStatus=$('input[name=andreOp]:checked').val();console.log('andreOp',uStatus);var dbPay=0;var dbPayVal=0;var vFor=$('#vouchName').val();var vText=$('#exampleTextarea').val();var vPrice=$('#otherValue').val();var optionsValues=$('input[type=radio][name=optionsRadios]:checked');if(vaucherCustom=="other")
{dbPayVal=vPrice}
else{dbPayVal=optionsValues.val()}
    if(uPayment!="Rechnung")
    {dbPay=1;$('#creditCardRules').show()}
    else{$('#creditCardRules').hide()}
    let token=$("input[name=_token]").val();sendData={_token:token,offer:activeOffer,prices:pricesSelected,additionals:aditionalSelected,booking_date:bookingDate,reservationgarantee_nocard:guaranteeCheck,reservationgarantee_cardno:cardNo,reservationgarantee_cardtype:cardType,reservationgarantee_exp_month:cardExpMonth,reservationgarantee_exp_year:cardExpYear,reservationgarantee_name:cardName,vaucher_code:voucherOfferCode,marketing_code:marketingCode,message:uMessage,vaucher_amount:totalBetrag,saveUserContact:$("#step2row").html(),user:{username:uEmail,name:uName+' '+uSurname,first_name:uName,last_name:uSurname,address:uAddress,telephone:uTelephone,fax:'',email:uEmail,title:uStatus,zip:uPostalCode,city:uPostalPlace,country:uCountry,www:'',company:uCompany,gender:uStatus,}}
    console.log('bookingsssss data to submit',sendData);console.log('uName',uName);$('#userName').text(uName);$('#userSurname').text(uSurname);$('#uName').text(uSurname);$('#userCompanyHolder').text(uCompany);$('#userAddressHolder').text(uAddress);$('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);$('#userCountryHolder').text(uCountry);$('#userTelephoneHolder').text(uTelephone);$('#userEmailHolder').text(uEmail);$('#userMessageHolder').text(uMessage);$('#userPaymentHolder').text(uPayment);$('#userShippingHolder').text(uShipping);$('#userStatusHolder').text(uStatus);console.log('herlakjdflsakf ',uStatus);if(uStatus=="Herr")
{$('#uStatus').text("R "+uStatus)}
else{$('#uStatus').text(" "+uStatus)}
    $('.stepsIndic').removeClass('step1');$('#step4I').addClass('step1');var currFullUrl=window.location.href;let pre_url=currFullUrl.replace(br+"/reservation","");let push_url=pre_url.replace("step=3","step=4");window.history.pushState(null,null,window.location);console.log('push_url',push_url);window.history.replaceState(null,null,push_url);validateVoucherOffer(1,2,'#bookingContactForm',sendData)}});$(document).on('click',"#bookingStepRet1,#bookingStepRet2,#bookingStepRet3",function(eve){var vStepId=$(eve.target).attr('id');console.log('vStepIdsss',vStepId);if(vStepId=='bookingStepRet1')
{}
else if(vStepId=='bookingStepRet2')
{window.history.back()}
else if(vStepId=='bookingStepRet3')
{window.history.back()}});$(document).on('click',"#voucherOffersRet1,#voucherOffersRet2,#voucherOffersRet3",function(eve){var vStepId=$(eve.target).attr('id');console.log('vStepIdsss',vStepId);if(vStepId=='voucherOffersRet1')
{}
else if(vStepId=='voucherOffersRet2')
{window.history.back()}
else if(vStepId=='voucherOffersRet3')
{window.history.back()}});$(document).on('click',"#voucherOffers2,#voucherOffers3,#voucherOffers4",function(eve){var vStepId=$(eve.target).attr('id');console.log('vStepIdsss',vStepId);if(vStepId=='voucherOffers1')
{$('.bookingSteps').removeClass('stepShowBookingSpecial');$('#bookingVouchers2').addClass('stepShowBooking')}
else if(vStepId=='voucherOffers2')
{console.log('next',pricesSelected);console.log('validate offerVouchForm1');var vFor=$('#vouchName').val();var vText=$('#exampleTextarea').val();$("#voucherFor").text(vFor);$("#voucherFor1").text(vFor);$("#voucherText").text(vText);$("#voucherText1").text(vText);validateVoucherOffer(3,1,'#offerVouchForm1',{})}
else if(vStepId=='voucherOffers3')
{validateVoucherOffer(3,2,'#offerVouchForm2',{});var uName=$('#user_name').val();var uSurname=$('#user_surname').val();var uCompany=$('#user_company').val();var uAddress=$('#user_address').val();var uPostalCode=$('#user_postalCode').val();var uPostalPlace=$('#user_postalPlace').val();var uCountry=$('#user_country').val();var uTelephone=$('#user_telephone').val();var uEmail=$('#user_email').val();var uMessage=$('#user_message').val();var uPayment=$('#user_payment').val();var uShipping=$('#user_shipping').val();var uValidFrom=$('#user_validFrom').val();var cardType=$('#reservationgarantee_cardtype').val();var cardNo=$('#reservationgarantee_cardno').val();var cardExpMonth=$('#reservationgarantee_exp_month').val();var cardExpYear=$('#reservationgarantee_exp_year').val();var cardName=$('#reservationgarantee_name').val();var voucherOfferCode=$('#vouCode').val();var marketingCode=$('#marketingCode').val();var totalBetrag=$('#totalBetrag').val();var uStatus=$('input[name=andreOp]:checked').val();console.log('getting option ',uStatus);var dbPay=0;var dbPayVal=0;var vFor=$('#vouchName').val();var vText=$('#exampleTextarea').val();var vPrice=$('#otherValue').val();var optionsValues=$('input[type=radio][name=optionsRadios]:checked');if(vaucherCustom=="other")
{dbPayVal=vPrice}
else{dbPayVal=optionsValues.val()}
    if(uPayment!="Rechnung")
    {dbPay=1;$('#creditCardRules').show()}
    else{$('#creditCardRules').hide()}
    liberInd=uStatus;let token=$("input[name=_token]").val();sendData={_token:token,offer:activeOffer,prices:pricesSelected,additionals:aditionalSelected,booking_date:bookingDate,payment_type:uPayment,send_type:uShipping,reservationgarantee_cardno:cardNo,reservationgarantee_cardtype:cardType,reservationgarantee_exp_month:cardExpMonth,reservationgarantee_exp_year:cardExpYear,reservationgarantee_name:cardName,vaucher_code:voucherOfferCode,marketing_code:marketingCode,vaucher_amount:totalBetrag,valid_from:uValidFrom,vaucher_for:vFor,message:uMessage,vaucher_text:vText,user:{username:uEmail,name:uName+' '+uSurname,first_name:uName,last_name:uSurname,address:uAddress,telephone:uTelephone,fax:'',email:uEmail,title:uStatus,zip:uPostalCode,city:uPostalPlace,country:uCountry,www:'',company:uCompany,gender:uStatus,}}
    console.log('booking data to submit',sendData);$('#userName').text(uName);$('#userSurname').text(uSurname);$('#uName').text(uSurname);$('#userFullnameHolder').text(uName+" "+uSurname);$('#userCompanyHolder').text(uCompany);$('#userAddressHolder').text(uAddress);$('#userPLZOrtHolder').text(uPostalCode+", "+uPostalPlace);$('#userCountryHolder').text(uCountry);$('#userTelephoneHolder').text(uTelephone);$('#userEmailHolder').text(uEmail);$('#userMessageHolder').text(uMessage);$('#userPaymentHolder').text(uPayment);$('#userShippingHolder').text(uShipping);$('#userStatusHolder').text(uStatus);if(uStatus=="Herr")
{$('#uStatus').text("R "+uStatus)}
else{$('#uStatus').text(" "+uStatus)}}
else if(vStepId=="voucherOffers4")
{var uShipping=$('#user_shipping').val();if(uShipping!="Postversand")
{console.log('client email',$('#userEmailHolder').text());$('#clientConfirmationEmail').text($('#userEmailHolder').text());$('#printHome').attr("style","display:block;");$('#postVersand').attr("style","display:none;")}
else{$('#printHome').attr("style","display:none;");$('#postVersand').attr("style","display:block;")}
    console.log('sendData',sendData);$('#clientConfirmationEmail').text($('#userEmailHolder').text());$('.bookingSteps').removeClass('stepShowBookingSpecial');$('.bookingSteps').removeClass('stepShowBooking');$('#bookingVouchers4').addClass('stepShowBooking');let confDataOffV=$('#vaucherConfirmationInfo').html();sendData.saveConfOffVau=confDataOffV;submitOfferBooking(sendData)}});$(window).resize(function(){if($(window).width()>768){$('#gMap1,#inLinks1,#toggle1,#toggle2,#toggle3',document).removeAttr("id")}});$(window).on("popstate",function(e)
{console.log('popstate here',e);end_l_of_c_s=!1;if(e.state!==null)
{var g_url=location.href;var o_a_wh="#pageDynamic";console.log('popstate link',g_url);console.log("location.host",window.location.host);console.log("location.search",window.location.search);console.log("location.pathname",window.location.pathname);let wSearch=window.location.search;wSearch=wSearch.replace("?navigate=1",'');if(wSearch!='')
{if(wSearch.charAt(0)=='?'){wSearch=wSearch.replace("?",'?navigate=1&')}}
else{wSearch='?navigate=1'}
    console.log("wSearch",wSearch);let pathNew=window.location.pathname.replace('/','');g_url=pathNew+wSearch;console.log("g_url",g_url);o_nav='';if(!$(o_a_wh).length)
{window.location.href=window.location.host+g_url}
else{if(g_url.indexOf("?")>-1)
{}
else{}
    var get_res=navigateMaster(g_url,{urlCorrect:1})}}});$(document).on("click","a",function(e){e.preventDefault();var o_a_wh="#pageDynamic";console.log($(o_a_wh));var clicked=$(this);var options={};var goTo=clicked.attr('data-cUrl');var goType=clicked.attr('data-urlType');console.log('go to ',goTo);$(".navbar-nav").find(".active").removeClass("active");$(this).parent().addClass("active");if(!$(o_a_wh).length)
{console.log('afasf')}
else{if(goType)
{options.gtype=goType}
    navigateMaster(goTo,options);window.history.pushState(null,null,window.location);window.history.replaceState(null,null,"/"+goTo)}});$(document).on("click","#masterSearch",function(e){searchFilter()});$(document).on("change","#offerType",function(e){var select=$(this);var newVal=select.val();offerType=newVal});$(document).on("change","#offerRegion",function(e){var select=$(this);var newVal=select.val();offerRegion=newVal});$(document).on("change","#offerDuration",function(e){var select=$(this);var newVal=select.val();offerDuration=newVal});$(document).on("keyup","#searchUser",function(e){var select=$(this);var newVal=select.val();keyw=newVal})});function validateVoucherOffer(stIn,stNow,fId,fData){var cRules={},cMessages={};if(stIn==1)
{if(stNow==1)
{cRules={selectedPricesInp:"required",};cMessages={selectedPricesInp:{required:"Bitte um Ihre Angaben: Ihre Reservationen."}}}
else if(stNow==2)
{cRules={user_name:"required",user_surname:"required",user_address:"required",user_postalCode:"required",user_postalPlace:"required",user_country:"required",user_telephone:"required",user_email:"required",user_payment:"required",user_shipping:"required",termsCheck:"required",};cMessages={user_name:{required:"Bitte um Ihre Angaben: Vorname"},user_surname:{required:"Bitte um Ihre Angaben: Nachname"},user_address:{required:"Bitte um Ihre Angaben: Adresse"},user_postalCode:{required:"Bitte um Ihre Angaben: PLZ"},user_postalPlace:{required:"Bitte um Ihre Angaben: Ort"},user_country:{required:"Bitte um Ihre Angaben: Land"},user_telephone:{required:"Bitte um Ihre Angaben: Telefon"},user_email:{required:"Bitte um Ihre Angaben: E-Mail"},user_payment:{required:"Bitte um Ihre Angaben: Zahlungsart"},user_shipping:{required:"Bitte um Ihre Angaben: Versand"},termsCheck:{required:"Bitte AGB‘s akzeptieren"}}}
    console.log('cRuels',cRules);console.log('cMessages',cMessages);console.log('fId',fId);console.log('form',$(fId));$(fId).validate({errorClass:"bad-message",rules:cRules,messages:cMessages,submitHandler:function(form){console.log('submit handeled inside',stNow);if(stNow==1)
    {$('.bookingSteps').removeClass('stepShowBooking');$('.stepsIndic').removeClass('step1');$('#step3I').addClass('step1');console.log('post remove class',$('.bookingSteps'));let token=$("input[name=_token]").val();selectPrices(token);$('#bookingStep3').addClass('stepShowBooking');var currFullUrl=window.location.href;let pre_url=currFullUrl.replace(br+"/reservation","");let push_url=pre_url.replace("step=2","step=3");window.history.pushState(null,null,window.location);console.log('push_url',push_url);window.history.replaceState(null,null,push_url)}
    else if(stNow==2)
    {console.log('submitting booking');submitBooking(fData);$('.bookingSteps').removeClass('stepShowBooking');$('#bookingStep4').addClass('stepShowBooking')}
        return!1},highlight:function(element,errorClass){$(element).removeClass(errorClass)}});if(stNow==1||stNow==2)
{$(fId).submit()}
    console.log('end')}
else if(stIn==2)
{if(stNow==1)
{cRules={vouchName:"required",vouchText:"required",vouchDate:"required",};cMessages={vouchName:{required:"Bitte um Ihre Angaben: Ausgestellt auf"},vouchText:{required:"Bitte um Ihre Angaben: Text auf Gutschein"},vouchDate:{required:"Bitte um Ihre Angaben: Date auf Gutschein"}}}
else if(stNow==2)
{cRules={user_name:"required",user_surname:"required",user_address:"required",user_postalCode:"required",user_postalPlace:"required",user_country:"required",user_telephone:"required",user_email:"required",user_payment:"required",user_shipping:"required",termsCheck:"required",};cMessages={user_name:{required:"Bitte um Ihre Angaben: Vorname"},user_surname:{required:"Bitte um Ihre Angaben: Nachname"},user_address:{required:"Bitte um Ihre Angaben: Adresse"},user_postalCode:{required:"Bitte um Ihre Angaben: PLZ"},user_postalPlace:{required:"Bitte um Ihre Angaben: Ort"},user_country:{required:"Bitte um Ihre Angaben: Land"},user_telephone:{required:"Bitte um Ihre Angaben: Telefon"},user_email:{required:"Bitte um Ihre Angaben: E-Mail"},user_payment:{required:"Bitte um Ihre Angaben: Zahlungsart"},user_shipping:{required:"Bitte um Ihre Angaben: Versand"},termsCheck:{required:"Bitte AGB‘s akzeptieren"}}}
    console.log('cRuels',cRules);console.log('cMessages',cMessages);console.log('fId',fId);console.log('form',$(fId));$(fId).validate({errorClass:"bad-message",rules:cRules,messages:cMessages,submitHandler:function(form){console.log('submit handeled inside',stNow);if(stNow==1)
    {let mvfs1=$('#mainVaucherFormS1').html();console.log('form being sent',mvfs1);let pData={step:2,imgForm:mvfs1};submitVaucherStFirst(pData);let token=$("input[name=_token]").val();$('.voucherSteps').removeClass('stepShowVoucher');$('#voucherStep2').addClass('stepShowVoucher');var currFullUrl=window.location.href;let pre_url=currFullUrl.replace(br+"/geschenkgutschein","");var push_url='';if(pre_url.indexOf('step=1')!==-1)
    {push_url=pre_url.replace("step=1","step=2")}
    else{if(pre_url.indexOf('step=2')!==-1)
    {push_url=pre_url}
    else{push_url=pre_url+"?step=2"}}
        if(pre_url.indexOf('step=1')==-1||pre_url.indexOf('step=2')!==-1||pre_url.indexOf('step=3')!==-1)
        {window.history.replaceState(null,null,'/geschenkgutschein?step=1')}
        window.history.pushState(null,null,window.location);console.log('push_url',push_url);window.history.replaceState(null,null,push_url)}
    else if(stNow==2)
    {let mvfs1=$('#voucherStep2').html();console.log('form being sent',mvfs1);let pData={step:2,imgForm:mvfs1};submitVaucherStSecond(pData);$('.voucherSteps').removeClass('stepShowVoucher');$('#voucherStep3').addClass('stepShowVoucher');var currFullUrl=window.location.href;let pre_url=currFullUrl.replace(br+"/geschenkgutschein","");var push_url='';if(pre_url.indexOf('step=2')!==-1)
    {push_url=pre_url.replace("step=2","step=3")}
    else{if(pre_url.indexOf('step=3')!==-1)
    {push_url=pre_url}
    else{push_url=pre_url+"?step=3"}}
        window.history.pushState(null,null,window.location);console.log('push_url',push_url);window.history.replaceState(null,null,push_url)}
        return!1},highlight:function(element,errorClass){$(element).removeClass(errorClass)}});console.log('end')}
else if(stIn==3)
{if(stNow==1)
{cRules={vouchName:"required",vouchText:"required",vouchDate:"required",};cMessages={vouchName:{required:"Bitte um Ihre Angaben: Ausgestellt auf"},vouchText:{required:"Bitte um Ihre Angaben: Text auf Gutschein"},vouchDate:{required:"Bitte um Ihre Angaben: Date auf Gutschein"}}}
else if(stNow==2)
{cRules={user_name:"required",user_surname:"required",user_address:"required",user_postalCode:"required",user_postalPlace:"required",user_country:"required",user_telephone:"required",user_email:"required",user_payment:"required",user_shipping:"required",termsCheck:"required",};cMessages={user_name:{required:"Bitte um Ihre Angaben: Vorname"},user_surname:{required:"Bitte um Ihre Angaben: Nachname"},user_address:{required:"Bitte um Ihre Angaben: Adresse"},user_postalCode:{required:"Bitte um Ihre Angaben: PLZ"},user_postalPlace:{required:"Bitte um Ihre Angaben: Ort"},user_country:{required:"Bitte um Ihre Angaben: Land"},user_telephone:{required:"Bitte um Ihre Angaben: Telefon"},user_email:{required:"Bitte um Ihre Angaben: E-Mail"},user_payment:{required:"Bitte um Ihre Angaben: Zahlungsart"},user_shipping:{required:"Bitte um Ihre Angaben: Versand"},termsCheck:{required:"Bitte AGB‘s akzeptieren"}}}
    console.log('cRuels',cRules);console.log('cMessages',cMessages);console.log('fId',fId);console.log('form',$(fId));$(fId).validate({errorClass:"bad-message",rules:cRules,messages:cMessages,submitHandler:function(form){if(stNow==1)
    {let token=$("input[name=_token]").val();selectPrices(token);$('.bookingSteps').removeClass('stepShowBooking');$('#bookingStep3').addClass('stepShowBooking');$('.bookingSteps').removeClass('stepShowBookingSpecial');$('#bookingVouchers2').addClass('stepShowBooking');var currFullUrl=window.location.href;let pre_url=currFullUrl.substr(currFullUrl.indexOf('?')+1);if(currFullUrl==window.location.href)
    {pre_url=''}
        console.log('pre urljs',pre_url);var push_url='';if(pre_url.indexOf('step=1')!==-1)
    {push_url=pre_url.replace("step=1","step=2")}
    else{if(pre_url.indexOf('step=2')!==-1)
    {push_url=pre_url}
    else{push_url=pre_url+"?step=2"}}
        if(pre_url.indexOf('step=1')==-1||pre_url.indexOf('step=2')!==-1||pre_url.indexOf('step=3')!==-1)
        {window.history.replaceState(null,null,window.location.pathname+'?step=1')}
        window.history.pushState(null,null,window.location);console.log('push_url',push_url);window.history.replaceState(null,null,push_url)}
    else if(stNow==2)
    {$('.bookingSteps').removeClass('stepShowBooking');$('.bookingSteps').removeClass('stepShowBookingSpecial');$('#bookingVouchers3').addClass('stepShowBooking');let mvfs1=$('#offerVaucherContact').html();let pData={step:3,imgForm:mvfs1};submitOfferVaucherTable(pData);var currFullUrl=window.location.href;let pre_url=currFullUrl.substr(currFullUrl.indexOf('?')+1);if(currFullUrl==window.location.href)
    {pre_url=''}
        console.log('pre urljs',pre_url);var push_url='';if(pre_url.indexOf('step=2')!==-1)
    {push_url=pre_url.replace("step=2","step=3")}
    else{if(pre_url.indexOf('step=3')!==-1)
    {push_url=pre_url}
    else{push_url=pre_url+"?step=3"}}
        window.history.pushState(null,null,window.location);console.log('push_url',push_url);window.history.replaceState(null,null,push_url)}
        return!1},highlight:function(element,errorClass){$(element).removeClass(errorClass)}});console.log('end')}}
function submitGroupOffer(submitData){$.ajax({method:"POST",url:br+"submitGroupApplication",data:submitData}).done(function(msg){console.log("Data Saved: "+msg)})}
function submitVaucherStFirst(submitData){$.ajax({method:"POST",headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},url:br+"submitVaucherStepFirst",data:submitData}).done(function(msg){let mvfs1=$('#voucherStep2').html();console.log('form being sent',mvfs1);let pData={step:2,imgForm:mvfs1};submitVaucherStSecond(pData)})}
function submitVaucherStSecond(submitData){$.ajax({method:"POST",headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},url:br+"submitVaucherStepSecond",data:submitData}).done(function(msg){let mvfs1=$('#voucherStep3').html();console.log('form being sent',mvfs1);let pData={step:3,imgForm:mvfs1};submitVaucherStThird(pData)})}
function submitVaucherStThird(submitData){$.ajax({method:"POST",headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},url:br+"submitVaucherStepThird",data:submitData}).done(function(msg){console.log("Data Saved: "+msg)})}
function submitOfferVaucherTable(submitData){$.ajax({method:"POST",headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},url:br+"submitOfferVaucherTable",data:submitData}).done(function(msg){console.log("Data Saved: "+msg)})}
function submitContact(submitData){$.ajax({method:"POST",url:br+"submitContact",data:submitData}).done(function(msg){$('#contactTitleHolder').hide();$('#contactFormHolder').hide();$('#contactItemsHolder').hide();$('#contactSendConfirmation').show()})}
function submitVoucher(submitData){$.ajax({method:"POST",url:br+"submitVaucher",data:submitData}).done(function(msg){console.log("Data Saved: "+msg)})}
function submitBooking(submitData){$.ajax({method:"POST",url:br+"submitBooking",data:submitData}).done(function(msg){console.log("Data Saved: "+msg)})}
function submitOfferBooking(submitData){$.ajax({method:"POST",url:br+"submitOfferVaucher",data:submitData}).done(function(msg){console.log("Data Saved: "+msg)})}
function navigateMaster(cUrl,opt)
{var fullUrl='';if(opt.urlCorrect)
{fullUrl=br+cUrl}
else{fullUrl=br+cUrl+"?navigate=1"}
    if(opt)
    {if(opt.gtype)
    {fullUrl=br+cUrl+"/"+opt.gtype+"?navigate=1"}}
    console.log("config Options",opt);if(opt.manualPushState)
{window.history.pushState(null,null,window.location);window.history.replaceState(null,null,"/"+opt.manualPushState)}
    console.log('fullUrlsssss ',fullUrl);$.ajax({url:fullUrl,type:'GET',context:document.body}).done(function(r){console.log(r);if(r.view)
{$('#pageDynamic').html(r.view)}
    if(r.metaView)
    {$("head meta").remove();$("head title").remove();$('head').prepend(r.metaView)}
    $(this).addClass("done");var substring1="categoryType/weekend";var substring2="categoryType/Tagesausflug";var substring3="categoryType/Gruppenausflüge";console.log('my url',fullUrl);if(fullUrl.indexOf(substring1)!==-1)
    {$('.wrapEr').removeClass('active');$('#allWeekend .wrapEr').addClass('active')}
    else if(fullUrl.indexOf(substring2)!==-1)
    {$('.wrapEr').removeClass('active');$('#allTagesausflug .wrapEr').addClass('active')}
    else if(fullUrl.indexOf(substring3)!==-1)
    {$('.wrapEr').removeClass('active');$('#allGruppenausfluge .wrapEr').addClass('active')}
    if(fullUrl.indexOf('geschenkgutschein')!==-1)
    {console.log('setting detector')}
    $("html, body").scrollTop(0);if($("#slider1_container").length>0)
    {setTimeout(()=>{ScaleSlider()},500)}})}
function searchFilter()
{$.ajax({url:br+'list-offers/region/'+offerRegion+'/offer_type/'+offerType+'/duration/'+offerDuration+'/keyword/'+keyw+'?navigate=1',context:document.body}).done(function(r){if(r.view)
{$('#pageDynamic').html(r.view)}
    if(r.metaView)
    {$("head meta").remove();$("head title").remove();$('head').prepend(r.metaView)}
    $(this).addClass("done")})}
$(document).ready(function(){$(document).on("keyup",function(event){let checkHome=$("#homeindicator");if(checkHome.length>0)
{if(event.which==13)
{searchFilter()}}});$('.wrapEr').click(function(e){$('.wrapEr.active').removeClass('active');var $parent=$(this).parent();$parent.addClass('active');e.preventDefault()})});function ScaleSlider(){var parentWidth=$('#slider1_container').parent().width();if(parentWidth){jssor1_slider.$ScaleWidth(parentWidth)}
else window.setTimeout(ScaleSlider,30)}
function activateSlider(){var options={$FillMode:2,$AutoPlay:1,$Loop:1,$SlideshowOptions:{$Class:$JssorSlideshowRunner$,$Transitions:['']},$ThumbnailNavigatorOptions:{$Class:$JssorThumbnailNavigator$,$ChanceToShow:2,$ArrowKeyNavigation:1,$ArrowNavigatorOptions:{$Class:$JssorArrowNavigator$,$ChanceToShow:2,$Steps:1}}};jssor1_slider=new $JssorSlider$("slider1_container",options);ScaleSlider();$(window).bind("load",ScaleSlider);$(window).bind("resize",ScaleSlider);$(window).bind("orientationchange",ScaleSlider)}
