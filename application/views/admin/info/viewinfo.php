    <div class="adminbody info">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-warning" href="<?php echo base_url('admin/pages/info/edit'); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-12">
                    <h3>HOME PAGE</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4>TITLE</h4>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Text:</label></div>
                    <div><?php echo $info['title_bar']; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4>HEADER TEXT</h4>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Header Text 1:</label></div>
                    <div><?php echo $info['header_text1']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Header Text 2:</label></div>
                    <div><?php echo $info['header_text2']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Header Sub-Text:</label></div>
                    <div><?php echo $info['header_subtext']; ?></div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-12">
                    <h4>MISSION AND VISION</h4>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Mission:</label></div>
                    <div><?php echo $info['mission']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Vision:</label></div>
                    <div><?php echo $info['vision']; ?></div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-12">
                    <h4>WORSHIP SERVICES</h4>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Header:</label></div>
                    <div><?php echo $info['worship_services']; ?></div>
                </div>
            </div>
<?php foreach ($worship_services as $wservice) : ?>
            <br />
            <div class="row">
                <div class="col-sm-12">
                    <label><?php echo $wservice['title']; ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div><label>Description:</label></div>
                    <div><?php echo $wservice['description']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Schedule:</label></div>
                    <div><?php echo $wservice['schedule']; ?></div>
                </div>
            </div>
<?php endforeach; ?>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <h3>ABOUT PAGE</h3>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Text:</label></div>
                    <div><?php echo $info['about']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Core Values:</label></div>
                    <div><?php echo $info['core_values']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Pastoral Team:</label></div>
                    <div><?php echo $info['pastoral_team']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Board of Elders:</label></div>
                    <div><?php echo $info['board_of_elders']; ?></div>
                </div>
            </div>
            <div class="row info-rows">
                <div class="col-sm-12">
                    <div><label>Board of Deacons:</label></div>
                    <div><?php echo $info['board_of_deacons']; ?></div>
                </div>
            </div>
        </div>
    </div>
