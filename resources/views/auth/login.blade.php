<!DOCTYPE html>
<html>
<!-- 7aba57 -->
<head>
    <title>Home Page</title> 

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login/css.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- <img class="wave" src="img/wave.png"> -->
    <div class="container">
        
        <div class="login-content">
            
        <div class="login-page">

  <div class="form">
  <h1> HR </h1>
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>


    
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        @error('email')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      <!-- <input type="text" placeholder="email"/> -->
        <input id="email" 
                placeholder="email" 
                type="email" 
                class="input" 
                name="email" 
                value="admin@mail.com" 
                equired
                autocomplete="email" 
                autofocus>
        <input id="password"
                placeholder="password" 
                type="password" 
                class="input" 
                value="password" 
                name="password" 
                required 
                autocomplete="current-password">
      
        <button type="submit" >login</button> 
        @if(Route::has('password.request'))
        <p class="message"> <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a></p>
        @endif

      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>



  </div>
</div>
 

        </div>
    </div> 


<script src="{{asset('/dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script>



$('.message a').click(function(){

    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });

    </script> 
    
</body>

</html>
