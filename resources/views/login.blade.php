
@include('includes/header')

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
        
        {{Form::open(['action'=>'Controller@Authenticate','method'=>'POST'])}}
        <div class='row'>
            <h1>Admin Login</h1>
        </div>
        <div class='row'>
            <div class='form-group col-md-12'>
                {{Form::label('username')}}
                {{Form::text('username','',['class'=>'form-control','placeholder'=>'username'])}}
            </div>
        </div>
        <div class='row'>
            <div class='form-group col-md-12'>
                {{Form::label('Password')}}
                {{Form::password('password',['class'=>'form-control','placeholder'=>'password'])}}
            </div>
        </div>
        <div class='row'>   
            {{Form::submit('Login',['class'=>'btn btn-primary'])}}
            {{Form::close()}}
        </div>    
    </div>
</div>