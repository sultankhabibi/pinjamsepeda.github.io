<?php
session_start();
require_once '../helper/connection.php';

$id_pinjam = $_POST['id_pinjam'];
$status_pinjam = $_POST['status_pinjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$no_sepeda = $_POST['no_sepeda'];
$nim = $_POST['nim'];

$query = mysqli_query($connection, "INSERT INTO peminjaman (status_pinjam, tgl_pinjam, tgl_kembali, no_sepeda, nim) VALUES ('$status_pinjam', '$tgl_pinjam', '$tgl_kembali', '$no_sepeda', '$nim')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
];
  header('Location: ./index.php');
}