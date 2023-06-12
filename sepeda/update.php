<?php
session_start();
require_once '../helper/connection.php';

$no_sepeda = $_POST['no_sepeda'];
$tgl_input = $_POST['tgl_input'];
$status_sepeda = $_POST['status_sepeda'];
$jenis_sepeda = $_POST['jenis_sepeda'];
$warna = $_POST['warna'];

$query = mysqli_query($connection, "UPDATE sepeda SET no_sepeda = '$no_sepeda', tgl_input = '$tgl_input', status_sepeda = '$status_sepeda', jenis_sepeda = '$jenis_sepeda',  warna = '$warna' WHERE no_sepeda = '$no_sepeda'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
