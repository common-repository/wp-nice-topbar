<div class="wpnt-tab-inner">
	<table class="form-table wpnt-table">
		<tbody>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Label <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">The name of button.</span></span></label>
				</th>
				<td>
					<input id="wpnt_button_name" type="text" name="wpnt_btn_name" class="wpnt-options" value="<?php echo $args['wpnt_button_name']; ?>"/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Link <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">The Url of button.</span></span></label>
				</th>
				<td>
					<input id="wpnt_button_link" type="text" name="wpnt_btn_link" class="wpnt-options" value="<?php echo $args['wpnt_button_link']; ?>"/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Button Actions <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Trigger when click on button</span></span></label>
				</th>
				<td>
					<label class="switch">
					<input id="wpnt_button_open" data-type="checkbox" type="checkbox" name="wpnt_button_open" class="wpnt-options" value="" <?php @checked($args['wpnt_button_open'], 'on'); ?>/>
					<div class="slider"></div>
					</label>
					<span class="wpnt-text-small">Open URL in new tab</span>
					<div class="wpnt-padding-5"></div>
					<label class="switch">
					<input id="wpnt_button_script" data-type="checkbox" type="checkbox" name="wpnt_button_script" class="wpnt-options" value="" <?php @checked($args['wpnt_button_script'], 'on'); ?>/>
					<div class="slider"></div>
					</label>
					<span class="wpnt-text-small">Execute script</span>
					<p><textarea id="wpnt_button_code" name="wpnt_button_code" class="wpnt-options"><?php echo @stripslashes($args['wpnt_button_code']); ?></textarea>
					<span class="wpnt-text-small">Enter your javascript code here.</span>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Button Class <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Custom class for button</span></span></label>
				</th>
				<td>
					<input id="wpnt_button_class" type="text" name="wpnt_btn_class" class="wpnt-options" value="<?php echo $args['wpnt_button_class']; ?>"/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Button Id <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Custom id for button</span></span></label>
				</th>
				<td>
					<input id="wpnt_button_id" type="text" name="wpnt_btn_id" class="wpnt-options" value="<?php echo $args['wpnt_button_id']; ?>"/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Border radius <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Set border radius for button.</span></span></label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="100">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_button_border_radius" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_border_radius']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
					<span class="pre-label">Background color 
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar">Set background color for button.</span>
					</span>
					</label>
				</th>
				<td>
					<input class="wpnt-options color-picker" type="text" id="wpnt_button_bg_color" name="wpnt_btn_bg_color" value="<?php echo $args['wpnt_button_bg_color']; ?>"/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<span class="pre-label">Background gradient 
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar"></span></span>
				</th>
				<td>
					<input type="text" id="wpnt_button_bgcolor_first" class="wpnt-options color-picker" value="<?php echo @$args['wpnt_button_bgcolor_first']; ?>">
					<input type="text" id="wpnt_button_bgcolor_last" class="wpnt-options color-picker" value="<?php echo @$args['wpnt_button_bgcolor_last']; ?>">
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Font size <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Set font size for button.</span></span></label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="50">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_button_text_size" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_text_size']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Font style', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose font style for button label.</span>
						</span>
					</label>
				</th>
				<td>				
					<select id="wpnt_btn_style" class="wpnt-options">
						<option value="">Select</option>
						<option value="italic" <?php @selected($args['wpnt_btn_style'], 'italic'); ?>>Italic</option>
						<option value="normal" <?php @selected($args['wpnt_btn_style'], 'normal'); ?>>Normal</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Font weight', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose font weight for content text.</span>
						</span>
					</label>
				</th>
				<td>
					<select id="wpnt_btn_weight" class="wpnt-options">
						<option value="">Select</option>
						<option value="lighter" <?php @selected($args['wpnt_btn_weight'], 'lighter'); ?>>Lighter</option>
						<option value="normal" <?php @selected($args['wpnt_btn_weight'], 'normal'); ?>>Normal</option>
						<option value="bold" <?php @selected($args['wpnt_btn_weight'], 'bold'); ?>>Bold</option>
						<option value="bolder" <?php @selected($args['wpnt_btn_weight'], 'bolder'); ?>>Bolder</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Text color <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Choose text color for button.</span></span></label>
				</th>
				<td>
					<input class="wpnt-options color-picker" type="text" id="wpnt_button_text_color" name="wpnt_btn_text_color" value="<?php echo $args['wpnt_button_text_color']; ?>"/>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Text transform', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Align the text (default: left)</span>
						</span>
					</label>
				</th>
				<td>
					<select id="wpnt_btn_transform" class="wpnt-options">
						<option value="">Select</option>
						<option value="none" <?php echo @($args['wpnt_btn_transform'] == 'none') ? 'selected' : ''; ?>>None</option>
						<option value="uppercase" <?php echo @($args['wpnt_btn_transform'] == 'uppercase') ? 'selected' : ''; ?>>Uppercase</option>
						<option value="lowercase" <?php echo @($args['wpnt_btn_transform'] == 'lowercase') ? 'selected' : ''; ?>>Lowercase</option>
						<option value="capitalize" <?php echo @($args['wpnt_btn_transform'] == 'capitalize') ? 'selected' : ''; ?>>Capitalize</option>
						<option value="initial" <?php echo @($args['wpnt_btn_transform'] == 'initial') ? 'selected' : ''; ?>>Initial</option>
						<option value="inherit" <?php echo @($args['wpnt_btn_transform'] == 'inherit') ? 'selected' : ''; ?>>Inherit</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Padding <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Adjust padding of button. It has 4 values are top, right, bottom, left.</span></span></label>
				</th>
				<td>
					<fieldset>
						<label>Top</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_padding_top" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_padding_top']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Right</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_padding_right" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_padding_right']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Bottom</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_padding_bottom" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_padding_bottom']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Left</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_padding_left" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_padding_left']; ?>">
						<span class="wpnt-text-small">px</span>
					</fieldset>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Margin <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Adjust margin of button. It has 4 values are top, right, bottom, left.</span></span></label>
				</th>
				<td>
					<fieldset>
						<label>Top</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_margin_top" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_margin_top']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Right</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_margin_right" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_margin_right']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Bottom</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_margin_bottom" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_margin_bottom']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Left</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_button_margin_left" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_button_margin_left']; ?>">
						<span class="wpnt-text-small">px</span>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
</div>