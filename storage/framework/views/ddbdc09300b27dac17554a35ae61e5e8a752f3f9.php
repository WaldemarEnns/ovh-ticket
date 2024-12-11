    <?php $__env->startSection('styles'); ?>

        <!-- INTERNAL Data table css -->
		<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>" rel="stylesheet" />

        <!-- INTERNAL Sweet-Alert css -->
		<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>" rel="stylesheet" />

    <?php $__env->stopSection(); ?>
							<?php $__env->startSection('content'); ?>

                            <!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Canned Response')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card ">
                                    <div class="card-header border-0 d-sm-flex">
                                        <h4 class="card-title"><?php echo e(lang('Canned Response List')); ?></h4>
                                        <div class="card-options mt-sm-max-2">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Canned Response Create')): ?>

                                            <a href="<?php echo e(route('admin.cannedmessages.create')); ?>" class="btn btn-secondary me-3" ><?php echo e(lang('Add Canned Response')); ?></a>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="table-responsive spruko-delete">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Canned Response Delete')): ?>

                                            <button id="massdeletenotify" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
                                            <?php endif; ?>

                                            <table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100" id="cannedmessages">
                                                <thead>
                                                    <tr>
                                                        <th  width="10"><?php echo e(lang('Sl.No')); ?></th>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Canned Response Delete')): ?>

                                                        <th width="10" >
                                                            <input type="checkbox"  id="customCheckAll">
                                                            <label  for="customCheckAll"></label>
                                                        </th>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Canned Response Delete')): ?>

                                                        <th width="10" >
                                                            <input type="checkbox"  id="customCheckAll" disabled>
                                                            <label  for="customCheckAll"></label>
                                                        </th>
                                                        <?php endif; ?>

                                                        <th class="w-50"><?php echo e(lang('Title')); ?></th>
                                                        <th class="w-50"><?php echo e(lang('Status')); ?></th>
                                                        <th class="w-50"><?php echo e(lang('Actions')); ?></th>
                                                    </tr>
                                                </thead>
												<tbody>
													<?php $i = 1; ?>
													<?php $__currentLoopData = $cannedmessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cannedmsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td><?php echo e($i++); ?></td>
															<td>
																<?php if(Auth::user()->can('Canned Response Delete')): ?>
																	<input type="checkbox" name="spruko_checkbox[]" class="checkall" value="<?php echo e($cannedmsg->id); ?>" />
																<?php else: ?>
																	<input type="checkbox" name="spruko_checkbox[]" class="checkall" value="<?php echo e($cannedmsg->id); ?>" disabled />
																<?php endif; ?>
															</td>
															<td><?php echo e($cannedmsg->title); ?></td>
															<td>
																<?php if(Auth::user()->can('Canned Response Edit')): ?>
																	<?php if($cannedmsg->status == '1'): ?>

																		<label class="custom-switch form-switch mb-0">
																			<input type="checkbox" name="status" data-id="<?php echo e($cannedmsg->id); ?>" id="myonoffswitch<?php echo e($cannedmsg->id); ?>" value="1" class="custom-switch-input tswitch" checked>
																			<span class="custom-switch-indicator"></span>
																		</label>

																	<?php else: ?>

																		<label class="custom-switch form-switch mb-0">
																			<input type="checkbox" name="status" data-id="<?php echo e($cannedmsg->id); ?>" id="myonoffswitch<?php echo e($cannedmsg->id); ?>" value="1" class="custom-switch-input tswitch">
																			<span class="custom-switch-indicator"></span>
																		</label>

																	<?php endif; ?>
																<?php else: ?>{
																	~
																<?php endif; ?>
															</td>
															<td>
																<div class = "d-flex">
																	<?php if(Auth::user()->can('Canned Response Edit')): ?>

																		<a href="<?php echo e(route('admin.cannedmessages.edit',$cannedmsg->id)); ?>" class="action-btns1 edit-testimonial"><i class="feather feather-edit text-primary" data-id="<?php echo e($cannedmsg->id); ?>"data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i></a>
																	<?php else: ?>
																		~
																	<?php endif; ?>
																	<?php if(Auth::user()->can('Canned Response Delete')): ?>
																		<a href="javascript:void(0)" data-id="<?php echo e($cannedmsg->id); ?>" class="action-btns1" id="delete-cannedmessages" ><i class="feather feather-trash-2 text-danger" data-id="<?php echo e($cannedmsg->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"></i></a>
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


                            <?php $__env->stopSection(); ?>

        <?php $__env->startSection('scripts'); ?>

        <!-- INTERNAL Data tables -->
		<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/datatablebutton.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/buttonbootstrap.min.js')); ?>"></script>

        <!-- INTERNAL Sweet-Alert js-->
		<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>"></script>

        <script type="text/javascript">

			"use strict";

			(function($)  {

                // Variables
			    var SITEURL = '<?php echo e(url('')); ?>';

                // Csrf Field
				$.ajaxSetup({
					headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

                // Datatable
				// $('#cannedmessages').dataTable({
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
                        $('#cannedmessages').dataTable({
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

                // Status change article
				$('body').on('click', '.tswitch', function () {
					var _id = $(this).data("id");
					var status = $(this).prop('checked') == true ? '1' : '0';

					$.ajax({
						type: "post",
						url: SITEURL + "/admin/cannedmessages/status/"+_id,
						data: {'status': status},
						success: function (data) {
							toastr.success(data.success);
						},
						error: function (data) {
							console.log('Error:', data);
						}
					});
				});

                // Delete Testimonial
				$('body').on('click', '#delete-cannedmessages', function () {
					var _id = $(this).data("id");
					swal({
						title: `<?php echo e(lang('Are you sure you want to continue?')); ?>`,
						text: "<?php echo e(lang('This might erase your records permanently')); ?>",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$.ajax({
								type: "post",
								url: SITEURL + "/admin/cannedmessages/delete/"+_id,
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

				// Mass Delete Testimonial
				$('body').on('click', '#massdeletenotify', function () {
					var id = [];
					$('.checkall:checked').each(function(){
						id.push($(this).val());
					});
					if(id.length > 0){
						swal({
							title: `<?php echo e(lang('Are you sure you want to continue?')); ?>`,
							text: "<?php echo e(lang('This might erase your records permanently')); ?>",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
								$.ajax({
									url:"<?php echo e(route('admin.cannedmessages.deleteall')); ?>",
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
						toastr.error('<?php echo e(lang('Please select at least one check box.')); ?>');
					}
				});

            })(jQuery);
        </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/Modules/Uhelpupdate/Resources/views/cannedmessages/index.blade.php ENDPATH**/ ?>