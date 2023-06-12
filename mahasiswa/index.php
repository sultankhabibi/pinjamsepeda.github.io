<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM mahasiswa");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Mahasiswa</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Nomor Telepon</th>
                  <th>Fakultas</th>
                  <th>Jurusan</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Approve</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr>
                    <td><?= $data['nim'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?php if ($data['jenis_kelamin'] == 1){
                        echo "Pria";
                        }elseif ($data['jenis_kelamin'] == 2){
                          echo "Wanita";
                        }?>
                    </td>
                    <td><?= $data['no_hp'] ?></td>
                    <td><?php if ($data['id_prodi'] == 2001 || $data['id_prodi'] == 2002 || $data['id_prodi'] == 2003){
                        echo "Sains dan Teknologi";
                      }?>
                    </td>
                    <td><?php if ($data['id_prodi'] == 2001){
                        echo "Teknologi Informasi";
                      }elseif ($data['id_prodi'] == 2002){
                        echo "Matematika";
                      }elseif ($data['id_prodi'] == 2003){
                        echo "Biologi";
                      }?>
                    </td>                 
                    <td><?= $data['email'] ?></td>
                    <td><?php if ($data['status_mahasiswa'] == 1){
                        echo "Asrama";
                        }elseif ($data['status_mahasiswa'] == 2){
                          echo "Non Asrama";
                        }?>
                    </td>                    
                    <td><?php if ($data['approve'] == 1){
                        echo "Aktif";
                        }elseif ($data['approve'] == 0){
                          echo "Belum Aktif";
                        }?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?nim=<?= $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>                      
                      <a class="btn btn-sm btn-info" href="edit.php?nim=<?= $data['nim'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>                      
                    </td>
                  </tr>
                <?php
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>