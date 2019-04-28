<?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('navoverview3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
<?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid agbMax">
 

  <div class='content-404'>
        <h1 class='error'>404</h1>
        <br><br>
        <span class='headText'>Die gesuchte Seite kann nicht angezeigt werden </span>
        <br>
        <p class='404-p'>
            Diese URL wurde aktualisiert und neu benannt.
            <br>
            Bitte geben Sie <a href="/"> www.meinweekend.ch  </a> ein. <br>
            <br>
            Herzlichen Dank <br>
            Ihr Team. <br>
            <a href="/"> www.meinweekend.ch</a>
        </p>
    
  </div>
    
</div>
<style>

.content-404{
   /*margin-left:50px;
    margin-top:50px;
    margin-bottom:200px;*/
    max-width: 420px;
    margin: 4em auto;

}
.headText{
    color:navy;
    font-size:18.04px;
    font-family:'Roboto Condensed',sans-serif;
    color:#013a89;
}

.error{
    color:red;
}
.404-p {
    color:#626262;
    font-size:18px;
   
}

.footerPart {
    margin-top: 30px;
}
</style>
