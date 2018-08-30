<?php

include_once 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM artikel WHERE id = '{$id}'";
$result = mysqli_query($conn, $sql);
header('hapus.php');

  ?>

