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
date("H:i:sA");

$server_time = date("H:i:s");
//echo "Database Start Time: ".$db_start_time."<br>";
//echo "Database End Time: ".$db_end_time."<br>";
//echo "Server Time: ".$server_time;
//echo "<br><br>";

if($server_time >= $db_start_time && $server_time <= $db_end_time) {
    header('location:modelTest1.php?id='.$fid);
    //echo "<script> window.location='modelTest.php?id='.$id' </script>";
}
else {
    header('location:modelTest1.php?id='.$fid);
    }

include_once 'layouts/footer.php';
?>
