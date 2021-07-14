<?php

  // connect with database
  include '../connection.php';

  // catch data from change password form
  $new_password = md5($_POST['new_password']);

  // update data in admin table
  mysqli_query($connection, "UPDATE admin SET password='$new_password'");

  // redirect to previous page with sending message
  header('location:change_password.php?message=success');