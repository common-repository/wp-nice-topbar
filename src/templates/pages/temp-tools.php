<?php wpnt_load_template('temp-header'); ?>
	<div class="wpnt-content wpnt-settings-section">
		<form action="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data">
			<div class="wpnt-hidden">
				<?php wp_nonce_field('wpnt_tools', '_wpntnonce'); ?>
			</div>
			<div id="wpnt_body">
				<div class="saving-img" style="display: none;">
					<img src="<?php echo WPNT_PLUGIN_URL . 'assets/images/loading.gif'; ?>" alt="wpnt-topbar-icon" />
				</div>
				<div class="updated-box" style="display: none;">
					<img src="<?php echo WPNT_PLUGIN_URL . 'assets/images/Tick.png'; ?>" alt="wpnt-topbar-icon" />
				</div>
				<div id="wpnt_settings">
					<div class="wpnt-vertical-tab">
						<ul class="">
							<li id="#tab-1" class="wpnt-tab-active"><?php _e('Export', WPNT_TEXTDOMAIN); ?></li>
							<li id="#tab-2"><?php _e('Import', WPNT_TEXTDOMAIN); ?></li>
						</ul>
						<div class="wpnt-panes">
							<div id="tab-1" class="wpnt-pane wpnt-pane-active">
								<div class="wpnt-tab-inner">
									<table class="form-table wpnt-table">
										<tr>
											<td>
												<?php _e('Select the Top bar', WPNT_TEXTDOMAIN); ?>
												<br/>
												<span class="wpnt-text-small">
													<?php _e('Select the top bar which you would like to export.', WPNT_TEXTDOMAIN); ?>
												</span>
											</td>
											<td>
											<?php if (!empty($args->getTopbars())) : ?>
												<select class="form-control" id="list_topbar" name="list-topbar">
												<?php 
													foreach ($args->getTopbars() as $topbar) {
														$barName = get_option($topbar->option_name);
														?>
														<option value="<?php echo $topbar->option_name; ?>"><?php echo $barName['wpnt_topbar_label']; ?></option>
														<?php
													}
												?>
												</select>
											<?php endif; ?>
												<button id="wpnt_btn_export" class="wpnt-btn wpnt-btn-small" name="wpnt-export">
													<?php _e('Export', WPNT_TEXTDOMAIN); ?>
												</button>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div id="tab-2" class="wpnt-pane">
								<div class="wpnt-tab-inner">
									<table class="form-table wpnt-table">
										<tr>
											<td>
												<?php _e('Select File', WPNT_TEXTDOMAIN); ?>
												<br/>
												<span class="wpnt-text-small">
													<?php _e('Select the Top Bar JSON file you would like to import.', WPNT_TEXTDOMAIN); ?>
												</span>
											</td>
											<td>
												<input type="file" name="wpnt-import-file">
												<button id="wpnt_btn_export" class="wpnt-btn wpnt-btn-small" name="wpnt-import">
													<?php _e('Import', WPNT_TEXTDOMAIN); ?>
												</button>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div><!-- End vertical tab -->
				</div>
			</div>
		</form>
	</div>
</div>
<?php wpnt_load_template('temp-sidebar', $args); ?>
</div>
