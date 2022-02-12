<?php
require 'functions.php';
$id_problem = $_GET["id_problem"];
$detail_problem = query("SELECT * FROM `problem` WHERE id_problem = $id_problem");
$row = $detail_problem["0"];

$id_task = $row["id_task"];
if (hapusproblem($id_problem) > 0) {
    echo "<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
} else {
    echo "<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
}
