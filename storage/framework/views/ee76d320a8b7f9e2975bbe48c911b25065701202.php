<footer style="background-color: #0f0f0f" >
    <div class="container footer-top" style="background-color: #0f0f0f">

        <div class="row">

            <div class="col-md-3">
                <div class="footer-about">
                    <h4 class="footer-widget-title"><?php echo app('translator')->get('app.about_us'); ?> </h4>
                    <div class="clearfix"></div>
                    <?php echo nl2br(get_option('footer_about_us')); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h4 class="footer-widget-title"><?php echo app('translator')->get('app.contact_info'); ?> </h4>
                    <ul class="contact-info">
                        <?php echo get_option('footer_address'); ?>

                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h4 class="footer-widget-title"><?php echo app('translator')->get('app.campaigns'); ?> </h4>
                    <ul class="contact-info">
                        <li><a href="<?php echo e(route('start_campaign')); ?>"><?php echo app('translator')->get('app.kill_a_yourself'); ?></a> </li>
                        <li><a href="<?php echo e(route('browse_categories')); ?>"><?php echo app('translator')->get('app.discover_campaign'); ?></a> </li>
                        <li><a href="<?php echo e(route('checkout')); ?>"><?php echo app('translator')->get('app.checkout'); ?></a> </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h4 class="footer-widget-title"><?php echo app('translator')->get('app.about_us'); ?> </h4>
                    <ul class="contact-info">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('app.home'); ?></a> </li>
                        <?php
                        $show_in_footer_menu = \App\Post::whereStatus('1')->where('show_in_footer_menu', 1)->get();
                        ?>
                        <?php if($show_in_footer_menu->count() > 0): ?>
                            <?php $__currentLoopData = $show_in_footer_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('single_page', $page->slug)); ?>"><?php echo e($page->title); ?> </a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('contact_us')); ?>"> <?php echo app('translator')->get('app.contact_us'); ?></a></li>

                    </ul>
                </div>
            </div>

        </div><!-- #row -->
    </div>


    <div class="container footer-bottom">
        <div class="row">
            <div class="col-md-12">
                <p class="footer-copyright"> <?php echo get_text_tpl(get_option('By Samkin')); ?> </p>
            </div>
        </div>
    </div>

</footer>

<!-- Scripts -->
<script src="<?php echo e(asset('assets/js/jquery-1.11.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/toastr/toastr.min.js')); ?>"></script>

<!-- Conditional page load script -->
<?php if(request()->segment(1) === 'dashboard'): ?>
    <script src="<?php echo e(asset('assets/plugins/metisMenu/dist/metisMenu.min.js')); ?>"></script>
    <script>
        $(function() {
            $('#side-menu').metisMenu();
        });
    </script>
<?php endif; ?>



<script>
    var toastr_options = {closeButton : true};


    //Cookie Notice

    $('.cookie-ok-btn').click(function(e){
        e.preventDefault();
        var element = $(this);
        $.ajax({
            type : 'post',
            url : '<?php echo e(route('cookie_accept')); ?>',
            data: {cookie_accept: true, _token : '<?php echo e(csrf_token()); ?>'},
            success: function(data){
                if (data.accept_cookie){
                    element.closest('.cookie-notice').slideUp();
                }
            }
        });
    });

</script>
<script>
   /* $('.box-campaign-lists').masonry({
        itemSelector : '.box-campaign-item'
    });*/
</script>
<?php echo $__env->yieldContent('page-js'); ?>

<?php if(get_option('additional_js') && get_option('additional_js') !== 'additional_js'): ?>
<?php echo get_option('additional_js'); ?>

<?php endif; ?>

</body>
</html>
<?php /**PATH B:\OpenServer\domains\Engine\resources\views/layouts/footer.blade.php ENDPATH**/ ?>