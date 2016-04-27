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
            <?php echo form_open_multipart('admin/pages/events/edit/'.$id); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="eventdate" class="control-label">Date:</label>
                            <input type="text" class="form-control datepicker2" id="eventdate" name="eventdate" placeholder="Enter Event Date" value="<?php echo set_value('eventdate', $event['event_date']); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="eventcontent" class="control-label">Content:</label>
                            <textarea class="form-control" id="eventcontent" name="eventcontent" placeholder="Enter Message"><?php echo set_value('eventcontent', $event['event_content']); ?></textarea>
                        </div>
                    </div>
                </div>
                <label class="control-label">Photo:</label> <?php echo (!empty($upload_error['eventphoto'])) ? $upload_error['eventphoto'] : ''; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
<?php if (!empty($event['event_photo'])): ?>
                            <p><button class="btn btn-sm btn-danger delephoto" type="button">Remove Photo</button></p>
                            <img src="<?php echo base_url(EVENTFILES_PATH.'p/'.$event['event_photo']); ?>" width="500">
<?php else: ?>
                            <h4 class="text-danger">No photo.</h2>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="eventphoto" class="control-label">Update Photo:</label>
                            <input type="file" id="eventphoto" name="eventphoto" />
                        </div>
                    </div>
                </div>
                <label class="control-label">Video:</label> <?php echo (!empty($upload_error['eventvideo'])) ? $upload_error['eventvideo'] : ''; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
<?php if (!empty($event['event_video'])): ?>
                            <p><button class="btn btn-sm btn-danger delevideo" type="button">Remove Video</button></p>
                            <video width="500" controls>
                                <source src="<?php echo base_url(EVENTFILES_PATH.'v/'.$event['event_video']); ?>" type="video/mp4">
                                <source src="<?php echo base_url(EVENTFILES_PATH.'v/'.$event['event_video']); ?>" type="video/ogg">
                            </video>
<?php else: ?>
                            <h4 class="text-danger">No video.</h2>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="eventvideo" class="control-label">Update Video:</label>
                            <input type="file" id="eventvideo" name="eventvideo" />
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
