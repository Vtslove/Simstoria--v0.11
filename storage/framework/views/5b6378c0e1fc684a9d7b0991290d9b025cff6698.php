<?php $__env->startSection('content'); ?>

    <section class="home-campaign section-bg-white">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"> <?php echo app('translator')->get('app.campaigns_search_results'); ?> </h2>
                </div>
            </div>

            <div class="row">

                <?php if($campaigns->count() > 0): ?>
                    <div class="box-campaign-lists">
                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 box-campaign-item">
                                <div class="box-campaign">
                                    <div class="box-campaign-image">
                                        <a href="<?php echo e(route('campaign_single', [$spc->id, $spc->slug])); ?>"><img src="<?php echo e($spc->feature_img_url()); ?>" /></a>

                                    </div>
                                    <div class="box-campaign-content">
                                        <div class="box-campaign-description">
                                            <h4><a href="<?php echo e(route('campaign_single', [$spc->id, $spc->slug])); ?>"> <?php echo e($spc->title); ?> </a> </h4>
                                            <p><?php echo e($spc->short_description); ?></p>
                                        </div>

                                        <div class="box-campaign-summery">
                                            <ul>
                                                <li><strong><?php echo e($spc->days_left()); ?></strong> <?php echo app('translator')->get('app.days_left'); ?></li>
                                                <li><strong><?php echo e($spc->total_payments); ?></strong> <?php echo app('translator')->get('app.backers'); ?></li>
                                                <li><strong><?php echo get_amount($spc->total_raised()); ?></strong> <?php echo app('translator')->get('app.funded'); ?></li>
                                            </ul>
                                        </div>

                                        <div class="progress">
                                            <?php
                                            $percent_raised = $spc->percent_raised();
                                            ?>
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($percent_raised); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($percent_raised <= 100 ? $percent_raised : 100); ?>%;">
                                                <?php echo e($percent_raised); ?>%
                                            </div>
                                        </div>

                                        <div class="box-campaign-footer">
                                            <!--<ul>
                                        <li><img src="<?php echo e(asset('assets/images/avatar.png')); ?>"> John Doe</li>
                                        <li> <strong>$12,000.00</strong> Goal </li>
                                    </ul>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  <!-- #box-campaign-lists -->

                <?php else: ?>
                    <div class="payment-received">
                        <h1><i class="fa fa-exclamation-triangle"></i> <?php echo app('translator')->get('app.no_campaigns_to_display'); ?></h1>
                        <a href="<?php echo e(route('browse_categories')); ?>" class="btn btn-lg-filled"><?php echo app('translator')->get('app.browse_campaign'); ?></a>
                    </div>
                <?php endif; ?>

                <?php echo e($campaigns->appends(['q' => $q])->links()); ?>

            </div>

        </div><!-- /.container -->

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/search.blade.php ENDPATH**/ ?>