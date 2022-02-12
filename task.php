<?php
require 'functions.php';
$userlogin = $_SESSION["user"];
$id_user = $userlogin["id_user"];
$ambil_task = query("SELECT DISTINCT tasks.id_task,tasks.name_task, tasks.desc_task,tasks.date_created FROM koneksi_tasl JOIN tasks ON tasks.id_task=koneksi_tasl.id_task JOIN users ON koneksi_tasl.id_user=$id_user");
$task = $ambil_task;
if (isset($_POST["addtask"])) {
    if (addtask($_POST) > 0) {
        header("Location: index.php?halaman=task");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<body>
    <div class="new">
        <div class="halaman1">
            <h1>Task</h1>
            <?php $no = 1 ?>
            <?php foreach ($task as $row) : ?>
                <div class="column">
                    <div class="nametask">
                        <a href="index.php?halaman=detail_task&id_task=<?= $row["id_task"]; ?>"> <?= $row["name_task"]; ?></a>
                        <a style="float:right;" href=" index.php?halaman=hapustask&id_task=<?php echo $row["id_task"]; ?>"><i class="far fa-trash-alt"> </i></a>
                        <span style="float: right;"> || </span>
                        <a style="float:right;" href="index.php?halaman=edittask&id_task=<?php echo $row["id_task"]; ?>"><i class="far fa-edit"></i> </a>
                    </div>
                    <p class="desc_task"><?= $row["desc_task"]; ?></p>
                    <p class="date_created"><?= $row["date_created"] ?></p>
                </div>
                <a id="contribution" href="index.php?halaman=addcontributor&id_task=<?= $row["id_task"]; ?>" style=" font-size:12px; padding:10px 20px; color:blueviolet;">+ Add Contributor</a><br><br>
            <?php $no++;
            endforeach; ?>
        </div>
        <button id="myBtn" class="newtask">New Task</button>
    </div>
    <div id="input" class="inputnew">
        <div class="halaman1">
            <h1>Add Task</h1>
            <form action="" method="POST">
                <label for="name_task">Nama Task</label>
                <input type="text" name="name_task" autocomplete="off" autofocus="autofocus"><br>
                <label for="desc_task">Deskripsi Task</label><br><br>
                <textarea class="ckeditor" id="ckedtor" name="desc_task"></textarea><br>
                <label for="date_created">Tanggal Dibuat</label>
                <input type="date" name="date_created"><br>
                <br>
                <button type="submit" name="addtask" class="newtask">Add Task</button>
                </td>
                </tr>
                </table>
            </form>
        </div>
    </div>
</body>
<script>
    // 0
    document.getElementById("myBtn").onclick = function() {
        myFunction()
    };

    function myFunction() {
        document.getElementById("input").classList.toggle("show");
    }
</script>