<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Dosen</h1>
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
                <td>NIM</td>
                <td><input class="form-control" type="text" name="nim" size="20" required></td>
              </tr>
              <tr>
                <td>Password User</td>
                <td><input class="form-control" type="password" name="password_user" size="20" required></td>
              </tr>
              <tr>
                <td>Nama Mahasiswa</td>
                <td><input class="form-control" type="text" name="nama" size="20" required></td>
              </tr>
              <tr>
                <td>Status Mahasiswa</td>
                <td>
                  <select class="form-control" name="status_mahasiswa" id="status_mahasiswa" required>
                    <option value="">--Pilih Status Mahasiswa--</option>
                    <option value="1">Asrama</option>
                    <option value="2">Non Asrama</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="1">Pria</option>
                    <option value="2">Wanita</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Approve Mahasiswa</td>
                <td>
                  <select class="form-control" name="approve" id="approve" required>
                    <option value="">--Pilih Approve--</option>
                    <option value="1">Aktif</option>
                    <option value="0">Non-Aktif</option>
                  </select>
                </td>
              </tr>              
              <tr>
                <td>Email Mahasiswa</td>
                <td><input class="form-control" type="text" name="email" size="20" placeholder="example@walisongo.ac.id" required></td>
              </tr>
              <tr>
                <td>Nomor Handphone</td>
                <td><input class="form-control" type="number" name="no_hp" size="20" required></td>
              </tr>
              <tr>
                <td>Prodi</td>
                <td>
                  <select class="form-control" name="id_prodi" id="id_prodi" required>
                    <option value="">--Pilih Prodi--</option>
                    <option value="2001">Teknologi Informasi</option>
                    <option value="2002">Matematika</option>
                    <option value="2003">Biologi</option>
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