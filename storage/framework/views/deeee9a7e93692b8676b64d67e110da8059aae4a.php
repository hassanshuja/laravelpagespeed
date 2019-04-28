<!doctype html>
<html lang="de">
    <?php echo $__env->make('head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <body>


    <?php echo $__env->make('navBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if($isNavigate==0): ?>
    <div id="pageDynamic">
      <?php echo $dataView; ?>

    </div>
    <?php endif; ?>
    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </body>
</html>
