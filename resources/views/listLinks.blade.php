@include('includes/header')
@include('includes/sidemenu')
@section('ActiveBookings','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Links</h2>
            <div class="container-fluid">
                <div class='row'>
                    @foreach($data as $k=>$v)
                    <div class='row'>
                        <h3 style='margin-left:50px'>{{$k}}</h3>
                    </div>
                        <table class='table'>
                            <tr>
                                <th>Value</th><th>Tablename</th><th>Field Alias</th><th>Field Id</th><th>Value Id</th>
                            </tr>
                            @foreach($v as $d)
                                <tr>
                                    <td>{{$d->value_alias}}</td>
                                    <td>{{$d->tablename}}</td>
                                    <td>{{$d->field_alias}}</td>
                                    <td>{{$d->field_id}}</td>
                                    <td>{{$d->value_id}}</td>
                                </tr>
                            @endforeach
                        </table>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
