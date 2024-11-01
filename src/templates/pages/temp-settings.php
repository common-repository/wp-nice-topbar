<?php wpnt_load_template('temp-header'); ?>
<?php $data = $args->getSettings(); ?>
	<div class="wpnt-content wpnt-settings-section">
		<form action="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" method="post">
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
							<li id="#tab-1" class="wpnt-tab-active"><?php _e('Subscribe', WPNT_TEXTDOMAIN); ?></li>
							<li id="#tab-2"><?php _e('CSS', WPNT_TEXTDOMAIN); ?></li>
							<li id="#tab-3"><?php _e('Devices', WPNT_TEXTDOMAIN); ?></li>
						</ul>
						<div class="wpnt-panes">
							<div id="tab-1" class="wpnt-pane wpnt-pane-active">
								<div class="wpnt-tab-inner">
									<div class="wpnt-alert"></div>
									<table class="form-table wpnt-table">
										<tr>
											<td><?php _e('Status', WPNT_TEXTDOMAIN); ?></td>
											<td>
											<?php if (@$data['wpnt_mailchimp_status'] == 'connect') : ?>
												<div class="wpnt-mc-label wpnt-connect"><?php _e('CONNECTED', WPNT_TEXTDOMAIN); ?></div>
											<?php else : ?>
												<div class="wpnt-mc-label"><?php _e('NOT CONNECTED', WPNT_TEXTDOMAIN); ?></div>
											<?php endif; ?>
											<input type="hidden" id="wpnt_mailchimp_status" class="wpnt-options" value="<?php echo @$data['wpnt_mailchimp_status']; ?>" />
											</td>
										</tr>
										<tr>
											<td><?php _e('Mailchimp key', WPNT_TEXTDOMAIN); ?></td>
											<td>
												<input type="text" id="wpnt_mailchimp_api" class="wpnt-options" value="<?php echo @$data['wpnt_mailchimp_api'] ?>">
												<button type="button" id="wpnt_btn_connect" class="wpnt-btn wpnt-btn-small">
													<i class="fa fa-refresh" aria-hidden="true"></i>
													<?php _e('Connect', WPNT_TEXTDOMAIN); ?>
												</button>
											</td>
										</tr>

										<?php if (@$data['wpnt_mailchimp_api'] != '') : ?>

										<?php
										$mailchimp = new WPNT\Core\Mailchimp(@$data['wpnt_mailchimp_api']);
										if (is_object($mailchimp)) {
											$lists = $mailchimp->getLists();
										}
										?>

										<tr>
											<td><?php _e('Mailchimp List', WPNT_TEXTDOMAIN); ?></td>
											<td>
											<?php

											?>
											<select id="wpnt_mailchimp_list" class="wpnt-options">
												<option value=""><?php _e('Select', WPNT_TEXTDOMAIN); ?></option>
												<?php if (!empty($lists)) : ?>
													<?php foreach ($lists['data'] as $list) : ?>
														<option value="<?php echo $list['id']; ?>" <?php selected($data['wpnt_mailchimp_list'], $list['id']); ?>><?php echo $list['name']; ?></option>
													<?php endforeach; ?>
												<?php endif; ?>
											</select>
											</td>
										</tr>
										<?php endif; ?>
									</table>
								</div>
							</div>
							<div id="tab-2" class="wpnt-pane">
								<div class="wpnt-tab-inner">
									<table class="form-table wpnt-table">
										<tr>
											<td><?php _e('Custom CSS', WPNT_TEXTDOMAIN); ?></td>
											<td>
												<textarea id="wpnt_css" class="wpnt-options"><?php echo @$data['wpnt_css']; ?></textarea>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div id="tab-3" class="wpnt-pane">
								<div class="wpnt-tab-inner">
									<table class="form-table wpnt-table">
										<tr>
											<td><?php _e('Mobile', WPNT_TEXTDOMAIN); ?></td>
											<td>
												<label class="switch">
												<input id="wpnt_mobile" data-type="checkbox" type="checkbox" name="wpnt_mobile" class="wpnt-options" value="" <?php @checked($data['wpnt_mobile'], 'on'); ?>/>
												<div class="slider"></div>
												</label>
											</td>
										</tr>
										<tr>
											<td><?php _e('Tablets', WPNT_TEXTDOMAIN); ?></td>
											<td>
												<label class="switch">
												<input id="wpnt_tablet" data-type="checkbox" type="checkbox" name="wpnt_tablet" class="wpnt-options" value="" <?php @checked($data['wpnt_tablet'], 'on'); ?>/>
												<div class="slider"></div>
												</label>
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
	<div class="wpnt-after-content">
		<button id="wpnt_btn_save_settings" class="wpnt-btn" type="button">
			<i class="fa fa-floppy-o wpnt-icon"></i>
			<?php _e('Save', WPNT_TEXTDOMAIN); ?>
		</button>
	</div>
</div>
<?php wpnt_load_template('temp-sidebar', $args); ?>
</div>
