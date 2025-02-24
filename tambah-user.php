<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" >

    <title>Tambah User</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">App Kasir</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="index.php">Home</a>
        </li>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Barang
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-barang.php">Tambah Barang</a></li>
            <li><a class="dropdown-item" href="Tampil-Barang.php">Tampil Barang</a></li>
            <li><a class="dropdown-item" href="cetak_barang.php" target= "_blank">Cetak Barang</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pelanggan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-Pelanggan.php">Tambah Pelanggan</a></li>
            <li><a class="dropdown-item" href="tampil_pelanggan.php">Tampil Pelanggan</a></li>
            <li><a class="dropdown-item" href="cetak_pelanggan.php" target= "_blank">Cetak Pelanggan</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-user.php">Tambah User</a></li>
            <li><a class="dropdown-item" href="tampil-user.php">Tampil User</a></li>
            <li><a class="dropdown-item" href="cetak-user.php" target= "_blank">Cetak User</a></li>
          </ul>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../config/logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout ???')">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>




<div class="container-fluid">
  <h3>Tambah User</h3>
</div>

<div class="row">
<form class="row g-3" action="simpan_user.php" method= "post">
  <div class="col-12">
    <label for="inputAddress" class="form-label">ID User</label>
    <input type="text" class="form-control" name="id_user" id="inputAddress" placeholder="ID User"required>
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="inputAddress2" placeholder="Nama"required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="inputAddress" placeholder="Username"required>
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Password</label>
    <input type="text" class="form-control" name= "password" id="inputAddress2" placeholder="Password"required>
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Role</label>
    <select class="form-control" name="role">
      <option value="">-Pilih-</option>
      <option value="Admin">Admin</option>
      <option value="Petugas">Petugas</option>
    </select>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
  

  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
