<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Sepeda</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Nomor Sepeda</td>
                <td><input class="form-control" type="text" name="no_sepeda" size="20" required></td>
              </tr>
              <tr>
                <td>Tanggal Input</td>
                <td><input class="form-control" type="date" name="tgl_input" size="20" value="<?php echo date('d-m-Y'); ?>" required></td>
              </tr>
              <tr>
                <td>Status Sepeda</td>
                <td><input class="form-control" type="text" name="status_sepeda" size="20" value="Tersedia" readonly></td>
              </tr>
              <tr>
                <td>Jenis Sepeda</td>
                <td>
                  <select class="form-control" name="jenis_sepeda" id="jenis_sepeda" required>
                    <option value="">--Pilih Jenis Sepeda--</option>
                    <option value="Mountain Bike">Mountain Bike</option>
                    <option value="Folding Bike">Folding Bike</option>                    
                    <option value="Electric Bike">Electric Bike</option>                    
                    <option value="Road Bike">Road Bike</option>
                  </select>
                </td>
              </tr>                
              <tr>
                <td>Warna Sepeda</td>
                <td>
                  <select class="form-control" name="warna" id="warna" required>
                    <option value="">--Pilih Jenis Warna--</option>
                    <option value="Merah">Merah</option>
                    <option value="Biru">Biru</option>
                    <option value="Hijau">Hijau</option>
                    <option value="Kuning">Kuning</option>
                    <option value="Kitam">Hitam</option>
                    <option value="Putih">Putih</option>
                    <option value="Ungu">Ungu</option>
                    <option value="Jingga">Jingga</option>
                    <option value="Coklat">Coklat</option>
                    <option value="Abu-abu">Abu-abu</option>
                  </select>
                </td>
              </tr>              
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
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