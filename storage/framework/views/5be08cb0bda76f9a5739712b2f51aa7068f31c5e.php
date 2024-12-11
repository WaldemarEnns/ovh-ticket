                            <?php $__env->startSection('content'); ?>

                            <!--Page header-->
                            <div class="page-header d-xl-flex d-block">
                                <div class="page-leftheader">
                                    <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Groups', 'menu')); ?></span></h4>
                                </div>
                            </div>
                            <!--End Page header-->

                            <!-- Edit Groups-->
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card ">
                                    <div class="card-header border-0">
                                        <h4 class="card-title"><?php echo e(lang('Edit Group')); ?></h4>
                                    </div>
                                    <form method="POST" action="<?php echo e(url('/admin/groups/update/'.$group->id )); ?>">
                                        <?php echo csrf_field(); ?>

                                        <?php echo view('honeypot::honeypotFormFields'); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="form-label"><?php echo e(lang('Name')); ?> <span class="text-red">*</span></label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control <?php $__errorArgs = ['groupname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" name="groupname" value="<?php echo e($group->groupname); ?>">
                                                        <?php $__errorArgs = ['groupname'];
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
                                                    <div class="col-md-2">
                                                        <label class="form-label"><?php echo e(lang('Select Employees')); ?> </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="custom-controls-stacked d-md-flex" >
                                                            <select multiple="multiple" class="form-control select2" data-placeholder="<?php echo e(lang('Select Agent')); ?>" name="user_id[]" id="username" >
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($item->id != 1): ?>

                                                                <option value="<?php echo e($item->id); ?>" <?php if($item->id): ?> <?php if(in_array($item->id,$grop)): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($item->name); ?> <?php if(!empty($item->getRoleNames()[0])): ?> (<?php echo e($item->getRoleNames()[0]); ?>) <?php endif; ?></option>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group float-end">
                                                <input type="submit" class="btn btn-secondary"  value="Save" onclick="this.disabled=true;this.form.submit();">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Edit Groups-->

                            <?php $__env->stopSection(); ?>


        <?php $__env->startSection('scripts'); ?>

        <!-- INTERNAL Index js-->
        <script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/groups/edit.blade.php ENDPATH**/ ?>