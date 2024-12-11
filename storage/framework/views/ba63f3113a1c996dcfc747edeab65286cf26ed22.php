<?php $__env->startSection('styles'); ?>

<!-- INTERNAl Tag css -->
<link href="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!--Page header-->
<div class="page-header d-xl-flex d-block">
	<div class="page-leftheader">
		<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Employee')); ?></span></h4>
	</div>
</div>
<!--End Page header-->

<!-- Employee Create -->
<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card ">
		<div class="card-header border-0">
			<h4 class="card-title"><?php echo e(lang('Create Employee', 'menu')); ?></h4>
		</div>
		<form method="POST" action="<?php echo e(url('/admin/agent')); ?>" enctype="multipart/form-data">
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
unset($__errorArgs, $__bag); ?>" name="firstname"  value="<?php echo e(old('firstname')); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="lastname"  value="<?php echo e(old('lastname')); ?>">
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
							<label class="form-label"><?php echo e(lang('Select Role')); ?> <span class="text-red">*</span></label>
							<select id="roleID" class="form-control select2-show-search  select2 <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-placeholder="<?php echo e(lang('Select Roles')); ?>" name="role"  >
								<option label="<?php echo e(lang('Select Role')); ?>"></option>
								<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<option  value="<?php echo e($role->name); ?>" <?php echo e(old('role') == $role->name ? "selected" : ""); ?>> <?php echo e($role->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							</select>
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
unset($__errorArgs, $__bag); ?>" data-placeholder="<?php echo e(lang('Select Department')); ?>" name="department">
								<option label="<?php echo e(lang('Select Department')); ?>"></option>
								<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<option  value="<?php echo e($department->departmentname); ?>" <?php echo e(old('departments') == $department->departmentname ? "selected" : ""); ?>> <?php echo e($department->departmentname); ?></option>

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
							<label class="form-label"><?php echo e(lang('Employee ID')); ?> <span class="text-red">*</span></label>
							<input type="text" class="form-control <?php $__errorArgs = ['empid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="EMPID-001" name="empid"  value="<?php echo e(old('empid')); ?>">
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
							<label class="form-label"><?php echo e(lang('Mobile Number')); ?> </label>
							<input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone"  value="<?php echo e(old('phone')); ?>" >
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
							<label class="form-label"><?php echo e(lang('Email')); ?> <span class="text-red">*</span></label>
							<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"  value="<?php echo e(old('email')); ?>" >
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
							<label class="form-label"><?php echo e(lang('Password')); ?> <small class="text-muted"><i><?php echo e(lang('(Please copy the Password)')); ?></i></small></label>
							<input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text"  name="password" value="<?php echo e(str_random(10)); ?>"  readonly>
							<?php $__errorArgs = ['password'];
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
							<input type="text"  class="form-control <?php $__errorArgs = ['languages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('languages')); ?>" name="languages" data-role="tagsinput" />
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
							<input type="text"  class="form-control <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('skills')); ?>" name="skills" data-role="tagsinput" />
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
								<option value=""></option>
								<option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>


						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label class="form-label"><?php echo e(lang('Timezone')); ?></label>
							<select name="timezone" class="form-control select2 select2-show-search" id="">
								<?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $timezoness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value=""></option>
									<option value="<?php echo e($timezoness->timezone); ?>"><?php echo e($timezoness->timezone); ?> <?php echo e($timezoness->utc); ?></option>

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
					</div>
					<div class="col-sm-12 col-md-12">
						<div class="form-group">
							<label class="form-label"><?php echo e(lang('Select Dashboard')); ?></label>
							<div class="custom-controls-stacked d-md-flex" id="text">
								<label class="custom-control form-radio success me-4">
									<input id="empDashboard" type="radio" class="custom-control-input" name="dashboard" value="Employee" checked="" autocomplete="off">
									<span class="custom-control-label"><?php echo e(lang('Employee Dashboard')); ?></span>
								</label>
								<label class="custom-control form-radio success me-4">
									<input id="AdmDashboard" type="radio" class="custom-control-input" name="dashboard" value="Admin" autocomplete="off">
									<span class="custom-control-label"><?php echo e(lang('Admin Dashboard')); ?></span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 card-footer">
				<div class="form-group float-end">
					<input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Create Employee', 'menu')); ?>" onclick="this.disabled=true;this.form.submit();">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Employee Create -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!--File BROWSER -->
<script src="<?php echo e(asset('assets/js/form-browser.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL TAG js-->
<script src="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.js')); ?>?v=<?php echo time(); ?>"></script>

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

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/agent/agentprofilecreate.blade.php ENDPATH**/ ?>