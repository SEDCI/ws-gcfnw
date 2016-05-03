    <div class="adminbody">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?php echo $title; ?></h1>
                </div>
            </div>
            <hr />
            <?php echo $adminmsg; ?>
            <?php echo form_open('admin/changepassword'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="opass" class="control-label">Current Password:</label>
                            <input type="password" class="form-control" id="opass" name="opass">
                        </div>
                        <div class="form-group">
                            <label for="npass" class="control-label">New Password:</label>
                            <input type="password" class="form-control" id="npass" name="npass">
                        </div>
                        <div class="form-group">
                            <label for="cpass" class="control-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpass" name="cpass">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
