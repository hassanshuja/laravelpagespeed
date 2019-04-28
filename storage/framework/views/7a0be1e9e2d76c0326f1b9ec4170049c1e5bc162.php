
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"name": "Meinweekend corporation",
"url": "https://www.meinweekend.ch",
"sameAs": [
"https://www.facebook.com/MeinWeekend/"
],
"contactPoint": {
"@type": "ContactPoint",
"url": "+41 (0) 43 288 06 26",
"contactType": "Customer service"
},
"logo": "https://www.meinweekend.ch/images/_logo-pdf.jpg"
}


</script>

<div id="homeindicator"></div>

<div class="container-fluid slFiHeight">
    <div class="row slFiHeight">
        <div class="col-12 carWarp nopadding slFiHeight">
            <div id="carouselExampleSlidesOnly" class="carousel slide slFiHeight" data-ride="carousel">
                <div class="carousel-inner slFiHeight">
                    <div class="carousel-item flexPushC active slFiHeight">
                        <img class="img-fluid slImg slFiHeight" src="<?php echo e(url('assets/images/header/slider.jpg')); ?>"
                             title="Ein unvergessliches Erlebnis" alt="Ein unvergessliches Erlebnis">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Ein<br>unvergessliches<br>Erlebnis</h1>
                            <p>MeinWeekend</p>
                        </div>
                    </div>
                    <div class="carousel-item flexPushC slFiHeight">
                        <img class="img-fluid slImg slFiHeight"
                             src="<?php echo e(url('assets/img/FloraAlpina/0417e_Sonnenuntergang.jpg')); ?>"
                             title="Etwas für die Seele" alt="Etwas für die Seele">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Etwas<br>für die Seele</h2>
                            <p>MeinWeekend</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mainCont">
    <?php echo $__env->make('navoverview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="container-fluid mobileMassonaryHide">
    <?php
        $gridCount=1;
        $rowCount=1;
        $rowCreate=0;
        $horizontalSpanB0='col-3';
        $horizontalSpanB1='col-3';
        $horizontalSpanB2='col-6';
        $horizontalSpanB3='col-6';
        $rowLongH='rowLong';
        $rowShortH='rowShort';
        $rowLimitPrew=3;
        $rowLimit=4;
        $rowLimitOriginal=4;
        $seasonDetect=0;
        $catForeachCount=0;
        $pushFirstTime=true;
        $pushCreateRow=true;
        $pushEndRow=false;
        $gridExpentencyChanged=false;
        $pushCreateRowGridExp=false;
        $gridExpentency=false;
        $rowType=1;
        $boxNextLayout=20000;
        $boxCheckRun=false;
        $specialSingleRow=false;
        $currentSeason=0;
        $seasonChange=false;
        $seasonConvert=0;
        $seasonCompleted=false;
        $previousSeason=0;
        $nextVarAvailable=false;
        $seasonFinalIndic=false;
    ?>
    
    <?php $__currentLoopData = $data['categoryData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $seasonDetect=$catForeachCount-1;
            if($seasonDetect>-1)
            {
            if($data['categoryData'][$seasonDetect]->category_season==3 || $data['categoryData'][$seasonDetect]->category_season==4)
            {
            $previousSeason=1;
            }
            else {
            $previousSeason=0;
            }
            }
            if($p->category_season==3 || $p->category_season==4)
            {
            $seasonConvert=1;
            }
            else {
            $seasonConvert=0;
            }
            //echo "previousSeason ".$previousSeason.' $seasonConvert '.$seasonConvert;
            if($previousSeason!=$seasonConvert)
            {
            $seasonChange=true;
            $horizontalSpanB0='col-2';
            $horizontalSpanB1='col-2';
            $horizontalSpanB2='col-4';
            $horizontalSpanB3='col-4';

            $rowLongH = "rowLongSecondary";
            $rowShortH = "rowShortSecondary";
            $rowLimitPrew=5;
            $rowLimit=6;
            }
        ?>

        <?php
            $nextBox=$catForeachCount+1;
            $nextBoxS=$nextBox+1;
            $nextBoxT=$nextBoxS+1;
            if($nextBox<count($data['categoryData']))
            {
            $nextVarAvailable=true;
            if($nextBoxS<count($data['categoryData']) && $nextBoxT<count($data['categoryData']))
            {
            $boxCheckRun =true;
            if($data['categoryData'][$nextBox]->box_layout==0 && $data['categoryData'][$nextBoxS]->box_layout==0 && $data['categoryData'][$nextBoxT]->box_layout==0)
            {
            //echo "else";
            $boxNextLayout=20000;
            }
            else {
            if($data['categoryData'][$nextBox])
            {
            $boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
            }
            }
            }
            else {
            if($data['categoryData'][$nextBox])
            {
            $boxNextLayout=20000;
            //$boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
            }
            }
            //print_r(count($data['categoryData']));
            }
            else {
            $boxNextLayout=20000;
            }
            $seasonDetect=$catForeachCount-1;
            if($seasonDetect>0)
            {

            }
            //$boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
            //echo "Box Layout: ".$p->box_layout;

        ?>
        <?php if($seasonChange===true && $seasonCompleted === false): ?>
            <?php
                $seasonChange=false;
                if($rowCreate!=0)
                {
                $pushCreateRowGridExp=true;
                }
                $seasonFinalIndic=true;
            ?>


            <?php if($pushCreateRowGridExp): ?>
                <?php if($rowCreate != $rowLimitOriginal): ?>
                    <?php echo e($rowLimit); ?></div>
<?php endif; ?>
<?php
    //$rowCreate=0;
    //$gridExpentency=false;
?>
<div class=" row seasonChangeIndicator">
</div>
<?php if($p->box_layout==1 || $p->box_layout==3): ?>
    <div class="row <?php echo e($rowLongH); ?>">
        <?php
            $rowType=1;
        ?>
        <?php else: ?>
            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
                <div class="row <?php echo e($rowLongH); ?>">
                    <?php
                        $rowType=1;
                    ?>
                    <?php else: ?>
                        <div class="row <?php echo e($rowShortH); ?>">
                            <?php
                                //echo $boxNextLayout;
                                $rowType=2;
                            ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php
                                $rowCreate=0;
                                $pushCreateRowGridExp=false;
                                $pushCreateRow=false;
                            ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($pushCreateRow===true || $pushFirstTime===true): ?>
                                <?php
                                    $pushFirstTime=false;
                                    $pushCreateRow=false;
                                    $rowCreate=0;
                                ?>
                                <?php if($p->box_layout==1 || $p->box_layout==3): ?>
                                    <div class="row <?php echo e($rowLongH); ?>">
                                        <?php
                                            $rowType=1;
                                        ?>
                                        <?php else: ?>
                                            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
                                                <div class="row <?php echo e($rowLongH); ?>">
                                                    <?php
                                                        $rowType=1;
                                                    ?>
                                                    <?php else: ?>
                                                        <div class="row <?php echo e($rowShortH); ?>">
                                                            <?php
                                                                $rowType=2;
                                                            ?>
                                                            <?php endif; ?>
                                                            <?php endif; ?>
                                                            <?php endif; ?>
                                                            
                                                            <?php if($gridExpentency === true): ?>

                                                                
                                                                <?php
                                                                    //$rowCreate-=1;
                                                                    $gridExpentencyChanged=true;
                                                                    $gridExpentency=false;
                                                                ?>
                                                                <?php if($p->box_layout==0): ?>
                                                                    <div class="boxSize1 boxCollapsed">
                                                                        <div class="masonryWarp">
                                                                            <?php if($p->parent==1): ?>
                                                                                <a href="<?php echo e(url('weekend/'.$p->value_alias)); ?>/"
                                                                                   class="thumbnail"
                                                                                   title="<?php echo e($p->title); ?>">
                                                                                    <img class="img-fluid"
                                                                                         src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                         alt="<?php echo e($p->title); ?>"
                                                                                         title="<?php echo e($p->title); ?>"/>
                                                                                </a>
                                                                            <?php elseif($p->parent==2): ?>
                                                                                <a href="<?php echo e(url('tagesausflug/'.$p->value_alias)); ?>/"
                                                                                   class="thumbnail"
                                                                                   title="<?php echo e($p->title); ?>">
                                                                                    <img class="img-fluid"
                                                                                         src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                         alt="<?php echo e($p->title); ?>"
                                                                                         title="<?php echo e($p->title); ?>"/>
                                                                                </a>
                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(url('gruppenausfluege/'.$p->value_alias)); ?>/"
                                                                                   class="thumbnail"
                                                                                   title="<?php echo e($p->title); ?>">
                                                                                    <img class="img-fluid"
                                                                                         src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                         alt="<?php echo e($p->title); ?>"
                                                                                         title="<?php echo e($p->title); ?>"/>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <div class="titleWarp">
                                                                                <div class="titleCont">
                                                                                    <span class="masonryWarp-test"><?php echo e($p->title); ?> </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                        <?php if($pushCreateRowGridExp): ?>
                                                </div>
                                                <?php
                                                    //$rowCreate=0;
                                                    //$gridExpentency=false;
                                                ?>


                                                <?php if($p->box_layout==1 || $p->box_layout==3): ?>
                                                    <div class="row <?php echo e($rowLongH); ?>">
                                                        <?php
                                                            $rowType=1;
                                                        ?>
                                                        <?php else: ?>
                                                            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
                                                                <div class="row <?php echo e($rowLongH); ?>">
                                                                    <?php
                                                                        $rowType=1;
                                                                    ?>
                                                                    <?php else: ?>
                                                                        <?php
                                                                            $seasonDetect=$catForeachCount+1;
                                                                            if($seasonDetect<count($data['categoryData']))
                                                                            {
                                                                            if($data['categoryData'][$seasonDetect]->category_season==3 || $data['categoryData'][$seasonDetect]->category_season==4)
                                                                            {
                                                                            $previousSeason=1;
                                                                            }
                                                                            else {
                                                                            $previousSeason=0;
                                                                            }
                                                                            }
                                                                            if($p->category_season==3 || $p->category_season==4)
                                                                            {
                                                                            $seasonConvert=1;
                                                                            }
                                                                            else {
                                                                            $seasonConvert=0;
                                                                            }
                                                                            //echo "previousSeason ".$previousSeason.' $seasonConvert '.$seasonConvert;
                                                                            if($previousSeason!=$seasonConvert)
                                                                            {
                                                                            $seasonChange=true;
                                                                            $horizontalSpanB0='col-2';
                                                                            $horizontalSpanB1='col-2';
                                                                            $horizontalSpanB2='col-4';
                                                                            $horizontalSpanB3='col-4';
                                                                            $rowLongH = "rowLongSecondary";
                                                                            $rowShortH = "rowShortSecondary";
                                                                            $rowLimitPrew=5;
                                                                            $rowLimit=6;
                                                                            }
                                                                        ?>
                                                                        <?php if($seasonChange===true): ?>
                                                                            <?php
                                                                                $seasonFinalIndic=true;
                                                                                $seasonCompleted=true;
                                                                            ?>
                                                                            <div class="row seasonChangeIndicator">
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <div class="row <?php echo e($rowShortH); ?>">
                                                                            <?php
                                                                                //echo $boxNextLayout;
                                                                                $rowType=2;
                                                                            ?>
                                                                            <?php endif; ?>
                                                                            <?php endif; ?>
                                                                            <?php
                                                                                $rowCreate=0;
                                                                                $pushCreateRowGridExp=false;
                                                                            ?>
                                                                            <?php endif; ?>

                                                                            <?php elseif($p->box_layout==2): ?>
                                                                                <div class="boxCollapsed">
                                                                                    <div class="masonryWarp">
                                                                                        <?php if($p->parent==1): ?>
                                                                                            <a href="<?php echo e(url('weekend/'.$p->value_alias)); ?>/"
                                                                                               class="thumbnail"
                                                                                               title="<?php echo e($p->title); ?>">
                                                                                                <img class="img-fluid"
                                                                                                     src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                     title="<?php echo e($p->title); ?>"
                                                                                                     alt="<?php echo e($p->title); ?>"/>
                                                                                            </a>
                                                                                        <?php elseif($p->parent==2): ?>
                                                                                            <a href="<?php echo e(url('tagesausflug/'.$p->value_alias)); ?>/"
                                                                                               class="thumbnail"
                                                                                               title="<?php echo e($p->title); ?>">
                                                                                                <img class="img-fluid"
                                                                                                     src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                     title="<?php echo e($p->title); ?>"
                                                                                                     alt="<?php echo e($p->title); ?>"/>
                                                                                            </a>
                                                                                        <?php else: ?>
                                                                                            <a href="<?php echo e(url('gruppenausfluege/'.$p->value_alias)); ?>/"
                                                                                               class="thumbnail"
                                                                                               title="<?php echo e($p->title); ?>">
                                                                                                <img class="img-fluid"
                                                                                                     src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                     title="<?php echo e($p->title); ?>"
                                                                                                     alt="<?php echo e($p->title); ?>"/>
                                                                                            </a>
                                                                                        <?php endif; ?>
                                                                                        <div class="titleWarp">
                                                                                            <div class="titleCont">
                                                                                                <span class="masonryWarp-test"><?php echo e($p->title); ?> </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <?php
                                                                            if($loop->last)
                                                                            {
                                                                            $rowCreate=0;
                                                                            $pushCreateRowGridExp=false;
                                                                            }
                                                                        ?>
                                                                        <?php if($pushCreateRowGridExp): ?>
                                                                </div>
                                                                <?php
                                                                    //$rowCreate=0;
                                                                    //$gridExpentency=false;
                                                                ?>
                                                                <?php if($p->box_layout==1 || $p->box_layout==3): ?>
                                                                    <div class="row <?php echo e($rowLongH); ?>">
                                                                        <?php
                                                                            $rowType=1;
                                                                        ?>
                                                                        <?php else: ?>
                                                                            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
                                                                                <div class="row <?php echo e($rowLongH); ?>">
                                                                                    <?php
                                                                                        $rowType=1;
                                                                                    ?>
                                                                                    <?php else: ?>
                                                                                        <div class="row <?php echo e($rowShortH); ?>">
                                                                                            <?php
                                                                                                $rowType=2;
                                                                                            ?>
                                                                                            <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                            <?php
                                                                                                $rowCreate=0;
                                                                                                $pushCreateRowGridExp=false;
                                                                                            ?>
                                                                                            <?php endif; ?>
                                                                                            <?php else: ?>
                                                                                                Please add a 1x1 here rc
                                                                                                gc= <?php echo e($rowCreate); ?>

                                                                                                <?php
                                                                                                    //$rowCreate-=1;
                                                                                                    //$gridExpentency=false;
                                                                                                ?>
                                                                                        </div>
                                                                                        <?php if($pushCreateRowGridExp): ?>
                                                                                </div>
                                                                                <?php
                                                                                    //$rowCreate=0;
                                                                                    //$gridExpentency=false;
                                                                                ?>
                                                                                <?php if($p->box_layout==1 || $p->box_layout==3): ?>
                                                                                    <div class="row <?php echo e($rowLongH); ?>">
                                                                                        <?php
                                                                                            $rowType=1;
                                                                                        ?>
                                                                                        <?php else: ?>
                                                                                            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
                                                                                                <div class="row <?php echo e($rowLongH); ?>">
                                                                                                    <?php
                                                                                                        $rowType=1;
                                                                                                    ?>
                                                                                                    <?php else: ?>
                                                                                                        <div class="row <?php echo e($rowShortH); ?>">
                                                                                                            <?php
                                                                                                                $rowType=2;
                                                                                                            ?>
                                                                                                            <?php endif; ?>
                                                                                                            <?php endif; ?>
                                                                                                            <?php
                                                                                                                $rowCreate=0;
                                                                                                                $pushCreateRowGridExp=false;
                                                                                                            ?>
                                                                                                            <?php endif; ?>
                                                                                                            <?php endif; ?>

                                                                                                            <?php else: ?>
                                                                                                                
                                                                                                                <?php if($rowCreate==$rowLimitPrew && ($p->box_layout==2 || $p->box_layout==3)): ?>
                                                                                                                    <div class="<?php echo e($horizontalSpanB1); ?> masonry-column">
                                                                                                                        Please
                                                                                                                        add
                                                                                                                        a
                                                                                                                        1x1
                                                                                                                        here
                                                                                                                        rc= <?php echo e($rowCreate); ?>

                                                                                                                    </div>
                                                                                                        </div>
                                                                                                        <?php if($p->box_layout==1 || $p->box_layout==3): ?>
                                                                                                            <div class="row <?php echo e($rowLongH); ?>">
                                                                                                                <?php
                                                                                                                    $rowType=1;
                                                                                                                ?>
                                                                                                                <?php else: ?>
                                                                                                                    <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
                                                                                                                        <div class="row <?php echo e($rowLongH); ?>">
                                                                                                                            <?php
                                                                                                                                $rowType=1;
                                                                                                                            ?>
                                                                                                                            <?php else: ?>
                                                                                                                                <div class="row <?php echo e($rowShortH); ?>">
                                                                                                                                    <?php
                                                                                                                                        $rowType=2;
                                                                                                                                    ?>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php
                                                                                                                                        $rowCreate=0;
                                                                                                                                        //$gridExpentency=false;
                                                                                                                                    ?>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php if($p->box_layout==0): ?>
                                                                                                                                        
                                                                                                                                        <?php if($rowType==1): ?>
                                                                                                                                            <div class="<?php echo e($horizontalSpanB0); ?> masonry-column">
                                                                                                                                                <div class="boxSize1 boxCollapsed">
                                                                                                                                                    <?php else: ?>
                                                                                                                                                        <div class="<?php echo e($horizontalSpanB0); ?> masonry-column">
                                                                                                                                                            <?php endif; ?>
                                                                                                                                                            <div class="masonryWarp">
                                                                                                                                                                <?php if($p->parent==1): ?>
                                                                                                                                                                    <a href="<?php echo e(url('weekend/'.$p->value_alias)); ?>/"
                                                                                                                                                                       class="thumbnail"
                                                                                                                                                                       title="<?php echo e($p->title); ?>">
                                                                                                                                                                        <img class="img-fluid"
                                                                                                                                                                             src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                             title="<?php echo e($p->title); ?>"
                                                                                                                                                                             alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                    </a>
                                                                                                                                                                <?php elseif($p->parent==2): ?>
                                                                                                                                                                    <a href="<?php echo e(url('tagesausflug/'.$p->value_alias)); ?>/"
                                                                                                                                                                       class="thumbnail"
                                                                                                                                                                       title="<?php echo e($p->title); ?>">
                                                                                                                                                                        <img class="img-fluid"
                                                                                                                                                                             src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                             title="<?php echo e($p->title); ?>"
                                                                                                                                                                             alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                    </a>
                                                                                                                                                                <?php else: ?>
                                                                                                                                                                    <a href="<?php echo e(url('gruppenausfluege/'.$p->value_alias)); ?>/"
                                                                                                                                                                       class="thumbnail"
                                                                                                                                                                       title="<?php echo e($p->title); ?>">
                                                                                                                                                                        <img class="img-fluid"
                                                                                                                                                                             src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                             title="<?php echo e($p->title); ?>"
                                                                                                                                                                             alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                    </a>
                                                                                                                                                                <?php endif; ?>
                                                                                                                                                                <div class="titleWarp">
                                                                                                                                                                    <div class="titleCont">
                                                                                                                                                                        <h5>
                                                                                                                                                                            <?php echo e($p->title); ?>

                                                                                                                                                                            
                                                                                                                                                                        </h5>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>

                                                                                                                                                            <?php if($rowType==1): ?>
                                                                                                                                                                <?php
                                                                                                                                                                    $gridExpentency=true;
                                                                                                                                                                    $gridExpentencyChanged=false;
                                                                                                                                                                ?>
                                                                                                                                                            <?php endif; ?>
                                                                                                                                                            <?php
                                                                                                                                                                $rowCreate+=1;
                                                                                                                                                            ?>
                                                                                                                                                        </div>
                                                                                                                                                        <?php elseif($p->box_layout==1): ?>
                                                                                                                                                            <div class="<?php echo e($horizontalSpanB1); ?> masonry-column boxSize2">
                                                                                                                                                                <div class="masonryWarp">
                                                                                                                                                                    <?php if($p->parent==1): ?>
                                                                                                                                                                        <a href="<?php echo e(url('weekend/'.$p->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($p->title); ?>">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                 title="<?php echo e($p->title); ?>"
                                                                                                                                                                                 alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    <?php elseif($p->parent==2): ?>
                                                                                                                                                                        <a href="<?php echo e(url('tagesausflug/'.$p->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($p->title); ?>">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                 title="<?php echo e($p->title); ?>"
                                                                                                                                                                                 alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    <?php else: ?>
                                                                                                                                                                        <a href="<?php echo e(url('gruppenausfluege/'.$p->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($p->title); ?>">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                 title="<?php echo e($p->title); ?>"
                                                                                                                                                                                 alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                    <div class="titleWarp">
                                                                                                                                                                        <div class="titleCont">
                                                                                                                                                                            <span class="masonryWarp-test"><?php echo e($p->title); ?> </span>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <?php
                                                                                                                                                                $rowCreate+=1;
                                                                                                                                                            ?>
                                                                                                                                                        <?php elseif($p->box_layout==2): ?>
                                                                                                                                                            <?php if($rowType==1 && $rowCreate>1): ?>
                                                                                                                                                                <div class="<?php echo e($horizontalSpanB2); ?> masonry-column">
                                                                                                                                                                    <div class="boxSize3 boxCollapsed">
                                                                                                                                                                        <?php
                                                                                                                                                                            $gridExpentency=true;
                                                                                                                                                                            $gridExpentencyChanged=false;
                                                                                                                                                                        ?>
                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                            <div class="<?php echo e($horizontalSpanB3); ?> masonry-column">
                                                                                                                                                                                <?php endif; ?>
                                                                                                                                                                                <div class="masonryWarp">
                                                                                                                                                                                    <?php if($p->parent==1): ?>
                                                                                                                                                                                        <a href="<?php echo e(url('weekend/'.$p->value_alias)); ?>/"
                                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                                           title="<?php echo e($p->title); ?>">
                                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                                 src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                                 title="<?php echo e($p->title); ?>"
                                                                                                                                                                                                 alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    <?php elseif($p->parent==2): ?>
                                                                                                                                                                                        <a href="<?php echo e(url('tagesausflug/'.$p->value_alias)); ?>/"
                                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                                           title="<?php echo e($p->title); ?>">
                                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                                 src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                                 title="<?php echo e($p->title); ?>"
                                                                                                                                                                                                 alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    <?php else: ?>
                                                                                                                                                                                        <a href="<?php echo e(url('gruppenausfluege/'.$p->value_alias)); ?>/"
                                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                                           title="<?php echo e($p->title); ?>">
                                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                                 src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                                 title="<?php echo e($p->title); ?>"
                                                                                                                                                                                                 alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                                    <div class="titleWarp">
                                                                                                                                                                                        <div class="titleCont">
                                                                                                                                                                                            <span class="masonryWarp-test"><?php echo e($p->title); ?> </span>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <?php
                                                                                                                                                                                $rowCreate+=2;
                                                                                                                                                                            ?>
                                                                                                                                                                            <?php elseif($p->box_layout==3): ?>
                                                                                                                                                                                <div class="<?php echo e($horizontalSpanB3); ?> masonry-column boxSize4">
                                                                                                                                                                                    <div class="masonryWarp">
                                                                                                                                                                                        <?php if($p->parent==1): ?>
                                                                                                                                                                                            <a href="<?php echo e(url('weekend/'.$p->value_alias)); ?>/"
                                                                                                                                                                                               class="thumbnail"
                                                                                                                                                                                               title="<?php echo e($p->title); ?>">
                                                                                                                                                                                                <img class="img-fluid"
                                                                                                                                                                                                     src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                                     title="<?php echo e($p->title); ?>"
                                                                                                                                                                                                     alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                                            </a>
                                                                                                                                                                                        <?php elseif($p->parent==2): ?>
                                                                                                                                                                                            <a href="<?php echo e(url('tagesausflug/'.$p->value_alias)); ?>/"
                                                                                                                                                                                               class="thumbnail"
                                                                                                                                                                                               title="<?php echo e($p->title); ?>">
                                                                                                                                                                                                <img class="img-fluid"
                                                                                                                                                                                                     src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                                     title="<?php echo e($p->title); ?>"
                                                                                                                                                                                                     alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                                            </a>
                                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                                            <a href="<?php echo e(url('gruppenausfluege/'.$p->value_alias)); ?>/"
                                                                                                                                                                                               class="thumbnail"
                                                                                                                                                                                               title="<?php echo e($p->title); ?>">
                                                                                                                                                                                                <img class="img-fluid"
                                                                                                                                                                                                     src="<?php echo e(url('assets'.$p->identifier)); ?>"
                                                                                                                                                                                                     title="<?php echo e($p->title); ?>"
                                                                                                                                                                                                     alt="<?php echo e($p->title); ?>"/>
                                                                                                                                                                                            </a>
                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                        <div class="titleWarp">
                                                                                                                                                                                            <div class="titleCont">
                                                                                                                                                                                                <span class="masonryWarp-test"><?php echo e($p->title); ?> </span>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <?php
                                                                                                                                                                                    $rowCreate+=2;
                                                                                                                                                                                ?>
                                                                                                                                                                            <?php else: ?>
                                                                                                                                                                            <?php endif; ?>
                                                                                                                                                                            <?php if($rowCreate==$rowLimit && !$gridExpentency): ?>
                                                                                                                                                                    </div>
                                                                                                                                                                    <?php
                                                                                                                                                                        $pushCreateRow=true;
                                                                                                                                                                    ?>
                                                                                                                                                                    <?php elseif($rowCreate==$rowLimit && $gridExpentency): ?>
                                                                                                                                                                        <?php
                                                                                                                                                                            $pushCreateRowGridExp=true;
                                                                                                                                                                        ?>
                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                    <?php if($loop->last): ?>
                                                                                                                                                                        <?php if($rowCreate!=$rowLimit): ?>
                                                                                                                                                                </div>
                                                                                                                                                            <?php endif; ?>
                                                                                                                                                        <?php endif; ?>
                                                                                                                                                        <?php
                                                                                                                                                                ?>
                                                                                                                                                        <?php
                                                                                                                                                            $gridCount++;
                                                                                                                                                            $catForeachCount++;
                                                                                                                                                        ?>

                                                                                                                                                        

                                                                                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                                        <div class="row seasonChangeIndicator">
                                                                                                                                                        </div>

                                                                                                                                                        <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                                                                                                                                </div>
                                                                                                                                                <div class="container-fluid mainCont2 hiddeDiv">
                                                                                                                                                    <?php $__currentLoopData = $data['categoryData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                                        <?php if($cd->parent==1): ?>
                                                                                                                                                            <div class="row cardWarper">
                                                                                                                                                                <div class="col-5 nopadding imgDivWarp">
                                                                                                                                                                    <div class="mobImgCatHolder">
                                                                                                                                                                        <a href="<?php echo e(url('weekend/'.$cd->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($cd->title); ?>">
                                                                                                                                                                            <img class="img-fluid"
                                                                                                                                                                                 src="<?php echo e(url('assets'.$cd->identifier)); ?>"
                                                                                                                                                                                 title="<?php echo e($cd->title); ?>"
                                                                                                                                                                                 alt="<?php echo e($cd->title); ?>"/>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-7">
                                                                                                                                                                    <div class="catHold">

                                                                                                                                                                        <a href="<?php echo e(url('weekend/'.$cd->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($cd->title); ?>">
                                                                                                                                                                            <p><?php echo e($cd->title); ?></p>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        <?php elseif($cd->parent==2): ?>
                                                                                                                                                            <div class="row cardWarper">
                                                                                                                                                                <div class="col-5 nopadding imgDivWarp">
                                                                                                                                                                    <div class="mobImgCatHolder">
                                                                                                                                                                        <a href="<?php echo e(url('tagesausflug/'.$cd->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($cd->title); ?>"><img
                                                                                                                                                                                    class="img-fluid"
                                                                                                                                                                                    src="<?php echo e(url('assets'.$cd->identifier)); ?>"
                                                                                                                                                                                    alt="<?php echo e($cd->title); ?>"/></a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-7">
                                                                                                                                                                    <div class="catHold">

                                                                                                                                                                        <a href="<?php echo e(url('tagesausflug/'.$cd->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($cd->title); ?>">
                                                                                                                                                                            <p><?php echo e($cd->title); ?></p>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        <?php elseif($cd->parent==3): ?>
                                                                                                                                                            <div class="row cardWarper">
                                                                                                                                                                <div class="col-5 nopadding imgDivWarp">
                                                                                                                                                                    <div class="mobImgCatHolder">
                                                                                                                                                                        <a href="<?php echo e(url('gruppenausfluege/'.$cd->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($cd->title); ?>"><img
                                                                                                                                                                                    class="img-fluid"
                                                                                                                                                                                    src="<?php echo e(url('assets'.$cd->identifier)); ?>"
                                                                                                                                                                                    alt="<?php echo e($cd->title); ?>"/></a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-7">
                                                                                                                                                                    <div class="catHold">

                                                                                                                                                                        <a href="<?php echo e(url('gruppenausfluege/'.$cd->value_alias)); ?>/"
                                                                                                                                                                           class="thumbnail"
                                                                                                                                                                           title="<?php echo e($cd->title); ?>">
                                                                                                                                                                            <p><?php echo e($cd->title); ?></p>
                                                                                                                                                                        </a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        <?php endif; ?>
                                                                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="container-fluid footerCont">
                                                                                                                                                    <div class="row nopadding footerPart">
                                                                                                                                                        <div class="col-12 col-md-6 col-lg-6 nopadding fP1">
                                                                                                                                                            <?php echo \App\Helpers\Helpers::clean_text($seo[0]); ?>

                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-12 col-md-6 col-lg-6 nopadding fP2">
                                                                                                                                                            <?php if(count($seo)>1): ?>
                                                                                                                                                                <?php echo \App\Helpers\Helpers::clean_text($seo[1]); ?>

                                                                                                                                                            <?php endif; ?>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>