<?php $__env->startSection('styles'); ?>

<!-- INTERNAl Summernote css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAL Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- INTERNAL Datepicker css-->
<link href="<?php echo e(asset('assets/plugins/modal-datepicker/datepicker.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- INTERNAL Sweet-Alert css -->
<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header d-xl-flex d-block">
	<div class="page-leftheader">
		<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Announcements', 'menu')); ?></span></h4>
	</div>
</div>
<!--End Page header-->

<!--Announcement Settings -->
<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card">
		<div class="card-header border-0">
			<h4 class="card-title"><?php echo e(lang('Announcement Settings')); ?></h4>
		</div>
		<form method="POST" action="<?php echo e(route('settings.announcement')); ?>" enctype="multipart/form-data">
			<div class="card-body py-0" >
				<?php echo csrf_field(); ?>

				<?php echo view('honeypot::honeypotFormFields'); ?>
				<div class="row">
					<div class="switch_section mt-3 mb-1">
						<div class="switch-toggle d-flex ">
							<a class="onoffswitch2">
								<input type="radio"  name="ANNOUNCEMENT_USER" id="allusers" class=" toggle-class onoffswitch2-checkbox" value="all_users" <?php if(setting('ANNOUNCEMENT_USER') == 'all_users'): ?> checked="" <?php endif; ?>>
								<label for="allusers" class="toggle-class onoffswitch2-label"></label>
							</a>
							<div class="ps-3">
								<label class="form-label"><?php echo e(lang('All Users', 'setting')); ?></label>
								<small class="text-muted"><i>(<?php echo e(lang('If you enable this "All Users" setting feature, the "Announcement" will appear to both the users, i.e., for login users as well as non login users on the "Application.', 'setting')); ?>)</i></small>
							</div>
						</div>
					</div>
					<div class="switch_section mt-2 mb-1">
						<div class="switch-toggle d-flex ">
							<a class="onoffswitch2">
								<input type="radio"  name="ANNOUNCEMENT_USER" id="onlyloginuser" class=" toggle-class onoffswitch2-checkbox" value="only_login_user"  <?php if(setting('ANNOUNCEMENT_USER') == 'only_login_user'): ?> checked="" <?php endif; ?>>
								<label for="onlyloginuser" class="toggle-class onoffswitch2-label"></label>
							</a>
							<div class="ps-3">
								<label class="form-label"><?php echo e(lang('Only Login Users', 'setting')); ?></label>
								<small class="text-muted"><i>(<?php echo e(lang('If you enable this "Only Login Users" setting feature, the "Announcement" will appear only for the Login users on the "Application."', 'setting')); ?>)</i></small>
							</div>
						</div>
					</div>
					<div class="switch_section mt-2 mb-2">
						<div class="switch-toggle d-flex ">
							<a class="onoffswitch2">
								<input type="radio"  name="ANNOUNCEMENT_USER" id="nonloginusers" class=" toggle-class onoffswitch2-checkbox" value="non_login_users"  <?php if(setting('ANNOUNCEMENT_USER') == 'non_login_users'): ?> checked="" <?php endif; ?>>
								<label for="nonloginusers" class="toggle-class onoffswitch2-label"></label>
							</a>
							<div class="ps-3">
								<label class="form-label"><?php echo e(lang('Non Login Users', 'setting')); ?></label>
								<small class="text-muted"><i>(<?php echo e(lang('If you enable this "Non Logi Users" setting feature, the "Announcement" will appear for the non login users on the "Application."', 'setting')); ?>)</i></small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group float-end">
					<input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Announcement Settings -->

<!--Announcement List -->
<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card ">
		<div class="card-header border-0">

			<h4 class="card-title mb-md-max-2"><?php echo e(lang('Announcements', 'menu')); ?></h4>
			<div class="card-options">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Announcements Create')): ?>

				
				<a href="<?php echo e(route('announcement.create')); ?>" class="btn btn-secondary me-3"><?php echo e(lang('Add New Announcement')); ?></a>
				<?php endif; ?>

			</div>
		</div>
		<div class="card-body" >
			<div class="table-responsive">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Announcements Delete')): ?>

				<button id="massdeletenotify" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
				<?php endif; ?>

				<table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100 " id="support-articlelists">
					<thead>
						<tr>
							<th  width="10"><?php echo e(lang('Sl.No')); ?></th>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Announcements Delete')): ?>

							<th width="10" >
								<input type="checkbox"  id="customCheckAll">
								<label  for="customCheckAll"></label>
							</th>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Announcements Delete')): ?>

							<th width="10" >
								<input type="checkbox"  id="customCheckAll" disabled>
								<label  for="customCheckAll"></label>
							</th>
							<?php endif; ?>

							<th ><?php echo e(lang('Title')); ?></th>
							<th ><?php echo e(lang('Start Date')); ?></th>
							<th ><?php echo e(lang('End Date')); ?></th>
							<th ><?php echo e(lang('Selected Day')); ?></th>
							<th ><?php echo e(lang('Status')); ?></th>
							<th ><?php echo e(lang('Actions')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($i++); ?></td>
								<td>
									<?php if(Auth::user()->can('Announcements Delete')): ?>

										<input type="checkbox" name="custom_checkbox[]" class="checkall" value="<?php echo e($announcement->id); ?>'" />
									<?php else: ?>
										<input type="checkbox" name="custom_checkbox[]" class="checkall" value="<?php echo e($announcement->id); ?>'" disabled />
									<?php endif; ?>
								</td>
								<td><?php echo e(Str::limit($announcement->title, '40')); ?></td>
								<?php if($announcement->announcementday): ?>
									<td>~</td>
									<td>~</td>
									<td><?php echo e($announcement->announcementday); ?></td>
								<?php else: ?>
									<td><?php echo e($announcement->startdate->format(setting('date_format'))); ?></td>
									<td><?php echo e($announcement->enddate->format(setting('date_format'))); ?></td>
									<td>~</td>
								<?php endif; ?>
								<td>
									<?php if(Auth::user()->can('Announcements Edit')): ?>
										<?php if($announcement->status == '1'): ?>

											<label class="custom-switch form-switch mb-0">
												<input type="checkbox" name="status" data-id="<?php echo e($announcement->id); ?>" id="myonoffswitch<?php echo e($announcement->id); ?>" value="1" class="custom-switch-input tswitch" checked>
												<span class="custom-switch-indicator"></span>
											</label>
										<?php else: ?>
											<label class="custom-switch form-switch mb-0">
												<input type="checkbox" name="status" data-id="<?php echo e($announcement->id); ?>" id="myonoffswitch<?php echo e($announcement->id); ?>" value="1" class="custom-switch-input tswitch" >
												<span class="custom-switch-indicator"></span>
											</label>
										<?php endif; ?>
									<?php else: ?>
										~
									<?php endif; ?>
								</td>
								<td>
									<div class = "d-flex">
									<?php if(Auth::user()->can('Announcements Edit')): ?>

										<a href="<?php echo e(route('announcement.edit',$announcement->id)); ?>" data-id="<?php echo e($announcement->id); ?>" class="action-btns1">
											<i class="feather feather-edit text-primary" data-id="<?php echo e($announcement->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i>
										</a>
									<?php else: ?>

										~
									<?php endif; ?>
									<?php if(Auth::user()->can('Announcements Delete')): ?>

										<a href="javascript:void(0)" data-id="<?php echo e($announcement->id); ?>" class="action-btns1" id="delete-testimonial" >
											<i class="feather feather-trash-2 text-danger" data-id="<?php echo e($announcement->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"></i>
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
<!-- End Announcement List -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<?php echo $__env->make('admin.announcement.model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Summernote js  -->
<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/js/support/support-articles.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/jquery/jquery-ui.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNALdatepicker js-->

<script type="text/javascript">

	(function($)  {
		"use strict";

		// Variables
		var SITEURL = '<?php echo e(url('')); ?>';
		var now = Date.now();

		// Csrf Field
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		//_____ Datatable
		// $('#support-articlelists').dataTable({
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

		/*  When user click add announcement button */
		$('#create-new-testimonial').on('click', function () {
			// Datepicker
			$('#startdate').datepicker({
				dateFormat: 'yy-mm-dd',
				prevText: '<i class="fa fa-angle-left"></i>',
				nextText: '<i class="fa fa-angle-right"></i>',
				minDate: 0,
				firstDay: <?php echo e(setting('start_week')); ?>,

				onSelect: function (selectedDate) {

					var diff = ($("#enddate").datepicker("getDate") -
						$("#startdate").datepicker("getDate")) /
						1000 / 60 / 60 / 24 + 1; // days
					if ($("#enddate").datepicker("getDate") != null) {
						$('#count').html(diff);
						$('#days').val(diff);
					}
					$('#enddate').datepicker('option', 'minDate', selectedDate);
				}
			});
			$('#enddate').datepicker({
				dateFormat: 'yy-mm-dd',
				prevText: '<i class="fa fa-angle-left"></i>',
				nextText: '<i class="fa fa-angle-right"></i>',
				firstDay: <?php echo e(setting('start_week')); ?>,
				onSelect: function (selectedDate) {

					$('#startdate').datepicker('option', 'maxDate', selectedDate);

					var diff = ($("#enddate").datepicker("getDate") -
						$("#startdate").datepicker("getDate")) /
						1000 / 60 / 60 / 24 + 1; // days
					if ($("#startdate").datepicker("getDate") != null) {
						$('#count').html(diff);
						$('#days').val(diff);
					}
				}
			});

			$('#btnsave').val("create-product");
			$('#testimonial_id').val('');
			$('#description').summernote({
				height: 100,
			});
			$('#description').summernote('code','');
			// Select2
			$('.form-select').select2({
				multiple: true,
				minimumResultsForSearch: Infinity,
				width:'100%',
				closeOnSelect: false
			});
			$('#testimonial_form').trigger("reset");
			$('.modal-title').html("<?php echo e(lang('Add Announcement')); ?>");
			$('#addtestimonial').modal('show');

		});

		/* When click delete announcement */
		$('body').on('click', '#delete-testimonial', function () {
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
						url: SITEURL + "/admin/announcement/delete/"+_id,
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

		//Mass Delete
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
							url:"<?php echo e(route('announcementall.delete')); ?>",
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

		// Announcement submit form
		$('body').on('submit', '#testimonial_form', function (e) {
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
				url: SITEURL + "/admin/announcement/create",
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				success: (data) => {
					$('#testimonial_form').trigger("reset");
					$('#addtestimonial').modal('hide');
					$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
					toastr.success(data.success);
					location.reload();
					$('#nameError').html('');
					$('#descriptionError').html('');
					$('#startdateError').html('');
					$('#enddateError').html('');
				},
				error: function(data){
					$('#nameError').html('');
					$('#descriptionError').html('');
					$('#startdateError').html('');
					$('#enddateError').html('');
					$('#nameError').html(data.responseJSON.errors.title);
					$('#descriptionError').html(data.responseJSON.errors.notice);
					$('#startdateError').html(data.responseJSON.errors.startdate);
					$('#enddateError').html(data.responseJSON.errors.enddate);
					$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
				}
			});
		});

		// Announcement  status
		$('body').on('click', '.tswitch', function () {
			var _id = $(this).data("id");
			var status = $(this).prop('checked') == true ? '1' : '0';
				$.ajax({
					type: "post",
					url: SITEURL + "/admin/announcement/status"+_id,
					data: {'status': status},
					success: function (data) {
						toastr.success(data.success);
						location.reload();
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
		});

		// Check all Checkbox
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

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/steursr/www/resources/views/admin/announcement/index.blade.php ENDPATH**/ ?>