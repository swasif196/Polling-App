<?php
  $host_name = 'db5001365776.hosting-data.io';
  $database = 'dbs1157900';
  $user_name = 'dbu545306';
  $password = 'Wnsmm-001';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die("<p>Failed to connect to MySQL: " . $link->connect_error . "</p>");
  } else {
    echo "<p>Connection to MySQL server successfully established.</p>";
  }
  $a = $_POST['active'];
  $id = $_POST['id'];
  
  mysqli_select_db($link,"dbs1157900");

  $sql="UPDATE Questions SET ACTIVE=".$a." WHERE ID=".$id.";";
  if ($link->query($sql) === TRUE) {
    echo "Successfully Updated";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
  echo "<br>";
  
  mysqli_close($link);
?>