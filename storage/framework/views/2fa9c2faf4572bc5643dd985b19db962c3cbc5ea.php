<?php
    $auth_user = \Illuminate\Support\Facades\Auth::user();
?>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard fa-fw"></i> <?php echo app('translator')->get('app.dashboard'); ?></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-bullhorn"></i> <?php echo app('translator')->get('app.my_campaigns'); ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>  <a href="<?php echo e(route('my_campaigns')); ?>"><?php echo app('translator')->get('app.my_campaigns'); ?></a> </li>
                    <li>  <a href="<?php echo e(route('start_campaign')); ?>"><?php echo app('translator')->get('app.start_a_campaign'); ?></a> </li>
                    <li>  <a href="<?php echo e(route('my_pending_campaigns')); ?>"><?php echo app('translator')->get('app.pending_campaigns'); ?></a> </li>
                </ul>
            </li>

            <?php if($auth_user->is_admin()): ?>
                <li> <a href="<?php echo e(route('categories')); ?>"><i class="fa fa-folder-o"></i> <?php echo app('translator')->get('app.categories'); ?></a>  </li>
                <li>
                    <a href="#"><i class="fa fa-bullhorn"></i> <?php echo app('translator')->get('app.campaigns'); ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="<?php echo e(route('all_campaigns')); ?>"><?php echo app('translator')->get('app.all_campaigns'); ?></a> </li>
                        <li> <a href="<?php echo e(route('staff_picks')); ?>"><?php echo app('translator')->get('app.staff_picks'); ?></a> </li>
                        <li> <a href="<?php echo e(route('funded')); ?>"><?php echo app('translator')->get('app.funded'); ?></a> </li>
                        <li> <a href="<?php echo e(route('blocked_campaigns')); ?>"><?php echo app('translator')->get('app.blocked_campaigns'); ?></a> </li>
                        <li> <a href="<?php echo e(route('pending_campaigns')); ?>"><?php echo app('translator')->get('app.pending_campaigns'); ?></a> </li>
                        <li> <a href="<?php echo e(route('expired_campaigns')); ?>"><?php echo app('translator')->get('app.expired_campaigns'); ?></a> </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo app('translator')->get('app.settings'); ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="<?php echo e(route('general_settings')); ?>"><?php echo app('translator')->get('app.general_settings'); ?></a> </li>
                        <li> <a href="<?php echo e(route('payment_settings')); ?>"><?php echo app('translator')->get('app.payment_settings'); ?></a> </li>
                        <li> <a href="<?php echo e(route('theme_settings')); ?>"><?php echo app('translator')->get('app.theme_settings'); ?></a> </li>
                        <li> <a href="<?php echo e(route('social_settings')); ?>"><?php echo app('translator')->get('app.social_settings'); ?></a> </li>
                        <li> <a href="<?php echo e(route('re_captcha_settings')); ?>"><?php echo app('translator')->get('app.re_captcha_settings'); ?></a> </li>
                        <li> <a href="<?php echo e(route('other_settings')); ?>"><?php echo app('translator')->get('app.other_settings'); ?></a> </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li> <a href="<?php echo e(route('pages')); ?>"><i class="fa fa-file-word-o"></i> <?php echo app('translator')->get('app.pages'); ?></a>  </li>

                <li> <a href="<?php echo e(route('users')); ?>"><i class="fa fa-users"></i> <?php echo app('translator')->get('app.users'); ?></a>  </li>
                <li> <a href="<?php echo e(route('withdrawal_requests')); ?>"><i class="fa fa-balance-scale"></i> <?php echo app('translator')->get('app.withdrawal_requests'); ?></a>  </li>
            <?php endif; ?>

            <li> <a href="<?php echo e(route('payments')); ?>"><i class="fa fa-money"></i> <?php echo app('translator')->get('app.payments'); ?></a>  </li>
            <li> <a href="<?php echo e(route('withdraw')); ?>"><i class="fa fa-credit-card"></i> <?php echo app('translator')->get('app.withdraw'); ?></a>  </li>
            <li> <a href="<?php echo e(route('profile')); ?>"><i class="fa fa-user"></i> <?php echo app('translator')->get('app.profile'); ?></a>  </li>
            <li> <a href="<?php echo e(route('change_password')); ?>"><i class="fa fa-lock"></i> <?php echo app('translator')->get('app.change_password'); ?></a>  </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->

    <p class="poweredby-text"><a> by Samkin v.0.11</a> </p>

</div>
<?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/menu.blade.php ENDPATH**/ ?>