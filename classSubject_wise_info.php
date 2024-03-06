<?php
include_once 'layouts/header.php';
include_once 'dbConfig.php';

$std_id = $_SESSION['std_id'];
$std_class = $_GET['std_class'];


$query = "SELECT DISTINCT subject_name FROM `class_subject` WHERE class='$std_class'";
$stmt = $db->query($query);
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


    <div id="page-wrapper">

        <?php include_once 'layouts/class_module.php' ?>
        <div class="row">
            <?php
            foreach ($subjects as $subject){ ?>
                <div class="col-lg-3 col-md-6">
                    <h4><?=$subject['subject_name']?></h4>
                    <button class="accordion text-right btn btn-success">অধ্যায় সমূহ দেখুন</button>
                    <div class="panel">
                        <?php
                        $sub = $subject['subject_name'];
                        $query = "SELECT DISTINCT idclass_subject,chapter_name FROM class_subject WHERE subject_name='$sub' AND class='$std_class'";
                        $stmt = $db->query($query);
                        $chapters = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($chapters as $chapter){
                            $id = $chapter['idclass_subject'];
                            ?>
                            <ul style="list-style: none">
                                <li><a href="chapter_wise_view.php?chapter_id=<?=$id?>&& type=chapter"><h4><?=$chapter['chapter_name']?></h4></a></li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

<?php
include_once 'layouts/footer.php';