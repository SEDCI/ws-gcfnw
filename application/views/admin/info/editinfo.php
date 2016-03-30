    <div class="adminbody info">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-7">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-5 text-right main-btn">
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo base_url('admin/pages/info'); ?>">Cancel</a>
                    </div>
                </div>
            </div>
            <hr />
            <?php echo form_open('admin/pages/info/edit'); ?>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="titletxt" class="control-label">Text:</label> <?php echo form_error('titletxt', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="titletxt" name="titletxt" placeholder="Enter Text" value="<?php echo set_value('titletxt', $info['title_bar']); ?>" />
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>HEADER TEXT</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="hdrtxt1" class="control-label">Header Text 1:</label> <?php echo form_error('hdrtxt1', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="hdrtxt1" name="hdrtxt1" placeholder="Enter Header Text 1" value="<?php echo set_value('hdrtxt1', $info['header_text1']); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="hdrtxt2" class="control-label">Header Text 2:</label> <?php echo form_error('hdrtxt2', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="hdrtxt2" name="hdrtxt2" placeholder="Enter Header Text 2" value="<?php echo set_value('hdrtxt2', $info['header_text2']); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="hdrsubtxt" class="control-label">Header Sub-Text:</label> <?php echo form_error('hdrsubtxt', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="hdrsubtxt" name="hdrsubtxt" placeholder="Enter Header Sub-Text" value="<?php echo set_value('hdrsubtxt', $info['header_subtext']); ?>" />
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-12">
                        <h4>MISSION AND VISION</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="mssn" class="control-label">Mission:</label> <?php echo form_error('mssn', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="mssn" name="mssn" placeholder="Enter Mission" value="<?php echo set_value('mssn', $info['mission']); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="vsn" class="control-label">Vision:</label> <?php echo form_error('vsn', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="vsn" name="vsn" placeholder="Enter Vision" value="<?php echo set_value('vsn', $info['vision']); ?>" />
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-12">
                        <h4>WORSHIP SERVICES</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wsheader" class="control-label">Header:</label> <?php echo form_error('wsheader', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="wsheader" name="wsheader" placeholder="Enter Header"><?php echo set_value('wsheader', $info['worship_services']); ?></textarea>
                        </div>
                    </div>
                </div>
<?php
$s = 0;
foreach ($worship_services as $wservice) :
?>
                <br />
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label"><?php echo $wservice['title']; ?></label>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wsdescription<?php echo $s; ?>" class="control-label">Description:</label> <?php echo form_error('wsdescription['.$s.']', '<span class="form-error">- ', '</span>'); ?>
                            <input type="text" class="form-control" id="wsdescription<?php echo $s; ?>" name="wsdescription[]" placeholder="Enter Description" value="<?php echo set_value('wsdescription['.$s.']', $wservice['description']); ?>" />
                            <input type="hidden" id="wsid<?php echo $s; ?>" name="wsid[]" value="<?php echo $wservice['id']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wsschedule<?php echo $s; ?>" class="control-label">Schedule:</label> <?php echo form_error('wsschedule['.$s.']', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="wsschedule<?php echo $s; ?>" name="wsschedule[]" placeholder="Enter Schedule"><?php echo set_value('wsschedule['.$s.']', str_replace('<br>', "\r\n", $wservice['schedule'])); ?></textarea>
                        </div>
                    </div>
                </div>
<?php
$s++;
endforeach;
?>
                <hr />
                <div class="row">
                    <div class="col-sm-12">
                        <h3>ABOUT PAGE</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="abouttxt" class="control-label">Text:</label> <?php echo form_error('abouttxt', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="abouttxt" name="abouttxt" placeholder="Enter Text"><?php echo set_value('abouttxt', str_replace('<br>', "\r\n", $info['about'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="corevalues" class="control-label">Core Values:</label> <?php echo form_error('corevalues', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="corevalues" name="corevalues" placeholder="Enter Core Values"><?php echo set_value('corevalues', str_replace('<br>', "\r\n", $info['core_values'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="pastoral" class="control-label">Pastoral Team:</label> <?php echo form_error('pastoral', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="pastoral" name="pastoral" placeholder="Enter Pastoral Team"><?php echo set_value('pastoral', str_replace('<br>', "\r\n", $info['pastoral_team'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="elders" class="control-label">Board of Elders:</label> <?php echo form_error('elders', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="elders" name="elders" placeholder="Enter Board of Elders"><?php echo set_value('elders', str_replace('<br>', "\r\n", $info['board_of_elders'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="deacons" class="control-label">Board of Deacons:</label> <?php echo form_error('deacons', '<span class="form-error">- ', '</span>'); ?>
                            <textarea class="form-control" id="deacons" name="deacons" placeholder="Enter Board of Deacons"><?php echo set_value('deacons', str_replace('<br>', "\r\n", $info['board_of_deacons'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
