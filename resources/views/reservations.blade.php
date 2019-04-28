
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="/var/www/meinweekend/resources/css/reservations.css"> --}}
    <title>{{$allData[0]->offer_title}}-Vaucher</title>
  </head>
  <body>
      
<style>
    @font-face {
        font-family: arials;
        src: url('/var/www/meinweekend.ch/html/public/fonts/arialuni.ttf') format('truetype');
    }
    
    @font-face {
        font-family: arialNarr;
        src: url('/var/www/meinweekend.ch/html/public/fonts/Roboto-Regular.ttf') format('truetype');
    }
    @font-face {
        font-family: ariali;
        src: url('/var/www/meinweekend.ch/html/public/fonts/ariali.ttf') format('truetype');
    }
    @font-face {
        font-family: Lato-Light;
        src: url('/var/www/meinweekend.ch/html/public/fonts/Lato-Light.ttf') format('truetype');
    }
    </style>
        <table>
                <tr>
                    <td>
                        <div class="table-responsive">
                            <table class="table tablE1">
                                <tbody>
                                    <tr>
                                        <th rowspan="2" style="border:none;"><img src="/var/www/meinweekend.ch/html/public/images/_logo-pdf.jpg" style="max-width: 200px;height:auto; border:none;height: 80px;"></th>
                                        <td class="meinInfo1">
                                            <b><i style="color:#013a89;" > Swiss Insider GmbH</i></b>
                                            <p>Alpenblickstrasse 19 </p>
                                            <p>8340 Hinwil</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="meinInfo2">
                                            <p>Phone 043 288 06 26 </p>
                                            <p>info@meinweekend.ch</p> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <div class="table-responsive">
                            <table class="table tablE2">
                                <tbody>
                                    <tr>
                                        <td class="noPaddingTB">
                                            @foreach($allData as $d)
                                            <p>{{$d->gender == '1' ? "Frau" : "Herr"}}</p>
                                            <p>{{$d->name}}</p>
                                            @if(isset($d->company))
                                                @if($d->company!='')
                                                    <p>{{$d->company}}</p>
                                                @endif
                                            @endif
                                            <p>{{$d->address}}</p>
                                            <p>{{$d->country == 41 ? "CH": ($d->country == 54 ? "DE" : ($d->country == 13 ? "A": ""))}} {{$d->zip}} {{$d->city}}</p>
                                            <br>
                                            <p>Telefon: {{$d->telephone}}</p>
                                            <p>E-mail: {{$d->email}}</p>
                                        </td>
                                    </tr>
                                    <tr><td></td></tr>
                                    <tr>
                                        <td>
                                        </td>                                        
                                        <td class="contactInfo">
                                            Datum {{\Carbon\Carbon::createFromTimeStamp($d->created_at)->format('d.m.Y')}} /kw
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tablE4P1">
                        <h6>Reservations-Bestätigung: {{$d->confirmation_id}}</h6>
                        <br>
                        
                        <p>{{$d->gender == '1' ? "Liebe" : "Lieber"}} {{$d->gender == '1' ? "Frau" : "Herr"}} {{$d->last_name}}</p>
                        <br>
                        <p>{!! \App\Helpers\Helpers::clean_text($d->confirmation_intro) !!}</p>
                    </td>
                </tr>
                <tr>
                    <td class="tablE4">
                        <h5 class="resCapt">{{strtoupper($d->offer_title)}}</h5>
                        <br>
                        {!!$d->confirmation_table!!}
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <table class="tServices">
                            <tr>
                                <td class="tablE5">
                                    <div>
                                        {{-- @if($d->created_at <= 1527536990)
                                            {!!nl2br($d->confirmation_services)!!}
                                        @else
                                            {!!$d->confirmation_services!!}
                                        @endif --}}
                                        {{-- @if($d->created_at <= 1527536990)
                                            {!!nl2br($d->confirmation_services)!!}
                                        @else
                                            {!!$d->confirmation_services!!}
                                        @endif --}}
                                        {!!$d->confirmation_services!!}
                                    </div>
                                </td>
                                <td class="tablE6" style='vertical-align:top'>
                                    <div class="confCondWarp">
                                        @if($d->created_at <= 1527536990)
                                            {!! \App\Helpers\Helpers::clean_text($d->confirmation_conditions) !!}
                                        @else
                                            {!!nl2br($d->confirmation_conditions)!!}
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
            @endforeach


                <tr>
                    <td>
                        <div class="table-responsive">
                            <table class="table tablE7">
                                <tbody>
                                    <tr>
                                        <td>
                                            Wir wünschen Ihnen bereits heute einen wunderschönen Aufenthalt.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mit den besten Grüssen
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Swiss Insider GmbH, Hinwil
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
@if($d->crdate <1527536990)
<style>
        .tablE5 p {

        /* display:inline-block; */

        margin-bottom: 0px;
        line-height: 15px;
        font-size: 11px;
        margin-bottom: 10px;
        }
        .tablE5 table p {
            margin-bottom: 0px;
        }
        .tablE5 table {
            margin-bottom: 10px;
        }
</style>
@else
<style>
        .tablE5 p {
        display:block;
        margin-bottom: 0px;
        line-height: 15px;
        color: black;
        font-size: 11px;
        margin-bottom: 0px;
        }
</style>
@endif
<style>
    /* .tablE6 b ~ br{
        display: block;
        line-height: 12px;
        height: 10px;
        font-size: 10px;
        content: "";
    } */
    /* p,b {
        display: inline-block;
    } */
    @media print {
  html,body, page {
    margin: 0;
    padding: 0;
    box-shadow: 0;
  }
}

@page { margin: 0;padding:0; }
    div[class*='col-'] {
        padding-right:0;
        padding-left:0;
    }
html {
}
body b{
    color:#000;
}
body {
 
  padding-left:65px;
  padding-right:10px;
  padding-top:50px;
  padding-bottom:50px;
}
html,body {
    width: 195mm;
    height: 296mm;
    background: rgb(255,255,255);
    font-style: normal;
    font-family: arialNarr;
	font-size:14px;
    line-height:12px;
    color:#444;
}

.tablE5 table tr td{
    padding:0px;
}
.table5 table {
    font-size:11px;
}

.bill-orderlist{
    width:100% !important;
}
.table-responsive {
    overflow-x:visible;
}
.bHolder{
    position: absolute;
    top: 271mm;
    left: 45px;
    width: 179mm;
    font-size:12px;
    display:table;
    line-height:11px;
}
.bHolder p{
    font-size:9px;
    color: #626262;
}
.mInfo{
    display: table-cell;
    width:66%;
    vertical-align: top;
}
.preLastColD{
    display: table-cell;
    width:11%;
    vertical-align: top;
}
.lastColD{
    display: table-cell;
    width:23%;
    vertical-align: top;
}
.mInfoT{
    color: #626262;
    font-size: 11px;
    font-weight: bold;
    line-height: 16px;
}
.mInfo p{
    color:#626262;
    font-size:9px;
    margin-bottom:0px; 
}
.sInfo{
    color:#626262;
    font-size:11px;
}
.tServices {
    margin-top: 30px;
    vertical-align: top;
    font-size:11px;
}
.preLastColD p{
}
.lastColD p{
}

.confCondWarp {
    width:100%;
    padding: 15px 20px;
    background-color: #eeeeee;
    /* margin-top:20px; */
    font-size:11px;
    vertical-align: top;
     line-height: 15px;
    
}
.confCondWarp br{
    content:'';
    display: block;
}
/* .confCondWarp b:first-child{
    display: block;
    margin-top: 0px !important;
} */
/* .confCondWarp b{
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
} */
.confCondWarp p {

line-height: 15px;
vertical-align: top;
text-align:top;
}


.tablE5 p:nth-child(2) {

margin-bottom: 10px;
}

.tablE5 p:nth-child(7) {

margin-bottom: 20px;
}
.tablE5 h2{
    font-size: 11px;
    color: #013a89;
    font-weight: bold;
    margin-bottom: 0px;
    display: block;
    line-height: 20px;
}

.tablE5 {
    width: 55% !important;
     vertical-align: top;
     line-height:15px; 
}
.tablE5 br {
    line-height: 12px !important;
}
.tablE5 table{
    width: 100% !important;
}




.tablE5 td,.tablE7 td{
        border: 1px;
}
    .tablE7{
      font-size: 11px;
        margin-top: 20px;
        line-height: 25px;
    }
    .tablE7 td {
        padding:0px;
    }
    .vouchFfoter {
        font-size:12px;
    }
    .vouchFfoter p{
        font-size:9px;
        color: #626262;
    }
    
    .noBorder {

        border: none !important;
    }

    table {
        width: 100%;
    }
    .table td{
        padding:0;
    }

    .noPaddingTB {
        font-size:11px;
        padding-top: 0px !important;
        padding-bottom: 0!important;
    }
    .noPaddingTB p {
        margin:0px;
        line-height: 15px;
        display: block;
    }
    .tablE2 {
        margin-top:35px;
        font-size:11px;
    }
    .tablE2 td{
        padding-top:20px !important;
    }
    .tablE3 {
        margin-top:0px;
    }
    .tablE1 th {
        padding:0px;
    }
    .tablE1 td, .tablE2 td, .tablE3 td,.tablE5 td,.tablE7 td{
        
        border: none;
        }
    .tableE2{
        font-size:12px;
    }
    .tablE3 td{

        padding: 0;
        }

    .tablE3 p{

        color:black;
        font-size: 1rem;
        }
        .tablE4P1 h6{
            font-size:13px;
            font-weight: 500;
            font-family: arials;
        }
        .tablE4P1 p{
            display: block;
            margin-bottom: 0px;
            font-size: 11px;
        }
        .tablE4 tr th, .tablE4 tr td {
            padding-top: 6px;
            vertical-align: middle;
        }
        .tablE4 tr:last-child td {
            border-bottom:1px solid #74acd2;
            padding-top: 6px;
        }
        .tablE4 td:last-child {
            text-align: right;
        }
        .tablE4 tfoot tr td {
            border-bottom:none;
            color: #013a89;
        }
        .tablE4 tfoot tr td b{
            color: #013a89;
        }
        .tablE4 tr th {
            font-size:11px;
            color: #013a89;
        }

        .tablE4 tfoot tr td {
            line-height: 21px;
            color: #013a89;
            font-size:11px;
        }
        .tablE4 tfoot tr:last-child td {
            border-bottom:none !important;
        }
        .tablE4 tbody tr:nth-child(-n+1) {

        /* border-bottom: 1px solid #013a89; */
        }
    .tablE5 p:empty {
        line-height: 5px;
    }
        .tablE4 tbody tr:last-child {
            /* border-top: 1px solid #013a89; */
            font-size: 11px;
            line-height: 15px;
            padding-top:10px;
        }
        .tablE5 b {
        line-height: 20px;
        }
         .tablE6 p{
        vertical-align: top;
        font-family: arialNarr;
        font-size: 11px;
        /* margin-bottom: 0px; */
        }

        .table6{
            width:100%;
            vertical-align: top;
            
        }
        .tablE5 p:nth-child(7) {

        margin-bottom: 20px;
        }

       

        .meinInfo1 {
            font-size:10px;
            color: #013a89 !important;
            text-align: right;
            padding-bottom:10px !important;
        }
        .meinInfo1 b {
            letter-spacing: 1px;
     min-width: 100%;
        }
        .meinInfo1 p {
            font-size:11px;
            line-height: 14px;
            margin-bottom: 0px;
            display: block;
        }
        .meinInfo2 {
            font-size:11px;
        color: #666;
        text-align: right
        }
        .meinInfo2 p {
            font-size:11px;
            line-height: 14px;
            margin-bottom: 0px;
            display: block;
        }
        .contactInfo {
            font-size:11px;
            text-align: right;
        }

        .resCode b{

        font-size: 12px;
        color: #626262 !important;

        }
        .vaucherTable {
          margin-top: 30px;
          line-height: 18px;
        }
        .vaucherTable th{
          line-height: 24px;
        }
        .resCapt {

        color: #013a89;
        font-size: 13px;
        }

        .resTr1 td{
        color: #013a89;
        border-top:none;
        }

        .resTr1 td,.resTr2 td,.resTr3 td {

        border-color: #013a89;
        }

        .resTr3{ 

        color: #013a89;
        }

        .resBackG {

        background: #eeeeee;
        width: 50%;

        }

        .tablE4 {
            font-size: 11px;
            padding-top: 25px;
        }

        .th-item{
            border-bottom:1px solid #093bcc; 
            color:#013a89;
        }

        .table-head{
            font-weight:bold;
        }
</style>
