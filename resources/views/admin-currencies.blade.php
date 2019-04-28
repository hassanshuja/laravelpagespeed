
@include('includes/header')
@section('ActiveCurrencies','active')
<div class="wrapper">
    @include("includes/sidemenu")
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid myContainer">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Currencies</h4>
                            </div>
                            <div class="content">
                                <!-- {!!Form::open(['action'=>'updateController@submitCurrency','method'=>'POST'])!!} -->
                                <form action="/admin/submitCurrency/" method="POST">
                                {{ csrf_field() }}
                                {{Form::label('Euro')}}
                                {{Form::text('value',$data[0]->value,['class'=>'form-control'])}}
                                <br>
                                {{Form::submit('Submit edit',['class'=>'btn btn-primary right'])}}
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
