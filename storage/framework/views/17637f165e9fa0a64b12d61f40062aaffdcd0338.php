<?php $__env->startSection('title'); ?> <?php if(! empty($title)): ?> <?php echo e($title); ?> <?php endif; ?> - ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css')); ?>">
<?php $__env->stopSection(); ?>

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
                        <div class="col-md-10 col-xs-12">

                            <form action="" id="startCampaignForm" class="form-horizontal" method="post" >
                                <?php echo csrf_field(); ?>

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> <?php echo app('translator')->get('app.feature_available_info'); ?>
                                    </div>
                                </div>

                                <legend><?php echo app('translator')->get('app.campaign_info'); ?></legend>

                                <div class="form-group  <?php echo e($errors->has('category')? 'has-error':''); ?>">
                                    <label for="category" class="col-sm-4 control-label"><?php echo app('translator')->get('app.category'); ?> <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" name="category">
                                            <option value=""><?php echo app('translator')->get('app.select_a_category'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo $errors->has('category')? '<p class="help-block">'.$errors->first('category').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('title')? 'has-error':''); ?>">
                                    <label for="title" class="col-sm-4 control-label"><?php echo app('translator')->get('app.title'); ?> <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title" value="<?php echo e(old('title')); ?>" name="title" placeholder="<?php echo app('translator')->get('app.title'); ?>">
                                        <?php echo $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':''; ?>

                                        <p class="text-info"> <?php echo app('translator')->get('app.great_title_info'); ?></p>
                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('short_description')? 'has-error':''); ?>">
                                    <label for="short_description" class="col-sm-4 control-label"><?php echo app('translator')->get('app.short_description'); ?></label>
                                    <div class="col-sm-8">
                                        <textarea name="short_description" class="form-control" rows="3"><?php echo e(old('short_description')); ?></textarea>
                                        <?php echo $errors->has('short_description')? '<p class="help-block">'.$errors->first('short_description').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('description')? 'has-error':''); ?>">
                                    <label for="description" class="col-sm-3 control-label"><?php echo app('translator')->get('app.description'); ?> <span class="field-required">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="alert alert-info"> <?php echo app('translator')->get('app.image_insert_limitation'); ?> </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="description" class="form-control description" rows="8"><?php echo e(old('description')); ?></textarea>
                                        <?php echo $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':''; ?>

                                        <p class="text-info"> <?php echo app('translator')->get('app.description_info_text'); ?></p>
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <h3> <i class="fa fa-money"></i> <?php echo app('translator')->get('app.you_will_get'); ?> <?php echo e(get_option('campaign_owner_commission')); ?>% <?php echo app('translator')->get('app.of_total_raised'); ?></h3>
                                </div>
                                <div class="form-group <?php echo e($errors->has('goal')? 'has-error':''); ?>">
                                    <label for="goal" class="col-sm-4 control-label"><?php echo app('translator')->get('app.goal'); ?> <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="goal" value="<?php echo e(old('goal')); ?>" name="goal" placeholder="<?php echo app('translator')->get('app.goal'); ?>">
                                        <?php echo $errors->has('goal')? '<p class="help-block">'.$errors->first('goal').'</p>':''; ?>

                                    </div>
                                </div>

                                
                                <div class="form-group <?php echo e($errors->has('recommended_amount')? 'has-error':''); ?>">
                                    <label for="recommended_amount" class="col-sm-4 control-label"><?php echo app('translator')->get('app.recommended_amount'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="recommended_amount" value="<?php echo e(old('recommended_amount')); ?>" name="recommended_amount" placeholder="<?php echo app('translator')->get('app.recommended_amount'); ?>">
                                        <?php echo $errors->has('recommended_amount')? '<p class="help-block">'.$errors->first('recommended_amount').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('amount_prefilled')? 'has-error':''); ?>">
                                    <label for="amount_prefilled" class="col-sm-4 control-label"><?php echo app('translator')->get('app.amount_prefilled'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="amount_prefilled" value="<?php echo e(old('amount_prefilled')); ?>" name="amount_prefilled" placeholder="<?php echo app('translator')->get('app.amount_prefilled'); ?>">
                                        <?php echo $errors->has('amount_prefilled')? '<p class="help-block">'.$errors->first('amount_prefilled').'</p>':''; ?>

                                        <p class="text-info"> <?php echo app('translator')->get('app.amount_prefilled_info_text'); ?></p>

                                    </div>
                                </div>


                                <div class="form-group <?php echo e($errors->has('end_method')? 'has-error':''); ?>">
                                    <label for="end_method" class="col-sm-4 control-label"><?php echo app('translator')->get('app.campaign_end_method'); ?></label>
                                    <div class="col-sm-8">

                                        <label>
                                            <input type="radio" name="end_method"  value="goal_achieve" <?php if( ! old('end_method') || old('end_method') == 'goal_achieve'): ?> checked="checked" <?php endif; ?> > <?php echo app('translator')->get('app.after_goal_achieve'); ?>
                                        </label> <br />

                                        <label>
                                            <input type="radio" name="end_method" value="end_date"  <?php if(old('end_method') == 'end_date'): ?> checked="checked" <?php endif; ?> > <?php echo app('translator')->get('app.after_end_date'); ?>
                                        </label> <br />

                                        

                                        <?php echo $errors->has('end_method')? '<p class="help-block">'.$errors->first('end_method').'</p>':''; ?>


                                        <p class="text-info"> <?php echo app('translator')->get('app.end_method_info_text'); ?></p>
                                    </div>
                                </div>


                                <div class="form-group <?php echo e($errors->has('video')? 'has-error':''); ?>">
                                    <label for="video" class="col-sm-4 control-label"><?php echo app('translator')->get('app.video'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="video" value="<?php echo e(old('video')); ?>" name="video" placeholder="<?php echo app('translator')->get('app.video'); ?>">
                                        <?php echo $errors->has('video')? '<p class="help-block">'.$errors->first('video').'</p>':''; ?>

                                        <p class="text-info"> <?php echo app('translator')->get('app.video_info_text'); ?></p>
                                    </div>
                                </div>


                                <div class="form-group  <?php echo e($errors->has('country_id')? 'has-error':''); ?>">
                                    <label for="country_id" class="col-sm-4 control-label"><?php echo app('translator')->get('app.country'); ?><span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" name="country_id">

                                            <option value=""><?php echo app('translator')->get('app.select_a_country'); ?></option>

                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <?php echo $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('address')? 'has-error':''); ?>">
                                    <label for="address" class="col-sm-4 control-label"><?php echo app('translator')->get('app.address'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" value="<?php echo e(old('address')); ?>" name="address" placeholder="<?php echo app('translator')->get('app.address'); ?>">
                                        <?php echo $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('start_date')? 'has-error':''); ?>">
                                    <label for="start_date" class="col-sm-4 control-label"><?php echo app('translator')->get('app.start_date'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="start_date" value="<?php echo e(old('start_date')); ?>" name="start_date" placeholder="<?php echo app('translator')->get('app.start_date'); ?>">
                                        <?php echo $errors->has('start_date')? '<p class="help-block">'.$errors->first('start_date').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group <?php echo e($errors->has('end_date')? 'has-error':''); ?>">
                                    <label for="end_date" class="col-sm-4 control-label"><?php echo app('translator')->get('app.end_date'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="end_date" value="<?php echo e(old('end_date')); ?>" name="end_date" placeholder="<?php echo app('translator')->get('app.end_date'); ?>">
                                        <?php echo $errors->has('end_date')? '<p class="help-block">'.$errors->first('end_date').'</p>':''; ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.submit_new_campaign'); ?></button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/ckeditor/ckeditor.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replaceClass = 'description';
        });

        $(function () {
            $('#start_date, #end_date').datetimepicker({format: 'YYYY-MM-DD'});
        });



    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\OpenServer\domains\Engine\resources\views/admin/start_campaign.blade.php ENDPATH**/ ?>