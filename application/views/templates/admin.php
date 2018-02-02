<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>
   
    <!-- Bootstrap Core CSS -->
    

    <!-- MetisMenu CSS -->
    <link href="<?= base_url() ?>admin_files/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->

 <?php 

        if($this->session->userdata('lang') =='ar') { ?>
        <link href="<?= base_url() ?>admin_files/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>admin_files/dist/css/sb-admin-2-rtl.css" rel="stylesheet">
        <link href="<?= base_url() ?>admin_files/dist/css/style.css" rel="stylesheet">
    <?php
        } else { ?>
        <link href="<?= base_url() ?>admin_files/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>admin_files/dist/css/sb-admin-2.css" rel="stylesheet">
  <?php 
        }
    ?>
    <!-- Morris Charts CSS -->
    <link href="<?= base_url() ?>admin_files/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url() ?>admin_files/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/css/select2.min.css">
     <link href="<?= base_url() ?>admin_files/dist/css/custom.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php

        if($this->session->userdata('is_admin') == TRUE) { ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?= $this->lang->line('admin_panel'); ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-globe fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="drop-left dropdown-menu dropdown-messages">
                    <li><a href="<?= base_url() ?>en">English</a></li>
                    <li><a href="<?= base_url() ?>ar">العربية</a></li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="drop-left dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Eslam Elbadry</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Eslam Elbadry</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Eslam Elbadry</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="drop-left drop-left dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="drop-left dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="drop-left dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url() ?>dvilsf/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                     
                        <li>
                            <a href="<?= base_url() ?>site"><i class="fa fa-dashboard fa-fw"></i> 
                                <?= $this->lang->line('dashboard') ?></a>
                        </li>
                        <li>
                            <?php 
                            
                            $last_id = $this->Mdl_site_info->get_max();
                             ?>
                            <a href="<?= base_url() ?>site/site_info/<?= $last_id ?>"><i class="fa fa-rss fa-fw"></i> 
                                <?= $this->lang->line('basic_info') ?></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>sliders/manage"><i class="fa fa-picture-o fa-fw"></i> 
                                <?= $this->lang->line('slider'); ?></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tag fa-fw"></i> <?= $this->lang->line('categories') ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url() ?>categories/manage"><?= $this->lang->line('manage_categories') ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>categories/create"><?= $this->lang->line('add_categories') ?></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?= base_url() ?>tags/create"><i class="fa fa-tags fa-fw"></i> 
                                <?= $this->lang->line('tags'); ?></a>
                        </li>

                          <li>
                            <a href="#"><i class="fa fa-rss-square fa-fw"></i> <?= $this->lang->line('articles'); ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url() ?>articles/manage"><?= $this->lang->line('manage_articles'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>articles/create"><?= $this->lang->line('add_articles'); ?></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-file fa-fw"></i> <?= $this->lang->line('pages'); ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url() ?>pages/manage"><?= $this->lang->line('manage_pages'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>pages/create"><?= $this->lang->line('add_pages'); ?></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                         <li>
                            <a href="<?= base_url() ?>enquiries/manage"><i class="fa fa-envelope fa-fw"></i> 
                                <?= $this->lang->line('enquiries'); ?></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>comments/manage"><i class="fa fa-comments fa-fw"></i> 
                                <?= $this->lang->line('comments'); ?></a>
                        </li>
                      
                          <li>
                            <a href="#"><i class="fa fa-info-circle fa-fw"></i> <?= $this->lang->line('services'); ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                        <a href="<?= base_url() ?>services/manage"><i class="fa fa-info-circle fa-fw"></i> 
                                <?= $this->lang->line('manage_services'); ?></a>
                        </li>
                                <li>
                                    
                                    <a href="<?= base_url() ?>services/create"><i class="fa fa-plus fa-fw"></i> <?= $this->lang->line('new_services'); ?></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="<?= base_url() ?>dvilsf/create/"><i class="fa fa-comments fa-fw"></i> 
                                <?= $this->lang->line('comments'); ?></a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

       
        <!-- /#page-wrapper -->
 		<div id="page-wrapper">
 			 <?= $body ?>
 		</div>
        <?php } else {
         ?>
            <?= $body ?>
        <?php
        } ?>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>admin_files/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>admin_files/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>admin_files/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url() ?>admin_files/vendor/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>admin_files/vendor/morrisjs/morris.min.js"></script>
    <script src="<?= base_url() ?>admin_files/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>admin_files/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset/js/select2.min.js"></script>
    <script type="text/javascript" src="../asset/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../asset/ckfinder/ckfinder.js"></script>
        
    <script src="<?= base_url() ?>admin_files/js/back.js"></script>

    <script type="text/javascript">
        //$('.select2-multi').select2().val(<?php $all_Ids ?>).trigger('change');
    </script>
</body>

</html>
