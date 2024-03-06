<?php

include_once '../layouts/header.php';
include_once '../dbConfig.php';

$id = 7;
$query = "SELECT exam_duration FROM `mcq_exam` WHERE idmcq_exam=7 ";
$stmt = $db->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['id']=$id;
//$db = new PDO('mysql:host=localhost;dbname=srijonibd;charset=utf8mb4', 'root', '');
$query = "SELECT * FROM `mcq_question_set` WHERE mcq_exam_idmcq_exam='$id'";
$s = $db->query($query);
$res = $s->fetchAll(PDO::FETCH_ASSOC);

$i = $result['exam_duration'];
//var_dump($class_exam);

?>
    <div id="page-wrapper">

    <div class="row" style="padding-top: 20px">
        <div class="col-lg-6 col-md-6" style="text-align: center">
            Exam Name: Bangla 1st Paper
        </div>
        <div class="col-lg-6 col-md-6 ">
            Exam Duration: 10min
        </div>
    </div>

    <div class="row">
        <div class="market-updates">
            <input type="hidden" id="timeId" value="<?= $i?>" />
            <form action="result.php" method="post" name="mcqModelTest" id="mcqModelTest">
                <input type="hidden" name="btnForAutoSubmit" id="btnForAutoSubmit">

                <script type="text/javascript">
                    $(document).ready(function(){

                    });
                    var mins = document.getElementById('timeId').value;
                    var secs = mins * 60;

                    function countdown()
                    {
                        setTimeout('Decrement()',1000);
                    }
                    function Decrement()
                    {
                        if (document.getElementById)
                        {
                            minutes = document.getElementById("minutes");
                            seconds = document.getElementById("seconds");
                            if (seconds < 59)
                            {
                                seconds.value = secs;
                            }
                            else
                            {
                                var m = getminutes();
                                var s = getseconds();
                                if(m == 0 && s == 0)
                                {
                                    document.getElementById("mcqModelTest").submit();
                                }
                                minutes.value = m;
                                seconds.value = s;
                                document.getElementById("btnForAutoSubmit").value=m+":"+s;
                                secs--;
                                setTimeout('Decrement()',1000);
                            }
                        }
                    }
                    function getminutes()
                    {
                        mins = Math.floor(secs / 60);
                        return mins;
                    }
                    function getseconds()
                    {
                        return secs-Math.round(mins *60);
                    }
                </script>

                <div style="overflow: hidden">
                    <div class="stopwatch col-md-offset-5">
                        <div id="timer" class="right">
                            <input id="minutes" class="input_box" name="minutes" type="text" style="" title="Minutes" disabled/>
                            <b style="font-size: 30px">:</b>
                            <input class="input_box" id="seconds" name="seconds" type="text" title="Seconds" readonly/>
                        </div>
                        <script>countdown();</script>
                    </div>


                        <?php
                            $sl = 0;
                            $q_no = 0;
                            $answer_array=array();
                            $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
                            $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
                            foreach ($res as $clsXm)
                            {
                                $answer_array[$sl] = $clsXm['answer'];

                                $q_no = $q_no+1;
                                ?>
                    <div class="col-lg-6 right" style="padding-left: 10%">
                                <div><b><?=str_replace($en, $bn, $q_no).")  "?>  <?=$clsXm['question']?></b></div>
                                <div class="form-group" style="padding:2% 5%; padd">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[<?=$sl?>]" id="inlineCheckbox1" value="1">
                                        <?= $clsXm['option_one'] ?>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[<?=$sl?>]" id="inlineCheckbox1" value="2">
                                        <?= $clsXm['option_two'] ?>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[<?=$sl?>]" id="inlineCheckbox1" value="3">
                                        <?= $clsXm['option_three'] ?>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[<?=$sl?>]" id="inlineCheckbox1" value="4">
                                        <?= $clsXm['option_four'] ?>
                                    </div>
                                </div>
                            <?php if($sl%2==0) echo "</div><div>";}?>
                    </div>
                </div>
                <?php

                $res_exp = implode(',',$answer_array);
                ?>
                <input type="hidden" name="answer_array" value="<?= $res_exp?>">

                <div class="form_btn_submit" style="text-align: center">
                    <button type="submit" id="btnFinishedMCQModelTest" name="btnFinishedMCQModelTest" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
            <div class="clearfix"> </div>
        </div>

    </div>

    <!--<div id="page-wrapper">-->
    <!--    <div class="row">-->
    <!--        <input type="hidden" id="timeId" value="10" />-->
    <!--        <form action="result.php" method="post" name="mcqModelTest" id="mcqModelTest">-->
    <!--            <input type="hidden" name="btnForAutoSubmit" id="btnForAutoSubmit">-->
    <!---->
    <!--            <script type="text/javascript">-->
    <!--                $(document).ready(function(){-->
    <!---->
    <!--                });-->
    <!--                var mins = document.getElementById('timeId').value;-->
    <!--                var secs = mins * 60;-->
    <!---->
    <!--                function countdown()-->
    <!--                {-->
    <!--                    setTimeout('Decrement()',1000);-->
    <!--                }-->
    <!--                function Decrement()-->
    <!--                {-->
    <!--                    if (document.getElementById)-->
    <!--                    {-->
    <!--                        minutes = document.getElementById("minutes");-->
    <!--                        seconds = document.getElementById("seconds");-->
    <!--                        if (seconds < 59)-->
    <!--                        {-->
    <!--                            seconds.value = secs;-->
    <!--                        }-->
    <!--                        else-->
    <!--                        {-->
    <!--                            var m = getminutes();-->
    <!--                            var s = getseconds();-->
    <!--                            if(m == 0 && s == 0)-->
    <!--                            {-->
    <!--                                document.getElementById("mcqModelTest").submit();-->
    <!--                            }-->
    <!--                            minutes.value = m;-->
    <!--                            seconds.value = s;-->
    <!--                            document.getElementById("btnForAutoSubmit").value=m+":"+s;-->
    <!--                            secs--;-->
    <!--                            setTimeout('Decrement()',1000);-->
    <!--                        }-->
    <!--                    }-->
    <!--                }-->
    <!--                function getminutes()-->
    <!--                {-->
    <!--                    mins = Math.floor(secs / 60);-->
    <!--                    return mins;-->
    <!--                }-->
    <!--                function getseconds()-->
    <!--                {-->
    <!--                    return secs-Math.round(mins *60);-->
    <!--                }-->
    <!--            </script>-->
    <!---->
    <!--            <div style="overflow: hidden">-->
    <!--                <div class="stopwatch col-md-offset-5">-->
    <!--                    <div id="timer" class="right">-->
    <!--                        <input id="minutes" class="input_box" name="minutes" type="text" style="" title="Minutes" readonly/>-->
    <!--                        <b style="font-size: 30px">:</b>-->
    <!--                        <input class="input_box" id="seconds" name="seconds" type="text" title="Seconds" readonly/>-->
    <!--                    </div>-->
    <!--                    <script>countdown();</script>-->
    <!--                </div>-->
    <!---->
                    <div class="col-md-12 ">
                        <table class="table table-responsive" style="width: 100%">
                            <tr>
                                <?php
                                $sl = 0;
                                foreach ($res as $clsXm)
                                {
                                    $sl=$sl+1;
                                    ?>
                                    <td>
                                        <table>
                                            <thead>
                                            <tr>
                                                <th><?= $sl ?></th>
                                                <th><?= $clsXm['question'] ?></th>
                                            </tr>
                                            </thead>
    <!--                                        <tbody>-->
    <!--                                        <tr>-->
    <!--                                            <td></td>-->
    <!--                                            <td class="form-group">-->
    <!--                                                <div class="form-check form-check-inline">-->
    <!--                                                    <input class="form-check-input" type="radio" name="--><?//= $clsXm['idmcq_question_set'] ?><!--" id="inlineCheckbox1" value="1">-->
    <!--                                                    --><?//= $clsXm['option_one'] ?>
    <!--                                                </div>-->
    <!--                                                <div class="form-check form-check-inline">-->
    <!--                                                    <input class="form-check-input" type="radio" name="--><?//= $clsXm['idmcq_question_set'] ?><!--" id="inlineCheckbox1" value="2">-->
    <!--                                                    --><?//= $clsXm['option_two'] ?>
    <!--                                                </div>-->
    <!--                                                <div class="form-check form-check-inline">-->
    <!--                                                    <input class="form-check-input" type="radio" name="--><?//= $clsXm['idmcq_question_set'] ?><!--" id="inlineCheckbox1" value="3">-->
    <!--                                                    --><?//= $clsXm['option_three'] ?>
    <!--                                                </div>-->
    <!--                                                <div class="form-check form-check-inline">-->
    <!--                                                    <input class="form-check-input" type="radio" name="--><?//= $clsXm['idmcq_question_set'] ?><!--" id="inlineCheckbox1" value="4">-->
    <!--                                                    --><?//= $clsXm['option_four'] ?>
    <!--                                                </div>-->
    <!--                                            </td>-->
    <!--                                        </tr>-->
    <!--                                        </tbody>-->
    <!--                                    </table>-->
    <!--                                </td>-->
    <!--                                --><?php
    //                                if($sl%2==0) echo "</tr><tr>";
    //                            }
    //                            ?>
    <!--                        </tr>-->
    <!--                    </table>-->
    <!--                </div>-->
    <!--            </div>-->
    <!---->
    <!---->
    <!--            <div class="form_btn_submit" style="text-align: center">-->
    <!--                <a href="">-->
    <!--                    <button type="submit" id="btnFinishedMCQModelTest" name="btnFinishedMCQModelTest" class="btn btn-primary btn-lg">Submit</button>-->
    <!--                </a>-->
    <!--            </div>-->
    <!--        </form>-->
    <!--        <div class="clearfix"> </div>-->
    <!---->
    <!--    </div>-->
    <!--</div>-->
<?php
include_once 'layouts/footer.php';
if (isset($_POST['btnFinishedMCQModelTest'])){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}