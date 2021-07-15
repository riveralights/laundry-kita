<?php
  // connect to dabatase
  include '../connection.php';

  // catch data from customer form
  $nama = $_POST['nama'];
  $hp = $_POST['hp'];
  $alamat = $_POST['alamat'];

  // insert to database by query
  mysqli_query($connection, "INSERT INTO pelanggan VALUES(null, '$nama', '$hp', '$alamat')");

  // redirect
  header('location:customer.php');