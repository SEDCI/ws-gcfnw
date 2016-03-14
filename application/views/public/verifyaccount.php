    <header>
        <div class="container">
            <div class="intro-text" style="padding-top: 100px; padding-bottom: 100px;">
                <h1>Verify Account</h1>
            </div>
        </div>
    </header>

    <section id="events" class="bg-light-gray" align="center" style="padding-top:50px">
        <div class="container">
            <div class="col-sm-4 col-sm-offset-4">
<?php echo $validation_errors; ?>
                <div class="well">
                    <?php echo form_open('verifyaccount/verify'); ?>
                        <input type="hidden" id="vkey" name="vkey" value="<?php echo $verification_key; ?>">
                        <div class="form-group">
                            <label>Set password for <?php echo $email; ?>:</label>
                        </div>
                        <div class="form-group">
                            <label for="nuserpass">New Password:</label>
                            <input type="password" class="form-control" id="nuserpass" name="nuserpass" />
                        </div>
                        <div class="form-group">
                            <label for="cnuserpass">Confirm New Password:</label>
                            <input type="password" class="form-control" id="cnuserpass" name="cnuserpass" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
