	<div class="row no-rmargin">
		<div class="col-sm-2 nav-side">
			<ul class="nav nav-pills nav-stacked">
				<li<?php echo (isset($actlnk_users)) ? $actlnk_users : ''; ?>><a href="<?php echo base_url('admin/users'); ?>">Users</a></li>
				<!--li<?php echo (isset($actlnk_admin)) ? $actlnk_admin : ''; ?>><a href="<?php echo base_url('#'); ?>">Administrators</a></li>-->
			</ul>
		</div>
	</div>
