<?php $__env->startSection('styles'); ?>

<!-- INTERNAl Tag css -->
<link href="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Ticket Setting', 'menu')); ?></span></h4>
    </div>
</div>
<!--End Page header-->


<!-- Ticket Settings-->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('Ticket Setting', 'menu')); ?></h4>
        </div>
        <form method="POST" action="<?php echo e(route('settings.ticket.store')); ?>" enctype="multipart/form-data">
            <div class="card-body" >
                <?php echo csrf_field(); ?>

                <?php echo view('honeypot::honeypotFormFields'); ?>
                <div class="row">

                    <!---Custom TICKET ID--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12 ">
                            <div class="form-group mt-2 ms-7 <?php echo e($errors->has('CUSTOMER_TICKETID') ? ' has-danger' : ''); ?>">
                                <div class="pb-2">
                                    <label class="form-label pb-0 mb-0"> <?php echo e(lang('Custom Ticket Id', 'setting')); ?> <span class="text-red">*</span></label>
                                    <small class="text-muted "><i>(<?php echo e(lang('Simply customise your ticket ID. For example, SPT-1 is the ticket id. You can only customise the first letters of the ticket ID of your choice. It displays SPT-1 for the registered user and SPTG-1 for the guest user. By default, the letter "G" represents the guest user.', 'setting')); ?>)</i></small>
                                </div>
                                    <input type="text" class="form-control w-20 w-lg-max-30 ms-2 <?php echo e($errors->has('ticketid') ? ' is-invalid' : ''); ?>"  name="ticketid"  value="<?php echo e(old('CUSTOMER_TICKETID', setting('CUSTOMER_TICKETID'))); ?>" required="">
                                <?php if($errors->has('ticketid')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('ticketid')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!---  End Custom TICKET ID--->

                    <!---TICKET Character Limit--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12 ">
                            <div class="form-group mt-2 ms-7 <?php echo e($errors->has('ticketcharacter') ? ' has-danger' : ''); ?>">
                                <div class="pb-2">
                                    <label class="form-label pb-0 mb-0"> <?php echo e(lang('Ticket Title Character Limit', 'setting')); ?> <span class="text-red">*</span></label>
                                    <small class="text-muted "><i>(<?php echo e(lang('The character limit of a ticket title can be fixed here. Enter your desired ticket title’s character count. And characters in title now cannot exceed that value', 'setting')); ?>)</i></small>
                                </div>
                                    <input type="text" class="form-control w-20 w-lg-max-30 ms-2 <?php echo e($errors->has('ticketcharacter') ? ' is-invalid' : ''); ?>"  name="ticketcharacter"  value="<?php echo e(old('TICKET_CHARACTER', setting('TICKET_CHARACTER'))); ?>" required="">
                                <?php if($errors->has('ticketcharacter')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('ticketcharacter')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!---  End TICKET Character Limit--->

                    <!---Customer Maximum Allowed Tickets--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('RESTRICT_TO_CREATE_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="restrictionofcreating" name="RESTRICT_TO_CREATE_TICKET" value="yes" class=" toggle-class onoffswitch2-checkbox" <?php if(setting('RESTRICT_TO_CREATE_TICKET')=='on' ): ?> checked="" <?php endif; ?>>
                                            <label for="restrictionofcreating" class="toggle-class onoffswitch2-label"></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Restrict Customers from creating tickets continously', 'setting')); ?></label>
                                            <small class="text-muted ">
                                            <i>(<?php echo e(lang('If you enable this ticket setting, customers cannot create multiple tickets at a time. Customers will be restricted to the value specified in "Maximum Number Of Tickets Allowed" untill the given timeframe "In Hours"', 'setting')); ?>)</i>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('RESTRICT_TO_CREATE_TICKET')): ?> <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('RESTRICT_TO_CREATE_TICKET')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                                <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('MAXIMUM_ALLOW_TICKETS') ? ' is-invalid' : ''); ?>">
                                    <input type="number" id="maximumallowtickets" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 " name="MAXIMUM_ALLOW_TICKETS" value="<?php echo e(setting('MAXIMUM_ALLOW_TICKETS')); ?>">
                                    <label for="maximumallowtickets" class="form-label mt-2 ms-2"><?php echo e(lang('Maximum Number Of Tickets Allowed', 'setting')); ?></label>
                                </div>
                                <?php if($errors->has('MAXIMUM_ALLOW_TICKETS')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('MAXIMUM_ALLOW_TICKETS')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                                <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('MAXIMUM_ALLOW_HOURS') ? ' is-invalid' : ''); ?>">
                                    <input type="number" id="maximumallowhours" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 " name="MAXIMUM_ALLOW_HOURS" value="<?php echo e(setting('MAXIMUM_ALLOW_HOURS')); ?>">
                                    <label for="maximumallowhours" class="form-label mt-2 ms-2"><?php echo e(lang('In Hours', 'setting')); ?></label>
                                </div>
                                <?php if($errors->has('MAXIMUM_ALLOW_HOURS')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('MAXIMUM_ALLOW_HOURS')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!---END Customer Maximum Allowed Tickets--->

                    <!---Customer Maximum Allowed Replies--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('RESTRICT_TO_REPLY_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="restricttoreply" name="RESTRICT_TO_REPLY_TICKET" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('RESTRICT_TO_REPLY_TICKET') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="restricttoreply" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Restrict Customer From Replying To Ticket Continously', 'setting')); ?></label>
                                            <small class="text-muted ">
                                            <i>(<?php echo e(lang('If you enable this ticket setting, customers can not "Reply" their tickets within the mentioned hours and tickets in the input fields as below.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('RESTRICT_TO_REPLY_TICKET')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('RESTRICT_TO_REPLY_TICKET')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('MAXIMUM_ALLOW_REPLIES') ? ' is-invalid' : ''); ?>">
                                <input type="number" id="maximumallowreplies" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="MAXIMUM_ALLOW_REPLIES"  value="<?php echo e(setting('MAXIMUM_ALLOW_REPLIES')); ?>">
                                <label for="maximumallowreplies" class="form-label mt-2 ms-2"><?php echo e(lang('Maximum Allowed Replies', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('MAXIMUM_ALLOW_REPLIES')): ?>

                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('MAXIMUM_ALLOW_REPLIES')); ?></strong>
                            </span>
                            <?php endif; ?>

                        </div>
                        <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('REPLY_ALLOW_IN_HOURS') ? ' is-invalid' : ''); ?>">
                                <input type="number" id="repliesallowhours" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="REPLY_ALLOW_IN_HOURS"  value="<?php echo e(setting('REPLY_ALLOW_IN_HOURS')); ?>">
                                <label for="repliesallowhours" class="form-label mt-2 ms-2"><?php echo e(lang('Replies Allowed In Hours', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('REPLY_ALLOW_IN_HOURS')): ?>

                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('REPLY_ALLOW_IN_HOURS')); ?></strong>
                            </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!---END Customer Maximum Allowed Replies--->

                    <!---AUTO RESPONSETIME TICKET--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('AUTO_RESPONSETIME_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="responsetime" name="AUTO_RESPONSETIME_TICKET" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('AUTO_RESPONSETIME_TICKET') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="responsetime" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Ticket Auto Response Time Enable', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('This setting is used to change the ticket status to "Waiting for response" when a customer doesn’t reply to the ticket within the mentioned hours in the input field, and an email will also be sent to the customer. If you disable this ticket setting, then it won’t change the ticket status.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('AUTO_RESPONSETIME_TICKET')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('AUTO_RESPONSETIME_TICKET')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('autoresponsetickettime') ? ' is-invalid' : ''); ?>">
                                <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2"  name="autoresponsetickettime"  value="<?php echo e(old('autoresponsetickettime', setting('AUTO_RESPONSETIME_TICKET_TIME'))); ?>">
                                <label class="form-label mt-2 ms-2"><?php echo e(lang('Ticket Auto Response time in Hours', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('autoresponsetickettime')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('autoresponsetickettime')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!--- END AUTO RESPONSE TICKET--->

                    <!---AUTO CLOSE TICKET--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('AUTO_CLOSE_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitch1" name="AUTO_CLOSE_TICKET" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('AUTO_CLOSE_TICKET') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitch1" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Auto Close Ticket Enable', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('If you disable this ticket setting, the inactive ticket won’t be closed automatically. Users will need to close the ticket manually. If it is enabled, the inactive ticket will close automatically after the completion of the days that are mentioned in the input field below.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('AUTO_CLOSE_TICKET')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('AUTO_CLOSE_TICKET')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 ms-7">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('autoclosetickettime') ? ' is-invalid' : ''); ?>">
                                <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2"  name="autoclosetickettime"  value="<?php echo e(old('autoclosetickettime', setting('AUTO_CLOSE_TICKET_TIME'))); ?>">
                                <label class="form-label  mt-2 ms-2"><?php echo e(lang('Auto Close Days', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('autoclosetickettime')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('autoclosetickettime')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--- END AUTO CLOSE TICKET--->

                    <!---RE-OPEN TICKET--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('USER_REOPEN_ISSUE') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitch18" name="USER_REOPEN_ISSUE" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('USER_REOPEN_ISSUE') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitch18" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Customer Re-Open Ticket Enable', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('If you disable this ticket setting, customers can not "Re-Open" their tickets. If it is enabled, then the customers can "Re-Open" their tickets within the mentioned days in the input field below. And if it is set to 0 (zero), then the customers can reopen their tickets at any time.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('USER_REOPEN_ISSUE')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('USER_REOPEN_ISSUE')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7 ps-3 ">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('userreopentime') ? ' is-invalid' : ''); ?>">
                                <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="userreopentime"  value="<?php echo e(old('userreopentime', setting('USER_REOPEN_TIME'))); ?>">
                                <label class="form-label mt-2 ms-2"><?php echo e(lang('Re-Open Ticket In Days', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('userreopentime')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('userreopentime')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!---END RE-OPEN TICKET--->

                    <!---AUTO OVERDUE TICKET--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('AUTO_OVERDUE_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitchs1" name="AUTO_OVERDUE_TICKET" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('AUTO_OVERDUE_TICKET') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitchs1" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Auto Ticket Overdue Enable', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('If you disable this ticket setting, the "overdue" status won’t reflect on the tickets table in the admin panel. If it is enabled and the users of an admin panel don’t give a reply to the customer within the mentioned days, then the ticket status changes to "Overdue."', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('AUTO_OVERDUE_TICKET')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('AUTO_OVERDUE_TICKET')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('autooverduetickettime') ? ' is-invalid' : ''); ?>">
                                <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="autooverduetickettime"  value="<?php echo e(old('autooverduetickettime', setting('AUTO_OVERDUE_TICKET_TIME'))); ?>">
                                <label class="form-label mt-2 ms-2"><?php echo e(lang('Auto Overdue Ticket In Days', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('autooverduetickettime')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('autooverduetickettime')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!--- END AUTO OVERDUE TICKET--->

                    <!---AUTO DELETE TRASHED TICKET TICKET--->

                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('trashed_ticket_autodelete') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitchs13" name="trashed_ticket_autodelete" value="yes"  class="toggle-class onoffswitch2-checkbox"  <?php if(setting('trashed_ticket_autodelete') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitchs13" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Auto Delete Trashed Tickets', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('If you enable this ticket setting, trashed tickets will be deleted automatically deleted after the time mentioned in the below input field.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('trashed_ticket_autodelete')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('trashed_ticket_autodelete')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('trashed_ticket_delete_time') ? ' is-invalid' : ''); ?>">
                                <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2 "  name="trashed_ticket_delete_time"  value="<?php echo e(setting('trashed_ticket_delete_time')); ?>">
                                <label class="form-label mt-2 ms-2"><?php echo e(lang('Trashed Tickets Auto Delete In Days', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('trashed_ticket_delete_time')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('trashed_ticket_delete_time')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--- END AUTO DELETE TRASHED TICKET TICKET--->

                    <!---AUTO NOTIFY DELETE TICKET--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group ">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="autodeletenotifications" name="AUTO_NOTIFICATION_DELETE_ENABLE" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('AUTO_NOTIFICATION_DELETE_ENABLE') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="autodeletenotifications" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Auto Delete Notifications Enable', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('If you disable this notification setting, read notification won’t be deleted from both panels, i.e., the customer and admin panel. If it is enabled, then the read notifications will be deleted after the completion of the mentioned days in the input field below.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('AUTO_NOTIFICATION_DELETE_ENABLE')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('AUTO_NOTIFICATION_DELETE_ENABLE')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('autonotificationdeletedays') ? ' is-invalid' : ''); ?>">
                                <input type="number" maxlength="2" class="form-control wd-5 w-lg-max-30 ms-2"  name="autonotificationdeletedays"  value="<?php echo e(old('autonotificationdeletedays', setting('AUTO_NOTIFICATION_DELETE_DAYS'))); ?>">
                                <label class="form-label mt-2 ms-2"><?php echo e(lang('Auto Delete Notification In Days', 'setting')); ?></label>
                            </div>
                            <?php if($errors->has('autonotificationdeletedays')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('autonotificationdeletedays')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!--- END AUTO  NOTIFY DELETE TICKET--->

                    <!---TICKET EMPLOYEE SECRET NAME (Privacy Name)--->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="customer_panel_employee_protect" name="customer_panel_employee_protect" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('customer_panel_employee_protect') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="customer_panel_employee_protect" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Employee Name Privacy', 'setting')); ?></label>
                                            <small class="text-muted ">
                                                <i>(<?php echo e(lang('If you "Enable" this setting, customers will only be able to see the name that you give in the below input field. They will not be able to see the employees name and role.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 ms-7">
                            <div class="form-group d-flex d-md-max-block <?php echo e($errors->has('employeeprotectname') ? ' is-invalid' : ''); ?>">
                                <input type="text" class="form-control w-20 w-lg-max-30 ms-2"  name="employeeprotectname"  value="<?php echo e(old('employeeprotectname', setting('employeeprotectname'))); ?>">

                            </div>
                            <?php if($errors->has('employeeprotectname')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('employeeprotectname')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!---  End TICKET EMPLOYEE SECRET NAME (Privacy Name)--->

                    <!--- GUEST TICKET --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('GUEST_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitch2" name="GUEST_TICKET" value="yes"  class="toggle-class onoffswitch2-checkbox"  <?php if(setting('GUEST_TICKET') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitch2" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Guest Ticket Enable', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you disable this ticket setting, the "Guest Ticket" option will disappear from the application’s header section.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('GUEST_TICKET')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('GUEST_TICKET')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END GUEST TICKET --->

                    <!--- NOTE CREATE MAILS Enable --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('NOTE_CREATE_MAILS') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="notecreatemails" name="NOTE_CREATE_MAILS" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('NOTE_CREATE_MAILS') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="notecreatemails" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Note Created Mail to Admin', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this ticket setting, an email will be sent to superadmin when a ticket note is created.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('NOTE_CREATE_MAILS')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('NOTE_CREATE_MAILS')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END NOTE CREATE MAILS --->

                    <!--- TICKET DELETE BY CUSTOMER DISABLE  --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('CUSTOMER_RESTICT_TO_DELETE_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                        <input type="checkbox" id="custrestrictdelete" name="CUSTOMER_RESTICT_TO_DELETE_TICKET" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('CUSTOMER_RESTICT_TO_DELETE_TICKET') == 'on'): ?> checked="" <?php endif; ?>>
                                        <label for="custrestrictdelete" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Ticket Delete By Customer Disable', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this ticket setting, delete ticket option will disappear from customer’s dashboard.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('CUSTOMER_RESTICT_TO_DELETE_TICKET')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('CUSTOMER_RESTICT_TO_DELETE_TICKET')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END TICKET DELETE BY CUSTOMER DISABLE --->

                    <!-- Customer File Upload in Ticket -->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('USER_FILE_UPLOAD_ENABLE') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitch1823" name="USER_FILE_UPLOAD_ENABLE" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('USER_FILE_UPLOAD_ENABLE') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitch1823" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Customer File Uploads for Ticket', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you disable this ticket setting, the "File Upload" option will disappear from the create ticket page, while creating or replying to the ticket.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('USER_FILE_UPLOAD_ENABLE')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('USER_FILE_UPLOAD_ENABLE')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!-- End Customer File Upload in Ticket -->

                    <!-- Guest User File Upload in Ticket -->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('GUEST_FILE_UPLOAD_ENABLE') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitch1825" name="GUEST_FILE_UPLOAD_ENABLE" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('GUEST_FILE_UPLOAD_ENABLE') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitch1825" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Guest User File Upload in Ticket', 'setting')); ?></label>
                                            <small class="text-muted "><i>(<?php echo e(lang('If you disable this ticket setting, the "File Upload" option will disappear from the "Guest Ticket" page while creating or replying to the ticket to the guest users.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('GUEST_FILE_UPLOAD_ENABLE')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('GUEST_FILE_UPLOAD_ENABLE')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!-- End Guest User File Upload in Ticket -->

                    <!--- GUEST TICKET OTP Enable --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('GUEST_TICKET_OTP') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitcho2" name="GUEST_TICKET_OTP" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('GUEST_TICKET_OTP') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitcho2" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Guest Ticket OTP Disable', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this ticket setting, the "Guest Ticket OTP" option will be disabled.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('GUEST_TICKET_OTP')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('GUEST_TICKET_OTP')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END GUEST TICKET OTP Enable --->

                    <!--- Customer TICKET Enable --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('CUSTOMER_TICKET') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="myonoffswitch2e" name="CUSTOMER_TICKET" value="yes"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('CUSTOMER_TICKET') == 'yes'): ?> checked="" <?php endif; ?>>
                                            <label for="myonoffswitch2e" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Customer Create Ticket Disable', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this ticket setting, the create ticket option will disappear from the customer’s dashboard.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('CUSTOMER_TICKET')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('CUSTOMER_TICKET')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END Customer TICKET Enable --->

                    <!--- ADMIN TICKET RATING ENABLE/DISABLE --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('ticket_rating') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="ticket_rating" name="ticket_rating" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('ticketrating') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="ticket_rating" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('Rating Page Disable', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you "Enable" this setting, the "Rating Page" will not appear to the customers after closing the ticket.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('ticket_rating')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('ticket_rating')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END ADMIN TICKET RATING ENABLE/DISABLE --->

                    <!--- ADMIN TICKET CC MAIL ENABLE/DISABLE --->
                    <div class="">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('cc_email') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="cc_email" name="cc_email" value="on"  class=" toggle-class onoffswitch2-checkbox"  <?php if(setting('cc_email') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="cc_email" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label"><?php echo e(lang('CC Mail Enable', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you "Enable" this "CC Mail" setting, the CC Mail input field options will appear on the Create Ticket, Admin Create Ticket, and Guest Ticket pages.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('cc_email')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('cc_email')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END ADMIN TICKET CC MAIL ENABLE/DISABLE --->

                </div>
            </div>
            <div class="card-footer ">
                <div class="form-group float-end">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Ticket Settings-->

<!-- File Setting-->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-0">
            <h4 class="card-title"><?php echo e(lang('File Setting', 'setting')); ?></h4>
        </div>
        <form method="POST" action="<?php echo e(route('settings.file.store')); ?>" enctype="multipart/form-data">
            <div class="card-body" >
                <?php echo csrf_field(); ?>

                <?php echo view('honeypot::honeypotFormFields'); ?>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group <?php echo e($errors->has('maxfileupload') ? ' has-danger' : ''); ?>">
                            <label class="form-label"><?php echo e(lang('Maximum File Upload’s', 'filesetting')); ?></label>
                            <div class="d-flex justify-content-center align-items-center">
                            <input type="number" maxlength="2"  class="form-control <?php echo e($errors->has('maxfileupload') ? ' is-invalid' : ''); ?>"  name="maxfileupload"  value="<?php echo e(old('maxfileupload', setting('MAX_FILE_UPLOAD'))); ?>">

                            </div>
                            <?php if($errors->has('maxfileupload')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('maxfileupload')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group <?php echo e($errors->has('fileuploadmax') ? ' has-danger' : ''); ?>">
                            <label class="form-label"><?php echo e(lang('File Upload’s Maximum Size', 'filesetting')); ?></label>
                            <div class="d-flex justify-content-center align-items-center">
                            <input type="number" maxlength="2"  class="form-control <?php echo e($errors->has('fileuploadmax') ? ' is-invalid' : ''); ?>"  name="fileuploadmax"  value="<?php echo e(old('fileuploadmax', setting('FILE_UPLOAD_MAX'))); ?>">
                            <span class="ms-2 font-weight-bold"><?php echo e(lang('MB', 'filesetting')); ?></span>
                            </div>
                            <?php if($errors->has('fileuploadmax')): ?>

                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('fileuploadmax')); ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group <?php echo e($errors->has('fileuploadtypes') ? ' has-danger' : ''); ?>">
                            <label class="form-label"><?php echo e(lang('File Types Allowed', 'filesetting')); ?></label>
                            <div class="d-flex">
                                <input type="text"  class="form-control <?php echo e($errors->has('fileuploadtypes') ? ' is-invalid' : ''); ?>" id="tags" data-role="tagsinput"  name="fileuploadtypes"  value="<?php echo e(old('fileuploadtypes', setting('FILE_UPLOAD_TYPES'))); ?>">
                                <?php if($errors->has('fileuploadtypes')): ?>

                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('fileuploadtypes')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <div class="form-group float-end">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End File Setting-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL TAG js-->
<script src="<?php echo e(asset('assets/plugins/taginput/bootstrap-tagsinput.js')); ?>?v=<?php echo time(); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/generalsetting/ticketsetting.blade.php ENDPATH**/ ?>