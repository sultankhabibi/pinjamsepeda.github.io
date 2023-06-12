<?php
session_start();
require_once '../helper/connection.php';

$no_sepeda = $_GET['no_sepeda'];

$result = mysqli_query($connection, "DELETE FROM sepeda WHERE no_sepeda='$no_sepeda'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
