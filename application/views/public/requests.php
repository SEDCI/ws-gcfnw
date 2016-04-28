

    <header>

        <div class="container">

            <div class="intro-text" style="padding-top: 100px; padding-bottom: 100px;">
                <h1>Prayer Requests</h1>
            </div>

        </div>

    </header>

    <!-- Requests Section -->

    <section id="requests" class="bg-light-gray">
            <div id="requestslist">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-2">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h5>Search</h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="efrom" class="control-label">From:</label>
                                    <input type="text" class="form-control datepicker2" id="efrom" placeholder="YYYY-MM-DD" value="<?php echo ($from != '') ? $from : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="eto" class="control-label">To:</label>
                                    <input type="text" class="form-control datepicker2" id="eto" placeholder="YYYY-MM-DD" value="<?php echo ($to != '') ? $to : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h5>Latest Requests</h5>
                            </div>
                            <ul class="list-group">
<?php
if (count($prequests) > 0):
foreach ($prequests as $prequest):
?>
                                <li class="list-group-item reqitem">
                                    <div class="reqmsg">"<?php echo $prequest['message']; ?>"</div>
                                    <div class="reqfrom">
                                        From: <a href="mailto:<?php echo $prequest['email_address']; ?>"><?php echo $prequest['first_name'].' '.$prequest['last_name']; ?></a>
                                        <br>
                                        <?php echo nice_date($prequest['date_added'], 'F j, Y h:i:s A'); ?>
                                    </div>
                                </li>
<?php
endforeach;
else:
?>
                                <li class="list-group-item reqitem">
                                    <h5>No latest requests.</h5>
                                </li>
<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>
