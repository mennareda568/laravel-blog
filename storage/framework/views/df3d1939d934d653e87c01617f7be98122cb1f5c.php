<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
            <?php if(session('message')): ?>
                <h4 class="alert alert-success"><?php echo e(session('message')); ?></h4>
            <?php endif; ?>
            <div class="row">
             
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="<?php echo e(route('categories')); ?>">
                                    <?php echo e(__('language.CATEGORIES')); ?>

                                </a>
                                <i class="fa-solid fa-book-medical fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            <?php echo e($countcate); ?>

                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="<?php echo e(route('post')); ?>">
                                    <?php echo e(__('language.POSTS')); ?>

                                </a>
                                <i class="fa-solid fa-user-doctor fa-2xl"></i>
                            </div>
                        </div>
                    </div>

            </div>
        <?php if(Auth::user() && Auth::user()->role == 'admin'): ?>
            <?php if(session('messageadmin')): ?>
                <h4 class="alert alert-success"><?php echo e(session('messageadmin')); ?></h4>
            <?php endif; ?>
                <div class="col-md-4 mt-5 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a>
                                    <?php echo e(__('language.USERS')); ?>

                                </a>
                                <i class="fa-solid fa-user-doctor fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            <?php echo e($countusers); ?>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php endif; ?>
     
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder (3)\resources\views/home.blade.php ENDPATH**/ ?>