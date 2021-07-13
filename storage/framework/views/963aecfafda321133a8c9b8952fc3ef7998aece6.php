

<?php $__env->startSection('content'); ?>
<div class="container">
    
<div class="container">
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">
  Add Dealer
</button>
</div>
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>
                     <th class="w3-small">Image</th> 
                     <th class="w3-small">Name</th>
                     <th class="w3-small">Email</th>
                     <th class="w3-small">Phone</th>
                     <th class="w3-small">Role</th>
                     <th class="w3-small">Profession</th>
                     <th class="w3-small">Address </th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                     <td>
                     <?php if(empty($user->profile_photo_path)): ?>
                     <img src="<?php echo e(asset('/images/users/default.png')); ?>" height="50px" width="50px" class="rounded-circle" />
                     <?php else: ?>
                     <img src="<?php echo e(asset('/images/users/'.$user->profile_photo_path)); ?>" height="50px" width="50px" class="rounded-circle" />
                     <?php endif; ?>
                     </td>
                     <td><span class="small"><?php echo e($user->name); ?> </span> </td>
                     <td><span class="small"><?php echo e($user->email); ?> </span> </td>
                     <td><span class="small"><?php echo e($user->phone); ?> </span> </td>
                     <td><span class="small"><span class="font-weight-bold text-success">Dealer</span></span></td>
                        <td><span class="small">
                        <?php if(empty($user->profession)): ?>
                        None
                        <?php else: ?>
                        <?php echo e($user->profession); ?>

                        <?php endif; ?>
                         
                        </span> 
                        </td>
                        <td><span class="small">
                        <?php if(empty($user->address)): ?>
                        None
                        <?php else: ?>
                        <?php echo e($user->address); ?> 
                        <?php endif; ?>
                        </span> 
                        </td>
                        <td><a href="/dealer-edit/<?php echo e($user->id); ?>" class="btn btn-primary">update</a></td>
                         <td>
                          <?php if($user->available == 0): ?>
                             <form action="<?php echo e(route('dealers.available')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="available" class="btn btn-dark px-3 py-1"><small class="">suspended</small></button>
                            </form>
                         <?php endif; ?>
                         <?php if($user->available == 1): ?>
                            <form action="<?php echo e(route('dealers.available')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="available" class="btn btn-success px-3 py-1"><small class="">active</small></button>
                            </form>
                         <?php endif; ?>
                          
                        </td>
                
                          <td>
                          <?php if($user->verified == 0): ?>
                             <form action="<?php echo e(route('dealers.verify')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="verify" class="btn btn-dark px-3 py-1"><small class="">unverified</small></button>
                            </form>
                         <?php endif; ?>
                         <?php if($user->verified == 1): ?>
                            <form action="<?php echo e(route('dealers.verify')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="unverify" class="btn btn-success px-3 py-1"><small class="">verified</small></button>
                            </form>
                         <?php endif; ?>
                          
                        </td>
                        <td>
                            <form action="<?php echo e(route('dealers.delete')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="delete" class="btn btn-danger px-2 py-1"><small class="la la-trash"></small></button>
                            </form>
                        </td>
                        
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                 </tbody>
               </table>

<div class="d-flex justify-content-center">
    <?php echo $dealers->links(); ?>

</div> 
</div>



<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Dealer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="<?php echo e(route('register.dealer')); ?>" id="dealer_form">
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
                                <input id="profession" type="profession" placeholder="Profession" class="form-control <?php $__errorArgs = ['profession'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="profession" value="<?php echo e(old('profession')); ?>" required autocomplete="profession">

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
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required value="QRe2345eQt" autocomplete="new-password" readonly>

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
                      

                        <input type="hidden" name="role" value="1"> 
                        
                    
                        <div class="form-group p-2">
                           
                         
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" value="QRe2345eQt" required autocomplete="new-password" readonly>
                            </div>
                         
                        </div>
                      

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn btn-warning btn-block">
                                    <?php echo e(__('Register')); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/admin/dealers.blade.php ENDPATH**/ ?>