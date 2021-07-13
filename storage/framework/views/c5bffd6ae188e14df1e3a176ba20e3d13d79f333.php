

<?php $__env->startSection('content'); ?>
<style>
*{
   padding:0;
}
body{
    margin:0;
    padding:0;
    background:white;
}
aside{
  padding-left:10% !important;
  padding-right:10% !important;
}


.text-dark{
  color:black !important;
}
a, a:hover{
  text-decoration: none !important;
}

@media  screen and (max-width: 480px) {
  #side_img {display:none !important;}
  .display-4{font-size:2.5em;}
  aside{
  padding-left:3% !important;
  padding-right:3% !important;
}
}
</style>    
<br><br>
<aside class="bg-light py-4 my-4">
  <div>
<h1 class="font-weight-bolder ml-lg-5 text-center">About Us <br></h1>
<h4 class="font-weight-bolder ml-lg-5 text-center"><span class="la la-star text-warning"></span> <span class="la la-star text-warning"></span> <span class="la la-star text-warning"></span> <span class="la la-star text-warning"></span> <span class="la la-star text-warning"></span></h4>
</div>
<br><br>
<div class="row">
  <div class="col-12 col-lg-6">
  <div class="container">
    <center>
  <img src="<?php echo e(asset('images/users/_ceo.jpg')); ?>" class="rounded-circle" style="" height="150px" width="150px">
  <hr>
  <h3 class="text-dark">Founder/Ceo </h3>
  <h5 class="text-secondary">Godspower Akpan Effiong</h5>
    </center>
  </div>
  </div>
  <div class="col-12 col-lg-6">
  <div class="container">
   <center>
  <img src="<?php echo e(asset('images/users/cto.jpg')); ?>" class="rounded-circle" style="" height="150px" width="150px">
  <hr>
  <h3 class="text-dark">Chief Technical Officer</h3>
  <h5 class="text-secondary">Mendie Clement Stephen</h5>
    </center>
  </div>
  </div>

</div>

</aside>  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/about.blade.php ENDPATH**/ ?>