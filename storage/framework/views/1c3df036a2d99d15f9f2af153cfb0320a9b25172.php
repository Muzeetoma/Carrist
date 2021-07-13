<?php $__env->startSection('content'); ?>
<div class="container">
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                     <td><span class="small"><?php echo e($user->name); ?> </span> </td>
                     <td><span class="small"><?php echo e($user->email); ?> </span> </td>
                     <td><span class="small"><?php echo e($user->phone); ?> </span> </td>
                     <td><span class="small">
                         <?php if($user->role == 0): ?>
                           <span class="font-weight-bold text-success">User</span>
                         <?php endif; ?>
                         <?php if($user->role == 2): ?>
                           <span class="font-weight-bold text-success">Mechanic</span>
                         <?php endif; ?>
                          <?php if($user->role == 1): ?>
                           <span class="font-weight-bold text-success">Dealer</span>
                         <?php endif; ?>
                        </span> </td>
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
                         <td>
                          <?php if($user->available == 0): ?>
                             <form action="<?php echo e(route('users.available')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="available" class="btn btn-dark px-3 py-1"><small class="">suspended</small></button>
                            </form>
                         <?php endif; ?>
                         <?php if($user->available == 1): ?>
                            <form action="<?php echo e(route('users.available')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="available" class="btn btn-success px-3 py-1"><small class="">active</small></button>
                            </form>
                         <?php endif; ?>
                          
                        </td>
                
                          <td>
                          <?php if($user->verified == 0): ?>
                             <form action="<?php echo e(route('users.verify')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="verify" class="btn btn-dark px-3 py-1"><small class="">unverified</small></button>
                            </form>
                         <?php endif; ?>
                         <?php if($user->verified == 1): ?>
                            <form action="<?php echo e(route('users.verify')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="submit" name="unverify" class="btn btn-success px-3 py-1"><small class="">verified</small></button>
                            </form>
                         <?php endif; ?>
                          
                        </td>
                        <td>
                            <form action="<?php echo e(route('users.delete')); ?>" method="post">
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
    <?php echo $users->links(); ?>

</div> 
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/admin/users.blade.php ENDPATH**/ ?>