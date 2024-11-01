<?php wpnt_load_template('temp-header'); ?>
<?php $data = $args->getTopbar(); ?>
	<div class="wpnt-content">
		<form action="<?php echo esc_attr($_SERVER['REQUEST_URI']) ?>" method="post">
			<input type="hidden" id="wpnt_topbar_label" class="wpnt-options" value="<?php echo $data['wpnt_topbar_label']; ?>" />
			<input type="hidden" id="wpnt_topbar_name" class="wpnt-options" value="<?php echo $data['wpnt_topbar_name']; ?>" />
			<div id="wpnt_body">
				<div class="saving-img" style="display: none;">
					<img src="<?php echo WPNT_PLUGIN_URL . 'assets/images/loading.gif'; ?>" alt="wpnt-topbar-icon" />
				</div>
				<div class="updated-box" style="display: none;">
					<img src="<?php echo WPNT_PLUGIN_URL . 'assets/images/Tick.png'; ?>" alt="wpnt-topbar-icon" />
				</div>
				<div id="wpnt_settings">
					<ul class="wpnt-tabs">
						<li class="wpnt-tab-active" id="#tabs-1"><span>General</span></li>
						<li id="#tabs-2"><span><?php _e('Text', WPNT_TEXTDOMAIN); ?></span></li>
						<li id="#tabs-3"><span><?php _e('Logo', WPNT_TEXTDOMAIN); ?></span></li>
						<li id="#tabs-4"><span><?php _e('Button', WPNT_TEXTDOMAIN); ?></span></li>
						<li id="#tabs-5"><span><?php _e('Subscribe', WPNT_TEXTDOMAIN); ?></span></li>
						<li id="#tabs-7"><span><?php _e('Animations', WPNT_TEXTDOMAIN); ?></span></li>
					</ul>
					<!-- end Tab title -->
					<div class="wpnt-panes">
						<div id="tabs-1" class="wpnt-pane wpnt-pane-active">
							<?php wpnt_load_template('topbar/temp-general', $data); ?>
						</div>
						<!-- End tab 1 -->
						<div id="tabs-2" class="wpnt-pane">
							<?php wpnt_load_template('topbar/temp-content', $data); ?>
						</div>
						<!-- end tab 2 -->
						<div id="tabs-3" class="wpnt-pane">
							<?php wpnt_load_template('topbar/temp-logo', $data); ?>
						</div>
						<!-- End tab 3 -->
						<div id="tabs-4" class="wpnt-pane">
							<?php wpnt_load_template('topbar/temp-button', $data); ?>
						</div>
						<!-- end tab 4 -->
						<div id="tabs-5" class="wpnt-pane">
							<?php wpnt_load_template('topbar/temp-subscribe', $data); ?>
						</div>
						<!-- end tab 5 -->
						<div id="tabs-7" class="wpnt-pane">
							<?php wpnt_load_template('topbar/temp-animation', $data); ?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="wpnt-after-content">
		<button id="wpnt_btn_save" class="wpnt-btn" type="button">
			<i class="fa fa-floppy-o wpnt-icon"></i>
			<?php _e('Update', WPNT_TEXTDOMAIN); ?>
		</button>
		<button id="wpnt_single_remove" class="wpnt-btn" type="button">
			<i class="fa fa-trash-o wpnt-icon"></i>
			<?php _e('Delete', WPNT_TEXTDOMAIN); ?>
		</button>
		<button id="wpnt_btn_reset" class="wpnt-btn" type="button">
			<i class="fa fa-refresh wpnt-icon"></i>
			<?php _e('Reset', WPNT_TEXTDOMAIN); ?>
		</button>
	</div>
</div>
<?php wpnt_load_template('temp-sidebar', $args); ?>
</div>