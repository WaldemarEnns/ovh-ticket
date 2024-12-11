		<?php $__env->startSection('styles'); ?>

		<!-- INTERNAL Data table css -->
		<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/plugins/datatable/buttonbootstrap.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<!-- INTERNAL Sweet-Alert css -->
		<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>" rel="stylesheet" />

		<?php $__env->stopSection(); ?>

							<?php $__env->startSection('content'); ?>

							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Employees')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->

							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0 d-md-max-block">
										<h4 class="card-title  mb-md-max-2"><?php echo e(lang('Employees List', 'menu')); ?></h4>
										<div class="card-options  d-md-max-block">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Employee Create')): ?>

											<a href="<?php echo e(url('admin/employee/create')); ?>" class="btn btn-success me-3  mb-md-max-2 mw-12"><i class="feather feather-user-plus"></i> <?php echo e(lang('Add Employee')); ?></a>
											<?php endif; ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Employee Importlist')): ?>

											<a href="<?php echo e(route('user.userimport')); ?>" class="btn btn-info me-3  mb-md-max-2 mw-12"><i class="feather feather-download"></i> <?php echo e(lang('Import Employees List')); ?></a>
											<?php endif; ?>

										</div>
									</div>
									<div class="card-body" >
										<div class="table-responsive spruko-delete">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Employee Delete')): ?>

											<button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
											<?php endif; ?>

											<table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100" id="supportuserlist">
												<thead>
													<tr>
														<th  width="10"><?php echo e(lang('Sl.No')); ?></th>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Employee Delete')): ?>

														<th width="10" >
															<input type="checkbox"  id="customCheckAll">
															<label  for="customCheckAll"></label>
														</th>
														<?php endif; ?>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Employee Delete')): ?>

														<th width="10" >
															<input type="checkbox"  id="customCheckAll" disabled>
															<label  for="customCheckAll"></label>
														</th>
														<?php endif; ?>

														<th > <?php echo e(lang('Employee Name')); ?></th>
														<th > <?php echo e(lang('Roles')); ?></th>
														<th > <?php echo e(lang('Register Date')); ?></th>
														<th class="w-5"> <?php echo e(lang('Status')); ?></th>
														<th > <?php echo e(lang('Actions')); ?></th>
													</tr>
												</thead>
												<tbody>
														<?php $i = 1; ?>
														<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr id="row_id<?php echo e($user->id); ?>">
																<td><?php echo e($i++); ?></td>
																<td>
																	<?php if(Auth::user()->can('Employee Delete')): ?>

																	<?php if(Auth::check() && Auth::user()->id == '1'): ?>
																		<?php if(Auth::user()->id != $user->id ): ?>

																		<input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($user->id); ?>" />
																			<?php endif; ?>
																		<?php else: ?>
																			<?php if(Auth::user()->id != $user->id  && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

																			<input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($user->id); ?>" />

																		<?php endif; ?>

																	<?php endif; ?>

																	<?php else: ?>
																		<?php if(Auth::check() && Auth::user()->id == '1'): ?>
																			<?php if(Auth::user()->id != $user->id ): ?>
																			<input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($user->id); ?>" disabled />

																			<?php endif; ?>
																		<?php else: ?>
																			<?php if(Auth::user()->id != $user->id  && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>
																				<input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($user->id); ?>" disabled />

																			<?php endif; ?>

																		<?php endif; ?>

																	<?php endif; ?>
																</td>
																<td>
																	<div>
																		<a href="#" class="h5"><?php echo e(Str::limit($user->name, '40')); ?></a>

																		</div>
																		<small class="fs-12 text-muted"> <span class="font-weight-normal1"><?php echo e(Str::limit($user->email, '40')); ?></span></small>
																</td>
																<td>
																	<?php if(!empty($user->getroleNames()[0])): ?>
																		<span><?php echo e(Str::limit($user->getroleNames()[0], '40')); ?></span>
																	<?php else: ?>
																		~
																	<?php endif; ?>
																</td>
																<td>
																	<span class="badge badge-success-light"><?php echo e($user->created_at->format(setting('date_format'))); ?></span>
																</td>

																<td>
																	<?php if(Auth::user()->can('Employee Status')): ?>


																	<?php if(Auth::check() && Auth::user()->id == '1'): ?>
																		<?php if(Auth::user()->id != $user->id ): ?>

																			<label class="custom-switch form-switch mb-0">
																				<input type="checkbox"  name="status" data-id="<?php echo e($user->id); ?>" id="myonoffswitch<?php echo e($user->id); ?>" value="1" class="custom-switch-input tswitch" <?php echo e($user->status == 1 ? 'checked' : ''); ?>>
																				<span class="custom-switch-indicator"></span>
																			</label>
																			<?php endif; ?>
																		<?php else: ?>
																			<?php if(Auth::user()->id != $user->id  && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

																			<label class="custom-switch form-switch mb-0">
																				<input type="checkbox"  name="status" data-id="<?php echo e($user->id); ?>" id="myonoffswitch<?php echo e($user->id); ?>" value="1" class="custom-switch-input tswitch" <?php echo e($user->status == 1 ? 'checked' : ''); ?>>
																				<span class="custom-switch-indicator"></span>
																			</label>
																		<?php endif; ?>

																	<?php endif; ?>


																		
																		<?php if($user->id != '1'): ?>



																		<?php endif; ?>

																	<?php else: ?>
																		~
																	<?php endif; ?>
																</td>
																<td>
																	<div class = "d-flex">
																		<?php if(Auth::user()->can('Employee Edit')): ?>

																			<?php if(Auth::check() && Auth::user()->id == '1'): ?>

																			<a href="<?php echo e(url('/admin/agentprofile/' . $user->id)); ?>" class="action-btns1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"><i class="feather feather-edit text-primary"></i></a>
																			<?php else: ?>
																				<?php if($user->id != '1' && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

																				<a href="<?php echo e(url('/admin/agentprofile/' . $user->id)); ?>" class="action-btns1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"><i class="feather feather-edit text-primary"></i></a>

																				<?php endif; ?>
																			<?php endif; ?>


																		<?php else: ?>
																			~
																		<?php endif; ?>
																		<?php if(Auth::user()->can('Employee Delete')): ?>

																			<?php if(Auth::check() && Auth::user()->id == '1'): ?>
																				<?php if(Auth::user()->id != $user->id ): ?>

																					<a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($user->id); ?>" id="show-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"><i class="feather feather-trash-2 text-danger"></i></a>
																				<?php endif; ?>
																			<?php else: ?>
																				<?php if(Auth::user()->id != $user->id  && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

																					<a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($user->id); ?>" id="show-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"><i class="feather feather-trash-2 text-danger"></i></a>
																				<?php endif; ?>

																			<?php endif; ?>
																		<?php else: ?>
																			~
																		<?php endif; ?>
                                                                        <?php if(Auth::user()->can('Reset Password')): ?>
                                                                            <?php if(Auth::check() && Auth::user()->id == '1'): ?>
                                                                                <a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($user->id); ?>" id="reset-password" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Reset Password')); ?>"><i class="feather feather-lock text-info"></i></a>
                                                                            <?php else: ?>
                                                                                <?php if($user->id != '1' && !empty($user->getRoleNames()[0]) && $user->getRoleNames()[0] != 'superadmin'): ?>

                                                                                    <a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($user->id); ?>" id="reset-password" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Reset Password')); ?>"><i class="feather feather-lock text-info"></i></a>

                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
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

							<?php $__env->stopSection(); ?>

		<?php $__env->startSection('scripts'); ?>


		<!-- INTERNAL Data tables -->
		<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/datatablebutton.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/buttonbootstrap.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Sweet-Alert js-->
		<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<script type="text/javascript">
			var SITEURL = '<?php echo e(url('')); ?>';
			(function($) {
				"use strict";

				// Csrf Field
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				// Datatable
				// $('#supportuserlist').DataTable({
				// 	"columnDefs": [
                //        { "orderable": false, "targets":[ 0,1] }
				// 			],
				// 	"order": [],
				// 	responsive:true,
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
                $('#supportuserlist').dataTable({
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

				// __Select2 js
				$('.form-select').select2({
					minimumResultsForSearch: -1
				});

				// __Check All checkbox
				$('#customCheckAll').on('click', function() {
					$('.checkall').prop('checked', this.checked);

				});

				// Check all js when if all selected check all
				$('.checkall').on('click', function(){
					if($('.checkall:checked').length == $('.checkall').length){
						$('#customCheckAll').prop('checked', true);
					}else{
						$('#customCheckAll').prop('checked', false);
					}
				});
				// Delete Button
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
									type: "post",
									url: SITEURL + "/admin/agent/"+_id,
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

				// status switch
				$('body').on('click', '.tswitch', function () {
					var _id = $(this).data("id");
					var status = $(this).prop('checked') == true ? '1' : '0';
					$.ajax({
						type: "post",
						url: SITEURL + "/admin/agent/status/"+_id,
						data: {'status': status},
						success: function (data) {

						toastr.success(data.success);
						},
						error: function (data) {
						console.log('Error:', data);
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
									url:"<?php echo e(url('admin/massuser/deleteall')); ?>",
									method:"post",
									data:{id:id},
									success:function(data)
									{

									//for client side
									$.each(id, function( index, value ) {
										$('#row_id'+ value).remove();
									});

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

				$('body').on('click', '#reset-password', function(){
					let psdsprukochange = $(this).data('id');

					$('.modal-title').html('<?php echo e(lang('Change Password')); ?>')
					$('#sprukopasswordreset_form').trigger('reset')

					$('.sprukopasswordreset_id').val(psdsprukochange)
					$('#addpasswordreset').modal('show');
				});
				$('body').on('submit', '#sprukopasswordreset_form', function(e){
					e.preventDefault();

					var actionType = $('#sprukoempchange').val();
					var fewSeconds = 2;
					$('#sprukoempchange').html('Sending..');
					$('#sprukoempchange').prop('disabled', true);
						setTimeout(function(){
							$('#sprukoempchange').prop('disabled', false);
							$('#sprukoempchange').html('Save');
						}, fewSeconds*1000);
					var formData = new FormData(this);
					$.ajax({
						type:'POST',
						url: '<?php echo e(url("admin/employeepasswordreset")); ?>',
						data: formData,
						cache:false,
						contentType: false,
						processData: false,

						success: (data) => {
							toastr.success(data.success);
							location.reload();
						},
						error: function(data){

						}
					});

				})

			})(jQuery);

		</script>
		<?php $__env->stopSection(); ?>

		<?php $__env->startSection('modal'); ?>
			<?php echo $__env->make('admin.agent.passwordresetmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/agent/index.blade.php ENDPATH**/ ?>