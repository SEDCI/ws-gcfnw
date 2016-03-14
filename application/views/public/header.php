<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title><?php echo $title; ?> | Greenhills Christian Fellowship</title>



    <!-- Bootstrap Core CSS -->

    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-datepicker3.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="<?php echo base_url(); ?>css/agency.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/gcf.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,100,300,100italic,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo base_url('img/icons/apple-touch-icon-57x57.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('img/icons/apple-touch-icon-114x114.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('img/icons/apple-touch-icon-72x72.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('img/icons/apple-touch-icon-144x144.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo base_url('img/icons/apple-touch-icon-60x60.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo base_url('img/icons/apple-touch-icon-120x120.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo base_url('img/icons/apple-touch-icon-76x76.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo base_url('img/icons/apple-touch-icon-152x152.png'); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url('img/icons/favicon-196x196.png'); ?>" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?php echo base_url('img/icons/favicon-96x96.png'); ?>" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?php echo base_url('img/icons/favicon-32x32.png'); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo base_url('img/icons/favicon-16x16.png'); ?>" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo base_url('img/icons/favicon-128.png'); ?>" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo base_url('img/icons/mstile-144x144.png'); ?>" />
    <meta name="msapplication-square70x70logo" content="<?php echo base_url('img/icons/mstile-70x70.png'); ?>" />
    <meta name="msapplication-square150x150logo" content="<?php echo base_url('img/icons/mstile-150x150.png'); ?>" />
    <meta name="msapplication-wide310x150logo" content="<?php echo base_url('img/icons/mstile-310x150.png'); ?>" />
    <meta name="msapplication-square310x310logo" content="<?php echo base_url('img/icons/mstile-310x310.png'); ?>" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    

</head>


<body id="page-top" class="index">

    <!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top">

            <div class="navbar-header page-scroll" style="margin-left: 8%">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" width="250" alt=""/></a>

            </div>

        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->



            <!-- Collect the nav links, forms, and other content for toggling -->

            <div id="login">
<?php if (empty($this->session->userdata('memberuser'))): ?>
                <ul>

                    <li><a href="<?php echo base_url('login'); ?>">Log in</a></li>

                    <li> | </li>

                    <li><a href="<?php echo base_url('signup'); ?>">Sign up</a></li>

                </ul>
<?php else: ?>
                <ul>

                    <li>Welcome, <?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?></li>

                    <li>(<a href="<?php echo base_url('logout'); ?>">Sign out</a>)</li>

                </ul>
<?php endif; ?>    
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">

                    <li class="hidden">

                        <a href="#page-top"></a>

                    </li>

                    <li>

                        <a class="page-scroll<?php echo (isset($events_selected)) ? ' '.$events_selected : ''; ?>" href="<?php echo base_url('events'); ?>">Events</a>

                    </li>

                    <li>

                        <a class="page-scroll<?php echo (isset($services_selected)) ? ' '.$services_selected : ''; ?>" href="<?php echo base_url('#services'); ?>">Worship Services</a>

                    </li>
<?php if ($this->session->userdata('memberuser') != ''): ?>
                    <!--<li>

                        <a class="page-scroll<?php echo (isset($requests_selected)) ? ' '.$requests_selected : ''; ?>" href="<?php echo base_url('requests'); ?>">Prayer Requests</a>

                    </li>-->
<?php endif; ?>
                    <li>

                        <a class="page-scroll<?php echo (isset($gallery_selected)) ? ' '.$gallery_selected : ''; ?>" href="<?php echo base_url('gallery'); ?>">Gallery</a>

                    </li>

                    <li>

                        <a class="page-scroll<?php echo (isset($about_selected)) ? ' '.$about_selected : ''; ?>" href="<?php echo base_url('about'); ?>">About</a>

                    </li>

                    <li>

                        <a class="page-scroll<?php echo (isset($devotion_selected)) ? ' '.$devotion_selected : ''; ?>" href="<?php echo base_url('devotion'); ?>">Weekly Message</a>

                    </li>

                    <li>

                        <a class="page-scroll<?php echo (isset($contact_selected)) ? ' '.$contact_selected : ''; ?>" href="<?php echo base_url('#contact'); ?>">Contact</a>

                    </li>

                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </div>

        <!-- /.container-fluid -->

    </nav>
