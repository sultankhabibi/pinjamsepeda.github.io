<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$sepeda = mysqli_query($connection, "SELECT COUNT(*) FROM sepeda");
$user = mysqli_query($connection, "SELECT COUNT(*) FROM mahasiswa");
$nim = $_SESSION['login']['id_users'];
$query = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim='$nim'");

$total_sepeda = mysqli_fetch_array($sepeda)[0];
$total_user = mysqli_fetch_array($user)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <?php if ($_SESSION['login']['jabatan'] == "admin") : ?>
    <div class="column">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total sepeda</h4>
              </div>
              <div class="card-body">
                <?= $total_sepeda ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total User</h4>
              </div>
              <div class="card-body">
                <?= $total_user ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if ($_SESSION['login']['jabatan'] == "pengguna") : ?>
    <section class="section">
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($data = mysqli_fetch_array($query)) : ?>
                      <tr>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td>
                          <?php if ($data['jenis_kelamin'] == 1) : ?>
                            Pria
                          <?php elseif ($data['jenis_kelamin'] == 2) : ?>
                            Wanita
                          <?php endif; ?>
                        </td>
                        <td><?= $data['no_hp'] ?></td>
                        <td>
                          <?php if ($data['id_prodi'] == 2001 || $data['id_prodi'] == 2002 || $data['id_prodi'] == 2003) : ?>
                            Sains dan Teknologi
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if ($data['id_prodi'] == 2001) : ?>
                            Teknologi Informasi
                          <?php elseif ($data['id_prodi'] == 2002) : ?>
                            Matematika
                          <?php elseif ($data['id_prodi'] == 2003) : ?>
                            Biologi
                          <?php endif; ?>
                        </td>
                        <td><?= $data['email'] ?></td>
                        <td>
                          <?php if ($data['status_mahasiswa'] == 1) : ?>
                            Asrama
                          <?php elseif ($data['status_mahasiswa'] == 2) : ?>
                            Non Asrama
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if ($data['approve'] == 1) : ?>
                            Aktif
                          <?php elseif ($data['approve'] == 0) : ?>
                            Belum Aktif
                          <?php endif; ?>
                        </td>                        
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="row"></div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
