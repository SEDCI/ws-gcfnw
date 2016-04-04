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
            <div class="row">
<?php
$ctr = 1;
for ($g = 0; $g < 12; $g++):
?>
                <div class="col-lg-3 col-sm-6 info-rows">
                    <a href="<?php echo base_url('admin/pages/gallery/view/Rocky-Album-1'); ?>">
                    <img class="img-thumbnail" src="<?php echo base_url('img/gallery/Rocky-Album-1/hands.jpg'); ?>" width="100%">
                    <div>Album1</div>
                    </a>
                    <div>0 Photos</div>
                    <div>Created: September 30, 1999</div>
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
endfor;
?>
            </div>
        </div>
    </div>
