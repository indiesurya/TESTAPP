<?php
require 'functions.php';
$id_new = $_GET["id_new"];
$detail_new = query("SELECT * FROM `new` WHERE id_new = $id_new");
$row = $detail_new["0"];
$id_task = $row["id_task"];
if (isset($_POST["updnew"])) {
    if (updnew($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="editnew">
    <div class="halaman1">
        <h1>Edit New</h1>
        <form action="" method="POST">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" autocomplete="off" value="<?php echo $row["name_task"]; ?>"><br>
            <label for="">Deskripsi Task</label><br><br>
            <textarea class="ckeditor" id="ckedtor" name="desc_task" value="<?php echo $row["desc_task"]; ?>"><?php echo $row["desc_task"]; ?></textarea><br>
            <button type="submit" name="updnew" class="newtask">Update Task</button>
        </form>
    </div>
</div>