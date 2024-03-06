<?php
include_once 'dbConfig.php';

if (isset($_POST['register'])){
    $name = $_POST['name'];
    $class = $_POST['class'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $gen_name = substr(md5(time()),0,10);
    $img_ext = explode('.',$image_name);
    $ext_name = end($img_ext);
    $_POST['image'] = $gen_name.'.'.$ext_name;
    $img_name = $_POST['image'];
    move_uploaded_file($tmp_name,'std_images/'.$_POST['image']);

    $query = "INSERT INTO `student` ( `student_name`, `student_class`, `student_mobile`, `student_image`, `date_of_birth`, `enrolled_date`, `password`) VALUES ('$name', '$class', '$mobile', '$img_name', '$dob', now(), '$password');";
    $register = $db->exec($query);
    if ($register){
        header('location:std_login.php');
    }
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

    <title>Srijoni Education Channel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Register Here</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label for="">Your Name:</label>
                                <input class="form-control" placeholder="User Name" name="name" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Your Class:</label>
                                <select name="class" class="form-control" id="">
                                    <option value="">---Select Class---</option>
                                    <option value="PEC">PEC</option>
                                    <option value="JSC">JSC</option>
                                    <option value="SSC">SSC</option>
                                    <option value="HSC">HSC</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Your Mobile:</label>
                                <input class="form-control" placeholder="Mobile" name="mobile" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="">Your Picture:</label>
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <label for="">Your Birth Date:</label>
                                <input type="date" class="form-control" name="dob" placeholder="Your Birth Date" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="">Your Password:</label>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" name="register" type="submit">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
