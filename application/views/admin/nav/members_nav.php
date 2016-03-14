	<div class="row no-rmargin">
		<div class="col-sm-2 nav-side">
			<ul class="nav nav-pills nav-stacked">
				<li<?php echo (isset($actlnk_members)) ? $actlnk_members : ''; ?>><a href="<?php echo base_url('admin/members'); ?>">Members</a></li>
				<li<?php echo (isset($actlnk_applications)) ? $actlnk_applications : ''; ?>><a href="<?php echo base_url('admin/applications'); ?>">Applications</a></li>
			</ul>
		</div>
	</div>
