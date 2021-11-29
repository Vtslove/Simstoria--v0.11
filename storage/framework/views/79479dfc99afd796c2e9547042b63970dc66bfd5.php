<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title> <?php echo $__env->yieldContent('title'); ?> <?php echo e(get_option('Simstoria')); ?> <?php echo $__env->yieldSection(); ?> </title>

    <?php echo $__env->yieldContent('meta-data'); ?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap-theme.css')); ?>" rel="stylesheet">


    <!-- Google Fonts & Font-Awesome -->
   

    <!-- Font awesome 4.4.0 -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/font-awesome-4.4.0/css/font-awesome.min.css')); ?>">
    <!-- load page specific css -->

    <!-- main select2.css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr/toastr.min.css')); ?>">
    <!-- Conditional page load script -->
    <?php if(request()->segment(1) === 'dashboard'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/admin.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/metisMenu/dist/metisMenu.min.css')); ?>">
    <?php endif; ?>
                <!-- main style.css -->
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('page-css'); ?>

        <?php if(get_option('additional_css')): ?>
            <style type="text/css">
                <?php echo e(get_option('additional_css')); ?>

            </style>
            <?php endif; ?>
                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        </script>
</head>
<body>

<?php if(config('app.is_demo')): ?>

    <div class="demoLinkWrap" style="background: #333333; padding: 10px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <a href="https://codecanyon.net/item/getfund-a-professional-laravel-crowdfunding-platform/19769953?ref=themeqx" class="btn btn-primary" target="_blank"><i class="fa fa-shopping-cart"></i> Buy Now </a>
                    </center>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>


<?php if( ! request()->cookie('accept_cookie')): ?>
    <div class="alert alert-warning text-center cookie-notice" style="font-size: 16px; margin: 0; line-height: 25px;">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo get_option('cookie_message'); ?></p>
                    <a href="#" class="cookie-ok-btn btn btn-primary">Ok</a>
                    <a href="<?php echo get_post_url(get_option('cookie_learn_page')); ?>">Learn More</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="top-navbar" style="background-color: #575757;box-sizing: initial;border-width: medium">


    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                                <?php if(get_option('logo_settings') == 'show_site_name'): ?>
                                    <?php echo e(get_option('site_name')); ?>

                                <?php else: ?>
                                    <?php if(logo_url()): ?>
                                        <img class="main-logo" src="public/logo/logo.ico" />
                                    <?php else: ?>
                                        <?php echo e(get_option('Simstoria')); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">


                                <?php
                                $header_menu_pages = \App\Post::whereStatus('1')->where('show_in_header_menu', 1)->get();
                                ?>
                                <?php if($header_menu_pages->count() > 0): ?>
                                    <?php $__currentLoopData = $header_menu_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('single_page', $page->slug)); ?>"><?php echo e($page->title); ?> </a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <li><a href="<?php echo e(route('contact_us')); ?>"> <?php echo app('translator')->get(''); ?></a></li>

                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo e(route('start_campaign')); ?>" class="top-start-btn" style="background-color: #787878;border-radius: 20px;" ><?php echo app('translator')->get('Make a story'); ?></a></li>

                                <!-- Authentication Links -->
                                <?php if(Auth::guest()): ?>
                                    <li><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('app.login'); ?></a></li>
                                    <li><a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('app.register'); ?></a></li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?php echo e(route('dashboard')); ?>"> <i class="fa fa-dashboard"></i> <?php echo app('translator')->get('app.dashboard'); ?> </a>
                                                <a href="<?php echo e(route('logout')); ?>"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i> <?php echo app('translator')->get('app.logout'); ?>
                                                </a>

                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>

                            <form action="<?php echo e(route('search')); ?>" class="navbar-form navbar-right search-form" method="get">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="q" placeholder="<?php echo app('translator')->get('Find ideas'); ?>">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> </button>
                            </form>

                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>

        </div>

    </div>

</div>
<?php /**PATH B:\OpenServer\domains\Engine\resources\views/layouts/header.blade.php ENDPATH**/ ?>