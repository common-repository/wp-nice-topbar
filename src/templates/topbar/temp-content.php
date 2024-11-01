<div class="wpnt-tab-inner">
	<table class="form-table wpnt-table">
		<tbody>
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Text content', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
						</span>
					</label>
				</th>
				<td>
					<textarea id="wpnt_text_cont" class="wpnt-options" name="wpnt_text_cont"><?php echo stripslashes( $args['wpnt_text_cont'] ); ?></textarea>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Font size', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose the font size for content text.</span>
						</span>
					</label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="50">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_text_size" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_size']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Font color', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose the font color for content text.</span>
						</span>
					</label>
				</th>
				<td>
					<input id="wpnt_text_color" class="wpnt-options color-picker" type="text" name="wpnt_text_color" value="<?php echo $args['wpnt_text_color']; ?>"/>
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
					<select id="wpnt_text_weight" class="wpnt-options">
						<option value="">Select</option>
						<option value="lighter" <?php echo ($args['wpnt_text_weight'] == 'lighter') ? 'selected' : ''; ?>>Lighter</option>
						<option value="normal" <?php echo ($args['wpnt_text_weight'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
						<option value="bold" <?php echo ($args['wpnt_text_weight'] == 'bold') ? 'selected' : ''; ?>>Bold</option>
						<option value="bolder" <?php echo ($args['wpnt_text_weight'] == 'bolder') ? 'selected' : ''; ?>>Bolder</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Font style', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose font style for content text.</span>
						</span>
					</label>
				</th>
				<td>				
					<select id="wpnt_text_style" class="wpnt-options">
						<option value="">Select</option>
						<option value="italic" <?php echo ($args['wpnt_text_style'] == 'italic') ? 'selected' : ''; ?>>Italic</option>
						<option value="normal" <?php echo ($args['wpnt_text_style'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Text align', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Align the text (default: left)</span>
						</span>
					</label>
				</th>
				<td>
					<select id="wpnt_text_align" class="wpnt-options">
						<option value="">Select</option>
						<option value="left" <?php echo ($args['wpnt_text_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
						<option value="center" <?php echo ($args['wpnt_text_align'] == 'center') ? 'selected' : ''; ?>>Center</option>
						<option value="right" <?php echo ($args['wpnt_text_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
					</select>
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
					<select id="wpnt_text_transform" class="wpnt-options">
						<option value="">Select</option>
						<option value="none" <?php echo @($args['wpnt_text_transform'] == 'none') ? 'selected' : ''; ?>>None</option>
						<option value="uppercase" <?php echo @($args['wpnt_text_transform'] == 'uppercase') ? 'selected' : ''; ?>>Uppercase</option>
						<option value="lowercase" <?php echo @($args['wpnt_text_transform'] == 'lowercase') ? 'selected' : ''; ?>>Lowercase</option>
						<option value="capitalize" <?php echo @($args['wpnt_text_transform'] == 'capitalize') ? 'selected' : ''; ?>>Capitalize</option>
						<option value="initial" <?php echo @($args['wpnt_text_transform'] == 'initial') ? 'selected' : ''; ?>>Initial</option>
						<option value="inherit" <?php echo @($args['wpnt_text_transform'] == 'inherit') ? 'selected' : ''; ?>>Inherit</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Text decoration', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose text decoration for content text.</span>
						</span>
					</label>
				</th>
				<td>			
					<select id="wpnt_text_decoration" class="wpnt-options">
						<option value="">Select</option>
						<option value="none" <?php echo ($args['wpnt_text_decoration'] == 'none') ? 'selected' : ''; ?>>None</option>
						<option value="overline" <?php echo ($args['wpnt_text_decoration'] == 'overline') ? 'selected' : ''; ?>>Overline</option>
						<option value="underline" <?php echo ($args['wpnt_text_decoration'] == 'underline') ? 'selected' : ''; ?>>Underline</option>
						<option value="line-through" <?php echo ($args['wpnt_text_decoration'] == 'line-through') ? 'selected' : ''; ?>>Line Through</option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Letter spacing', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">
								<?php _e('', WPNT_TEXTDOMAIN); ?>
							</span>
						</span>
					</label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="10">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_text_letter_spacing" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo @$args['wpnt_text_letter_spacing']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Word spacing', WPNT_TEXTDOMAIN); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">
								<?php _e('', WPNT_TEXTDOMAIN); ?>
							</span>
						</span>
					</label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="10">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_text_word_spacing" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo @$args['wpnt_text_word_spacing']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Line height'); ?>
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Choose line height for content text.</span>
						</span>
					</label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="50">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_text_line_height" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_line_height']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							Padding 
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Adjust padding of button. It has 4 values are top, right, bottom, left.</span>
						</span>
					</label>
				</th>
				<td>
					<fieldset>
						<label>Top</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_padding_top" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_padding_top']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Right</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_padding_right" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_padding_right']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Bottom</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_padding_bottom" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_padding_bottom']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Left</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_padding_left" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_padding_left']; ?>">
						<span class="wpnt-text-small">px</span>
					</div>
					</fieldset>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							Margin 
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">Adjust margin of button. It has 4 values are top, right, bottom, left.</span>
						</span>
					</label>
				</th>
				<td>
					<fieldset>
						<label>Top</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_margin_top" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_margin_top']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Right</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_margin_right" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_margin_right']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Bottom</label>
						<div id="slider" class="wpnt-slider" data-range="100">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_margin_bottom" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_margin_bottom']; ?>">
						<span class="wpnt-text-small">px</span>
						<br/>
						<label>Left</label>
						<div id="slider" class="wpnt-slider" data-range="1000">
							<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
						</div>
						<input type="text" id="wpnt_text_margin_left" class="wpnt-options wpnt-slider-target small-field target-input" value="<?php echo $args['wpnt_text_margin_left']; ?>">
						<span class="wpnt-text-small">px</span>
					</div>
				</fieldset>
				</td>
			</tr>

		</tbody>
	</table>
</div>