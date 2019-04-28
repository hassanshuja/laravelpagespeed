<!doctype html>
<html lang="en">
  @include("includes/header")
<body>
@section('ActiveHomeMeta','active')
<div class="wrapper">
    @include("includes/sidemenu")



    <?php
        if(!empty($data)){
            $id = $data->id;
            $titleMeta = $data->title_meta;
            $descriptionMeta = $data->description_meta;
            $keywordMeta = $data->keyword_meta;
            $seo = $data->seo;
        }else{
            $id = 0;
            $titleMeta = '';
            $descriptionMeta = '';
            $keywordMeta = '';
            $seo = '';
        }

     ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Home Meta</h4>
                            </div>
                            <div class="content">
                                     {{Form::open(['action'=>'updateController@submitHomeMeta','method'=>'POST'])}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Meta Title">Meta Title</label>
                                                    <input class="form-control"  name="title_meta" type="text" value="{{ $titleMeta }}">
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Meta Keyword">Meta Keyword</label>
                                                    <textarea style="height:150px;" class="form-control" name='keyword_meta'>{{ $keywordMeta }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Description">Meta Description</label>
                                                    <textarea style="height:150px;" class="form-control" name='description_meta'>{{ $descriptionMeta }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Description">Seo</label>
                                                    <textarea style="height:150px;" class="form-control" name='seo'>{{ $seo }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input class="btn btn-info btn-fill pull-right" type="submit" value="Submit">
                                        {{ Form::close() }}
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
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
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="/js/demo.js"></script>
</html>
