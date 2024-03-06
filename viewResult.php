<?php
error_reporting(0);
$question_id = $_GET['id'];

include_once 'layouts/header.php';
include_once 'dbConfig.php';

//$id = $_GET['id'];
//$_SESSION['id']=$id;
//$db = new PDO('mysql:host=localhost;dbname=srijonibd;charset=utf8mb4', 'root', '');
$query = "SELECT * FROM `mcq_question_set` WHERE mcq_exam_idmcq_exam='$question_id'";
$s = $db->query($query);
$res = $s->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM student_result WHERE mcq_exam_idmcq_exam='$question_id' ORDER BY idstudent_result DESC ";
$stmt = $db->query($query);
$answers_array = $stmt->fetch(PDO::FETCH_ASSOC);

$answer_string = $answers_array['answer_array'];
//global $student_answer_array;
//global $correct_answer_array;
$student_answer_array = explode('/',$answer_string);
$answer_string."<br/>";
//print_r($student_answer_array);



?>
<div id="page-wrapper">
    <div class="row">
        <div class="market-updates">
            <form action="result.php" method="post" name="mcqModelTest" id="mcqModelTest">
                <div style="overflow: hidden">
                    <div class="col-md-12 ">
                <table class="table table-responsive" style="width: 100%">
                    <tr>
                        <?php
                        $sl = 0;
                        $q_no = 0;
                        $index = 0;
                        //echo $student_answer_array[$index];
                        $answer_array=array();
                        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
                        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
                        foreach ($res as $clsXm)
                        {
                            $correct_answer_array[$sl] = $clsXm['answer'];
                            $q_no = $q_no+1;
                            ?>
                            <td>
                                <table>
                                    <thead>
                                    <tr>
                                        <th><?= str_replace($en, $bn, $q_no).")" ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th><?= $clsXm['question'] ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="form-group">
                                            <div class="form-check form-check-inline">
                                                <?php
                                                show_correct_answer($clsXm['option_one'], $sl, $clsXm['answer'],1);
                                                ?>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <?php
                                                show_correct_answer($clsXm['option_two'], $sl, $clsXm['answer'],2);
                                                ?>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <?php
                                                show_correct_answer($clsXm['option_three'], $sl, $clsXm['answer'],3);
                                                ?>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <?php
                                                show_correct_answer($clsXm['option_four'], $sl, $clsXm['answer'],4);
                                                ?>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <?php
                            $index = $index +1;
                            $sl++;
                            if($sl%2==0) echo "</tr><tr>";

                        }
                        ?>
                    </tr>
                </table>
                    </div>
                </div>
            </form>
            <div class="clearfix"> </div>
        </div>

    </div>


<?php
function show_correct_answer($option, $serial, $correct_option, $option_number)
    {
    global $student_answer_array;
    //echo "student answer: ".$student_answer_array[$serial]." correct answer: ".$correct_option;
    if($option_number==$correct_option)
        {
        if($student_answer_array[$serial]=="")
            {
            echo '<span style="background-color: yellow;"><input class="form-check-input" type="radio" id="inlineCheckbox1" disabled checked> ' . $option . '</span>';
            }
        else
            {
            echo '<span style="background-color: green;"><input class="form-check-input" type="radio" id="inlineCheckbox1" disabled checked> '.$option.'</span>';
            }
        }
    else
        {
        if($student_answer_array[$serial]==$option_number)
            {
            echo '<span style="background-color: red;"><input class="form-check-input" type="radio" id="inlineCheckbox1" disabled> '.$option.'</span>';
            }
        else
            {
            echo '<span><input class="form-check-input" type="radio" id="inlineCheckbox1" disabled> '.$option.'</span>';
            }
        }
    }




include_once 'layouts/footer.php';
?>