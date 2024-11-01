<div class="wpnt-tab-inner">
	<table class="form-table wpnt-table">
		<tbody>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
						Enable/Disable Close Button
						</span>
					</label>
				</th>
				<td>
					<label class="switch">
					<input id="wpnt_close_check" data-type="checkbox" type="checkbox" name="wpnt_close_check" class="wpnt-options" value="" <?php @checked($args['wpnt_close_check'], 'on'); ?>/>
					<div class="slider"></div>
					</label>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							Smooth Closing 
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Using CSS3 for close button.</span>
						</span>
					</label>
				</th>
				<td>
					<label class="switch">
					<input id="wpnt_smooth" data-type="checkbox" type="checkbox" name="wpnt_smooth" class="wpnt-options" value="" <?php @checked($args['wpnt_smooth'], 'on'); ?>/>
					<div class="slider"></div>
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							Enable Re-Open button
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Select this to active re-open button.</span>
						</span>
					</label>
				</th>
				<td>
					<label class="switch">
					<input id="wpnt_reopen" data-type="checkbox" type="checkbox" name="wpnt_reopen" class="wpnt-options" value="" <?php @checked($args['wpnt_reopen'], 'on'); ?>/>
					<div class="slider"></div>q
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							Timer
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Setup time for closing topbar.</span>
						</span>
					</label>
				</th>
				<td>
					<input id="wpnt_time_move" type="number" name="wpnt_time_move" class="wpnt-options" value="<?php echo $args['wpnt_time_move']; ?>"/>
					<span class="wpnt-text-small">sec</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>