<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// Inisialisasi variabel nim dan no_sepeda
$nim = '';
$no_sepeda = '';
$error_message = '';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $no_sepeda = $_POST['no_sepeda'];

    // Fungsi untuk mendapatkan informasi mahasiswa berdasarkan NIM
    function getMahasiswaInfo($connection, $nim) {
        $query = "SELECT m.nim, m.nama, p.nama_prodi, f.nama_fakultas, m.status_mahasiswa
            FROM mahasiswa m
            INNER JOIN prodi p ON m.id_prodi = p.id_prodi
            INNER JOIN fakultas f ON p.id_fakultas = f.id_fakultas
            WHERE m.nim = '$nim'";
        $result = mysqli_query($connection, $query);
        return mysqli_fetch_assoc($result);
    }

    // Fungsi untuk memeriksa status sepeda
    function checkStatusSepeda($connection, $no_sepeda) {
        $query = "SELECT status_sepeda FROM sepeda WHERE no_sepeda = '$no_sepeda'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['status_sepeda'];
    }

    // Pengecekan jika form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nim = $_POST['nim'];
        $no_sepeda = $_POST['no_sepeda'];

        // Pengecekan status sepeda
        $status_sepeda = checkStatusSepeda($connection, $no_sepeda);
        if ($status_sepeda !== 'Tersedia') {
            $error_message = 'Sepeda tidak tersedia';
        } else {
            // Pengecekan nim
            $mahasiswa_info = getMahasiswaInfo($connection, $nim);
            if ($mahasiswa_info) {
                // Nim valid, tampilkan form dan informasi
                ?>
                <h2>Form Peminjaman Sepeda</h2>
                <form method="POST" action="proses_peminjaman.php">
                    <input type="hidden" name="nim" value="<?= $mahasiswa_info['nim'] ?>">
                    <input type="hidden" name="no_sepeda" value="<?= $no_sepeda ?>">

                    <section>
                        <h4>Informasi Mahasiswa</h4>
                        <p>NIM: <?= $mahasiswa_info['nim'] ?></p>
                        <p>Nama: <?= $mahasiswa_info['nama'] ?></p>
                        <p>Prodi: <?= $mahasiswa_info['nama_prodi'] ?></p>
                        <p>Fakultas: <?= $mahasiswa_info['nama_fakultas'] ?></p>
                        <p>Status Mahasiswa: <?= $mahasiswa_info['status_mahasiswa'] ?></p>
                    </section>

                    <section>
                        <h4>Jam Peminjaman</h4>
                        <input type="text" name="jam_peminjaman" required>
                    </section>

                    <button type="submit">Submit</button>
                </form>
                <?php
            } else {
                $error_message = 'NIM tidak valid';
            }
        }
    }

    // Menampilkan pesan error (jika ada)
    if (!empty($error_message)) {
        echo '<p>Error: ' . $error_message . '</p>';
    }
}
?>

<!-- Form input NIM dan No. Sepeda -->
<form method="POST" action="">
    <h4>Input NIM dan No. Sepeda</h4>
    <input type="text" name="nim" placeholder="NIM" required>
    <input type="text" name="no_sepeda" placeholder="No. Sepeda" required>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
require_once '../layout/_bottom.php';
?>