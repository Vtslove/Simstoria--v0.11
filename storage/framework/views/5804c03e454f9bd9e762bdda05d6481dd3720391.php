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
                                <h1 class="page-header"> <?php echo e($title); ?> <a class="btn btn-primary pull-right" href="<?php echo e(route('payments_pending')); ?>"><?php echo app('translator')->get('app.pending_payments'); ?></a> </h1>
                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    <?php endif; ?>

                    <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <div class="admin-campaign-lists">

                        <div class="row">
                            <div class="col-md-5">
                                <?php echo app('translator')->get('app.total'); ?> : <?php echo e($payments->count()); ?>

                            </div>

                            <div class="col-md-7">

                                <form class="form-inline" method="get" action="">
                                    <div class="form-group">
                                        <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" placeholder="<?php echo app('translator')->get('app.payer_email'); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-default"><?php echo app('translator')->get('app.search'); ?></button>
                                </form>

                            </div>
                        </div>

                    </div>

                    <?php if($payments->count() > 0): ?>
                        <table class="table table-striped table-bordered">

                            <tr>
                                <th><?php echo app('translator')->get('app.campaign_title'); ?></th>
                                <th><?php echo app('translator')->get('app.payer_email'); ?></th>
                                <th><?php echo app('translator')->get('app.amount'); ?></th>
                                <th><?php echo app('translator')->get('app.method'); ?></th>
                                <th><?php echo app('translator')->get('app.time'); ?></th>
                                <th>#</th>
                                <th>#</th>
                                <th width="90">#</th>
                            </tr>

                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <td><?php echo e($payment->payment_method); ?></td>
                                    <td><span data-toggle="tooltip" title="<?php echo e($payment->created_at->format('F d, Y h:i a')); ?>"><?php echo e($payment->created_at->format('F d, Y')); ?></span></td>

                                    <td>
                                        <?php if($payment->reward): ?>
                                            <a href="<?php echo e(route('payment_view', $payment->id)); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('app.selected_reward'); ?>">
                                                <i class="fa fa-gift"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($payment->status == 'success'): ?>
                                            <span class="text-success" data-toggle="tooltip" title="<?php echo e($payment->status); ?>"><i class="fa fa-check-circle-o"></i> </span>
                                        <?php else: ?>
                                            <span class="text-warning" data-toggle="tooltip" title="<?php echo e($payment->status); ?>"><i class="fa fa-exclamation-circle"></i> </span>
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('payment_view', $payment->id)); ?>" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> </a>

                                        <a href="<?php echo e(route('payment_delete', $payment->id)); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-eye"></i> </a>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>

                        <?php echo $payments->links(); ?>


                    <?php else: ?>
                        <?php echo app('translator')->get('app.no_data'); ?>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/payments.blade.php ENDPATH**/ ?>