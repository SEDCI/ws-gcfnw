	<div class="overview">
		<div class="col-sm-12">
			<h1>Overview</h1>
			<hr />
			<div class="row info-rows">
				<div class="col-sm-3">
					<div class="ov-box">
						<div class="ov-box-icon ov-box-red"><span class="glyphicon glyphicon-user"></span></div>
						<div class="ov-box-info">
							<div class="ov-box-content">
								<div class="ov-box-data"><?php echo $members_count; ?></div>
								<div class="ov-box-label">Members</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="ov-box">
						<div class="ov-box-icon ov-box-red"><span class="glyphicon glyphicon-list-alt"></span></div>
						<div class="ov-box-info">
							<div class="ov-box-content">
								<div class="ov-box-data"><?php echo $applicants_count; ?></div>
								<div class="ov-box-label">Applicants</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="ov-box">
						<div class="ov-box-icon ov-box-red"><span class="glyphicon glyphicon-globe"></span></div>
						<div class="ov-box-info">
							<div class="ov-box-content">
								<div class="ov-box-data"><?php echo $total_visits; ?></div>
								<div class="ov-box-label">Total Site Visits</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="ov-box">
						<div class="ov-box-icon ov-box-red"><span class="glyphicon glyphicon-globe"></span></div>
						<div class="ov-box-info">
							<div class="ov-box-content">
								<div class="ov-box-data"><?php echo $today_visits; ?></div>
								<div class="ov-box-label">Today's Site Visits</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row info-rows">
				<div class="col-sm-6 shortcuts">
					<div class="panel panel-default">
						<div class="panel-heading">
							Shortcuts
						</div>
						<div class="panel-body">
							<div class="row info-rows text-center">
								<div class="col-sm-4">
									<a class="btn btn-default" href="<?php echo base_url('admin/pages/events'); ?>">
										<div class="glyphicon glyphicon-calendar"></div>
										<br>
										Events
									</a>
								</div>
								<div class="col-sm-4">
									<a class="btn btn-default" href="<?php echo base_url('admin/pages/weeklymessage'); ?>">
										<div class="glyphicon glyphicon-bullhorn"></div>
										<br>
										Weekly Message
									</a>
								</div>
								<div class="col-sm-4">
									<a class="btn btn-default" href="<?php echo base_url('admin/pages/gallery'); ?>">
										<div class="glyphicon glyphicon-picture"></div>
										<br>
										Gallery
									</a>
								</div>
							</div>
							<div class="row info-rows text-center">
								<div class="col-sm-4">
									<a class="btn btn-default" href="<?php echo base_url('admin/members'); ?>">
										<div class="glyphicon glyphicon-user"></div>
										<br>
										Members
									</a>
								</div>
								<div class="col-sm-4">
									<a class="btn btn-default" href="<?php echo base_url('admin/applications'); ?>">
										<div class="glyphicon glyphicon-list-alt"></div>
										<br>
										Applicants
									</a>
								</div>
								<div class="col-sm-4">
									<a class="btn btn-default" href="<?php echo base_url('admin/users'); ?>">
										<div class="glyphicon glyphicon-lock"></div>
										<br>
										Accounts
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Monthly Site Visits
						</div>
						<div class="panel-body">
							<canvas id="monthlyvisits"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('js/Chart.bundle.min.js'); ?>"></script>
	<script type="text/javascript">
		var months = <?php echo "['".implode("', '", $monthly_visits['months'])."']"; ?>;
		var counts = <?php echo "['".implode("', '", $monthly_visits['counts'])."']"; ?>;
	</script>
	<script type="text/javascript" src="<?php echo base_url('js/dashboard.js'); ?>"></script>
