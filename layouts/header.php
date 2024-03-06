<?php
session_start();
if (!isset($_SESSION['std_id'])) {
    // header('location:auth/login.php');
    echo '<script>window.location.href = "std_login.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Predict Yourself</title>

    <base href="http://localhost/srijoni/">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link href="assets/admin/vendor/" rel="stylesheet">

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <link rel="stylesheet" href="dist/css/myCSS.css">

    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/ajax.js"></script>

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>

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
            <a class="navbar-brand" href="index.php">সৃজনী</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
<!--            <li class="dropdown">-->
<!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                    P..E.C-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                    J.S.C-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                    S.S.C-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                    H.S.C-->
<!--                </a>-->
<!--            </li>-->
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="std_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> ড্যাশবোর্ড</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>বিষয় ভিত্তিক প্রস্তুতি<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="subject_wise_view.php">বিষয় ভিত্তিক বহুনির্বাচনী</a>
                            </li>
                            <li>
                                <a href="subject_wise_modeltest.php">মডেল টেস্ট (বহুনির্বাচনী)</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
<!--                    <li>-->
<!--                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>-->
<!--                        <ul class="nav nav-second-level">-->
<!--                            <li>-->
<!--                                <a href="panels-wells.html">Panels and Wells</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="buttons.html">Buttons</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="notifications.html">Notifications</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="typography.html">Typography</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="icons.html"> Icons</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="grid.html">Grid</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <!-- /.nav-second-level -->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>-->
<!--                        <ul class="nav nav-second-level">-->
<!--                            <li>-->
<!--                                <a href="#">Second Level Item</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Second Level Item</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level <span class="fa arrow"></span></a>-->
<!--                                <ul class="nav nav-third-level">-->
<!--                                    <li>-->
<!--                                        <a href="#">Third Level Item</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">Third Level Item</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">Third Level Item</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">Third Level Item</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                                <!-- /.nav-third-level -->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <!-- /.nav-second-level -->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>-->
<!--                        <ul class="nav nav-second-level">-->
<!--                            <li>-->
<!--                                <a href="blank.html">Blank Page</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="login.html">Login Page</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <!-- /.nav-second-level -->
<!--                    </li>-->
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
<?php
    $_SESSION['js']=1;

    if (isset($_SESSION['js']) || $_SESSION['js']==""){
    echo "<noscript><meta http-equiv='refresh' content='0;url=error_404.php'></noscript>";
    $js = true;
    }


    if ($js){}
    else{
    echo 'JavaScript is disabled';
    }
    ?>