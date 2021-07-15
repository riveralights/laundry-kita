<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
    <?php 
        if(isset($_GET['message'])) {
          if($_GET['message'] == 'success')  {
            echo "<div class='alert alert-success text-center'><strong>Berhasil!</strong> harga laundry telah diganti</div>";
          }
        }
      ?>
      <div class="card">
        <div class="card-header">Pengaturan Harga Laundry</div>
        <div class="card-body">
          <?php 
            // connect to database
            include '../connection.php';

            // get data from table harga
            $query = mysqli_query($connection, 'SELECT harga_per_kilo FROM harga');
            while( $harga = mysqli_fetch_array($query) ) {
          ?>
          <form action="update_price.php" method="POST">
            <div class="mb-3">
              <label for="price" class="form-label">Harga per Kilo</label>
              <input type="number" name="price" id="price" class="form-control" value="<?= $harga['harga_per_kilo'] ?>">
            </div>
            <div class="grid grid-gap-2">
              <button type="submit" class="btn btn-success">Update Harga</button>
            </div>
          </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>