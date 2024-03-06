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



    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

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
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
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
        <!-- /.navbar-top-links -->

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