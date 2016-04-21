    <div class="adminbody">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-success" href="<?php echo base_url('admin/pages/gallery/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Album</a>
                    </div>
                </div>
            </div>
            <hr />
<?php echo $gallerymsg; ?>
            <div class="row">
<?php
$ctr = 1;
if ($albums_count > 0):
foreach ($albums as $album):
?>
                <div class="col-lg-3 col-sm-6 info-rows">
                    <div class="album">
                        <a href="<?php echo base_url('admin/pages/gallery/view/'.$album['album_code']); ?>">
                            <img class="img-thumbnail" src="<?php echo base_url(GALLERY_PATH.$album['album_code'].'/thumb'.$album['album_cover']); ?>" width="100%">
                            <div><?php echo $album['title']; ?></div>
                        </a>
                        <div><?php echo $album['total_photos']; ?> Photos</div>
                        <div>Created: <?php echo $album['date_added']; ?></div>
                        <div>By: <?php echo $album['added_by']; ?></div>
                    </div>
                </div>
<?php
if ($ctr == $albumsperline) {
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
                    <h2 class="text-danger">No albums found.</h2>
                </div>
<?php endif; ?>
            </div>
        </div>
    </div>
