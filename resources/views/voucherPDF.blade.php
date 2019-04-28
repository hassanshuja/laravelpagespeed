{{-- {{dd($data)}} --}}
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/var/www/meinweekend/resources/css/reservations.css"> --}}
    <title>Hello, world!</title>
  </head>
  <body>
    <style>
        @font-face {
            font-family: arials;
            src: url('/var/www/meinweekend.ch/html/public/fonts/arialuni.ttf') format('truetype');
        }
        @font-face {
            font-family: ariali;
            src: url('/var/www/meinweekend.ch/html/public/fonts/ariali.ttf') format('truetype');
        }
        @font-face {
            font-family: Lato-Light;
            src: url('/var/www/meinweekend.ch/html/public/fonts/fonts/Lato-Light.ttf') format('truetype');
        }
        @font-face {
            font-family: timesNewRomanMT;
            src: url('/var/www/meinweekend.ch/html/public/fonts/fonts/timesnewromanps-italicmt.ttf') format('truetype');
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
                                    <b><i> Swiss Insider GmbH</i></b>
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
                                    @foreach($data as $d)
                                    {{$d->gender == '1' ? "Frau" : "Herr"}}
                                    <br>
                                    {{$d->name}}
									<?php
										if(!empty($d->company)){
											echo "<br >".$d->company;
										}
									?>
                                    <br>
                                    {{$d->address}}
                                    <br>
                                    CH-{{$d->zip}} {{$d->city}}
                                    <br><br><br>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td>
                                </td>                                        
                                <td class="contactInfo">
                                    Datum {{\Carbon\Carbon::createFromTimeStamp($d->v_cdate)->format('d.m.Y')}}
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
                            <table class="table tablE3">
                                <tbody>
                                    <tr>
                                        <td class="resCode">
                                            <b>{{$user_payment}} <span>{{$d->vid}}</span><b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </td>
                    </tr>
                    <tr>
                   <td class="tablE4">
                        <h5 class="resCapt">WERTGUTSCHEIN VON MEINWEEKEND.CH</h5>
                        <br>
                            <table class="bill-orderlist" style="width: 99%;box-sizing:border-box;" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr class='header'>
                                        <th width="28%" style='border-bottom:1px solid #4a68ef'>Bestellt von</th>
                                        <th width="28%" style='border-bottom:1px solid #4a68ef'>Auftragsart</th>
                                        <th width="28%" style='border-bottom:1px solid #4a68ef'>Ausgestellt auf</th>
                                        <th width="5%" style='border-bottom:1px solid #4a68ef;text-align:right;'></th>
                                        <th width="11%" style='border-bottom:1px solid #4a68ef;text-align:right;'>Betrag</th>
                                    </tr>
                                    <tr rowspan="2">
                                        <td style='padding-top:10px'>{{$d->name}}</td>
                                        <td style='padding-top:10px'> Gutschein {{\Carbon\Carbon::createFromTimeStamp($d->v_cdate)->format('y')}}-{{$d->vid}}-W</td>
                                        <td style='padding-top:10px'>{{$d->vaucher_for}}</td>
                                        <td style='padding-top:10px;text-align:right;'>CHF</td>
                                        <td style='padding-top:10px;text-align:right;'>{{$d->total_price}}</td>
                                    </tr> 
                                    <tr>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Total Rechnungsbetrag</b></td>
                                        <td style='text-align:right;'><b>CHF</b></td>
                                        <td style='text-align:right;'><b><span>{{$d->total_price}}</span></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
       </table>
            @endforeach
        <table>
                <tr>
                    <td>
                        <div class="table-responsive">
                            <table class="table tablE7" style="line-height:13px;">
                                <tbody>
                                    <tr>
                                        <td>
                                            Wir wünschen Ihnen viel Vergnügen bei Ihrer Überraschung.
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
                <div class="bHolder">
                        <div class="mInfo">
                            <span class="mInfoT">Zahlungsinformationen</span>
                            <p> <span class="sInfo">Der Betrag ist innert 10 Tagen fällig.</span></p>
                            <p>Inkl. Mehrwertsteuer Nr. CHE-114.527.627 MWST</p>
                            <p>Gutscheine sind erst zum Zeitpunkt der Einlösung zu versteuern.</p>
                        </div>
                        <div class="col-2 preLastColD">
                                <p><b>Bank
                                <br>Kontoinhaber
                                <br>Postkonto-Nr.
                                <br>IBAN
                                <br>BIC</b></p>
                                
                        </div>
                        <div class="col-3 lastColD">
                            <p>PostFinance, 3030 Bern
                            <br>Swiss Insider GmbH | 8340 Hinwil
                            <br>85-305736-8
                            <br>CH52 0900 0000 8530 5736 8
                            <br>POFICHBEXXX</p>
                        </div>
                    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<style>
    @media print {
  html,body {
    margin: 0;
    padding: 0;
    box-shadow: 0;
  }
}

@page {
    margin: 0;
    padding:0;
}
    div[class*='col-'] {
        padding-right:0;
        padding-left:0;
    }
html {
}
body {
  padding:50px 20px 20px 80px;
  color: #444;
}
html,body {
    width: 195mm;
    height: 296mm;
    background: rgb(255,255,255);
	font-style: normal;
	font-family: Arials, Helvetica;
	font-size:14px;
        line-height: 15px;
}
    .tablE7{
        font-size: 11px;
        margin-top: 70px;
        line-height: 25px;
    }
    .tablE7 td {
        padding:0px;
    }
    .vouchFfoter {
        top:410mm;
        position:absolute;
    }
    .vouchFfoter p{

        color: #626262;
    }
    .vouchFfoter span{

        color: #626262;
    }
    .noBorder {

        border: none !important;
    }


.bHolder{

      position: absolute;
    top: 268mm;
    left: 80px;
    width: 169mm;
    font-size: 12px;
    display: table;
    line-height: 11px;
}
    .bHolder p{
        font-size:9px;
        color: #626262;
    }
    .mInfo{
        display: table-cell;
        width:66%;
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
.tablE4 tfoot tr td {
    line-height: 21px;
    color: #013a89;
    font-size: 11px;
}
.tablE4 tbody tr:last-child {
            /* border-top: 1px solid #013a89; */
            border-top:1px solid #4a68ef;
            line-height: 21px;
    color: #013a89;
    font-size: 11px;
        }
    .preLastColD{
        display: table-cell;
        width:11%;
    }
    .lastColD{
        display: table-cell;
        width:23%;
    }
    table {
        width: 100%;
       
    }
    .meinInfo1 b {
    letter-spacing: 1px;
    min-width: 100%;
}
    .noPaddingTB {
        font-size:11px;
        padding-top: 0px !important;
        padding-bottom: 0!important;
        }

        .tablE1 th {
            padding:0px;
        }
        .tablE1 td, .tablE2 td, .tablE3 td,.tablE5 td,.tablE6 td,.tablE7 td{
            
            border: none;
            }
        .tablE2 {
            margin-top:35px;
        }
        .tablE2 td{
            padding-top:20px !important;
     line-height: 15px;
    padding-left: 0px;
        }
        .tablE3 td{
            padding: 0;
        }

        .tablE3 p{
            color:black;
            font-size: 1rem;
        }
        .tablE4 tr th {
            font-size:11px;
            color: #013a89;
        }
        .tablE4 tr td {
            font-size:11px;
            padding:5px 0px;
        }
        .tablE4 tfoot tr td {
            color: #013a89;
            font-size:11px;
        }

        /* .tablE4 tbody tr:nth-child(-n+1) {
            border-bottom: 1px solid #013a89;
            font-size:11px;
        } */
            
        /* .tablE4 tbody tr:last-child {
            border-top: 1px solid #013a89;
            font-size: 11px;
            line-height: 23px;
        } */
        .bill-orderlist{
            font-size:11px;
        }
        .tablE5 p, .tablE6 p{

        display:inline-block;
        color: black;
        font-size: 16px;
        margin-bottom: 0px;
        }

        .tablE5 p:nth-child(2) {

        margin-bottom: 20px;
        }

        .tablE5 p:nth-child(7) {

        margin-bottom: 20px;
        }
        .tablE5 h2{

        font-size: 16px;
        color: #4a68ef;
        }

        .tablE5 {

        margin-top: 40px;
        }

        .tablE6 {

        margin-top: 40px;
        padding: 20px;
        background-color:#d3d3d3;
        }

        .tablE6 p:nth-child(3) {

        margin-bottom: 20px;
        }

        .tablE6 p:nth-child(6) {

        margin-bottom: 20px;
        }

        .tablE6 p:nth-child(8) {

        margin-bottom: 20px;
        }

        .meinInfo1 {
            font-size:11px;
            color: #013a89 !important;
            text-align: right;
            padding-bottom:10px !important;
        }
        .meinInfo1 p {
            font-size:11px;
            line-height: 14px;
            margin-bottom: 0px;
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
        }

        .contactInfo {
            font-size:11px;  
            text-align: right;
        }

        .resCode b{

        font-size: 12px;
        color: #626262 !important;

        }

        .resCapt {

        color: #4a68ef;
        font-size: 13px;
        }

        .resTr1 td{
        color: #4a68ef;
        border-top:none;
        }

        .resTr1 td,.resTr2 td,.resTr3 td {

        border-color: #4a68ef;
        }

        .resTr3{ 

        color: #4a68ef;
        }

        .resBackG {

        background: #eeeeee;
        width: 50%;

        }

        .tablE4 {

        padding-top: 25px;
        padding-bottom: 15px;
}


</style>
