<div class="row dDownsHide">
    <form action="<?php echo e(url('/')); ?>" method="GET" id="form_navoverview">
    
        <div class="col-12 nopadding dropDwn">
          <div class="dropDwnDWN btn-group">
            <button id="buttRotate" onclick="toggleDivWithFilter('dDownSearchToggle','buttRotate')" type="button" class="btn"><strong>Suche</strong></button>
          </div>
        </div>
        <div id="dDownSearchToggle" class="dDownsWarp">
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
            <div class="input-group">
              <select class="custom-select " id="offerType"  name="offerType">
                <option value="alle" selected>
                  Angebotstyp
                  
                </option>
                <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <optgroup label="<?php echo e($d->title); ?>">
                   <?php
                       $mainCat='weekend';
                      if($d->uid==2){
                        $mainCat='tagesausflug';
                      }else if($d->uid==3){
                        $mainCat='gruppenausfluege';
                      }
                   ?>
                    <option value="<?php echo e($mainCat); ?>">Alle <?php echo e($d->title); ?></option>
                      <?php $__currentLoopData = $d->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mainCat); ?>/<?php echo e($s->title_urls); ?>"><?php echo e($s->title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </optgroup>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>                
            </div>                
          </div>
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
            <div class="input-group">
                <select class="custom-select" id="offerRegion" name="offerRegion">
                  <option value="" selected>Region</option>
                  <?php $__currentLoopData = $data['regions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($s->value_alias); ?>"><?php echo e($s->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>                
          </div>
          
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
            <div class="input-group">
              <select class="custom-select" id="offerDuration"  name="offerDuration">
                  <option value="" selected>Dauer</option>
                  <?php $__currentLoopData = $data['duration']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d=>$n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value='<?php echo e($n); ?>'><?php echo e($n); ?> Tag, <?php echo e($d); ?> Nacht</option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>                
          </div>
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
              <div class="dDownsHolderMIn input-group searchIn">
                  <input type="text" class="form-control" placeholder="Search for..." id="searchUser">
                  <i class="fas fa-search" id="masterSearch"></i>
              </div>    
          </div>

           <div class="col-12 col-md-3 col-lg-3 mobile-search">
              <input type="submit" value = "Search">  
          </div>
        </div>
    </form>
      </div>