<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_pinjam = $_GET['id_pinjam'];
$query = mysqli_query($connection, "SELECT * FROM peminjaman WHERE id_pinjam='$id_pinjam'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Peminjaman</h1>
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
                  <td>ID Peminjaman</td>
                  <td><input class="form-control" type="text" name="id_pinjam" size="20" required value="<?= $row['id_pinjam'] ?>"></td>
                </tr>
                <tr>
                  <td>Status Sepeda</td>
                  <td>
                    <select class="form-control" name="status_pinjam" id="status_pinjam" required>
                      <option value="Dikembalikan" <?php if ($row['status_pinjam'] == "Dikembalikan") {
                                              echo "selected";
                                            } ?>>Dikembalikan</option>
                      <option value="Dipinjam" <?php if ($row['status_pinjam'] == "Dipinjam") {
                                                echo "selected";
                                              } ?>>Dipinjam</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Pinjam</td>
                  <td><input class="form-control" type="datetime" name="tgl_pinjam" size="20" required value="<?= $row['tgl_pinjam'] ?>"></td>
                </tr>                
                <tr>
                  <td>Tanggal Kembali</td>
                  <td><input class="form-control" type="datetime" name="tgl_kembali" size="20" required value="<?= $row['tgl_kembali'] ?>"></td>
                </tr>                
                <tr>
                  <td>Nomor Sepeda</td>
                  <td><input class="form-control" type="text" name="no_sepeda" size="20" required value="<?= $row['no_sepeda'] ?>"></td>
                </tr>                
                <tr>
                  <td>NIM Peminjam</td>
                  <td><input class="form-control" type="text" name="nim" size="20" required value="<?= $row['nim'] ?>"></td>
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