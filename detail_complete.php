<?php
require 'functions.php';
$id_complete = $_GET["id_complete"];
$detail_complete = query("SELECT * FROM `complete` WHERE id_complete = $id_complete");
$row = $detail_complete["0"];

$problem = "problem";
$testing = "testing";
$progress = "progress";
$complete = "complete";

$id_task = $row["id_task"];
if (isset($_POST["move"])) {
    global $conn;
    var_dump($_POST["page"]);
    $page = $_POST["page"];
    $id_complete = $row["id_complete"];
    $id_task = $row["id_task"];
    $name_task = $row["name_task"];
    $test_steps = $row["test_steps"];
    $test_data = $row["test_data"];
    $exp_result = $row["exp_result"];
    $result = $row["result"];
    $source = $row["source"];

    if ($page == "complete") {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } elseif ($page == "progress") {
        mysqli_query($conn, "INSERT INTO progress VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");
        mysqli_query($conn, "DELETE FROM complete WHERE id_complete = $id_complete");
    } elseif ($page == "testing") {
        mysqli_query($conn, "INSERT INTO testing VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");
        mysqli_query($conn, "DELETE FROM complete WHERE id_complete = $id_complete");
    } elseif ($page == "problem") {
        mysqli_query($conn, "INSERT INTO problem VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");
        mysqli_query($conn, "DELETE FROM complete WHERE id_complete = $id_complete");
    }
    header("Location: index.php?halaman=detail_task&id_task=$id_task");
}
?>

<div class="content-task">
    <div class="halaman">
        <h1>Detail Complete</h1>
    </div>
</div>
<br>
<div class="detail">
    <label>Nama Task</label>
    <div class="desc">
        <p><?php echo $row["name_task"] ?></p>
    </div>
    <label for="">Test Steps</label>
    <div class="desc">
        <p><?= $row["test_steps"]; ?></p>
    </div>
    <label for="">Data Test</label>
    <div class="desc">
        <p><?= $row["test_data"]; ?></p>
    </div>
    <label for="">Expected Result</label>
    <div class="desc">
        <p><?= $row["exp_result"]; ?></p>
    </div>
    <label for="">Result</label>
    <div class="desc">
        <p><?= $row["result"]; ?></p>
    </div>
    <label for="">Source</label><br> <br>
    <img src="assets/img/<?= $row["source"]; ?>" style=" width: 50%; vertical-align:middle;" alt="<?php echo $row['name_task'] ?>"></td>
    <br>
    <br>
    <form action="" method="POST">
        <label for="page">Action: </label>
        <select id="page" name="page" style="width:100px;">
            <option value="complete">Complete</option>
            <option value="problem">Problem</option>
            <option value="progress">Progress</option>
            <option value="testing">Testing</option>
        </select>
        <button class="btn-detail" type="submit" name="move">Move</button>
    </form>
</div>