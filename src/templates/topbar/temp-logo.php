<div class="wpnt-tab-inner">
	<table class="form-table wpnt-table">
		<tbody>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label"><?php _e('Upload Logo', WPNT_TEXTDOMAIN); ?> 
						<i class="fa fa-question-circle wpnt-icon-cursor"></i>
						<span class="tooltip-bar"><?php _e('Upload your logo or choose from image library', WPNT_TEXTDOMAIN); ?>.</span>
						</span>
					</label>
				</th>
				<td>
					<label>
					    <input id="wpnt_logo_url" type="text" class="wpnt-options" value="<?php echo $args['wpnt_logo_url']; ?>" />
					    <i id="wpnt_upload_logo" class="fa fa-upload wpnt-icon"></i>
					    <i id="wpnt_remove_logo" style="display:none;" class="fa fa-times"></i>
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
					<span class="pre-label"><?php _e('Logo Link', WPNT_TEXTDOMAIN); ?> 
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar"><?php _e('Link of logo', WPNT_TEXTDOMAIN); ?></span>
					</span>
					</label>
				</th>
				<td>
					<label>
					    <input id="wpnt_logo_link" type="text" class="wpnt-options" value="<?php echo $args['wpnt_logo_link']; ?>" />
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
					<span class="pre-label"><?php _e('Width', WPNT_TEXTDOMAIN); ?> 
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar"><?php _e('Width of the logo', WPNT_TEXTDOMAIN); ?></span>
					</span>
					</label>
				</th>
				<td>
					<label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
					    <input id="wpnt_logo_width" type="text" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_width']; ?>" />
					    <span class="wpnt-text-small">px</span>
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
					<span class="pre-label"><?php _e('Height', WPNT_TEXTDOMAIN); ?> 
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar"><?php _e('Height of the logo', WPNT_TEXTDOMAIN); ?></span>
					</span>
					</label>
				</th>
				<td>
					<label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
					    <input id="wpnt_logo_height" type="text" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_height']; ?>" />
					    <span class="wpnt-text-small">px</span>
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
					<span class="pre-label"><?php _e('Padding', WPNT_TEXTDOMAIN); ?> 
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar">
					<?php _e('Adjust padding of button. It has 4 values are top, right, bottom, right.', WPNT_TEXTDOMAIN); ?>
					</span>
					</span>
					</label>
				</th>
				<td>
					<fieldset>
						<label>Top</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_padding_top" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_padding_top']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Right</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_padding_right" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_padding_right']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Bottom</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_padding_bottom" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_padding_bottom']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Left</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_padding_left" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_padding_left']; ?>">
						<span class="wpnt-text-small">px</span>
					</fieldset>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Margin <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Adjust margin of button. It has 4 values are top, right, bottom, right.</span></span></label>
				</th>
				<td>
					<fieldset>
						<label>Top</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_margin_top" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_margin_top']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Right</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_margin_right" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_margin_right']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Bottom</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_margin_bottom" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_margin_bottom']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Left</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_logo_margin_left" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_logo_margin_left']; ?>">
						<span class="wpnt-text-small">px</span>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
</div>