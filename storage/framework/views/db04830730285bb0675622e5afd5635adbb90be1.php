                <!-- Add Envato Api Modal-->
                <div class="modal fade"  id="addEnvatoapi" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" ></h5>
                                <button  class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" id="categoryenvato_form" name="categoryenvato_form">

                                <?php echo view('honeypot::honeypotFormFields'); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(lang('Select Category')); ?> </label>
                                        <div class="custom-controls-stacked d-md-flex" >
                                            <select multiple="multiple" class="form-control select2_envato"  name="categorys_id[]" data-placeholder="<?php echo e(lang('Select Category')); ?>" id="categorys" >

                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="envato_enable" value="1">
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-outline-danger" data-bs-dismiss="modal"><?php echo e(lang('Close')); ?></a>
                                    <button type="submit" class="btn btn-secondary" id="btnsave"  ><?php echo e(lang('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End  Add Envato Api Modal  -->
<?php /**PATH /home/steursr/www/resources/views/admin/category/envatocategorylist.blade.php ENDPATH**/ ?>