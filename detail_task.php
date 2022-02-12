<?php
require 'functions.php';

$userlogin = $_SESSION["user"];
$id_task = $_GET["id_task"];
$new = query("SELECT * FROM `new` WHERE id_task = $id_task");
$problem = query("SELECT * FROM `problem` WHERE id_task = $id_task");
$progress = query("SELECT * FROM `progress` WHERE id_task = $id_task");
$testing = query("SELECT * FROM `testing` WHERE id_task = $id_task");
$complete = query("SELECT * FROM `complete` WHERE id_task = $id_task");


if (isset($_POST["addnew"])) {
    if (addnew($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
if (isset($_POST["addproblem"])) {
    if (addproblem($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
if (isset($_POST["addprogress"])) {
    if (addprogress($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
if (isset($_POST["addtesting"])) {
    if (addtesting($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
if (isset($_POST["addcomplete"])) {
    if (addcomplete($_POST) > 0) {
        header("Location: index.php?halaman=detail_task&id_task=$id_task");
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="new">
    <div class="halaman1">
        <h1>New</h1>
        <table class="table-task">
            <?php $no = 1 ?>
            <?php $styles = array('even', 'odd'); ?>
            <?php foreach ($new as $row) : ?>
                <tbody>
                    <tr class="<?php echo $styles[$no % 2]; ?>">
                        <td>
                            <?php $id_new = $row["id_new"]; ?>
                            <a href="index.php?halaman=detail_new&id_new=<?= $row["id_new"]; ?>"><?= $row["name_task"]; ?></a>
                        </td>
                        <td style="float:right;">
                            <a href="index.php?halaman=editnew&id_new=<?php echo $row["id_new"]; ?>"><i class="far fa-edit"></i></a> ||
                            <a href="index.php?halaman=hapusnew&id_new=<?php echo $row["id_new"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php $no++;
            endforeach; ?>
                </tbody>
        </table> <br>
        <button id="myBtn" class="newtask">New Task</a></button>
    </div>
</div>
<div id="input" class="inputnew">
    <div class="halaman1">
        <h1>Add Task</h1>
        <form action="" method="POST">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" autocomplete="" required><br>
            <label for="">Deskripsi Task</label><br><br>
            <textarea class="ckeditor" id="ckedtor" name="desc_task"></textarea><br>
            <button type="submit" name="addnew" class="newtask">Add Task</button>
        </form>
    </div>
</div>
<div class="problem">
    <div class="halaman1">
        <h1>Problem</h1>
        <table class="table-task">
            <?php $no = 1 ?>
            <?php $styles = array('even', 'odd'); ?>
            <?php foreach ($problem as $row) : ?>
                <tbody>
                    <tr class="<?php echo $styles[$no % 2]; ?>">
                        <td>
                            <?php $id_problem = $row["id_problem"]; ?>
                            <a href="index.php?halaman=detail_problem&id_problem=<?= $row["id_problem"]; ?>"> <?= $row["name_task"]; ?></a>
                        </td>
                        <td style="float:right;">
                            <a href="index.php?halaman=editproblem&id_problem=<?php echo $row["id_problem"]; ?>"><i class="far fa-edit"></i></a> ||
                            <a href="index.php?halaman=hapusproblem&id_problem=<?php echo $row["id_problem"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php $no++;
            endforeach; ?>
                </tbody>
        </table><br>
        <button id="myBtn1" class="newtask">New Task</a></button>
    </div>
</div>
<div id="input1" class="inputnew">
    <div class="halaman1">
        <h1>Add Task</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" required>
            <label for="">Test Steps</label>
            <textarea name="test_steps"></textarea>
            <label for="">Data Test</label>
            <textarea name="test_data"></textarea>
            <label for="">Expected Result</label>
            <input type="text" name="exp_result">
            <label for="">Result</label>
            <input type="text" name="result">
            <label for="">Source</label>
            <input type="file" name="source" placeholder="Image...">
            <button type="submit" name="addproblem" class="newtask">Add Task</button>
        </form>
    </div>
</div>
<div class="progress">
    <div class="halaman1">
        <h1>Progress</h1>
        <table class="table-task">
            <?php $no = 1 ?>
            <?php $styles = array('even', 'odd'); ?>
            <?php foreach ($progress as $row) : ?>
                <tbody>
                    <tr class="<?php echo $styles[$no % 2]; ?>">
                        <td>
                            <?php $id_progress = $row["id_progress"]; ?>
                            <a href="index.php?halaman=detail_progress&id_progress=<?= $row["id_progress"]; ?>"><?= $row["name_task"]; ?></a>
                        </td>
                        <td style="float:right;">
                            <a href="index.php?halaman=editprogress&id_progress=<?php echo $row["id_progress"]; ?>"><i class="far fa-edit"></i></a> ||
                            <a href="index.php?halaman=hapusprogress&id_progress=<?php echo $row["id_progress"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php $no++;
            endforeach; ?>
                </tbody>
        </table><br>
        <button id="myBtn2" class="newtask">New Task</a></button>
    </div>
</div>
<div id="input2" class="inputnew">
    <div class="halaman1">
        <h1>Add Task</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" required>
            <label for="">Test Steps</label>
            <textarea name="test_steps"></textarea>
            <label for="">Data Test</label>
            <textarea name="test_data"></textarea>
            <label for="">Expected Result</label>
            <input type="text" name="exp_result">
            <label for="">Result</label>
            <input type="text" name="result">
            <label for="">Source</label>
            <input type="file" name="source" placeholder="Image...">
            <button type="submit" name="addprogress" class="newtask">Add Task</button>
        </form>
    </div>
</div>
<div class="testing">
    <div class="halaman1">
        <h1>Testing</h1>
        <table class="table-task">
            <?php $no = 1 ?>
            <?php $styles = array('even', 'odd'); ?>
            <?php foreach ($testing as $row) : ?>
                <tbody>
                    <tr class="<?php echo $styles[$no % 2]; ?>">
                        <td>
                            <?php $id_testing = $row["id_testing"]; ?>
                            <a href="index.php?halaman=detail_testing&id_testing=<?= $row["id_testing"]; ?>"><?= $row["name_task"]; ?></a>
                        </td>
                        <td style="float:right;">
                            <a href="index.php?halaman=edittesting&id_testing=<?php echo $row["id_testing"]; ?>"><i class="far fa-edit"></i></a> ||
                            <a href="index.php?halaman=hapustesting&id_testing=<?php echo $row["id_testing"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php $no++;
            endforeach; ?>
                </tbody>
        </table><br>
        <button id="myBtn3" class="newtask">New Task</a></button>
    </div>
</div>
<div id="input3" class="inputnew">
    <div class="halaman1">
        <h1>Add Task</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" required>
            <label for="">Test Steps</label>
            <textarea name="test_steps"></textarea>
            <label for="">Data Test</label>
            <textarea name="test_data"></textarea>
            <label for="">Expected Result</label>
            <input type="text" name="exp_result">
            <label for="">Result</label>
            <input type="text" name="result">
            <label for="">Source</label>
            <input type="file" name="source" placeholder="Image...">
            <button type="submit" name="addtesting" class="newtask">Add Task</button>
        </form>
    </div>
</div>
<div class="complete">
    <div class="halaman1">
        <h1>Complete</h1>
        <table class="table-task">
            <?php $no = 1 ?>
            <?php $styles = array('even', 'odd'); ?>
            <?php foreach ($complete as $row) : ?>
                <tbody>
                    <tr class="<?php echo $styles[$no % 2]; ?>">
                        <td>
                            <?php $id_complete = $row["id_complete"]; ?>
                            <a href="index.php?halaman=detail_complete&id_complete=<?= $row["id_complete"]; ?>"><?= $row["name_task"]; ?></a>
                        </td>
                        <td style="float:right;">
                            <a href="index.php?halaman=editcomplete&id_complete=<?php echo $row["id_complete"]; ?>"><i class="far fa-edit"></i></a> ||
                            <a href="index.php?halaman=hapuscomplete&id_complete=<?php echo $row["id_complete"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php $no++;
            endforeach; ?>
                </tbody>
        </table><br>
        <button id="myBtn4" class="newtask">New Task</a></button>
    </div>
</div>
<div id="input4" class="inputnew">
    <div class="halaman1">
        <h1>Add Task</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nama Task</label>
            <input type="text" name="name_task" required>
            <label for="">Test Steps</label>
            <textarea name="test_steps"></textarea>
            <label for="">Data Test</label>
            <textarea name="test_data"></textarea>
            <label for="">Expected Result</label>
            <input type="text" name="exp_result">
            <label for="">Result</label> Result
            <input type="text" name="result">
            <label for="">Source</label>
            <input type="file" name="source" placeholder="Image...">
            <button type="submit" name="addcomplete" class="newtask">Add Task</button>
        </form>
    </div>
</div>

<script>
    // 0
    document.getElementById("myBtn").onclick = function() {
        myFunction()
    };

    function myFunction() {
        document.getElementById("input").classList.toggle("show");
    }

    //1
    document.getElementById("myBtn1").onclick = function() {
        myFunction1()
    };

    function myFunction1() {
        document.getElementById("input1").classList.toggle("show1");
    }

    //2
    document.getElementById("myBtn2").onclick = function() {
        myFunction2()
    };

    function myFunction2() {
        document.getElementById("input2").classList.toggle("show2");
    }

    //3
    document.getElementById("myBtn3").onclick = function() {
        myFunction3()
    };

    function myFunction3() {
        document.getElementById("input3").classList.toggle("show3");
    }

    //4
    document.getElementById("myBtn4").onclick = function() {
        myFunction4()
    };

    function myFunction4() {
        document.getElementById("input4").classList.toggle("show4");
    }
</script>