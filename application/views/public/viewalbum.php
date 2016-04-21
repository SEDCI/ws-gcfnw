<link href="<?php echo base_url('dist/css/lightbox.css'); ?>" rel="stylesheet">
    <header>
        <div class="container">
            <div class="intro-text" style="padding-top: 100px; padding-bottom: 100px;">
            	
                    <h1>Gallery</h2>
                    <!--<h4>Lorem ipsum dolor sit amet consectetur.</h3>-->
            	<!--
                <div class="intro-lead-in">Make disciples of Jesus Christ in the Philippines and beyond.</div>
                <div class="intro-heading">Welcome to GCF</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
                -->
            </div>
        </div>
    </header>
    
    <!-- Portfolio Grid Section -->
    <section id="events" class="bg-light-gray" align="center">
        <div class="container" align="center">
            <div id="gallery" align="center">
            <h4><?php echo $album['title']; ?></h4>
            <p><?php echo $album['description']; ?></p>
            <div class="gallery">
<?php foreach($photos as $photo): ?>
                <a href="<?php echo base_url(GALLERY_PATH.$album['album_code'].'/'.$photo['filename']); ?>" data-lightbox="gallery"><img src="<?php echo base_url(GALLERY_PATH.$album['album_code'].'/'.$photo['filename']); ?>" width="200" alt="<?php echo $photo['date_added']; ?>"/></a>
<?php endforeach; ?>
            </div>
           	</div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Greenhills Christian Fellowship</span>
                </div>
                <div class="col-md-4">
                <!--
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                    -->
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('js/classie.js'); ?>"></script>
    <script src="<?php echo base_url('js/cbpAnimatedHeader.js'); ?>"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url('js/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?php echo base_url('js/contact_me.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('js/agency.js'); ?>"></script>
    
    <script src="<?php echo base_url('dist/js/lightbox.js'); ?>"></script>
     

</body>

</html>
