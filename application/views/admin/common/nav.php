	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>"><img src="<?php echo base_url('img/logo.png'); ?>" /></a>
			</div>
			<div class="collapse navbar-collapse" id="top-navbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard <span class="sr-only">(current)</span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('admin/pages/info'); ?>">Website</a></li>
							<li><a href="<?php echo base_url('admin/members'); ?>">Members</a></li>
							<li><a href="<?php echo base_url('admin/users'); ?>">Accounts</a></li>
							<!--<li role="separator" class="divider"></li>
							<li><a href="#">Settings</a></li>-->
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('adminuser'); ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<!--<li><a href="#">Profile</a></li>
							<li><a href="#">Settings</a></li>
							<li role="separator" class="divider"></li>-->
							<li><a href="<?php echo base_url('admin/changepassword'); ?>">Change Password</a></li>
							<li><a href="<?php echo base_url('admin/logout'); ?>">Log out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
