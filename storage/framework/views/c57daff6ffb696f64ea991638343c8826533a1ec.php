<?php $__env->startSection('styles'); ?>

<!-- INTERNAL Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(setting('ANNOUNCEMENT_USER') == 'only_login_user' || setting('ANNOUNCEMENT_USER') == 'all_users'): ?>
<div class="uhelp-announcement-alertgroup">
    <?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($anct->status == 1): ?>
            <div class="alert" role="alert" style="background: linear-gradient(to right, <?php echo e($anct->primary_color); ?>, <?php echo e($anct->secondary_color); ?>);">
                <div class="container">
                    <button type="submit" class="btn-close ms-5 float-end text-white notifyclose" data-id="<?php echo e($anct->id); ?>">×</button>
                    <div class="d-flex align-items-top">
                        <div class="uhelp-announcement me-2">
                            <svg class="svg-info" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        </div>
                        <div class="text-default d-flex align-items-top">
                            <div class="notice-heading d-flex align-items-top flex-fill">
                                <div>
                                    <span class="fs-15 font-weight-bold text-white flex-fill"><?php echo e($anct->title); ?></span>
                                    <span class="text-white opacity-50 mx-2"><i class="ti ti-minus"></i></span>
                                    <span class="mb-0 text-white uhelp-alert-content alert-notice"><?php echo $anct->notice; ?>

                                        <?php if($anct->buttonon == 1): ?>
                                        <a class="btn btn-sm ms-2 text-white text-decoration-underline" href="<?php echo e($anct->buttonurl); ?>" target="_blank"><?php echo e($anct->buttonname); ?></a>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    

    <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($anct->status == 1): ?>
            <div class="alert" role="alert" style="background: linear-gradient(to right,<?php echo e($anct->primaray_color); ?>, <?php echo e($anct->secondary_color); ?>);">
                <div class="container">
                    <button type="submit" class="btn-close ms-5 float-end text-white notifyclose" data-id="<?php echo e($anct->id); ?>">×</button>
                <div class="d-flex align-items-top">
                    <div class="uhelp-announcement me-2">
                        <svg class="svg-info" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    </div>
                    <div class="text-default d-flex align-items-top">
                        <div class="notice-heading d-flex align-items-top flex-fill">
                            <div>
                                <span class="fs-15 font-weight-bold text-white flex-fill"><?php echo e($anct->occasion); ?></span>
                                <span class="text-white opacity-50 mx-2"><i class="ti ti-minus"></i></span>
                                <span class="mb-0 text-white uhelp-alert-content alert-notice"><?php echo $anct->holidaydescription; ?>

                                    <?php if($anct->buttonon == 1): ?>
                                    <a class="btn btn-sm ms-2 text-white text-decoration-underline" href="<?php echo e($anct->buttonurl); ?>" target="_blank"><?php echo e($anct->buttonname); ?></a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    

    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ancts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $announceDay = explode(',', $ancts->announcementday);
        $now = today()->format('D');

        ?>
        <?php $__currentLoopData = $announceDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announceDays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($ancts->status == 1 && $announceDays == $now): ?>
                <div class="alert alert-days" role="alert" style="background: linear-gradient(to right, <?php echo e($ancts->primary_color); ?>, <?php echo e($ancts->secondary_color); ?>);">
                    <div class="container">
                        <button type="submit" class="btn-close ms-5 float-end text-white notifyclose" data-id="<?php echo e($ancts->id); ?>">×</button>
                        <div class="d-flex align-items-top">
                            <div class="uhelp-announcement me-2">
                                <svg class="svg-info" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            </div>
                            <div class="text-default d-flex align-items-top">
                                <div class="notice-heading d-flex align-items-top flex-fill">
                                    <div>
                                        <span class="fs-15 font-weight-bold text-white flex-fill"><?php echo e($ancts->title); ?></span>
                                        <span class="text-white opacity-50 mx-2"><i class="ti ti-minus"></i></span>
                                        <span class="mb-0 text-white uhelp-alert-content alert-notice"><?php echo $ancts->notice; ?>

                                            <?php if($ancts->buttonon == 1): ?>
                                            <a class="btn btn-sm ms-2 text-white text-decoration-underline" href="<?php echo e($ancts->buttonurl); ?>" target="_blank"><?php echo e($ancts->buttonname); ?></a>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<!-- Section -->
<section>
    <div class="bannerimg cover-image" data-bs-image-src="<?php echo e(asset('assets/images/photos/banner1.jpg')); ?>">
        <div class="header-text mb-0">
            <div class="container ">
                <div class="row text-white">
                    <div class="col">
                        <h1 class="mb-0"><?php echo e(lang('Dashboard', 'menu')); ?></h1>
                    </div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(url('/')); ?>" class="text-white-50"><?php echo e(lang('Home', 'menu')); ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#" class="text-white"><?php echo e(lang('Dashboard', 'menu')); ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section -->

<!--Dashboard List-->
<section>
    <div class="cover-image sptb">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('includes.user.verticalmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9">
                    <!--- Custom notification -->
                    <?php $customernotify = auth()->guard('customer')->user()->unreadNotifications()->where('data->status', 'mail')->get();  ?>
                    <?php if($customernotify->isNotEmpty()): ?>
                    <div class="alert alert-warning-light br-13  border-0 d-flex align-items-center" role="alert">
                        <div class="d-flex">
                            <svg class="alt-notify  me-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="#eec466"
                                    d="M19,20H5a3.00328,3.00328,0,0,1-3-3V7A3.00328,3.00328,0,0,1,5,4H19a3.00328,3.00328,0,0,1,3,3V17A3.00328,3.00328,0,0,1,19,20Z" />
                                <path fill="#e49e00"
                                    d="M22,7a3.00328,3.00328,0,0,0-3-3H5A3.00328,3.00328,0,0,0,2,7V8.061l9.47852,5.79248a1.00149,1.00149,0,0,0,1.043,0L22,8.061Z" />
                            </svg>
                        </div>
                        <ul class="notify vertical-scroll5 custom-ul ht-0 me-5">
                            <?php if(auth()->guard('customer')->user()): ?>
                            <?php $__empty_1 = true; $__currentLoopData = $customernotify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($notification->data['status'] == 'mail'): ?>
                            <li class="item">
                                <p class="fs-13 mb-0"><?php echo e($notification->data['mailsubject']); ?>

                                    <?php echo e(Str::limit($notification->data['mailtext'], '400', '...')); ?> <a href="<?php echo e(route('customer.notiication.view', $notification->id)); ?>"
                                    class="ms-3 text-blue mark-as-read"><?php echo e(lang('Read more')); ?></a></p>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="d-flex ms-6 sprukocnotify">
                            <button class="btn-close ms-2 mt-0 text-warning" data-bs-dismiss="alert"
                                aria-hidden="true">×</button>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--- End Custom notification -->

                    <div class="row">

                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="card">
                                <span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="mt-0 text-start">
                                                    <span class="fs-16 font-weight-semibold"><?php echo e(lang('Total Tickets',
                                                        'menu')); ?></span>
                                                    <h3 class="mb-0 mt-1 text-primary fs-25"><?php echo e($tickets->count()); ?></h3>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="icon1 bg-primary-transparent my-auto float-end"> <i
                                                        class="las la-ticket-alt"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="card">
                                <span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="mt-0 text-start">
                                                    <span class="fs-16 font-weight-semibold"><?php echo e(lang('Active Tickets',
                                                        'menu')); ?></span>
                                                    <h3 class="mb-0 mt-1 text-success fs-25">

                                                        <?php echo e($active->count()); ?>


                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="icon1 bg-success-transparent my-auto float-end"> <i
                                                        class="ri-ticket-2-line"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="card">
                                <span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="mt-0 text-start">
                                                    <span class="fs-16 font-weight-semibold"><?php echo e(lang('On-Hold Tickets',
                                                        'menu')); ?></span>
                                                    <h3 class="mb-0 mt-1 text-secondary fs-25"><?php echo e($onhold->count()); ?></h3>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="icon1 bg-warning-transparent my-auto  float-end"> <i
                                                        class="ri-coupon-2-line"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="card">
                                <span>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="mt-0 text-start">
                                                    <span class="fs-16 font-weight-semibold"><?php echo e(lang('Closed Tickets',
                                                        'menu')); ?></span>
                                                    <h3 class="mb-0 mt-1 text-secondary fs-25"><?php echo e($closed->count()); ?></h3>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="icon1 bg-danger-transparent my-auto  float-end"> <i
                                                        class="ri-coupon-2-line"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-0">
                                <div class="card-header border-0 d-flex">
                                    <h4 class="card-title"><?php echo e(lang('Tickets Summary')); ?></h4>
                                    <?php if(setting('CUSTOMER_TICKET') == 'no'): ?>

                                    <div class="float-end ms-auto"><a href="<?php echo e(route('client.ticket')); ?>" class="btn btn-secondary ms-auto"><i class="fa fa-paper-plane-o me-2"></i><?php echo e(lang('Create Ticket', 'menu')); ?></a></div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php if(setting('CUSTOMER_RESTICT_TO_DELETE_TICKET') == 'off'): ?>
                                            <button id="massdelete" class="btn btn-outline-light btn-sm ms-7 mb-4 data-table-btn mx-md-center"><i class="fe fe-trash me-1"></i> <?php echo e(lang('Delete')); ?></button>
                                        <?php endif; ?>
                                        <table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100"
                                            id="userdashboard">
                                            <thead>
                                                <tr>
                                                <th ><?php echo e(lang('Sl.No')); ?></th>
                                                <th width="10" class="removecolumnheader">
                                                    <input type="checkbox"  id="customCheckAll">
                                                    <label  for="customCheckAll"></label>
                                                </th>
                                                <th ><?php echo e(lang('Ticket Details')); ?></th>
                                                <th ><?php echo e(lang('Status')); ?></th>
                                                <th ><?php echo e(lang('Actions')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr <?php echo e($ticket->replystatus == 'Waiting'? 'class=bg-success-transparent': ''); ?>>
                                                    <td><?php echo e($i++); ?></td>
                                                    <td class="removecolumndata">
                                                        <input type="checkbox" name="student_checkbox[]" class="checkall" value="<?php echo e($ticket->id); ?>" />
                                                    </td>
                                                    <td class="overflow-hidden ticket-details">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <a href="<?php echo e(route('loadmore.load_data',$ticket->ticket_id)); ?>" class="fs-14 d-block font-weight-semibold"><?php echo e($ticket->subject); ?></a>

                                                                <ul class="fs-13 font-weight-normal d-flex custom-ul">
                                                                    <li class="pe-2 text-muted">#<?php echo e($ticket->ticket_id); ?></span>
                                                                    <li class="px-2 text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Date')); ?>"><i class="fe fe-calendar me-1 fs-14"></i> <?php echo e($ticket->created_at->timezone(Auth::user()->timezone)->format(setting('date_format'))); ?></li>

                                                                    <?php if($ticket->priority != null): ?>
                                                                        <?php if($ticket->priority == "Low"): ?>
                                                                            <li class="ps-5 pe-2 preference preference-low" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Priority')); ?>"><?php echo e(lang($ticket->priority)); ?></li>

                                                                        <?php elseif($ticket->priority == "High"): ?>
                                                                            <li class="ps-5 pe-2 preference preference-high" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Priority')); ?>"><?php echo e(lang($ticket->priority)); ?></li>

                                                                        <?php elseif($ticket->priority == "Critical"): ?>
                                                                            <li class="ps-5 pe-2 preference preference-critical" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Priority')); ?>"><?php echo e(lang($ticket->priority)); ?></li>

                                                                        <?php else: ?>
                                                                            <li class="ps-5 pe-2 preference preference-medium" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Priority')); ?>"><?php echo e(lang($ticket->priority)); ?></li>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        ~
                                                                    <?php endif; ?>

                                                                    <?php if($ticket->category_id != null): ?>
                                                                        <?php if($ticket->category != null): ?>

                                                                        <li class="px-2 text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Category')); ?>"><i class="fe fe-grid me-1 fs-14" ></i><?php echo e(Str::limit($ticket->category->name, '40')); ?></li>

                                                                        <?php else: ?>

                                                                        ~
                                                                        <?php endif; ?>
                                                                    <?php else: ?>

                                                                        ~
                                                                    <?php endif; ?>

                                                                    <?php if($ticket->last_reply == null): ?>
                                                                        <li class="px-2 text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Last Replied')); ?>"><i class="fe fe-clock me-1 fs-14"></i><?php echo e($ticket->created_at->diffForHumans()); ?></li>

                                                                    <?php else: ?>
                                                                    <li class="px-2 text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Last Replied')); ?>"><i class="fe fe-clock me-1 fs-14"></i><?php echo e($ticket->last_reply->diffForHumans()); ?></li>

                                                                    <?php endif; ?>

                                                                    <?php if($ticket->purchasecodesupport != null): ?>
                                                                        <?php if($ticket->purchasecodesupport == 'Supported'): ?>

                                                                        <li class="px-2 text-success font-weight-semibold"><?php echo e(lang('Support Active')); ?></li>
                                                                        <?php endif; ?>
                                                                        <?php if($ticket->purchasecodesupport == 'Expired'): ?>

                                                                        <li class="px-2 text-danger-dark font-weight-semibold"><?php echo e(lang('Support Expired')); ?></li>
                                                                        <?php endif; ?>

                                                                    <?php endif; ?>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if($ticket->status == "New"): ?>

                                                        <span class="badge badge-burnt-orange"><?php echo e(lang($ticket->status)); ?></span>

                                                        <?php elseif($ticket->status == "Re-Open"): ?>

                                                        <span class="badge badge-teal"><?php echo e(lang($ticket->status)); ?></span>

                                                        <?php elseif($ticket->status == "Inprogress"): ?>

                                                        <span class="badge badge-info"><?php echo e(lang($ticket->status)); ?></span>

                                                        <?php elseif($ticket->status == "On-Hold"): ?>

                                                        <span class="badge badge-warning"><?php echo e(lang($ticket->status)); ?></span>

                                                        <?php else: ?>

                                                        <span class="badge badge-danger"><?php echo e(lang($ticket->status)); ?></span>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class = "d-flex">
                                                            <a href="<?php echo e(route('loadmore.load_data',$ticket->ticket_id)); ?>" class="action-btns1" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(lang('View Ticket')); ?>"><i class="feather feather-edit text-primary"></i></a>
                                                            <?php if(setting('CUSTOMER_RESTICT_TO_DELETE_TICKET') == 'off'): ?>
                                                                <a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($ticket->id); ?>" id="show-delete" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(lang('Delete Ticket')); ?>"><i class="feather feather-trash-2 text-danger"></i></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Dashboard List-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>

<script type="text/javascript">
    "use strict";

    var complex = <?php echo json_encode(setting('CUSTOMER_RESTICT_TO_DELETE_TICKET')); ?>;
    if(complex == 'on'){
        setTimeout(myGreeting, 1)
            function myGreeting() {
                document.querySelector(".removecolumnheader").remove()
                document.querySelectorAll(".removecolumndata").forEach((res)=>{
                res.remove()
            })
        }

    }

    (function($){

        // Variables
        var SITEURL = '<?php echo e(url('')); ?>';

        // Csrf Field
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //________ Data Table
        // $('#userdashboard').DataTable({

        //     language: {
        //         searchPlaceholder: search,
        //         scrollX: "100%",
        //         sSearch: '',
        //     },
        //     order:[],
        //     columnDefs: [
        //         { "orderable": false, "targets":[ 0,1,4] }
        //     ],
        // });

        let prev = <?php echo json_encode(lang("Previous")); ?>;
        let next = <?php echo json_encode(lang("Next")); ?>;
        let nodata = <?php echo json_encode(lang("No data available in table")); ?>;
        let noentries = <?php echo json_encode(lang("No entries to show")); ?>;
        let showing = <?php echo json_encode(lang("showing page")); ?>;
        let ofval = <?php echo json_encode(lang("of")); ?>;
        let maxRecordfilter = <?php echo json_encode(lang("- filtered from ")); ?>;
        let maxRecords = <?php echo json_encode(lang("records")); ?>;
        let entries = <?php echo json_encode(lang("entries")); ?>;
        let show = <?php echo json_encode(lang("Show")); ?>;
        let search = <?php echo json_encode(lang("Search...")); ?>;
        // Datatable
        $('#userdashboard').dataTable({
            language: {
                searchPlaceholder: search,
                scrollX: "100%",
                sSearch: '',
                paginate: {
                previous: prev,
                next: next
                },
                emptyTable : nodata,
                infoFiltered: `${maxRecordfilter} _MAX_ ${maxRecords}`,
                info: `${showing} _PAGE_ ${ofval} _PAGES_`,
                infoEmpty: noentries,
                lengthMenu: `${show} _MENU_ ${entries} `,
            },
            order:[],
            columnDefs: [
                { "orderable": false, "targets":[ 0,1,4] }
            ],
        });

        // Ticket Detele System
        $('body').on('click', '#show-delete', function () {
            var _id = $(this).data("id");
            swal({
                title: `<?php echo e(lang('Are you sure you want to continue?', 'alerts')); ?>`,
                text: "<?php echo e(lang('This might erase your records permanently', 'alerts')); ?>",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                        type: "get",
                        url: SITEURL + "/customer/ticket/delete/"+_id,
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

        //Mass Delete
        $('body').on('click', '#massdelete', function () {

            var id = [];

            $('.checkall:checked').each(function(){
                id.push($(this).val());
            });
            if(id.length > 0){
                swal({
                    title: `<?php echo e(lang('Are you sure you want to continue?', 'alerts')); ?>`,
                    text: "<?php echo e(lang('This might erase your records permanently', 'alerts')); ?>",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url:"<?php echo e(url('customer/ticket/delete/tickets')); ?>",
                            method:"post",
                            data:{id:id},
                            success:function(data)
                            {

                                toastr.success(data.success);
                                location.reload();
                            },
                            error:function(data){

                            }
                        });
                    }
                });

            }else{
                toastr.error('<?php echo e(lang('Please select at least one check box.', 'alerts')); ?>');
            }

        });

        // Check All Checkbox
        $('#customCheckAll').on('click', function() {
            $('.checkall').prop('checked', this.checked);
        });

        $('.form-select').select2({
            minimumResultsForSearch: Infinity,
            width: '100%'
        });
        $('#customCheckAll').prop('checked', false);
        $('.checkall').on('click', function(){
            if($('.checkall:checked').length == $('.checkall').length){
                $('#customCheckAll').prop('checked', true);
            }else{
                $('#customCheckAll').prop('checked', false);
            }
        });


        $(".vertical-scroll5").bootstrapNews({
            newsPerPage: 1,
            autoplay: true,
            pauseOnHover: true,
            navigation: false,
            direction: 'down',
            newsTickerInterval: 2500,
            onToDo: function () {
            }
        });

        let notifyClose = document.querySelectorAll('.notifyclose');
        notifyClose.forEach(ele => {
            if(ele){
                let id = ele.getAttribute('data-id');
                if(getCookie(id)){
                    ele.closest('.alert').classList.add('d-none');
                }else{
                    ele.addEventListener('click', setCookie);
                }
            }
        })


        function setCookie($event) {
            console.log('set');
            const d = new Date();
            let id = $event.currentTarget.getAttribute('data-id');
            d.setTime(d.getTime() + (30 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = id + "=" + 'announcement_close' + ";" + expires + ";path=/";
            $event.currentTarget.closest('.alert').classList.add('d-none');
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return '';
        }


    })(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.usermaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/user/dashboard.blade.php ENDPATH**/ ?>