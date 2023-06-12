<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$no_sepeda = $_GET['no_sepeda'];
$query = mysqli_query($connection, "SELECT * FROM sepeda WHERE no_sepeda='$no_sepeda'");
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
              <input type="hidden" name="no_sepeda" value="<?= $row['no_sepeda'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nomor Sepeda</td>
                  <td><input class="form-control" type="text" name="no_sepeda" size="20" required value="<?= $row['no_sepeda'] ?>" readonly></td>
                </tr>
                <tr>
                  <td>Tanggal Input</td>
                  <td><input class="form-control" type="date" name="tgl_input" size="20" required value="<?= $row['tgl_input'] ?>" readonly></td>
                </tr>                
                <tr>
                  <td>Status Sepeda</td>
                  <td><input class="form-control" type="text" name="status_sepeda" size="20" required value="<?= $row['status_sepeda'] ?>"></td>
                </tr>
                <tr>
                  <td>Jenis Sepeda</td>
                  <td>
                    <select class="form-control" name="jenis_sepeda" id="jenis_sepeda" required>
                      <option value="Mountain Bike" <?php if ($row['jenis_sepeda'] == "Mountain Bike") {echo "selected";} ?>>Mountain Bike</option>
                      <option value="Mountain Bike" <?php if ($row['jenis_sepeda'] == "Mountain Bike") { echo "selected"; } ?>>Mountain Bike</option>
                      <option value="Road Bike" <?php if ($row['jenis_sepeda'] == "Road Bike") { echo "selected"; } ?>>Road Bike</option>
                      <option value="City Bike" <?php if ($row['jenis_sepeda'] == "City Bike") { echo "selected"; } ?>>City Bike</option>
                      <option value="BMX" <?php if ($row['jenis_sepeda'] == "BMX") { echo "selected"; } ?>>BMX</option>
                      <option value="Hybrid Bike" <?php if ($row['jenis_sepeda'] == "Hybrid Bike") { echo "selected"; } ?>>Hybrid Bike</option>
                      <option value="Cruiser Bike" <?php if ($row['jenis_sepeda'] == "Cruiser Bike") { echo "selected"; } ?>>Cruiser Bike</option>
                      <option value="Folding Bike" <?php if ($row['jenis_sepeda'] == "Folding Bike") { echo "selected"; } ?>>Folding Bike</option>
                      <option value="Electric Bike" <?php if ($row['jenis_sepeda'] == "Electric Bike") { echo "selected"; } ?>>Electric Bike</option>
                      <option value="Fixie Bike" <?php if ($row['jenis_sepeda'] == "Fixie Bike") { echo "selected"; } ?>>Fixie Bike</option>
                      <option value="Tandem Bike" <?php if ($row['jenis_sepeda'] == "Tandem Bike") { echo "selected"; } ?>>Tandem Bike</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Warna</td>
                  <td>
                    <select class="form-control" name="warna" id="warna" required>
                      <option value="Merah" <?php if ($row['warna'] == "Merah") {echo "selected";} ?>>Merah</option>
                      <option value="Biru" <?php if ($row['warna'] == "Biru") {echo "selected";} ?>>Biru</option>
                      <option value="Merah" <?php if ($row['warna'] == "Merah") { echo "selected"; } ?>>Merah</option>
                      <option value="Biru" <?php if ($row['warna'] == "Biru") { echo "selected"; } ?>>Biru</option>
                      <option value="Hijau" <?php if ($row['warna'] == "Hijau") { echo "selected"; } ?>>Hijau</option>
                      <option value="Kuning" <?php if ($row['warna'] == "Kuning") { echo "selected"; } ?>>Kuning</option>
                      <option value="Hitam" <?php if ($row['warna'] == "Hitam") { echo "selected"; } ?>>Hitam</option>
                      <option value="Putih" <?php if ($row['warna'] == "Putih") { echo "selected"; } ?>>Putih</option>
                      <option value="Ungu" <?php if ($row['warna'] == "Ungu") { echo "selected"; } ?>>Ungu</option>
                      <option value="Jingga" <?php if ($row['warna'] == "Jingga") { echo "selected"; } ?>>Jingga</option>
                      <option value="Coklat" <?php if ($row['warna'] == "Coklat") { echo "selected"; } ?>>Coklat</option>
                      <option value="Abu-abu" <?php if ($row['warna'] == "Abu-abu") { echo "selected"; } ?>>Abu-abu</option>
                    </select>
                  </td>                
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