<?php $__env->startSection('title'); ?> <?php if( ! empty($title)): ?> <?php echo e($title); ?> | <?php endif; ?> ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="categories-wrap"> <!-- explore categories -->
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"> <?php echo app('translator')->get('app.find_campaign_fund_them'); ?>  </h2>
                </div>
            </div>

            <div class="row">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="home-category-box">
                            <img src="<?php echo e($cat->get_image_url()); ?>" />
                            <div class="title">
                                <a href="<?php echo e(route('single_category', [$cat->id, $cat->category_slug])); ?>"><?php echo e($cat->category_name); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </section> <!-- #explore categories -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/categories.blade.php ENDPATH**/ ?>