  		<!-- Category List-->
          <div class="modal fade sprukosearchcategory"  id="addcategory" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" ></h5>
						<button  class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form method="POST" enctype="multipart/form-data" id="sprukocategory_form" name="sprukocategory_form">
                        <input type="hidden" name="ticket_id" class="ticket_id">
                        <?php echo csrf_field(); ?>
                        <?php echo view('honeypot::honeypotFormFields'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(lang('Select Category')); ?></label>
                                <div class="custom-controls-stacked d-md-flex" >
									<select class="form-control select4-show-search" data-placeholder="<?php echo e(lang('Select category')); ?>" name="category" id="sprukocategorylist" >

									</select>
								</div>
								<span id="CategoryError" class="text-danger"></span>
                            </div>
							<div class="form-group" id="envatopurchase">
							</div>
							<div class="form-group" id="selectssSubCategory" style="display: none;">

								<label class="form-label mb-0 mt-2"><?php echo e(lang('Subcategory')); ?></label>
								<select  class="form-control subcategoryselect"  data-placeholder="<?php echo e(lang('Select SubCategory')); ?>" name="subscategory" id="subscategory">

								</select>
								<span id="subsCategoryError" class="text-danger alert-message"></span>

							</div>
							<div class="form-group" id="selectSubCategory">
							</div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-outline-danger" data-bs-dismiss="modal"><?php echo e(lang('Close')); ?></a>
                            <button type="submit" class="btn btn-secondary sprukoapiblock" id="btnsave" ><?php echo e(lang('Save')); ?></button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
		<!-- End Category List  -->
<?php /**PATH /home/steursr/www/resources/views/admin/viewticket/modalpopup/categorymodalpopup.blade.php ENDPATH**/ ?>