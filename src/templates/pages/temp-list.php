<?php wpnt_load_template('temp-header'); ?>
	<div class="wpnt-content wpnt-listing-section">
		<div class="list-topbar">
			<table class="wp-list-table widefat fixed striped posts">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $args->getTopbars() as $topbar ) : ?>
					<?php  $topbar_name = get_option( $topbar->option_name ); ?>
						<tr id="row_<?php echo $topbar->option_id; ?>">
							<td><?php echo $topbar->option_id; ?></td>
							<td><?php echo $topbar_name['wpnt_topbar_label']; ?></td>
							<td>
								<div class="action-box">
									<button id="wpnt_edit" class="wpnt-edit wpnt-btn wpnt-btn-small" data-name="<?php echo $topbar->option_name; ?>">
										<i class="fa fa-pencil wpnt-icon"></i>Edit
									</button>
									<button id="wpnt_delete" class="wpnt-delete wpnt-btn wpnt-btn-small" data-id="<?php echo $topbar->option_id; ?>" data-name="<?php echo $topbar->option_name; ?>">
										<i class="fa fa-minus-circle wpnt-icon"></i>Delete
									</button>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php wpnt_load_template('temp-sidebar', $args); ?>
</div>