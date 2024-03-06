<?php

$string_answer = $_POST['answer_array'];
$corr_ans = explode(',',$string_answer);
$student_answer = $_POST['answer'];

$student_answer_array = implode(',',$student_answer);
print_r($student_answer_array);
echo '<hr/>';
print_r($corr_ans);
echo '<hr/>';
print_r($student_answer);
echo '<hr/>Number of Correct Answer: ';
print_r (count(array_intersect_assoc($student_answer, $corr_ans)));
echo '<hr/>Wrong Answer: ';
print_r(count($student_answer)-count(array_intersect_assoc($student_answer, $corr_ans)));
echo '<hr/>Not Answered: ';
print_r(count($corr_ans)-count($student_answer));






include_once 'dbConfig.php';
include_once 'layouts/header1.php';

$id = $_SESSION['id'];


$query = "SELECT * FROM `mcq_question_set` WHERE mcq_exam_idmcq_exam='$id'";
$stmt = $db->query($query);
$class_exam = $stmt->fetchAll(PDO::FETCH_ASSOC);

$countRight = 0;
$countWrong = 0;
$countNotAttemp = 0;
$result[]=array();
$x=0;
foreach ($class_exam as $res) {
    $result[$x]=$_POST['answer'];
    $x++;
    $i = $res['idmcq_question_set'];
    //echo "PostRadio Button Value: ".$_POST[$i]." <br/>";
    if(isset($_POST[$i])==false){
        $countNotAttemp = $countNotAttemp+1;
    }
    elseif ($_POST[$i] == $res['answer']) {

        $countRight=$countRight+1;
    }

    else {
        $countWrong = $countWrong+1;
    }
    $i++;
}

echo $total_question = $countNotAttemp + $countRight + $countWrong;
print_r($result);


echo $res_string = implode(',',$result);
echo '<br/>';
echo $res_string1 = explode(',',$res_string);
var_dump($res_string1);
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
                            <td style="color:#66CCFF"><?php $score = ($countRight/$total_question)*100; echo round($score,2)." %"?></td>
                        </tr>
                        <!--                    <tr>-->
                        <!--                        <td class="text-right">-->
                        <!--                            <a href="resultView.php?id=1">View Answer</a>-->
                        <!--                        </td>-->
                        <!--                    </tr>-->
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'layouts/footer.php';
