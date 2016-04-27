    <div class="adminbody">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-4 text-right main-btn">
                    <a class="btn btn-default" title="Back to List" href="<?php echo base_url('admin/pages/events'); ?>"><< Back to List</a> <a class="btn btn-warning" title="Edit Event" href="<?php echo base_url('admin/pages/events/edit/'.$id); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <button class="btn btn-danger delevent" title="Delete Event"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                </div>
            </div>
            <hr />
<?php echo (!empty($pagemsg)) ? $pagemsg : ''; ?>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <label>Date:</label>
                    <div><?php echo $event['event_date']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <label for="eventcontent" class="control-label">Content:</label>
                    <div><?php echo $event['event_content']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Photo:</label>
                        <div>
<?php if (!empty($event['event_photo'])): ?>
                            <img src="<?php echo base_url(EVENTFILES_PATH.'p/'.$event['event_photo']); ?>" width="500">
<?php else: ?>
                            <h4 class="text-danger">No photo.</h2>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Video:</label>
                        <div>
<?php if (!empty($event['event_video'])): ?>
                            <video width="500" controls>
                                <source src="<?php echo base_url(EVENTFILES_PATH.'v/'.$event['event_video']); ?>" type="video/mp4">
                                <source src="<?php echo base_url(EVENTFILES_PATH.'v/'.$event['event_video']); ?>" type="video/ogg">
                            </video>
<?php else: ?>
                            <h4 class="text-danger">No video.</h4>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
