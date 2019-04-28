<title>
<?php
    if(isset($title)){
        //echo "good";
    }

    //$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link = Request::url();

    //var_dump($meta);

    ?>
<?php echo e(isset($title) ? $title : 'MeinWeekend'); ?>

</title>
<meta charset="UTF-8">
<meta name='viewport' content="width=device-width, initial-scale=1">
<meta name=generator content="Laravel 5.6">
<?php $__currentLoopData = $meta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($k=='robots') {
        continue;
    }
    ?>
    <meta name="<?php echo e($k); ?>" content="<?php echo e(\App\Helpers\Helpers::clean_text($v)); ?>" />
    <meta property="og:<?php echo e($k); ?>" content="<?php echo e(\App\Helpers\Helpers::clean_text($v)); ?>" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<meta name="type" content='website' />
<meta property="og:type" content='website' />
<meta property="title" content="<?php echo e($title); ?>" />
<meta property="og:title" content="<?php echo e($title); ?>" />
<meta property='image' content='https://www.meinweekend.ch/fileadmin/img/logo.png' />
<meta property='og:image' content='https://www.meinweekend.ch/fileadmin/img/logo.png' />
<meta property="og:url" content="<?php echo e($actual_link); ?>/" />
<link rel="canonical" href="<?php echo e($actual_link); ?>/"/>


<?php

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
?>

