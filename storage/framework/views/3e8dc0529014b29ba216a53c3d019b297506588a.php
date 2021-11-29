<?php $__env->startSection('title'); ?> <?php if(! empty($title)): ?> <?php echo e($title); ?> <?php endif; ?> - ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="dashboard-wrap">
        <div class="container">
            <div id="wrapper">

                <?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div id="page-wrapper">

                    <?php if( ! empty($title)): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"> <?php echo e($title); ?>  </h1>
                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    <?php endif; ?>

                    <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if($my_campaigns->count() > 0): ?>
                        <table class="table table-striped table-bordered">

                            <?php $__currentLoopData = $my_campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <td width="70"><img src="<?php echo e($campaign->feature_img_url()); ?>" class="img-responsive" /></td>
                                    <td><?php echo e($campaign->title); ?></td>

                                    <td>
                                        <?php if( ! $campaign->is_ended()): ?>
                                        <a href="<?php echo e(route('edit_campaign', $campaign->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> </a>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('campaign_single', [$campaign->id, $campaign->slug])); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>

                    <?php else: ?>
                        <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo app('translator')->get('app.no_campaigns_to_display'); ?> </div>
                    <?php endif; ?>



                </div>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/my_campaigns.blade.php ENDPATH**/ ?>