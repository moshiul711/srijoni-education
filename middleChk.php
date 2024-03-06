<?php
//include_once 'layouts/header.php';
include_once 'dbConfig.php';
$id = $_GET['id'];
$type = $_GET['type'];
$query="SELECT * FROM `mcq_exam` WHERE class_subject_idclass_subject='$id' AND exam_type='$type'";
$query_result=$db->query($query);
$all_mcqexam=$query_result->fetchAll(PDO::FETCH_ASSOC);




foreach ($all_mcqexam as $mcqexam){
    $db_start_time=$mcqexam['start_time'];
    $db_end_time=$mcqexam['end_time'];
    $fid = $mcqexam['idmcq_exam'];
}
date_default_timezone_set('Asia/Dhaka');
date("D");
date("d-m-Y");
date("H:i:sA" );

$server_time = date("H:i:s");
//echo "Database Start Time: ".$db_start_time."<br>";
//echo "Database End Time: ".$db_end_time."<br>";
//echo "Server Time: ".$server_time;
//echo "<br><br>";

if($server_time >= $db_start_time && $server_time <= $db_end_time) {
    header('location:modelTest.php?id='.$fid);

    //echo "<script> window.location='modelTest.php?id='.$id' </script>";

}
else {?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Srijoni Education Channel</title>
    <base href="http://localhost/srijoni/">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">


    <link href="dist/css/myCSS.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="dist/js/jquery.js"></script>
    <script src="dist/js/jquery.min.js"></script>



</head>

<body>
    <div id="container">
        <div class="row text-center">
            <h2>অনুগ্রহপূর্বক কিছুক্ষণ পর আবার চেষ্টা করুণ</h2>
            <h3>পরীক্ষা শুরুর সময় : <?=$db_start_time?> </h3>
        </div>
    </div>
<?php }

include_once 'layouts/footer.php';
?>
