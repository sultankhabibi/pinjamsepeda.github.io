<?php
session_start();
require_once '../helper/connection.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$password_user = $_POST['password_user'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status_mahasiswa = $_POST['status_mahasiswa'];
$approve = $_POST['approve'];
$id_prodi = $_POST['id_prodi'];

$query = mysqli_query($connection, "insert into mahasiswa(nim, password_user, status_mahasiswa, approve, email, nama, no_hp, jenis_kelamin, id_prodi) VALUES ('$nim', '$password_user', '$status_mahasiswa', '$approve', '$email', '$nama', '$no_hp', '$jenis_kelamin', '$id_prodi')");
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