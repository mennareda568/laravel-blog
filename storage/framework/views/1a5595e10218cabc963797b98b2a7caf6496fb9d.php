<?php $__env->startSection('content'); ?>




    <!--  ************************* Contact Us Starts Here ************************** -->

    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div class="col-sm-12 cop-ck">
                <?php if(session('message')): ?>
                <h4 class="alert alert-success"><?php echo e(session('message')); ?></h4>
                <?php endif; ?>
                <form method="post" action=<?php echo e(route('storemsg')); ?> enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <h4>Contact Form</h4>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Enter Name :</label></div>
                        <div class="col-sm-8">
                        <input type="text" placeholder="Enter Name" name="name"
                                class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Email Address :</label></div>
                        <div class="col-sm-8"><input type="text" name="email" placeholder="Enter Email Address"
                                class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Mobile Number:</label></div>
                        <div class="col-sm-8"><input type="text" name="mobil" placeholder="Enter Mobile Number"
                                class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Enter Message:</label></div>
                        <div class="col-sm-8">
                            <textarea rows="5" placeholder="Enter Your Message" class="form-control input-sm" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder (3)\resources\views/welcome.blade.php ENDPATH**/ ?>