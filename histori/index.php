<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nim = $_SESSION['login']['id_users'];
$query = mysqli_query($connection, "SELECT * FROM peminjaman WHERE nim='$nim'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Histori Peminjaman</h1>    
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID Peminjaman</th>
                  <th>Status Peminjaman</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Nomor Sepeda</th>
                  <th>NIM Peminjam</th>                  
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($query)) :
                ?>
                  <tr>
                    <td><?= $data['id_pinjam'] ?></td>
                    <td><?= $data['status_pinjam'] ?></td>
                    <td><?= $data['tgl_pinjam'] ?></td>
                    <td><?= $data['tgl_kembali'] ?></td>
                    <td><?= $data['no_sepeda'] ?></td>
                    <td><?= $data['nim'] ?></td>                                        
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
</section>

<?php
require_once '../layout/_bottom.php';
?>
