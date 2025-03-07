<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Blog System </title>

    <link rel="shortcut icon" href=<?php echo e(asset('img/fav.jpg')); ?>>
    <link rel="stylesheet" href=<?php echo e(asset('css/bootstrap.min.css')); ?>>
    <link rel="stylesheet" href=<?php echo e(asset('css/fontawsom-all.min.css')); ?>>
    <link rel="stylesheet" href=<?php echo e(asset('css/animate.css')); ?>>
    <link rel="stylesheet" type="text/css" href=<?php echo e(asset('css/style.css')); ?> />
</head>

<body>

    <main>

        <!-- ################# Header Starts Here#######################--->

        <header id="menu-jk">

            <div id="nav-head" class="header-nav">
                <div class="container">
                    <div class="row">
                     
                        <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#contact_us">Contact Us</a></li>
                                <?php if(auth()->guard()->guest()): ?>
                                    <li>
                                        <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                    </li>
                                    <?php if(Route::has('register')): ?>
                                        <li>
                                            <a href="<?php echo e(route('register')); ?>">Register</a>
                                        </li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li>
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                            <?php echo e(Auth::user()->name); ?>

                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Logout')); ?>

                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                class="d-none">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </div>
                                    </li>
                                 

                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <section>
            <?php echo $__env->yieldContent('content'); ?>
        </section>

    </main>

</body>

<script src=<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>></script>
<script src=<?php echo e(asset('js/popper.min.js')); ?>></script>
<script src=<?php echo e(asset('js/bootstrap.min.js')); ?>></script>
<script src=<?php echo e(asset('plugins/scroll-nav/js/jquery.easing.min.js')); ?>></script>
<script src=<?php echo e(asset('plugins/scroll-nav/js/scrolling-nav.js')); ?>></script>
<script src=<?php echo e(asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')); ?>></script>

<script src=<?php echo e(asset('js/script.js')); ?>></script>



</html>
<?php /**PATH D:\New folder (3)\resources\views/layouts/users.blade.php ENDPATH**/ ?>