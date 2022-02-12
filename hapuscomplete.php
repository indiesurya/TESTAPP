<?php
require 'functions.php';
$id_complete = $_GET["id_complete"];
$detail_complete = query("SELECT * FROM `complete` WHERE id_complete = $id_complete");
$row = $detail_complete["0"];

$id_task = $row["id_task"];
if (hapuscomplete($id_complete) > 0) {
    echo "<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
} else {
    echo "<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
}
