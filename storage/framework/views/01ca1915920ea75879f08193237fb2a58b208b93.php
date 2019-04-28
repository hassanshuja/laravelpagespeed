 
<style>
    .dDownsHide {

display: none;
}
.titleNinfo h1 {
    color: #013a89;
    text-decoration: none;
    font-family: 'Roboto Condensed',sans-serif;
    font-size: 18px;
    line-height: 120%;
}
.offerPrice h5{
    font-size: 16.002px;
    color: #013a89;
    font-style: italic;
    
}
.subMainCatWarp h6{
    margin: 0;
    padding-right: 10px;
    padding-left: 10px;
    border-right: 1px solid #8694a9;
    
}
.titleNinfo-test-1{
    color: #013a89;
    text-decoration: none;
    font-family: 'Roboto Condensed',sans-serif;
    font-size: 18px;
    line-height: 120%;
}
    .cardOffer h2 {
        color: #013a89;
        text-decoration: none;
        font-family: 'Roboto Condensed',sans-serif;
        font-size: 18px;
        line-height: 120%;
    }
</style>
    <div class="container-fluid">
        <?php echo $__env->make('navoverview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="container-fluid container1">
        <div class="row titleH">
            <div class="col-12 titleCol">
                <h1><?php echo e($redText); ?> </h1>
            </div>
        </div>
        <?php $__currentLoopData = $data['offerData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
        <div class="row cardOffer">
            <div class="col-12 col-sm-5 col-md-5 cardOfferNoWrap">
                
                <div class="cardImg">
                <a href="<?php echo e(url('ausflug/'.$od->title_link)); ?>/" title="<?php echo e($od->title); ?>/"><img class="img-fluid" src="<?php echo e(url('assets/img'.$od->image)); ?>" title="meinweekend" alt="<?php echo e($od->title); ?>" width="700" height="295" /></a>          
                </div>
                <div class="offerDays">
                    <div class="dayz">
                    <span style = "background-color: #e8e7ec;"><?php echo $od->day; ?> <br> <?php echo e($od->day>1?"Tage":"Tag"); ?></span>
                    </div>
                    <div class="nightz">
                    <span><?php echo $od->night; ?> <br><?php echo e($od->night>1?"Nächte":"Nacht"); ?></span>    
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-sm-7 col-md-7 cardRight">
                <a href="<?php echo e(url('ausflug/'.$od->title_link)); ?>/" title="<?php echo e($od->title); ?>">
                    <h2><?php echo $od->title; ?>

                            
                        </h2>
                    </a>
                    <p><?php echo \App\Helpers\Helpers::clean_text(strip_tags($od->list_subtitle)); ?></p>  
                    <div class="offerPerson" style = "margin-top:10px;">
                        <h5><?php echo strip_tags($od->list_status!='' ? $od->list_status : $od->address); ?></h5>
                        <br>
                    <?php if($od->hasspeciallistsettings==1): ?>
                        <p>ab <?php echo $od->special_list_min_persons; ?> <?php echo e($od->special_list_min_persons>1 ? 'Personen': 'Person'); ?></p>
                        
                    <?php else: ?>
                        <p>ab <?php echo $od->min_persons; ?> <?php echo e($od->min_persons>1 ? 'Personen': 'Person'); ?></p>

                    <?php endif; ?>
                    </div>
                    <div class="offerPrice" style = "margin-top:10px;">
                        <?php if($od->hasspeciallistsettings==1): ?>
                        <?php if($od->special_list_currency==0): ?>
                            <h5>ab CHF <?php echo e(floor($od->special_list_price)); ?></h5>
                            
                            <p class="offerPriceP1"> EUR <?php echo e(floor($od->special_list_price/$data['exchange'])); ?>*
                            <br>
                                Pro <?php echo e($od->personType); ?>

                            <br>
                            * Richtwert</p>
                        <?php endif; ?>    
                        <?php if($od->special_list_currency==1): ?>
                            <h5>ab EUR <?php echo e(floor($od->special_list_price)); ?></h5>
                        
                            
                            <p class="offerPriceP1"> CHF <?php echo e(floor($od->special_list_price*$data['exchange'])); ?>*<br>
                            Pro <?php echo e($od->personType); ?>

                            <br>
                            * Richtwert</p>
                        <?php endif; ?>
                           
                        <?php else: ?>
                            
                        <?php $__currentLoopData = $od->prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <?php if($p->currency==0): ?>
                                    
                                    <h5>ab CHF <?php echo e($p->adult_price); ?></h5>
                                    <p class="offerPriceP1">EUR <?php echo e(floor($p->adult_price/$data['exchange'])); ?>* <br>
                                    Pro <?php echo e($od->personType); ?>

                                    <br>* Richtwert</p>
                                <?php endif; ?>
                                <?php if($p->currency==1): ?>
                                    <h5>ab EUR <?php echo e($p->adult_price); ?></h5> 
                                    <p class="offerPriceP1">CHF <?php echo e(floor($p->adult_price*$data['exchange'])); ?>*<br>
                                
                                    <br>Pro <?php echo e($od->personType); ?>

                                    <br>* Richtwert</p>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                
                <a class="btn btn-secondary" href="<?php echo e(url('ausflug/'.$od->title_link)); ?>/"  title="<?php echo e($od->title_link); ?>">Mehr Infos</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 catFooter1">
                <?php echo \App\Helpers\Helpers::clean_text(str_replace('h1', 'h2',$cat_seo[0])); ?>

            </div>
            <div class="col-12 col-md-12 col-lg-6 catFooter2">
                <?php if(count($cat_seo)>1): ?>
                    <br>
                    <?php echo \App\Helpers\Helpers::clean_text($cat_seo[1]); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    