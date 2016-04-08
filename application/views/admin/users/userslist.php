	<div class="adminbody">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-8">
					<h1><?php echo $title; ?></h1>
				</div>
				<!--<div class="col-sm-4 text-right main-btn">
					<a class="btn btn-success" title="Add User" href="<?php echo base_url('admin/users'); ?>"><span class="glyphicon glyphicon-plus"></span> Add User</a>
				</div>-->
			</div>
			<hr />
<?php echo $usermsg; ?>
			<div class="table-responsive">
			<table class="table table-collapse table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Email</th>
						<th>Name</th>
						<th>Level</th>
						<th>Status</th>
						<th class="actions">Action</th>
					</tr>
				</thead>
				<tbody>
<?php
if (!empty($userslist)):
$i = 1;
foreach ($userslist as $user):
?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $user['email']; ?></td>
						<td><?php echo $user['last_name'].', '.$user['first_name'].' '.$user['middle_name']; ?></td>
						<td><?php echo ($user['level'] == '1') ? 'Pastor' : 'Member'; ?></td>
						<td><?php echo ($user['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
						<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-eye-open" title="View Information" href="<?php echo base_url('admin/users/view/'.$user['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/users/edit/'.$user['id']); ?>"></a><!--<a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Deactivate" href="<?php echo base_url('admin/users/delete/'.$user['id']); ?>"></div>--></td>
					</tr>
<?php endforeach; endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
