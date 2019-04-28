<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://itrendin.local:3000/socket.io/socket.io.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/server.js') }}"></script>
    <script type="text/javascript">

        /*document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            console.log("doc is ready");
            console.log('window.Echo '+JSON.stringify(window.Echo));
            window.Echo.channel('message').listen('messageSentEvent', function(e) {
                console.log(e);
            });
        }
    };*/
    </script>
    <meta charset="utf-8">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script>
        // rename myToken as you like
        window.Laravel =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<form id="subform">
    <div id="onlinePeople">People Online: <div id="onlinePeopleH" class="onlinePeopleH"></div></div>
    <div id="chatholder">chat history<br></div>
    <div id="partnerStatus">Status</div>
    <input type="text" placeholder="semdTo" id="sendTo" value="0">
    <input type="text" placeholder="Enter Message" id="m">
    <button type="submit" value="Submit" >Submit</button>
</form>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
        {{ Form::open(array('url' => 'login','id' => 'loginForm')) }}
        <h1>Login</h1>

        <!-- if there are login errors, show them here -->
        <p>
            {{ $errors->first('email') }}
            {{ $errors->first('password') }}
        </p>

        <p>
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com','id' => 'mail')) }}
        </p>

        <p>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password',array('id' => 'pass')) }}
        </p>

        <p>{{ Form::submit('Submit!') }}</p>
        {{ Form::close() }}
        <script type="text/javascript">
            /*

             window.Echo.channel('message')
                .listen('messageSentEvent',function(e) {
                 console.log('asfasfas');
                 //app.users.push(e.username);
                  //this.users.push('ajx');
                    //console.log(e.username);
                  }).bind(this);

             */
        </script>
        <script>/*
console.log('Token: '+localStorage.getItem("tokenId"));
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "http://localhost:8000/validateToken", true);
  xhttp.setRequestHeader("Authorization","Bearer "+localStorage.getItem("tokenId"));
  xhttp.send();
}

var myForm=document.getElementById("loginForm");
myForm.onsubmit = function(e){
    e.preventDefault();

  //const formData = new FormData(e.target);

 // console.log('form data pre'+JSON.stringify(formData));pass
  var user = document.getElementById("mail").value;
  var pass = document.getElementById("pass").value;
        //var formData = new FormData(e.value);
  console.log('form datass '+user);
    console.log('form trying to submit'+pass);
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(s) {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    console.log('json '+JSON.stringify(this.responseText));
     localStorage.setItem("tokenId",this.responseText);
    }
  };
 // var formd="user_email="+user+"&password="+pass;
  //var formData = new FormData(document.querySelector('loginForm'));
  xhttp.open("GET", "http://localhost:8000/login");
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  //xhttp.setRequestHeader("Content-Type","application/json");
  xhttp.send('user=person&pwd=password&organization=place&requiredkey=key');
};
function login(e) {
    e.preventDefault();
    var formData = new FormData(document.querySelector('loginForm'))
    document.getElementById("demo").innerHTML = formData;
    return false;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "http://localhost:8000/test2", true);
  xhttp.setRequestHeader("Authorization","Bearer "+localStorage.getItem("tokenId"));
  xhttp.send();
}*/
        </script>
        <div id="demo">shit
        </div>
        <a onclick="loadDoc()">Faqja2</a>
        <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>
