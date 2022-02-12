<?php
require 'functions.php';
$id_progress = $_GET["id_progress"];
$detail_progress = query("SELECT * FROM `progress` WHERE id_progress = $id_progress");
$row = $detail_progress["0"];

$id_task = $row["id_task"];
if (hapusprogress($id_progress) > 0) {
    echo "<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
} else {
    echo "<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
}
