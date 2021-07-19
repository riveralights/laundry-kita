<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <?php
      if (isset($_GET['message'])) {
        if ($_GET['message'] == 'success') {
          echo "<div class='alert alert-success text-center'><strong>Sukses!</strong> data telah ditambahkan</div>";
        } else if ($_GET['message'] == 'updated') {
          echo "<div class='alert alert-success text-center'><strong>Sukses!</strong> data berhasil di perbaharui</div>";
        } else if ($_GET['message'] == 'deleted') {
          echo "<div class='alert alert-warning text-center'><strong>Sukses!</strong> data berhasil di hapus</div>";
        }
      }
      ?>
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between my-3">
            <h4>Daftar Transaksi Laundry</h4>
            <a href="add_transaction.php" class="btn btn-primary mb-3"><i class="bi bi-person-plus-fill"></i> Tambah Transaksi</a>
          </div>
          <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Invoice</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Pelanggan</th>
                <th class="text-center">Berat (kg)</th>
                <th class="text-center">Tanggal Selesai</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Status</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // get connection from DB
              include '../connection.php';

              // query data from pelanggan table
              $query = mysqli_query($connection, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = pelanggan_id ORDER BY transaksi_id DESC");
              $no = 1;
              while ($transaksi = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center">INVOICE-<?= $transaksi['transaksi_id'] ?></td>
                  <td class="text-center"><?= $transaksi['transaksi_tanggal'] ?></td>
                  <td class="text-center"><?= $transaksi['pelanggan_nama'] ?></td>
                  <td class="text-center"><?= $transaksi['transaksi_berat'] ?> Kg</td>
                  <td class="text-center"><?= $transaksi['transaksi_tgl_selesai'] ?></td>
                  <td class="text-center"><?= "Rp. " . number_format($transaksi['transaksi_harga']) . ",-" ?></td>
                  <td class="text-center">
                    <?php
                    if ($transaksi['transaksi_status'] == '0') {
                      echo "<span class='badge bg-warning'>Proses</span>";
                    } else if ($transaksi['transaksi_status'] == '1') {
                      echo "<span class='badge bg-primary'>Dicuci</span>";
                    } else if ($transaksi['transaksi_status'] == '2') {
                      echo "<span class='badge bg-success'>Selesai</span>";
                    }

                    ?>
                  </td>
                  <td class="text-center">
                    <a href="invoice_transaction.php?id=<?= $transaksi['transaksi_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-receipt"></i> Invoice</a>
                    <a href="edit_transaction.php?id=<?= $transaksi['transaksi_id'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <a href="delete_transaction.php?id=<?= $transaksi['transaksi_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin membatalkan transaksi?');"><i class="bi bi-trash-fill"></i> Batal</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>