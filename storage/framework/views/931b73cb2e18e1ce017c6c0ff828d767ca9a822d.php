<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.not_found_404'); ?> | ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="categories-wrap wrap-404"> <!-- explore categories -->
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>404</h1>
                    <h2><i class="fa fa-info-circle"></i> <?php echo app('translator')->get('app.not_found_404'); ?></h2>
                </div>
            </div>

        </div>
    </section> <!-- #explore categories -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/errors/404.blade.php ENDPATH**/ ?>