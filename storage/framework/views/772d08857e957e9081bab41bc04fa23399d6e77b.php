<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveListOffers','active'); ?>
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
<body>

	<div class="wrapper">
		<?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
		<div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    <?php echo e(Form::open(['action'=>'mainController@listOffersForEdit','method'=>'GET'])); ?>

                    <div class='col-md-12'>
                        <span>&nbsp;</span>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <?php echo e(Form::text('search','',['class'=>'form-control','style'=>'width:350px;margin-right:100px;margin-left:50px','placeholder'=>'Search For offer'])); ?>

                        </div>
                        <div class='col-md-3'>
                            <?php echo e(Form::submit("Search",['class'=>'btn btn-primary'])); ?>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <?php if($get==1): ?>
                        <a class='col-md-2' href="/admin/listOffers"><button class='btn btn-danger'>Clear search</button></a>
                    <?php endif; ?> 
                </div>
                <div class='row'>
                <div class='col-12'>
                    <ul class='list-group list-group-flush'>
                        <table class='table'>
                            <tr><th >Title</th><th >Created at</th><th></th><th></th></tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id=<?php echo e($d->uid); ?>>
                            <td id="<?php echo e($d->uid); ?>"><a href="/admin/editOfferForm/<?php echo e($d->uid); ?>"><?php echo e($d->title); ?></a></td>
                            <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->crdate)); ?></td>
                            <td>
                                <?php if($loop->index==0): ?>
                                    <button class='btn-xs btn disabled' id="<?php echo e($d->uid); ?>">▲</button>
                                <?php else: ?>
                                    <button class='btn-xs btn' id="<?php echo e($d->uid); ?>" onclick='offerRankUp(<?php echo e($d->uid); ?>,<?php echo e($data[$loop->index-1]->uid); ?>)'>▲</button>
                                <?php endif; ?>
                                <?php if($loop->last): ?>
                                    <button class='btn-xs btn disabled' id="<?php echo e($d->uid); ?>">▼</button>
                                <?php else: ?>
                                    <button class='btn-xs btn' id="<?php echo e($d->uid); ?>" onclick='offerRankDown(<?php echo e($d->uid); ?>,<?php echo e($data[$loop->index+1]->uid); ?>)'>▼</button>
                                <?php endif; ?>
                                <button class='btn-xs btn cutButton' onClick="cutItem(<?php echo e($d->uid); ?>)">Cut</button>
                                <button class='btn-xs btn pasteButton' onClick="pasteItem(<?php echo e($d->uid); ?>)">Shift Down</button>
                                <button class='btn-xs btn cancelButton' id="itemCancel_<?php echo e($d->uid); ?>" onClick="cancelMoveItem(<?php echo e($d->uid); ?>)">Cancel</button>
                            <td>
                               <button class='btn btn-danger btn' onclick="offerAction(<?php echo e($d->uid); ?>,'delete')" style='float:right'>Delete</button>
                                <?php if($d->hidden==1): ?>
                                   <button class='btn btn-warning btn' onclick="offerAction(<?php echo e($d->uid); ?>,'unHide')" style='float:right'>UnHide Offer</button>
                                <?php elseif($d->hidden==0): ?>
                                    <button class='btn btn-success btn' onclick="offerAction(<?php echo e($d->uid); ?>,'hide')" style='float:right'>Hidde Offer</button>
                                <?php endif; ?>
                                <a href="/admin/editOfferForm/<?php echo e($d->uid); ?>"><button class='btn btn-primary btn' style='float:right'>Edit</button></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    </table>
                    <h3>Deleted Offers</h3>
                    <table class='table'>
                        <?php $__currentLoopData = $deleted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td id="<?php echo e($del->uid); ?>"><?php echo e($del->title); ?></td>  
                            <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($del->crdate)); ?></td>
                            <td></td>
                            <td></td>
                            <td><a href="/admin/unDeleteOffer/<?php echo e($del->uid); ?>"><button class='btn btn-success btn' style='float:right'>Un-Delete</button></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a >
                                Home
                            </a>
                        </li>
                        <li>
                            <a >
                                Company
                            </a>
                        </li>
                        <li>
                            <a >
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a >
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </footer>


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
