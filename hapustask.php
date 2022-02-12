<?php
require 'functions.php';
$id_task = $_GET["id_task"];


if (hapustask($id_task) > 0) {
    echo "<script> alert('data berhasil dihapus');
        document.location.href = 'index.php?halaman=task';
        </script>";
} else {
    echo "<script> alert('data gagal dihapus');
        document.location.href = 'index.php?halaman=task';
        </script>";
}
