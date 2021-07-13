<?php if(count($errors) > 0): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="alert alert-danger alert-dismissible" style="position:fixed;width:300px;height:50px;right:15px;top:5px;z-index:2;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <?php echo e($error); ?>

  </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible" style="position:fixed;width:300px;height:50px;right:15px;top:5px;z-index:2;">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <?php echo e(session('success')); ?>

  </div>
<?php endif; ?>

<?php if(session('error')): ?>

 <div class="alert alert-danger alert-dismissible" style="position:fixed;width:300px;height:50px;right:15px;top:5px;z-index:2;">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <?php echo e(session('error')); ?>

  </div>
<?php endif; ?><?php /**PATH C:\Users\USER\carrier\resources\views/inc/messages.blade.php ENDPATH**/ ?>