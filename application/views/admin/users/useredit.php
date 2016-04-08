    <div class="adminbody">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <a class="btn btn-default" title="Back to List" href="<?php echo base_url('admin/users'); ?>"><< Back to List</a>
                </div>
            </div>
            <hr />
            <?php echo form_open('admin/users/edit/'.$id); ?>
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div><label>Email:</label></div>
                            <div><?php echo $user['email']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div><label>Name:</label></div>
                            <div><?php echo $user['last_name'].', '.$user['first_name'].' '.$user['middle_name']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ulvl">Membership Level:</label> <?php echo form_error('ulvl', '<span class="form-error">- ', '</span>'); ?>
                            <?php echo form_dropdown('ulvl', array('1' => 'Pastor', '2' => 'Member'), $user['level'], 'id="ulvl" class="form-control"'); ?>
                        </div>
                    </div>
                </div>
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Active:</label>&nbsp; <?php echo form_error('ustat', '<span class="form-error">- ', '</span>'); ?>
                            <input type="checkbox" id="ustat" name="ustat" value="A" <?php echo ($user['status'] == 'A') ? 'checked' : ''; ?> />
                        </div>
                    </div>
                </div>
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
