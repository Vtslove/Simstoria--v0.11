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
                                <h1 class="page-header"> <?php echo e($title); ?>


                                    <a href="<?php echo e(route('withdrawal_preference')); ?>" class="btn btn-primary pull-right"><i class="fa fa-money"></i> <?php echo app('translator')->get('app.withdrawal_preference'); ?></a>
                                </h1>

                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    <?php endif; ?>

                    <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->get('app.campaign_title'); ?></th>
                            <th><?php echo app('translator')->get('app.raised'); ?></th>
                            <th><?php echo app('translator')->get('app.your_commission'); ?></th>
                            <th><?php echo app('translator')->get('app.action'); ?></th>
                        </tr>

                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <a href="<?php echo e(route('campaign_single', [$campaign->id, $campaign->slug])); ?>" target="_blank"> <?php echo e($campaign->title); ?> </a> </td>
                                <td><?php echo get_amount($campaign->amount_raised()->amount_raised); ?></td>
                                <td><?php echo get_amount($campaign->amount_raised()->campaign_owner_commission); ?> (<?php echo e($campaign->campaign_owner_commission); ?>%)</td>

                                <td>
                                    <?php if($campaign->is_ended()): ?>
                                        <?php if($campaign->requested_withdrawal): ?>
                                            <?php echo e($campaign->requested_withdrawal->status); ?>

                                        <?php else: ?>
                                            <a href="javascript:;" class="btn btn-info btn-xs" data-toggle="modal" data-target="#<?php echo e($campaign->id); ?>-withdraw-modal">
                                                <?php echo app('translator')->get('app.withdraw'); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('app.running'); ?>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                    <?php if($withdrawal_requests->count() > 0): ?>
                        <h3><?php echo app('translator')->get('app.all_withdrawals'); ?></h3>

                        <table class="table table-bordered table-striped">

                            <tr>
                                <th><?php echo app('translator')->get('app.campaign'); ?></th>
                                <th><?php echo app('translator')->get('app.method'); ?></th>
                                <th><?php echo app('translator')->get('app.amount'); ?></th>
                                <th><?php echo app('translator')->get('app.status'); ?></th>
                                <th><?php echo app('translator')->get('app.date'); ?></th>
                                <th>#</th>
                            </tr>


                            <?php $__currentLoopData = $withdrawal_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td> <?php if($withdraw->campaign): ?> <?php echo e($withdraw->campaign->title); ?> <?php endif; ?></td>
                                <td><?php echo e($withdraw->withdrawal_account); ?></td>
                                <td><?php echo get_amount($withdraw->withdrawal_amount); ?></td>
                                <td><?php echo e($withdraw->status); ?></td>
                                <td><?php echo e($withdraw->created_at->format('jS F, Y')); ?></td>
                                <td><a href="<?php echo e(route('withdraw_request_view', $withdraw->id)); ?>" class="btn-link"><i class="fa fa-eye"></i> </a> </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </table>

                    <?php endif; ?>



                <!-- Withdrawal Modal -->

                    <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="modal fade" id="<?php echo e($campaign->id); ?>-withdraw-modal" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('app.your_withdraw_amount'); ?> <strong><?php echo get_amount($campaign->amount_raised()->campaign_owner_commission); ?></strong> </h4>
                                    </div>
                                    <div class="modal-body">

                                        <h4><?php echo app('translator')->get('app.default_withdrawal_account'); ?>: <strong><?php echo e(withdrawal_preference()); ?></strong>   <a href="<?php echo e(route('withdrawal_preference')); ?>" class="btn xs btn-link"><?php echo app('translator')->get('app.update'); ?> </a> </h4>

                                        <h5><?php echo app('translator')->get('app.withdrawal_method_details'); ?></h5>


                                        <table class="table table-bordered table-striped">

                                            <?php if(withdrawal_preference() == 'paypal'): ?>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.paypal_email'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('paypal_email')); ?></td>
                                                </tr>
                                            <?php elseif(withdrawal_preference() == 'bank'): ?>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.bank_account_holders_name'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('bank_account_holders_name')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.bank_account_number'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('bank_account_number')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.swift_code'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('swift_code')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.bank_name_full'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('bank_name_full')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.bank_branch_name'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('bank_branch_name')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.bank_branch_city'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('bank_branch_city')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.bank_branch_address'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('bank_branch_address')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.country'); ?></th>
                                                    <td><?php echo e(withdrawal_preference('country_name')); ?></td>
                                                </tr>

                                            <?php endif; ?>

                                        </table>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                            <div class="col-md-6">
                                                <form action="" method="post" > <?php echo csrf_field(); ?>

                                                <input type="hidden" name="withdrawal_campaign_id" value="<?php echo e($campaign->id); ?>" />
                                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.submit_request'); ?></button>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- #End Withdrawal Modal -->



                </div>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/withdraw.blade.php ENDPATH**/ ?>