<?php
require 'functions.php';
$id_new = $_GET["id_new"];
$detail_new = query("SELECT * FROM `new` WHERE id_new = $id_new");
$row = $detail_new["0"];

$id_task = $row["id_task"];
if (hapusnew($id_new) > 0) {
    echo "<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
} else {
    echo "<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=detail_task&id_task=$id_task';
        </script>";
}
?>