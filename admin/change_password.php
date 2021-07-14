<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
    <?php 
        if(isset($_GET['message'])) {
          if($_GET['message'] == 'success')  {
            echo "<div class='alert alert-success text-center'><strong>Berhasil!</strong> password anda telah diganti</div>";
          }
        }
      ?>
      <div class="card">
        <div class="card-header">Ganti Password</div>
        <div class="card-body">
          <form action="change_password_action.php" method="POST">
            <div class="mb-3">
              <label for="newPassword" class="form-label">Password Baru</label>
              <input type="password" name="new_password" id="newPassword" class="form-control" placeholder="New password">
            </div>
            <div class="grid grid-gap-2">
              <button type="submit" class="btn btn-success">Ganti Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>