

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="d-flex justify-content-between">
<div class="p-2">    <!-- Page Heading -->
        <h2 class="h1 mb-2 text-gray-800 font-weight-normal">Car Names</h2>
</div>
<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Car Name
</button>
</div>

<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal2">
  Add Car Model
</button>
</div>
</div>


<div class="row">
<div class="col-6">
<div class="container">



</div>
</div>
<div class="col-6">

<div class="container"></div>


</div>

</div>
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

                     
                     <th class="w3-small">Names</th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    <?php $__currentLoopData = $car_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                     
                     <td><strong class=""><?php echo e($car_name->car_name); ?> </strong>
                     <br>
                     <?php $__currentLoopData = $car_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($car_model->car_name_fgn_id == $car_name->car_name_id): ?>
                     <span class="small"><?php echo e($car_model->car_model_name); ?> </span><br> 
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </td>
                     <td>
                    <button class="btn btn-danger text-light"><small>Undeletable</small></button>
                        </td>
                        
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                 </tbody>
               </table>
           
    
</div>


<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Car Models</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="<?php echo e(route('car.models.add')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="car_model_name" type="text" placeholder="car model name" class="form-control <?php $__errorArgs = ['car_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_model_name" value="<?php echo e(old('car_name')); ?>" required autocomplete="car_name" autofocus>

                                <?php $__errorArgs = ['car_name'];
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
                            <select name="car_name_fgn_id" id="car_name_fgn_id">
                            <?php $__currentLoopData = $car_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($car_name->car_name_id); ?>"><?php echo e($car_name->car_name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                                <?php $__errorArgs = ['car_name_fgn_id'];
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

                           
                  

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <?php echo e(__('ADD')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Car Names</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="<?php echo e(route('car.names.add')); ?>">
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
unset($__errorArgs, $__bag); ?>" name="car_name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

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


                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <?php echo e(__('ADD')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/admin/car_names.blade.php ENDPATH**/ ?>