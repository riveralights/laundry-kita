<?php
  // connect to database
  include '../connection.php';

  // catch data from update form
  $price = $_POST['price'];

  // update data
  mysqli_query($connection, "UPDATE harga SET harga_per_kilo='$price'");

  // redirect
  header('location:price.php?message=success');