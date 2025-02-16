                                                <?php $notifys = auth()->guard('customer')->user()->unreadNotifications()->paginate(2); $badgecount = auth()->guard('customer')->user()->unreadNotifications->count(); ?>
                                                <?php $__empty_1 = true; $__currentLoopData = $notifys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <?php if($notification->data['status'] == 'New'): ?>
                                                        
                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">  <?php echo e(lang('Your new ticket has been created', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if($notification->data['status'] == 'Closed'): ?>

                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">  <?php echo e(lang('Your ticket has been closed', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if($notification->data['status'] == 'On-Hold'): ?>

                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">  <?php echo e(lang('Your ticket status is On-Hold', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if($notification->data['status'] == 'Re-Open'): ?>

                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">  <?php echo e(lang('Your ticket has been Reopened', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if($notification->data['status'] == 'Inprogress'): ?>

                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">   <?php echo e(lang('You got a new reply on this ticket', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if($notification->data['status'] == 'overdue'): ?>

                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">  <?php echo e(lang('Your ticket status is Overdue', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    <?php if($notification->data['status'] == 'Suspend'): ?>

                                                        <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e($notification->data['clink']); ?>" data-id="<?php echo e($notification->id); ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <span class="bg-success-transparent brround fs-12 notifications"><i class="feather  feather-bell sidemenu_icon fs-20 text-success"></i></span>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="ps-3">
                                                                        <h6 class="mb-1"><?php echo e(Str::limit($notification->data['title'], '30')); ?></h6>
                                                                        <p class="fs-13 mb-1 text-wrap">  <?php echo e(lang('Your ticket status is Suspend', 'notification')); ?> <?php echo e($notification->data['ticket_id']); ?></p>
                                                                        <div class="small text-muted">
                                                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    
                                                    <?php if($notification->data['status'] == 'mail'): ?>

                                                    <a class="dropdown-item border-bottom mark-as-read" href="<?php echo e(route('customer.notiication.view', $notification->id)); ?>" >
                                                        <div class="d-flex ">
                                                            <div class="">
                                                                <span class="bg-success-transparent brround fs-12 notifications"><i class="feather feather-mail sidemenu_icon fs-20 text-success"></i></span>
                                                            </div>
                                                            <div class="d-flex">
                                                                <div class="ps-3">
                                                                    <h6 class="mb-1"> <?php echo e($notification->data['mailsubject']); ?></h6>
                                                                    <p class="fs-13 mb-1 text-wrap">
                                                                        <?php echo e(Str::limit($notification->data['mailtext'], '100', '.......')); ?>

                                                                    </p>
                                                                    <div class="small text-muted">
                                                                        <?php echo e($notification->created_at->diffForHumans()); ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                    <a class="dropdown-item border-bottom mark-as-read notification-dropdown" href="">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="d-flex">
                                                                <div class="ps-3 text-center">
                                                                    <img src="<?php echo e(asset('assets/images/nonotification.png')); ?>" alt="">
                                                                    <p class="fs-13 mb-1 text-muted"><?php echo e(lang('There are no new notifications to display', 'notification')); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                
                                                	<script type="text/javascript">
													    //  Mark As Read
                                                        function sendMarkRequest(id = null) {
                                                            return $.ajax("<?php echo e(route('customer.markNotification')); ?>", {
                                                                method: 'GET',
                                                                data: {
                                                                    // _token,
                                                                    id
                                                                }
                                                            });
                                                        }
                                                        $('.mark-as-read').on('click', function() {
                                                            let request = sendMarkRequest($(this).data('id'));
                                                            request.done(() => {
                                                                $(this).parents('div.alert').remove();
                                                            });
                                                        });
													</script><?php /**PATH /home/steursr/www/resources/views/includes/user/allnotify.blade.php ENDPATH**/ ?>