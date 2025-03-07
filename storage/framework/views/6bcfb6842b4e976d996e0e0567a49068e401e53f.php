<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="<?php echo e(route('updatepost')); ?>" method="post" >
            <?php echo csrf_field(); ?>
                <input type="hidden" name="old_id" value="<?php echo e($result->id); ?>">

                <label><?php echo e(__('language.IMAGE')); ?></label>
                <input type="file" name="image" class="form-control mb-4">
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>         

                <label><?php echo e(__('language.CONTENT')); ?></label>
                <input type="text" name="content" class="form-control mb-4" value="<?php echo e($result->content); ?>">
                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  

                <input type="submit" value='<?php echo e(__('language.UPDATEPOST')); ?>' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder (3)\resources\views/Post/edit.blade.php ENDPATH**/ ?>