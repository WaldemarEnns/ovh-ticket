<?php $__env->startSection('content'); ?>

								<div class="pb-0 px-5 pt-0 text-center">
									<h3 class="mb-2"><?php echo e(lang('Reset Password')); ?></h1>
								</div>
								<form class="card-body pt-3 pb-0" method="POST" action="<?php echo e(url('customer/reset-password')); ?>" >
                                <?php echo csrf_field(); ?>
								<?php echo view('honeypot::honeypotFormFields'); ?>

                                <input type="hidden" name="token" value="<?php echo e($token); ?>">
									<div class="form-group">
										<label class="form-label"  for="email" ><?php echo e(lang('Email')); ?></label>
										<input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($user->email ?? old('email')); ?>" autocomplete="email" placeholder="<?php echo e(lang('example@mail.com')); ?>" autofocus readonly>

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
									<div class="form-group">
										<label class="form-label" for="password" ><?php echo e(lang('New Password')); ?></label>
										<input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" placeholder="<?php echo e(lang('password')); ?>" type="password">
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
									<div class="form-group">
										<label class="form-label" for="password-confirm" ><?php echo e(lang('Confirm Password')); ?></label>
										<input class="form-control" placeholder="<?php echo e(lang('password')); ?>" id="password-confirm"  name="password_confirmation" type="password">
									</div>
									<div class="submit">
                                    <button type="submit" class="btn btn-secondary btn-block" onclick="this.disabled=true;this.form.submit();">
                                        <?php echo e(lang('Reset Password')); ?>

                                    </button>
									</div>
									<div class="text-center mt-4">
										<p class="text-dark mb-0"><?php echo e(lang('Remembered your password?')); ?><a class="text-primary ms-1" href="<?php echo e(url('/login')); ?>"><?php echo e(lang('Login', 'menu')); ?></a></p>
									</div>
								</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custommaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/user/auth/passwords/resetpassword.blade.php ENDPATH**/ ?>