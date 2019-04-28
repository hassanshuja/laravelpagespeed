var br="https://www.meinweekend.ch/"; 
var disDays = [];
var enableDays = [];
var totalBookingPrice=0;
var lastTotalBookingPrice=0;
var activeOffer=0;
var bookingDate=0;
var stTime=0;
var endTime=0;
function formatDate(date) {
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];
  
    var day = date.getDate();
    var monthIndex = date.getMonth()+1;
    var year = date.getFullYear();
  
    return day + "." + monthIndex + "." +year;
  }
  function formatBookingDate(date) {
    var monthNames = [
      "Januar", "Februar", "März",
      "April", "Mai", "Juni", "Juli",
      "August", "September", "Oktober",
      "November", "Dezember"
    ];
    var days = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'];
    var dayName = days[date.getDay()];
    var day = date.getDate();
    var monthName = monthNames[date.getMonth()];
    var year = date.getFullYear();
    return dayName + ", " + day + ". " + monthName + " " +year;
  }
  function formatVaucherDate(date) {
    var monthNames = [
      "Januar", "Februar", "März",
      "April", "Mai", "Juni", "Juli",
      "August", "September", "Oktober",
      "November", "Dezember"
    ];
    var days = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'];
    var day = date.getDate();
    var monthNum = ("0" + (date.getMonth() + 1)).slice(-2);
    var year = date.getFullYear();
  
    return day + "."+monthNum+ "."+year;
  }
  function formatEnableDate(date) {
    var monthNames = [
      "Januar", "Februar", "März",
      "April", "Mai", "Juni", "Juli",
      "August", "September", "Oktober",
      "November", "Dezember"
    ];
    var days = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'];
    var day = ("0" + (date.getDate() + 1)).slice(-2);
    var monthNum = ("0" + (date.getMonth() + 1)).slice(-2);
    var year = date.getFullYear();
  
    return day + "/"+monthNum+ "/"+year;
  }

  function formatEnableDate2(date) {
    var monthNames = [
      "Januar", "Februar", "März",
      "April", "Mai", "Juni", "Juli",
      "August", "September", "Oktober",
      "November", "Dezember"
    ];
    var days = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'];
    var day = ("0" + (date.getDate())).slice(-2);
    var monthNum = ("0" + (date.getMonth() + 1)).slice(-2);
    var year = date.getFullYear();
  
    return monthNum + "/"+day+ "/"+year;
  }
function disableDays(date) {
    var myDate=formatDate(date),closeDateExists=false,openDateExists=false;
    var testD=[$.inArray(myDate.toString(), enableDays) != -1, ''];
    if(disDays.length>0)
    {
        for (var i = 0; i < disDays.length; i++) {
            if ($.inArray(myDate, disDays) != -1 ) {
            closeDateExists=true;
            console.log("disDays days false");
            return false;
        }
        else
        {
            return true;
        }
    }
    }
    ///console.log('date',date,'myDate',myDate,'closeDateExists',closeDateExists,'openDateExists',openDateExists);
    if(enableDays.length>0)
    {
        for (var i = 0; i < enableDays.length; i++) {
            var enDays=[$.inArray(myDate.toString(), enableDays) != -1, ''];
            if ($.inArray(myDate, enableDays) != -1 ) {
                openDateExists=true;
                var fDateO=formatEnableDate(date);
                return true;
            }
            else
            {
                console.log("enable days false");
                return false;
            }
            }
    }
    if(openDateExists!==true)
    {
        if(date>stTime && date<endTime)
        {
        }
        else
        {
            console.log("start time false");
            return false;
        }
        if(calendarValid==0)
        {
        }
    }
}
function activateDateCalendar(){
    stTime=new Date($('#stTime')[0].value*1000),endTime= new Date($('#endTime')[0].value*1000),stFromDate= new Date($('#defDate')[0].value*1000);
    let cvA=parseInt($('#calendarValid')[0].value);
    var calendarValid= cvA;
    //console.log('stFromDate',stFromDate,stTime,endTime,calendarValid);
    $( "#datetimepicker12" ).datepicker( "destroy" );
    // if($('#datetimepicker12').data('datepicker')){// or $('#user-date').data('datepicker')==null
    //     console.log('datepicker is active');
    // }
    // else
    // {
    //     console.log('datepicker not active');
    // }
    //$('#datetimepicker12').html();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    
    if(dd<10) {
        dd = '0'+dd
    } 
    
    if(mm<10) {
        mm = '0'+mm
    } 
    
    today = mm + '/' + dd + '/' + yyyy;
    console.log('today',today);
    var stDatee=formatEnableDate2(stFromDate);
    console.log("comparable",stDatee);
    //console.log("tommorrow",ttdate);
    if(today==stDatee)
    {

        var ttdate=new Date($('#defDate')[0].value*1000);
        ttdate.setDate(ttdate.getDate() + 1);
        stFromDate=ttdate;
    }
    if(calendarValid==0)
    {
        var replacedOpened=$('#openedDates')[0].value.replace(/ /g,'');
        var replaceAllResOpened=replacedOpened.replace(/(?:\r\n|\r|\n)/g, '');
        var openDates=JSON.parse(replaceAllResOpened);

    enableDays=openDates;
    var nD;
    if(openDates[0])
    {
        //let nDb=formatDate(openDates[0]);
        let nDbB=openDates[0].split(".");
        // nDbB.forEach(de=>{
            //     console.log('');
            // });
            let newDate=nDbB[1]+"/"+nDbB[0]+"/"+nDbB[2];
            nD=new Date(newDate);
        //$('#datetimepicker12').datepicker('startDate', nD);
    }
    if(!nD)
    {
        nD=new Date();
    }
    $('#datetimepicker12').datepicker({
        startDate:stFromDate,
        inline: true,
        sideBySide: true,
        format: 'DD/MM/YYYY',
        language: 'de',
        allowInputToggle: true,
        beforeShowDay: disableDays
    }).on('changeDate', function (ev) {
        var convDate=formatBookingDate(ev.date);
        var serverDate=formatDate(ev.date);
        var udch=$("#userDatePickShow");
        var udch1=$("#userDatePickShow1");
        var udch2=$("#userDatePickShow2");
        if(udch)
        {
            udch.html(convDate);
        }
        if(udch1)
        {
            udch1.html(convDate);
        }
        if(udch2)
        {
            udch2.html(convDate);
        }
        bookingDate=serverDate;
        let sendData={
            selDate:serverDate
        };
        let strSD= $.param(sendData);
        let pData={
            step:2,
            pushD:strSD
        };
        navigateMasterData('reservation/'+activeOffer,{manualPushState:'reservation/'+activeOffer,type:"GET",data:pData});
    });
    }
    else
    {
        var replacedReserverd=$('#closedDates')[0].value.replace(/ /g,'');
        var replaceAllRes=replacedReserverd.replace(/(?:\r\n|\r|\n)/g, '');
        var closedDates=JSON.parse(replaceAllRes);
        var avDays=$('#availableDays')[0].value.replace(/ /g,'');
        var allAvDays=avDays.replace(/(?:\r\n|\r|\n)/g, '');
        disDays=[];
        enableDays=[];
        disDays=closedDates;
        console.log('disDays',disDays.length);
        console.log('replacedReserverd',replacedReserverd,'replaceAllRes',replaceAllRes,'closedDates',closedDates,'avDays',avDays,'allAvDays',allAvDays);
        //console.log('disDays',disDays);
        //console.log('disableDays',disableDays);
        var cOptions;
        if(disDays.length>0)
        {
            cOptions={
                inline: true,
                startDate:stFromDate,
                endDate:endTime,
                sideBySide: true,
                defaultDate:stFromDate,
                allowInputToggle: true,
                daysOfWeekDisabled:allAvDays,
                format: 'DD/MM/YYYY',
                language: 'de',
                beforeShowDay: disableDays
            }

        }
        else
        {
            cOptions={
                inline: true,
                startDate:stFromDate,
                endDate:endTime,
                sideBySide: true,
                defaultDate:stFromDate,
                allowInputToggle: true,
                daysOfWeekDisabled:allAvDays,
                format: 'DD/MM/YYYY',
                language: 'de'
            }
        }
        $('#datetimepicker12').datepicker(cOptions).on('changeDate', function (ev) {
            var convDate=formatBookingDate(ev.date);
            
            var serverDate=formatDate(ev.date);
            var udch=$("#userDatePickShow");
            var udch1=$("#userDatePickShow1");
            var udch2=$("#userDatePickShow2");
            if(udch)
            {
                udch.html(convDate);
            }
            if(udch1)
            {
                udch1.html(convDate);
            }
            if(udch2)
            {
                udch2.html(convDate);
            }
            bookingDate=serverDate;
        let sendData={
            selDate:serverDate
        };
        let strSD= $.param(sendData);
        let pData={
            step:2,
            pushD:strSD
        };
        navigateMasterData('reservation/'+activeOffer,{manualPushState:'reservation/'+activeOffer,type:"GET",data:pData});
        });
        console.log('stFromDate',stFromDate);
        $('#datepicker').datepicker('setStartDate', stFromDate);
        //console.log('stFromDate',stFromDate);
        //$( ".selector" ).datepicker( "startDate", stFromDate );
        // var current = $( "#datetimepicker12" ).datepicker( "option", "startDate" );
        //console.log('current',current);
        // $( "#datetimepicker12" ).datepicker( "refresh" );
        // $('#datetimepicker12').datepicker('update');
    }
}
function navigateMasterData(cUrl,opt)
{
    var fullUrl=br+cUrl+"?navigate=1";
    if(opt)
    {
        if(opt.gtype)
        {
            fullUrl=br+cUrl+"/"+opt.gtype+"?navigate=1";
        }
    }
    
    var recursiveEncoded = $.param( opt.data );
    if(opt.manualPushState)
    {
        window.history.pushState(null, null, br+opt.manualPushState+"?"+recursiveEncoded);
        //window.history.replaceState(null, null,"/"+opt.manualPushState+"?"+recursiveEncoded);
    }
    $.ajax({
        url: fullUrl,
        type: opt.type,
        context: document.body,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'allowNavigate': 1
          },
        data:opt.data
      }).done(function(r,status,xhr) {
          var url = xhr.getAllResponseHeaders();
        if(r.excUrl)
        {
            let trailUrl = r.excUrl.replace(br,'');
            let lTrailUrl = trailUrl.replace('?navigate=1','');
        }
        if(r.view)
        {
            $('#pageDynamic').html(r.view);
        }
        if(r.metaView)
        {
            $( "head meta" ).remove();
            $( "head title" ).remove();
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
        //$("html, body").scrollTop(100);
      });
}
function setOffer(s){
    totalBookingPrice=0;
    lastTotalBookingPrice=0;
    pricesSelected=[];
    aditionalSelected=[];
    activeOffer=s;
}
var pricesSelected=[];
var aditionalSelected=[];
function selectPrice(ev,pId,aPrice){
    var curr=Number($('#s_curr').val());
    var exch=Number($('#s_exch').val());
    let currOption=ev.target;
    if(currOption.value!=0)
    {
        let singlePriceSelect={
            priceId:pId,
            priceValue:currOption.value,
            totalPrice:aPrice
        }
        let selecP='#price_'+pId;
        $(selecP+' option').filter(function(item) {
            if(item==currOption.value)
            {
                $(selecP+' option[value='+currOption.value+']').attr('selected','selected');
            }
            else
            {
                $(selecP+' option[value='+item+']').removeAttr('selected');
            }
          });
        if(pricesSelected.length>0)
        {
            pricesSelected.forEach((prices,index) => {
                if(prices.priceId==singlePriceSelect.priceId)
                {
                    pricesSelected.splice(index,1);
                    
                    
                }
                else
                {
                    
                }
            });
            pricesSelected.push(singlePriceSelect);
        }
        else
        {
            pricesSelected.push(singlePriceSelect);
        }
        let totalBill=0;
        pricesSelected.forEach((prices,index) => {
            
            totalBill+=Number(prices.totalPrice)*Number(prices.priceValue);
        });
        addUpBill(aditionalSelected,pricesSelected,curr,exch);
    }
    else
    {
        let singlePriceSelect={
            priceId:pId,
            priceValue:currOption.value,
            totalPrice:aPrice
        }
        pricesSelected.forEach((prices,index) => {
            if(prices.priceId==singlePriceSelect.priceId)
            {
                pricesSelected.splice(index,1);
            }
            else
            {
            }
        });
        addUpBill(aditionalSelected,pricesSelected,curr,exch);
    }
}
function selectAditional(ev,pId,aPrice){
    var curr=Number($('#s_curr').val());
    var exch=Number($('#s_exch').val());
    let currOption=ev.target;
    let singlePriceSelect={
        additionalId:pId,
        additionalValue:currOption.value,
        totalAdditional:aPrice
    }
           let selecP='#price_'+pId;
           $(selecP+' option').filter(function(item) {
               if(item==currOption.value)
               {
                   $(selecP+' option[value='+currOption.value+']').attr('selected','selected');
               }
               else
               {
                   $(selecP+' option[value='+item+']').removeAttr('selected');
               }
             });
    if(aditionalSelected.length>0)
    {
        aditionalSelected.forEach((prices,index) => {
            if(prices.additionalId==singlePriceSelect.additionalId)
            {
                aditionalSelected.splice(index,1);
            }
            else
            {
            }
        });
        aditionalSelected.push(singlePriceSelect);
    }
    else
    {
        aditionalSelected.push(singlePriceSelect);
    }
    let totalBillA=0;
    aditionalSelected.forEach((prices,index) => {
        totalBillA+=Number(prices.totalAdditional)*Number(prices.additionalValue);
    });
    addUpBill(aditionalSelected,pricesSelected,curr,exch);
}
function addUpBill(aps,ps,curr,exch){
    let totalBillA=0;
    if(aps.length>0)
    {
        aps.forEach((prices,index) => {
            totalBillA+=Number(prices.totalAdditional)*Number(prices.additionalValue);
        });
    }
    if(ps.length>0)
    {
        ps.forEach((prices,index) => {
            totalBillA+=Number(prices.totalPrice)*Number(prices.priceValue);
        });
    }
    if(curr==0)
    {
        $("#bookingTotal").text(totalBillA);
        let rB=roundUp(totalBillA/exch,0);
        $("#shiftBookingTotal").text(rB);
    }
    else
    {
        $("#bookingTotal").text(totalBillA);
        let rB=roundUp(totalBillA*exch,0);
        $("#shiftBookingTotal").text(rB);
    }
    $("#selectedPricesInp").val('1');
}
function startGroupReservation(e){
    
    navigateMaster('gruppenanfrage/'+activeOffer+'/'+e.target.value,{});
}
function roundUp(num, precision) {
    precision = Math.pow(10, precision)
    return Math.ceil(num * precision) / precision
  }
function configurePrices(d){
}
function selectPrices(d){
    let sTable=$('#bookingTable').html();
    var submitData={
        _token:d,
        offer:activeOffer,
        prices:pricesSelected,
        additionals:aditionalSelected,
        firstTable:sTable
    };
    let vauOffE=$("#vaucherOfferT1");
    if(vauOffE.length>0)
    {
        submitData.offerVaucherTable=vauOffE.html();
    }
    $.ajax({
        method: "POST",
        url: br+"selectedPrices",
        data:submitData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
        .done(function( msg ) {
            if(msg)
            {
            if(msg.table)
            {
                $('#selectedPricesTable').html(msg.table);
                $('#lastStepPrices').html(msg.table);
            }
            else
            {
                $('#selectedPricesTable').html('');
                $('#lastStepPrices').html('');
            }
            if(msg.isAdditionalNight)
            {
                $('#additionalNight').html(msg.isAdditionalNight);
            }
            else
            {
                $('#additionalNight').html('');
            }
            }
            else
            {
                $('#selectedPricesTable').html('');
                $('#lastStepPrices').html('');
                $('#additionalNight').html('');
            }
        });
}
function getPrices(d){
    var submitData={
        date:d,
        offerId:activeOffer
    };
    $.ajax({
        method: "GET",
        url: br+"pricesForDate/"+d+"/"+activeOffer
      })
        .done(function( msg ) {
            $('#bookingTable').html(msg);
        });
}
$(document).ready(function () {
    $(document).on("change","#step2row input, #mainVaucherFormS1 input, #voucherStep2 input, #bookingVouchers1 input, #bookingVouchers2 input", function(e){
        var select = $(this);
        select.attr('value',select.val());
    });
    $(document).on("change","#reservationgarantee_check", function(e){
        var select = $(this);
    if(select.attr('val')=='0')
    {
        select.attr('val','1');
    }
    else
    {
        select.attr('val','0');
    }
});
    $(document).on("change","#step2row select, #voucherStep2 select, #bookingVouchers2 select", function(e){
        var select = $(this);
            
            if(this.id=="user_country")
            {
        $("#"+select.context.id+" option").filter(function(item) {
            item++;
            
            var nCo=1;
            if(select.context.value=="Schweiz")
            {
                nCo=1;
            }
            else if(select.context.value=="Deutschland")
            {
                nCo=2;
            }
            else
            {
                nCo=3;
            }
            if(item==nCo)
            {
                $("#"+select.context.id+' option[cost='+nCo+']').attr('selected','selected');
            }
            else
            {
                
                $("#"+select.context.id+' option[cost='+item+']').removeAttr('selected');
            }
          });
            }
            else if(this.id=="user_payment")
            {
                let tT=this;
                $("#"+this.id+" option").filter(function(item) {
                if(this.value==tT.value)
                {
                    $("#"+tT.id+' option[value="'+this.value+'"]').attr('selected','selected');
                }
                else
                {
                    $("#"+tT.id+' option[value="'+this.value+'"]').removeAttr('selected');
                }
                });
            }
            else if(this.id=="user_shipping")
            {
                let tT=this;
                $("#"+this.id+" option").filter(function(item) {
                if(this.value==tT.value)
                {
                    
                    $("#"+tT.id+' option[value="'+this.value+'"]').attr('selected','selected');
                }
                else
                {
                    
                    $("#"+tT.id+' option[value="'+this.value+'"]').removeAttr('selected');
                }
                });
            }
    });
    var offerCalDate =document.getElementById("datetimepicker12");
});
$(document).ready(function(){
    // if(address)
    // {

    //     // $.ajax({
    //     //     dataType: "json",
    //     //     //address is taken from offerpage
    //     //     url: "http://maps.google.com/maps/api/geocode/json?address="+address,
    //     // }).done(function(data){
    //     //     var lat=data.results[0].geometry.location.lat;
    //     //     var lng=data.results[0].geometry.location.lng;
    //     //     
    //     // });
    // }
});
