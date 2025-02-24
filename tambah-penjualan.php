<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" >

    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" >

    <title>App Kasir | Tambah Penjualan</title>
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
            <li><a class="dropdown-item" href="tambah-penjualan.php">Tambah Penjualan</a></li>
            <li><a class="dropdown-item" href="tampil-penjualan.php">Tampil Penjualan</a></li>
            <li><a class="dropdown-item" href="cetak_penjualan.php">Cetak Penjualan</a></li>
          </ul>
        </li>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Barang
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-barang.php">Tambah Barang</a></li>
            <li><a class="dropdown-item" href="Tampil-Barang.php">Tampil Barang</a></li>
            <li><a class="dropdown-item" href="cetak_barang.php">Cetak Barang</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pelanggan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tambah-Pelanggan.php">Tambah Pelanggan</a></li>
            <li><a class="dropdown-item" href="tampil_pelanggan.php">Tampil Pelanggan</a></li>
            <li><a class="dropdown-item" href="cetak_pelanggan.php">Cetak Pelanggan</a></li>
          </ul>
        </li>
         
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../config/logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout ???')">Logout</a>
        </li>
    </div>
  </div>
 </nav> 

    <div class="container-fluid">
        <h3>Tambah Penjualan</h3>
        <div class="row">
            <form class="row g-3" action="simpan-penjualan.php" method="post">
            <div class="col-12">
             <label for="filter_pelanggan" class="form-label">Filter Pelanggan</label>
                 <input type="text" id="filter_pelanggan" class="form-control" placeholder="Cari pelanggan...">
                </div>
                <div class="col-12">
                <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                 <select id="id_pelanggan" name="id_pelanggan" class="form-control">
               <option value="-">- Pilih Pelanggan -</option>
                   <?php
               include "../config/koneksi.php";
             $sql = mysqli_query($config, "SELECT * FROM pelanggan");
                     while ($data1 = mysqli_fetch_array($sql)) {
            echo "<option value='$data1[id_pelanggan]'>$data1[id_pelanggan] - $data1[nama]</option>";
                 }
              ?>
             </select>
                </div>

                <div class="col-12">
                    <label for="tgl_penjualan" class="form-label">Tanggal Penjualan</label>
                    <input type="date" class="form-control" id="tgl_penjualan" name="tgl_penjualan" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>

                <div id="product-container">
                    <div class="product-row row g-3">
                        <div class="col-4">
                            <label for="id_barang" class="form-label">Barang</label>
                            <select id="id_barang" name="id_barang[]" class="form-control">
                                <option value="-">- Pilih Barang -</option>
                                <?php
                                $sql = mysqli_query($config, "SELECT * FROM barang");
                                $arrayjs = "var varbarang = new Array();\n";

                                while ($data1 = mysqli_fetch_array($sql)) {
                                    echo "<option value='$data1[id_barang]'>$data1[id_barang] - $data1[nama_barang]</option>";
                                    $arrayjs .= "varbarang['" . $data1['id_barang'] . "'] = {vharga:'" . addslashes($data1['harga']) . "'};\n";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-3">
                            <label for="jumlah" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah Barang">
                        </div>

                        <div class="col-3">
                            <label for="subtotal" class="form-label">Sub Total</label>
                            <input type="number" class="form-control" name="subtotal[]" placeholder="Sub Total" readonly>
                        </div>

                        <div class="col-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-success" onclick="addRow()">Tambah Barang</button>
                </div>

                <div class="col-12">
                    <label for="total" class="form-label">Total Harga</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="Total Harga" readonly>
                </div>

                <div class="col-12">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#modalStruk" onclick="generateStruk()">Cetak Struk</button>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script>
    document.getElementById("filter_pelanggan").addEventListener("keyup", function() {
        let filterValue = this.value.toLowerCase();
        let select = document.getElementById("id_pelanggan");
        let options = select.getElementsByTagName("option");

        for (let i = 0; i < options.length; i++) {
            let optionText = options[i].textContent.toLowerCase();
            if (optionText.includes(filterValue) || options[i].value === "-") {
                options[i].style.display = "";
            } else {
                options[i].style.display = "none";
            }
        }
    });
</script>


    <script>
        <?php echo $arrayjs; ?>

        function addRow() {
            const container = document.getElementById('product-container');

            const newRow = document.createElement('div');
            newRow.classList.add('product-row', 'row', 'g-3', 'mt-2');
            newRow.innerHTML = `
                <div class="col-4">
                    <label for="id_barang" class="form-label">Barang</label>
                    <select name="id_barang[]" class="form-control">
                        <option value="-">- Pilih Barang -</option>
                        <?php
                        $sql = mysqli_query($config, "SELECT * FROM barang");
                        while ($data1 = mysqli_fetch_array($sql)) {
                            echo "<option value='$data1[id_barang]'>$data1[id_barang] - $data1[nama_barang]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-3">
                    <label for="jumlah" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah Barang">
                </div>

                <div class="col-3">
                    <label for="subtotal" class="form-label">Sub Total</label>
                    <input type="number" class="form-control" name="subtotal[]" placeholder="Sub Total" readonly>
                </div>

                <div class="col-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                </div>
            `;

            container.appendChild(newRow);
        }

        function removeRow(button) {
            const row = button.closest('.product-row');
            row.remove();
            hitungTotal(); // Update total harga setelah penghapusan
        }

        function hitungTotal() {
            const subtotalInputs = document.querySelectorAll('input[name="subtotal[]"]');
            let total = 0;

            subtotalInputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });

            document.getElementById('total').value = total;
        }

        // Event delegation for dynamic elements
        document.getElementById('product-container').addEventListener('change', function(event) {
            if (event.target.name === 'id_barang[]') {
                const row = event.target.closest('.product-row');
                const barangId = event.target.value;
                const harga = varbarang[barangId]?.vharga || 0;
                const jumlahInput = row.querySelector('input[name="jumlah[]"]');
                const subtotalInput = row.querySelector('input[name="subtotal[]"]');

                if (barangId !== '-') {
                    jumlahInput.value = jumlahInput.value || 1;
                    subtotalInput.value = parseFloat(harga) * parseInt(jumlahInput.value || 0);
                } else {
                    subtotalInput.value = '';
                }

                hitungTotal();
            }
        });

        document.getElementById('product-container').addEventListener('input', function(event) {
            if (event.target.name === 'jumlah[]') {
                const row = event.target.closest('.product-row');
                const barangId = row.querySelector('select[name="id_barang[]"]').value;
                const harga = varbarang[barangId]?.vharga || 0;
                const jumlah = parseInt(event.target.value) || 0;
                const subtotalInput = row.querySelector('input[name="subtotal[]"]');

                if (barangId !== '-' && jumlah > 0) {
                    subtotalInput.value = parseFloat(harga) * jumlah;
                } else {
                    subtotalInput.value = '';
                }

                hitungTotal();
            }
        });
    </script>
</body>

</html>



<!-- Modal Preview Struk -->
<div class="modal fade" id="modalStruk" tabindex="-1" aria-labelledby="modalStrukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStrukLabel">Preview Struk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="strukContent">
                    <!-- Isi struk akan dimasukkan di sini oleh JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cetakStruk()">Cetak</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    function generateStruk() {
        const pelanggan = document.getElementById("id_pelanggan");
        const pelangganText = pelanggan.options[pelanggan.selectedIndex].text;
        const tanggal = document.getElementById("tgl_penjualan").value;
        const total = document.getElementById("total").value;
        const productRows = document.querySelectorAll("#product-container .product-row");

        let strukHTML = `
            <h4 class="text-center">Struk Penjualan</h4>
            <p><strong>ID Pelanggan:</strong> ${pelangganText}</p>
            <p><strong>Tanggal:</strong> ${tanggal}</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
        `;
        productRows.forEach(row => {
            const barang = row.querySelector('select[name="id_barang[]"]');
            const barangText = barang.options[barang.selectedIndex].text;
            const jumlah = row.querySelector('input[name="jumlah[]"]').value;
            const subtotal = row.querySelector('input[name="subtotal[]"]').value;

            if (barang.value !== "-") {
                strukHTML += `
                    <tr>
                        <td>${barangText}</td>
                        <td>${jumlah}</td>
                        <td>${subtotal}</td>
                    </tr>
                `;
            }
        });
        strukHTML += `
                </tbody>
            </table>
            <p><strong>Total Harga:</strong> ${total}</p>
        `;
        document.getElementById("strukContent").innerHTML = strukHTML;
    }

    function cetakStruk() {
        const strukContent = document.getElementById("strukContent").innerHTML;
        const originalContent = document.body.innerHTML;

        // Sementara mengganti seluruh isi halaman dengan struk
        document.body.innerHTML = strukContent;
        window.print();

        // Kembalikan isi halaman ke semula
        document.body.innerHTML = originalContent;
        location.reload(); // Refresh halaman agar form kembali ke keadaan awal
    }
</script>