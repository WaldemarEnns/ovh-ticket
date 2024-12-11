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
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Groups', 'menu')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->

							<!-- Groups List-->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0 d-sm-flex">
										<h4 class="card-title"><?php echo e(lang('Groups List')); ?></h4>
										<div class="card-options d-sm-flex d-block">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Groups Create')): ?>

											<a href="<?php echo e(route('groups.create')); ?>" class="btn btn-secondary me-3 mt-sm-0 mt-2" ><i class="feather feather-users"></i> <?php echo e(lang('Add Group')); ?></a>
											<?php endif; ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Access')): ?>

											<a href="<?php echo e(url('/admin/categories')); ?>" class="btn btn-success me-3 mt-sm-0 mt-2" ><i class="feather feather-cpu"></i> <?php echo e(lang('Category Assign')); ?></a>
											<?php endif; ?>
										</div>
									</div>
									<div class="card-body" >
										<div class="table-responsive spruko-delete">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Groups Delete')): ?>

											<button id="massdeletenotify" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
											<?php endif; ?>
											<table class="table table-bordered border-bottom text-nowrap w-100" id="support-articlelists">
												<thead>
													<tr>
														<th  width="10"><?php echo e(lang('Sl.No')); ?></th>
														<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Groups Delete')): ?>

                                                        <th width="10" >
                                                            <input type="checkbox"  id="customCheckAll">
                                                            <label  for="customCheckAll"></label>
                                                        </th>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Groups Delete')): ?>

                                                        <th width="10" >
                                                            <input type="checkbox"  id="customCheckAll" disabled>
                                                            <label  for="customCheckAll"></label>
                                                        </th>
                                                        <?php endif; ?>
														<th ><?php echo e(lang('Group Name')); ?></th>
														<th ><?php echo e(lang('Count')); ?></th>
														<th ><?php echo e(lang('Status')); ?></th>
														<th ><?php echo e(lang('Actions')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>
													<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($i++); ?></td>
														<td>
															<?php if(Auth::user()->can('Groups Delete')): ?>
																<input type="checkbox" name="spruko_checkbox[]" class="checkall" value="<?php echo e($group->id); ?>" />
															<?php else: ?>
																<input type="checkbox" name="spruko_checkbox[]" class="checkall" value="<?php echo e($group->id); ?>" disabled />
															<?php endif; ?>
														</td>
														<td><?php echo e(Str::limit($group->groupname, '40')); ?></td>
														<td>
															<span class="badge badge-info"><?php echo e($group->groupsuser()->count()); ?></span>
														</td>
                                                        <td>
                                                            <?php if(Auth::user()->can('Groups Edit')): ?>
                                                                <?php if($group->groupstatus == '1'): ?>
                                                                    <label class="custom-switch form-switch mb-0">
                                                                    <input type="checkbox" name="groupstatus" data-id="<?php echo e($group->id); ?>" id="myonoffswitch<?php echo e($group->id); ?>" value="1" class="custom-switch-input tswitch" checked>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    </label>
                                                                <?php else: ?>
                                                                    <label class="custom-switch form-switch mb-0">
                                                                    <input type="checkbox" name="groupstatus" data-id="<?php echo e($group->id); ?>" id="myonoffswitch<?php echo e($group->id); ?>" value="1" class="custom-switch-input tswitch">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    </label>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                            ~
                                                            <?php endif; ?>
                                                        </td>
														<td>
															<div class = "d-flex">
															<?php if(Auth::user()->can('Groups Edit')): ?>

																<a href="<?php echo e(url('admin/groups/view/'.$group->id)); ?>" data-id="<?php echo e($group->id); ?>" class="action-btns1 edit-testimonial">
																	<i class="feather feather-edit text-primary" data-id="<?php echo e($group->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i>
																</a>

															<?php else: ?>
																~
															<?php endif; ?>

															<?php if(Auth::user()->can('Groups Delete')): ?>

																<a href="javascript:void(0);" data-id="<?php echo e($group->id); ?>" class="action-btns1 delete-groups">
																	<i class="feather feather-trash-2 text-danger" data-id="<?php echo e($group->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i>
																</a>

															<?php else: ?>
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
							<!-- End Groups List-->

							<?php $__env->stopSection(); ?>
		<?php $__env->startSection('modal'); ?>

		<?php $__env->stopSection(); ?>

		<?php $__env->startSection('scripts'); ?>

		<!-- INTERNAL Vertical-scroll js-->
		<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Data tables -->
		<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Sweet-Alert js-->
		<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>


        <script type="text/javascript">

			"use strict";

			(function($)  {

				// Variables
				var SITEURL = "<?php echo e(url('')); ?>";

				// Csrf Field
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				// DataTable
				// $('#support-articlelists').dataTable({
				// 	responsive: true,
				// 	language: {
				// 		searchPlaceholder: search,
				// 		scrollX: "100%",
				// 		sSearch: '',
				// 	},
				// 	order:[],
				// 	columnDefs: [
				// 		{ "orderable": false, "targets":[ 0,1,4] }
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

				/* When click delete category */
				$('body').on('click', '.delete-groups', function () {
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
									url: SITEURL + "/admin/groups/delete/"+_id,
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


				// Mass Delete
				$('body').on('click', '#massdeletenotify', function () {
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
									url:"<?php echo e(route('groups.deleteall')); ?>",
									method:"post",
									data:{id:id},
									success:function(data)
									{
										toastr.success(data.success);
										location.reload();

									},
									error:function(data){
										console.log(data);
									}
								});
							}
						});
					}else{
						toastr.error('<?php echo e(lang('Please select at least one check box.', 'alerts')); ?>');
					}
				});

				//checkbox checkall
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

				$('body').on('change', '.tswitch', function(e){

					let id = $(this).data('id'),
					 	status = $(this).prop('checked') == true ? '1' : '0';;

					$.ajax({
						url:"<?php echo e(route('groups.statuschange', 'id')); ?>",
						method:"post",
						data:{
							id:id,
							status:status,
						},
						success:function(data)
						{
							toastr.success(data.success);

						},
						error:function(data){
						}
					});

				});

			})(jQuery);

		</script>

		<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/groups/index.blade.php ENDPATH**/ ?>