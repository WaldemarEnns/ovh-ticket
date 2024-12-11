<?php $__env->startSection('styles'); ?>


<!-- INTERNAl Summernote css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAl DropZone css -->
<link href="<?php echo e(asset('assets/plugins/dropzone/dropzone.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<link href="<?php echo e(asset('assets/plugins/wowmaster/css/animate.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(setting('ANNOUNCEMENT_USER') == 'only_login_user' || setting('ANNOUNCEMENT_USER') == 'all_users'): ?>
    <div class="uhelp-announcement-alertgroup">
        <?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($anct->status == 1): ?>
            <div class="alert" role="alert" style="background: linear-gradient(to right, <?php echo e($anct->primary_color); ?>, <?php echo e($anct->secondary_color); ?>);">
                <div class="container">
                    <button type="submit" class="btn-close ms-5 float-end text-white notifyclose" data-id="<?php echo e($anct->id); ?>">×</button>
                    <div class="d-flex align-items-top">
                        <div class="uhelp-announcement me-2">
                            <svg class="svg-info" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        </div>
                        <div class="text-default d-flex align-items-top">
                            <div class="notice-heading d-flex align-items-top flex-fill">
                                <div>
                                    <span class="fs-15 font-weight-bold text-white flex-fill"><?php echo e($anct->title); ?></span>
                                    <span class="text-white opacity-50 mx-2"><i class="ti ti-minus"></i></span>
                                    <span class="mb-0 text-white uhelp-alert-content alert-notice"><?php echo $anct->notice; ?>

                                        <?php if($anct->buttonon == 1): ?>
                                            <a class="btn btn-sm ms-2 text-white text-decoration-underline" href="<?php echo e($anct->buttonurl); ?>" target="_blank"><?php echo e($anct->buttonname); ?></a>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($anct->status == 1): ?>
                <div class="alert" role="alert" style="background: linear-gradient(to right,<?php echo e($anct->primaray_color); ?>, <?php echo e($anct->secondary_color); ?>);">
                    <div class="container">
                        <button type="submit" class="btn-close ms-5 float-end text-white notifyclose" data-id="<?php echo e($anct->id); ?>">×</button>
                        <div class="d-flex align-items-top">
                            <div class="uhelp-announcement me-2">
                                <svg class="svg-info" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            </div>
                            <div class="text-default d-flex align-items-top">
                                <div class="notice-heading d-flex align-items-top flex-fill">
                                    <div>
                                        <span class="fs-15 font-weight-bold text-white flex-fill"><?php echo e($anct->occasion); ?></span>
                                        <span class="text-white opacity-50 mx-2"><i class="ti ti-minus"></i></span>
                                        <span class="mb-0 text-white uhelp-alert-content alert-notice"><?php echo $anct->holidaydescription; ?>

                                            <?php if($anct->buttonon == 1): ?>
                                            <a class="btn btn-sm ms-2 text-white text-decoration-underline" href="<?php echo e($anct->buttonurl); ?>" target="_blank"><?php echo e($anct->buttonname); ?></a>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ancts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $announceDay = explode(',', $ancts->announcementday);
            $now = today()->format('D');

            ?>
            <?php $__currentLoopData = $announceDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announceDays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($ancts->status == 1 && $announceDays == $now): ?>
                <div class="alert alert-days" role="alert" style="background: linear-gradient(to right, <?php echo e($ancts->primary_color); ?>, <?php echo e($ancts->secondary_color); ?>);">
                    <div class="container">
                        <button type="submit" class="btn-close ms-5 float-end text-white notifyclose" data-id="<?php echo e($ancts->id); ?>">×</button>
                        <div class="d-flex align-items-top">
                            <div class="uhelp-announcement me-2">
                                <svg class="svg-info" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            </div>
                            <div class="text-default d-flex align-items-top">
                                <div class="notice-heading d-flex align-items-top flex-fill">
                                <div>
                                    <span class="fs-15 font-weight-bold text-white flex-fill"><?php echo e($ancts->title); ?></span>
                                    <span class="text-white opacity-50 mx-2"><i class="ti ti-minus"></i></span>
                                    <span class="mb-0 text-white uhelp-alert-content alert-notice"><?php echo $ancts->notice; ?>

                                        <?php if($ancts->buttonon == 1): ?>
                                            <a class="btn btn-sm ms-2 text-white text-decoration-underline" href="<?php echo e($ancts->buttonurl); ?>" target="_blank"><?php echo e($ancts->buttonname); ?></a>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<!-- Section -->
<section>
    <div class="bannerimg cover-image" data-bs-image-src="<?php echo e(asset('assets/images/photos/banner1.jpg')); ?>">
        <div class="header-text mb-0">
            <div class="container ">
                <div class="row text-white">
                    <div class="col">
                        <h1 class="mb-0"><?php echo e(lang('Create Ticket', 'menu')); ?></h1>
                    </div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(url('/')); ?>" class="text-white-50"><?php echo e(lang('Home', 'menu')); ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#" class="text-white"><?php echo e(lang('Create Ticket', 'menu')); ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section -->

<!--Section-->
<section>
    <div class="cover-image sptb">
        <div class="container ">
            <div class="row">
                <?php echo $__env->make('includes.user.verticalmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="col-xl-9">
                    <?php if(setting('envato_on') == 'on'): ?>
                        <div class="alert alert-danger mb-5 br-13 align-center d-none" role="alert" id="expired_note">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill mb-1 me-1" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <?php echo e(lang('Support Expired: Your support has expired. In order to continue receiving our assistance, please renew your support.')); ?>

                            <a class="btn-sm btn btn-dark" href="<?php echo e(setting('SUPPORT_POLICY_URL')); ?>" target="_blank"><?php echo e(lang('Support Policy')); ?></a>
                            <a class="btn-sm btn btn-dark" href="https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support" target="_blank"><?php echo e(lang('How To Renew Item Support')); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if(setting('envato_on') == 'on'): ?>
                        <div class="alert alert-warning mb-5 br-13 align-center d-none" role="alert" id="expired_note123">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill mb-1 me-1" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <?php echo e(lang('Your purchase code has been verified, but product support has expired.')); ?>

                            <a class="btn-sm btn btn-dark" href="<?php echo e(setting('SUPPORT_POLICY_URL')); ?>" target="_blank"><?php echo e(lang('Support Policy')); ?></a>
                            <a class="btn-sm btn btn-dark" href="https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support" target="_blank"><?php echo e(lang('How To Renew Item Support')); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header  border-0">
                            <h4 class="card-title"><?php echo e(lang('New Ticket')); ?></h4>
                        </div>
                        <form method="POST" id="user_form" enctype="multipart/form-data">

                            <?php echo view('honeypot::honeypotFormFields'); ?>

                            <div class="card-body">
                                <?php if(setting('cc_email') == 'on'): ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2"><?php echo e(lang('CC')); ?> </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control <?php $__errorArgs = ['ccmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('CC Email')); ?>" value="<?php echo e(old('ccmail')); ?>" name="ccmail" id="ccmail">
                                                <div><small class="text-muted"> <?php echo e(lang('You are allowed to send only a single CC.')); ?></small></div>
                                                <span id="ccEmailError" class="text-danger alert-message" ></span>
                                                <?php $__errorArgs = ['ccmail'];
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
                                    </div>
                                <?php endif; ?>

                            <!-- code for email field by vikas -->
                            <!-- <div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Email')); ?> <span class="text-red">*</span></label>
											</div>
											<div class="col-md-10">
												<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('Email')); ?>" value="<?php echo e(old('email')); ?>" name="email" id="email">
												<span id="EmailError" class="text-danger alert-message" ></span>
												<?php $__errorArgs = ['email'];
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
									</div> -->
                            <!-- end code by vikas -->
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Subject')); ?> <span class="text-red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="subject" maxlength="<?php echo e(setting('TICKET_CHARACTER')); ?>"
                                                class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="<?php echo e(lang('Subject')); ?>" name="subject" value="<?php echo e(old('subject')); ?>">
                                                <small class="text-muted float-end mt-1" id="subjectmaxtext"><?php echo e(lang('Maximum')); ?> <b><?php echo e(setting('TICKET_CHARACTER')); ?></b> <?php echo e(lang('Characters')); ?></small>
                                                <div>
                                                    <span id="SubjectError" class="text-danger alert-message"></span>
                                                </div>
                                            <?php $__errorArgs = ['subject'];
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
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Category')); ?> <span class="text-red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select
                                                class="form-control select2-show-search  select2 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                data-placeholder="<?php echo e(lang('Select Category')); ?>" name="category" id="category">
                                                <option label="<?php echo e(lang('Select Category')); ?>"></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($category->id); ?>" <?php if(old('category')): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                            <span id="CategoryError" class="text-danger alert-message"></span>
                                            <?php $__errorArgs = ['category'];
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
                                </div>
                                <div class="form-group" id="selectssSubCategory" style="display: none;">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('SubCategory')); ?></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select  class="form-control select2-show-search select2"  data-placeholder="<?php echo e(lang('Select SubCategory')); ?>" name="subscategory" id="subscategory">

                                            </select>
                                            <span id="subsCategoryError" class="text-danger alert-message"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group" id="selectSubCategory">
                                </div>
                                <div class="form-group" id="envatopurchase">
                                </div>
                                <?php if($customfields->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2"><?php echo e($customfield->fieldnames); ?>

                                                    <?php if($customfield->fieldrequired == '1'): ?>

                                                    <span class="text-red">*</span>
                                                    <?php endif; ?>
                                                </label>
                                            </div>
                                            <div class="col-md-9">

                                                <?php if($customfield->fieldtypes == 'text'): ?>

                                                    <input type="<?php echo e($customfield->fieldtypes); ?>" maxlength="255" class="form-control" name="custom_<?php echo e($customfield->id); ?>" id="" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                <?php endif; ?>
                                                <?php if($customfield->fieldtypes == 'email'): ?>

                                                    <input type="<?php echo e($customfield->fieldtypes); ?>" class="form-control" name="custom_<?php echo e($customfield->id); ?>" id="" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                <?php endif; ?>
                                                <?php if($customfield->fieldtypes == 'textarea'): ?>

                                                    <textarea name="custom_<?php echo e($customfield->id); ?>" maxlength="255" class="form-control" id="" cols="30" rows="4" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>></textarea>
                                                <?php endif; ?>
                                                <?php if($customfield->fieldtypes == 'checkbox'): ?>

                                                    <?php
                                                        $coptions = explode(',', $customfield->fieldoptions)
                                                    ?>
                                                    <?php $__currentLoopData = $coptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="custom-control custom-checkbox d-inline-block me-3">
                                                        <input type="<?php echo e($customfield->fieldtypes); ?>" class="custom-control-input <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>"  name="custom_<?php echo e($customfield->id); ?>[]" value="<?php echo e($coption); ?>" id="" >

                                                        <span class="custom-control-label"><?php echo e($coption); ?></span>
                                                    </label>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                <?php endif; ?>
                                                <?php if($customfield->fieldtypes == 'select'): ?>
                                                    <select name="custom_<?php echo e($customfield->id); ?>" id="" class="form-control select2-show-search" data-placeholder="<?php echo e(lang('Select')); ?>" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                        <?php
                                                            $seoptions = explode(',', $customfield->fieldoptions)
                                                        ?>
                                                        <option></option>
                                                        <?php $__currentLoopData = $seoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($seoption); ?>"><?php echo e($seoption); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                <?php endif; ?>
                                                <?php if($customfield->fieldtypes == 'radio'): ?>
                                                <?php
                                                    $roptions = explode(',', $customfield->fieldoptions)
                                                ?>
                                                <?php $__currentLoopData = $roptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="custom-control custom-radio d-inline-block me-3">
                                                    <input type="<?php echo e($customfield->fieldtypes); ?>" class="custom-control-input" name="custom_<?php echo e($customfield->id); ?>" value="<?php echo e($roption); ?>" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                    <span class="custom-control-label"><?php echo e($roption); ?></span>
                                                </label>


                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <div class="form-group ticket-summernote ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Description')); ?> <span class="text-red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="summernote form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="message" rows="4" cols="400"><?php echo e(old('message')); ?></textarea>
                                            <span id="MessageError" class="text-danger alert-message"></span>
                                            <?php $__errorArgs = ['message'];
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
                                </div>
                                <?php if(setting('USER_FILE_UPLOAD_ENABLE') == 'yes'): ?>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Upload File')); ?></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mb-0">
                                                <div class="needsclick dropzone" id="document-dropzone">
                                                </div>
                                                <small class="text-muted"><i><?php echo e(lang('The file size should not be more than', 'filesetting')); ?> <?php echo e(setting('FILE_UPLOAD_MAX')); ?><?php echo e(lang('MB', 'filesetting')); ?></i></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="form-group <?php $__errorArgs = ['agree_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <label class="custom-control form-checkbox">
                                        <input type="checkbox" class="custom-control-input " value="agreed" name="agree_terms">
                                        <span class="custom-control-label"><?php echo e(lang('I agree with')); ?><a href="<?php echo e(setting('terms_url')); ?>" class="text-primary"><?php echo e(lang('Terms & Services')); ?></a></span>
                                    </label>
                                    <span class="text-red" id="agreetermsError"></span>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="form-group float-end">
                                    <button type="submit" class="btn btn-secondary btn-lg purchasecode" id="createticketbtn"><?php echo e(lang('Create Ticket')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Summernote js  -->
<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Dropzone js-->
<script src="<?php echo e(asset('assets/plugins/dropzone/dropzone.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- wowmaster js-->
<script src="<?php echo e(asset('assets/plugins/wowmaster/js/wow.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Bootstrap-MaxLength js-->
<script src="<?php echo e(asset('assets/plugins/bootstrapmaxlength/bootstrap-maxlength.min.js')); ?>?v=<?php echo time(); ?>"></script>

<script type="text/javascript">
    "use strict";

    var licensekey;

    (function($){

        // Variables
        var SITEURL = '<?php echo e(url('')); ?>';

        // Csrf Field
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Category list
        $('select[name="project_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: SITEURL +'/customer/subcat/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="category"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="category"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="project_id"]').empty();
            }
        });

        // when category change its get the subcat list
        $('#category').on('change',function(e) {
            var cat_id = e.target.value;
            $('#selectssSubCategory').hide();
            $.ajax({
                url:"<?php echo e(route('guest.subcategorylist')); ?>",
                type:"POST",
                    data: {
                    cat_id: cat_id
                    },
                    cache : false,
                    async: true,
                success:function (data) {
                    console.log(data);
                    if(data.subcategoriess != ''){
                        $('#subscategory').html(data.subcategoriess)
                        $('#selectssSubCategory').show()
                    }
                    else{
                        $('#selectssSubCategory').hide();
                        $('#subscategory').html('')
                    }
                    //projectlist
                    if(data.subcategories.length >= 1){

                        $('#subcategory')?.empty();
                        document.querySelector("#selectssSubCategory").classList.remove("d-none")
                        let selectDiv = document.querySelector('#selectSubCategory');
                        let Divrow = document.createElement('div');
                        Divrow.setAttribute('class','row mt-4');
                        let Divcol3 = document.createElement('div');
                        Divcol3.setAttribute('class','col-md-3');
                        let selectlabel =  document.createElement('label');
                        selectlabel.setAttribute('class','form-label mb-0 mt-2')
                        selectlabel.innerText = "<?php echo e(lang('Project')); ?>";
                        let divcol9 = document.createElement('div');
                        divcol9.setAttribute('class', 'col-md-9');
                        let selecthSelectTag =  document.createElement('select');
                        selecthSelectTag.setAttribute('class','form-control select2-show-search');
                        selecthSelectTag.setAttribute('id', 'subcategory');
                        selecthSelectTag.setAttribute('name', 'project');
                        selecthSelectTag.setAttribute('data-placeholder','Select Projects');
                        let selectoption = document.createElement('option');
                        selectoption.setAttribute('label','Select Projects')
                        selectDiv.append(Divrow);
                        Divrow.append(Divcol3);
                        Divcol3.append(selectlabel);
                        divcol9.append(selecthSelectTag);
                        selecthSelectTag.append(selectoption);
                        Divrow.append(divcol9);
                        $('.select2-show-search').select2();
                        $.each(data.subcategories,function(index,subcategory){
                        $('#subcategory').append('<option value="'+subcategory.name+'">'+subcategory.name+'</option>');
                        })
                    }
                    else{
                        $('#subcategory')?.empty();
                        if(data.subcatstatusexisting != 'statusexisting'){
                            document.querySelector("#selectssSubCategory").classList.add("d-none");
                        }else{
                            document.querySelector("#selectssSubCategory").classList.remove("d-none");
                        }
                    }
                    <?php if(setting('ENVATO_ON') == 'on'): ?>
                    //Envato Access
                    if(data.envatosuccess.length >= 1){
                        $('#envato_id')?.empty();
                        $('#envatopurchase .row')?.remove();
                        let selectDiv = document.querySelector('#envatopurchase');
                        let Divrow = document.createElement('div');
                        Divrow.setAttribute('class','row mt-4');
                        let Divcol3 = document.createElement('div');
                        Divcol3.setAttribute('class','col-md-3');
                        let selectlabel =  document.createElement('label');
                        selectlabel.setAttribute('class','form-label mb-0 mt-2')
                        selectlabel.innerHTML = "Envato Purchase Code <span class='text-red'>*</span>";
                        let divcol9 = document.createElement('div');
                        divcol9.setAttribute('class', 'col-md-9');
                        let selecthSelectTag =  document.createElement('input');
                        selecthSelectTag.setAttribute('class','form-control');
                        selecthSelectTag.setAttribute('type','search');
                        selecthSelectTag.setAttribute('id', 'envato_id');
                        selecthSelectTag.setAttribute('name', 'envato_id');
                        selecthSelectTag.setAttribute('placeholder', 'Enter Your Purchase Code');
                        let selecthSelectInput =  document.createElement('input');
                        selecthSelectInput.setAttribute('type','hidden');
                        selecthSelectInput.setAttribute('id', 'envato_support');
                        selecthSelectInput.setAttribute('name', 'envato_support');
                        selectDiv.append(Divrow);
                        Divrow.append(Divcol3);
                        Divcol3.append(selectlabel);
                        divcol9.append(selecthSelectTag);
                        divcol9.append(selecthSelectInput);
                        Divrow.append(divcol9);
                        $('.purchasecode').attr('disabled', true);

                    }else{
                        $('#envato_id')?.empty();
                        $('#envatopurchase .row')?.remove();
                        $('.purchasecode').removeAttr('disabled');
                    }
                    <?php endif; ?>
                },
                error:(data)=>{

                }
            });
        });

        <?php $module = Module::all(); ?>

        <?php if(in_array('Uhelpupdate', $module)): ?>


        // Purchase Code Validation
        $("body").on('keyup', '#envato_id', function() {
            let value = $(this).val();
            if (value != '') {
                if(value.length == '36'){
                    var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "<?php echo e(route('guest.envatoverify')); ?>",
                    method: "POST",
                    data: {data: value, _token: _token},

                    dataType:"json",

                    success: function (data) {
                        if(data.valid == 'true'){
                            $('#envato_id').addClass('is-valid');
                            $('#envato_id').attr('readonly', true);
                            $('.purchasecode').removeAttr('disabled');
                            $('#envato_id').css('border', '1px solid #02f577');
                            $('#envato_support').val('Supported');
                            $('#expired_note').addClass('d-none');
                            licensekey = data.key
                            toastr.success(data.message);
                        }
                        if(data.valid == 'expried'){
                            <?php if(setting('ENVATO_EXPIRED_BLOCK') == 'on'): ?>

                            $('.purchasecode').attr('disabled', true);
                            $('#envato_id').css('border', '1px solid #e13a3a');
                            $('#envato_support').val('Expired');
                            $('#expired_note').removeClass('d-none');
                            toastr.error(data.message);
                            <?php endif; ?>
                            <?php if(setting('ENVATO_EXPIRED_BLOCK') == 'off'): ?>
                            $('#envato_id').addClass('is-valid');
                            $('#envato_id').attr('readonly', true);
                            $('.purchasecode').removeAttr('disabled');
                            $('#envato_id').css('border', '1px solid #02f577');
                            $('#expired_note123').removeClass('d-none');
                            $('#envato_support').val('Expired');
                            licensekey = data.key
                            toastr.warning(data.message);
                            <?php endif; ?>

                        }
                        if(data.valid == 'false'){
                            $('.purchasecode').attr('disabled', true);
                            $('#envato_id').css('border', '1px solid #e13a3a');
                            toastr.error(data.message);
                        }


                    },
                    error: function (data) {

                    }
                });
                }
            }else{
                toastr.error('Purchase Code field is Required');
                $('.purchasecode').attr('disabled', true);
                $('#envato_id').css('border', '1px solid #e13a3a');
            }
        });

        <?php endif; ?>

        // Summernote
        $('.summernote').summernote({
            placeholder: '',
            tabsize: 1,
            height: 200,
        // 	toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        // 	['fontname', ['fontname']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], // ['height', ['height']],
        // 	['table', ['table']], ['insert', ['link']], ['view', ['fullscreen']], ['help', ['help']]],
        // disableDragAndDrop:true,
            toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], // ['height', ['height']],
            ['table', ['table']], ['insert', ['link']], ['view', ['fullscreen']], ['help', ['help']]],
            callbacks: {
                onImageUpload: function(e){}
            },
        });

        //Announcement Close Button (x)
        let notifyClose = document.querySelectorAll('.notifyclose');
        notifyClose.forEach(ele => {
            if(ele){
                let id = ele.getAttribute('data-id');
                if(getCookie(id)){
                    ele.closest('.alert').classList.add('d-none');
                }else{
                    ele.addEventListener('click', setCookie);
                }
            }
        })

        function setCookie($event) {
            console.log('set');
            const d = new Date();
            let id = $event.currentTarget.getAttribute('data-id');
            d.setTime(d.getTime() + (30 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = id + "=" + 'announcement_close' + ";" + expires + ";path=/";
            $event.currentTarget.closest('.alert').classList.add('d-none');
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return '';
        }

        // summernote
        $('.note-editable').on('keyup', function(e){
            localStorage.setItem('usermessage', e.target.innerHTML)
        })

        $('#subject').on('keyup', function(e){

            if(e.target.value.length == <?php echo e(setting('TICKET_CHARACTER')); ?>){
                $('#subjectmaxtext').removeClass('text-muted')
                $('#subjectmaxtext').addClass('text-red');
            }else{
                $('#subjectmaxtext').removeClass('text-red')
                $('#subjectmaxtext').addClass('text-muted');
            }
            localStorage.setItem('usersubject', e.target.value)
        })

        $(window).on('load', function(){
            if(localStorage.getItem('usersubject') || localStorage.getItem('usermessage')){

                document.querySelector('#subject').value = localStorage.getItem('usersubject').slice(0,<?php echo e(setting('TICKET_CHARACTER')); ?>);
                document.querySelector('.summernote').innerHTML = localStorage.getItem('usermessage');
                document.querySelector('.note-editable').innerHTML = localStorage.getItem('usermessage');
            }
        });


        $('body').on('submit', '#user_form', function (e) {
            e.preventDefault();
            $('#SubjectError').html('');
            $('#MessageError').html('');
            $('#EmailError').html('');
            $('#CategoryError').html('');
            $('#verifyotpError').html('');
            $('#agreetermsError').html('');
            $('#createticketbtn').html(`<?php echo e(lang('Loading..', 'menu')); ?> <i class="fa fa-spinner fa-spin"></i>`);
            $('#createticketbtn').prop('disabled', true);
            var formData = new FormData(this);
            formData.set('envato_id', licensekey);

            let checked  = document.querySelectorAll('.required:checked').length;
            var isValid = checked > 0;
            if(document.querySelectorAll('.required').length == '0'){
                ajax(formData);
            }else{

                if(isValid){
                    ajax(formData);
                }else{
                    $('#createticketbtn').prop('disabled', false);
                    $('#createticketbtn').html(`<?php echo e(lang('Create Ticket', 'menu')); ?>`);
                    toastr.error('<?php echo e(lang('Check the all field(*) required', 'alerts')); ?>')
                }
            }



        });

        function ajax(formData)
        {
            $.ajax({
                type:'post',
                url: '<?php echo e(route('client.ticketcreate')); ?>',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,

                success: (data) => {
                    if(data.message == 'envatoerror')
                    {
                        toastr.error(data.error);
                        window.location.reload();
                    }else{
                        $('#SubjectError').html('');
                        $('#MessageError').html('');
                        $('#EmailError').html('');
                        $('#CategoryError').html('');
                        $('#verifyotpError').html('');
                        $('#agreetermsError').html('');
                        toastr.success(data.success);
                        if(localStorage.getItem('usersubject') || localStorage.getItem('usermessage')){
                            localStorage.removeItem("usersubject");
                            localStorage.removeItem("usermessage");
                        }
                        window.location.replace('<?php echo e(url('customer/')); ?>');
                    }





                },
                error: function(data){

                    $('#SubjectError').html(data.responseJSON.errors.subject);
                    $('#MessageError').html(data.responseJSON.errors.message);
                    $('#EmailError').html(data.responseJSON.errors.email);
                    $('#CategoryError').html(data.responseJSON.errors.category);
                    $('#verifyotpError').html(data.responseJSON.errors.verifyotp);
                    $('#agreetermsError').html(data.responseJSON.errors.agree_terms);
                    if(data.responseJSON.errors.agree_terms) {
                        $('#createticketbtn').html(`<?php echo e(lang('Create Ticket', 'menu')); ?>`);
                        $('#createticketbtn').prop('disabled', false);
                    }

                }
            });
        }

    })(jQuery);


    <?php if(setting('USER_FILE_UPLOAD_ENABLE') == 'yes'): ?>

    // Image Upload
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '<?php echo e(route('imageupload')); ?>',
        maxFilesize: '<?php echo e(setting('FILE_UPLOAD_MAX')); ?>', // MB
        addRemoveLinks: true,
        acceptedFiles: '<?php echo e(setting('FILE_UPLOAD_TYPES')); ?>',
        maxFiles: '<?php echo e(setting('MAX_FILE_UPLOAD')); ?>',
        headers: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="ticket[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="ticket[]"][value="' + name + '"]').remove()
        },
        init: function () {
            <?php if(isset($project) && $project->document): ?>
            var files =
            <?php echo json_encode($project->document); ?>

            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="ticket[]" value="' + file.file_name + '">')
            }
            <?php endif; ?>
            this.on('error', function(file, errorMessage) {
                if (errorMessage.message) {
                    var errorDisplay = document.querySelectorAll('[data-dz-errormessage]');
                    errorDisplay[errorDisplay.length - 1].innerHTML = errorMessage.message;
                }
            });
        }
    }

    <?php endif; ?>


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.usermaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/user/ticket/create.blade.php ENDPATH**/ ?>