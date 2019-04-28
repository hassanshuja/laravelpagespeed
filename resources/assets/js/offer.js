var br="http://www.itrendin.win/"; 
var disDays = [];
var enableDays = [];
var totalBookingPrice=0;
var lastTotalBookingPrice=0;
var activeOffer=0;
var bookingDate=0;
var stTime=0;
var endTime=0;
//var dateFormat = require('dateformat');
//var disDays = [new Date(2018,3,26).toString(), new Date(2018,3,27).toString()];
//var disDays = [];

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
    //var dayName = days[date.getDay()];
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
    //var dayName = days[date.getDay()];
    var day = ("0" + (date.getDate() + 1)).slice(-2);
    var monthNum = ("0" + (date.getMonth() + 1)).slice(-2);
    var year = date.getFullYear();
  
    return day + "/"+monthNum+ "/"+year;
  }
  //console.log(formatDate(new Date()));
function disableDays(date) {
    var myDate=formatDate(date),closeDateExists=false,openDateExists=false;
    //console.log('enabled ',enableDays);
    var testD=[$.inArray(myDate.toString(), enableDays) != -1, ''];
    //console.log('datesss',myDate,' in array ',disDays.toString(),'test',testD);
    //console.log('myDate',myDate);
    //console.log('disDays.length',disDays.length);
    //console.log('enableDays.length',enableDays.length);
    if(disDays.length>0)
    {
        //console.log('disable days');
        for (var i = 0; i < disDays.length; i++) {
            
            //console.log('datesss',myDate,' in array ',disDays,'test',testD);
            // Now check if the current date is in disabled dates array. 
            //var convQuotes=disDays.replace('"', '');
            if ($.inArray(myDate, disDays) != -1 ) {
            closeDateExists=true;
            //console.log('datesss',myDate,' in array ',disDays,'test',testD);
            return false;
        }
    }
    }
    if(enableDays.length>0)
    {
        for (var i = 0; i < enableDays.length; i++) {
            //console.log('enable days');
            var enDays=[$.inArray(myDate.toString(), enableDays) != -1, ''];
            //console.log('datesss',myDate,' in array ',enableDays,'test',testD);
            // Now check if the current date is in disabled dates array. 
            //var convQuotes=disDays.replace('"', '');
            if ($.inArray(myDate, enableDays) != -1 ) {
                openDateExists=true;
                //console.log('enable ',myDate,' in array ',enableDays,'test',enDays);
                //console.log('date',[formatEnableDate(date),true]);
                //return [formatEnableDate(date),true];
                //return $.inArray(myDate.toString(), enableDays) != -1;
                var fDateO=formatEnableDate(date);
                //console.log('fDateO',fDateO);
                //console.log('myDate',myDate);
                return true;
                // return {
                //     tooltip: 'This date is enabled',
                //     classes: 'enabled'
                // };
            }
            else
            {
                //console.log('disabling '+date);
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
            //console.log('stTime',stTime);
            //console.log('endTime',endTime);
            ////console.log('date',date);
            return false;
        }
        if(calendarValid==0)
        {
            console.log('date',date);
        }
    }
    //return [$.inArray(date, disDays) != -1, ''];
}
function activateDateCalendar(){
    //console.log('stTime',$('#stTime'),'endTime',$('#endTime').value);
    stTime=new Date($('#stTime')[0].value*1000),endTime= new Date($('#endTime')[0].value*1000);
    var calendarValid= $('#calendarValid')[0].value;
    //console.log(calendarValid,'stTime',stTime,'endTime',endTime);
    console.log('calendarValid',calendarValid);
    //console.log("$('#closedDates')[0].value",$('#closedDates')[0].value);
    if(calendarValid==0)
    {
        var replacedOpened=$('#openedDates')[0].value.replace(/ /g,'');
        var replaceAllResOpened=replacedOpened.replace(/(?:\r\n|\r|\n)/g, '');
        var openDates=JSON.parse(replaceAllResOpened);

    enableDays=openDates;
    $('#datetimepicker12').datepicker({
        inline: true,
        sideBySide: true,
        format: 'DD/MM/YYYY',
        language: 'de',
        beforeShowDay: disableDays
    }).on('changeDate', function (ev) {
        console.log('evssssss',ev.date);
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
        //getPrices(serverDate);
        console.log('my date',serverDate);
        let sendData={
            selDate:serverDate
        };
        let strSD= $.param(sendData);
        let pData={
            step:2,
            pushD:strSD
        };
        navigateMasterData('reservation/'+activeOffer,{manualPushState:'reservation/'+activeOffer,type:"GET",data:pData});
        //$( "#bookingStepb1" ).trigger( "click" );
    });
    }
    else
    {


        var replacedReserverd=$('#closedDates')[0].value.replace(/ /g,'');
        var replaceAllRes=replacedReserverd.replace(/(?:\r\n|\r|\n)/g, '');
        var closedDates=JSON.parse(replaceAllRes);
        
    
    //alert('endTime',endTime);
        var avDays=$('#availableDays')[0].value.replace(/ /g,'');
        console.log('avDays',avDays);
        console.log('closedDates rep',replaceAllRes);
        var allAvDays=avDays.replace(/(?:\r\n|\r|\n)/g, '');
        console.log('allAvDays',allAvDays);
        disDays=closedDates;
        $('#datetimepicker12').datepicker({
            inline: true,
            startDate:stTime,
            endDate:endTime,
            sideBySide: true,
            daysOfWeekDisabled:allAvDays,
            format: 'DD/MM/YYYY',
            language: 'de',
            beforeShowDay: disableDays
        }).on('changeDate', function (ev) {
            var convDate=formatBookingDate(ev.date);
            console.log('convDate',convDate);
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
            //getPrices(serverDate);
            
        console.log('my date',serverDate);
        console.log('starting reservationsssss',convDate,'reservation/'+activeOffer);
        let sendData={
            selDate:serverDate
        };
        let strSD= $.param(sendData);
        let pData={
            step:2,
            pushD:strSD
        };
        navigateMasterData('reservation/'+activeOffer,{manualPushState:'reservation/'+activeOffer,type:"GET",data:pData});
            //$( "#bookingStepb1" ).trigger( "click" );
        });
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
    console.log("config Options",opt);
    var recursiveEncoded = $.param( opt.data );
    if(opt.manualPushState)
    {
        window.history.pushState(null, null, window.location);
        window.history.replaceState(null, null,"/"+opt.manualPushState+"?"+recursiveEncoded);
    }
    console.log('fullUrl',fullUrl);
    //console.log('serivalized',opt.data.serialize());
    console.log('recursiveEncoded',recursiveEncoded);
    //window.history.pushState(null, null, cUrl);
    $.ajax({
        url: fullUrl,
        type: opt.type,
        context: document.body,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        data:opt.data
      }).done(function(r,status,xhr) {
          //console.log('ajax success with data',xhr.getResponseHeader()));
          var url = xhr.getAllResponseHeaders();
          console.log(xhr.getResponseHeader('Link')); 
          console.log('ajax success with data s',url);
          console.log('this',r);
        //document.body=r;
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
        	
        // $('#headData').html(r.headData);
        $( this ).addClass( "done" );
        var substring1 ="categoryType/weekend";
        var substring2 ="categoryType/Tagesausflug";
        var substring3 ="categoryType/Gruppenausflüge";
        console.log('my url',fullUrl);
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
            console.log('setting detector');
        }
        $("html, body").animate({ scrollTop: 0 }, "slow");
      });
}
function setOffer(s){
    //console.log('offerId',s);
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
    alert(curr);
    alert(exch);
    if(currOption.value!=0)
    {

        let singlePriceSelect={
            priceId:pId,
            priceValue:currOption.value,
            totalPrice:aPrice
        }
        let selecP='#price_'+pId;
        console.log('currOption',ev);
        console.log('singlePriceSelect',$(selecP).val());
        //$(selecP).val(currOption.value);
        //$(selecP+' option').removeAttr('selected');
        //$(selecP+' option[value='+currOption.value+']').attr('selected','selected');
        $(selecP+' option').filter(function(item) {
            console.log('item',item);
            if(item==currOption.value)
            {
                $(selecP+' option[value='+currOption.value+']').attr('selected','selected');
            }
            else
            {
                $(selecP+' option[value='+item+']').removeAttr('selected');
            }
          });
        // $(selecP+' option').removeAttr('selected')
        //  .filter('[value='+currOption.value+']')
        //      .attr('selected', true);
        //$(selecP).change();
        //console.log('selected option',ev.target.value);
               //console.log('nItemPrice',nItemPrice);
               //var totalPrice=(Number(nItem)*Number(nItemPrice));
        if(pricesSelected.length>0)
        {
            pricesSelected.forEach((prices,index) => {
                if(prices.priceId==singlePriceSelect.priceId)
                {
                    pricesSelected.splice(index,1);
                    console.log('found at index',index);
                    
                }
                else
                {
                    console.log('not found at index',index);
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
        console.log('exch',exch);
        console.log('curr',curr);
        // if(curr==0)
        // {
        //     $("#bookingTotal").text(totalBill);
        //     let rB=roundUp(totalBill/exch,0);
        //     $("#shiftBookingTotal").text(rB);
        // }
        // else
        // {
        //     $("#bookingTotal").text(totalBill);
        //     let rB=roundUp(totalBill*exch,0);
        //     $("#shiftBookingTotal").text(rB);
        // }
        console.log('pricesSelected',pricesSelected,'totalBill',totalBill);
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
    //console.log('selected option',ev.target.value);
    console.log('singlePriceSelect',singlePriceSelect);
           //console.log('nItemPrice',nItemPrice);
           //var totalPrice=(Number(nItem)*Number(nItemPrice));
           let selecP='#price_'+pId;
           console.log('currOption',ev);
           console.log('singlePriceSelect',$(selecP).val());
           //$(selecP).val(currOption.value);
           //$(selecP+' option').removeAttr('selected');
           //$(selecP+' option[value='+currOption.value+']').attr('selected','selected');
           $(selecP+' option').filter(function(item) {
               console.log('item',item);
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
                console.log('found at index',index);
                
            }
            else
            {
                console.log('not found at index',index);
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
    console.log('exch',exch);
    console.log('curr',curr);

    //console.log('pricesSelected',pricesSelected,'totalBill',totalBill);
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
    console.log('event',e);
    navigateMaster('gruppenanfrage/'+activeOffer+'/'+e.target.value,{});
}
function roundUp(num, precision) {
    precision = Math.pow(10, precision)
    return Math.ceil(num * precision) / precision
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
    console.log('submitDatasubmitDatasubmitDatasubmitDatasubmitData: ',submitData);

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
          //console.log( "Data Saved: " + msg );
        });
}
function getPrices(d){
    var submitData={
        date:d,
        offerId:activeOffer
    };
    //console.log('c data',submitData);

    $.ajax({
        method: "GET",
        url: br+"pricesForDate/"+d+"/"+activeOffer
      })
        .done(function( msg ) {
            $('#bookingTable').html(msg);
          //console.log( "Data Saved: " + msg );
        });
}
$(document).ready(function () {

    $(document).on("change","#step2row input, #mainVaucherFormS1 input, #voucherStep2 input, #bookingVouchers1 input, #bookingVouchers2 input", function(e){
            console.log('changed input');
        var select = $(this);
        select.attr('value',select.val());
    });
    $(document).on("change","#step2row select, #voucherStep2 select", function(e){
        var select = $(this);
            console.log('changed input '+"#"+select+" option",select);
        $("#"+select.context.id+" option").filter(function(item) {
            item++;
            console.log('item',item,select.context.value);
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
            console.log('cost',e);
            if(item==nCo)
            {
                console.log('equal');
                $("#"+select.context.id+' option[cost='+nCo+']').attr('selected','selected');
            }
            else
            {
                console.log('remove');
                $("#"+select.context.id+' option[cost='+item+']').removeAttr('selected');
            }
          });
    });
    // $('.grid').masonry({
    //     // set itemSelector so .grid-sizer is not used in layout
    //     itemSelector: '.grid-item',
    //     // use element for option
    //     columnWidth: '.grid-sizer',
    //     percentPosition: true
    //   });

    //   var $grid = $('.grid').masonry({
    //     itemSelector: '.grid-item',
    //     columnWidth: '.grid-sizer',
    //     percentPosition: true
    //   });
    //   // layout Masonry after each image loads
    //   $grid.imagesLoaded().progress( function() {
    //     $grid.masonry('layout');
    //   });
    // $(document).on("click",".day", function(e){
    //     console.log('clicked');
    //     console.log(e.target);
    //     //     searchFilter();
    //     });
    var offerCalDate =document.getElementById("datetimepicker12");
    // if (offerCalDate){
    // }
    // $(window).resize(function(){
    //     if($(window).width()>768){
    //         $('#gMap1,#inLinks1,#toggle1,#toggle2,#toggle3', document).removeAttr("id");           
    //     }
    //    });

    //     $('#datetimepicker12').datetimepicker({
    //         inline: true,
    //         sideBySide: true
    //     });


    // $(document).on("click","a", function(e){
    //     e.preventDefault();
	// 	var o_a_wh="#pageDynamic";
    //     console.log($(o_a_wh));
    //     var clicked = $(this);
    //     var options = {};
    //     var goTo=clicked.attr('data-cUrl');
    //     var goType=clicked.attr('data-urlType');
    //     $(".navbar-nav").find(".active").removeClass("active");
    //     $(this).parent().addClass("active");
	// 	if(!$(o_a_wh).length)
	// 	{
    //         console.log('afasf');
	// 		//window.location.href=br+goTo;
	// 	}
	// 	else
	// 	{
    //         if(goType)
    //         {
    //             options.gtype=goType;
    //         }
    //         navigateMaster(goTo,options);
	// 		//load_a_cont(br+o_hv+nav_level_c,e_data);
	// 		window.history.pushState(null, null, window.location);
	// 		window.history.replaceState(null, null,"/"+goTo);
	// 	}
    // });
    // $(document).on("click","#masterSearch", function(e){
    //     searchFilter();
    // });
    // $(document).on("change","#offerType", function(e){
    //     var select = $(this);
    //     var newVal = select.val();
    //     offerType=newVal;
    // });
    // $(document).on("change","#offerRegion", function(e){
    //     var select = $(this);
    //     var newVal = select.val();
    //     offerRegion=newVal;
    // });
    // $(document).on("change","#offerDuration", function(e){
    //     var select = $(this);
    //     var newVal = select.val();
    //     offerDuration=newVal;
    // });
    // $(document).on("keyup","#searchUser", function(e){
    //     var select = $(this);
    //     var newVal = select.val();
    //     keyw=newVal;
    // });

});


///get coordinates of the address
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
    //     //     console.log(lat,lng);
    //     // });
    // }
});
