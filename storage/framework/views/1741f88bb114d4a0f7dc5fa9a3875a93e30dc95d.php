                                            <div class="card">
												<div class="card-header  border-0">
													<div class="card-title"><?php echo e(lang('Ticket Information')); ?></div>
												</div>
												<div class="card-body pt-2 ps-0 pe-0 pb-0">
													<div class="table-responsive tr-lastchild">
														<table class="table mb-0 table-information">
															<tbody>

																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Ticket ID')); ?></span>
																	</td>
																	<td>:</td>
																	<td>
																		<span class="font-weight-semibold">#<?php echo e($ticket->ticket_id); ?></span>
																	</td>
																</tr>
																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Category')); ?></span>
																	</td>
																	<td>:</td>
																	<td>

																		<?php if($ticket->category_id != null): ?>
																			<?php if($ticket->category != null): ?>

																			<span class="font-weight-semibold"><?php echo e($ticket->category->name); ?></span>

																			<?php else: ?>
																				<span class="font-weight-semibold">~</span>
																			<?php endif; ?>
																		<?php else: ?>
																				<span class="font-weight-semibold">~</span>
																		<?php endif; ?>

																	</td>
																</tr>
																<?php if($ticket->subcategory != null): ?>
																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('SubCategory')); ?></span>
																	</td>
																	<td>:</td>
																	<td>
																		<span class="font-weight-semibold"><?php echo e($ticket->subcategoriess->subcategoryname); ?></span>

																	</td>
																</tr>
																<?php endif; ?>

																<?php if($ticket->project != null): ?>

																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Project')); ?></span>
																	</td>
																	<td>:</td>
																	<td>
																		<span class="font-weight-semibold"><?php echo e($ticket->project); ?></span>
																	</td>
																</tr>
																<?php endif; ?>
																<?php if($ticket->priority != null): ?>
																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Priority')); ?></span>
																	</td>
																	<td>:</td>
																	<td id="priorityid">
																		<?php if($ticket->priority == "Low"): ?>

																			<span class="badge badge-success-light" ><?php echo e(lang($ticket->priority)); ?></span>

																		<?php elseif($ticket->priority == "High"): ?>

																			<span class="badge badge-danger-light"><?php echo e(lang($ticket->priority)); ?></span>

																		<?php elseif($ticket->priority == "Critical"): ?>

																			<span class="badge badge-danger-dark"><?php echo e(lang($ticket->priority)); ?></span>

																		<?php else: ?>

																			<span class="badge badge-warning-light"><?php echo e(lang($ticket->priority)); ?></span>

																		<?php endif; ?>
																	</td>
																</tr>
																<?php else: ?>

																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Priority')); ?></span>
																	</td>
																	<td>:</td>
																	<td id="priorityid">
																		~
																	</td>
																</tr>
																<?php endif; ?>

																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Open Date')); ?></span>
																	</td>
																	<td>:</td>
																	<td>
																		<span class="font-weight-semibold"><?php echo e($ticket->created_at->timezone(Auth::user()->timezone)->format(setting('date_format'))); ?></span>
																	</td>
																</tr>
																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Status')); ?></span>
																	</td>
																	<td>:</td>
																	<td>
																		<?php if($ticket->status == "New"): ?>

																		<span class="badge badge-burnt-orange"><?php echo e(lang($ticket->status)); ?></span>
																		<?php elseif($ticket->status == "Re-Open"): ?>

																		<span class="badge badge-teal"><?php echo e(lang($ticket->status)); ?></span>
																		<?php elseif($ticket->status == "Inprogress"): ?>

																		<span class="badge badge-info"><?php echo e(lang($ticket->status)); ?></span>
																		<?php elseif($ticket->status == "On-Hold"): ?>

																		<span class="badge badge-warning"><?php echo e(lang($ticket->status)); ?></span>
																		<?php else: ?>

																		<span class="badge badge-danger"><?php echo e(lang($ticket->status)); ?></span>
																		<?php endif; ?>

																	</td>
																</tr>
																<?php if($ticket->replystatus != null && $ticket->replystatus == "Solved" || $ticket->replystatus == "Unanswered" || $ticket->replystatus == "Waiting for response"): ?>

																<tr>
																	<td>
																		<span class="w-50"><?php echo e(lang('Reply Status')); ?></span>
																	</td>
																	<td>:</td>
																	<td>
																		<?php if($ticket->replystatus == "Solved"): ?>

																		<span class="badge badge-success"><?php echo e(lang($ticket->replystatus)); ?></span>
																		<?php elseif($ticket->replystatus == "Unanswered"): ?>

																		<span class="badge badge-danger-light"><?php echo e(lang($ticket->replystatus)); ?></span>
																		<?php elseif($ticket->replystatus == "Waiting for response"): ?>

																		<span class="badge badge-warning"><?php echo e(lang($ticket->replystatus)); ?></span>
																		<?php else: ?>
																		<?php endif; ?>

																	</td>
																</tr>
																<?php endif; ?>

																<?php $customfields = $ticket->ticket_customfield()->get(); ?>
																<?php if($customfields->isNotEmpty()): ?>
																<?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<?php if($customfield->fieldtypes != 'textarea'): ?>
																	<?php if($customfield->privacymode == '1'): ?>
																		<?php
																			$extrafiels = decrypt($customfield->values);
																		?>
																		<tr>
																			<td><?php echo e($customfield->fieldnames); ?></td>
																			<td>: </td>
																			<td><?php echo e($extrafiels); ?> </td>
																		</tr>
																	<?php else: ?>

																		<tr>
																			<td><?php echo e($customfield->fieldnames); ?></td>
																			<td>:</td>
																			<td><?php echo e($customfield->values); ?> </td>
																		</tr>

																	<?php endif; ?>
																<?php endif; ?>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																<?php endif; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
<?php /**PATH /home/steursr/www/resources/views/admin/viewticket/showticketdata/ticketinfo.blade.php ENDPATH**/ ?>