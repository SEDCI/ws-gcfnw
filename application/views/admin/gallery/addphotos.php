    <div class="adminbody">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo base_url('admin/pages/gallery'); ?>">&laquo; Back to Gallery</a>
                    </div>
                </div>
            </div>
            <hr />
<?php echo $gallerymsg; ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php echo $</h2>
                </div>
            </div>
            <?php echo form_open('admin/pages/gallery/add'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="albumtitle" class="control-label">Title:</label> <?php echo form_error('albumtitle', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="albumtitle" name="albumtitle" placeholder="Enter Title" value="<?php echo set_value('albumtitle'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="albumdesc" class="control-label">Description:</label> <?php echo form_error('albumdesc', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="albumdesc" name="albumdesc" placeholder="Enter Description"><?php echo set_value('albumdesc'); ?></textarea>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-default" href="<?php echo base_url('admin/pages/gallery'); ?>">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
