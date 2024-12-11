		<?php $__env->startSection('styles'); ?>

		<?php $__env->stopSection(); ?>

							<?php $__env->startSection('content'); ?>

							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Role & Permissions', 'menu')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->

							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<form method="POST" action="<?php echo e(url('/admin/role/edit/'.$role->id)); ?>" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>

										<?php echo view('honeypot::honeypotFormFields'); ?>
									<div class="card-header border-0">
										<h4 class="card-title"><?php echo e(lang('Edit Role & Permissions')); ?></h4>
										<div class="card-options card-header-styles switch pe-3">
											<div class="switch_section my-0">
												<div class="switch-toggle d-flex float-end mt-2 me-5">
													<a class="onoffswitch2">
														<input type="checkbox"  id="rolecheckall" class=" toggle-class onoffswitch2-checkbox"  >
														<label for="rolecheckall" class="toggle-class onoffswitch2-label" ></label>
													</a>
													<label class="form-label ps-3"><?php echo e(lang('Select All')); ?></label>
												</div>
											</div>
											<div class="form-group  ">
												<input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save')); ?>" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</div>

										<div class="card-body" >

											<div class="row">
												<div class="col-sm-12 col-md-12">
													<div class="form-group">
														<label class="form-label"><?php echo e(lang('Role Name')); ?></label>
														<?php if($role->name == 'superadmin'): ?>

														<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" Value="<?php echo e($role->name); ?>" readonly>

														<?php else: ?>

														<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" Value="<?php echo e($role->name); ?>">
														<?php endif; ?>
														<?php $__errorArgs = ['name'];
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

												<div class="col-sm-12 col-md-12">
													<div class="form-group ">
														<div class="switch-selectall">
															<label class="form-label"><?php echo e(lang('Permissions')); ?></label>
														</div>

														<div class="row">
															<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupname => $permision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

															<div class="col-sm-12 col-md-12">
																<h5 class="roles-title"><?php echo e($groupname); ?></h5>
															</div>
																<?php $__currentLoopData = $permision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

																	<div class="col-xl-3">
																		<div class="switch_section">
																			<div class="switch-toggle d-flex mt-4">
																				<a class="onoffswitch2">
																					<?php if($role->name == 'superadmin'): ?>

																					<input type="checkbox" name="permission[]" id="myonoffswitch<?php echo e($permission->id); ?>" class=" toggle-class onoffswitch2-checkbox rolecheck" Value="<?php echo e($permission->id); ?>"  <?php echo e($role->hasPermissionTo($permission->name) ? 'checked' : ''); ?> disabled>
																					<label for="myonoffswitch<?php echo e($permission->id); ?>" class="toggle-class onoffswitch2-label" ></label>
																					<?php else: ?>

																					<input type="checkbox" name="permission[]" id="myonoffswitch<?php echo e($permission->id); ?>" class=" toggle-class onoffswitch2-checkbox rolecheck" Value="<?php echo e($permission->id); ?>"  <?php echo e($role->hasPermissionTo($permission->name) ? 'checked' : ''); ?>>
																					<label for="myonoffswitch<?php echo e($permission->id); ?>" class="toggle-class onoffswitch2-label" ></label>
																					<?php endif; ?>

																				</a>
																				<label class="form-label ps-3"><?php echo e($permission->name); ?></label>
																			</div>
																		</div>
																	</div>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 card-footer ">
											<div class="form-group float-end">
												<input type="submit" class="btn btn-success" value="<?php echo e(lang('Save')); ?>" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</form>
								</div>
							</div>
							<?php $__env->stopSection(); ?>

		<?php $__env->startSection('scripts'); ?>

		<!-- INTERNAL Vertical-scroll js-->
		<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Index js-->
		<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>

		<script type="text/javascript">

			"use strict";

			(function($)  {

				// select all switch
				$('#rolecheckall').on('click', function() {
					if(this.checked){
						$('.rolecheck').each(function(){
							this.checked = true;
						});
					}else{
						$('.rolecheck').each(function(){
							this.checked = false;
						});
					}

				});

				// select all switch
				$('.rolecheck').on('click',function(){
					if($('.rolecheck:checked').length == $('.rolecheck').length){
						$('#rolecheckall').prop('checked',true);
					}else{
						$('#rolecheckall').prop('checked',false);
					}
				});
                if($('.rolecheck:checked').length == $('.rolecheck').length){
                    $('#rolecheckall').prop('checked',true);
                }else{
                    $('#rolecheckall').prop('checked',false);
                }
			})(jQuery);

		</script>

		<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/rolecreate/edit.blade.php ENDPATH**/ ?>