<?php echo $__env->make('../includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveListCategories','active'); ?>
<style>
    .pasteButton {
        display: none;
    }
    .cancelButton {
        display: none;
    }
    .cutButton {
        display: inline-block;
    }
    </style>
<div class="wrapper">
        <?php echo $__env->make("../includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                              
                                <div class="row">
                                        <div class="col-md-12">
                                            
                                            <?php echo e(Form::open(['action'=>'mainController@listCategoriesForEdit','method'=>'GET'])); ?>

                                            <?php echo e(Form::label('Search')); ?>

                                            <div class='col-md-5'>
                                                <?php echo e(Form::text('search','',['class'=>'form-control'])); ?>

                                            </div>
                                            <div class='col-md-3'>
                                                <?php echo e(Form::submit('search',['class'=>'form-control btn btn-primary'])); ?>

                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                        <?php if(isset($_GET['search'])): ?>
                                        <a href="/admin/listCategories">Clear Search</a>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <?php echo $__env->make('../includes/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <table class='table'>
                                <tr><td >Title</td><td>Created at:</td><td>Hidden</td><td>Deleted:</td><td></td><td>*</td></tr>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id=<?php echo e($d->uid); ?>>
                                        <td><?php echo e($d->title); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->crdate)); ?></td>
                                        <td><?php echo e($d->hidden); ?></td>
                                        <td><?php echo e($d->deleted); ?></td>
                                        <td>
                                            <?php if($loop->index==0): ?>
                                                <button class='btn-xs btn disabled' id="<?php echo e($d->uid); ?>" >▲</button>
                                            <?php else: ?>
                                                <button class='btn-xs btn' id="<?php echo e($d->uid); ?>" onclick='catRankUp(<?php echo e($d->uid); ?>,<?php echo e($data[$loop->index-1]->uid); ?>)'>▲</button>
                                            <?php endif; ?>
                                            <?php if($loop->last): ?>
                                                <button class='btn-xs btn disabled' id="<?php echo e($d->uid); ?>" >▼</button>
                                            <?php else: ?>
                                                <button class='btn-xs btn' id="<?php echo e($d->uid); ?>" onclick='catRankDown(<?php echo e($d->uid); ?>,<?php echo e($data[$loop->index+1]->uid); ?>)'>▼</button>
                                            <?php endif; ?>
                                            <button class='btn-xs btn cutButton' onClick="cutItemCat(<?php echo e($d->uid); ?>)">Cut</button>
                                            <button class='btn-xs btn pasteButton' onClick="pasteItemCat(<?php echo e($d->uid); ?>)">Shift Down</button>
                                            <button class='btn-xs btn cancelButton' id="itemCancel_<?php echo e($d->uid); ?>" onClick="cancelMoveItemCat(<?php echo e($d->uid); ?>)">Cancel</button>
                                        </td>
                                        <td><a href='/admin/editCategoryForm/<?php echo e($d->uid); ?>'><button class='btn btn-primary'>Edit</button></a>
                                        <?php if($d->hidden==1): ?>
                                            <button class='btn btn-success' onclick="categoryAction(<?php echo e($d->uid); ?>,'unHide')">Un Hide</button>
                                        <?php endif; ?>
                                        <?php if($d->hidden==0): ?>
                                            <button class='btn btn-warning' onclick="categoryAction(<?php echo e($d->uid); ?>,'hide')">Hide</button>
                                        <?php endif; ?>
                                        <?php if($d->deleted==1): ?>
                                            <button class='btn btn-success' onclick="categoryAction(<?php echo e($d->uid); ?>,'unDelete')">Un Delete</button>
                                        <?php endif; ?>
                                        <?php if($d->deleted==0): ?>
                                            <button class='btn btn-danger' onclick="categoryAction(<?php echo e($d->uid); ?>,'delete')">Delete</button>
                                        <?php endif; ?>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    
    
    </body>
    
            <!--   Core JS Files   -->
        <script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    
        <!--  Charts Plugin -->
        <script src="/js/chartist.min.js"></script>
    
        <!--  Notifications Plugin    -->
        <script src="/js/bootstrap-notify.js"></script>
    
        <!--  Google Maps Plugin    -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    
        <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
        <script src="/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    
        <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
        <script src="/js/demo.js"></script>
   
    </html>
    