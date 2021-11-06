<!DOCTYPE html>
<html>
<!-- 7aba57 -->
<head>
    <title>Home Page</title> 

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/login/css.css')); ?>">
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


    
    <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
        <?php if(Route::has('password.request')): ?>
        <p class="message"> <a href="<?php echo e(route('password.request')); ?>">
            <?php echo e(__('Forgot Your Password?')); ?>

        </a></p>
        <?php endif; ?>

      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>



  </div>
</div>
 

        </div>
    </div> 


<script src="<?php echo e(asset('/dashboard/vendor/jquery/jquery.min.js')); ?>"></script>
    <script>



$('.message a').click(function(){

    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });

    </script> 
    
</body>

</html>
<?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/auth/login.blade.php ENDPATH**/ ?>