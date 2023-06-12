<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">
        <img src="../assets/img/logo.png" alt="logo" width="150">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.php">EF</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="../"><i class="fas fa-fire"></i> <span>Home</span></a></li>
      <li class="menu-header">Menu Utama</li>
      <?php
        if ($_SESSION['login']['jabatan'] == "admin") {      
      ?>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Mahasiswa</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../mahasiswa/index.php">List</a></li>
            <li><a class="nav-link" href="../mahasiswa/create.php">Tambah Data</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Sepeda</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../sepeda/index.php">List</a></li>
            <li><a class="nav-link" href="../sepeda/create.php">Tambah Data</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Peminjaman</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../peminjaman/index.php">List</a></li>
            <li><a class="nav-link" href="../peminjaman/create.php">Tambah Data</a></li>
          </ul>
        </li>      
      <?php
        }
      ?>
      <?php
        if ($_SESSION['login']['jabatan'] == "pengguna") {      
      ?>
      <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Histori Peminjaman</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../histori/index.php">Histori</a></li>            
          </ul>
        </li>      
      <?php
        }
      ?>
    </ul>
  </aside>
</div>