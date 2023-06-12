<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Peminjaman</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <!-- Form -->
          <form action="./store.php" method="POST">
              <table cellpadding="8" class="w-100">              
                <tr>                  
                  <td><input class="form-control" type="hidden" name="id_pinjam" size="20" value = "null" readonly></td>
                </tr>                
                <tr>
                  <td>Status Sepeda</td>
                  <td>
                    <input class="form-control" type="datetime" name="status_pinjam" size="20" value="Tersedia" readonly>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Pinjam</td>
                  <td>
                    <input class="form-control" type="datetime" name="tgl_pinjam" size="20" value="<?= date('Y-m-d H:i:s') ?>" required>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Kembali</td>
                  <td><input class="form-control" type="text" name="tgl_kembali" size="20" required></td>
                </tr>
                <tr>
                  <td>Nomor Sepeda</td>
                  <td><input class="form-control" type="text" name="no_sepeda" size="20" required></td>
                </tr>
                <tr>
                  <td>NIM Peminjam</td>
                  <td><input class="form-control" type="text" name="nim" size="20" required></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary" type="submit" name="proses" value="Tambah">
                    <input class="btn btn-danger" type="reset" name="batal" value="Batalkan">
                  </td>
                </tr>                
              </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>