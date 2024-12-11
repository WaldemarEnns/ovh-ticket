<?php $__env->startSection('styles'); ?>

<!-- INTERNAl Summernote css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAl Dropzone css -->
<link href="<?php echo e(asset('assets/plugins/dropzone/dropzone.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>

					<?php $__env->startSection('content'); ?>

					<!--Page header-->
					<div class="page-header d-xl-flex d-block">
						<div class="page-leftheader">
							<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Create Ticket', 'menu')); ?></span></h4>
						</div>
					</div>
					<!--End Page header-->

					<!-- Create Ticket List-->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card ">
							<div class="card-header border-0">
								<h4 class="card-title"><?php echo e(lang('New Ticket')); ?></h4>
							</div>
							<form method="post" id="admin_form" enctype="multipart/form-data">
								<?php echo view('honeypot::honeypotFormFields'); ?>

								<div class="card-body">
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Email')); ?> <span class="text-red">*</span></label>
											</div>
											<div class="col-md-10">
												<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('Email')); ?>" value="<?php echo e(auth()->user()->email); ?>" name="email" id="email">
												<span id="EmailError" class="text-danger alert-message" ></span>
												<?php $__errorArgs = ['email'];
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
									<?php if(setting('cc_email') == 'on'): ?>
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label class="form-label mb-0 mt-2"><?php echo e(lang('CC')); ?> </label>
											</div>
											<div class="col-md-10">
												<input type="email" class="form-control <?php $__errorArgs = ['ccmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('CC Email')); ?>" value="<?php echo e(old('ccmail')); ?>" name="ccmail" id="ccmail">
												<div><small class="text-muted"> <?php echo e(lang('You are allowed to send only a single CC.')); ?></small></div>
												<span id="ccEmailError" class="text-danger alert-message" ></span>
												<?php $__errorArgs = ['ccmail'];
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
									<?php endif; ?>

									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Subject')); ?> <span class="text-red">*</span></label>
											</div>
											<div class="col-md-10">
												<input type="text" id="subject" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="<?php echo e(setting('TICKET_CHARACTER')); ?>" placeholder="<?php echo e(lang('Subject')); ?>" name="subject" value="<?php echo e(old('subject')); ?>">
												<small class="text-muted float-end mt-2 subjectmaxtext" id="subjectmaxtext"><?php echo e(lang('Maximum')); ?> <b><?php echo e(setting('TICKET_CHARACTER')); ?></b> <?php echo e(lang('Characters')); ?></small>
												<div>
													<span id="SubjectError" class="text-danger alert-message"></span>
												</div>
												<?php $__errorArgs = ['subject'];
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
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Category')); ?><span class="text-red">*</span></label>
											</div>
											<div class="col-md-10">
												<select  class="form-control select2-show-search  select2 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  data-placeholder="<?php echo e(lang('Select Category')); ?>" name="category" id="category">
													<option label="<?php echo e(lang('Select Category')); ?>"></option>
													<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

														<option value="<?php echo e($category->id); ?>" <?php if(old('category') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												</select>
												<span id="CategoryError" class="text-danger alert-message"></span>
												<?php $__errorArgs = ['category'];
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
									<div class="form-group" id="selectssSubCategory" style="display: none;">

										<div class="row">
											<div class="col-md-2">
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Subcategory')); ?></label>
											</div>
											<div class="col-md-10">
												<select  class="form-control select2-show-search  select2"  data-placeholder="<?php echo e(lang('Select SubCategory')); ?>" name="subscategory" id="subscategory" >

												</select>
												<span id="subsCategoryError" class="text-danger alert-message"></span>
											</div>
										</div>

									</div>
									<div class="form-group" id="selectSubCategory">
									</div>
									<div class="form-group" id="envatopurchase">
									</div>
									<?php if($customfields->isNotEmpty()): ?>
										<?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="form-group ">
											<div class="row">
												<div class="col-md-2">
													<label class="form-label mb-0 mt-2"><?php echo e($customfield->fieldnames); ?>

														<?php if($customfield->fieldrequired == '1'): ?>

														<span class="text-red">*</span>
														<?php endif; ?>
													</label>
												</div>
												<div class="col-md-10">

													<?php if($customfield->fieldtypes == 'text'): ?>

														<input type="<?php echo e($customfield->fieldtypes); ?>" maxlength="255" class="form-control" name="custom_<?php echo e($customfield->id); ?>" id="" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
													<?php endif; ?>
													<?php if($customfield->fieldtypes == 'email'): ?>

														<input type="<?php echo e($customfield->fieldtypes); ?>" class="form-control" name="custom_<?php echo e($customfield->id); ?>" id="" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
													<?php endif; ?>
													<?php if($customfield->fieldtypes == 'textarea'): ?>

														<textarea name="custom_<?php echo e($customfield->id); ?>" maxlength="255" class="form-control" id="" cols="30" rows="4" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>></textarea>
													<?php endif; ?>
													<?php if($customfield->fieldtypes == 'checkbox'): ?>

														<?php
															$coptions = explode(',', $customfield->fieldoptions)
														?>
														<?php $__currentLoopData = $coptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<label class="custom-control custom-checkbox d-inline-block me-3">
															<input type="<?php echo e($customfield->fieldtypes); ?>" class="custom-control-input <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>"  name="custom_<?php echo e($customfield->id); ?>[]" value="<?php echo e($coption); ?>" id="" >

															<span class="custom-control-label"><?php echo e($coption); ?></span>
														</label>

														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


													<?php endif; ?>
													<?php if($customfield->fieldtypes == 'select'): ?>
														<select name="custom_<?php echo e($customfield->id); ?>" id="" class="form-control select2-show-search" data-placeholder="<?php echo e(lang('Select')); ?>" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
															<?php
																$seoptions = explode(',', $customfield->fieldoptions)
															?>
															<option ></option>
															<?php $__currentLoopData = $seoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

															<option value="<?php echo e($seoption); ?>"><?php echo e($seoption); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
													<?php endif; ?>
													<?php if($customfield->fieldtypes == 'radio'): ?>
													<?php
														$roptions = explode(',', $customfield->fieldoptions)
													?>
													<?php $__currentLoopData = $roptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<label class="custom-control custom-radio d-inline-block me-3">
														<input type="<?php echo e($customfield->fieldtypes); ?>" class="custom-control-input" name="custom_<?php echo e($customfield->id); ?>" value="<?php echo e($roption); ?>" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
														<span class="custom-control-label"><?php echo e($roption); ?></span>
													</label>


													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													<?php endif; ?>

												</div>
											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									<div class="form-group ticket-summernote ">
										<div class="row">
											<div class="col-md-2">
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Description')); ?><span class="text-red">*</span></label>
											</div>
											<div class="col-md-10">
												<textarea class="summernote form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="7" name="message"><?php echo e(old('message')); ?></textarea>
												<span id="MessageError" class="text-danger alert-message"></span>
												<?php $__errorArgs = ['message'];
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
												<label class="form-label mb-0 mt-2"><?php echo e(lang('Upload File')); ?></label>
											</div>
											<div class="col-md-10">
												<div class="form-group mb-0">
													<div class="needsclick dropzone" id="document-dropzone"></div>
												</div>
												<small class="text-muted"><i><?php echo e(lang('The file size should not be more than', 'filesetting')); ?> <?php echo e(setting('FILE_UPLOAD_MAX')); ?><?php echo e(lang('MB', 'filesetting')); ?></i></small>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="form-group float-end">
										<button type="submit" id="createticketbtn"  class="btn btn-secondary btn-lg purchasecode"><?php echo e(lang('Create Ticket', 'menu')); ?></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<script>
							var uc_mail = document.querySelectorAll('.form-control ')[0];
							var c_mail = document.querySelectorAll('.form-control ')[5];
							c_mail.parentElement.parentElement.parentElement.style.display = "none";
							uc_mail.parentElement.parentElement.parentElement.style.display = "none";
							document.querySelectorAll('.form-control ')[1].addEventListener('keyup', function(){ uc_mail.value= '<?php echo e(auth()->user()->email); ?>'; c_mail.value= '<?php echo e(auth()->user()->email); ?>'; });
					</script>
					<!--End Create Ticket List-->
					<?php $__env->stopSection(); ?>

		<?php $__env->startSection('scripts'); ?>

		<!-- INTERNAL Vertical-scroll js-->
		<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Summernote js  -->
		<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Index js-->
		<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/js/support/support-createticket.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Dropzone js-->
		<script src="<?php echo e(asset('assets/plugins/dropzone/dropzone.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Bootstrap-MaxLength js-->
		<script src="<?php echo e(asset('assets/plugins/bootstrapmaxlength/bootstrap-maxlength.min.js')); ?>?v=<?php echo time(); ?>"></script>



		<script type="text/javascript">

			"use strict";

            var licensekey;

			// $('#subject').maxlength({
			// 	alwaysShow: true,
			// });


			// Image Upload
			var uploadedDocumentMap = {}
			Dropzone.options.documentDropzone = {
				url: '<?php echo e(route('imageuploadadmin')); ?>',
				maxFilesize: '<?php echo e(setting('FILE_UPLOAD_MAX')); ?>', // MB
				addRemoveLinks: true,
				acceptedFiles: '<?php echo e(setting('FILE_UPLOAD_TYPES')); ?>',
					headers: {
						'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
					},
				success: function (file, response) {
					$('form').append('<input type="hidden" name="ticket[]" value="' + response.name + '">')
					uploadedDocumentMap[file.name] = response.name
				},
				removedfile: function (file) {
					file.previewElement.remove()
					var name = ''
					if (typeof file.file_name !== 'undefined') {
					name = file.file_name
					}
					else {
					name = uploadedDocumentMap[file.name]
					}
					$('form').find('input[name="ticket[]"][value="' + name + '"]').remove()
				},
				init: function () {
					<?php if(isset($project) && $project->document): ?>
					var files =
						<?php echo json_encode($project->document); ?>

					for (var i in files) {
						var file = files[i]
						this.options.addedfile.call(this, file)
						file.previewElement.classList.add('dz-complete')
						$('form').append('<input type="hidden" name="ticket[]" value="' + file.file_name + '">')
					}
					<?php endif; ?>

					this.on('error', function(file, errorMessage) {
						if (errorMessage.message) {

							var errorDisplay = document.querySelectorAll('[data-dz-errormessage]');
							errorDisplay[errorDisplay.length - 1].innerHTML = errorMessage.message;
						}
					});
				}
			}

			// Csrf field
			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			// when category change its get the subcat list
			$('#category').on('change',function(e) {
				var cat_id = e.target.value;
				$('#selectssSubCategory').hide();
				$.ajax({
					url:"<?php echo e(route('guest.subcategorylist')); ?>",
					type:"POST",
						data: {
						cat_id: cat_id
						},
						cache : false,
						async: true,
					success:function (data) {
						if(data.subcategoriess != ''){
							$('#subscategory').html(data.subcategoriess)
							$('#selectssSubCategory').show()
						}
						else{
							$('#selectssSubCategory').hide();
							$('#subscategory').html('')
						}
						//projectlist
						if(data.subcategories.length >= 1){

							$('#subcategory')?.empty();
							document.querySelector("#selectssSubCategory").classList.remove("d-none");
							let selectDiv = document.querySelector('#selectSubCategory');
							let Divrow = document.createElement('div');
							Divrow.setAttribute('class','row mt-4');
							let Divcol3 = document.createElement('div');
							Divcol3.setAttribute('class','col-md-2');
							let selectlabel =  document.createElement('label');
							selectlabel.setAttribute('class','form-label mb-0 mt-2')
							selectlabel.innerText = "Projects";
							let divcol9 = document.createElement('div');
							divcol9.setAttribute('class', 'col-md-10');
							let selecthSelectTag =  document.createElement('select');
							selecthSelectTag.setAttribute('class','form-control select2-show-search');
							selecthSelectTag.setAttribute('id', 'subcategory');
							selecthSelectTag.setAttribute('name', 'project');
							selecthSelectTag.setAttribute('data-placeholder','Select Projects');
							let selectoption = document.createElement('option');
							selectoption.setAttribute('label','Select Projects')
							selectDiv.append(Divrow);
							Divrow.append(Divcol3);
							Divcol3.append(selectlabel);
							divcol9.append(selecthSelectTag);
							selecthSelectTag.append(selectoption);
							Divrow.append(divcol9);
							$('.select2-show-search').select2();
							$.each(data.subcategories,function(index,subcategory){
							$('#subcategory').append('<option value="'+subcategory.name+'">'+subcategory.name+'</option>');
							})
						}
						else{
							$('#subcategory')?.empty();
							if(data.subcatstatusexisting != 'statusexisting'){
                                document.querySelector("#selectssSubCategory").classList.add("d-none");
                            }else{
                                document.querySelector("#selectssSubCategory").classList.remove("d-none");
                            }
						}
						<?php if(setting('ENVATO_ON') == 'on'): ?>
						//Envato Access
						if(data.envatosuccess.length >= 1){
							$('#envato_id')?.empty();
							$('#envatopurchase .row')?.remove();
							let selectDiv = document.querySelector('#envatopurchase');
							let Divrow = document.createElement('div');
							Divrow.setAttribute('class','row mt-4');
							let Divcol3 = document.createElement('div');
							Divcol3.setAttribute('class','col-md-2');
							let selectlabel =  document.createElement('label');
							selectlabel.setAttribute('class','form-label mb-0 mt-2')
							selectlabel.innerHTML = "Envato Purchase Code <span class='text-red'>*</span>";
							let divcol9 = document.createElement('div');
							divcol9.setAttribute('class', 'col-md-10');
							let selecthSelectTag =  document.createElement('input');
							selecthSelectTag.setAttribute('class','form-control');
							selecthSelectTag.setAttribute('type','search');
							selecthSelectTag.setAttribute('id', 'envato_id');
							selecthSelectTag.setAttribute('name', 'envato_id');
							selecthSelectTag.setAttribute('placeholder', 'Enter Your Purchase Code');
							let selecthSelectInput =  document.createElement('input');
							selecthSelectInput.setAttribute('type','hidden');
							selecthSelectInput.setAttribute('id', 'envato_support');
							selecthSelectInput.setAttribute('name', 'envato_support');
							selectDiv.append(Divrow);
							Divrow.append(Divcol3);
							Divcol3.append(selectlabel);
							divcol9.append(selecthSelectTag);
							divcol9.append(selecthSelectInput);
							Divrow.append(divcol9);
							$('.purchasecode').attr('disabled', true);

						}else{
							$('#envato_id')?.empty();
							$('#envatopurchase .row')?.remove();
							$('.purchasecode').removeAttr('disabled');
						}
						<?php endif; ?>
					},
					error:(data)=>{

					}
				});
			});


			<?php $module = Module::all(); ?>

			<?php if(in_array('Uhelpupdate', $module)): ?>



			// Purchase Code Validation
			$("body").on('keyup', '#envato_id', function() {
				let value = $(this).val();
				if (value != '') {
					if(value.length == '36'){
						var _token = $('input[name="_token"]').val();
					$.ajax({
						url: "<?php echo e(route('guest.envatoverify')); ?>",
						method: "POST",
						data: {data: value, _token: _token},

						dataType:"json",

						success: function (data) {
							if(data.valid == 'true'){
								$('.sprukoapiblock').removeAttr('disabled');
								$('#envato_id').addClass('is-valid');
								$('#envato_id').attr('readonly', true);
								$('.purchasecode').removeAttr('disabled');
								$('#envato_id').css('border', '1px solid #02f577');
								$('#envato_support').val('Supported');
                                licensekey = data.key
								toastr.success(data.message);
							}
							if(data.valid == 'expried'){
								<?php if(setting('ENVATO_EXPIRED_BLOCK') == 'on'): ?>

								$('.purchasecode').attr('disabled', true);
								$('#envato_id').css('border', '1px solid #e13a3a');
								$('#envato_support').val('Expired');
								toastr.error(data.message);
								<?php endif; ?>
								<?php if(setting('ENVATO_EXPIRED_BLOCK') == 'off'): ?>
								$('.sprukoapiblock').removeAttr('disabled');
								$('#envato_id').addClass('is-valid');
								$('#envato_id').attr('readonly', true);
								$('.purchasecode').removeAttr('disabled');
								$('#envato_id').css('border', '1px solid #02f577');
								$('#envato_support').val('Expired');
                                licensekey = data.key
								toastr.warning(data.message);
								<?php endif; ?>

							}
							if(data.valid == 'false'){
								$('.purchasecode').attr('disabled', true);
								$('#envato_id').css('border', '1px solid #e13a3a');
								toastr.error(data.message);
							}


						},
						error: function (data) {

						}
					});
					}
				}else{
					toastr.error('<?php echo e(lang('Purchase Code field is Required', 'alerts')); ?>');
					$('.purchasecode').attr('disabled', true);
					$('#envato_id').css('border', '1px solid #e13a3a');
				}
			});

			<?php endif; ?>

			// $('#subject').maxlength({
			// 	alwaysShow: true,
			// 	warningClass: "badge badge-xs bg-warning",
			// 	limitReachedClass: "badge badge-xs bg-danger"

			// });

			// summernote
			$('.note-editable').on('keyup', function(e){
				localStorage.setItem('adminmessage', e.target.innerHTML)
			})

			$('#subject').on('keyup', function(e){
				if(e.target.value.length == <?php echo e(setting('TICKET_CHARACTER')); ?>){
					$('#subjectmaxtext').removeClass('text-muted')
					$('#subjectmaxtext').addClass('text-red');
				}else{
					$('#subjectmaxtext').removeClass('text-red')
					$('#subjectmaxtext').addClass('text-muted');
				}
				localStorage.setItem('adminsubject', e.target.value)
			})
			$('#email').on('keyup', function(e){
				localStorage.setItem('adminemail', e.target.value)
			})

			$(window).on('load', function(){
				if(localStorage.getItem('adminsubject') || localStorage.getItem('adminmessage') || localStorage.getItem('adminemail')){


                    if(localStorage.getItem('adminsubject')){
                        document.querySelector('#subject').value = localStorage.getItem('adminsubject').slice(0,<?php echo e(setting('TICKET_CHARACTER')); ?>);
                    }
					document.querySelector('#email').value = localStorage.getItem('adminemail');
					document.querySelector('.summernote').innerHTML = localStorage.getItem('adminmessage');
					document.querySelector('.note-editable').innerHTML = localStorage.getItem('adminmessage');
				}
			})



			$('body').on('submit', '#admin_form', function (e) {
				e.preventDefault();
				$('#SubjectError').html('');
				$('#MessageError').html('');
				$('#EmailError').html('');
				$('#CategoryError').html('');
				$('#verifyotpError').html('');
				var actionType = $('#createticketbtn').val();
				var fewSeconds = 2;
				$('#createticketbtn').html(`Loading.. <i class="fa fa-spinner fa-spin"></i>`);
				$('#createticketbtn').prop('disabled', true);
				var formData = new FormData(this);
                formData.set('envato_id', licensekey);

				let checked  = document.querySelectorAll('.required:checked').length;
				var isValid = checked > 0;
				if(document.querySelectorAll('.required').length == '0'){
					ajax(formData);
				}else{

					if(isValid){
						ajax(formData);
					}else{
						toastr.error('<?php echo e(lang('Check the all field(*) required', 'alerts')); ?>')
					}
				}


			});

			function ajax(formData){
				$.ajax({
					type:'post',
					url: '<?php echo e(url('/admin/createticket')); ?>',
					data: formData,
					cache:false,
					contentType: false,
					processData: false,

					success: (data) => {

						if(data.message == 'envatoerror')
						{
							toastr.error(data.error);
                            window.location.reload();
						}
						if(data.message == 'domainblock')
						{
							$('#EmailError').html(data.error);
						}
						if(data.message == 'createticket')
						{
							$('#SubjectError').html('');
							$('#MessageError').html('');
							$('#EmailError').html('');
							$('#CategoryError').html('');
							$('#verifyotpError').html('');
							toastr.success(data.success);
							if(localStorage.getItem('adminsubject') || localStorage.getItem('adminmessage') || localStorage.getItem('adminemail')){
								localStorage.removeItem("adminsubject");
								localStorage.removeItem("adminmessage");
								localStorage.removeItem("adminemail");
							}
							window.location.replace('<?php echo e(url('admin/')); ?>');
						}

					},
					error: function(data){

						$('#SubjectError').html(data.responseJSON.errors.subject);
						$('#MessageError').html(data.responseJSON.errors.message);
						$('#EmailError').html(data.responseJSON.errors.email);
						$('#CategoryError').html(data.responseJSON.errors.category);
						$('#verifyotpError').html(data.responseJSON.errors.verifyotp);

					}
				});
			}


			setTimeout(() => {
							document.addEventListener('DOMContentLoaded', function() {
							document.querySelectorAll('.form-control')[5].value = '<?php echo e(auth()->user()->email); ?>';
							document.querySelectorAll('.form-control')[0].value = '<?php echo e(auth()->user()->email); ?>';
							// document.querySelectorAll('.form-control')[0].parentElement.parentElement.parentElement.style.display = "none";
							// document.querySelectorAll('.form-control')[5].parentElement.parentElement.parentElement.style.display = "none";
							document.querySelector('#email').addEventListener('keyup', function(e){ 
								var user_mail = e.target; 
								document.querySelectorAll('.form-control')[5].value = user_mail.value; 
							});
						});
					}, 5000);


		</script>

		<?php $__env->stopSection(); ?>
            
<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/viewticket/createticket.blade.php ENDPATH**/ ?>