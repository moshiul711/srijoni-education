<?php
include_once 'layouts/header.php';
include_once 'dbConfig.php';

$std_id = $_SESSION['std_id'];
$std_class = $_SESSION['std_class'];


$query = "SELECT * FROM `class_subject` WHERE class='$std_class' GROUP BY subject_name";
//$query = "SELECT * FROM `class_subject` WHERE class='PEC' AND chapter_name='model' GROUP BY subject_name";
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
                            <tr >
                                <th class="text-center">বিষয়ের নাম</th>
                                <th class="text-center">পরিক্ষার নাম</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($subjects as $subject){ ?>
                            <tr class="gradeU text-center">
                                <td><?= $subject['subject_name']?></td>
                                <td>মডেল টেস্ট</td>
                                <td>
                                    <a href="single_modeltest_view.php?id=<?=$subject['idclass_subject']?>" class="fa fa-eye-slash btn">
                                        বিস্তারিত দেখুন
                                    </a>
                                </td>
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