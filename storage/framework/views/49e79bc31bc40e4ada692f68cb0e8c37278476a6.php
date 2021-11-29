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

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="profile-avatar">
                                <img src="<?php echo e($user->get_gravatar(100)); ?>" class="img-thumbnail img-circle" width="100"  alt=""/>
                            </div>

                            <table class="table table-bordered table-striped">

                                <tr>
                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                    <td><?php echo e($user->name); ?></td>
                                </tr>

                                <tr>
                                    <th><?php echo app('translator')->get('app.email'); ?></th>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('app.gender'); ?></th>
                                    <td><?php echo e(ucfirst($user->gender)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('app.phone'); ?></th>
                                    <td><?php echo e($user->phone); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('app.address'); ?></th>
                                    <td><?php echo e($user->address); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('app.country'); ?></th>
                                    <td>
                                        <?php if($user->country): ?>
                                            <?php echo e($user->country->name); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th><?php echo app('translator')->get('app.status'); ?></th>
                                    <td><?php echo e($user->status_context()); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('app.contributed'); ?></th>
                                    <td>
                                        <?php $total_contributed = $user->contributed_amount(); ?>
                                        <?php if($total_contributed > 0): ?>
                                            <?php echo get_amount($total_contributed); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            <?php if( ! empty($is_user_id_view)): ?>
                                <a href="<?php echo e(route('users_edit', $user->id)); ?>"><i class="fa fa-pencil-square-o"></i> <?php echo app('translator')->get('Update Profile'); ?> </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('profile_edit')); ?>"><i class="fa fa-pencil-square-o"></i> <?php echo app('translator')->get('Update Profile'); ?> </a>
                            <?php endif; ?>

                        </div>
                    </div>


                </div>   <!-- /#page-wrapper -->




            </div>   <!-- /#wrapper -->


        </div> <!-- /#container -->
    </div> <!-- /#dashboard wrap -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/profile.blade.php ENDPATH**/ ?>