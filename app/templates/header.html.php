<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?></title>
    <link href="<?php echo URLROOT  ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT  ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT  ?>css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT  ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT  ?>css/editor.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT  ?>css/responsive.css" rel="stylesheet" type="text/css">
</head>


</head>

<body>
    <!--======== Navbar =======-->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="navbar-menu-left-side239">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Contact</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-headphones" aria-hidden="true"></i>Support</a>
                            </li>
                            <li>
                                <a href="logIn.html"><i class="fa fa-user" aria-hidden="true"></i>Login Area</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-users" aria-hidden="true"></i>User online : <?= $calOnl['online'] ?> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="navbar-serch-right-side">
                        <form class="navbar-form" role="search">
                            <div class="input-group add-on">
                                <input class="form-control form-control222" placeholder="Search" name="srch-term" id="srch-term" type="text" />
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-default2913" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========header mega navbar=======-->
    <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo URLROOT  ?>image/logo.png" alt="Logo" /></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"></ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URLROOT ?>">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li>
                                    <a href="<?php echo URLROOT . 'quest/edit' ?>">Ask Question</a>
                                </li>
                                <li>
                                    <a href="<?php echo URLROOT . 'category/list' ?>">Question Categories</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="user.html">All User </a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li>
                                    <a href="http://localhost/renda/posts">Blog
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Page <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="logIn.html">Login</a></li>
                                <li>
                                    <a href="contact_us.html"> Contact Us</a>
                                </li>
                                <li>
                                    <a href="ask_question.html">
                                        Ask Question
                                    </a>
                                </li>
                                <li>
                                    <a href="post-deatils.html">
                                        post-Details
                                    </a>
                                </li>
                                <li><a href="#"> User Question </a></li>
                                <li><a href="#"> Category </a></li>
                                <li><a href="#"> 404 </a></li>
                            </ul>
                        </li>
                        <li><a href="contact_us.html">Contact us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>