<?php
include_once 'layouts/header.php';
include_once 'dbConfig.php';
$chapter_id = $_GET['chapter_id'];

?>

<div id="page-wrapper">
    <div class="row">
        <?php include_once 'layouts/class_module.php'?>
    </div>
    <div class="row">
        <a href="" class=" accordion btn btn-lg btn-block " style="text-align: center">লেকচার নোট</a>
        <a href="" class=" accordion btn btn-lg btn-block " style="text-align: center">ভিডিও লেকচার</a>
        <a href="" class=" accordion btn btn-lg btn-block " style="text-align: center">সৃজনশীল প্রশ্ন ও উত্তর</a>
        <a href="middleChk.php?id=<?=$chapter_id?>&& type=chapter" class=" accordion btn btn-lg btn-block " style="text-align: center">বহু নির্বাচনী ও উত্তর</a>
        <a href="middleChk1.php?id=<?=$chapter_id?>&& type=chapter" class=" accordion btn btn-lg btn-block " style="text-align: center">নিজেকে যাচাই কর</a>
    </div>


</div>


<!--<script>-->
<!--    var acc = document.getElementsByClassName("accordion");-->
<!--    var i;-->
<!---->
<!--    for (i = 0; i < acc.length; i++) {-->
<!--        acc[i].addEventListener("click", function() {-->
<!--            this.classList.toggle("active");-->
<!--            var panel = this.nextElementSibling;-->
<!--            if (panel.style.display === "block") {-->
<!--                panel.style.display = "none";-->
<!--            } else {-->
<!--                panel.style.display = "block";-->
<!--            }-->
<!--        });-->
<!--    }-->
<!--</script>-->














<?php
include_once 'layouts/footer.php';
?>
