@include('includes/header')
@include('includes/sidemenu')
@section('ActiveBookings','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content" style='margin-left:30px'>
            
            <h2>Create Backend user</h2>
            <div class="container-fluid">
            
                {{-- {{Form::open(['action'=>'updateController@addBeUser','method'=>'POST'])}} --}}
                <form action="/admin/addBeUser/" method="POST">
                    {{ csrf_field() }}
                <div class='row'>
                    
                    <div class='col-md-5'>
                        {{Form::label('Username')}}
                        {{Form::text('username','',['class'=>'form-control'])}}  
                    </div>
                    <div class='col-md-5'>
                        {{Form::label('Password')}}
                        <input type='password' name='password' class='form-control'/>                     
                    </div>
                    
                </div>
                <hr>
                <div class='row'>
                    <div class='col-md-5'>
                        {{Form::label('Permission')}}
                        <select name="admin" id="" class='form-control'>
                            <option value="1">Full Admin (All Permissions)</option>
                            <option value="2">Limited Permission</option>
                        </select>
                    </div>
                </div>
              <br><br>
                {{Form::submit('Submit edit',['class'=>'btn btn-primary'])}}
                {{Form::close()}}
            
            </div>
        </div>
    </div>
</div>