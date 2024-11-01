<div id="wpnt_sidebar" class="wpnt-sidebar">
	<div class="wpnt-inner">
		<div class="wpnt-widget wpnt-widget-color-green">
			<i class="wpnt-subscribe"></i>
			<p>
				<?php 
				_e('Subscribe us to get more the information and updating', WPNT_TEXTDOMAIN);
				?>
			</p>
			<form class="newletter-subscribe-form" action="<?php echo $args->subscribe()['url']; ?>/subscribe/post-json?u=<?php echo $args->subscribe()['u']; ?>&id=<?php echo $args->subscribe()['id']; ?>&c=?" method="GET">
				<input type="hidden" name="u" value="<?php echo $args->subscribe()['u']; ?>">
				<input type="hidden" name="id" value="<?php echo $args->subscribe()['id']; ?>">
				<input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="">
				<input type="hidden" name="b_<?php echo $args->subscribe()['u']; ?>_<?php echo $args->subscribe()['id']; ?>" tabindex="-1" value="">
				<input type="submit" class="wpnt-btn btn-subscribe" name="submit" value="Subscribe">
			</form>
			<br/>
			<img id="processing_img" style="display: none;width:50px;margin:0 auto;" src="<?php echo WPNT_PLUGIN_URL . 'assets/images/loading.gif'; ?>" alt="" />
			<div class="wpnt-notification"></div>
		</div>
		<div class="wpnt-widget wpnt-widget-color-green">
			<i class="wpnt-vote"></i>
			<p>If you like <b>WP Nice Topbar</b> please leave us a <a class="star" target="_blank" href="https://wordpress.org/support/plugin/wp-nice-topbar/reviews/#postform">★★★★★</a> rating. A huge thanks in advance!</p>
		</div>
	</div>
</div>
