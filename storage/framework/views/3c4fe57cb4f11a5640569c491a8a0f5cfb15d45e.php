

<?php $__env->startSection('content'); ?>
<style>
    body{
        background-color: white;
        position:relative;
    }
    .bg-purple {
    background: linear-gradient(to bottom, #660066 0%, #660066 100%);
}
aside{
    position:absolute;
    background: rgba(250,250,250,0.1);
    height:100%;
    padding:5% !important;
    
    z-index:1;
}

</style>
<br>
<div class="container bg-white p-lg-4 mt-5">

    <div class="row shadow-lg" >
    <div class="col-lg-6 col-12 p-0 bg-light p-5">
     
     <div class="d-flex align-items-center" style="width:100%;height:100%">
      
      <?php if($user->profile_photo_path == ""): ?>
     <div class="box rounded-circle bg-purple mx-auto" style="height:120px;width:120px;">
         <br>
         <center><span class="text-light display-4 my-auto"><?php echo e(\Illuminate\Support\Str::limit($user->name, 1, $end='')); ?></span></center>
     </div>
     <?php else: ?>
     
         <br>
        <img src="<?php echo e(asset('/images/users/'.$user->profile_photo_path)); ?>" class="box mx-auto rounded-circle img-fluid shadow-lg" width="50%">
  
     <?php endif; ?>
     </div>
    

    </div>    

    <div class="col-lg-6 col-12 p-0">
       
        <div class="container py-5" id="user_cover">
        <h5 class="text-center font-weight-bold">EDIT PROFILE FOR <br>
        <?php
        
         $arr = explode(' ',trim($user->name));
         echo htmlspecialchars($arr[0] .' '. $arr[1]);

        ?>
        </h5>
        <hr>
         <!--role 0 is user-->
        <?php if($user->role == 0): ?>
 <form method="POST" action="<?php echo e(route('edit.user')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                     
                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <h6 class="text-secondary">Upload New Image</h6>
                                <input type="file" name="user_image" >
                                <?php $__errorArgs = ['user_image'];
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
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($user->name); ?>" required autocomplete="name" autofocus>

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
                                <input id="phone" type="phone" placeholder="Phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e($user->phone); ?>" required autocomplete="phone">

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


                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-purple btn-block text-light">
                                    <?php echo e(__('Edit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>


<!--role 2 is mechanic-->
<?php if($user->role == 2): ?>
 <form method="POST" action="<?php echo e(route('edit.mechanic')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                     
                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <h6 class="text-secondary">Upload New Image</h6>
                                <input type="file" name="mechanic_image" >
                                <?php $__errorArgs = ['user_image'];
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
                           
                            <span class="text-dark text-secondary ml-3">Name</span>
                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mechanic_name" value="<?php echo e($user->name); ?>" required autocomplete="name" autofocus>

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
                           
                            <span class="text-dark text-secondary ml-3">Skill Type</span>
                            <?php if($user->spec ==0 ): ?>
                            <h6 class="text-danger ml-3">none specified, choose your skill</h6>
                            <?php else: ?>
                            <h6 class="text-dark ml-3 border rounded-lg p-2"><?php echo e($user->mechanic_type); ?></h6>
                            <?php endif; ?>
                            <div class="col-md-12">
                            <select name="mechanic_spec" id="spec">
                            <?php $__currentLoopData = $mechanics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mechanic_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($mechanic_type->m_id); ?>"><?php echo e($mechanic_type->mechanic_type); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>

                                <?php $__errorArgs = ['spec'];
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
                           
                            <span class="text-dark text-secondary ml-3">Edit your professional information</span>
                            <div class="col-md-12">
                            <textarea type="textarea" id="profession" class="form-control <?php $__errorArgs = ['profession'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mechanic_profession" rows="3" cols="5" required><?php echo e($user->profession); ?></textarea>
                                
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
                           
                            <span class="text-dark text-secondary ml-3">Address</span>
                            <div class="col-md-12">
                                <input id="address" type="text" placeholder="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mechanic_address" value="<?php echo e($user->address); ?>" required autocomplete="address" autofocus>

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
                           
                            <span class="text-dark text-secondary ml-3">Phone</span>
                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mechanic_phone" value="<?php echo e($user->phone); ?>" required autocomplete="phone">

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
                           
                            <span class="text-dark text-secondary ml-3">Price</span>
                            <div class="col-md-12">
                                <input id="price" type="number" placeholder="Enter your price anmount in Naira(NGN)" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mechanic_price" value="<?php echo e($user->price); ?>" required autocomplete="price" autofocus>

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

                   

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-purple btn-block text-light">
                                    <?php echo e(__('Edit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>



                    <br>

    </div> 
    </div>

    </div>
 
</div>  
<script>
sessionStorage.clickcount = 1;

</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\carrier\resources\views/user-edit.blade.php ENDPATH**/ ?>