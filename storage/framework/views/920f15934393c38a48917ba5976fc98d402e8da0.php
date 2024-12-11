<?php $__env->startSection('styles'); ?>

<!-- INTERNAl Tag css -->
<link href="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- INTERNAL Sweet-Alert css -->
<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!--Page header-->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Employees')); ?></span></h4>
    </div>
</div>
<!--End Page header-->

<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Edit Employee')); ?></h4>
        </div>
        <form method="POST" action="<?php echo e(url('/admin/agentprofile/' . $user->id)); ?>" enctype="multipart/form-data">
            <div class="card-body" >
                <?php echo csrf_field(); ?>

                <?php echo view('honeypot::honeypotFormFields'); ?>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label"><?php echo e(lang('First Name')); ?> <span class="text-red">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname"  value="<?php echo e($user->firstname); ?>" >
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
                            <label class="form-label"><?php echo e(lang('Last Name')); ?> <span class="text-red">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname"  value="<?php echo e($user->lastname); ?>" >
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
                            <label class="form-label"><?php echo e(lang('Username')); ?></label>
                            <input type="text" class="form-control" name="name"  value="<?php echo e($user->name); ?>" disabled >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label"><?php echo e(lang('Employee ID')); ?> <span class="text-red">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['empid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('EMPID-001')); ?>" name="empid"  value="<?php echo e(old('empid', $user->empid)); ?>">
                            <?php $__errorArgs = ['empid'];
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
                            <label class="form-label"><?php echo e(lang('Select Role')); ?> <span class="text-red">*</span></label>


                            <?php if(Auth::check() && Auth::user()->id == '1'): ?>
                                <?php if(Auth::user()->id != $user->id ): ?>

                                <select class="form-control select2-show-search  select2 <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-placeholder="<?php echo e(lang('Select Role')); ?>" name="role" id="roleID" >
                                    <?php if(!empty($user->getRoleNames()[0])): ?>

                                    <option label="<?php echo e(lang('Select Role')); ?>"></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option  value="<?php echo e($role->name); ?>" <?php echo e(old('role', $user->getRoleNames()[0])==$role->name ? 'selected' :''); ?>> <?php echo e($role->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php else: ?>

                                    <option label="<?php echo e(lang('Select Role')); ?>"></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <option  value="<?php echo e($role->name); ?>" <?php echo e(old('role')==$role->name ? 'selected' :''); ?>> <?php echo e($role->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </select>
                                <?php else: ?>
                                    <?php if(!empty($user->getRoleNames()[0])): ?>

                                    <input type="text" class="form-control" name="role" value="<?php echo e($user->getRoleNames()[0]); ?>" readonly>

                                    <?php else: ?>

                                    <input type="text" class="form-control" name="role" value="superadmin" readonly>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(Auth::user()->id != $user->id  && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

                                <select class="form-control select2-show-search  select2 <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-placeholder="<?php echo e(lang('Select Role')); ?>" name="role" id="roleID" >
                                    <?php if(!empty($user->getRoleNames()[0])): ?>

                                    <option label="<?php echo e(lang('Select Role')); ?>"></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option  value="<?php echo e($role->name); ?>" <?php echo e(old('role', $user->getRoleNames()[0])==$role->name ? 'selected' :''); ?>> <?php echo e($role->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php else: ?>

                                    <option label="<?php echo e(lang('Select Role')); ?>"></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <option  value="<?php echo e($role->name); ?>" <?php echo e(old('role')==$role->name ? 'selected' :''); ?>> <?php echo e($role->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </select>
                                <?php else: ?>
                                    <?php if(!empty($user->getRoleNames()[0])): ?>

                                    <input type="text" class="form-control" name="role" value="<?php echo e($user->getRoleNames()[0]); ?>" readonly>

                                    <?php else: ?>

                                    <input type="text" class="form-control" name="role" value="superadmin" readonly>

                                    <?php endif; ?>
                                <?php endif; ?>

                            <?php endif; ?>

                            <?php $__errorArgs = ['role'];
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
                            <label class="form-label"><?php echo e(lang('Department')); ?> </label>
                            <select class="form-control select2-show-search  select2 <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-placeholder="<?php echo e(lang('Select Department')); ?>" name="department"  >
                                <option label="<?php echo e(lang('Select Department')); ?>"></option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option  value="<?php echo e($department->departmentname); ?>" <?php echo e($user->departments == $department->departmentname ? "selected" : ""); ?>> <?php echo e($department->departmentname); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                            <?php $__errorArgs = ['department'];
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
                            <label class="form-label"><?php echo e(lang('Email')); ?> <span class="text-red">*</span></label>
                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" Value="<?php echo e($user->email); ?>">
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
unset($__errorArgs, $__bag); ?>" name="phone"  value="<?php echo e(old('phone', $user->phone)); ?>" >
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e($user->languagues); ?>" name="languages" data-role="tagsinput" />
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e($user->skills); ?>" name="skills" data-role="tagsinput" />
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
							<select name="country" class="form-control select2 select2-show-search" id="">
								<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($country->name); ?>" <?php echo e($country->name == $user->country ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>


						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label class="form-label"><?php echo e(lang('Timezone')); ?></label>
							<select name="timezone" class="form-control select2 select2-show-search" id="">
								<?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $timezoness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($timezoness->timezone); ?>" <?php echo e($timezoness->timezone == $user->timezone ? 'selected' : ''); ?>><?php echo e($timezoness->timezone); ?> <?php echo e($timezoness->utc); ?></option>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
                    <div class="col-md-6 col-sm-6">
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
                        <?php if($user->image != null): ?>
                            <div class="file-image-1 removesprukoi<?php echo e($user->id); ?>">
                                <div class="product-image custom-ul">
                                    <a href="#">
                                        <img src="<?php echo e(asset('public/uploads/profile/' .$user->image)); ?>" class="br-5" alt="<?php echo e($user->image); ?>">
                                    </a>
                                    <ul class="icons">
                                        <li><a href="javascript:(0);" class="bg-danger delete-image" data-id="<?php echo e($user->id); ?>"><i class="fe fe-trash"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
					</div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="form-label"><?php echo e(lang('Status')); ?></label>
                            <?php if(Auth::check() && Auth::user()->id == '1'): ?>
                                <?php if(Auth::user()->id != $user->id ): ?>

                                <select class="form-control  select2" data-placeholder="<?php echo e(lang('Select Status')); ?>" name="status">
                                    <option label="<?php echo e(lang('Select Status')); ?>"></option>
                                    <option value="1" <?php if($user->status === '1'): ?> selected <?php endif; ?>><?php echo e(lang('Active')); ?></option>
                                    <option value="0" <?php if($user->status === '0'): ?> selected <?php endif; ?>><?php echo e(lang('Inactive')); ?></option>
                                </select>
                                <?php else: ?>
                                    <?php if(!empty($user->getRoleNames()[0])): ?>
                                    <?php if($user->status === '1'): ?>

                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Active')); ?>" readonly>
                                    <?php endif; ?>
                                    <?php if($user->status === '0'): ?>
                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Inactive')); ?><" readonly>
                                    <?php endif; ?>


                                    <?php else: ?>

                                    <?php if($user->status === '1'): ?>

                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Active')); ?>" readonly>
                                    <?php endif; ?>
                                    <?php if($user->status === '0'): ?>
                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Inactive')); ?><" readonly>
                                    <?php endif; ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(Auth::user()->id != $user->id  && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

                                <select class="form-control  select2" data-placeholder="<?php echo e(lang('Select Status')); ?>" name="status">
                                    <option label="<?php echo e(lang('Select Status')); ?>"></option>
                                    <option value="1" <?php if($user->status === '1'): ?> selected <?php endif; ?>><?php echo e(lang('Active')); ?></option>
                                    <option value="0" <?php if($user->status === '0'): ?> selected <?php endif; ?>><?php echo e(lang('Inactive')); ?></option>
                                </select>
                                <?php else: ?>
                                    <?php if(!empty($user->getRoleNames()[0])): ?>

                                    <?php if($user->status === '1'): ?>

                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Active')); ?>" readonly>
                                    <?php endif; ?>
                                    <?php if($user->status === '0'): ?>
                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Inactive')); ?><" readonly>
                                    <?php endif; ?>

                                    <?php else: ?>

                                    <?php if($user->status === '1'): ?>

                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Active')); ?>" readonly>
                                    <?php endif; ?>
                                    <?php if($user->status === '0'): ?>
                                    <input type="hidden" class="form-control" name="status" value="<?php echo e($user->status); ?>" >
                                    <input type="text" class="form-control"  value="<?php echo e(lang('Inactive')); ?><" readonly>
                                    <?php endif; ?>

                                    <?php endif; ?>
                                <?php endif; ?>

                            <?php endif; ?>


                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e(lang('Select Dashboard')); ?></label>
                            <div class="custom-controls-stacked d-md-flex" id="text">
                                <label class="custom-control form-radio success me-4">
                                    <input id="empDashboard" type="radio" class="custom-control-input" name="dashboard" value="Employee" autocomplete="off" <?php if($user->dashboard != null): ?> <?php if($user->dashboard == 'Employee'): ?> checked  <?php endif; ?>  <?php endif; ?>>
                                    <span class="custom-control-label"><?php echo e(lang('Employee Dashboard')); ?></span>
                                </label>

                                <label class="custom-control form-radio success me-4">
                                    <input id="AdmDashboard" type="radio" class="custom-control-input" name="dashboard" value="Admin"  autocomplete="off" <?php if($user->dashboard != null): ?> <?php if($user->dashboard == 'Admin'): ?> checked <?php endif; ?>  <?php endif; ?>>
                                    <span class="custom-control-label"><?php echo e(lang('Admin Dashboard')); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group float-end">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Update Profile')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!--File BROWSER -->
<script src="<?php echo e(asset('assets/js/form-browser.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL TAG js-->
<script src="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>

<script type="text/javascript">
    var SITEURL = '<?php echo e(url('')); ?>';
    (function($) {
    "use strict";

    // Csrf Field
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $('#roleID').on('change',function(e) {
    var cat_id = e.target.value;
    let empdasType = document.querySelector('#empDashboard');
    let admindasType = document.querySelector('#AdmDashboard');
    if(cat_id == 'superadmin'){
    admindasType.checked = true
    }
    else{
    empdasType.checked = true
    }
    });

    })(jQuery);

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

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/agent/agentprofile.blade.php ENDPATH**/ ?>