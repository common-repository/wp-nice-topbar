<?php wpnt_load_template('temp-header'); ?>
	<div class="wpnt-content wpnt-new-section">
		<div class="wpnt-inner">
			<form id="wpnt_add_form" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" method="POST">
				<table class="form-table">
					<tr>
						<th>Topbar name <span class="required">*</span></th>
						<td>
							<input type="text" name="wpnt_topbar_name" id="wpnt_topbar_name"/><br/>
							<span class="wpnt-text-small">
							<?php 
							_e('The name is mandatory and not includes specific characters.', WPNT_TEXTDOMAIN);
							?>
							</span>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="wpnt-after-content">
		<button id="wpnt_btn_add" class="wpnt-btn" type="button"><i class="fa fa-floppy-o wpnt-icon"></i>Save</button>
	</div>
</div>
<?php wpnt_load_template('temp-sidebar', $args); ?>
</div>