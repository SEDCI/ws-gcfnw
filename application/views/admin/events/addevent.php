    <div class="adminbody">
        <div class="col-sm-12">
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
                            <input type="text" class="form-control datepicker2" id="eventdate" name="eventdate" placeholder="Enter Event Date" value="<?php echo set_value('eventdate'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="eventcontent" class="control-label">Content:</label>
                            <textarea class="form-control" id="eventcontent" name="eventcontent" placeholder="Enter Message"><?php echo set_value('eventcontent'); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="eventphoto" class="control-label">Photo:</label> <?php echo (!empty($upload_error['eventphoto'])) ? $upload_error['eventphoto'] : ''; ?>
                            <input type="file" id="eventphoto" name="eventphoto" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="eventvideo" class="control-label">Video:</label> <?php echo (!empty($upload_error['eventvideo'])) ? $upload_error['eventvideo'] : ''; ?>
                            <input type="file" id="eventvideo" name="eventvideo" />
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Save Event</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
