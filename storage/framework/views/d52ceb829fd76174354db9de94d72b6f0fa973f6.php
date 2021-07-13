<?php $__env->startSection('content'); ?>
<style>
    body{
        background-color: white;
        position:relative;
    }
aside{
    position:absolute;
    background: rgba(250,250,250,0.1);
    height:100%;
    padding:5% !important;
    
    z-index:1;
}
#main{
    display:none;
}
.bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);color:white;}
.border-purple{border:1px solid purple;color:purple;border-radius:2px;background:white; }
.border-purple:hover{background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);color:white;}
    
</style>    
<aside class="jumbotron bg-white" id="profile_cover">

<a class="navbar-brand " href="/"><h4 class="text-primary font-weight-bold ml-3 ml-lg-5"><span style="color:orange">Qwik</span><span class="text-dark">Mech</span></h4></a>
<h1 class="font-weight-light ml-3 ml-lg-5">Choose Your Profile <br> Type ...</h1>
<div class="container p-lg-5">
<div class="row">

<div class="col-lg-6 p-4" id="choose_user">
<div class="container rounded-lg" style="background: rgb(21, 5, 46);">
<br><br><br>
<img src="img/user.svg" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-4" width="35%">
<h3 class="font-weight-bolder text-light">User</h3>
<p class="font-weight-bolder text-light">Sign Up as a<br>
visitor</p>
<br><br>
</div>
</div>
<div class="col-lg-6 p-4" id="choose_mechanic">
<div class="container bg-success rounded-lg">
<br><br><br>
<img src="img/pen.svg" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-4" width="46%">
<h3 class="text-light font-weight-bolder">Mechanic</h3>
<p class="text-light font-weight-bolder">Get started as a<br>
Mechanic/Technician</p>
<br><br>
</div>
</div>
<!--
<div class="col-lg-4 p-4" id="choose_dealer">
<div class="container border bg-success rounded-lg">
<br><br><br>
<img src="img/dealer.svg" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-4 mb-3" width="48%">
<h3 class="text-light">Vend</h3>
<p class="text-light">Register as a<br>
dealer of any carpart </p>
<br><br>
</div>
</div>
-->
</div>
<div>
</aside>    
<div class="container bg-white p-1 p-lg-4" id="main">

    <div class="row shadow-lg">
    <div class="col-lg-6 col-12 p-0">
     <div class="container bg-light p-3" style="height:100%">
     <br><br><br><br>
     <center>
    <img src="<?php echo e(asset('images/users/car.png')); ?>" class="img-fluid rounded-lg pr-lg-4 mt-lg-2 ml-lg-5" width="70%">
    </center>
    <br>
    <center>
    <button class="btn border-purple mt-5 font-weight-bold" id="close_button" style="cursor:pointer">Choose Profile</button>  
     </center>
     </div>   
    </div>
    <div class="col-lg-6 col-12">
        <!--user Cover-->
        <div class="container py-5" id="user_cover">
        <h4 class="text-center mt-2">SIGN UP AS A USER</h4>
        <h6 class="text-center text-danger small">password must be a min of 8 characters and must be a mix of letters, numbers, symbols and a capital letter</h6>
         <br><br>
 <form method="POST" action="<?php echo e(route('register')); ?>" id="user_form">
                        <?php echo csrf_field(); ?>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
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
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                <?php $__errorArgs = ['email'];
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
                            </div>
                        </div>

                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('phone')); ?>" required autocomplete="phone">

                                <?php $__errorArgs = ['phone'];
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
                            </div>
                        </div>
                   


                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

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
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn bg-darkpurple btn-block">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
<center>
<span class="text-secondary small">Created an account? | <a href="/login">Sign In</a> | <a href="/">Home</a></span>
</center>
    </div> 

    <!--mechanic cover-->
        <div class="container py-5" id="mechanic_cover">
        <h4 class="text-center mt-2">SIGN UP AS A MECHANIC</h4>
        <h6 class="text-center text-danger small">password must be a min of 8 characters and must be a mix of letters,numbers, symbols and a capital letter</h6>
         <br><br>
 <form method="POST" action="<?php echo e(route('register.mechanic')); ?>" id="mechanic_form">
                        <?php echo csrf_field(); ?>

                         <!--<input type="hidden" name="verified" value="0">  
                         <input type="hidden" name="available" value="0">-->
                            
                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
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
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                <?php $__errorArgs = ['email'];
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
                            </div>
                        </div>

                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('phone')); ?>" required autocomplete="phone">

                                <?php $__errorArgs = ['phone'];
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
                            </div>
                        </div>


                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="address" type="address" placeholder="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" value="<?php echo e(old('address')); ?>" required autocomplete="address">

                                <?php $__errorArgs = ['address'];
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
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <textarea id="profession" placeholder="Brief summary about your profession, E.g: I am an Expert in repair of Toyota engines | Carina E and Toyota Avalon" value="" class="form-control <?php $__errorArgs = ['profession'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="profession" rows="5" required autocomplete="profession"><?php echo e(old('profession')); ?></textarea>

                                <?php $__errorArgs = ['profession'];
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
                            </div>
                        </div>


               

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

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
                            </div>
                        </div>

                        <input type="hidden" name="role" value="2"> 

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn bg-darkpurple btn-block">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
<center>
<span class="text-secondary small">Created an account? | <a href="/login">Sign In</a> | <a href="/">Home</a></span>
</center>
    </div>
    <!--end mechanic cover-->


    <?php if(auth()->guard('admin')->check()): ?>

        <!--dealer cover-->
        <div class="container py-5" id="dealer_cover">
        <h4 class="text-center mt-2">SIGN UP AS A DEALER</h4>
        <h6 class="text-center text-danger small">password must be a min of 8 characters and must be a mix of letters,numbers and symbols</h6>
         <br><br>

         <br>
        <center>
        <span class="text-secondary small">Created an account? | <a href="/login">Sign In</a> | <a href="/">Home</a></span>
        </center>
    </div>
    <!--end dealer cover-->
    <?php endif; ?>
    </div>
    </div>
                   
</div>
<script>
var chooser_user = document.getElementById("choose_user");
var chooser_mechanic = document.getElementById("choose_mechanic");
var chooser_dealer = document.getElementById("choose_dealer");

var user_cover = document.getElementById("user_cover");
var mechanic_cover = document.getElementById("mechanic_cover");
var dealer_cover = document.getElementById("dealer_cover");


var close_button = document.getElementById("close_button");
var main_cover = document.getElementById("main");

  

$(document).ready(function(){
/*
 $("#submit").click(function(){
    document.getElementById("submit").disabled = true;
 });
 */


 $("#choose_user").click(function(){
  $("#profile_cover").fadeOut(2000);
  main_cover.style.display ="block";
  $("#mechanic_cover").hide();
  $("#dealer_cover").hide();
  $("#user_cover").fadeIn(2000);
});


 $("#choose_mechanic").click(function(){
  $("#profile_cover").fadeOut(2000);
  main_cover.style.display ="block";
  $("#user_cover").hide();
   $("#dealer_cover").hide();
   $("#mechanic_cover").fadeIn(2000);
});

 $("#choose_dealer").click(function(){
  $("#profile_cover").fadeOut(2000);
  main_cover.style.display ="block";
  $("#user_cover").hide();
  $("#mechanic_cover").hide();
   $("#dealer_cover").fadeIn(2000);
});


 $("#close_button").click(function(){
  $("#profile_cover").fadeIn(2000);
 
});

$('form').on('submit', function (e) {
     $('button[type=submit], input[type=submit]', $(this)).blur().addClass('disabled is-submited');
});

$(document).on('click', 'button[type=submit].is-submited, input[type=submit].is-submited', function(e) {
    e.preventDefault();
});

});
</script> 
<?php $__env->stopSection(); ?>
   

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/auth/register.blade.php ENDPATH**/ ?>