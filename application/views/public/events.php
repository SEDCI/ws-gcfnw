

    <header>

        <div class="container">

            <div class="intro-text" style="padding-top: 100px; padding-bottom: 100px;">

            	

                    <h1>Events</h1>

                    <!--<h4>Lorem ipsum dolor sit amet consectetur.</h3>-->

            	<!--

                <div class="intro-lead-in">Make disciples of Jesus Christ in the Philippines and beyond.</div>

                <div class="intro-heading">Welcome to GCF</div>

                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>

                -->

            </div>

        </div>

    </header>

    <!-- Services Section

    <section id="home">

        <div class="container">

            <div class="row">

<div class="col-lg-12 text-center">

                    <h2 class="section-heading">Greenhills Christian Fellowship</h2>

                    <div id="halfleft"><iframe width="560" height="315" src="https://www.youtube.com/embed/D4qr3mnIJdc" frameborder="0" allowfullscreen></iframe></div>

                    <div id="halfright"><p>Hello friend, welcome to Greenhills Christian Fellowship. I don't think it's by coincidence or accident that you got here. Greenhills Christian Fellowship, or GCF as we fondly call it, is a community of faith passionate to see the grace of God transform lives, families, communities and culture. We're honestly striving to become the kind of church described in the Bible. There's Biblical preaching, heartfelt worship, constant prayer, and honest friendship</p></div><br/>

                </div>

                <div class="col-lg-12 text-center">

                <ul id="circle">

                	<li class="teens"><a href="#">Become a Member</a></li>

                    <li class="hands"><a href="#">Daily Devotion</a></li>

                    <li class="worship"><a href="#">Worship Services</a></li>

                </ul>

                </div>

            </div>

            <!--

            <div class="row text-center">

                <div class="col-md-4">

                    <span class="fa-stack fa-4x">

                        <i class="fa fa-circle fa-stack-2x text-primary"></i>

                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>

                    </span>

                    <h4 class="service-heading">E-Commerce</h4>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>

                </div>

                <div class="col-md-4">

                    <span class="fa-stack fa-4x">

                        <i class="fa fa-circle fa-stack-2x text-primary"></i>

                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>

                    </span>

                    <h4 class="service-heading">Responsive Design</h4>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>

                </div>

                <div class="col-md-4">

                    <span class="fa-stack fa-4x">

                        <i class="fa fa-circle fa-stack-2x text-primary"></i>

                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>

                    </span>

                    <h4 class="service-heading">Web Security</h4>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>

                </div>

            </div>\

        </div>

    </section>

 -->

    <!-- Portfolio Grid Section -->

    <section id="events" class="bg-light-gray">
            <div id="eventslist">
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
                                <h4>Upcoming Events</h4>
                            </div>
                            <ul class="list-group">
<?php
if (count($events) > 0):
foreach($events as $event):
?>
                                <li class="list-group-item eventitem">
                                    <h5><?php echo nice_date($event['event_date'], 'F j, Y'); ?></h5>
                                    <p><?php echo $event['event_content']; ?></p>
<?php if (!empty($event['event_photo'])): ?>
                                    <img src="<?php echo base_url(EVENTFILES_PATH.'p/'.$event['event_photo']); ?>" width="300">
<?php
endif;
if (!empty($event['event_video'])):
?>
                                    <video width="300" controls>
                                        <source src="<?php echo base_url(EVENTFILES_PATH.'v/'.$event['event_video']); ?>" type="video/mp4">
                                    </video>
<?php endif; ?>
                                </li>
<?php
endforeach;
else:
?>
                                <li class="list-group-item text-red">No upcoming events.</li>
<?php
endif;
?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal" id="eventmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" id="eventimgview">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <img class="img img-responsive" id="eventimg">
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <div class="pull-left text-muted" id="imgdate"></div>
                    <button type="button" class="btn btn-default" id="imgprevious"><span class="glyphicon glyphicon-chevron-left"></span></button>
                    <span id="imgpagination"></span>
                    <button type="button" class="btn btn-default" id="imgnext"><span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>-->
            </div>
        </div>
    </div>
