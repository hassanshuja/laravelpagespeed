<link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">
  
  <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid">


      
<?php
      $gridCount=1;
      $rowCount=1;
      $rowCreate=0;
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
      $previousSeason=0;
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
    if($previousSeason!=$seasonConvert)
    {
      $seasonChange=true;
    }
    $nextBox=$catForeachCount+1;
    $nextBoxS=$nextBox+1;
    $nextBoxT=$nextBoxS+1;
    if($nextBox<count($data['categoryData']))
    {
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
    //$boxNextLayout=$data['categoryData'][$nextBox]->box_layout;
    //echo "Box Layout: ".$p->box_layout;
    ?>
    <?php if($pushCreateRow===true || $pushFirstTime===true): ?>
        <?php
          $pushFirstTime=false;
          $pushCreateRow=false;
          $rowCreate=0;
        ?>
          <?php if($p->box_layout==1 || $p->box_layout==3): ?>
          <div style="background:white;" class="row rowLong">
          <?php
            $rowType=1;
          ?>
          <?php else: ?>
            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
            <div style="background:white;" class="row rowLong">
              <?php
                $rowType=1;
              ?>
            <?php else: ?>
            <div style="background:white;" class="row rowShort">
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
              <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/<?php echo e($p->title_url); ?>/duration/alle/keyword/alle" class="thumbnail">
                <img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/>
              </a>
              <div class="titleWarp">
                <div class="titleCont">
                  <h5>
                    <?php echo e($p->title); ?>

                    next: <?php echo e($boxNextLayout); ?> c: <?php echo e($gridCount); ?> rc: <?php echo e($rowCreate); ?> bl:<?php echo e($p->box_layout); ?>| //<?php echo e($gridExpentency); ?>// 
                  </h5>
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
            <div style="background:white;" class="row rowLong">
            <?php
              $rowType=1;
            ?>
          <?php else: ?>
            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
              <div style="background:white;" class="row rowLong">
                <?php
                  $rowType=1;
                ?>
            <?php else: ?>
              <div style="background:white;" class="row rowShort">
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
              <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/<?php echo e($p->title_url); ?>/duration/alle/keyword/alle" class="thumbnail">
                <img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/>
              </a>
              <div class="titleWarp">
                <div class="titleCont">
                  <h5>
                    <?php echo e($p->title); ?>

                    next: <?php echo e($boxNextLayout); ?> c: <?php echo e($gridCount); ?> rc: <?php echo e($rowCreate); ?> bl:<?php echo e($p->box_layout); ?>| //<?php echo e($gridExpentency); ?>// 
                  </h5>
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
            <div style="background:white;" class="row rowLong">
            <?php
              $rowType=1;
            ?>
          <?php else: ?>
            <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
              <div style="background:white;" class="row rowLong">
                <?php
                  $rowType=1;
                ?>
            <?php else: ?>
              <div style="background:white;" class="row rowShort">
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
          Please add a 1x1 here rc gc= <?php echo e($rowCreate); ?>

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
            <div style="background:white;" class="row rowLong">
          <?php
            $rowType=1;
          ?>
        <?php else: ?>
          <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
            <div style="background:white;" class="row rowLong">
            <?php
              $rowType=1;
            ?>
          <?php else: ?>
            <div style="background:white;" class="row rowShort">
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
      
      <?php if($rowCreate==3 && ($p->box_layout==1 || $p->box_layout==2 || $p->box_layout==3)): ?>
        <div class="col-3 masonry-column sss">
          Please add a 1x1 here rc= <?php echo e($rowCreate); ?>

        </div>
      </div>
      <?php if($p->box_layout==1 || $p->box_layout==3): ?>
        <div style="background:white;" class="row rowLong">
        <?php
          $rowType=1;
        ?>
      <?php else: ?>
          <?php if($p->box_layout==0 && $boxNextLayout==0): ?>
          <div style="background:white;" class="row rowLong">
            <?php
              $rowType=1;
            ?>
          <?php else: ?>
           <div style="background:white;" class="row rowShort">
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
    <div class="col-3 masonry-column">
        <div class="boxSize1 boxCollapsed">
    <?php else: ?>
      <div class="col-3 masonry-column">
    <?php endif; ?>
        <div class="masonryWarp">
          <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/<?php echo e($p->title_url); ?>/duration/alle/keyword/alle" class="thumbnail">
            <img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/>
          </a>
          <div class="titleWarp">
            <div class="titleCont">
              <h5>
                <?php echo e($p->title); ?> 
                next: <?php echo e($boxNextLayout); ?> c: <?php echo e($gridCount); ?> rc: <?php echo e($rowCreate); ?> bl:<?php echo e($p->box_layout); ?>| //<?php echo e($gridExpentency); ?>// 
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
    <div class="col-3 masonry-column boxSize2">
      <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/<?php echo e($p->title_url); ?>/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>
              <?php echo e($p->title); ?>

              next: <?php echo e($boxNextLayout); ?> c: <?php echo e($gridCount); ?> rc: <?php echo e($rowCreate); ?> bl:<?php echo e($p->box_layout); ?>| //<?php echo e($gridExpentency); ?>// 
            </h5>
          </div>
        </div>
      </div>
    </div>
      <?php
        $rowCreate+=1;
      ?>
    <?php elseif($p->box_layout==2): ?>
    <?php if($rowType==1 && $rowCreate>1): ?>
    <div class="col-6 masonry-column">
      <div class="boxSize3 boxCollapsed">
          <?php
          $gridExpentency=true;
          $gridExpentencyChanged=false;
        ?>
    <?php else: ?>
    <div class="col-6 masonry-column">
    <?php endif; ?>
      <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/<?php echo e($p->title_url); ?>/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>
              <?php echo e($p->title); ?>

              next: <?php echo e($boxNextLayout); ?> c: <?php echo e($gridCount); ?> rc: <?php echo e($rowCreate); ?> bl:<?php echo e($p->box_layout); ?>| //<?php echo e($gridExpentency); ?>// 
            </h5>
          </div>
        </div>
      </div>
    </div>
    <?php
      $rowCreate+=2;
    ?>
    <?php elseif($p->box_layout==3): ?>
    <div class="col-6 masonry-column boxSize4">
      <div class="masonryWarp">
        <a  href="https://www.meinweekend.ch/list-offers/region/alle/offer_type/<?php echo e($p->title_url); ?>/duration/alle/keyword/alle" class="thumbnail">
          <img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/>
        </a>
        <div class="titleWarp">
          <div class="titleCont">
            <h5>
              <?php echo e($p->title); ?>

              next: <?php echo e($boxNextLayout); ?> c: <?php echo e($gridCount); ?> rc: <?php echo e($rowCreate); ?> bl:<?php echo e($p->box_layout); ?>| //<?php echo e($gridExpentency); ?>// 
            </h5>
          </div>
        </div>
      </div>
    </div>
    <?php
      $rowCreate+=2;
    ?>
    <?php else: ?>
    <?php endif; ?>
       <?php if($rowCreate==4 && !$gridExpentency): ?>
        </div>
        <?php
        $pushCreateRow=true;
        ?>
        <?php elseif($rowCreate==4 && $gridExpentency): ?>
        <?php
          $pushCreateRowGridExp=true;
        ?>
       <?php endif; ?>
    <?php endif; ?>
    <?php if($loop->last): ?>
    <?php if($rowCreate!=4): ?>
    </div>
    <?php endif; ?>
    <?php
    if($seasonChange===true)
    {
      echo "Season changed here";
    }
        //echo "row create".$rowCreate."<br>";
    ?>
    <?php endif; ?>
    
      <?php
        $gridCount++;
        $catForeachCount++;
      ?>
       
       
        
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
  </div>
  <div class="container-fluid mainCont hiddeDiv">
    <div class="row">
      <div class="col-12 nopadding dropDwn">
        <div style="width:100%;" class="btn-group">
          <button style="width:100%;text-align:left;color:white;" type="button" class="btn"><strong>Filter</strong></button>
          <button style="color:white;" type="button" class="btn btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" >Action</a>
            <a class="dropdown-item" >Another action</a>
            <a class="dropdown-item" >Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" >Separated link</a>
          </div>
        </div>
      </div>
    </div>
    <?php $__currentLoopData = $data['categoryData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row cardWarper">
      <div class="col-6 nopadding">
        <a  href="<?php echo e(URL('https://www.meinweekend.ch/list-offers/region/alle/offer_type/{{$p->title_url); ?>/duration/alle/keyword/alle')}}" class="thumbnail"><img class="img-fluid" src="<?php echo e(url('assets'.$p->identifier)); ?>"/></a>
      </div>
      <div class="col-6">
      <div class="catHold">
        <p><?php echo e($cd->title); ?></p>
      </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
