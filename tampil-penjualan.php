<?php
session_start();
if (!isset ($_SESSION['username'])){
  header(header:"location:../index.php");
  exit();
}
?>

<?php
// Include file koneksi database
include("../config/koneksi.php");

// Ambil filter tanggal, bulan, dan tahun dari form atau gunakan nilai default saat ini
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('d');
$bulan   = isset($_GET['bulan'])   ? $_GET['bulan']   : date('m');
$tahun   = isset($_GET['tahun'])   ? $_GET['tahun']   : date('Y');

// Query untuk mengambil data penjualan berdasarkan tanggal, bulan, dan tahun
$query = "
SELECT
    p.id_penjualan,
    p.tgl_penjualan,
    p.id_pelanggan,
    pl.nama AS nama,
    p.total,
    dp.id_barang,
    b.nama_barang,
    dp.jumlah,
    dp.harga,
    dp.subtotal
FROM
    penjualan p
INNER JOIN
    detail_penjualan dp ON p.id_penjualan = dp.id_penjualan
INNER JOIN
    pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
INNER JOIN
    barang b ON dp.id_barang = b.id_barang
WHERE
    DAY(p.tgl_penjualan) = '$tanggal' AND
    MONTH(p.tgl_penjualan) = '$bulan' AND
    YEAR(p.tgl_penjualan) = '$tahun'
ORDER BY
    p.id_penjualan, dp.id_barang
";

$result = mysqli_query($config, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" >

    <title>APP KASIR | PETUGAS</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">App Kasir</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Penjualan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-penjualan.php">Tambah Data</a></li>
            <li><a class="dropdown-item" href="tampil-penjualan.php">Tampil Data</a></li>
            <li><a class="dropdown-item" href="cetak-penjualan.php" target="_blank">Cetak Data</a></li>
          </ul>
        </li>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Barang
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-barang.php">Tambah Barang</a></li>
            <li><a class="dropdown-item" href="Tampil-Barang.php">Tampil Barang</a></li>
            <li><a class="dropdown-item" href="cetak_barang.php" target="_blank">Cetak Barang</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pelanggan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-Pelanggan.php">Tambah Pelanggan</a></li>
            <li><a class="dropdown-item" href="tampil_pelanggan.php">Tampil Pelanggan</a></li>
            <li><a class="dropdown-item" href="cetak_pelanggan.php" target="_blank">Cetak Pelanggan</a></li>
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
  <h3 class="m-3">Tampil Penjualan</h3>
  <form method="GET" class="m-3">
    <div class="row">
      <div class="col-md-2">
        <label for="tanggal">Pilih Tanggal:</label>
        <select name="tanggal" class="form-control">
          <?php for ($i = 1; $i <= 31; $i++): ?>
            <option value="<?php echo sprintf('%02d', $i); ?>" <?php if ($tanggal == sprintf('%02d', $i)) echo 'selected'; ?>>
              <?php echo sprintf('%02d', $i); ?>
            </option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-md-3">
        <label for="bulan">Pilih Bulan:</label>
        <select name="bulan" class="form-control">
          <?php for ($i = 1; $i <= 12; $i++): ?>
            <option value="<?php echo sprintf('%02d', $i); ?>" <?php if ($bulan == sprintf('%02d', $i)) echo 'selected'; ?>>
              <?php echo date('F', mktime(0, 0, 0, $i, 10)); ?>
            </option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-md-3">
        <label for="tahun">Pilih Tahun:</label>
        <select name="tahun" class="form-control">
          <?php for ($i = date('Y'); $i >= 2000; $i--): ?>
            <option value="<?php echo $i; ?>" <?php if ($tahun == $i) echo 'selected'; ?>>
              <?php echo $i; ?>
            </option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="submit" class="btn btn-primary d-block">Filter</button>
      </div>
    </div>
  </form>
  
  <div class="row m-5">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Penjualan</th>
          <th>Tanggal Penjualan</th>
          <th>Nama Pelanggan</th>
          <th>Total Harga</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Harga Satuan</th>
          <th>Subtotal</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        if (!$result) {
          echo "<tr><td colspan='10'>Error: " . mysqli_error($config) . "</td></tr>";
        } else {
          while ($data = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
              <td>{$i}</td>
              <td>{$data['id_penjualan']}</td>
              <td>{$data['tgl_penjualan']}</td>
              <td>{$data['nama']}</td>
              <td>Rp. {$data['total']}</td>
              <td>{$data['nama_barang']}</td>
              <td>{$data['jumlah']} pcs</td>
              <td>Rp. {$data['harga']}</td>
              <td>Rp. {$data['subtotal']}</td>
              <td>
                <a href='hapus_penjualan.php?id_penjualan={$data['id_penjualan']}' class='btn btn-danger' title='Hapus Penjualan'>Hapus</a>
              </td>
            </tr>
            ";
            $i++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
