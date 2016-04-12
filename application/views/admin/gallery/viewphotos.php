    <div class="adminbody gallery">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $album['title']; ?></h1>
                    <div><?php echo $album['description']; ?></div>
                    <div>Created: <?php echo nice_date($album['date_added'], 'F j, Y'); ?></div>
                    <div>By: <?php echo $album['added_by']; ?></div>
                    <div><?php echo $photos_count; ?> Photos</div>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo base_url('admin/pages/gallery'); ?>">&laquo; Back to Gallery</a>
                        <a class="btn btn-success addpic"><span class="glyphicon glyphicon-plus"></span> Add Photos</a>
                        <a class="btn btn-warning" href="<?php echo base_url('admin/pages/gallery/edit/'.$album['slug']); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/pages/gallery/delete/'.$album['slug']); ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                        <div id="fileupload">
                            <?php echo form_open_multipart('admin/pages/gallery/view/'.$album['slug'].'/upload', 'id="uploadform"'); ?>
                            <input type="file" id="albumpic" name="albumpic[]" multiple>
                            <button type="submit">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
<?php
$ctr = 1;
if ($photos_count > 0):
foreach ($photos as $photo):
?>
                <div class="col-lg-3 col-sm-6 info-rows">
                    <img class="img-thumbnail" src="<?php echo base_url('img/gallery/'.$album['slug'].'/'.$photo['filename']); ?>" width="100%">
                </div>
<?php
if ($ctr == $picsperline) {
$ctr = 1;
?>
            </div>
            <div class="row">
<?php
} else {
    $ctr++;
}
endforeach;
else:
?>
                <div class="col-sm-12 info-rows">
                    <h2 class="text-danger">No images found.</h2>
                </div>
<?php endif; ?>
            </div>
        </div>
    </div>
    <div class="modal" id="upload" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title">Uploading photos...</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"></div>
                            </div>
                            <div id="uploadmsg"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
