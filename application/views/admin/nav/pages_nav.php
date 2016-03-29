	<div class="row no-rmargin">
		<div class="col-sm-2 nav-side">
			<ul class="nav nav-pills nav-stacked">
				<li<?php echo (isset($actlnk_home)) ? $actlnk_home : ''; ?>><a href="<?php echo base_url('admin/pages/home'); ?>">Home Page</a></li>
				<li<?php echo (isset($actlnk_events)) ? $actlnk_events : ''; ?>><a href="<?php echo base_url('admin/pages/events'); ?>">Events</a></li>
				<li<?php echo (isset($actlnk_weekly)) ? $actlnk_weekly : ''; ?>><a href="<?php echo base_url('admin/pages/weeklymessage'); ?>">Weekly Message</a></li>
			</ul>
		</div>
	</div>
