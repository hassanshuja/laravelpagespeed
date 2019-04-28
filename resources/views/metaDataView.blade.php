<title>
<?php
    if(isset($title)){
        //echo "good";
    }

    //$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link = Request::url();

    //var_dump($meta);

    ?>
{{$title or 'MeinWeekend'}}
</title>
<meta charset="UTF-8">
<meta name='viewport' content="width=device-width, initial-scale=1">
<meta name=generator content="Laravel 5.6">
@foreach($meta as $k=>$v)
    @php if($k=='robots') {
        continue;
    }
    @endphp
    <meta name="{{$k}}" content="{{\App\Helpers\Helpers::clean_text($v)}}" />
    <meta property="og:{{$k}}" content="{{\App\Helpers\Helpers::clean_text($v)}}" />
@endforeach
<meta name="type" content='website' />
<meta property="og:type" content='website' />
<meta property="title" content="{{ $title }}" />
<meta property="og:title" content="{{$title }}" />
<meta property='image' content='https://www.meinweekend.ch/fileadmin/img/logo.png' />
<meta property='og:image' content='https://www.meinweekend.ch/fileadmin/img/logo.png' />
<meta property="og:url" content="{{$actual_link}}/" />
<link rel="canonical" href="{{$actual_link}}/"/>

{{-- <link rel="incon" href="http://icons.iconarchive.com/icons/wikipedia/flags/128/CH-Switzerland-Flag-icon.png"> --}}
@php

                    //   function get_client_ip() {
                    //         $ipaddress = '';
                    //         if (getenv('HTTP_CLIENT_IP'))
                    //             $ipaddress = getenv('HTTP_CLIENT_IP');
                    //         else if(getenv('HTTP_X_FORWARDED_FOR'))
                    //             $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                    //         else if(getenv('HTTP_X_FORWARDED'))
                    //             $ipaddress = getenv('HTTP_X_FORWARDED');
                    //         else if(getenv('HTTP_FORWARDED_FOR'))
                    //             $ipaddress = getenv('HTTP_FORWARDED_FOR');
                    //         else if(getenv('HTTP_FORWARDED'))
                    //         $ipaddress = getenv('HTTP_FORWARDED');
                    //         else if(getenv('REMOTE_ADDR'))
                    //             $ipaddress = getenv('REMOTE_ADDR');
                    //         else
                    //             $ipaddress = 'UNKNOWN';
                    //         return $ipaddress;
                    //     }
                    //     $myIp=get_client_ip();
    $currentUrl=url()->current();
    // $getCanonical=$_SERVER['REQUEST_URI'];
    // if(substr($getCanonical, -1)!='/')
    // {
    //     //echo "$currentUrl";
    //     if($myIp=="46.99.187.82")
    //     {
    //         echo $_SERVER['REQUEST_URI'];
    //         //$laksdj=url()->full();
    //         //print_r($laksdj);
    //         echo '<link rel=canonical href="'.$currentUrl.'/'.'" />';
    //     }
    // }

     /// Code By ImranPHP Starts Here ////

     $currentUrl;
     $makenoindex = "no";
     $makeNoIndexOnly = false;

     $fullUrl = url()->full();

     if(strpos($currentUrl,'/fuer')!=false) $makenoindex = "yes";

     if(strpos($currentUrl,'/*fuer')!=false) $makenoindex = "yes";

     if( strpos($currentUrl,'/reservation')!=false) $makenoindex = "yes";

     if( strpos($currentUrl,'/kontakt')!=false) $makenoindex = "no";

     if($currentUrl=="https://www.meinweekend.ch/newsletter") $makenoindex = "no";

     if($currentUrl=="https://www.meinweekend.ch/agb") $makenoindex = "no";

     if($currentUrl=="https://www.meinweekend.ch/datenschutz") $makenoindex = "no";

     if($currentUrl=="https://www.meinweekend.ch/kontakt") $makenoindex = "no";

     if($currentUrl=="https://www.meinweekend.ch/gruppenausfluege/region/ostschweiz") $makenoindex = "no";

     if($currentUrl=="https://www.meinweekend.ch/mainVaucherReservation") $makenoindex = "yes";

     if( strpos($currentUrl,'/mainVaucherReservation')!=false) $makenoindex = "yes";

     if( strpos($currentUrl,'/offerVaucherReservation')!=false) $makenoindex = "yes";

     if( strpos($fullUrl, 'reservation?tx_travel_application') ) $makeNoIndexOnly = true;


     if ($makeNoIndexOnly) {
         echo '<meta name="robots" content="noindex" />';
     }
     else if ($makenoindex=="yes") {
           echo '<meta name="robots" content="noindex, nofollow" />';
     }
      else {
        echo '<meta property="og:robots" content="index,follow">';
        echo '<meta name="robots" content="index,follow"/>';
      }

   // if(strpos($currentUrl,'/fuer')!=false){
     //   echo '<meta name="robots" content="NOINDEX,NOFOLLOW" />';
    //}else{
      //  echo '<meta name="robots" content="index,follow"/>';
    //}
@endphp
{{-- @if(isset($canoical)&&$canoical!='')
    <link rel="canonical" href="{{$canoical}}" />
@endif --}}
