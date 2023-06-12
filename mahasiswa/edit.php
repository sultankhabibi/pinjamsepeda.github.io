<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nim = $_GET['nim'];
$query = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim='$nim'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Mahasiswa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIM</td>
                  <td><input class="form-control" type="number" name="nim" size="20" required value="<?= $row['nim'] ?>" readonly></td>
                </tr>
                <tr>
                  <td>ID Prodi</td>
                  <td><input class="form-control" type="number" name="id_prodi" size="20" required value="<?= $row['id_prodi'] ?>" readonly></td>
                </tr>                
                <tr>
                  <td>Nama Mahasiswa</td>
                  <td><input class="form-control" type="text" name="nama" size="20" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input class="form-control" type="text" name="password_user" size="20" required value="<?= $row['password_user'] ?>"></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input class="form-control" type="text" name="email" size="20" required value="<?= $row['email'] ?>"></td>
                </tr>
                <tr>
                  <td>Nomor Handphone</td>
                  <td><input class="form-control" type="text" name="no_hp" size="20" required value="<?= $row['no_hp'] ?>"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                      <option value="1" <?php if ($row['jenis_kelamin'] == "1") {
                                              echo "selected";
                                            } ?>>Pria</option>
                      <option value="2" <?php if ($row['jenis_kelamin'] == "2") {
                                                echo "selected";
                                              } ?>>Wanita</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Status Mahasiswa</td>
                  <td>
                    <select class="form-control" name="status_mahasiswa" id="status_mahasiswa" required>
                      <option value="1" <?php if ($row['status_mahasiswa'] == "1") {
                                              echo "selected";
                                            } ?>>Asrama</option>
                      <option value="2" <?php if ($row['status_mahasiswa'] == "2") {
                                              echo "selected";
                                              } ?>>Non Asrama</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Approve</td>
                  <td>
                    <select class="form-control" name="approve" id="approve" required>
                      <option value="1" <?php if ($row['approve'] == "1") {
                                              echo "selected";
                                            } ?>>Aktif</option>
                      <option value="0" <?php if ($row['approve'] == "0") {
                                                echo "selected";
                                              } ?>>Non Aktif</option>
                    </select>
                  </td>
                </tr>                
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>