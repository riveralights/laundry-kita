<?php
  $connection = mysqli_connect('localhost', 'root', '040699', 'laundry');

  // Check the connection there's error or not
  if(mysqli_connect_errno()) {
    echo "Database connection failed : " . mysqli_connect_errno();
  }