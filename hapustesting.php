<?php
require 'functions.php';
$id_testing = $_GET["id_testing"];
$detail_testing = query("SELECT * FROM `testing` WHERE id_testing = $id_testing");
$row = $detail_testing["0"];

$id_task = $row["id_task"];
if (hapustesting($id_testing) > 0) {
    echo "<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
} else {
    echo "<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
}
