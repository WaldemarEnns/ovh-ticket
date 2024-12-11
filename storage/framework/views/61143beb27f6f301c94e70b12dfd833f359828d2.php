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
		<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Customers', 'menu')); ?></span></h4>
	</div>
</div>
<!--End Page header-->

<!-- Customer List -->
<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card ">
		<div class="card-header border-0 d-md-max-block">
			<h4 class="card-title"><?php echo e(lang('Customers List')); ?></h4>
			<div class="card-options mt-sm-max-2 d-md-max-block">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Customers Create')): ?>

				<a href="<?php echo e(url('admin/customer/create')); ?>" class="btn btn-success mb-md-max-2 me-3"><i class="feather feather-user-plus"></i> <?php echo e(lang('Add Customer')); ?></a>
				<?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Customers Importlist')): ?>
				<a href="<?php echo e(route('admin.customer.import')); ?>" class="btn btn-info mb-md-max-2 me-3"><i class="feather feather-download"></i> <?php echo e(lang('Import Customer List')); ?></a>
                <?php endif; ?>
			</div>
		</div>
		<div class="card-body" >
			<div class="table-responsive spruko-delete">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Customers Delete')): ?>

				<button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
				<?php endif; ?>

				<table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100" id="support-customerlist">
					<thead>
						<tr>
							<th  width="10"><?php echo e(lang('Sl.No')); ?></th>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Customers Delete')): ?>

							<th width="10" >
								<input type="checkbox"  id="customCheckAll">
								<label  for="customCheckAll"></label>
							</th>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Customers Delete')): ?>

							<th width="10" >
								<input type="checkbox"  id="customCheckAll" disabled>
								<label  for="customCheckAll"></label>
							</th>
							<?php endif; ?>

							<th ><?php echo e(lang('Name')); ?></th>
							<th ><?php echo e(lang('User Type')); ?></th>
							<th ><?php echo e(lang('Verification')); ?></th>
							<th ><?php echo e(lang('Register Date')); ?></th>
							<th class="w-5"><?php echo e(lang('Status')); ?></th>
							<th ><?php echo e(lang('Actions')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($i++); ?></td>
								<td>
									<?php if(Auth::user()->can('Customers Delete')): ?>

										<input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($customer->id); ?>" />
									<?php else: ?>

										<input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($customer->id); ?>" disabled />
									<?php endif; ?>
								</td>
								<td>
									<?php if(auth()->user()->can('Customers Login')): ?>

										<div>
											<h5 class="d-inline"><?php echo e(Str::limit($customer->username, '40')); ?></h5>
											<?php if($customer->voilated == 'on'): ?>
												<span class="badge badge-danger-light"><i class="fa fa-exclamation-triangle text-danger"></i> <?php echo e(__('Voilation')); ?></span>
											<?php endif; ?>
											<a class="float-xxl-end" href="<?php echo e(url("/admin/customer/adminlogin/". $customer->id)); ?>"  target="_blank">
												<span class="badge badge-success text-white f-12"><?php echo e(lang('Login as')); ?></span>
											</a>
										</div>
										<small class="fs-12 text-muted">
											<span class="font-weight-normal1"><?php echo e(Str::limit($customer->email, '40')); ?></span>
										</small>
									<?php else: ?>

										<div>
											<a href="#" class="h5"><?php echo e(Str::limit($customer->username, '40')); ?></a>
										</div>
										<small class="fs-12 text-muted">
											<span class="font-weight-normal1"><?php echo e(Str::limit($customer->email, '40')); ?></span>
										</small>
									<?php endif; ?>
								</td>
								<td><?php echo e($customer->userType); ?></td>
								<td>
									<?php if($customer->verified == 1): ?>

										<?php echo e(lang('Verified')); ?>


									<?php else: ?>
										<?php echo e(lang('Unverified')); ?>

									<?php endif; ?>
								</td>
								<td>
									<span class="badge badge-success-light">
										<?php echo e($customer->created_at->format(setting('date_format'))); ?>

									</span>
								</td>
								<td>
									<?php if($customer->status == "1"): ?>
										<span class="badge badge-success"><?php echo e(lang('Active')); ?></span>

									<?php else: ?>
										<span class="badge badge-danger"><?php echo e(lang('Inactive')); ?></span>
									<?php endif; ?>
								</td>
								<td>
									<div class = "d-flex">
									<?php if(Auth::user()->can('Customers Edit')): ?>

										<a href="<?php echo e(url('/admin/customer/' . $customer->id)); ?>" class="action-btns1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>">
											<i class="feather feather-edit text-primary"></i>
										</a>
									<?php else: ?>
										~
									<?php endif; ?>
									<?php if(Auth::user()->can('Customers Delete')): ?>

										<a href="javascript:void(0)" class="action-btns1" data-id="<?php echo e($customer->id); ?>" id="show-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>">
											<i class="feather feather-trash-2 text-danger"></i>
										</a>
									<?php else: ?>
										~
									<?php endif; ?>

									<?php
										$ticketCount = \App\Models\Ticket\Ticket::where('cust_id', $customer->id)->count();
									?>

									<?php if($ticketCount > 0): ?>
										<a href="<?php echo e(route('admin.customer.tickethistory', $customer->id)); ?>" class="action-btns1"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Tickets History')); ?>">
											<i class="feather-rotate-ccw text-primary"></i>
										</a>
									<?php endif; ?>

									<?php if($customer->verified != 1 && $customer->userType == 'Customer'): ?>
										<a href="javascript:void(0)" data-id="<?php echo e($customer->email); ?>" id="resendverification" class="action-btns1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Validate Customer')); ?>">
											<i class="feather feather-check-circle text-primary"></i>
										</a>
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
<!-- End Customer List -->
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

		// Csrf Field
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		// Datatable
		// $('#support-customerlist').DataTable({
		// 	responsive: true,
		// 	language: {
		// 		searchPlaceholder: search,
		// 		scrollX: "100%",
		// 		sSearch: '',
		// 	},
		// 	order:[],
		// 	columnDefs: [
		// 		{ "orderable": false, "targets":[ 0,1,7] }
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
        $('#support-customerlist').dataTable({
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

		// Delete the customer
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
						url: SITEURL + "/admin/customer/delete/"+_id,
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
							url:"<?php echo e(url('admin/masscustomer/delete')); ?>",
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


		// resend verification code to the customer
		$('body').on('click', '#resendverification', function () {
			var _id = $(this).data("id");

			swal({
				title: `<?php echo e(lang('Are you sure you want to continue?', 'alerts')); ?>`,
				text: "<?php echo e(lang('This action will Verify Customer to perform user level Action and Login', 'alerts')); ?>",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "get",
						url: SITEURL + "/admin/customer/resendverification/"+_id,
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



<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/customers/index.blade.php ENDPATH**/ ?>