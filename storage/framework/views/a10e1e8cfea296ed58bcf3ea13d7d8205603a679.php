

<?php $__env->startSection('content'); ?>
<style>
    body{background-color: white;}
    .bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);}
     nav > img{max-height:90px !important;}
</style>
<br><br>
<hr>
<aside class="container p-2 p-lg-4">
<h1 class="font-weight-lighter">Mechs</h1>
<h6 class="small text-secondary">Get started with our mechanics in different fields and with great skills </h6>
<br><br>

<div class="row">
<div class="col-0 col-md-3 col-lg-3 p-0" style="background:#e8e8e8">
<div class="container p-0">
  
    
  <nav class="navbar navbar-expand-md " style="background:#e8e8e8">

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar_">
    <span class="la la-bars text-dark " style="font-size:27px"></span>
  </button>

  <div class="collapse navbar-collapse ml-4 justify-content-start" id="collapsibleNavbar_">
  
<ul class="navbar-nav  flex-column">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('category.mechanics')); ?>"><h5 class="text-dark font-weight-bolder">All</h5></a>
  </li>
   <?php $__currentLoopData = $mechanic_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li class="nav-item">
    <a class="nav-link" href="/category/mechanics/<?php echo e($types->m_id); ?>"><span class="text-dark"><?php echo e($types->mechanic_type); ?></span></a>
  </li>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
</nav>
</div>
</div>
<div class="col-12 col-md-9 col-lg-9 p-0">
<div class="container ">
<h5 class="text-dark font-weight-bolder mt-4 mt-lg-2 ml-3 mb-4"><?php echo e($sec_name); ?></h5>
<div class="row">
 <?php $__currentLoopData = $mechanics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mechanic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-6 col-lg-3 mb-3">
  <form method="POST" action="<?php echo e(route('user.details')); ?>">
     <?php echo e(csrf_field()); ?>

   <input type="hidden" name="user_id" value="<?php echo e($mechanic->id); ?>">
   <button type="submit" style="background:transparent;border:transparent;">
  <div class="container border py-4 px-0 d-3" style="border-radius:20px">
    <center>
     <?php if($mechanic->profile_photo_path == ""): ?>
   <nav>
    <img src="<?php echo e(asset('images/users/default.png')); ?>" class="box mx-auto rounded-lg img-fluid shadow-lg" width="60%">
  </nav>
     <?php else: ?>
     
         <nav> 
        <img src="<?php echo e(asset('images/users/'.$mechanic->profile_photo_path)); ?>" class="box mx-auto rounded-lg img-fluid shadow-lg" width="60%">
         </nav>
     <?php endif; ?> <br>
   

    </center>
 <h6 class="font-weight-bold text-dark">
       <?php
        
         $arr = explode(' ',trim($mechanic->name));
         echo htmlspecialchars($arr[0] .' '. $arr[1]);

        ?>
    </h6>
    <span class="small text-secondary">
    <?php echo e($mechanic->mechanic_type); ?>

    </span>
  
  </div>
  </button>
  </form>
</div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div> 


</div>
</div>

</div>




<br><hr>
<div class="d-flex justify-content-center">
    <?php echo $mechanics->links(); ?>

</div> 
</aside> 
</aside>
<script>
sessionStorage.clickcount = 1;
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/category/mechanics.blade.php ENDPATH**/ ?>