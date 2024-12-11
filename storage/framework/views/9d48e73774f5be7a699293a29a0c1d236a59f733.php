                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <h4 class="card-title"><?php echo e(lang('Change Password')); ?></h4>
                                                        </div>
                                                        <form method="POST" action="<?php echo e(route('change.password')); ?>">
                                                            <?php echo csrf_field(); ?>

                                                            <?php echo view('honeypot::honeypotFormFields'); ?>

                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <?php if(Auth::user()->password != null): ?>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label class="form-label mb-0 mt-2"><?php echo e(lang('Old Password')); ?><span class="text-red">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input type="password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('password')); ?>" value="" name="current_password" autocomplete="current_password">
                                                                                <?php $__errorArgs = ['current_password'];
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
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('New Password')); ?><span class="text-red">*</span></label>
                                                                        </div>
                                                                        <div class="col-md-9 password-change">
                                                                            <div class="input-group d-md-flex d-block">
                                                                                <input type="password" class="form-control sprukopsdauto <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('password')); ?>" value=""name="password" autocomplete="password">

                                                                                <div class="input-group-text p-0 ">
                                                                                     <button type="button"  class="btn btn-light-2  sprukovisipsd"><i class="fe fe-eye"></i></button>
                                                                                     <button type="button" class="btn btn-light-2   br-br-5 br-tr-5 sprukogenratepsd" ><?php echo e(lang('Generate Password')); ?></button>
                                                                                </div>
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
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Confirm Password')); ?><span class="text-red">*</span></label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('Confirm Password')); ?>" value=""name="password_confirmation" autocomplete="password_confirmation">
                                                                            <?php $__errorArgs = ['password_confirmation'];
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
                                                            </div>
                                                            <div class="card-footer text-end">
                                                            <button type="submit" class="btn btn-secondary" onclick="this.disabled=true;this.form.submit();"><?php echo e(lang('Save Changes')); ?></button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <script>
                                                        "use strict";
                                                        let sprukogenpsd = document.querySelector('.sprukogenratepsd');
                                                        let sprukopsdauto = document.querySelector('.sprukopsdauto');
                                                        let sprukovisipsd = document.querySelector('.sprukovisipsd i');
                                                        let sprukovisipsds = document.querySelector('.sprukovisipsd');

                                                        sprukogenpsd.addEventListener('click', () => {
                                                            var password = '';
                                                            var strs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +
                                                                    'abcdefghijklmnopqrstuvwxyz0123456789@#$';

                                                            for (let i = 1; i <= 10; i++) {
                                                                var char = Math.floor(Math.random()
                                                                            * strs.length + 1);

                                                                password += strs.charAt(char)
                                                            }
                                                            sprukopsdauto.value = password;
                                                        });

                                                        sprukovisipsds.addEventListener('click', ()=>{

                                                            if(sprukopsdauto.getAttribute('type') == "text"){

                                                                sprukopsdauto.setAttribute('type', 'password');
                                                                sprukovisipsd.removeAttribute('class', 'fe fe-eye-off');
                                                                sprukovisipsd.setAttribute('class', 'fe fe-eye');
                                                            }else if(sprukopsdauto.getAttribute('type') == "password"){
                                                                sprukopsdauto.setAttribute('type', 'text');
                                                                sprukovisipsd.removeAttribute('class', 'fe fe-eye');
                                                                sprukovisipsd.setAttribute('class', 'fe fe-eye-off');
                                                            }
                                                        });



                                                    </script>
<?php /**PATH /home/steursr/www/resources/views/user/auth/passwords/changepassword.blade.php ENDPATH**/ ?>