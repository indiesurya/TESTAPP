<?php
require 'functions.php';
$id_problem = $_GET["id_problem"];
$detail_problem = query("SELECT * FROM `problem` WHERE id_problem = $id_problem");
$row = $detail_problem["0"];

$id_task = $row["id_task"];
if (isset($_POST["updproblem"])) {
    if (updproblem($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="content-task">
    <div class="halaman">
        <h1>Detail Problem</h1>
    </div>
</div>
<br>
<div class="detail">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Nama Task</label><br>
        <input type="text" name="name_task" value="<?php echo $row["name_task"] ?>" required><br>
        <label for="">Test Steps</label>
        <textarea name="test_steps"><?= $row["test_steps"]; ?></textarea>
        <label for="">Data Test</label>
        <textarea name="test_data"><?= $row["test_data"]; ?></textarea>
        <label for="">Expected Result</label>
        <input type="text" name="exp_result" value="<?= $row["exp_result"]; ?>">
        <label for="">Result</label>
        <input type="text" name="result" value="<?= $row["result"]; ?>">
        <label for="">Source</label><br> <br>
        <img src="assets/img/<?= $row["source"]; ?>" style=" width: 50%; vertical-align:middle;" alt="<?php echo $row['source'] ?>"></td>
        <input type="file" name="source"><input type="hidden" name="old" value="<?= $row["source"] ?>">
        <button type=" submit" name="updproblem" class="newtask">Update Task</button>
        <br>
        <br>
    </form>
</div>