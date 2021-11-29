<?php $__env->startSection('title'); ?> <?php if( ! empty($title)): ?> <?php echo e($title); ?> | <?php endif; ?> ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="section-title"><?php echo app('translator')->get('Welcome to Simstoria'); ?></h1>
                    <p class="jumbotron-sub-text"><?php echo app('translator')->get('Enjoy of new world ideas!'); ?></p>

                    <div class="jumbotron-button-wrap">
                        <a class="btn btn-lg-outline" class="col-xs-6 col-md-4" href="<?php echo e(route('browse_categories')); ?>"><?php echo app('translator')->get('Check stories'); ?></a>
                        <a class="btn btn-lg-filled" href="<?php echo e(route('start_campaign')); ?>"><?php echo app('translator')->get('Create a story'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php if($staff_picks->count()): ?>

        <section class="home-campaign section-bg-gray">
            <div class="container">

                <div class="row">
                    <div class="-black-tie">
                        <h2 class="section-title"><?php echo app('translator')->get(''); ?> </h2>
                    </div>
                </div>

                <div class="row">

                    <div class="box-campaign-lists">

                        <?php $__currentLoopData = $staff_picks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 box-campaign-item">
                                <div class="box-campaign">
                                    <div class="box-campaign-image">
                                        <a href="<?php echo e(route('campaign_single', [$spc->id, $spc->slug])); ?>"> <img src="<?php echo e($spc->feature_img_url()); ?>" /></a>

                                    </div>
                                    <div class="box-campaign-content">
                                        <div class="box-campaign-description">
                                            <h4><a href="<?php echo e(route('campaign_single', [$spc->id, $spc->slug])); ?>"> <?php echo e($spc->title); ?> </a> </h4>
                                            <p><?php echo e($spc->short_description); ?></p>
                                        </div>

                                        <div class="box-campaign-summery">
                                            <ul>
                                                <li><strong><?php echo e($spc->days_left()); ?></strong> <?php echo app('translator')->get(''); ?></li>
                                                <li><strong><?php echo e($spc->total_payments); ?></strong> <?php echo app('translator')->get(''); ?></li>
                                                <li><strong><?php echo get_amount($spc->total_raised()); ?></strong> <?php echo app('translator')->get(''); ?></li>
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
                                        <li><img src=""> John Doe</li>
                                        <li> <strong>$12,000.00</strong> Goal </li>
                                    </ul>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>  <!-- #box-campaign-lists -->

                </div>

            </div><!-- /.container -->

        </section>
    <?php endif; ?>




    <?php if($new_campaigns->count()): ?>
        <section class="home-campaign section-bg-gray new-home-campaigns">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title"> <?php echo app('translator')->get('app.new_campaigns'); ?> </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="box-campaign-lists">

                        <?php $__currentLoopData = $new_campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 box-campaign-item">
                                <div class="box-campaign">
                                    <div class="box-campaign-image">
                                        <a href="<?php echo e(route('campaign_single', [$nc->id, $nc->slug])); ?>"><img src="<?php echo e($nc->feature_img_url()); ?>" /> </a>
                                    </div>
                                    <div class="box-campaign-content">
                                        <div class="box-campaign-description">
                                            <h4><a href="<?php echo e(route('campaign_single', [$nc->id, $nc->slug])); ?>"> <?php echo e($nc->title); ?> </a> </h4>
                                            <p><?php echo e($nc->short_description); ?></p>
                                        </div>

                                        <div class="box-campaign-summery">
                                            <ul>
                                                <li><strong><?php echo e($nc->days_left()); ?></strong> <?php echo app('translator')->get('app.days_left'); ?></li>
                                                <li><strong><?php echo e($nc->total_payments); ?></strong> <?php echo app('translator')->get('app.backers'); ?></li>
                                                <li><strong><?php echo get_amount($nc->total_raised()); ?></strong> <?php echo app('translator')->get('app.funded'); ?></li>
                                            </ul>
                                        </div>

                                        <div class="progress">
                                            <?php
                                                $percent_raised = $nc->percent_raised();
                                            ?>
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($percent_raised); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($percent_raised <= 100 ? $percent_raised : 100); ?>%;">
                                                <?php echo e($percent_raised); ?>%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  <!-- #box-campaign-lists -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="section-footer">
                            <?php if($new_campaigns->nextPageUrl()): ?>
                                <a href="<?php echo e($new_campaigns->nextPageUrl()); ?>" class="section-action-btn loadMorePagination"> <span id="load_more_indicator"></span> <?php echo app('translator')->get('app.load_more'); ?></a>
                            <?php else: ?>
                                <a href="javascript:;" class="section-action-btn" onclick="return alert('<?php echo app('translator')->get('app.no_more_results'); ?>')"> <span></span> <?php echo app('translator')->get('app.no_more_results'); ?></a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>


            </div><!-- /.container -->
        </section>
    <?php endif; ?>

    <?php if($funded_campaigns->count()): ?>
        <section class="home-campaign section-bg-white">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title"> <?php echo app('translator')->get('app.recently_funded_campaigns'); ?> </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="box-campaign-lists">

                        <?php $__currentLoopData = $funded_campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 box-campaign-item">
                                <div class="box-campaign">
                                    <div class="box-campaign-image">
                                        <a href="<?php echo e(route('campaign_single', [$fc->id, $fc->slug])); ?>"><img src="<?php echo e($fc->feature_img_url()); ?>" /> </a>
                                    </div>
                                    <div class="box-campaign-content">
                                        <div class="box-campaign-description">
                                            <h4><a href="<?php echo e(route('campaign_single', [$fc->id, $fc->slug])); ?>"> <?php echo e($fc->title); ?> </a> </h4>
                                            <p><?php echo e($fc->short_description); ?></p>
                                        </div>

                                        <div class="box-campaign-summery">
                                            <ul>
                                                <li><strong><?php echo e($fc->days_left()); ?></strong> <?php echo app('translator')->get('app.days_left'); ?></li>
                                                <li><strong><?php echo e($fc->total_payments); ?></strong> <?php echo app('translator')->get('app.backers'); ?></li>
                                                <li><strong><?php echo get_amount($fc->total_raised()); ?></strong> <?php echo app('translator')->get('app.funded'); ?></li>
                                            </ul>
                                        </div>

                                        <div class="progress">
                                            <?php
                                                $percent_raised = $fc->percent_raised();
                                            ?>
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($percent_raised); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($percent_raised <= 100 ? $percent_raised : 100); ?>%;">
                                                <?php echo e($percent_raised); ?>%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  <!-- #box-campaign-lists -->
                </div>

            </div><!-- /.container -->
        </section>
    <?php endif; ?>

    <section class="footer-campaign-stats">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><h3><?php echo e($campaigns_count); ?></h3> <h4><?php echo app('translator')->get('app.campaigns'); ?></h4></div>
                <div class="col-md-4"> <h3><?php echo get_amount($fund_raised_count); ?></h3> <h4><?php echo app('translator')->get('app.funds_raised'); ?></h4></div>
                <div class="col-md-4"><h3><?php echo e($users_count); ?></h3> <h4><?php echo app('translator')->get('app.users'); ?></h4></div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('footer_get_start_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

    <script type="text/javascript">

        $(document).ready(function(){
            $(document).on('click', '.loadMorePagination', function (e) {
                e.preventDefault();
                var anchor = $(this);
                var page_number = anchor.attr('href').split('page=')[1];
                var new_page = parseInt(page_number) + 1;

                //Show Indicator
                $('#load_more_indicator').html('<i class="fa fa-spin fa-spinner"></i>');

                $.get( "<?php echo e(route('new_campaigns_ajax')); ?>?page="+page_number, function( data ) {
                    if( ! data.hasOwnProperty('success')){
                        anchor.attr('href',  "<?php echo e(route('new_campaigns_ajax')); ?>?page="+new_page);
                        var el = jQuery(data);
                       /* $( ".new-home-campaigns .box-campaign-lists" ).append( el ).masonry( 'appended', el, true ).masonry({
                            itemSelector : '.box-campaign-item'
                        });
                        */
                    }else{
                        anchor.html('<?php echo app('translator')->get('app.no_more_results'); ?>');
                    }

                    //Hide
                    $('#load_more_indicator').html('');

                });

            });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/home.blade.php ENDPATH**/ ?>