                    <!-- Add Announcement-->
                    <div class="modal fade"  id="addtestimonial" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" ></h5>
                                    <button  class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" enctype="multipart/form-data" id="testimonial_form" name="testimonial_form">
                                    <input type="hidden" name="testimonial_id" id="testimonial_id">
                                    <?php echo csrf_field(); ?>
                                    <?php echo view('honeypot::honeypotFormFields'); ?>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(lang('Title')); ?> <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="title" id="name">
                                            <span id="nameError" class="text-danger alert-message"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(lang('Notice Text')); ?><span class="text-red">*</span></label>
                                            <textarea class="form-control summernote"  name = "notice" id="description" ></textarea>
                                            <span id="descriptionError" class="text-danger alert-message"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo e(lang('Start Date')); ?>: <span class="text-red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="feather feather-calendar"></i>
                                                        </div>
                                                        <input class="form-control fc-datepicker" placeholder="YYYY-MM-DD" type="text"  name="startdate" id="startdate" autocomplete="off" readonly>
                                                    </div>
                                                    <span id="startdateError" class="text-danger alert-message"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo e(lang('End Date')); ?>: <span class="text-red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="feather feather-calendar"></i>
                                                        </div>
                                                        <input class="form-control fc-datepicker" placeholder="YYYY-MM-DD" type="text" name="enddate" id="enddate"  autocomplete="off" readonly>
                                                    </div>
                                                    <span id="enddateError" class="text-danger alert-message"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex mt-4">
                                                    <label class="form-label pe-2"><?php echo e(lang('Status')); ?></label>
                                                    <a class="onoffswitch2">
                                                        <input type="checkbox"  name="status" id="myonoffswitch18" class=" toggle-class onoffswitch2-checkbox" value="1" >
                                                        <label for="myonoffswitch18" class="toggle-class onoffswitch2-label" ></label>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-outline-danger" data-bs-dismiss="modal"><?php echo e(lang('Close')); ?></a>
                                        <button type="submit" class="btn btn-secondary" id="btnsave"  ><?php echo e(lang('Save')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End  Add Announcement  --><?php /**PATH /home/steursr/www/resources/views/admin/announcement/model.blade.php ENDPATH**/ ?>