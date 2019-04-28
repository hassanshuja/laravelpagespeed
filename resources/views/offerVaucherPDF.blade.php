{{-- {{dd($data)}} --}}
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Vaucher Pdf</title>
  </head>
<body>
<style>
@font-face {
    font-family: arials;
    src: url('/var/www/meinweekend.ch/html/public/fonts/arialuni.ttf') format('truetype');
}
@font-face {
    font-family: roboto;
    src: url('/var/www/meinweekend.ch/html/public/fonts/Roboto-Regular.ttf') format('truetype');
}
@font-face {
    font-family: arialNarr;
    src: url('/var/www/meinweekend.ch/html/public/fonts/Roboto-Regular.ttf') format('truetype');
}
@font-face {
    font-family: timesnewromanitalicps;
    src: url('/var/www/meinweekend.ch/html/public/fonts/TimesNewRomanPS-ItalicMT.ttf') format('truetype');
}
@font-face {
    font-family: ariali;
    src: url('/var/www/meinweekend.ch/html/public/fonts/OldStandard-Italic.ttf') format('truetype');
}
@font-face {
    font-family: Lato-Light;
    src: url('/var/www/meinweekend.ch/html/public/fonts/Lato-Light.ttf') format('truetype');
}
</style>
    @foreach($data as $d)
    <div class="container-fluid vaucherMain">
        <div class="row">
            <div class="col-12">
                <div class="vaucherMainTop">
                </div>
                    <img class='meinweekend-logo' src="/var/www/meinweekend.ch/html/public/images/_logo-pdf.jpg" width="200px" height="80px">
                    <div class="vaucherData">
                    <span>GUTSCHEIN - NR. {{\Carbon\Carbon::createFromTimeStamp($d->v_cdate)->format('y')}}-{{$d->vid}}-S</span>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">
        <div class="vouchHolder" style="text-align:center;">
            @if(count($images)==1)
            {{-- <div id="onePhoto"  class="">
                <table class="table" style='width:100%'>
                    <tbody>
                        <tr>
                            <td scope="col">
                                <div style="height:200px;overflow:hidden">
                                    <img style="margin-top:-140px;" id='soloImg' class="img-fluid" src="/var/www/meinweekend.ch/html/public/assets/img/{{$images[0]->image}}">    
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            
            <div id="multiplePhoto" class="imagesWarper">
                <table class="table" style='width:100%'>
                    <tbody>
                        <tr>
                            <td scope="col">
                                <div class="soloImgHold">
                                <img id='soloImg' class="img-fluid" src="/var/www/meinweekend.ch/html/public/assets/img/{{$images[0]->image}}">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
            <div id="multiplePhoto" class="imagesWarper">
                <table class="table" style='width:100%'>
                    <tbody>
                        <tr>
                            <td scope="col"><img id='mainImage' class="img-fluid" src="/var/www/meinweekend.ch/html/public/assets/img/{{$images[0]->image}}"></td>
                            <td scope="col"><img id='mainImage' class="img-fluid" src="/var/www/meinweekend.ch/html/public/assets/img/{{$images[1]->image}}"></td>
                            <td scope="col"><img id='mainImage' class="img-fluid" src="/var/www/meinweekend.ch/html/public/assets/img/{{$images[2]->image}}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif
            <div class="voucherInfo">
                <div class="vaucherTop arialsF">
                    <h1 style="font-size:22px;">{{strtoupper($d->offer_title)}}</h1>
                    <h2 id="vouchNameTag" class="vouchNameTag arialsF" style="padding-top:10px;">{{$d->vaucher_for}}</h2>
                </div>
                <p id="voucherDescArea" class="vaucherMessage"> <?php echo str_replace("\n","<br />",$d->vaucher_text); ?></p>
             
                <div class="priceNdate">
                    <div style='border-top:1px solid black; margin-bottom:20px;'></div>
                    @foreach($data as $od)                        
                        <div class="offerInfo1">
                            <div class="offersIncluded1">
                                {!! \App\Helpers\Helpers::clean_text($od->included) !!}
                            </div>
                        </div>
                        <div class="offerInfo2">
                            {!! \App\Helpers\Helpers::clean_text($od->informacion) !!}
                        </div>
                    @endforeach            
                </div>
                <div style='border-top:1px solid black;'></div>
            </div>
        </div>
            </div>
        </div>
    </div>
    <footer class="footer">
            <div class="container">
                    <div class="voucherFooter">
                            @foreach($data as $od)
                            <h6>wir bitten sie um frühzeitig reservation</h6>
                            <p> Swiss Insider GmbH
                            <br> Alpenblickstrasse 19, CH-8340 Hinwil
                            <br> Tel. +41 (0)43 288 06 26 | www.meinweekend.ch</p>
                            <br>
                            <p style="color:#013a89"><b>Die Preisgarantie ist 1 Jahr ab Ausstellungsdatum {{strftime("%d.%m.%Y", strtotime($d->valid_from)) }}.</b><br>
                                Der Gutschein-Wert kann 5 Jahre eingelöst werden. 
                            <br>
                            Der Wert des Gutscheines ist auf allen Angeboten in den Kategorien "Weekend" und "Tagesausflüge" einlösbar.</p>
                            @endforeach
                        </div>
            </div>
          </footer>
@endforeach

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>

@if(count($images)==1)
<style>
div[class*='col-'] {
    padding-right:0;
    padding-left:0;
}
@page { margin: 0 }
html {
}
body {
  margin-bottom:20px;
  color:#444;
}
html,body {
    width: 210mm;
    height: 296mm;
    background: rgb(255,255,255);
	font-style: normal;
	font-family: arialNarr,Arial, Helvetica, sans-serif;
	font-size:14px;
    line-height:17px;
    border: none;
}
.furTit {
    line-height: 26px !important;
    margin-bottom:0px;
     margin-top: 15px;
}
.vaucherMain {
    height:84%;
}
.vaucherMainTop {
  height:20px;
  display: block;
}
h1{ text-align:center; width: 100%; color:#900000; text-transform:uppercase; font-weight:300; font-size:23px; padding-top: 15px;}
.vaucherTitleH{ text-align:center; width: 100%; color:#900000; text-transform:uppercase; font-weight:300; font-size:24px; line-height: 26px;}
h2 { 
    font-size: 34px;
    line-height: 40px;
}
h3 { font-size:17px; line-height:20px; color:#003992; text-transform:uppercase; font-weight:300;  }
@media print {
  html,body, page {
    margin: 0;
    box-shadow: 0;
  }
}

@page { margin: 0 }
.vaucherTop {
    margin: 15px 0 0 0; 
}
.vaucherData{
    color: #900000;
    float: right;
    margin-top: 25px;
    width: 250px;
}
.vaucherData span{
    margin-right:60px;
    width: 100%;
    display: block;
}
.vaucherMessage{
      font-size: 20px;
    font-family: timesnewromanitalicps;
    line-height: 25px;
    min-height: 110px;
    max-height: 350px;
    margin: 0px 12px;
     color: #000;
     font-style: italic;
}
/* html,body{
    height:297mm;
    width:210mm;
} */
/* .vouchHolder{
    height:200mm;
    width:297mm;
} */
/* body{
    margin:0px;
} */

    #mainImage {
  /* height: auto; */
  height: 100% !important;
  max-width: 1000%;
  width: auto;

}

#soloImg{
    width: 100%;
    height: auto;
}
.soloImgHold{
    display: flex;
    height:280px;
    align-items:center;
    justify-content: center; 
    overflow: hidden;
}

.voucherInfo {
margin: 5px 50px 0px 50px;
padding: 0px 10px;
}


.voucherDescArea{
    margin-top:30px;
    margin-bottom:30px;
    font-style: italic;
}
.voucherInfo h5 {
    padding: 10px 10px;
    color: #000;
    font-style: italic;
}

.voucherInfo h4 {
}

.priceNdate {
    white-space: nowrap;
    text-align: left;
    margin-top:10px;
    color:#444;
}

.voucherFooter {
line-height: 0.9;
text-align: center;
width:100%;

}

.voucherFooter h6{
vertical-align: bottom;
text-transform: uppercase;
color: #013a89;
margin: 0px;
     font-weight: bold;
     padding-top:2px;
}

.voucherFooter p {
    line-height: 1.5;
    font-size:11px;
}

.imagesWarper .table {
    table-layout: fixed;
}

.imagesWarper .table td, .allImgs.table td {

    height: 150px;
    padding: 0px;
    overflow: hidden;
}
#mainImage {
    height: auto;
    width: 100%;
}


.offerTitle h6{

font-weight: 600;
}
.priceNdate b{
    color:#000;
}
.offerInfo1 {
    white-space: normal;
    width: 50%;
    display: inline-block;
}

.offerInfo1 h2{
margin:0px;
color: #900000;
}
.offerInfo1 p {
    line-height: 16px;
        font-size: 11px;
        color:#444;
        font-family: arialNarr;
}
.offerInfo2 tr:nth-child(1) td:nth-child(1){
    /* padding: 0px 0px 5px 0px !important; */
}
.offerInfo2 td{
    /* padding: 5px 0px 0px 0px; */
    line-height: 1.2;
    font-size:11px;
        color:#000;
}
.offerInfo2 td:has(> b){
    background:red;
    padding: 5px 0px 0px 0px;
    line-height: 1.2;
    font-size:11px;
        color:#000;
}
.offerInfo2 td:has(p) {
    background-color: #900;
    line-height: 2px;
    font-size:2px;
}
/* .offerInfo2 td:has(b){
    background:red;
    padding: 5px 0px 0px 0px;
    line-height: 1.2;
    font-size:11.5px;
        color:#000;
} */
.offerInfo2 b{
    font-size:11px;
}
.offerInfo2 p{
    font-size:11px;
    margin-bottom:0px;
}
.offerInfo2 br{
}
.offerInfo2 table{
    margin-top:10px;
}
.offerInfo2 table + br{
    display: block;
    margin: 0px;
    line-height: 10px !important;
    font-size: 10px !important;
    content: "";
}
.offerInfo2 {
    width: 50%;
    display: inline-block;
    padding-left: 10px;
    margin-bottom: 10px;
    vertical-align: top;
    margin-left: 15px;
    font-size:11px;
}
.offersIncluded1 h2{
    margin-bottom: 5px;
    font-size: 14px;
    line-height: 15px;
    font-family: arialNarr;
    font-weight: bold;
}
.offersIncluded1{
font-size:11px;
line-height:14px;
display: inline-block;
vertical-align: top;
width:100%;
}
.arialsF {
    font-family: arials;
}
.meinweekend-logo{
    margin-left:60px;
    width:200px;
    float: left;
}

</style>


@else

<style>
        div[class*='col-'] {
            padding-right:0;
            padding-left:0;
        }
        @page { margin: 0 }
        html {
        }
        body {
          margin-bottom:20px;
          color:#444;
        }
        html,body {
            width: 210mm;
            height: 296mm;
            background: rgb(255,255,255);
            font-style: normal;
            font-family: arialNarr,Arial, Helvetica, sans-serif;
            font-size:14px;
            line-height:17px;
            border: none;
        }
        .furTit {
            line-height: 26px !important;
            margin-bottom:0px;
             margin-top: 15px;
        }
        .vaucherMain {
            height:84%;
        }
        .vaucherMainTop {
          height:20px;
          display: block;
        }
        h1{ text-align:center; width: 100%; color:#900000; text-transform:uppercase; font-weight:300; font-size:23px; padding-top: 15px;padding-bottom: 15px;}
        .vaucherTitleH{ text-align:center; width: 100%; color:#900000; text-transform:uppercase; font-weight:300; font-size:24px; line-height: 26px;}
        h2 { 
            font-size: 34px;
            line-height: 40px;
            margin-bottom:20px;
        }
        h3 { font-size:17px; line-height:20px; color:#003992; text-transform:uppercase; font-weight:300;  }
        @media print {
          html,body, page {
            margin: 0;
            box-shadow: 0;
          }
        }
        
        @page { margin: 0 }
        .vaucherTop {
            margin: 15px 0 0 0; 
        }
        .vaucherData{
            color: #900000;
            float: right;
            margin-top: 25px;
            width: 250px;
        }
        .vaucherData span{
            margin-right:60px;
            width: 100%;
            display: block;
        }
        .vaucherMessage{
              font-size: 20px;
            font-family: timesnewromanitalicps;
            line-height: 25px;
            min-height: 120px;
            max-height: 350px;
            margin: 0px 12px;
             color: #000;
             font-style: italic;
        }
        /* html,body{
            height:297mm;
            width:210mm;
        } */
        /* .vouchHolder{
            height:200mm;
            width:297mm;
        } */
        /* body{
            margin:0px;
        } */
        
            #mainImage {
          /* height: auto; */
          height: 100% !important;
          max-width: 1000%;
          width: auto;
        
        }
        
        #soloImg{
            width: 100%;
            height: auto;
            max-height: 1000%; 
        }
        
        
        .voucherInfo {
        margin: 5px 50px 0px 50px;
        padding: 0px 10px;
        }
        
        
        .voucherDescArea{
            margin-top:30px;
            margin-bottom:30px;
            font-style: italic;
        }
        .voucherInfo h5 {
            padding: 10px 10px;
            color: #000;
            font-style: italic;
        }
        
        .voucherInfo h4 {
        }
        
        .priceNdate {
            white-space: nowrap;
            text-align: left;
            margin-top:40px;
            padding: 10px 0px;
            color:#444;
        }
        
        .voucherFooter {
        line-height: 0.9;
        text-align: center;
        width:100%;
        
        }
        
        .voucherFooter h6{
        vertical-align: bottom;
        text-transform: uppercase;
        color: #013a89;
        margin: 0px;
             font-weight: bold;
             padding-top:2px;
        }
        
        .voucherFooter p {
            line-height: 1.5;
            font-size:11px;
        }
        
        .imagesWarper .table {
            table-layout: fixed;
        }
        
        .imagesWarper .table td, .allImgs.table td {
        
            height: 150px;
            padding: 0px;
            overflow: hidden;
        }
        #mainImage {
            height: auto;
            width: 100%;
        }
        
        
        .offerTitle h6{
        
        font-weight: 600;
        }
        .priceNdate b{
            color:#000;
        }
        .offerInfo1 {
            white-space: normal;
            width: 50%;
            display: inline-block;
        }
        
        .offerInfo1 h2{
        margin:0px;
        color: #900000;
        }
        .offerInfo1 p {
            line-height: 16px;
                font-size: 11px;
                color:#444;
                font-family: arialNarr;
        }
        .offerInfo2 tr:nth-child(1) td:nth-child(1){
            /* padding: 0px 0px 5px 0px !important; */
        }
        .offerInfo2 td{
            /* padding: 5px 0px 0px 0px; */
            line-height: 1.2;
            font-size:11px;
                color:#000;
        }
        .offerInfo2 td:has(> b){
            background:red;
            padding: 5px 0px 0px 0px;
            line-height: 1.2;
            font-size:11px;
                color:#000;
        }
        .offerInfo2 td:has(p) {
            background-color: #900;
            line-height: 2px;
            font-size:2px;
        }
        /* .offerInfo2 td:has(b){
            background:red;
            padding: 5px 0px 0px 0px;
            line-height: 1.2;
            font-size:11.5px;
                color:#000;
        } */
        .offerInfo2 b{
            font-size:11px;
        }
        .offerInfo2 p{
            font-size:11px;
            margin-bottom:0px;
        }
        .offerInfo2 br{
        }
        .offerInfo2 table{
            margin-top:10px;
        }
        .offerInfo2 table + br{
            display: block;
            margin: 0px;
            line-height: 10px !important;
            font-size: 10px !important;
            content: "";
        }
        .offerInfo2 {
            width: 50%;
            display: inline-block;
            padding-left: 10px;
            margin-bottom: 10px;
            vertical-align: top;
            margin-left: 15px;
            font-size:11px;
        }
        .offersIncluded1 h2{
            margin-bottom: 5px;
            font-size: 14px;
            line-height: 15px;
            font-family: arialNarr;
            font-weight: bold;
        }
        .offersIncluded1{
        font-size:11px;
        line-height:14px;
        display: inline-block;
        vertical-align: top;
        width:100%;
        }
        .arialsF {
            font-family: arials;
        }
        .meinweekend-logo{
            margin-left:60px;
            width:200px;
            float: left;
        }
        
        </style>
        </style>
@endif