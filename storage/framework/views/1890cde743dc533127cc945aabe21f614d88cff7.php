<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto ">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(__('language.POSTS')); ?>

                    </div>
                    <div class="card-body ">
                        <?php if(session('message')): ?>
                            <h4 class="alert alert-success mt-2"><?php echo e(session('message')); ?></h4>
                        <?php endif; ?>

                        <table class="table table-dark mt-3">
                            <thead>
                                <tr>
                                    <td><?php echo e(__('language.ID')); ?></td>
                                    <td><?php echo e(__('language.CONTENT')); ?></td>
                                    <td><?php echo e(__('language.IMAGE')); ?></td>
                                    <td><?php echo e(__('language.ACTION')); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->content); ?></td>
                                        <td><img style="width:100px" src=<?php echo e(asset('img/posts/' . $item->images)); ?>>
                                        <td>
                                            <a href="<?php echo e(route('showuser', $item->id)); ?>" class="btn btn-success"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a href="<?php echo e(route('deleteuser', $item->id)); ?>" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($data->links()); ?> <!-- Display pagination links -->
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder (3)\resources\views/Post.blade.php ENDPATH**/ ?>