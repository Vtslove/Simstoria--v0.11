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

                            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data" > <?php echo csrf_field(); ?>
                            <div class="form-group <?php echo e($errors->has('name')? 'has-error':''); ?>">
                                <label for="name" class="col-sm-4 control-label"><?php echo app('translator')->get('app.name'); ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" value="<?php echo e(old('name')? old('name') : $user->name); ?>" name="name" placeholder="<?php echo app('translator')->get('app.name'); ?>">
                                    <?php echo $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':''; ?>

                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('email')? 'has-error':''); ?>">
                                <label for="email" class="col-sm-4 control-label"><?php echo app('translator')->get('app.email'); ?></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" value="<?php echo e(old('email')? old('email') : $user->email); ?>" name="email" placeholder="<?php echo app('translator')->get('app.email'); ?>">
                                    <?php echo $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':''; ?>

                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('gender')? 'has-error':''); ?>">
                                <label for="gender" class="col-sm-4 control-label"><?php echo app('translator')->get('app.gender'); ?></label>
                                <div class="col-sm-8">
                                    <select id="gender" name="gender" class="form-control select2">
                                        <option value="">Select Gender</option>
                                        <option value="male" <?php echo e($user->gender == 'male'?'selected':''); ?>>Male</option>
                                        <option value="female" <?php echo e($user->gender == 'female'?'selected':''); ?>>Fe-Male</option>
                                        <option value="third_gender" <?php echo e($user->gender == 'third_gender'?'selected':''); ?>>Third Gender</option>
                                    </select>

                                    <?php echo $errors->has('gender')? '<p class="help-block">'.$errors->first('gender').'</p>':''; ?>

                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('phone')? 'has-error':''); ?>">
                                <label for="phone" class="col-sm-4 control-label"><?php echo app('translator')->get('app.phone'); ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" value="<?php echo e(old('phone')? old('phone') : $user->phone); ?>" name="phone" placeholder="<?php echo app('translator')->get('app.phone'); ?>">
                                    <?php echo $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':''; ?>

                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('country_id')? 'has-error':''); ?>">
                                <label for="phone" class="col-sm-4 control-label"><?php echo app('translator')->get('app.country'); ?></label>
                                <div class="col-sm-8">
                                    <select id="country_id" name="country_id" class="form-control select2">
                                        <option value=""><?php echo app('translator')->get('app.select_a_country'); ?></option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>" <?php echo e($user->country_id == $country->id ? 'selected' :''); ?>><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':''; ?>

                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('address')? 'has-error':''); ?>">
                                <label for="address" class="col-sm-4 control-label"><?php echo app('translator')->get('app.address'); ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="address" value="<?php echo e(old('address')? old('address') : $user->address); ?>" name="address" placeholder="<?php echo app('translator')->get('app.address'); ?>">
                                    <?php echo $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':''; ?>

                                </div>
                            </div>

                            <div class="form-group  <?php echo e($errors->has('photo')? 'has-error':''); ?>">
                                <label class="col-sm-4 control-label"><?php echo app('translator')->get('app.change_avatar'); ?></label>
                                <div class="col-sm-8">
                                    <input type="file" id="photo" name="photo" class="filestyle" >
                                    <?php echo $errors->has('photo')? '<p class="help-block">'.$errors->first('photo').'</p>':''; ?>

                                </div>
                            </div>

                            <hr />

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.edit'); ?></button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/profile_edit.blade.php ENDPATH**/ ?>