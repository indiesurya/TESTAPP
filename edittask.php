<?php
require 'functions.php';
$id_task = $_GET["id_task"];
$detail_task = query("SELECT * FROM `tasks` WHERE id_task = $id_task");
$row = $detail_task["0"];

if (isset($_POST["updtask"])) {
    if (updtask($_POST) > 0) {
        header("Location: index.php?halaman=task");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="new">
    <div class="halaman1">
        <h1>Edit task</h1>
        <form action="" method="POST">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" autocomplete="off" value="<?php echo $row["name_task"]; ?>"><br>
            <label for="">Deskripsi Task</label><br><br>
            <textarea class="ckeditor" id="ckedtor" name="desc_task" value="<?php echo $row["desc_task"]; ?>"><?php echo $row["desc_task"]; ?></textarea><br>
            <input type="date" name="date_created" value="<?php echo $row["date_created"]; ?>">
            <button type="submit" name="updtask" class="newtask">Update Task</button>
        </form>
    </div>
</div>