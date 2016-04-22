    <div class="adminbody">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo base_url('admin/users'); ?>">&laquo; Back to List</a> <a class="btn btn-warning" href="<?php echo base_url('admin/users/edit/'.$user['id']); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Email:</label></div>
                    <div><?php echo $user['email']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Name:</label></div>
                    <div><?php echo $user['last_name'].', '.$user['first_name'].' '.$user['middle_name']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Membership Level:</label></div>
                    <div><?php echo $user['level']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Status:</label></div>
                    <div><?php echo $user['status']; ?></div>
                </div>
            </div>
        </div>
    </div>
