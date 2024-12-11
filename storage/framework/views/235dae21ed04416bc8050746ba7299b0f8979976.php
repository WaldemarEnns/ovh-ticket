		<?php $__env->startSection('styles'); ?>

		<!-- INTERNAL Data table css -->
		<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<!-- INTERNAL Sweet-Alert css -->
		<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<?php $__env->stopSection(); ?>

							<?php $__env->startSection('content'); ?>

							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Sub-Category')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->


							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0 d-sm-max-flex ">
										<h4 class="card-title"><?php echo e(lang('Subcategory List')); ?></h4>
										<div class="card-options mt-sm-max-2">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Subcategory Create')): ?>

												<a href="javascript:void(0)" class="btn btn-secondary me-3" id="create-new-subcategory"><?php echo e(lang('Add SubCategory')); ?></a>
											<?php endif; ?>


										</div>
									</div>
									<div class="card-body" >
										<div class="table-responsive  spruko-delete">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Subcategory Delete')): ?>

											<button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
											<?php endif; ?>
											<table class="table table-bordered border-bottom text-nowrap w-100" id="support-articlelists">
												<thead>
													<tr>
														<th  width="10"><?php echo e(lang('Sl.No')); ?></th>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Subcategory Delete')): ?>

														<th width="10" >
															<input type="checkbox"  id="customCheckAll">
															<label  for="customCheckAll"></label>
														</th>
														<?php endif; ?>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Subcategory Delete')): ?>

														<th width="10" >
															<input type="checkbox"  id="customCheckAll" disabled>
															<label  for="customCheckAll"></label>
														</th>
														<?php endif; ?>
														<th ><?php echo e(lang('Subcategory Name')); ?></th>
														<th ><?php echo e(lang('Parent Category list')); ?></th>
														<th ><?php echo e(lang('Status')); ?></th>
														<th ><?php echo e(lang('Actions')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>

													<?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td><?php echo e($i++); ?></td>
															<td>
																<?php if(Auth::user()->can('Subcategory Delete')): ?>
																	<input type="checkbox" name="subcategory_checkbox[]" class="checkall" value="<?php echo e($subcats->id); ?>" />
																<?php else: ?>
																	<input type="checkbox" name="subcategory_checkbox[]" class="checkall" value="<?php echo e($subcats->id); ?>" disabled />
																<?php endif; ?>
															</td>
															<td><?php echo e($subcats->subcategoryname); ?></td>
															<td>
																<?php $__currentLoopData = $subcats->subcategorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcatlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<span class="badge badge-info-light">
																	<?php echo e($subcatlist->subcatlistss->name); ?>

																</span>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</td>
															<td>
																<label class="custom-switch form-switch mb-0">
																	<input type="checkbox" name="status" data-id="<?php echo e($subcats->id); ?>" id="myonoffswitch<?php echo e($subcats->id); ?>" value="1" class="custom-switch-input stswitch" <?php echo e($subcats->status == 1 ? 'checked' : ''); ?>>
																	<span class="custom-switch-indicator"></span>
																</label>

															</td>
															<td>
																<div class = "d-flex">
																	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Subcategory Edit')): ?>

																	<a href="javascript:void(0)" class="action-btns1 edit-subcategory" data-id="<?php echo e($subcats->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"><i class="feather feather-edit text-primary"></i></a>
																	<?php endif; ?>
																	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Subcategory Delete')): ?>

																	<a href="javascript:void(0)" class="action-btns1 delete-subcategory" data-id="<?php echo e($subcats->id); ?>" id="show-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"><i class="feather feather-trash-2 text-danger"></i></a>
																	<?php endif; ?>
																	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Subcategory Edit')): ?>
																	~
																	<?php endif; ?>
																	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Subcategory Delete')): ?>
																	~
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

		<!-- INTERNAL Sweet-Alert js-->
		<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<script type="text/javascript">

			"use strict";

			(function($)  {

				// Variables
				var SITEURL = '<?php echo e(url('')); ?>';

				// select2 js
				$('.select2').select2({
					minimumResultsForSearch: Infinity
				});

				// Csrf field
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				// Datatable
				// $('#support-articlelists').dataTable({
				// 	responsive: true,
				// 	language: {
				// 		searchPlaceholder: search,
				// 		scrollX: "100%",
				// 		sSearch: '',
				// 	},
				// 	order:[],
				// 	columnDefs: [
				// 		{ "orderable": false, "targets":[0,1,5] }
				// 	],
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
                $('#support-articlelists').dataTable({
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

                /*  When user click add category button */
				$('#create-new-subcategory').on('click', function () {
					$('#btnsave').val("create-product");
					$('#subcategory_id').val('');
					$('#nameError').html('');
					$('#displayError').html('');
					$('#priorityError').html('');
					$('.categorysub').html('');
					$('#subcategory_form').trigger("reset");
					$('.modal-title').html("<?php echo e(lang('Add New SubCategory')); ?>");
					$('.categorysub').select2({
						minimumResultsForSearch: '',
					});
					$.post('category/all', function(data){
						$('.categorysub').html(data);
					});

					$('#addsubcategory').modal('show');


				});

				/* When click edit category */
				$('body').on('click', '.edit-subcategory', function () {
					var subcategory_id = $(this).data('id');
					$('.categorysub').select2({
						minimumResultsForSearch: '',
					});
					$.get('subcategories/' + subcategory_id  + '/edit', function (data) {
						$('#subcategory_form').trigger("reset");
						$('#nameError').html('');
						$('#displayError').html('');
						$('#priorityError').html('');
						$('.categorysub').html('');
						$('.modal-title').html("<?php echo e(lang('Edit Subcategory')); ?>");
						$('#btnsave').val("edit-testimonial");
						$('#addsubcategory').modal('show');
						$('#subcategory_id').val(data.subcategory.id);
						$('#name').val(data.subcategory.subcategoryname);
						$('.categorysub').html(data.categorylist);
						if (data.subcategory.status == "1")
						{
							$('#myonoffswitch18').prop('checked', true);
						}
					})
				});


				// Category form submit
				$('body').on('submit', '#subcategory_form', function (e) {
					e.preventDefault();
					var actionType = $('#btnsave').val();
					var fewSeconds = 2;
					$('#btnsave').html('Sending..');
					$('#btnsave').prop('disabled', true);
						setTimeout(function(){
							$('#btnsave').prop('disabled', false);
						}, fewSeconds*1000);
					var formData = new FormData(this);
					$.ajax({
						type:'POST',
						url: "<?php echo e(route('subcategorys.store')); ?>",
						data: formData,
						cache:false,
						contentType: false,
						processData: false,
						success: (data) => {
							if(data.errors){
								$('#nameError').html('');
								$('#displayError').html('');
								$('#priorityError').html('');
								$('#nameError').html(data.errors.subcategoryname);
								$('#displayError').html(data.errors.display);
								$('#priorityError').html(data.errors.priority);
								$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');

							}
							if(data.success){
								$('#nameError').html('');
								$('#displayError').html('');
								$('#priorityError').html('');
								$('#subcategory_form').trigger("reset");
								$('#addsubcategory').modal('hide');
								$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
								toastr.success(data.success);
								location.reload();
							}

						},
						error: function(data){
							toastr.error('<?php echo e(lang('SubCategory name already exists', 'alerts')); ?>');
							$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
						}
					});
				});

				//status On Off
				$('body').on('change', '.stswitch', function(){
					let id = $(this).data('id');
					let status = $(this).prop('checked') == true ? '1' : '0';
					$.ajax({
						type: "POST",
						dataType: "json",
						url: '<?php echo e(route('category.admin.subcategorystatusupdate')); ?>',
						data: {
							'status': status,
							'id': id,
						},
						success:function(data){
							toastr.success(data.success);
						},
						error:function(data){

						}
					});
				});

				// Delete subcategory
				$('body').on('click', '.delete-subcategory', function(){
					let id = $(this).data('id');
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
								type: "POST",
								dataType: "json",
								url: '<?php echo e(route('category.admin.subcategorydelete')); ?>',
								data: {
									'id': id,
								},
								success:function(data){
									toastr.success(data.success);
									location.reload();
								},
								error:function(data){

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
									url:"<?php echo e(url('admin/subcategory/deleteall')); ?>",
									method:"GET",
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

				// Checkbox checkall
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



			})(jQuery);

		</script>

		<?php $__env->stopSection(); ?>


		<?php $__env->startSection('modal'); ?>

		<?php echo $__env->make('admin.category.subcategorymodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/category/subcategory.blade.php ENDPATH**/ ?>