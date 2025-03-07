<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row">
            <?php if(Auth::user() && Auth::user()->role == 'user'): ?>
                <?php if(session('message')): ?>
                    <h4 class="alert alert-success"><?php echo e(session('message')); ?></h4>
                <?php endif; ?>
 

                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="<?php echo e(route('post')); ?>">
                                    <?php echo e(__('language.POSTS')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="<?php echo e(route('categories')); ?>">
                                    <?php echo e(__('language.CATEGORIES')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php endif; ?>
            <?php if(Auth::user() && Auth::user()->role == 'admin'): ?>
                <?php if(session('messageadmin')): ?>
                    <h4 class="alert alert-success"><?php echo e(session('messageadmin')); ?></h4>
                <?php endif; ?>

                
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="<?php echo e(route('categories')); ?>">
                                    <?php echo e(__('language.CATEGORIES')); ?>

                                </a>
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
                            </div>
                        </div>
                    </div>
                </div>

        

                <div class="col-md-4 mt-5 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a>
                                    <?php echo e(__('language.USERS')); ?>

                                </a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\blog\resources\views/home.blade.php ENDPATH**/ ?>