<?php $__env->startSection('styles'); ?>

<!-- INTERNAL Sweet-Alert css -->
<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- INTERNAl Tag css -->
<link href="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Profile', 'menu')); ?></span></h4>
    </div>
</div>
<!--End Page header-->

<!-- Profile Page-->
<div class="row">
    <div class="col-xl-3 col-lg-4 col-md-12">
        <div class="card user-pro-list overflow-hidden">
            <div class="card-body">
                <div class="user-pic text-center">
                    <?php if(Auth::user()->image == null): ?>

                    <span class="avatar avatar-xxl brround" style="background-image: url(../uploads/profile/user-profile.png)">
                        <span class="avatar-status bg-green"></span>
                    </span>
                        <?php else: ?>

                    <span class="avatar avatar-xxl brround" style="background-image: url(../uploads/profile/<?php echo e(Auth::user()->image); ?>)">
                        <span class="avatar-status bg-green"></span>
                    </span>
                        <?php endif; ?>
                    <div class="pro-user mt-3">
                        <h5 class="pro-user-username text-dark mb-1 fs-16"><?php echo e(Auth::user()->name); ?></h5>
                        <h6 class="pro-user-desc text-muted fs-12"><?php echo e(Auth::user()->email); ?></h6>
                        <?php if(!empty(Auth::user()->getRoleNames()[0])): ?>
                        <h6 class="pro-user-desc text-muted fs-12"><?php echo e(Auth::user()->getRoleNames()[0]); ?></h6>
                        <?php endif; ?>
                        <div class="profilerating" data-rating="<?php echo e($avg); ?>"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title"> <?php echo e(lang('Personal Details')); ?></h4>
            </div>
            <div class="card-body px-0 pb-0">

                <div class="table-responsive tr-lastchild">
                    <table class="table mb-0 table-information">
                        <tbody>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Employee ID')); ?></span>
                                </td>
                                <td class="py-2 ps-4"><?php echo e(Auth::user()->empid); ?></td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Name')); ?> </span>
                                </td>
                                <td class="py-2 ps-4"><?php echo e(Auth::user()->name); ?></td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Role')); ?> </span>
                                </td>
                                <td class="py-2 ps-4">
                                    <?php if(!empty(Auth::user()->getRoleNames()[0])): ?>

                                        <?php echo e(Auth::user()->getRoleNames()[0]); ?>

                                        <?php endif; ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Email')); ?> </span>
                                </td>
                                <td class="py-2 ps-4"><?php echo e(Auth::user()->email); ?></td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Phone')); ?> </span>
                                </td>
                                <td class="py-2 ps-4"><?php echo e(Auth::user()->phone); ?></td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Languages')); ?> </span>
                                </td>
                                <td class="py-2 ps-4">
                                    <?php
                                    $values = explode(",", Auth::user()->languagues);

                                    ?>

                                    <ul class="custom-ul">
                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="tag mb-1"><?php echo e(ucfirst($value)); ?></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"><?php echo e(lang('Skills')); ?> </span>
                                </td>
                                <td class="py-2 ps-4">
                                    <?php
                                    $values = explode(",", Auth::user()->skills);
                                    ?>

                                    <ul class="custom-ul">
                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="tag mb-1"><?php echo e(ucfirst($value)); ?></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <span class="font-weight-semibold w-50"> <?php echo e(lang('Location')); ?> </span>
                                </td>
                                <td class="py-2 ps-4"><?php echo e(Auth::user()->country); ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php if(setting('SPRUKOADMIN_P') == 'on'): ?>

        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title"> <?php echo e(lang('Personal Setting')); ?></h4>
            </div>
            <div class="card-body">
                <div class="switch_section">
                    <div class="switch-toggle d-flex mt-4">
                        <a class="onoffswitch2">
                            <input type="checkbox" data-id="<?php echo e(Auth::id()); ?>" name="checkbox" id="myonoffswitch181" class=" toggle-class onoffswitch2-checkbox sprukoswitch"  <?php if(Auth::check() && Auth::user()->darkmode == 1): ?> checked="" <?php endif; ?>>
                            <label for="myonoffswitch181" class="toggle-class onoffswitch2-label" data-id="<?php echo e(Auth::id()); ?>"></label>
                        </a>
                        <label class="form-label ps-3"> <?php echo e(lang('Switch to Dark-Mode')); ?> </label>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Setting -->
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title"> <?php echo e(lang('Setting')); ?></h4>
            </div>
            <div class="card-body">
                <div class="switch_section">
                    <div class="switch-toggle d-flex mt-4">
                        <a class="onoffswitch2">
                            <input type="checkbox" data-id="<?php echo e(Auth::id()); ?>" name="emailnotificationon" id="emailnotificationon" class=" toggle-class onoffswitch2-checkbox"  <?php if(Auth::check() && Auth::user()->usetting != null): ?> <?php if(Auth::check() && Auth::user()->usetting->emailnotifyon == 1): ?> checked="" <?php endif; ?> <?php endif; ?>>
                            <label for="emailnotificationon" class="toggle-class onoffswitch2-label" data-id="<?php echo e(Auth::id()); ?>"></label>
                        </a>
                        <label class="form-label ps-3"> <?php echo e(lang('Email Notification On/Off')); ?> </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Setting --->

    </div>
    <div class="col-xl-9 col-lg-8 col-md-12">
        <div class="card ">
            <div class="card-header border-0">
                <h4 class="card-title"> <?php echo e(lang('Profile Details')); ?></h4>
            </div>
            <div class="card-body">
                <?php if(Auth::user()->can('Profile Edit')): ?>
                    <form method="POST" action="<?php echo e(url('/admin/profile')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo view('honeypot::honeypotFormFields'); ?>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('First Name')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" value="<?php echo e(Auth::user()->firstname); ?>">
                                    <?php $__errorArgs = ['firstname'];
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
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Last Name')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(Auth::user()->lastname); ?>">
                                    <?php $__errorArgs = ['lastname'];
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
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Email')); ?></label>
                                    <input type="email" class="form-control" Value="<?php echo e(Auth::user()->email); ?>" disabled>

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <?php echo e(lang('Employee ID')); ?></label>
                                    <input type="email" class="form-control" Value="<?php echo e(Auth::user()->empid); ?>" disabled>

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Mobile Number')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone"  value="<?php echo e(old('phone',Auth::user()->phone)); ?>" >
                                    <?php $__errorArgs = ['phone'];
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
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Languages')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['languages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> sprukotags" value="<?php echo e(old('languages', Auth::user()->languagues)); ?>" name="languages[]" data-role="tagsinput" />
                                    <?php $__errorArgs = ['languages'];
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
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Skills')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> sprukotags" value="<?php echo e(old('skills', Auth::user()->skills)); ?>" name="skills[]" data-role="tagsinput" />
                                    <?php $__errorArgs = ['skills'];
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
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Country')); ?></label>
                                    <select name="country" class="form-control select2 select2-show-search">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>" <?php echo e($country->name == Auth::user()->country ? 'selected' : ''); ?>><?php echo e(lang($country->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>


                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Timezone')); ?></label>
                                    <select name="timezone" class="form-control select2 select2-show-search">
                                        <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $timezoness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($timezoness->timezone); ?>" <?php echo e($timezoness->timezone == Auth::user()->timezone ? 'selected' : ''); ?>><?php echo e(lang($timezoness->timezone)); ?> <?php echo e(lang($timezoness->utc)); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(lang('Upload Image')); ?></label>
                                    <div class="input-group file-browser">
                                        <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" type="file" accept="image/png, image/jpeg,image/jpg" >

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
                                    <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                </div>
                                <?php if(Auth::user()->image != null): ?>
                                    <div class="file-image-1 removesprukoi<?php echo e(Auth::user()->id); ?>">
                                        <div class="product-image custom-ul">
                                            <a href="#">
                                                <img src="<?php echo e(asset('public/uploads/profile/' .Auth::user()->image)); ?>" class="br-5" alt="<?php echo e(Auth::user()->image); ?>">
                                            </a>
                                            <ul class="icons">
                                                <li><a href="javascript:(0);" class="bg-danger delete-image" data-id="<?php echo e(Auth::user()->id); ?>"><i class="fe fe-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 card-footer">
                                <div class="form-group float-end mb-0">
                                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <?php echo csrf_field(); ?>
                    <?php echo view('honeypot::honeypotFormFields'); ?>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('First Name')); ?></label>
                                <input type="text" class="form-control"
                                    name="firstname" value="<?php echo e(Auth::user()->firstname); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Last Name')); ?></label>
                                <input type="text" class="form-control"
                                    name="lastname" value="<?php echo e(Auth::user()->lastname); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Email')); ?></label>
                                <input type="email" class="form-control" Value="<?php echo e(Auth::user()->email); ?>" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Employee ID')); ?></label>
                                <input type="email" class="form-control" Value="<?php echo e(Auth::user()->empid); ?>" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Mobile Number')); ?></label>
                                <input type="text" class="form-control " name="phone"
                                    value="<?php echo e(old('phone',Auth::user()->phone)); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Languages')); ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo e(Auth::user()->languagues); ?>" name="languages" data-role="tagsinput" disabled />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Skills')); ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo e(Auth::user()->skills); ?>" name="skills" data-role="tagsinput" disabled />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Country')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e(Auth::user()->country); ?>" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <?php echo e(lang('Timezone')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e(Auth::user()->timezone); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(lang('Upload Image')); ?></label>
                                <div class="input-group file-browser">
                                    <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" type="file" accept="image/png, image/jpeg,image/jpg" disabled>

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
                                <small class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                            </div>
                            <?php if(Auth::user()->image != null): ?>
                                <div class="file-image-1 removesprukoi<?php echo e(Auth::user()->id); ?>">
                                    <div class="product-image custom-ul">
                                        <a href="#">
                                            <img src="<?php echo e(asset('public/uploads/profile/' .Auth::user()->image)); ?>" class="br-5" alt="<?php echo e(Auth::user()->image); ?>">
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if(setting('Employe_google_two_fact') == 'on' || setting('Employe_email_two_fact') == 'on'): ?>
            <div class="card">
                <div class="card-header border-bottom-0 pb-0">
                    <div class="card-title"> <?php echo e(lang('Two Factor Authentication')); ?></div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="d-sm-flex d-block gap-3 align-items-center">
                                        <?php if(setting('Employe_google_two_fact') == 'on'): ?>
                                            <div class="switch_section px-0">
                                                <div class="switch-toggle d-flex align-items-center">
                                                    <a class="onoffswitch2">
                                                        <input type="checkbox" data-id="<?php echo e(Auth::id()); ?>"
                                                            name="emptwofactor" id="emptwofactor"
                                                            class="toggle-class onoffswitch2-checkbox emptwofactor"
                                                            autocomplete="off"
                                                            <?php if(Auth::check() && Auth::user()->twofactorauth == 'googletwofact'): ?> checked="" <?php endif; ?>>
                                                        <label for="emptwofactor" class="toggle-class onoffswitch2-label mb-0"
                                                            data-id="<?php echo e(Auth::id()); ?>"></label>
                                                    </a>
                                                    <label
                                                        class="form-label ps-3 mb-0"><?php echo e(lang('Use Google Authenticator')); ?></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(setting('Employe_email_two_fact') == 'on'): ?>
                                            <div class="switch_section px-0">
                                                <div class="switch-toggle d-flex align-items-center">
                                                    <a class="onoffswitch2">
                                                        <input type="checkbox" data-id="<?php echo e(Auth::id()); ?>"
                                                            name="empemailtwofactor" id="empemailtwofactor"
                                                            class="toggle-class onoffswitch2-checkbox sprukoempemailtwofactor"
                                                            autocomplete="off"
                                                            <?php if(Auth::check() && Auth::user()->twofactorauth == 'emailtwofact'): ?> checked="" <?php endif; ?>>
                                                        <label for="empemailtwofactor"
                                                            class="toggle-class onoffswitch2-label mb-0"></label>
                                                    </a>
                                                    <label class="form-label ps-3 mb-0"><?php echo e(lang('Use Email OTP')); ?></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="emptwofactorapp"></div>
                            <?php if(setting('Employe_google_two_fact') == 'on' && Auth::user()->twofactorauth == 'googletwofact'): ?>
                                <div class="mt-5" id="configured">
                                    <div class="alert bg-success-transparent text-dark " role="alert">
                                        <h5 class="mb-4"><?php echo e(lang('Google two factor authentication is already configured.')); ?></h5>
                                        <button type="button" class="btn btn-primary reconfig"><?php echo e(lang('Reconfigure')); ?></button>
                                        <button class="btn btn-danger removetf"><?php echo e(lang('Remove')); ?></button>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(setting('Employe_email_two_fact') == 'on' && Auth::user()->twofactorauth == 'emailtwofact'): ?>
                                <div class="mt-5 " id="emailtwofac">
                                    <div class="alert bg-warning-transparent text-dark p-5" role="alert">
                                        <h4 class="mb-2"><?php echo e(lang('How does email otp authenticator works ?')); ?></h4>
                                        <p class="mb-0"><?php echo e(lang('Two-Factor Authentication (2FA) is an option that provides an
                                            extra
                                            layer of security to your Private Email account in addition to your email and
                                            password. When Two-Factor Authentication is enabled, your account cannot be
                                            accessed
                                            by anyone unauthorized by you, even if they have stolen your password.')); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php echo $__env->make('admin.auth.passwords.changepassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div>
<!--End Profile Page-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL TAG js-->
<script src="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.js')); ?>?v=<?php echo time(); ?>"></script>

<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

<script type="text/javascript">

    "use strict";

    (function($)  {

        // Variables
        var SITEURL = '<?php echo e(url('')); ?>';

        // Csrf Field
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Profile Rating
        $(".profilerating").starRating({
            readOnly: true,
            // totalStars: 5,
            starSize: 20,
            emptyColor  :  '#ffffff',
            activeColor :  '#F2B827',
            strokeColor :  '#F2B827',
            strokeWidth :  15,
            useGradient : false

        });

        // DarkMode switch js
        $('.sprukoswitch').on('change', function() {
            var dark = $('#myonoffswitch181').prop('checked') == true ? '1' : '';
            var user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '<?php echo e(url('/admin/usersettings')); ?>',
                data: {
                    'dark': dark,
                    'user_id': user_id
                },
                success: function(data){
                    location.reload();
                    toastr.success('<?php echo e(lang('Updated Successfully!', 'alerts')); ?>');
                }
            });
        });

        <?php if(Auth::user()->image != null): ?>

        //Delete Image
        $('body').on('click', '.delete-image', function () {
            var _id = $(this).data("id");

            swal({
                title: `<?php echo e(lang('Are you sure you want to remove the profile image?', 'alerts')); ?>`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: SITEURL + "/admin/image/remove/"+_id,
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
        <?php endif; ?>

        $('body').on('change', '#emailnotificationon', function(e){
            e.preventDefault();

            let emailvalue = $(this).prop('checked') == true ? '1' : '0' ,
                userid = $(this).data('id');

                $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo e(url('/admin/emailonoff')); ?>',
                data: {
                    'emailvalue': emailvalue,
                    'userid' : userid,
                },
                success: function(data){
                    toastr.success('<?php echo e(lang('Updated Successfully!', 'alerts')); ?>')
                    // window.location.reload();
                }
            });

        });


        // two factor auth start
        //email twofactor authentication
        $('.removetf').on('click', function() {
            var user_id = <?php echo e(Auth::id()); ?>;
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo e(route('emptwofactqr')); ?>',
                data: {

                    'user_id': user_id
                },
                success: function(data) {
                    // location.reload();

                    if (document.querySelector("#emptwofactor") != null && document.querySelector("#emptwofactor").checked != false) {
                        document.querySelector("#emptwofactor").checked = false;
                    }
                    if (document.querySelector("#configured")) {
                        document.querySelector("#configured").remove();
                    }
                    toastr.success(data.success);
                }
            });
        });

        $('.sprukoempemailtwofactor').on('change', function() {

            if (document.querySelector("#configured")) {
                document.querySelector("#configured").remove();
            }
            if (document.querySelector("#emptwofactor") != null && document.querySelector("#emptwofactor").checked != false) {
                document.querySelector("#emptwofactor").checked = false;
            }
            if (document.querySelector("#TwoFactorAuthentication")) {
                document.querySelector("#TwoFactorAuthentication").remove();
            }

            var emailtwofact = $('#empemailtwofactor').prop('checked') == true ? '1' : '';
            var cust_id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo e(route('user.emailtwofactor')); ?>',
                data: {
                    'emailtwofact': emailtwofact,
                    'cust_id': cust_id
                },
                success: function(data) {
                    if (data.disabled) {
                        if (document.querySelector("#TwoFactorAuthentication")) {
                            document.querySelector("#TwoFactorAuthentication").remove();
                        }
                        if (document.querySelector("#emailtwofac")) {
                            document.querySelector("#emailtwofac").remove();
                        }
                        toastr.success(data.success);
                    } else {

                        let element = document.querySelector("#emptwofactorapp").parentNode
                            .parentNode.parentNode
                        let nodeElement = document.createElement("div");
                        nodeElement.className = "col-md-12 mt-4 "
                        nodeElement.id = "TwoFactorAuthentication"
                        nodeElement.innerHTML = `<div class="mt-5">
                                <div class="alert bg-warning-transparent text-dark p-5" role="alert">
                                    <h4 class="mb-2">How does email otp authenticator works ?</h4>
                                    <p class="mb-0">Two-Factor Authentication (2FA) is an option that provides an extra
                                        layer of security to your Private Email account in addition to your email and
                                        password. When Two-Factor Authentication is enabled, your account cannot be accessed
                                        by anyone unauthorized by you, even if they have stolen your password.</p>
                                </div>
                            </div>`
                        element.appendChild(nodeElement)

                        toastr.success(data.success);
                    }
                }
            });
        });

        // google twofactor
        $('.emptwofactor,.reconfig').on('click', function() {

            if (document.querySelector("#configured")) {
                document.querySelector("#configured").remove();
            }
            if (document.querySelector("#emailtwofac")) {
                document.querySelector("#emailtwofac").remove();
            }
            if (document.querySelector("#empemailtwofactor") != null && document.querySelector("#empemailtwofactor").checked) {
                document.querySelector("#empemailtwofactor").checked = false;
            }
            var emptwofact = $('#emptwofactor').prop('checked') == true ? '1' : '';
            var user_id = <?php echo e(Auth::id()); ?>;

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo e(route('emptwofactqr')); ?>',
                data: {
                    'emptwofact': emptwofact,
                    'user_id': user_id
                },
                success: function(data) {

                    if (data?.workprogress == 'workingmode') {
                        if (document.querySelector("#TwoFactorAuthentication")) {
                            document.querySelector("#TwoFactorAuthentication").remove();
                        }
                        let element = document.querySelector("#emptwofactorapp").parentNode
                            .parentNode.parentNode
                        let nodeElement = document.createElement("div");
                        nodeElement.className = "col-md-12 mt-4 "
                        nodeElement.id = "TwoFactorAuthentication"
                        nodeElement.innerHTML = `<div class="d-flex align-items-start gap-4 mt-6 flex-wrap">
                            <div class="qr-code">
                                ${data.QR_Image}
                            </div>
                            <div>
                                <h5 class="fw-semibold">Set up Google Authenticator</h5>
                                <p class="mb-0">Set up your two factor authentication by scanning the QR code.
                                    Alternatively, you can use the code </p>
                                <div class="mb-4 mt-2">
                                    <span class="badge fs-12 bg-light text-default p-2">${data.secret}</span>
                                </div>
                                <div class="fs-13">You must set up your Google Authenticator app before continuing.
                                    You will be unable to login otherwise</div>
                                <div class="mb-3 fs-13">Please enter the <span class="font-weight-bold">OTP</span>
                                    generated on your Authenticator App.
                                    Ensure you submit the current one because it refreshes every <span class="text-danger">30 seconds<sup>*</sup></span>
                                </div>
                                <label for="one_time_password" class="control-label text-success font-weight-semibold mb-1">One Time
                                    Password</label>
                                <div class="d-flex align-item-end gap-3">
                                    <div class="w-50">
                                        <input id="secret_key_value" type="hidden" name="secret_key_value" value="${data.secret}">
                                        <input id="one_time_password" type="number" class="form-control" name="one_time_password" required required autofocus autocomplete="off" >
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" id="otpverify">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>`
                        element.appendChild(nodeElement)

                        document.querySelector("#otpverify").addEventListener("click", () => {
                            var cust_id = <?php echo e(Auth::id()); ?>;
                            var secret_key = document.getElementById("secret_key_value").value;
                            var otp = document.getElementById("one_time_password").value;

                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                url: '<?php echo e(route('empgoogle2faotp.verify')); ?>',
                                data: {
                                    'otp': otp,
                                    'id': cust_id,
                                    'secret_key_value': secret_key
                                },
                                success: function(response) {
                                    if (response == 0) {
                                        toastr.error(
                                            '<?php echo e(lang('Invalid otp.', 'alerts')); ?>'
                                        );
                                    }
                                    if (response == 1) {
                                        document.querySelector(
                                                "#TwoFactorAuthentication")
                                            .remove()
                                        location.reload();
                                        toastr.success(
                                            '<?php echo e(lang('GoogleTwo factor authentication activated.', 'alerts')); ?>'
                                        );

                                    }

                                },
                                error: function(data) {
                                    toastr.error(
                                        '<?php echo e(lang('please enter your otp.', 'alerts')); ?>'
                                    );
                                    // console.log('Error:', data);
                                }
                            });

                            //----------------------------------------

                            //========================================================


                        })
                        toastr.success(
                            '<?php echo e(lang('Setup your authenticator app.', 'alerts')); ?>');
                    } else {
                        if (document.querySelector("#TwoFactorAuthentication")) {
                            document.querySelector("#TwoFactorAuthentication").remove()
                        }
                        location.reload();
                        toastr.success(data.success);
                    }

                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        });
        // two factor auth end

    })(jQuery);

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/profile/adminprofile.blade.php ENDPATH**/ ?>