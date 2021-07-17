<?php include 'header.php' ?>

<?php 
    include '../connection.php';
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
          <h4 class="mb-4">Transaksi Laundry Baru</h4>
          <a href="transaction.php" class="btn btn-sm btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
          </div>
          <form action="transaction_action.php" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Pelanggan</label>
              <select name="pelanggan" id="pelanggan" class="form-control">
                  <option selected disabled>- Pilih Pelanggan - </option>
                  <!-- Ambil data pelanggan dari database -->
                  <?php 
                    $query = mysqli_query($connection, "SELECT * FROM pelanggan");
                    while( $pelanggan = mysqli_fetch_array($query) ) {
                  ?>
                  <option value="<?= $pelanggan['pelanggan_id'] ?>"><?= $pelanggan['pelanggan_nama'] ?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="berat" class="form-label">Berat Cucian</label>
              <input type="number" name="berat" id="berat" class="form-control" placeholder="Berat Cucian (Kg)" required>
            </div>
            <div class="mb-3">
              <label for="tglSelesai" class="form-label">Tanggal Selesai</label>
              <input type="date" name="tgl_selesai" id="tglSelesai" class="form-control" required>
            </div>
            <div class="mb-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Jenis Pakaian</th>
                            <th class="text-center" width="20%">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="grid grid-gap-2">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>