

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="d-flex justify-content-between">
<div class="p-2">    <!-- Page Heading -->
        <h2 class="h1 mb-2 text-gray-800 font-weight-normal">Mechanic Types</h2>
</div>
<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Type
</button>
</div>
</div>
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

                     <th class="w3-small">Image</th>
                     <th class="w3-small">Name</th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    <?php $__currentLoopData = $mechanic_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mechanic_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                     <td><img src="<?php echo e(asset('/images/mechs/'.$mechanic_type->image_path)); ?>" height="60px" width="60px"></td>
                     <td><span class="small"><?php echo e($mechanic_type->mechanic_type); ?> </span> </td>
                     <td>

                     <!--   <form action="<?php echo e(route('mechanic.types.destroy')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($mechanic_type->m_id); ?>">
                            <button type="submit" name="delete" class="btn btn-danger px-2 py-1"><small class="la la-trash"></small></button>
                            </form>-->
                             <button class="btn btn-danger text-light"><small>Undeletable</small></button>
                        </td>
                        
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                 </tbody>
               </table>
           
    
</div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add mechanic Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="<?php echo e(route('mechanic.types.add')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input type="file" name="mechanic_image" >
                                <?php $__errorArgs = ['mechanic_img'];
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
unset($__errorArgs, $__bag); ?>" name="mechanic_type" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/admin/mechanic_types.blade.php ENDPATH**/ ?>