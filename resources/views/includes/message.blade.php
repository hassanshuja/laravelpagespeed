<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
@if(Session::has('success'))
<div class='col-md-8'><span></span></div>
<div class="col-md-6 alert alert-success message" role="alert" >
    <strong>Success:</strong>{!!Session::get('success')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span>&times</span>
    </button>
</div>
@endif
@if(Session::has('fail'))
<div class='col-md-8'>/</div>
<div class="col-md-6 alert alert-danger message" role="alert" >
    <strong>Error:</strong>{!!Session::get('fail')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span>&times</span>
    </button>
</div>
@endif

<style>
    .message{
        position:fixed !important;
        right:0;
        top:0;
        z-index:100;
    }
</style>
