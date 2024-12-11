		<?php $__env->startSection('styles'); ?>

		<!-- INTERNAl Summernote css -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>?v=<?php echo time(); ?>">

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
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Articles', 'menu')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->


							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<form method="POST" action="<?php echo e(url('/admin/article')); ?>" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>

										<?php echo view('honeypot::honeypotFormFields'); ?>

										<div class="card-header d-sm-max-flex  border-0">
											<h4 class="card-title"><?php echo e(lang('Article Section')); ?></h4>
											<div class="card-options mt-sm-max-2 card-header-styles">
												<small class="me-1 mt-1"><?php echo e(lang('Hide Section')); ?></small>
												<div class="float-end mt-0">
													<div class="switch-toggle">
														<a class="onoffswitch2">
															<input type="checkbox"  name="articlecheck" id="articlechecks" class=" toggle-class onoffswitch2-checkbox" value="on" <?php if($basic->articlecheck == 'on'): ?>  checked=""  <?php endif; ?>>
															<label for="articlechecks" class="toggle-class onoffswitch2-label" ></label>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="card-body" >
											<div class="row">
												<div class="col-sm-12 col-md-12">
													<input type="hidden" class="form-control " name="id" value="<?php echo e($basic->id); ?>">
													<div class="form-group">
														<label class="form-label"><?php echo e(lang('Title')); ?></label>
														<input type="text" class="form-control <?php $__errorArgs = ['articletitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="articletitle" value="<?php echo e($basic->articletitle); ?>">
														<?php $__errorArgs = ['articletitle'];
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
												<div class="col-sm-12 col-md-12">
													<div class="form-group">
														<label class="form-label"><?php echo e(lang('Subtitle')); ?></label>
														<input type="text" class="form-control <?php $__errorArgs = ['articlesub'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="articlesub" value="<?php echo e($basic->articlesub); ?>">
														<?php $__errorArgs = ['articlesub'];
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
										</div>
										<div class="col-md-12 card-footer ">
											<div class="form-group float-end">
												<input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card mb-0">
									<div class="card-header d-sm-max-flex border-0">
										<h4 class="card-title"><?php echo e(lang('Article List')); ?></h4>
										<div class="card-options mt-sm-max-2">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Article Create')): ?>

											<a href="<?php echo e(url('/admin/article/create')); ?>" class="btn btn-secondary me-3" ><?php echo e(lang('Add Article')); ?></a>
											<?php endif; ?>

										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive spruko-delete">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Article Delete')): ?>

											<button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
											<?php endif; ?>

											<table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100" id="articlelist">
												<thead>
													<tr>
														<th  width="9"><?php echo e(lang('Sl.No')); ?></th>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Article Delete')): ?>

														<th width="10" >
															<input type="checkbox"  id="customCheckAll">
															<label  for="customCheckAll"></label>
														</th>
														<?php endif; ?>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Article Delete')): ?>

														<th width="10" >
															<input type="checkbox"  id="customCheckAll" disabled>
															<label  for="customCheckAll"></label>
														</th>
														<?php endif; ?>

														<th  ><?php echo e(lang('Article Title')); ?></th>
														<th ><?php echo e(lang('Category')); ?></th>
														<th ><?php echo e(lang('Privacy Mode')); ?></th>
														<th class="w-5"><?php echo e(lang('Status')); ?></th>
														<th class="w-5"><?php echo e(lang('Actions')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>
													<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($i++); ?></td>
														<td>
															<?php if(Auth::user()->can('Project Delete')): ?>
																<input type="checkbox" name="article_checkbox[]" class="checkall" value="<?php echo e($article->id); ?>" />
															<?php else: ?>
																<input type="checkbox" name="article_checkbox[]" class="checkall" value="<?php echo e($article->id); ?>" disabled />
															<?php endif; ?>
														</td>
														<td><?php echo e(Str::limit($article->title, '40')); ?></td>
														<td>
															<?php if($article->category != null): ?>

																<?php echo e(Str::limit($article->category->name, '40')); ?>

															<?php else: ?>
																~
															<?php endif; ?>
														</td>
														<td>
															<?php if(Auth::user()->can('Article Edit')): ?>
																<?php if($article->privatemode == '1'): ?>

																	<label class="custom-switch form-switch mb-0">
																		<input type="checkbox" name="privatemode" data-id="<?php echo e($article->id); ?>" id="privatemode<?php echo e($article->id); ?>" value="1" class="custom-switch-input tswitch1" checked>
																		<span class="custom-switch-indicator"></span>
																	</label>
																<?php else: ?>

																	<label class="custom-switch form-switch mb-0">
																		<input type="checkbox" name="privatemode" data-id="<?php echo e($article->id); ?>" id="privatemode<?php echo e($article->id); ?>" value="1" class="custom-switch-input tswitch1">
																		<span class="custom-switch-indicator"></span>
																	</label>

																<?php endif; ?>
															<?php else: ?>
																~
															<?php endif; ?>
														</td>
														<td>
															<?php if(Auth::user()->can('Article Edit')): ?>
																<?php if($article->status == 'Published'): ?>

																<label class="custom-switch form-switch mb-0">
																	<input type="checkbox" name="status" data-id="<?php echo e($article->id); ?>" id="myonoffswitch<?php echo e($article->id); ?>" value="Published" class="custom-switch-input tswitch" checked>
																	<span class="custom-switch-indicator"></span>
																</label>

																<?php else: ?>

																<label class="custom-switch form-switch mb-0">
																	<input type="checkbox"  name="status" data-id="<?php echo e($article->id); ?>" id="myonoffswitch<?php echo e($article->id); ?>" class="custom-switch-input tswitch" value="Published">
																	<span class="custom-switch-indicator"></span>
																</label>

																<?php endif; ?>
															<?php else: ?>
																~
															<?php endif; ?>
														</td>
														<td>
															<div class = "d-flex">
															<?php if(Auth::user()->can('Article Edit')): ?>
															<a href="<?php echo e(url('/admin/article/'.$article->id .'/edit')); ?>" class="action-btns1" >
																<i class="feather feather-edit text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i>
															</a>
															<?php else: ?>
																~
															<?php endif; ?>
															<?php if(Auth::user()->can('Article View')): ?>
																<?php if($article->articleslug != null): ?>
																	<a href="<?php echo e(url('article/'.$article->articleslug )); ?>" class="action-btns1" target="_blank" >
																	<i class="feather feather-eye text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('View')); ?>"></i>
																</a>
																<?php else: ?>
																	<a href="<?php echo e(url('article/'.$article->id )); ?>" class="action-btns1" target="_blank" >
																	<i class="feather feather-eye text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('View')); ?>"></i>
																</a>
																<?php endif; ?>
															<?php endif; ?>
															<?php if(Auth::user()->can('Article Delete')): ?>
																<a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($article->id); ?>" id="show-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"><i class="feather feather-trash-2 text-danger"></i></a>
															<?php else: ?>
																~
															<?php endif; ?>
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


		<!-- INTERNAL Vertical-scroll js-->
		<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>"></script>

		<!-- INTERNAL Summernote js  -->
		<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>"></script>

		<!-- INTERNAL Data tables -->
		<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>"></script>


		<!-- INTERNAL Index js-->
		<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/support/support-articles.js')); ?>"></script>

		<!-- INTERNAL Sweet-Alert js-->
		<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>"></script>

		<script type="text/javascript">

			(function($)  {
				"use strict";

				// Variables
				var SITEURL = '<?php echo e(url('')); ?>';

				// Csrf Field
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				// Datatable
				// $('#articlelist').DataTable({

				// 	responsive: true,
				// 	language: {
				// 		searchPlaceholder: search,
				// 		scrollX: "100%",
				// 		sSearch: '',
				// 	},
				// 	order:[],
				// 	columnDefs: [
				// 		{ "orderable": false, "targets":[ 0,1,6] }
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
                $('#articlelist').dataTable({
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

				// Delete button article
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
								url: SITEURL + "/admin/article/"+_id,
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

				// Status change article
				$('body').on('click', '.tswitch', function () {
					var _id = $(this).data("id");
					var status = $(this).prop('checked') == true ? 'Published' : 'UnPublished';
					$.ajax({
						type: "post",
						url: SITEURL + "/admin/article/status"+_id,
						data: {'status': status},
						success: function (data) {
							toastr.success(data.success);
						},
						error: function (data) {
							console.log('Error:', data);
						}
					});
				});

				// privatemode change article
				$('body').on('click', '.tswitch1', function () {
					var _id = $(this).data("id");
					var privatemode = $(this).prop('checked') == true ? '1' : '0';
					$.ajax({
						type: "post",
						url: SITEURL + "/admin/article/privatestatus/"+_id,
						data: {'privatemode': privatemode},
						success: function (data) {
							toastr.success(data.success);
						},
						error: function (data) {
							console.log('Error:', data);
						}
					});
				});

				// Mass Delete
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
									url:"<?php echo e(url('admin/massarticle/delete')); ?>",
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

				// Checkbox check all
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

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/article/index.blade.php ENDPATH**/ ?>