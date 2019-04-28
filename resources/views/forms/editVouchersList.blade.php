<!doctype html>
<html lang="en">

@include("includes/header")
@section('ActiveListVouchers','active')

<body>
	<div class="wrapper">
		@include("includes/sidemenu")
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid myContainer">
					<div class="row">
						<div class="col-md-12">
                            <div class="header">
                                <h4 class="title">Create Voucher</h4>
                            </div>
                            <div class="content">
                                <table class='table'>
                                    <tr><th>Title</th><th>Created at</th><th>Image<th></th></th></tr>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$d->title}}</td>
										<td>{{$d->crdate}}</td>
										<td><img src="../../assets/voucher/{{$d->image}}" height='auto' width='100px' title="meinweekend" alt="meinweekend"/></td>
                                        <td>
                                            <a href="/admin/editVoucher/{{$d->uid}}"><button class='btn btn-primary'>Edit</button></a>
                                            @if($d->hidden==1)
                                                <button class='btn btn-success' onclick='voucherAction({{$d->uid}},"unHide")'>unHide</button>
                                            @else
                                                <button class='btn btn-warning' onclick='voucherAction({{$d->uid}},"hide")'>Hide</button>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
                                Home
                            </a>
							</li>
							<li>
								<a href="#">
                                Company
                            </a>
							</li>
							<li>
								<a href="#">
                                Portfolio
                            </a>
							</li>
							<li>
								<a href="#">
                               Blog
                            </a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
					</p>
				</div>
			</footer>

		</div>
	</div>


</body>

<!--   Core JS Files   -->
<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/bootstrap-multiselect.js" type="text/javascript"></script>
<link href="/css/bootstrap-multiselect.css" rel="stylesheet" />
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

<script type="text/javascript">
	$(document).ready(function() {
		demo.initChartist();

		$.notify({
			icon: 'pe-7s-gift',
			message: "Welcome to Admin Panel, Admin"

		}, {
			type: 'info',
			timer: 4000
		});
	});
	CKEDITOR.replace('textarea1');
	CKEDITOR.replace('textarea2');
	CKEDITOR.replace('textarea3');
	CKEDITOR.replace('textarea4');
	CKEDITOR.replace('textarea5');
	CKEDITOR.replace('textarea6');
	CKEDITOR.replace('textarea7');
	CKEDITOR.replace('textarea8');
	CKEDITOR.replace('textarea9');
	CKEDITOR.replace('textarea10');
	CKEDITOR.replace('textarea11');
</script>

</html>
<style>
	.related-offer-pointer{
		cursor:pointer;
	}
	.related-offer-pointer:hover{
		background: lightblue;
	}
	.right{
		float:right;
	}
	#seleted-offers{
		border:1px solid lightgray;
		min-height:50px;
		border-radius: 2px;
	}

</style>
