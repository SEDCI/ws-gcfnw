

    <header>

        <div class="container">

            <div class="intro-text" style="padding-top: 100px; padding-bottom: 100px;">

            	

                    <h1>Events</h2>

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

    <section id="events" class="bg-light-gray" align="center">

        <div class="container" align="center">

            <div id="calendar" align="center">

    <h1></h1>

    <style>

	#calendar{

  width:500px;

  margin:0 auto;

  margin-top:-20px;

  margin-bottom:2%;

  border-radius:5px;

  font-family: "Code Light";

  text-align:center;

  color:#000000;

  float: none;

}



#calendar h1{

  background:#1E824C;

  border-radius:5px 5px 0 0;

  padding:20px;

  font-size:140%;

  font-weight:300;

  text-transform:uppercase;

  letter-spacing:1px;

  color:#fff;

  cursor:default;

}



#calendar table{

  border-top:1px solid #ddd;

  border-left:1px solid #ddd;

  border-spacing:0;

  border-radius:0 0 5px 5px;

}



#calendar td{

  width:100px;

  height:38px;

  background:#eee;

  border-right:1px solid #ddd;

  border-bottom:1px solid #ddd;

  padding:6px;

  cursor:pointer;

  transition:background .3s;

  -webkit-transition:background .3s;

}



#calendar td:hover:not(.current){

  background:#ddd;

}



#calendar .lastmonth,#calendar .nextmonth,#calendar .nextmonth ~ *{

  background:#fff;

  color:#999;

}



#calendar .currentA{

  background:#CCCCCC;

  font-weight:700;

  color:#1E824C;

}



#calendar .currentO{

  background:#CCCCCC;

  font-weight:700;

  color:#1E824C;

}



#calendar .hastask{

  font-weight:700;

  color: #FF0000;

}

#calendar .availableDay{

	color: #1E824C;

}

#calendar .occupiedDay{

	background: #ED4337;

	color: #ffffff;

}



#calendar tr:last-of-type td:first-of-type{border-radius:0 0 0 5px;}

#calendar tr:last-of-type td:last-of-type{border-radius:0 0 5px 0;}

</style>

<script>

var months = "January,February,March,April,May,June,July,August,September,October,November,December".split(",");

window.onload=function() {

    var d = new Date();

    document.getElementById("calendar").getElementsByTagName("h1")[0].innerHTML=months[d.getMonth()];

    document.getElementsByTagName("td")[d.getDate()-1].className="currentA";

}



</script>

    <table>

        <tr>

            <td class="availableDay">1</td>

            <td class="availableDay">2</td>

            <td class="availableDay">3</td>

            <td class="availableDay">4</td>

            <td class="availableDay">5</td>

            <td class="availableDay">6</td>

            <td class="availableDay">7</td>

        </tr>

        <tr>

            <td class="availableDay">8</td>

            <td class="availableDay">9</td>

            <td class="availableDay">10</td>

            <td class="availableDay">11</td>

            <td class="availableDay">12</td>

            <td class="availableDay">13</td>

            <td class="availableDay">14</td>

        </tr>

        <tr>

            <td class="availableDay">15</td>

            <td class="availableDay">16</td>

            <td class="availableDay">17</td>

            <td class="availableDay">18</td>

            <td class="availableDay">19</td>

            <td class="availableDay">20</td>

            <td class="availableDay">21</td>

        </tr>

        <tr>

            <td class="availableDay">22</td>

            <td class="availableDay">23</td>

            <td class="availableDay">24</td>

            <td class="availableDay">25</td>

            <td class="availableDay">26</td>

            <td class="availableDay">27</td>

            <td class="availableDay">28</td>

        </tr>

        <tr>

            <td class="availableDay">29</td>

            <td class="availableDay">30</td>

            <td class="nextmonth">1</td>

            <td class="nextmonth">2</td>

            <td class="nextmonth">3</td>

            <td class="nextmonth">4</td>

            <td class="nextmonth">5</td>

        </tr>

    </table>

</div>



            <!--

            <div class="row">

                <div class="col-md-4 col-sm-6 portfolio-item">

                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content">

                                <i class="fa fa-plus fa-3x"></i>

                            </div>

                        </div>

                        <img src="img/portfolio/roundicons.png" class="img-responsive" alt="">

                    </a>

                    <div class="portfolio-caption">

                        <h4>Round Icons</h4>

                        <p class="text-muted">Graphic Design</p>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">

                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content">

                                <i class="fa fa-plus fa-3x"></i>

                            </div>

                        </div>

                        <img src="img/portfolio/startup-framework.png" class="img-responsive" alt="">

                    </a>

                    <div class="portfolio-caption">

                        <h4>Startup Framework</h4>

                        <p class="text-muted">Website Design</p>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">

                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content">

                                <i class="fa fa-plus fa-3x"></i>

                            </div>

                        </div>

                        <img src="img/portfolio/treehouse.png" class="img-responsive" alt="">

                    </a>

                    <div class="portfolio-caption">

                        <h4>Treehouse</h4>

                        <p class="text-muted">Website Design</p>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">

                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content">

                                <i class="fa fa-plus fa-3x"></i>

                            </div>

                        </div>

                        <img src="img/portfolio/golden.png" class="img-responsive" alt="">

                    </a>

                    <div class="portfolio-caption">

                        <h4>Golden</h4>

                        <p class="text-muted">Website Design</p>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">

                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content">

                                <i class="fa fa-plus fa-3x"></i>

                            </div>

                        </div>

                        <img src="img/portfolio/escape.png" class="img-responsive" alt="">

                    </a>

                    <div class="portfolio-caption">

                        <h4>Escape</h4>

                        <p class="text-muted">Website Design</p>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">

                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content">

                                <i class="fa fa-plus fa-3x"></i>

                            </div>

                        </div>

                        <img src="img/portfolio/dreams.png" class="img-responsive" alt="">

                    </a>

                    <div class="portfolio-caption">

                        <h4>Dreams</h4>

                        <p class="text-muted">Website Design</p>

                    </div>

                </div>

	-->

            </div>

        </div>

    </section>

    <!-- About Section 

    <section id="services">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="section-heading">Services</h2>

                    <h3 class="section-subheading text-muted">The Worship Ministry glorifies God by prompting Christians to worship God and by helping people to know Christ and make Him known through excellent worship opportunities that are Spirit-led, biblical, dynamic and trans-cultural. It aims to promote biblically-based worship as a lifestyle among Christian and foster unbroken communion with God.</h3>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <ul class="timeline">

                        <li>

                            <div class="timeline-image">

                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">

                            </div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4><font color="#1E824C">SUNDAY WORSHIP</font></h4>

                                    <h4 class="subheading">Regular Weekly Worship</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">8am</p><p class="text-muted">10:30am</p><p class="text-muted">3pm</p><p class="text-muted">and 5:30pm</p>

                                </div>

                            </div>

                        </li>

                        <li class="timeline-inverted">

                            <div class="timeline-image">

                                <img class="img-circle img-responsive" src="img/teens.jpg" alt="">

                            </div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4><font color="#1E824C">MIDWEEK WORSHIP</font></h4>

                                    <h4 class="subheading">Wednesdays</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">7pm</p>

                                </div>

                            </div>

                        </li>

                        <li>

                            <div class="timeline-image">

                                <img class="img-circle img-responsive" src="img/hands.jpg" alt="">

                            </div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4><font color="#1E824C">TRADITIONAL WORSHIP</font></h4>

                                    <h4 class="subheading">Saturdays</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">6pm</p>

                                </div>

                            </div>

                        </li>

                        <li class="timeline-inverted">

                            <div class="timeline-image">

                                <img class="img-circle img-responsive" src="img/worship.jpg" alt="">

                            </div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4><font color="#1E824C">YOUTH WORSHIP</font></h4>

                                    <h4 class="subheading">Saturdays</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">5pm</p>

                                </div>

                            </div>

                        </li>

                        <li class="timeline-inverted">

                            <div class="timeline-image">

                                <h4>See<br>you

                                    <br>there!</h4>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

	-->

    <!-- Team Section

    <section id="team" class="bg-light-gray">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="section-heading">About GCF</h2>

                    <h3 class="section-subheading text-muted">Know Christ and Make Him Known</h3>

                    <p>Greenhills Christian Fellowship, also known as GCF, is a church at the very heart of Ortigas Center, Pasig City - one of the fastest-growing commercial centers in the Philippines today. GCF has an over-all constituency of over 7,000 worshippers. GCF was born out of a New Testament heritage, assisting in the spreading of the gospel through evangelism, discipleship, and in the multiplication of churches.</p>

                </div>

            </div>

            <div class="row" style="margin-top: 3em;">

                <div class="col-sm-4">

                    <div class="team-member">

                        <img src="img/teens.jpg" width="200" class="img-responsive img-circle" alt="">

                        <h4>Mission</h4>

                        <p class="text-muted">To make disciples of Jesus Christ in the Philippines and beyond (Matthew 28:18-20)</p>

                        <!--

                        <ul class="list-inline social-buttons">

                            <li><a href="#"><i class="fa fa-twitter"></i></a>

                            </li>

                            <li><a href="#"><i class="fa fa-facebook"></i></a>

                            </li>

                            <li><a href="#"><i class="fa fa-linkedin"></i></a>

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="col-sm-4">

                    <div class="team-member">

                        <img src="img/hands.jpg" width="200" class="img-responsive img-circle" alt="">

                        <h4>Core Values</h4>

                        <ul>

                        	<li><p class="text-muted" style="text-align: justify;">Centrality of God's Word (2 Tim. 3:16-17)</p></li>

                        	<li><p class="text-muted" style="text-align: justify;">Discipleship and shepherding through small groups (Mark 3:14, Acts 2:46-47)</p></li>

                        	<li><p class="text-muted" style="text-align: justify;">Vibrant worship and fervent prayer (Acts 2:42-47)</p></li>

                        	<li><p class="text-muted" style="text-align: justify;">Excellence in life and ministry (1 Cor. 14:12, 2 Cor. 8:7)</p></li>

                        	<li><p class="text-muted" style="text-align: justify;">Intentional evangelism and church planting (Mat. 28:16-20, Acts 1:8)</p></li>

                        	<li><p class="text-muted" style="text-align: justify;">Leadership development (Mark 3:14, 2 Tim. 2:2)</p></li>

                            

                    </div>

                </div>

                <div class="col-sm-4">

                    <div class="team-member">

                        <img src="img/worship.jpg" width="200" class="img-responsive img-circle" alt="">

                        <h4>Vision</h4>

                        <p class="text-muted">Lives and communities transformed through Jesus Christ (2 Cor. 5:17, Acts 2:42-47)</p>

                    </div>

                </div>

            </div><!--

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2 text-center">

                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

                </div>

            </div>

        </div>

    </section>

	-->

    <!-- Clients Aside

    <aside class="clients">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <a href="#">

                        <img src="img/logos/envato.jpg" class="img-responsive img-centered" alt="">

                    </a>

                </div>

                <div class="col-md-3 col-sm-6">

                    <a href="#">

                        <img src="img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">

                    </a>

                </div>

                <div class="col-md-3 col-sm-6">

                    <a href="#">

                        <img src="img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">

                    </a>

                </div>

                <div class="col-md-3 col-sm-6">

                    <a href="#">

                        <img src="img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">

                    </a>

                </div>

            </div>

        </div>

    </aside>

    <section id="contact">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="section-heading">Contact Us</h2>

                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <form name="sentMessage" id="contactForm" novalidate>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">

                                    <p class="help-block text-danger"></p>

                                </div>

                                <div class="form-group">

                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">

                                    <p class="help-block text-danger"></p>

                                </div>

                                <div class="form-group">

                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">

                                    <p class="help-block text-danger"></p>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>

                                    <p class="help-block text-danger"></p>

                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-lg-12 text-center">

                                <div id="success"></div>

                                <button type="submit" class="btn btn-xl">Send Message</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

	

	 -->

