<?php $__env->startSection('title'); ?> <?php if(! empty($title)): ?> <?php echo e($title); ?> <?php endif; ?> - ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## <?php $__env->stopSection(); ?>

<?php
$auth_user = \Illuminate\Support\Facades\Auth::user();
?>

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

                    <?php if($auth_user->is_admin()): ?>
                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo e($pending_campaign_count); ?></div>
                                                <div><?php echo app('translator')->get('app.pending_campaigns'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo e($active_campaign_count); ?></div>
                                                <div><?php echo app('translator')->get('app.active_campaigns'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo e($blocked_campaign_count); ?></div>
                                                <div><?php echo app('translator')->get('app.blocked_campaigns'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo e($payment_created); ?></div>
                                                <div><?php echo app('translator')->get('app.payment_created'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo get_amount($payment_amount); ?></div>
                                                <div><?php echo app('translator')->get('app.total_payments'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo e($user_count); ?></div>
                                                <div><?php echo app('translator')->get('app.users'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge">
                                                    <?php
                                                    $campaign_owner_comission = get_option('campaign_owner_commission');
                                                    ?>
                                                    <?php echo e(get_option('campaign_owner_commission')); ?>%
                                                </div>
                                                <div><?php echo app('translator')->get('app.campaign_owner_will_receive'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo e(100 - $campaign_owner_comission); ?>%</div>
                                                <div><?php echo app('translator')->get('app.platform_owner_will_receive'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">


                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge">
                                                    <?php
                                                    $platform_owner_commission = ( (100 - $campaign_owner_comission) * $payment_amount ) / 100;
                                                    ?>

                                                    <?php echo get_amount($platform_owner_commission); ?>

                                                </div>
                                                <div><?php echo app('translator')->get('app.platform_owner_commission'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge">
                                                    <?php echo get_amount($payment_amount - $platform_owner_commission); ?>

                                                </div>
                                                <div><?php echo app('translator')->get('app.campaign_owner_commission'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="huge"><?php echo get_amount($pending_payment_amount); ?></div>
                                                <div><?php echo app('translator')->get('app.pending_payment_amount'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo app('translator')->get('app.last_pending_campaigns'); ?>
                                </div>

                                <?php if($pending_campaigns->count() > 0): ?>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th><?php echo app('translator')->get('app.title'); ?></th>
                                                <th><?php echo app('translator')->get('app.by'); ?></th>
                                            </tr>

                                            <?php $__currentLoopData = $pending_campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($pc->title); ?></td>
                                                    <td><?php echo e($pc->user->name); ?> <br /> <?php echo e($pc->user->email); ?> </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </table>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo app('translator')->get('app.last_ten_payment'); ?>
                                </div>

                                <div class="panel-body">

                                    <?php if($last_payments->count() > 0): ?>
                                        <table class="table table-striped table-bordered">

                                            <tr>
                                                <th><?php echo app('translator')->get('app.campaign_title'); ?></th>
                                                <th><?php echo app('translator')->get('app.payer_email'); ?></th>
                                                <th><?php echo app('translator')->get('app.amount'); ?></th>
                                                <th><?php echo app('translator')->get('app.time'); ?></th>
                                                <th>#</th>
                                                <th>#</th>
                                            </tr>

                                            <?php $__currentLoopData = $last_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td>
                                                        <?php if($payment->campaign): ?>
                                                            <a href="<?php echo e(route('payment_view', $payment->id)); ?>"><?php echo e($payment->campaign->title); ?></a>
                                                        <?php else: ?>
                                                            <?php echo app('translator')->get('app.campaign_deleted'); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><a href="<?php echo e(route('payment_view', $payment->id)); ?>"> <?php echo e($payment->email); ?> </a></td>
                                                    <td><?php echo get_amount($payment->amount); ?></td>
                                                    <td><span data-toggle="tooltip" title="<?php echo e($payment->created_at->format('F d, Y h:i a')); ?>"><?php echo e($payment->created_at->format('F d, Y')); ?></span></td>

                                                    <td>
                                                        <?php if($payment->reward): ?>
                                                            <a href="<?php echo e(route('payment_view', $payment->id)); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('app.selected_reward'); ?>">
                                                                <i class="fa fa-gift"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><a href="<?php echo e(route('payment_view', $payment->id)); ?>"><i class="fa fa-eye"></i> </a></td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </table>

                                    <?php else: ?>
                                        <?php echo app('translator')->get('app.no_campaigns_to_display'); ?>
                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>