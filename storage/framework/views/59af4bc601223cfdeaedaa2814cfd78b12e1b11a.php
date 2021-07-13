<?php $__env->startSection('content'); ?>
<div class="container">
<div class="d-flex justify-content-between">
<div class="p-2">    <!-- Page Heading -->
        <h2 class="h1 mb-2 text-gray-800 font-weight-normal">Car Parts</h2>
</div>
<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Car Part
</button>
</div>
</div>
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

                     <th class="w3-small">Image</th>
                     <th class="w3-small">Name</th>
                     <th class="w3-small">Model</th>
                     <th class="w3-small">Price</th>
                     <th class="w3-small">Description</th>
                     <th class="w3-small">Status </th>
                     <th class="w3-small">Dealer </th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    <?php $__currentLoopData = $carparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carpart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                     <td><img src="<?php echo e(asset('/images/carparts/'.$carpart->car_image)); ?>" height="60px" width="60px"></td>
                     <td><span class="small"><?php echo e($carpart->part_name); ?> </span> </td>
                     <td><span class="small">
                     
                        <?php $__currentLoopData = $car_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($carpart->car_model_id == $car_model->car_model_id): ?>
                         <?php echo e($car_model->car_model_name); ?> 
                         
                         <?php $__currentLoopData = $car_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($car_model->car_name_fgn_id == $car_name->car_name_id): ?>
                         <strong><?php echo e($car_name->car_name); ?> </strong>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span> </td>
                     <td><span class="small"><?php echo e($carpart->price); ?> </span> </td>
                     <td><span class="small"><?php echo e($carpart->description); ?> </span> </td>
                     
                         <td>
                          <?php if($carpart->availability == 0): ?>
                             <form action="<?php echo e(route('carpart.available')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($carpart->car_id); ?>">
                            <button type="submit" name="available" class="btn btn-dark px-3 py-1"><small class="">inactive</small></button>
                            </form>
                         <?php endif; ?>
                         <?php if($carpart->availability == 1): ?>
                            <form action="<?php echo e(route('carpart.available')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($carpart->car_id); ?>">
                            <button type="submit" name="available" class="btn btn-success px-3 py-1"><small class="">active</small></button>
                            </form>
                         <?php endif; ?>
                          
                        </td>
                        <td><span class="small">
                        <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($carpart->dealer_id == $dealer->id): ?>
                         <?php echo e($dealer->name); ?> 
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span> </td>
                        <td>
                         <form action="<?php echo e(route('carpart.show.edit')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($carpart->car_id); ?>">
                            <button type="submit" name="edit" class="btn btn-warning px-2 py-1"><small>Edit</small></button>
                            </form>
                             </td>
                         <td>
                            <form action="<?php echo e(route('carpart.delete')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($carpart->car_id); ?>">
                            <button type="submit" name="delete" class="btn btn-danger px-2 py-1"><small class="la la-trash"></small></button>
                            </form>
                        </td>
                        
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                 </tbody>
               </table>
           
    <br><hr>
<div class="d-flex justify-content-center">
    <?php echo $carparts->links(); ?>

</div>
</div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Car Part</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="<?php echo e(route('carpart.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input type="file" name="car_image" >
                                <?php $__errorArgs = ['car_img'];
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
                                <input id="name" type="text" placeholder="Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="part_name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

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
                           
                            <h6 class="ml-3 text-secondary">Car Model</h6>
                            <div class="col-md-12">
                            <select name="model" id="car_model_name">
                            <?php $__currentLoopData = $car_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($car_model->car_model_id); ?>"><?php echo e($car_model->car_model_name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                                <?php $__errorArgs = ['car_model'];
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
                                <input id="price" type="number" placeholder="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e(old('price')); ?>" required autocomplete="price">

                                <?php $__errorArgs = ['price'];
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
                                <input id="description" placeholder="Description" type="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" required autocomplete="new-description">

                                <?php $__errorArgs = ['description'];
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
                           <h6 class="ml-4">Dealer</h6>

                            <div class="col-md-12">
                               <input list="dealers" name="dealer_id" id="dealer">

                            <datalist id="dealers">
                            <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dealer->id); ?>"><?php echo e($dealer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/admin/carparts.blade.php ENDPATH**/ ?>