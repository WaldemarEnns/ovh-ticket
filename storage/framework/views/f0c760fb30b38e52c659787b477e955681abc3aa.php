                                    <?php $notifys = auth()->guard('customer')->user()->unreadNotifications()->paginate(2); $badgecount = auth()->guard('customer')->user()->unreadNotifications->count(); ?>
                                    <li class="dropdown me-3 header-message">
                                        <a class="nav-link icon p-0 mt-1 badgecount" data-bs-toggle="dropdown" >
                                            <?php echo $__env->make('includes.user.badgecount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-0 notification-dropdown-container">
                                            <div class="dropdown-header border-bottom d-flex justify-content-between">
                                                
                                                <div class="markasreadcount">
                                                    <?php echo $__env->make('includes.user.markasreadcount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                            <div class="notifyreading">
                                                
                                                <?php echo $__env->make('includes.user.allnotify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class=" text-center p-2">
                                                <a href="<?php echo e(route('client.notification')); ?>" class="cmark-all"><?php echo e(lang('See All Notifications', 'notification')); ?> </a>
                                            </div>
                                        </div>

                                    </li><?php /**PATH /home/steursr/www/resources/views/includes/user/notifynotication.blade.php ENDPATH**/ ?>