    <div class="adminbody">
        <div class="col-sm-12 memberinfo">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-4 text-right main-btn">
                    <a class="btn btn-default" title="Back to List" href="<?php echo base_url('admin/pages/events'); ?>"><< Back to List</a>
                </div>
            </div>
            <hr />
<?php echo (!empty($pagemsg)) ? $pagemsg : ''; ?>
            <?php echo form_open_multipart('admin/pages/events/add'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="eventdate" class="control-label">Date:</label>
                            <input type="text" class="form-control datepicker" id="eventdate" name="eventdate" placeholder="Enter Event Date" value="<?php echo set_value('eventdate'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wmmessage" class="control-label">Message:</label>
                            <textarea class="form-control" id="wmmessage" name="wmmessage" placeholder="Enter Message"><?php echo set_value('wmmessage'); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Downloadable Presentations</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wmfileppt" class="control-label">Powerpoint:</label> <?php echo form_error('wmfileppt', '<span class="form-error">- ', '</span>'); ?>
                            <input type="file" id="wmfileppt" name="wmfileppt" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wmfileios" class="control-label">iOS:</label> <?php echo form_error('wmfileios', '<span class="form-error">- ', '</span>'); ?>
                            <input type="file" id="wmfileios" name="wmfileios" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wmfilepdf" class="control-label">PDF:</label> <?php echo form_error('wmfilepdf', '<span class="form-error">- ', '</span>'); ?>
                            <input type="file" id="wmfilepdf" name="wmfilepdf" />
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Save Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
