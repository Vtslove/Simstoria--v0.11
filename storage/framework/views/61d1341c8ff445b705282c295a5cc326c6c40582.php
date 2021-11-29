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
                        <div class="col-sm-8 col-sm-offset-1 col-xs-12">

                            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data" > <?php echo csrf_field(); ?>

                                <div class="form-group <?php echo e($errors->has('old_password')? 'has-error' : ''); ?>">
                                    <label class="col-sm-3 control-label" for="old_password"><?php echo app('translator')->get('app.old_password'); ?> *</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="old_password" id="old_password" class="form-control" value="" autocomplete="off" placeholder="<?php echo app('translator')->get('app.old_password'); ?> " />
                                        <?php echo $errors->has('old_password')? '<p class="help-block"> '.$errors->first('old_password').' </p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('new_password')? 'has-error' : ''); ?>">
                                    <label class="col-sm-3 control-label" for="new_password"><?php echo app('translator')->get('app.new_password'); ?> *</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password" id="new_password" class="form-control" value="" autocomplete="off" placeholder="<?php echo app('translator')->get('app.new_password'); ?>" />
                                        <?php echo $errors->has('new_password')? '<p class="help-block"> '.$errors->first('new_password').' </p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('new_password_confirmation')? 'has-error' : ''); ?>">
                                    <label class="col-sm-3 control-label" for="new_password_confirmation"><?php echo app('translator')->get('app.new_password_confirmation'); ?> *</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" value="" autocomplete="off" placeholder="<?php echo app('translator')->get('app.old_password_confirmation'); ?>" />
                                        <?php echo $errors->has('new_password_confirmation')? '<p class="help-block"> '.$errors->first('new_password_confirmation').' </p>':''; ?>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-10">
                                        <button type="submit" class="btn btn-info"><?php echo app('translator')->get('app.change_password'); ?></button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>   <!-- /#page-wrapper -->
            </div>   <!-- /#wrapper -->


        </div> <!-- /#container -->
    </div> <!-- /#dashboard wrap -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/change_password.blade.php ENDPATH**/ ?>