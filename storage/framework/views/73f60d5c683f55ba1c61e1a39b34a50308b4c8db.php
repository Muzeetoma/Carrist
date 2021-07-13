

<?php $__env->startSection('content'); ?>
<style>
    body{background-color: white;}
    .border{border-bottom-color: black !important;
    border-right-color: black !important;
    border-left-color: black !important;
    border-top-color: black !important;}
    .bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);}
    
</style>
<script>
if(getPageNum() != "2")
   onePageSet();

 sessionStorage.clickcount = 1;

</script>

<br><br><hr>

<div class="container">
<div class="container px-3">
<div class="d-flex justify-content-between">
<div class="p-1"><h1 class="font-weight-bolder mb-0">Details</h1>
<span class="small">Find out more about our artisans</span>
</div>  
<div class="p-1">
<span class="la la-close" style="font-size:32px" onclick="getBack()" id="back"></span></div>     
</div>

</div>
<br><br>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-3" style="border-right:1px solid gainsboro">
         <div class="container bg-light py-4 px-3 rounded-lg" style="height:100%">
         <center>
         <img src="<?php echo e(asset('/images/users/'.$user->profile_photo_path)); ?>" class="img-fluid rounded-circle shadow" width="50%">
         </center>
        </div>   
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="container">
            <h2 class="font-weight-normal"><?php echo e($user->name); ?></h2>
            <?php if($user->role == 2): ?>
            <h6 class="font-weight-light"><span class="la la-tools" style="font-size:20px"></span>
             <span class="text-info font-weight-bold"><?php echo e($user->mechanic_type); ?> </span></h6>


            <div class="container my-4 pr-5">
            <div class="row">
            <div class="col-6 p-0">
                <h5 class="p-2 px-0 text-center border">price</h5>
            </div>
            <div class="col-6 p-0">
                <h5 class="p-2 px-0 text-center bg-dark border"><?php echo e($user->price); ?></h5>
            </div>
            </div>
            </div>

            <h6 class="text-black font-weight-bold">Phone</h6>
            <h5 class="text-info"><span class="font-weight-lighter"><?php echo e($user->phone); ?></span></h5>
            <br>
            <?php else: ?>
            <h6 class=""><span class="">Dealer In </span> <span class="text-info font-weight-bold"><?php echo e($user->dealer_type); ?></span></h6>
           <hr>
            <?php endif; ?>

        
           
             
            

             <h6 class="text-black font-weight-bold">Address</h6>
             <hr>
             <h5 class="text-dark"><span class="font-weight-lighter"><?php echo e($user->address); ?></span></h5>
             <hr>
             <br>

              <h6 class="text-black font-weight-bold">Description</h6>
              <div class="jumbotron p-4">
              <?php echo e($user->profession); ?>

              </div>
              <br>
              <?php if($user->role == 2): ?>
              <?php if(auth()->guard()->check()): ?>
              <form method="POST" action="<?php echo e(route('shopping.add')); ?>">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="u_id" value="<?php echo e(Auth::user()->id); ?>"/>
              <input type="hidden" name="p_id" value="<?php echo e($user->id); ?>"/>
              <input type="hidden" name="qty" value="1"/>
              <input type="hidden" name="type" value="1"/>
              <?php if($checker == 0): ?>
              <button class="btn bg-darkpurple btn-block mb-5 py-2 shadow" type="submit" onclick="twoPageSet()"><span class="text-light">Book Mech</span></button>
             <?php else: ?>
              <nav class="btn btn-outline-dark btn-block text-dark mb-5 py-2 shadow inactive"><span class="text-dark">Mech already booked</span> <span class="la la-shopping-bag text-dark" style="font-size:18px"></span></nav>
             
              <?php endif; ?>
              </form> 
              <?php endif; ?>

              <?php if(auth()->guard()->guest()): ?>
              <a href="<?php echo e(route('login')); ?>" class="btn bg-darkpurple btn-block mb-5 py-2 shadow" type="submit"><span class="text-light">Book Mech</span></a>
              
              <?php endif; ?>
              <?php endif; ?>
                <br> 
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/details/user.blade.php ENDPATH**/ ?>