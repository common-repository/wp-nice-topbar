<div class="wpnt-tab-inner">
	<table class="form-table wpnt-table">
		<tbody>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Input Place holder', WPNT_TEXTDOMAIN); ?> 
						</span>
					</label>
				</th>
				<td>
					<input type="text" id="wpnt_mc_placeholder" class="wpnt-options" value="<?php echo @$args['wpnt_mc_placeholder']; ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Button Text', WPNT_TEXTDOMAIN); ?> 
						</span>
					</label>
				</th>
				<td>
					<input type="text" id="wpnt_mc_button_text" class="wpnt-options" value="<?php echo @$args['wpnt_mc_button_text']; ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Thankyou Message', WPNT_TEXTDOMAIN); ?> 
						</span>
					</label>
				</th>
				<td>
					<input type="text" id="wpnt_mc_success_message" class="wpnt-options" value="<?php echo @$args['wpnt_mc_success_message']; ?>">
				</td>
			</tr>
		</tbody>
	</table>
</div>