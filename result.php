<?php
error_reporting(0);
$string_answer = $_POST['answer_array'];
$correct_answer_array = explode(',',$string_answer);
$student_answer = $_POST['answer'];

$student_answer_array = implode(',',$student_answer);

$countRight = count(array_intersect_assoc($student_answer, $correct_answer_array));

$countWrong = count($student_answer)-$countRight;

$countNotAttemp = count($correct_answer_array)-count($student_answer);

$total_question = $countRight + $countWrong + $countNotAttemp;

$score =round(($countRight/$total_question)*100,2);


$result[] = array();
$x=0;
for ($i=0;$i<count($correct_answer_array);$i++){
    $result[$x] = $_POST['answer'][$i];
    $x++;
}

$result_string = implode('/',$result);
print_r($result_string);


include_once 'dbConfig.php';
include_once 'layouts/header1.php';
$id = $_SESSION['id'];

?>

    <div id="page-wrapper" style="padding-top: 10px">
        <div class="row">
            <div class="panel">
                <div class="panel panel-success text-center">
                    <h1 style="color:#660033; font-family: typo">Result</h1>
                </div>
                <div class="panel panel-default">
                    <table class="table table-striped" style="font-size:20px;font-weight:1000;">
                        <tr>
                            <td style="color: #66CCFF">Total Question</td>
                            <td style="color: #66CCFF"><?=$total_question ?></td>
                        </tr>
                        <tr>
                            <td style="color:#99cc32">Right Answer</span></td>
                            <td style="color:#99cc32"><?= $countRight?></td>
                        </tr>
                        <tr>
                            <td style="color: red">Wrong Answer</td>
                            <td style="color: red"><?= $countWrong?></td>
                        </tr>
                        <tr>
                            <td style="color: darkorchid">Not Attempted </td>
                            <td style="color: darkorchid"><?= $countNotAttemp?></td>
                        </tr>
                        <tr>
                            <td style="color:#66CCFF">Your Score </td>
                            <td style="color:#66CCFF"><?php echo $score." %"?></td>
                        </tr>
                            <tr>
                                <td class="text-right">
                                    <a href="viewResult.php?id=<?=$id?>">View Answer</a>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'layouts/footer.php';
$std_id = $_SESSION['std_id'];
$query = "INSERT INTO `student_result` (`correct_answer_number`, `wrong_answer_number`, `student_idstudent`, `answer_array`, `marks`, `mcq_exam_idmcq_exam`, `exam_start_time`, `exam_end_time`) VALUES ( '$countRight', '$countWrong', '$std_id', '$result_string', '$score', '$id', '2018-07-02 00:00:00', '2018-07-02 00:00:00');";
$result = $db->exec($query);


