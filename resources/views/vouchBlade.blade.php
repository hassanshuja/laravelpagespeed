<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
	<?php
		
		if(!empty($_SERVER) &&  ((isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] == "103.88.54.250") || ($_SERVER['REMOTE_ADDR'] == "192.168.1.12"))) {
			//echo "<pre>";
			//print_r($data);die;
		}
			
	?>
  
        <style>
@font-face{font-family:arials;src:url(/var/www/meinweekend.ch/html/public/fonts/arialuni.ttf) format('truetype')}@font-face{font-family:ariali;src:url(/var/www/meinweekend.ch/html/public/fonts/ariali.ttf) format('truetype')}@font-face{font-family:Lato-Light;src:url(/var/www/meinweekend.ch/html/public/fonts/Lato-Light.ttf) format('truetype')}@font-face{font-family:timesnewromanitalicps;src:url(/var/www/meinweekend.ch/html/public/fonts/TimesNewRomanPS-ItalicMT.ttf) format('truetype')}
            </style>
      @foreach($data as $d)
        <div class="vouchHolder" style="text-align:center;">
            <div class="voucherHeader">
                <div class="voucherHeaderLogo">
                    <img  width="200px" height='80px' src="/var/www/meinweekend.ch/html/public/images/_logo-pdf.jpg">
                </div>
                <div class="voucherHeaderContext">
                  <p style="color:#910b0b;font-size:16px;margin-right:30px">GUTSCHEIN - NR.{{\Carbon\Carbon::createFromTimeStamp($d->v_cdate)->format('y')}}-{{$d->vid}}-W</p> 
                </div>
            </div>
            <img id='mainImage' class="img-fluid" src="/var/www/meinweekend.ch/html/public/assets/voucher/{{$d->image}}">
            <div class="voucherInfo">
                <h4 id="vouchNameTag">Für<br/>{{$d->vaucher_for}}</h4>
                <h5 id="voucherDescArea"  class="vaucherMessage"><?php echo str_replace("\n","<br />",$d->vaucher_text); ?></h5>
                <div class="priceNdateOuter">
              
                <div class="priceNdate" style='border-top:1px solid #50617b;border-bottom:1px solid #50617b;margin-top:14px;'>
                    <div style='height:34px;margin-top:5px;position: relative;' >
                        <h6 style="float:left;color:#1e2228;">Wert:<span id="vouchPrice" style='color:#910b0b'> CHF {{$d->total_price}}</span></h6><h6 style="float:right;">Gültig ab: <span id="vouchDate" style='color:#910b0b'> <?php echo date("d.m.Y",strtotime($d->valid_from))?></span></h6>
                    </div>
                </div>
                <div class="priceNdate">

                </div>
                
                </div>
            </div>
            <div class="voucherFooter">
                <h6><b> wir bitten sie um frühzeitig reservation</b></h6>
                <p> Swiss Insider GmbH
                <br> Alpenblickstrasse 19, CH-8340 Hinwil
                <br> Tel. +41 (0)43 288 06 26 | www.meinweekend.ch</p>
                <br>
                <p style="color:#1551de"><b>Der Gutschein-Wert kann im Wert 5 Jahre eingelöst werden ab Ausstellungsdatum <?php echo date("d.m.Y",strtotime($d->valid_from))?>.</b>
                <br>Der Wert des Gutscheines ist auf allen Angeboten in den Kategorien "Weekend" und "Tagesausflüge" einlösbar.</p>
            </div>
        </div>
@endforeach

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>

<style>
div[class*=col-]{padding-right:0;padding-left:0}@page{margin:0}body{margin-bottom:20px}@media print{body,html,page{margin:0;box-shadow:0}}@page{margin:0}body,html{width:210mm;height:296mm;background:#fff;font-style:normal;font-family:Arials,Helvetica;font-size:14px;line-height:17px}.vaucherTop{margin:30px 0 0}#mainImage{height:auto;width:110%}.voucherHeader{display:table;table-layout:fixed;width:100%;padding-top:20px}.voucherHeaderLogo{width:300px;text-align:left;display:table-cell;padding-left:30px;height:70px}.voucherHeaderContext{width:100%;text-align:right;display:table-cell;font-size:18px;color:red}.voucherInfo{margin-top:65px}.vaucherMessage{font-size:20px;font-family:timesnewromanitalicps;line-height:25px;min-height:120px;max-height:350px;margin:0 33px;font-style:italic}.priceNdateOuter hr{margin:0}.voucherInfo h5{font-size:21px;padding:25px 40px;color:#000;font-style:italic}.voucherInfo h4{font-size:30px}.priceNdate{padding:16px 0 10px;height:55px;margin:0 30px}.voucherDescArea{margin-bottom:100px}.priceNdate h6{display:inline-block;margin:0;color:#000;font-size:17px;font-weight:500}.priceNdate h6 span{color:red;font-weight:700}.voucherFooter{line-height:.9;text-align:center;width:202mm;position:absolute;left:0;top:250mm;right:0}.voucherFooter h6{text-transform:uppercase;color:#1551de;font-size:15px;margin:0}.voucherFooter p{line-height:1.2;font-size:12px;color:#444}
</style>
