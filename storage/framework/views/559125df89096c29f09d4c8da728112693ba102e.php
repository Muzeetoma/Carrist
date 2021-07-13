

<?php $__env->startSection('content'); ?>
<style>
    body{background-color: white;}
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
<div class="p-1"><h1 class="font-weight-bolder mb-0">Product Details</h1>
<span class="small"></span>
</div>  
<div class="p-1">
<span class="la la-close" style="font-size:32px" onclick="getBack()" id="back"></span></div>     
</div>

</div>
<br><br>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-3" style="border-right:1px solid gainsboro">
         <div class="container">
         <img src="<?php echo e(asset('/images/carparts/'.$carpart->car_image)); ?>" class="img-fluid rounded-sm" width="100%">
  
        </div>   
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="container">
            <h2 class="font-weight-normal"><?php echo e($carpart->part_name); ?></h2>
            <h6 class="font-weight-normal text-danger">
            <?php $__currentLoopData = $car_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $car_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(($car_model->car_model_id === $carpart->car_model_id) && ($car_model->car_name_fgn_id === $car_name->car_name_id)): ?>
            <?php echo e($car_name->car_name); ?>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($car_model->car_model_id === $carpart->car_model_id): ?>
            <?php echo e($car_model->car_model_name); ?>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h6>

             <hr>
             <h4 class="text-dark font-weight-bolder"><span class="text-danger">N</span> <span class=""><?php echo e($carpart->price); ?></span></h4>
             <hr>

              <h6 class="text-black font-weight-bold mt-4">Description</h6>
              <p><?php echo e($carpart->description); ?></p>
              
              <br>
              <?php if(auth()->guard()->check()): ?>
              <form method="POST" action="<?php echo e(route('shopping.add')); ?>">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="u_id" value="<?php echo e(Auth::user()->id); ?>"/>
              <input type="hidden" name="p_id" value="<?php echo e($carpart->car_id); ?>"/>
              <input type="hidden" name="qty" value="1"/>
              <input type="hidden" name="type" value="2"/>
              <?php if($checker == 0): ?>
              <button class="btn bg-darkpurple btn-block mb-5 shadow" type="submit" onclick="twoPageSet()"><span class="text-light">add to cart</span></button>
             <?php else: ?>
              <nav class="btn btn-outline-dark btn-block mb-5 shadow inactive"><span>added to cart</span> <span class="la la-shopping-bag" style="font-size:18px"></span></nav>
             
              <?php endif; ?>
              </form> 
              <?php endif; ?>

              <?php if(auth()->guard()->guest()): ?>
              <a href="<?php echo e(route('login')); ?>" class="btn bg-darkpurple btn-block mb-5 shadow" type="submit"><span class="text-light">login to add to cart</span></a>
              
              <?php endif; ?>
                <br> 
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/details/carpart.blade.php ENDPATH**/ ?>