<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          
          <h4 class="mb-4">Edit Pelanggan</h4>
          <?php 
            // get connection to database
            include '../connection.php';

            // catch id from get url
            $id = $_GET['id'];

            // select data from database based on id
            $query = mysqli_query($connection, "SELECT * FROM pelanggan WHERE pelanggan_id='$id'");
            while($pelanggan = mysqli_fetch_array($query)) {          
          ?>
          <form action="update_costumer.php" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama pelanggan</label>
              <input type="hidden" name="id" value="<?= $pelanggan['pelanggan_id'] ?>">
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $pelanggan['pelanggan_nama'] ?>">
            </div>
            <div class="mb-3">
              <label for="hp" class="form-label">Nomor Telepon</label>
              <input type="number" name="hp" id="hp" class="form-control" value="<?= $pelanggan['pelanggan_hp'] ?>">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Pelanggan</label>
              <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Tuliskan alamat lengkap..."><?= $pelanggan['pelanggan_alamat'] ?></textarea>
            </div>
            <div class="grid grid-gap-2">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>