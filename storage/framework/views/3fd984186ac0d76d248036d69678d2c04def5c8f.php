<?php $__env->startSection('content'); ?>

    <!-- Section -->
    <section>
        <div class="bannerimg cover-image" data-bs-image-src="<?php echo e(asset('assets/images/photos/banner1.jpg')); ?>">
            <div class="header-text mb-0">
                <div class="container ">
                    <div class="row text-white">
                        <div class="col">
                            <h1 class="mb-0"><?php echo e(lang('Edit Profile')); ?></h1>
                        </div>
                        <div class="col col-auto">
                            <ol class="breadcrumb text-center">
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-white-50"><?php echo e(lang('Home', 'menu')); ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="#" class="text-white"><?php echo e(lang('Edit Profile')); ?></a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section -->

    <!--Profile Page -->
    <section>
        <div class="cover-image sptb">
            <div class="container ">
                <div class="row">
                    <?php echo $__env->make('includes.user.verticalmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title"><?php echo e(lang('Profile Details')); ?></h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo e(route('client.profilesetup')); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <?php echo view('honeypot::honeypotFormFields'); ?>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(lang('First Name')); ?><span
                                                        class="text-red">*</span></label>
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="firstname"
                                                    value="<?php echo e(old('firstname', Auth::guard('customer')->user()->firstname)); ?>"
                                                    readonly>
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
                                                <label class="form-label"><?php echo e(lang('Last Name')); ?><span
                                                        class="text-red">*</span></label>
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="lastname"
                                                    value="<?php echo e(old('lastname', Auth::guard('customer')->user()->lastname)); ?>"
                                                    readonly>
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
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username"
                                                    Value="<?php echo e(Auth::guard('customer')->user()->username); ?>" readonly>
                                                <?php $__errorArgs = ['username'];
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
                                                <input type="email" class="form-control"
                                                    Value="<?php echo e(Auth::guard('customer')->user()->email); ?>" readonly>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(lang('Mobile Number')); ?></label>
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('phone', Auth::guard('customer')->user()->phone)); ?>"
                                                    name="phone">
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(lang('Country')); ?></label>
                                                <select name="country" class="form-control select2 select2-show-search">
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($country->name); ?>"
                                                            <?php echo e($country->name == Auth::guard('customer')->user()->country ? 'selected' : ''); ?>>
                                                            <?php echo e(lang($country->name)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(lang('Timezone')); ?></label>
                                                <select name="timezone" class="form-control select2 select2-show-search">
                                                    <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $timezoness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($timezoness->timezone); ?>"
                                                            <?php echo e($timezoness->timezone == Auth::guard('customer')->user()->timezone ? 'selected' : ''); ?>>
                                                            <?php echo e(lang($timezoness->timezone)); ?> <?php echo e(lang($timezoness->utc)); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <?php if($customfield != null): ?>
                                            <?php $__currentLoopData = $customfield; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($customfields->fieldtypes != 'textarea'): ?>
                                                    <?php if($customfields->privacymode == '1'): ?>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-label"><?php echo e($customfields->fieldnames); ?></label>
                                                                <input type="email" class="form-control"
                                                                    Value="<?php echo e(decrypt($customfields->values)); ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-label"><?php echo e($customfields->fieldnames); ?></label>
                                                                <input type="email" class="form-control"
                                                                    Value="<?php echo e($customfields->values); ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                        <?php if(setting('PROFILE_USER_ENABLE') == 'yes'): ?>

                                            <div class="col-md-6">
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
unset($__errorArgs, $__bag); ?>"
                                                            name="image" type="file"
                                                            accept="image/png, image/jpeg,image/jpg">
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
                                                    <small
                                                        class="text-muted"><i><?php echo e(lang('The file size should not be more than 5MB', 'filesetting')); ?></i></small>
                                                </div>
                                                <?php if(Auth::guard('customer')->user()->image != null): ?>
                                                    <div
                                                        class="file-image-1 removesprukoi<?php echo e(Auth::guard('customer')->user()->id); ?>">
                                                        <div class="product-image custom-ul">
                                                            <a href="#">
                                                                <img src="<?php echo e(asset('uploads/profile/' . Auth::guard('customer')->user()->image)); ?>"
                                                                    class="br-5"
                                                                    alt="<?php echo e(Auth::guard('customer')->user()->image); ?>">
                                                            </a>
                                                            <ul class="icons">
                                                                <li><a href="javascript:(0);"
                                                                        class="bg-danger delete-image"
                                                                        data-id="<?php echo e(Auth::guard('customer')->user()->id); ?>"><i
                                                                            class="fe fe-trash"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="col-md-12 card-footer ">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-secondary float-end "
                                                    value="<?php echo e(lang('Save Changes')); ?>"
                                                    onclick="this.disabled=true;this.form.submit();">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if(setting('SPRUKOADMIN_C') == 'on'): ?>

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><?php echo e(lang('Personal setting')); ?></div>
                                </div>
                                <div class="card-body">

                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex mt-4">
                                            <a class="onoffswitch2">
                                                <input type="checkbox" data-id="<?php echo e(Auth::guard('customer')->id()); ?>"
                                                    name="darkmode" id="darkmode"
                                                    class=" toggle-class onoffswitch2-checkbox sprukolayouts"
                                                    value="off"
                                                    <?php if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->custsetting != null): ?> <?php if(Auth::guard('customer')->user()->custsetting->darkmode == '1'): ?> checked="" <?php endif; ?>
                                                    <?php endif; ?>>
                                                <label for="darkmode" class="toggle-class onoffswitch2-label"></label>
                                            </a>
                                            <label class="form-label ps-3"><?php echo e(lang('Switch to Dark-Mode')); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if(setting('Customer_google_two_fact') == 'on' || setting('Customer_email_two_fact') == 'on'): ?>
                            <div class="card">
                                <div class="card-header border-bottom-0 pb-0">
                                    <div class="card-title"><?php echo e(lang('Two Factor Authentication')); ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="d-sm-flex d-block gap-3 align-items-center">
                                                        <?php if(setting('Customer_google_two_fact') == 'on'): ?>
                                                            <div class="switch_section px-0">
                                                                <div class="switch-toggle d-flex align-items-center">
                                                                    <a class="onoffswitch2">
                                                                        <input type="checkbox"
                                                                            data-id="<?php echo e(Auth::guard('customer')->id()); ?>"
                                                                            name="twofactor" id="twofactor"
                                                                            class="toggle-class onoffswitch2-checkbox sprukotwofact"
                                                                            autocomplete="off"
                                                                            <?php if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->custsetting != null): ?> <?php if(Auth::guard('customer')->user()->custsetting->twofactorauth == 'googletwofact'): ?> checked="" <?php endif; ?>
                                                                            <?php endif; ?>>
                                                                        <label for="twofactor"
                                                                            class="toggle-class onoffswitch2-label mb-0 "></label>
                                                                    </a>
                                                                    <label
                                                                        class="form-label ps-3 mb-0"><?php echo e(lang('Use Google Authenticator')); ?></label>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if(setting('Customer_email_two_fact') == 'on'): ?>
                                                            <div class="switch_section px-0">
                                                                <div class="switch-toggle d-flex align-items-center">
                                                                    <a class="onoffswitch2">
                                                                        <input type="checkbox"
                                                                            data-id="<?php echo e(Auth::guard('customer')->id()); ?>"
                                                                            name="emailtwofactor" id="emailtwofactor"
                                                                            class="toggle-class onoffswitch2-checkbox sprukoemailtwofactor"
                                                                            autocomplete="off"
                                                                            <?php if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->custsetting != null): ?> <?php if(Auth::guard('customer')->user()->custsetting->twofactorauth == 'emailtwofact'): ?> checked="" <?php endif; ?>
                                                                            <?php endif; ?>>
                                                                        <label for="emailtwofactor"
                                                                            class="toggle-class onoffswitch2-label mb-0"></label>
                                                                    </a>
                                                                    <label
                                                                        class="form-label ps-3 mb-0"><?php echo e(lang('Use Email OTP')); ?></label>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="emptwofactorapp"></div>
                                            <?php if(setting('Customer_google_two_fact') == 'on' && Auth::guard('customer')->user()->custsetting != null && Auth::guard('customer')->user()->custsetting->twofactorauth == 'googletwofact'): ?>
                                                <div class="mt-5" id="configured">
                                                    <div class="alert bg-success-transparent text-dark " role="alert">
                                                        <h5 class="mb-4"><?php echo e(lang('Google two factor authentication is already
                                                            configured.')); ?></h5>
                                                        <button type="button"
                                                            class="btn btn-primary reconfig"><?php echo e(lang('Reconfigure')); ?></button>
                                                        <button class="btn btn-danger removetf"><?php echo e(lang('Remove')); ?></button>

                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(setting('Customer_email_two_fact') == 'on' && Auth::guard('customer')->user()->custsetting != null && Auth::guard('customer')->user()->custsetting->twofactorauth == 'emailtwofact'): ?>
                                                <div class="mt-5 " id="emailtwofac">
                                                    <div class="alert bg-warning-transparent text-dark p-5"
                                                        role="alert">
                                                        <h4 class="mb-2"><?php echo e(lang('How does email otp authenticator work?')); ?></h4>
                                                        <p class="mb-0"><?php echo e(lang('Two-Factor Authentication (2FA) is an option that
                                                            provides an extra
                                                            layer of security to your account in addition to your email and
                                                            password. When Two-Factor Authentication is enabled, your
                                                            account cannot be accessed
                                                            by anyone unauthorized, even if they have your password.')); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->make('user.auth.passwords.changepassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(setting('cust_profile_delete_enable') == 'on'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><?php echo e(lang('Delete Account')); ?></div>
                                </div>
                                <div class="card-body">
                                    <p><?php echo e(lang('Once you delete your account, you can not access your account with the same credentials. You need to re-register your account.')); ?>

                                    </p>
                                    <label class="custom-control form-checkbox">
                                        <input type="checkbox" class="custom-control-input " value="agreed"
                                            name="agree_terms" id="sprukocheck">
                                        <span class="custom-control-label"><?php echo e(lang('I agree with')); ?> <a
                                                href="<?php echo e(setting('terms_url')); ?>" class="text-primary">
                                                <?php echo e(lang('Terms of services')); ?></a> </span>
                                    </label>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-danger my-1" data-id="<?php echo e(Auth::guard('customer')->id()); ?>"
                                        id="accountdelete"><?php echo e(lang('Delete Account')); ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Profile Page -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- INTERNAL Vertical-scroll js-->
    <script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

    <!-- INTERNAL Index js-->
    <script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>


    <script type="text/javascript">
        "use strict";

        (function($) {

            // Variables
            var SITEURL = '<?php echo e(url('')); ?>';

            // Csrf Field
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Profile Account Delete
            $('body').on('click', '#accountdelete', function() {
                var _id = $(this).data("id");

                swal({
                        title: `<?php echo e(lang('Warning! You are about to delete your account.')); ?>`,
                        text: "<?php echo e(lang('This action can not be undo. This will permanently delete your account')); ?>",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "post",
                                url: SITEURL + "/customer/deleteaccount/" + _id,
                                success: function(data) {
                                    location.reload();
                                    toastr.success(data.success);
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        }
                    });
            });

            // Switch to dark mode js
            $('.sprukolayouts').on('change', function() {
                var dark = $('#darkmode').prop('checked') == true ? '1' : '';
                var cust_id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '<?php echo e(url('/customer/custsettings')); ?>',
                    data: {
                        'dark': dark,
                        'cust_id': cust_id
                    },
                    success: function(data) {
                        location.reload();
                        toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>');
                    }
                });
            });

            // Two factor auth start
            $('.removetf').on('click', function() {
                var cust_id = <?php echo e(Auth::guard('customer')->id()); ?>;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '<?php echo e(route('google2faqr.login')); ?>',
                    data: {

                        'cust_id': cust_id
                    },
                    success: function(data) {
                        // location.reload();
                        if (document.querySelector("#twofactor") != null && document.querySelector("#twofactor").checked != false) {
                            document.querySelector("#twofactor").checked = false;
                        }
                        if (document.querySelector("#configured")) {
                            document.querySelector("#configured").remove();
                        }
                        toastr.success(data.success);
                    }
                });
            });

            $('.sprukoemailtwofactor').on('change', function() {
                if (document.querySelector("#twofactor") != null && document.querySelector("#twofactor").checked != false) {
                    document.querySelector("#twofactor").checked = false;
                }
                if (document.querySelector("#configured")) {
                    document.querySelector("#configured").remove();
                }
                if (document.querySelector("#TwoFactorAuthentication")) {
                    document.querySelector("#TwoFactorAuthentication").remove();
                }
                if (document.querySelector("#emailtwofac")) {
                    document.querySelector("#emailtwofac").remove();
                }

                var emailtwofact = $('#emailtwofactor').prop('checked') == true ? '1' : '';
                var cust_id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '<?php echo e(route('emailtwofactor.setting')); ?>',
                    data: {
                        'emailtwofact': emailtwofact,
                        'cust_id': cust_id
                    },
                    success: function(data) {
                        if (data.disabled) {
                            if (document.querySelector("#TwoFactorAuthentication")) {
                                document.querySelector("#TwoFactorAuthentication").remove();
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
                                        <h4 class="mb-2"><?php echo e(lang('How does email otp authenticator works ?')); ?></h4>
                                        <p class="mb-0"><?php echo e(lang('Two-Factor Authentication (2FA) is an option that provides an extra
                                            layer of security to your Private Email account in addition to your email and
                                            password. When Two-Factor Authentication is enabled, your account cannot be accessed
                                            by anyone unauthorized by you, even if they have stolen your password.')); ?></p>
                                    </div>
                                </div>`
                            element.appendChild(nodeElement)

                            toastr.success(data.success);
                        }
                    }
                });
            });

            $('.sprukotwofact, .reconfig').on('click', function() {


                if (document.querySelector("#configured")) {
                    document.querySelector("#configured").remove();
                }

                if (document.querySelector("#emailtwofactor") != null && document.querySelector("#emailtwofactor").checked != false) {
                    document.querySelector("#emailtwofactor").checked = false;
                }
                if (document.querySelector("#TwoFactorAuthentication")) {
                    document.querySelector("#TwoFactorAuthentication").remove();
                }
                if (document.querySelector("#emailtwofac")) {
                    document.querySelector("#emailtwofac").remove();
                }

                var twofactor = $('#twofactor').prop('checked') == true ? '1' : '';

                var cust_id = <?php echo e(Auth::guard('customer')->id()); ?>;


                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '<?php echo e(route('google2faqr.login')); ?>',
                    data: {
                        'twofactor': twofactor,
                        'cust_id': cust_id
                    },
                    success: function(data) {
                        if (data?.workprogress == 'workingmode') {
                            if (document.querySelector("#emailtwofac")) {
                                document.querySelector("#emailtwofac").remove();
                            }
                            if(document.querySelector("#emailtwofactor")){
                                document.querySelector("#emailtwofactor").checked = false;
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

                            var cust_id = <?php echo e(Auth::guard('customer')->id()); ?>;

                            document.querySelector("#otpverify").addEventListener("click", () => {
                                var otp = document.getElementById('one_time_password').value;
                                var secret_key = document.getElementById("secret_key_value").value;

                                $.ajax({
                                    type: "POST",
                                    dataType: 'json',
                                    url: '<?php echo e(route('google2fa.otpverify')); ?>',
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
                                            if (document.querySelector(
                                                    "#TwoFactorAuthentication"
                                                )) {
                                                document.querySelector(
                                                    "#TwoFactorAuthentication"
                                                ).remove();
                                            }
                                            let element = document
                                                .querySelector(
                                                    "#emptwofactorapp")
                                                .parentNode
                                                .parentNode.parentNode
                                            let nodeElement = document
                                                .createElement("div");
                                            nodeElement.className =
                                                "col-md-12 mt-4 "
                                            nodeElement.id =
                                                "TwoFactorAuthentication"
                                            nodeElement.innerHTML = `<div class="mt-5" id="configured">
                                                                    <div class="alert bg-success-transparent text-dark " role="alert">
                                                                    <h5 class="mb-4">Google two factor authentication is already configured. </h5>
                                                                    <button type="button" class="btn btn-primary reconfig">Reconfigure</button>
                                                                    <button class="btn btn-danger remove">Remove</button>

                                                                    </div>
                                                                    </div>`
                                            element.appendChild(nodeElement)

                                            document.querySelector(".reconfig")
                                                .onclick = () => {
                                                    document.querySelector(
                                                            "#configured")
                                                        .remove();
                                                }

                                            location.reload();
                                            toastr.success(
                                                '<?php echo e(lang('GoogleTwo factor authentication activated.', 'alerts')); ?>'
                                            );

                                        }

                                    },
                                    error: function(data) {
                                        console.log('Error:', data);
                                    }
                                });
                                // })
                                //----------------------------------------

                                //========================================================

                            })
                            toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>');
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
            // Two factor auth end

            //Delete Image
            $('body').on('click', '.delete-image', function() {
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
                                type: "delete",
                                url: SITEURL + "/customer/image/remove/" + _id,
                                success: function(data) {
                                    toastr.success(data.success);
                                    location.reload();
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        }
                    });
            });

        })(jQuery);

        // If no tick in check box in disable in the delete button
        var checker = document.getElementById('sprukocheck');
        var sendbtn = document.getElementById('accountdelete');
        if (sendbtn) {

            if (!this.checked) {
                sendbtn.style.pointerEvents = "auto";
                sendbtn.style.cursor = "not-allowed";
            } else {
                sendbtn.style.cursor = "pointer";
            }
            sendbtn.disabled = !this.checked;

            checker.onchange = function() {

                sendbtn.disabled = !this.checked;
                if (!this.checked) {
                    sendbtn.style.pointerEvents = "auto";
                    sendbtn.style.cursor = "not-allowed";
                } else {
                    sendbtn.style.cursor = "pointer";
                }
            }
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.usermaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/user/profile/userprofile.blade.php ENDPATH**/ ?>