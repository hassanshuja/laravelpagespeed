
<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class='row'>
    
    <span></span>
    <p></p>
    <p></p><br><br><br><br>
</div>
<div class='row'>
    <div class='col-md-3'>
        <span></span>
    </div>
    <div class='col-md-5'>
        
        <?php echo e(Form::open(['action'=>'Controller@Authenticate','method'=>'POST'])); ?>

        <div class='row'>
            <h1>Admin Login</h1>
        </div>
        <div class='row'>
            <div class='form-group col-md-12'>
                <?php echo e(Form::label('username')); ?>

                <?php echo e(Form::text('username','',['class'=>'form-control','placeholder'=>'username'])); ?>

            </div>
        </div>
        <div class='row'>
            <div class='form-group col-md-12'>
                <?php echo e(Form::label('Password')); ?>

                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'password'])); ?>

            </div>
        </div>
        <div class='row'>   
            <?php echo e(Form::submit('Login',['class'=>'btn btn-primary'])); ?>

            <?php echo e(Form::close()); ?>

        </div>    
    </div>
</div>