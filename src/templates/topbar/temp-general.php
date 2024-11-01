<div class="wpnt-tab-inner">
	<table class="form-table wpnt-table">
		<tbody>
			<tr>
				<th scope="row">
					<label>
					<span class="pre-label">
					<?php _e('Display on', WPNT_TEXTDOMAIN); ?>
					<i class="fa fa-question-circle wpnt-icon-cursor"></i>
					<span class="tooltip-bar">
					<?php _e('Where the topbar is displayed in frontpage.', WPNT_TEXTDOMAIN); ?>
					</span>
					</span>
					</label>
				</th>
				<td>
					<label class="switch">
					<input data-place="none" data-type="slplace" type="checkbox" id="wpnt_place_none" class="wpnt-options" value="" <?php @checked($args['wpnt_place'][0]['value'], 'on'); ?>/>
					<div class="slider"></div>
					</label>
					<span class="wpnt-text-small">Disable</span>
					<div class="wpnt-padding-5"></div>
					<label class="switch">
					<input data-place="all" data-type="slplace" type="checkbox" id="wpnt_place_everywhere" class="wpnt-options" value="" <?php @checked($args['wpnt_place'][1]['value'], 'on'); ?>/>
					<div class="slider"></div>
					</label>
					<span class="wpnt-text-small">Everywhere</span>

					<p>Post Types</p>
					<?php 
					$postData = @$args['wpnt_place'][2]['value'];
					?>
					<select data-place="cpt" data-type="slplace" id="wpnt_place_post" class="wpnt-options multipleSelect" multiple>
						<option value="all" <?php echo (@in_array('all', $postData)) ? 'selected' : ''; ?>>All post type</option>
						<option value="post" <?php echo (@in_array('post', $postData)) ? 'selected' : ''; ?>>post</option>
						<?php 
						$cptTypes = get_post_types(array('_builtin' => false));
						if (!empty($cptTypes)) {
							foreach ($cptTypes as $key => $cpt) {
								if (@in_array($cpt, $postData)) {
									$selected = 'selected';
								} else {
									$selected = '';
								}
								echo '<option value="' . $cpt . '" ' . $selected . '>' . $cpt . '</option>';
							}
						}
						?>
					</select>
					<?php 
					$pageData = @$args['wpnt_place'][3]['value'];
					?>
					<p>Page</p>
					<select data-place="page" data-type="slplace" id="wpnt_place_page" class="wpnt-options multipleSelect" multiple>
						<option value="all" <?php echo (@in_array('all', $pageData)) ? 'selected' : ''; ?>>All Page</option>
						<option value="front" <?php echo (@in_array('front', $pageData)) ? 'selected' : ''; ?>>Front Page</option>
						<?php
						$pages = get_pages(); 
						if (!empty($pages)) {
							foreach ($pages as $page) {
								if (@in_array($page->ID, $pageData)) {
									$selected = 'selected';
								} else {
									$selected = '';
								}
								echo '<option value="' . $page->ID . '" ' . $selected . '>' . $page->post_title . '</option>';
							}
						}
						?>
					</select>

					<?php 
					$cateData = @$args['wpnt_place'][4]['value'];
					?>
					<p>Category</p>
					<select data-place="cate" data-type="slplace" id="wpnt_place_cate" class="wpnt-options multipleSelect" multiple>
						<option value="all" <?php echo (@in_array('all', $cateData)) ? 'selected' : ''; ?>>All Categories</option>
						<?php
						$cates = get_categories(array(
							'hide_empty' => false,
							'exclude' => 1
						));
						if (!empty($cates)) {
							foreach ($cates as $cate) {
								if (@in_array($cate->term_id, $cateData)) {
									$selected = 'selected';
								} else {
									$selected = '';
								}
								echo '<option value="' . $cate->term_id . '" ' . $selected . '>' . $cate->name . '</option>';
							}
						}
						?>
					</select>

					<?php
					$taxData = @$args['wpnt_place'][5]['value'];
					$taxonomies = get_taxonomies(array(
						'public'   => true,
						'_builtin' => false
					));

					if (!empty($taxonomies)) {
						foreach ($taxonomies as $key => $tax) {
							$terms = get_terms(
								array(
									'taxonomy' => $tax,
									'hide_empty' => false
								)
							);
							if (!empty($terms)) {
								?>
								<p><?php echo $tax; ?></p>
								<select data-place="tax" data-type="slplace" id="wpnt_place_tax" class="wpnt-options multipleSelect" multiple>
									<option value="all" <?php echo (@in_array('all', $cateData)) ? 'selected' : ''; ?>>All <?php echo $tax; ?></option>
								<?php
								foreach ($terms as $term) {
									if (@in_array($cate->term_id, $cateData)) {
										$selected = 'selected';
									} else {
										$selected = '';
									}
									?>
									<option value="<?php echo $term->term_id; ?>" <?php echo $selected; ?>><?php echo $term->name; ?></option>
									<?php
								}
								?>
								</select>
								<?php
							}
						}
					}
					?>
				</td>
			</tr>
			
			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							Components
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
						</span>
					</label>
				</th>
				<td>
					<h4><?php _e('Select Component Box', WPNT_TEXTDOMAIN); ?></h4>
					<div class="components-box">
						<?php if (strpos($args['wpnt_topbar_content'], 'logo') == false) : ?>
						<div id="topbar_logo" class="topbar-component">
						<?php _e('Logo', WPNT_TEXTDOMAIN); ?>
						</div>
						<?php endif; ?>
						<?php if (strpos($args['wpnt_topbar_content'], 'text') == false) : ?>
						<div id="topbar_text" class="topbar-component">Text</div>
						<?php endif; ?>
						<?php if (strpos($args['wpnt_topbar_content'], 'button') == false) : ?>
						<div id="topbar_button" class="topbar-component">Button</div>
						<?php endif; ?>
						<?php if (strpos($args['wpnt_topbar_content'], 'mailchimp') == false) : ?>
						<div id="topbar_mailchimp" class="topbar-component"><?php _e('Mailchimp', WPNT_TEXTDOMAIN); ?></div>
						<?php endif; ?>
					</div>
					<p>
						<span class="wpnt-text-small">
							<?php 
								_e('Drag and Drop the components into Component box below to setup component for topbar.', WPNT_TEXTDOMAIN);
							?>
						</span>
					</p>
					<h4>
					<?php _e('Topbar Component Box', WPNT_TEXTDOMAIN); ?>
					</h4>
					<?php
					$order = array(); 
					if (strpos($args['wpnt_topbar_content'], 'logo') != false) {
						$order[strpos($args['wpnt_topbar_content'], 'logo')] = 'Logo';
					}
					if (strpos($args['wpnt_topbar_content'], 'text') != false) {
						$order[strpos($args['wpnt_topbar_content'], 'text')] = 'Text';
					}
					if (strpos($args['wpnt_topbar_content'], 'button') != false) {
						$order[strpos($args['wpnt_topbar_content'], 'button')] = 'Button';
					}
					if (strpos($args['wpnt_topbar_content'], 'mailchimp') != false) {
						$order[strpos($args['wpnt_topbar_content'], 'mailchimp')] = 'Mailchimp';
					}
					ksort($order);
					?>
					<div data-type="cpn" class="wpnt-options topbar-box">
					<?php if (!empty($order)) : ?>
						<?php foreach ($order as $key => $label) : ?>
							<div id="topbar_<?php echo strtolower($label); ?>" class="topbar-component button">
							<?php _e($label, WPNT_TEXTDOMAIN); ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					</div>
					<p>
					<span class="wpnt-text-small">
					<?php 
					_e('To remove a component, just drag it back select box. You can drag to sort the components as well.', WPNT_TEXTDOMAIN);
					?>
					</span>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
						<?php _e('Position', WPNT_TEXTDOMAIN); ?> 
						<i class="fa fa-question-circle wpnt-icon-cursor"></i>
						<span class="tooltip-bar">
						<?php _e('The Topbar is displayed on the top or bottom in the page.', WPNT_TEXTDOMAIN); ?>
						</span>
						</span>
					</label>
				</th>
				<td>
					<select id="wpnt_position" class="wpnt-options">
						<option value="fixed" <?php echo ($args['wpnt_position'] == 'fixed') ? 'selected' : ''; ?>>
							<?php _e('Fixed', WPNT_TEXTDOMAIN); ?>
						</option>
						<option value="absolute" <?php echo ($args['wpnt_position'] == 'absolute') ? 'selected' : ''; ?>>
							<?php _e('Absolute', WPNT_TEXTDOMAIN); ?>
						</option>
					</select>
					<p>
					<span class="wpnt-text-small">
					<?php 
					_e('Absolute doesn\'t work with Animation mode', WPNT_TEXTDOMAIN);
					?>
					</span>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label>
						<span class="pre-label">
							<?php _e('Locate', WPNT_TEXTDOMAIN);?> 
							<i class="fa fa-question-circle wpnt-icon-cursor"></i>
							<span class="tooltip-bar">
							<?php _e('Fixed or absolute the top bar\'s position', WPNT_TEXTDOMAIN); ?>
							</span>
							</span>
					</label>
				</th>
				<td>
					<select id="wpnt_locate" class="wpnt-options">
						<option value="">Select</option>
						<option value="top" <?php echo ($args['wpnt_locate'] == 'top') ? 'selected' : ''; ?>>Top</option>
						<option value="bottom" <?php echo ($args['wpnt_locate'] == 'bottom') ? 'selected' : ''; ?>>Bottom</option>
					</select>
				</td>
			</tr>
					
			<tr>
				<th scope="row">
					<label><span class="pre-label">Width <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">The Width of topbar. Default is full width (100%).</span></span></label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="100">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_width" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_width']; ?>">
					<span class="wpnt-text-small">%</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label><span class="pre-label">Height <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">The Height of Topbar (px)</span></span></label>
				</th>
				<td>
					<div id="slider" class="wpnt-slider" data-range="300">
						<div id="custom-handle" class="wpnt-slider-handle ui-slider-handle"></div>
					</div>
					<input type="text" id="wpnt_height" class="wpnt-options wpnt-slider-target small-field" value="<?php echo $args['wpnt_height']; ?>">
					<span class="wpnt-text-small">px</span>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<span class="pre-label">Background color <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Choose background color for topbar. You may pick from table color or enter color code.</span></span>
				</th>
				<td>
					<input type="text" id="wpnt_bg_color" class="wpnt-options color-picker" value="<?php echo $args['wpnt_bg_color']; ?>">
				</td>
			</tr>

			<tr>
				<th scope="row">
					<span class="pre-label">Background gradient <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Choose background color for topbar. You may pick from table color or enter color code.</span></span>
				</th>
				<td>
					<input type="text" id="wpnt_bg_gradient_first" class="wpnt-options color-picker" value="<?php echo $args['wpnt_bg_gradient_first']; ?>">
					<input type="text" id="wpnt_bg_gradient_last" class="wpnt-options color-picker" value="<?php echo $args['wpnt_bg_gradient_last']; ?>">
				</td>
			</tr>

			<tr>
				<th scope="row">
					<span class="pre-label">Background image <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">Upload your image to make background for topbar.</span></span>
				</th>
				<td>
					<label>
						<input type="text" id="wpnt_bg_img" class="wpnt-options" value="<?php echo $args['wpnt_bg_img']; ?>">
						<i id="wpnt_upload_bg" class="fa fa-upload wpnt-icon"></i>
						<i id="wpnt_remove_bg" style="display:none;" class="fa fa-times"></i>
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<span class="pre-label">Background Repeat <i class="fa fa-question-circle wpnt-icon-cursor"></i><span class="tooltip-bar">This option has effect if Background image is set..</span></span>
				</th>
				<td>
					<select id="wpnt_bg_repeat" class="wpnt-options">
						<option value="">Select</option>
						<option value="no-repeat" <?php @selected($args['wpnt_bg_repeat'], 'no-repeat'); ?>>no-repeat</option>
						<option value="repeat" <?php @selected($args['wpnt_bg_repeat'], 'repeat'); ?>>repeat</option>
						<option value="repeat-x" <?php @selected($args['wpnt_bg_repeat'], 'repeat-x'); ?>>repeat-x</option>
						<option value="repeat-y" <?php @selected($args['wpnt_bg_repeat'], 'repeat-y'); ?>>repeat-y</option>
						<option value="round" <?php @selected($args['wpnt_bg_repeat'], 'round'); ?>>round</option>
						<option value="inherit" <?php @selected($args['wpnt_bg_repeat'], 'inherit'); ?>>inherit</option>
						<option value="initial" <?php @selected($args['wpnt_bg_repeat'], 'initial'); ?>>initial</option>
					</select>
				</td>
			</tr>

		</tbody>
	</table>
</div>