<?php
error_reporting(0);
include_once 'layouts/header.php';
include_once 'dbConfig.php';

$std_id = $_SESSION['std_id'];
$std_class = $_SESSION['std_class'];


$fk_subject_id = $_GET['id'];


$query = "SELECT * FROM mcq_exam WHERE class_subject_idclass_subject='$fk_subject_id' AND exam_type='model'";
$stmt = $db->query($query);
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">মডেল টেস্ট</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>পরিক্ষার নাম</th>
                    <th>পরিক্ষার তারিখ </th>
                    <th>পরিক্ষার ব্যাপ্তিকাল</th>
                    <th>সর্বমোট নাম্বার </th>
                    <th>অর্জিত নাম্বার</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($subjects as $subject) {
                    echo $exam_id = $subject['idmcq_exam'];
                    $query = "SELECT * FROM `student_result` WHERE student_idstudent='$std_id' AND mcq_exam_idmcq_exam='$exam_id'";
                    $stmt = $db->query($query);
                    $std_result = $stmt->fetch(PDO::FETCH_ASSOC);


                    $number_of_exam = count($std_result['mcq_exam_idmcq_exam']);
                    ?>
                <tr class="gradeU text-center">
                    <td>
                        <?php
                        if ($number_of_exam > 0){
                            echo $subject['exam_name'];
                        }
                        else
//                        echo '<a href="middleChkModel.php?type=model&xm_id=<?=$exam_id?">'. $subject[\'exam_name\'].'</a>'
                        echo '<a href="middleChkModel.php?type=model & exam_id='.$exam_id.'">'.$subject['exam_name'];'</a>'
                        ?>
                    </td>
                    <td><?= $subject['exam_date']?></td>
                    <td><?= $subject['exam_duration']?> Minute</td>
                    <td><?= $subject['total_question']?></td>
                    <td>
                        <?php echo $std_result['marks']." %";?>
                    </td>
                    <td>উত্তর সমূহ <a href="" onclick="return false">gdgdf</a> </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
        <!-- /.col-lg-12 -->
    </div>


</div>

<?php
include_once 'layouts/footer.php';
/*<li><a href="modelTest_wise_view.php.php?id=<?=$sub_id?>&type=model &xm_id=<?=$exam_id?>"><h4><?=$chapter['exam_name']*/?><!--</h4></a></li>-->