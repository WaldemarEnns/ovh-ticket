  		<!-- Add Department-->
          <div class="modal fade sprukodepartmentcat"  id="adddepartment" aria-hidden="true">
			<div class="modal-dialog  modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button  class="close" data-bs-dismiss="modal" onclick="canceldepartment()" aria-label="Close">
							<span aria-hidden="true" onclick="canceldepartment()">×</span>
						</button>
					</div>
					<form method="POST" id="department_form">
                        <input type="hidden" name="department_id" id="department_id">
                        <?php echo csrf_field(); ?>
                        <?php echo view('honeypot::honeypotFormFields'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(lang('Department Name')); ?> <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo e(lang('Ex:- Web Developer')); ?>" name="departmentname" id="departmentname"  autofocus required>
                                <span id="departmentnameError" class="text-danger alert-message"></span>
                            </div>
                            <div class="form-group">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <label class="form-label pe-2"><?php echo e(lang('Status')); ?></label>
                                        <a class="onoffswitch2">
                                            <input type="checkbox"  name="status" id="status" class=" toggle-class onoffswitch2-checkbox" >
                                            <label for="status" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-outline-danger" id="btnclose" onclick="canceldepartment()" data-bs-dismiss="modal"><?php echo e(lang('Close')); ?></a>
                            <button type="button" class="btn btn-secondary" id="btnsave" onclick="createdepartment()" ><?php echo e(lang('Save')); ?></button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
		<!-- End  Add Department  -->
<?php /**PATH /home/steursr/www/resources/views/admin/department/model.blade.php ENDPATH**/ ?>