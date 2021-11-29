<?php $__env->startSection('content'); ?>

    <section class="auth-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php echo app('translator')->get('app.login_desc'); ?></div>
                        <div class="panel-body">

                            <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                            <?php if(get_option('enable_social_login') == 1): ?>
                                <div class="row row-sm-offset-3">

                                    <?php if(get_option('enable_facebook_login') == 1): ?>
                                        <div class="col-xs-6">
                                            <a href="<?php echo e(route('facebook_redirect')); ?>" class="btn btn-lg btn-block btn-facebook">
                                                <i class="fa fa-facebook visible-xs"></i>
                                                <span class="hidden-xs"><i class="fa fa-facebook-square"></i> Facebook</span>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(get_option('enable_google_login') == 1): ?>
                                        <div class="col-xs-6">
                                            <a href="<?php echo e(route('google_redirect')); ?>" class="btn btn-lg btn-block btn-google">
                                                <i class="fa fa-google-plus visible-xs"></i>
                                                <span class="hidden-xs"><i class="fa fa-google-plus-square"></i> Google+</span>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <hr />
                            <?php endif; ?>

                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label"><?php echo app('translator')->get('app.email_address'); ?></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" class="col-md-4 control-label"><?php echo app('translator')->get('app.password'); ?></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if(get_option('enable_recaptcha_login') == 1): ?>
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo app('translator')->get('app.remember_me'); ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo app('translator')->get('app.login'); ?>
                                        </button>

                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                            <?php echo app('translator')->get('app.forgot_your_password'); ?>
                                        </a>
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

<?php $__env->startSection('page-js'); ?>
    <?php if(get_option('enable_recaptcha_login') == 1): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/auth/login.blade.php ENDPATH**/ ?>