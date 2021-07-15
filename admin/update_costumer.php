<?php 

  // connect to database
  include '../connection.php';

  // catch data from update form
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $hp = $_POST['hp'];
  $alamat = $_POST['alamat'];

  // update data
  mysqli_query($connection, "UPDATE pelanggan SET pelanggan_nama='$nama', pelanggan_hp='$hp', pelanggan_alamat='$alamat' WHERE pelanggan_id='$id'");

  header('location:costumer.php?message=updated');