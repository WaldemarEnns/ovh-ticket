<?php $__env->startSection('styles'); ?>


<!-- INTERNAl Summernote css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAl color css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/colorpickr/themes/nano.min.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAL Sweet-Alert css -->
<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!--Page header-->
<div class="page-header d-xl-flex d-block">
<div class="page-leftheader">
    <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('General Setting', 'menu')); ?></span></h4>
</div>
</div>
<!--End Page header-->

<div class="row">
<!-- App Title & Logos -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('App Title & Logos', 'setting')); ?></h4>
        </div>
        <form method="POST" action="<?php echo e(url('/admin/general')); ?>" enctype="multipart/form-data">
        <div class="card-body" >
                <?php echo csrf_field(); ?>

                <?php echo view('honeypot::honeypotFormFields'); ?>
                <input type="hidden" class="form-control" name="id" Value="<?php echo e($basic->id); ?>">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e(lang('Title')); ?> <span class="text-red">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" Value="<?php echo e($basic->title); ?>" >
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e(lang($message)); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-12 col-lg-12">
                        <div class="spfileupload">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9 col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <div class="<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> ">
                                            <label class="form-label fs-16"><?php echo e(lang('Upload Light-Logo', 'setting')); ?></label>
                                            <div class="input-group file-browser">
                                                <input class="form-control " name="image" type="file" >

                                            </div>
                                            <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                        </div>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e(lang($message)); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3">
                                    <div class="file-image-1 ms-sm-auto sprukologoss ms-sm-auto">
                                        <div class="product-image sprukologoimages">
                                            <?php if($title->image == null): ?>


                                            <img src="<?php echo e(asset('uploads/logo/logo/logo-white.png')); ?>" class="br-5" alt="logo">
                                            <?php else: ?>

                                            <button class="btn ticketnotedelete border-white text-gray logosdelete" value="logo1" data-id="<?php echo e($title->id); ?>">
                                                <i class="feather feather-x" ></i>
                                            </button>
                                            <img src="<?php echo e(asset('uploads/logo/logo/'.$title->image)); ?>" class="br-5" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12 col-lg-12">
                        <div class="spfileupload">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9 col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <div class="<?php $__errorArgs = ['image1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="form-label fs-16"><?php echo e(lang('Upload Dark-Logo', 'setting')); ?></label>
                                            <div class="input-group file-browser">
                                                <input class="form-control " name="image1" type="file" >
                                            </div>
                                            <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                        </div>
                                        <?php $__errorArgs = ['image1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e(lang($message)); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3">
                                    <div class="file-image-1 ms-sm-auto">
                                        <div class="product-image sprukologoimages">
                                            <?php if($title->image1 == null): ?>

                                            <img src="<?php echo e(asset('uploads/logo/darklogo/logo.png')); ?>" class="br-5" alt="logo">
                                            <?php else: ?>

                                            <button class="btn ticketnotedelete border-white text-gray logosdelete" value="logo2" data-id="<?php echo e($title->id); ?>">
                                                <i class="feather feather-x" ></i>
                                            </button>
                                            <img src="<?php echo e(asset('uploads/logo/darklogo/'.$title->image1)); ?>" class="br-5" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12 col-lg-12">
                        <div class="spfileupload">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9 col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <div class="<?php $__errorArgs = ['image2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="form-label fs-16"><?php echo e(lang('Upload Dark-Icon', 'setting')); ?></label>
                                            <div class="input-group file-browser">
                                                <input class="form-control " name="image2" type="file" >
                                            </div>
                                            <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                        </div>
                                        <?php $__errorArgs = ['image2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e(lang($message)); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3">
                                    <div class="file-image-1 ms-sm-auto">
                                        <div class="product-image sprukologoimages">
                                            <?php if($title->image2 == null): ?>

                                            <img src="<?php echo e(asset('uploads/logo/icon/icon.png')); ?>" class="br-5" alt="logo">
                                            <?php else: ?>

                                            <button class="btn ticketnotedelete border-white text-gray logosdelete" value="logo3" data-id="<?php echo e($title->id); ?>">
                                                <i class="feather feather-x" ></i>
                                            </button>
                                            <img src="<?php echo e(asset('uploads/logo/icon/'.$title->image2)); ?>" class="br-5" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12 col-lg-12">
                        <div class="spfileupload">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9 col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <div class="<?php $__errorArgs = ['image3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="form-label fs-16"><?php echo e(lang('Upload Light-Icon', 'setting')); ?></label>
                                            <div class="input-group file-browser">
                                                <input class="form-control " name="image3" type="file" >
                                            </div>
                                            <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                        </div>
                                        <?php $__errorArgs = ['image3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e(lang($message)); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3">
                                    <div class="file-image-1 ms-sm-auto">
                                        <div class="product-image sprukologoimages">
                                            <?php if($title->image3 == null): ?>

                                            <img src="<?php echo e(asset('uploads/logo/darkicon/icon-white.png')); ?>" class="br-5" alt="logo">
                                            <?php else: ?>

                                            <button class="btn ticketnotedelete border-white text-gray logosdelete" value="logo4" data-id="<?php echo e($title->id); ?>">
                                                <i class="feather feather-x" ></i>
                                            </button>
                                            <img src="<?php echo e(asset('uploads/logo/darkicon/'.$title->image3)); ?>" class="br-5" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12 col-lg-12">
                        <div class="spfileupload">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9 col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <div class="<?php $__errorArgs = ['image4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="form-label fs-16"><?php echo e(lang('Upload Favicon', 'setting')); ?></label>
                                            <div class="input-group file-browser">
                                                <input class="form-control " name="image4" type="file" >
                                            </div>
                                            <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                        </div>
                                        <?php $__errorArgs = ['image4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e(lang($message)); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3">
                                    <div class="file-image-1 ms-sm-auto">
                                        <div class="product-image sprukologoimages">
                                            <?php if($title->image4 == null): ?>

                                            <img src="<?php echo e(asset('uploads/logo/favicons/favicon.ico')); ?>" class="br-5" alt="logo">
                                            <?php else: ?>

                                            <button class="btn ticketnotedelete border-white text-gray logosdelete" value="logo5" data-id="<?php echo e($title->id); ?>">
                                                <i class="feather feather-x" ></i>
                                            </button>
                                            <img src="<?php echo e(asset('uploads/logo/favicons/'.$title->image4)); ?>" class="br-5" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End App Title & Logos -->


<!-- Custom pages -->

<div class="col-xl-6 col-lg-6">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Set URL', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.url.urlset')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card-body" >
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="form-group ">
                            <label for="" class="form-label"><?php echo e(lang('Terms of service Url', 'setting')); ?> <span class="text-red">*</span></label>
                            <input class="form-control <?php echo e($errors->has('terms_url') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(lang('https://example.com')); ?>" name="terms_url" type="text" value="<?php echo e(old('terms_url', setting('terms_url'))); ?>" >

                            <?php if($errors->has('terms_url')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('terms_url')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Custom pages -->

<!-- Color Setting -->
<div class="col-xl-6 col-lg-6">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Color Setting', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.color.colorsetting')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card-body" >
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group ">
                            <label for="" class="form-label"><?php echo e(lang('Primary Color', 'setting')); ?> <span class="text-red">*</span></label>
                            <input class="form-control <?php echo e($errors->has('theme_color') ? ' is-invalid' : ''); ?>" name="theme_color" type="text" value="<?php echo e(old('theme_color', setting('theme_color'))); ?>" id="theme_color-input">

                            <?php if($errors->has('theme_color')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('theme_color')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group ">
                            <label for="" class="form-label"><?php echo e(lang('Secondary Color', 'setting')); ?> <span class="text-red">*</span></label>
                            <input class="form-control <?php echo e($errors->has('theme_color_dark') ? ' is-invalid' : ''); ?>" name="theme_color_dark" type="text" value="<?php echo e(old('theme_color_dark', setting('theme_color_dark'))); ?>" id="theme_color_dark-input">

                            <?php if($errors->has('theme_color_dark')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('theme_color_dark')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Color Setting -->

<!-- Global Language Setting -->
<div class="col-xl-6 col-lg-6">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Global Language Setting', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.lang.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card-body" >
                <div class="form-group mb-4">
                <label  class="form-label"><?php echo e(lang('Select Language', 'setting')); ?></label>
                    <select name="default_lang" id="input-default_lang" class="form-control select2 select2-show-search" required>
                        <?php $__currentLoopData = getLanguageslist(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($lang->languagecode); ?>" <?php echo e(old('default_lang', setting('default_lang'))==$lang->languagecode ? 'selected' :''); ?>><?php echo e(Str::upper($lang->languagename)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Global Language Setting -->

<!-- Date and Time Format -->
<div class="col-xl-6 col-lg-6">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Global Date & Time Format', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.timedateformat.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card-body" >
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="form-group mb-4">
                            <label  class="form-label"><?php echo e(lang('Select Date Format', 'setting')); ?></label>
                            <select name="date_format" id="input-date_format" class="form-control select2 select2-show-search" required>

                                <option value="d M, Y" <?php echo e(setting('date_format') == 'd M, Y' ? 'selected' : ''); ?>>d M, Y</option>
                                <option value="m.d.y" <?php echo e(setting('date_format') == 'm.d.y' ? 'selected' : ''); ?>>m.d.y</option>
                                <option value="Y-m-d" <?php echo e(setting('date_format') == 'Y-m-d' ? 'selected' : ''); ?>>Y-m-d</option>
                                <option value="d-m-Y" <?php echo e(setting('date_format') == 'd-m-Y' ? 'selected' : ''); ?>>d-m-Y</option>
                                <option value="d/m/Y" <?php echo e(setting('date_format') == 'd/m/Y' ? 'selected' : ''); ?>>d/m/Y</option>
                                <option value="Y/m/d" <?php echo e(setting('date_format') == 'Y/m/d' ? 'selected' : ''); ?>>Y/m/d</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="form-group mb-4">
                            <label  class="form-label"><?php echo e(lang('Select Time Format', 'setting')); ?></label>
                            <select name="time_format" id="input-time_format" class="form-control select2 select2-show-search" required>

                                <option value="h:i A" <?php echo e(setting('time_format') == 'h:i A' ? 'selected' : ''); ?>>03:00 PM</option>
                                <option value="h:i:s A" <?php echo e(setting('time_format') == 'h:i:s A' ? 'selected' : ''); ?>>03:00:02 PM</option>
                                <option value="H:i" <?php echo e(setting('time_format') == 'H:i' ? 'selected' : ''); ?>>15:00</option>
                                <option value="H:i:s" <?php echo e(setting('time_format') == 'H:i:s' ? 'selected' : ''); ?>>15:00:02</option>

                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Date and Time Format -->

<!--- Start Week Days -->
<div class="col-xl-6 col-lg-6">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('First Day of the Week', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.startweek.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card-body" >
                <div class="form-group mb-4">
                    <label  class="form-label"><?php echo e(lang('Select Day', 'setting')); ?></label>
                    <select name="start_week" id="input-start_week" class="form-control select2 select2-show-search" required>

                        <option value="0" <?php echo e(setting('start_week') == '0' ? 'selected' : ''); ?>>Sunday</option>
                        <option value="1" <?php echo e(setting('start_week') == '1' ? 'selected' : ''); ?>>Monday</option>
                        <option value="2" <?php echo e(setting('start_week') == '2' ? 'selected' : ''); ?>>Tuesday</option>
                        <option value="3" <?php echo e(setting('start_week') == '3' ? 'selected' : ''); ?>>Wednesday</option>
                        <option value="4" <?php echo e(setting('start_week') == '4' ? 'selected' : ''); ?>>Thursday</option>
                        <option value="5" <?php echo e(setting('start_week') == '5' ? 'selected' : ''); ?>>Friday</option>
                        <option value="6" <?php echo e(setting('start_week') == '6' ? 'selected' : ''); ?>>Saturday</option>

                    </select>
                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!--- Start Week Days -->

<!-- TimeZones -->
<div class="col-xl-6 col-lg-6">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Global Timezones', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.timezone.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card-body" >
                <div class="form-group mb-4">
                    <label  class="form-label"><?php echo e(lang('Select Global Timezones', 'setting')); ?></label>
                    <select name="timezones" class="form-control select2 select2-show-search" id="">
                        <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $timezoness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($timezoness->timezone); ?>" <?php echo e($timezoness->timezone == setting('default_timezone') ? 'selected' : ''); ?>><?php echo e($timezoness->timezone); ?> <?php echo e($timezoness->utc); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End TimeZone -->

<!-- Contact us email -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Contact Us', 'setting')); ?></h4>
        </div>
        <div class="switch_section my-0 ps-3">
            <div class="switch-toggle d-flex d-md-max-block mt-4">
                <a class="onoffswitch2">
                <input type="checkbox" name="CONTACT_ENABLE" id="contact" class=" toggle-class onoffswitch2-checkbox enablemenus" value="yes" <?php if(setting('CONTACT_ENABLE') == 'yes'): ?> checked="" <?php endif; ?>>
                <label for="contact" class="toggle-class onoffswitch2-label" ></label>
                </a>
                <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Contact Us', 'setting')); ?></label>
                <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, the "Contact Us" option will appear in the application’s landing page.', 'setting')); ?>)</i></small>
            </div>
        </div>
        <form action="<?php echo e(route('settings.contactemail.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body pt-2">
                <div class="form-group d-flex d-md-max-block">
                    <label  class="form-label"><?php echo e(lang('Enter Contact us Email', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('Enter an email address to receive contact-us form details.', 'setting')); ?>)</i></small>
                </div>
                <div class="col-xl-6">
                    <input type="email" placeholder="<?php echo e(lang('admin@example.com')); ?>" name="contact_form_mail" class="form-control <?php $__errorArgs = ['contact_form_mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('contact_form_mail', setting('contact_form_mail'))); ?>">
                    <?php $__errorArgs = ['contact_form_mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e(lang($message)); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact us email -->

<!-- Two Factor Authentication -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Two Factor Authentication Settings', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('admin.twofactauthsetting')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex mt-4">
                                    <a class="onoffswitch2">
                                    <input type="checkbox" id="emp_google_two_fact" name="Employe_google_two_fact" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('Employe_google_two_fact') == 'on'): ?> checked="" <?php endif; ?>>
                                    <label for="emp_google_two_fact" class="toggle-class onoffswitch2-label" ></label>
                                    </a>
                                    <div class="ps-3">
                                        <label class="form-label"><?php echo e(lang('Enable Employee Google Two Factor Authentication', 'setting')); ?><small  class="text-muted "> <i>(<?php echo e(lang('If you enable this setting, the application "employees" will be able to use "Google Two Factor Authentication" for login into our appliation.', 'setting')); ?>)</i></small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex mt-4">
                                    <a class="onoffswitch2">
                                    <input type="checkbox" id="emp_email_two_fact" name="Employe_email_two_fact" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('Employe_email_two_fact') == 'on'): ?> checked="" <?php endif; ?>>
                                    <label for="emp_email_two_fact" class="toggle-class onoffswitch2-label" ></label>
                                    </a>
                                    <div class="ps-3">
                                        <label class="form-label"><?php echo e(lang('Enable Employee Email Two Factor Authentication', 'setting')); ?><small  class="text-muted "> <i>(<?php echo e(lang('If you enable this setting, the application "employees" will be able to use "Email Two Factor Authentication" for login into our appliation.', 'setting')); ?>)</i></small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex mt-4">
                                    <a class="onoffswitch2">
                                    <input type="checkbox" id="cust_google_two_fact" name="Customer_google_two_fact" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('Customer_google_two_fact') == 'on'): ?> checked="" <?php endif; ?>>
                                    <label for="cust_google_two_fact" class="toggle-class onoffswitch2-label" ></label>
                                    </a>
                                    <div class="ps-3">
                                        <label class="form-label"><?php echo e(lang('Enable Customer Google Two Factor Authentication', 'setting')); ?><small class="text-muted "> <i>(<?php echo e(lang('If you enable this setting, the application "customers" will be able to use "Google Two Factor Authentication" for login into our appliation.', 'setting')); ?>)</i></small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex mt-4">
                                    <a class="onoffswitch2">
                                    <input type="checkbox" id="cust_email_two_fact" name="Customer_email_two_fact" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('Customer_email_two_fact') == 'on'): ?> checked="" <?php endif; ?>>
                                    <label for="cust_email_two_fact" class="toggle-class onoffswitch2-label" ></label>
                                    </a>
                                    <div class="ps-3">
                                        <label class="form-label"><?php echo e(lang('Enable Customer Email Two Factor Authentication', 'setting')); ?><small class="text-muted"> <i>(<?php echo e(lang('If you enable this setting, the application "customers" will be able to use "Email Two Factor Authentication" for login into our appliation.', 'setting')); ?>)</i></small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group float-end">
                <button type="submit" class="btn btn-secondary"><?php echo e(lang('Save Changes')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Two Factor Authentication -->

<!-- Chat GPT Open AI -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Chat GPT', 'setting')); ?></h4>
        </div>
        <div class="switch_section my-0 ps-3">
            <div class="switch-toggle d-flex d-md-max-block mt-4">
                <a class="onoffswitch2">
                    <input type="checkbox" name="enable_gpt" id="enable_gpt" class=" toggle-class onoffswitch2-checkbox enablemenus" value="yes" <?php if(setting('enable_gpt') == 'on'): ?> checked="" <?php endif; ?>>
                    <label for="enable_gpt" class="toggle-class onoffswitch2-label" ></label>
                </a>
                <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Chat GPT', 'setting')); ?></label>
                <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('By enabling this setting, you will be able to use chat gpt to generate text for canned response, email templates, custom notifications, articles and announcements.', 'setting')); ?>)</i></small>
            </div>
        </div>
        <form action="<?php echo e(route('settings.chatgpt.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body pt-2">
                <div class="form-group d-flex d-md-max-block">

                    <label  class="form-label"><?php echo e(lang('Enter OpenAI Chat GPT API Secret Key', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('Enter the OpenAI Chat GPT API Secret Key to use Chat GPT in your application.', 'setting')); ?>)</i></small>
                </div>

                <?php if(setting('enable_gpt') == 'on'): ?>
                    <div class="col-xl-6">
                        <input type="text" placeholder="Enter Your API Key Here" name="openai_api" class="form-control <?php $__errorArgs = ['openai_api'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('openai_api', setting('openai_api'))); ?>">
                        <?php $__errorArgs = ['openai_api'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e(lang($message)); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>
                <?php else: ?>
                    <?php if(setting('openai_api') != null): ?>

                        <div class="col-xl-6">
                            <input type="text" placeholder="Enter Your API Key Here" name="openai_api" class="form-control <?php $__errorArgs = ['openai_api'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('openai_api', setting('openai_api'))); ?>" readonly>
                            <?php $__errorArgs = ['openai_api'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e(lang($message)); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Chat GPT Open AI -->

<!-- Customer/Guest Delete -->
<div class="col-xl-12 col-lg-12 col-md-12">
<div class="card">
    <div class="card-header border-0">
        <h4 class="card-title"><?php echo e(lang('Inactive Customer/Guest Delete ', 'setting')); ?></h4>
    </div>
    <form action="<?php echo e(route('admin.customerprofiledelete')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <!---Customer Profile Delete Notify--->
            <div class="border-bottom">
            <div class="col-sm-12 col-md-12">
                <div class="form-group <?php echo e($errors->has('customer_inactive_notify') ? ' has-danger' : ''); ?>">
                    <div class="switch_section">
                        <div class="switch-toggle d-flex mt-4">
                        <a class="onoffswitch2">
                        <input type="checkbox" id="myonoffswitch18" name="customer_inactive_notify" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('customer_inactive_notify') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="myonoffswitch18" class="toggle-class onoffswitch2-label" ></label>
                        </a>
                        <div class="ps-3">
                            <label class="form-label"><?php echo e(lang('Customer Profile Auto Delete Enable', 'setting')); ?></label>
                            <small class="text-muted ">
                            <i>(<?php echo e(lang('If you enable this ticket setting, inactive customers will receive an email after the time period specified below (Inactive Months) stating that their account has been unused since then and will be deleted automatically after the specified (Customer Delete Days).', 'setting')); ?>)</i></small>
                        </div>
                        </div>
                    </div>
                    <?php if($errors->has('customer_inactive_notify')): ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('customer_inactive_notify')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('customer_inactive_notify_date') ? ' is-invalid' : ''); ?>">
                    <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="customer_inactive_notify_month"  value="<?php echo e(old('customer_inactive_notify_date', setting('customer_inactive_notify_date'))); ?>">
                    <label class="form-label mt-2 ms-2"><?php echo e(lang('Inactive Months', 'setting')); ?></label>
                </div>
                <?php if($errors->has('customer_inactive_notify_date')): ?>
                <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('customer_inactive_notify_date')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-12 ms-7">
                <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('customer_inactive_week_date') ? ' is-invalid' : ''); ?>">
                    <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2"  name="customer_inactive_days"  value="<?php echo e(old('customer_inactive_week_date', setting('customer_inactive_week_date'))); ?>">
                    <label class="form-label  mt-2 ms-2"><?php echo e(lang('Customer Delete Days', 'setting')); ?></label>
                </div>
                <?php if($errors->has('customer_inactive_week_date')): ?>
                <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('customer_inactive_week_date')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            </div>
            <div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group <?php echo e($errors->has('guest_inactive_notify') ? ' has-danger' : ''); ?>">
                    <div class="switch_section">
                        <div class="switch-toggle d-flex mt-4">
                        <a class="onoffswitch2">
                        <input type="checkbox" id="guestdelete" name="guest_inactive_notify" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('guest_inactive_notify') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="guestdelete" class="toggle-class onoffswitch2-label" ></label>
                        </a>
                        <div class="ps-3">
                            <label class="form-label"><?php echo e(lang('Guest Profile Auto Delete Enable', 'setting')); ?></label>
                            <small class="text-muted ">
                            <i>(<?php echo e(lang('If you enable this ticket setting, inactive guests will receive an email after the time period specified below (Inactive Months) stating that their account has been unused since then and will be deleted automatically after the specified (Guest Delete Days).', 'setting')); ?>)</i></small>
                        </div>
                        </div>
                    </div>
                    <?php if($errors->has('guest_inactive_notify')): ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('guest_inactive_notify')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('guest_inactive_notify_date') ? ' is-invalid' : ''); ?>">
                    <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="guest_inactive_notify_month"  value="<?php echo e(old('guest_inactive_notify_date', setting('guest_inactive_notify_date'))); ?>">
                    <label class="form-label mt-2 ms-2"><?php echo e(lang('Inactive Months', 'setting')); ?></label>
                </div>
                <?php if($errors->has('guest_inactive_notify_date')): ?>
                <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('guest_inactive_notify_date')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-12 ms-7">
                <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('guest_inactive_week_date') ? ' is-invalid' : ''); ?>">
                    <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2"  name="guest_inactive_days"  value="<?php echo e(old('guest_inactive_week_date', setting('guest_inactive_week_date'))); ?>">
                    <label class="form-label  mt-2 ms-2"><?php echo e(lang('Guest Delete Days', 'setting')); ?></label>
                </div>
                <?php if($errors->has('guest_inactive_week_date')): ?>
                <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('guest_inactive_week_date')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group float-end">
            <button type="submit" class="btn btn-secondary"><?php echo e(lang('Save')); ?></button>
            </div>
        </div>
    </form>
</div>
</div>
<!-- Customer/Guest Delete -->

<!-- Switches -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('App Global Settings', 'setting')); ?></h4>
        </div>
        <div class="card-body">
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="checkbox" id="sprukoadminp" class=" toggle-class onoffswitch2-checkbox sprukoregister" <?php if(setting('SPRUKOADMIN_P') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="sprukoadminp" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Dark Mode Switch For Admin Panel User’s', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this setting, the "Switch to Dark-Mode" option will disappear from the Admin panel user’s profile page.', 'setting')); ?>)</i></small>
                </div>
            </div>
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="checkbox" id="sprukoadminc" class=" toggle-class onoffswitch2-checkbox sprukoregister" <?php if(setting('SPRUKOADMIN_C') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="sprukoadminc" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Dark Mode Switch For All Customer’s', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this setting, the "Switch to Dark-Mode" option will disappear from the Customer’s profile page. And global "Dark-Mode" settings will not apply for customers.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="checkbox" id="darkmode" class=" toggle-class onoffswitch2-checkbox sprukoregister" <?php if(setting('DARK_MODE') == '1'): ?> checked="" <?php endif; ?>>
                        <label for="darkmode" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Dark-Mode Globally', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, the whole application will convert to "Dark-Mode" except for the users that are permitted with "Personal Settings."', 'setting')); ?>)</i></small>
                </div>
            </div>
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="REGISTER_POPUP" id="myonoffswitch1" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('REGISTER_POPUP') == 'yes'): ?> checked="" <?php endif; ?>>
                        <label for="myonoffswitch1" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Popup Register/Login', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, customers can access the registration form or login form in “popup modal” only.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="IMAP_STATUS" id="IMAP_STATUS" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="off" <?php if(setting('IMAP_STATUS') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="IMAP_STATUS" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Email to ticket', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('Configure IMAP settings first on the "Email to Ticket" page and enable this "Email to Ticket" feature so that customers will be able to generate support tickets through their email correspondence.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="REGISTER_DISABLE" id="REGISTER_DISABLE" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="off" <?php if(setting('REGISTER_DISABLE') == 'off'): ?> checked="" <?php endif; ?>>
                        <label for="REGISTER_DISABLE" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Disable Register', 'setting')); ?></label>
                    <a href="javascript:void(0);" class="ps-1 sprukologindisable"><i class="feather feather-edit-2"></i></a>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, "Register" options will disappear from the application’s header section, and new visitors wont be able to register to the application.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">

                    <a class="onoffswitch2">
                        <input type="checkbox" name="login_disable" id="login_disable" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('login_disable') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="login_disable" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Login Disable', 'setting')); ?></label><a href="javascript:void(0);" class="ps-1 sprukologindisable"><i class="feather feather-edit-2"></i></a>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, Customers cannot login to their accounts.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="GOOGLEFONT_DISABLE" id="GOOGLEFONT_DISABLE" class=" toggle-class onoffswitch2-checkbox sprukoregister"  <?php if(setting('GOOGLEFONT_DISABLE') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="GOOGLEFONT_DISABLE" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Disable Google Font', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, "Google Font" will not apply to the whole application or site.', 'setting')); ?>)</i></small>
                </div>
            </div>
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox"  name="FORCE_SSL" id="FORCE_SSL" class=" toggle-class onoffswitch2-checkbox sprukoregister"  <?php if(setting('FORCE_SSL') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="FORCE_SSL" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Force SSL (https)', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, it will make your web application secure using "force SSL" when it is not secure, even if your domain is certified with an SSL certificate.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="KNOWLEDGE_ENABLE" id="myonoffswitch12" class=" toggle-class onoffswitch2-checkbox enablemenus" value="yes" <?php if(setting('KNOWLEDGE_ENABLE') == 'yes'): ?> checked="" <?php endif; ?>>
                        <label for="myonoffswitch12" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Knowledge', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this setting, the "Knowledge" option will disappear from the application’s header section.', 'setting')); ?>)</i></small>
                </div>
            </div>
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="FAQ_ENABLE" id="faqs" class=" toggle-class onoffswitch2-checkbox enablemenus" value="yes" <?php if(setting('FAQ_ENABLE') == 'yes'): ?> checked="" <?php endif; ?>>
                        <label for="faqs" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Faq', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this setting, the "faq" option will disappear from the application’s header section.', 'setting')); ?>)</i></small>
                </div>
            </div>
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">

                    <a class="onoffswitch2">
                        <input type="checkbox" name="PROFILE_USER_ENABLE" id="myonoffswitch123" class=" toggle-class onoffswitch2-checkbox" value="yes" <?php if(setting('PROFILE_USER_ENABLE') == 'yes'): ?> checked="" <?php endif; ?>>
                        <label for="myonoffswitch123" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Customer Profile Image Upload', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this setting, the "Upload File" option will disappear from the customers profile page, and they wont be able to upload their profile picture.', 'setting')); ?>)</i></small>
                </div>

            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">

                    <a class="onoffswitch2">
                        <input type="checkbox" name="envato_on" id="envato_on" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('ENVATO_ON') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="envato_on" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Envato On', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this Envato switch, the entire "Envato" option will disappear from the application', 'setting')); ?>)</i></small>
                </div>

            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="defaultlogin_on" id="defaultlogin_on" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('defaultlogin_on') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="defaultlogin_on" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Default Login', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, login page will appear on the main site URL by default. Users cannot access the homepage', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="article_count" id="article_count" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('article_count') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="article_count" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Article Count Enable', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you disable this setting, article views count will disappear in the "Article" view page.', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="only_social_logins" id="only_social_logins" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('only_social_logins') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="only_social_logins" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Social Login’s Only', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you enable this setting, only social login form will appear to customer’s by when you click on the login button in header section. They cannot access normal login form', 'setting')); ?>)</i></small>
                </div>
            </div>

            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">

                    <a class="onoffswitch2">
                        <input type="checkbox" name="sidemenu_icon_style" id="sidemenu_icon_style" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('sidemenu_icon_style') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="sidemenu_icon_style" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Sidemenu Icon Style', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you "Enable" this setting, the whole application sidemenu will collapse into Icon Menu', 'setting')); ?>)</i></small>
                </div>
            </div>

            <!--- Customer Profile Delete Enable --->
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">

                    <a class="onoffswitch2">
                        <input type="checkbox" name="cust_profile_delete_enable" id="cust_profile_delete_enable" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('cust_profile_delete_enable') == 'on'): ?> checked="" <?php endif; ?>>
                        <label for="cust_profile_delete_enable" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Customer Account Delete Permission', 'setting')); ?></label>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you "Enable" this setting, customers can "Delete" their account permanently.', 'setting')); ?>)</i></small>
                </div>
            </div>
            <!--- End Customer Profile Delete Enable --->

            <!-- Under Maintanance Mode -->
            <div class="switch_section">
                <div class="switch-toggle d-flex d-md-max-block mt-4">
                    <a class="onoffswitch2">
                        <input type="checkbox" name="maintanance_mode_enable" id="maintanance_mode_enable" class=" toggle-class onoffswitch2-checkbox sprukoregister" value="yes" <?php if(setting('MAINTENANCE_MODE') == 'on'): ?> checked <?php endif; ?>>
                        <label for="maintanance_mode_enable" class="toggle-class onoffswitch2-label" ></label>
                    </a>
                    <label class="form-label ps-3 ps-md-max-0"><?php echo e(lang('Enable Maintenance Mode', 'setting')); ?></label>
                    <a href="<?php echo e(url('/admin/maintenancepage')); ?>" class="ps-1"><i class="feather feather-edit-2"></i></a>
                    <small class="text-muted ps-2 ps-md-max-0"><i>(<?php echo e(lang('If you "Enable" this setting, the application will go into maintenance mode. Only admin panel users can access the application.', 'setting')); ?>)</i></small>
                </div>
            </div>
            <!-- End Under Maintanance Mode -->
        </div>
    </div>
</div>
<!-- End switches-->

<!-- Footer Copyright Text -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Footer Copyright Text', 'setting')); ?></h4>
        </div>
        <form method="POST" action="<?php echo e(url('admin/footer/' )); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <?php echo view('honeypot::honeypotFormFields'); ?>
            <input type="hidden" name="id" value="1">

            <div class="card-body">
                <textarea class="summernote d-none <?php $__errorArgs = ['copyright'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="copyright" aria-multiline="true"><?php echo e($footertext->copyright); ?></textarea>
                <?php $__errorArgs = ['copyright'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e(lang($message)); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

            <div class="card-footer">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Footer Copyright Text -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<!-- INTERNAL Summernote js  -->
<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL color pickr -->
<script src="<?php echo e(asset('assets/plugins/colorpickr/pickr.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>



<script type="text/javascript">

    "use strict";

    (() => {

        //  color pickr code
        // Simple example, see optional options for more configuration.
        window.setColorPicker = (elem, defaultValue) => {
            elem = document.querySelector(elem);
            let pickr = Pickr.create({
                el: elem,
                default: defaultValue,
                theme: 'nano', // or 'monolith', or 'nano'
                useAsButton: true,
                swatches: [
                    '#217ff3',
                    '#11cdef',
                    '#fb6340',
                    '#f5365c',
                    '#f7fafc',
                    '#212529',
                    '#2dce89'
                ],
                components: {
                    // Main components
                    preview: true,
                    opacity: true,
                    hue: true,
                    // Input / output Options
                    interaction: {
                        hex: true,
                        rgba: true,
                        // hsla: true,
                        // hsva: true,
                        // cmyk: true,
                        input: true,
                        clear: true,
                        silent: true,
                        preview: true,
                    }
                }
            });
            pickr.on('init', pickr => {
                elem.value = pickr.getSelectedColor().toRGBA().toString(0);
            }).on('change', color => {
                elem.value = color.toRGBA().toString(0);
            });

            return pickr;

        }

        // Color Pickr variables
        let themeColor = setColorPicker('#theme_color-input', document.querySelector('#theme_color-input').value);
        let themeColorDark = setColorPicker('#theme_color_dark-input', document.querySelector('#theme_color_dark-input').value);

        // Csrf Field
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // summernote js
        $('.summernote').summernote({
            placeholder: '',
            tabsize: 1,
            height: 200,
        });

        // Multiple switch changes
        $('.sprukoregister').on('change', function() {
            var status = $('#myonoffswitch1').prop('checked') == true ? 'yes' : 'no';
            var imapstatus = $('#IMAP_STATUS').prop('checked') == true ? 'on' : 'off';
            var registerdisable = $('#REGISTER_DISABLE').prop('checked') == true ? 'off' : 'on';
            var googledisable = $('#GOOGLEFONT_DISABLE').prop('checked') == true ? 'on' : 'off';
            var forcessl = $('#FORCE_SSL').prop('checked') == true ? 'on' : 'off';
            var darkmode = $('#darkmode').prop('checked') == true ? '1' : '0';
            var sprukoadminp = $('#sprukoadminp').prop('checked') == true ? 'on' : 'off';
            var sprukocustp = $('#sprukoadminc').prop('checked') == true ? 'on' : 'off';
            var envatoon = $('#envato_on').prop('checked') == true ? 'on' : 'off';
            var purchasecodeon = $('#purchasecode_on').prop('checked') == true ? 'on' : 'off';
            var defaultloginon = $('#defaultlogin_on').prop('checked') == true ? 'on' : 'off';
            var articlecount = $('#article_count').prop('checked') == true ? 'on' : 'off';
            var defaultsocialloginon = $('#only_social_logins').prop('checked') == true ? 'on' : 'off';
            var sidemenustyle = $('#sidemenu_icon_style').prop('checked') == true ? 'on' : 'off';
            var logindisable = $('#login_disable').prop('checked') == true ? 'on' : 'off';
            var custdeleteprofile = $('#cust_profile_delete_enable').prop('checked') == true ? 'on' : 'off';
            var maintanancemode = $('#maintanance_mode_enable').prop('checked') == true ? 'on' : 'off';

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '<?php echo e(url('/admin/general/register')); ?>',
                data: {
                    'status': status,
                    'imapstatus' : imapstatus,
                    'registerdisable' : registerdisable,
                    'googledisable' : googledisable,
                    'forcessl' : forcessl,
                    'darkmode' : darkmode,
                    'sprukoadminp' : sprukoadminp,
                    'sprukocustp' : sprukocustp,
                    'envatoon' : envatoon,
                    'purchasecodeon' : purchasecodeon,
                    'defaultloginon' : defaultloginon,
                    'articlecount' : articlecount,
                    'defaultsocialloginon' : defaultsocialloginon,
                    'sidemenustyle' : sidemenustyle,
                    'logindisable' : logindisable,
                    'custdeleteprofile' : custdeleteprofile,
                    'maintanancemode' : maintanancemode,
                },
                success: function(data){
                    toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>')
                    window.location.reload();
                },
                error: function(data){
                    toastr.error('<?php echo e(lang('Social logins are not enabled please enable it first', 'alerts')); ?>')
                    window.location.reload();
                }
            });
        });

        // Enable Menus
        $('.enablemenus').on('change', function() {
            var status = $('#myonoffswitch12').prop('checked') == true ? 'yes' : 'no';
            var status1 = $('#faqs').prop('checked') == true ? 'yes' : 'no';
            var status2 = $('#contact').prop('checked') == true ? 'yes' : 'no';
            var status3 = $('#enable_gpt').prop('checked') == true ? 'on' : 'off';
            $.ajax({
                type: "post",
                dataType: "json",
                url: '<?php echo e(url('/admin/knowledge')); ?>',
                data: {
                    'KNOWLEDGE_ENABLE': status,
                    'FAQ_ENABLE': status1,
                    'CONTACT_ENABLE': status2,
                    'enable_gpt': status3,
                },
                success: function(data){
                    if(toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>')){
                        location.reload();
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        // user profile enable
        $('#myonoffswitch123').on('change', function() {
            var status1 = $('#myonoffswitch123').prop('checked') == true ? 'yes' : 'no';
            $.ajax({
                type: "post",
                dataType: "json",
                url: '<?php echo e(url('/admin/profileuser')); ?>',
                data: {'PROFILE_USER_ENABLE': status1},
                success: function(data){
                    if(toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>')){
                        location.reload();
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        // employye profile enable
        $('#myonoffswitch124').on('change', function() {
            var status2 = $('#myonoffswitch124').prop('checked') == true ? 'yes' : 'no';
            $.ajax({
                type: "post",
                dataType: "json",
                url: '<?php echo e(url('/admin/profileagent')); ?>',
                data: {'PROFILE_AGENT_ENABLE': status2},
                success: function(data){
                    if(toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>')){
                        location.reload();
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        // Logos Delete
        $('body').on('click', '.logosdelete', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            let logo = $(this).val();
            swal({
                title: `<?php echo e(lang('Are you sure want to remove this logo?')); ?>`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo e(route('admin.logodelete')); ?>",
                        data: {
                            'id': id,
                            'logo': logo

                        },
                        success: function (data) {
                        toastr.success(data.success);
                        location.reload();
                        },
                        error: function (data) {
                        console.log('Error:', data);
                        }
                    });
                }
            });
        });

        //Login_Disable Content modelPopup
        $('body').on('click', '.sprukologindisable', function(e){

            e.preventDefault();
            $('#name').html("");
            $('#sprukologin').val("Save");
            $('#logindisable_form').trigger("reset");
            $('.modal-title').html("<?php echo e(lang('Login/Register Disable Statement')); ?>");
            $('#addlogindisable').modal('show');
            $('#name').val("<?php echo e(setting('login_disable_statement')); ?>");
        })

        $('body').on('submit', '#logindisable_form', function(e){
            e.preventDefault();
            var actionType = $('#btnsave').val();
            var fewSeconds = 2;
            $('#btnsave').html('Loading...');
            $('#btnsave').prop('disabled', true);
                setTimeout(function(){
                    $('#btnsave').prop('disabled', false);
                    $('#btnsave').html('Save');
                }, fewSeconds*1000);
            var formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: '<?php echo e(url('admin/general/logindisable')); ?>',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,

            success: (data) => {
                $('#nameError').html('');
                $('#logindisable_form').trigger("reset");
                $('#addlogindisable').modal('hide');
                $('#btnsave').html('Save');
                toastr.success(data.success);
            },
            error: function(data){
                $('#nameError').html('');
                $('#nameError').html(data.responseJSON.errors.name);

                $('#btnsave').html('Save');
            }
        });
        })

    })();


</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

    <?php echo $__env->make('admin.generalsetting.modalpopup.logindisablemodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/generalsetting/apptitle.blade.php ENDPATH**/ ?>