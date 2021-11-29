<?php $__env->startSection('content'); ?>
    <section class="auth-form">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php echo app('translator')->get('app.contact_us'); ?></div>
                        <div class="panel-body">

                            <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('contact_us')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="name" class="col-md-4 control-label"><?php echo app('translator')->get('app.name'); ?> <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label"><?php echo app('translator')->get('app.email_address'); ?>  <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
                                    <label for="subject" class="col-md-4 control-label"><?php echo app('translator')->get('app.subject'); ?>  <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <input id="subject" type="subject" class="form-control" name="subject" value="<?php echo e(old('subject')); ?>" required>
                                        <?php if($errors->has('subject')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('subject')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('message') ? ' has-error' : ''); ?>">
                                    <label for="message" class="col-md-4 control-label"><?php echo app('translator')->get('app.message'); ?></label>

                                    <div class="col-md-6">
                                        <textarea name="message" class="form-control" rows="7"><?php echo e(old('message')); ?></textarea>
                                        <?php if($errors->has('message')): ?>
                                            <span class="help-block"><strong><?php echo e($errors->first('message')); ?></strong></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('project_owner') ? ' has-error' : ''); ?>">
                                    <div class="col-md-6 col-md-offset-4">
                                        <label><input type="checkbox" name="project_owner" value="Project Owner" /> <?php echo app('translator')->get('app.project_owner'); ?></label>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('project_backer') ? ' has-error' : ''); ?>">
                                    <div class="col-md-6 col-md-offset-4">
                                        <label><input type="checkbox" name="project_backer" value="Project Backer" /> <?php echo app('translator')->get('app.project_backer'); ?></label>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('other') ? ' has-error' : ''); ?>">
                                    <div class="col-md-6 col-md-offset-4">
                                        <label><input type="checkbox" name="other" value="Other" /> <?php echo app('translator')->get('app.other'); ?></label>
                                    </div>
                                </div>

                                <?php if(get_option('enable_recaptcha_contact_form') == 1): ?>
                                    <div class="form-group <?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="g-recaptcha" data-sitekey="<?php echo e(get_option('recaptcha_site_key')); ?>"></div>
                                            <?php if($errors->has('g-recaptcha-response')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo app('translator')->get('app.send_feedback'); ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php if(get_option('enable_recaptcha_contact_form') == 1): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/contact_us.blade.php ENDPATH**/ ?>