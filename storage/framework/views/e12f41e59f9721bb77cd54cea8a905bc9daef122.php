<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<?php if(Session::has('success')): ?>
<div class='col-md-8'><span></span></div>
<div class="col-md-6 alert alert-success message" role="alert" >
    <strong>Success:</strong><?php echo Session::get('success'); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span>&times</span>
    </button>
</div>
<?php endif; ?>
<?php if(Session::has('fail')): ?>
<div class='col-md-8'>/</div>
<div class="col-md-6 alert alert-danger message" role="alert" >
    <strong>Error:</strong><?php echo Session::get('fail'); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span>&times</span>
    </button>
</div>
<?php endif; ?>

<style>
    .message{
        position:fixed !important;
        right:0;
        top:0;
        z-index:100;
    }
</style>
