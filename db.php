<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

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
  $q = $_POST['question'];
  $t = $_POST['Qtype'];
  $a = 0;
  $opt = $_POST['list'];
  if(isset($_POST['active'])){
    $a = 1;
  }
  mysqli_select_db($link,"dbs1157900");
  $sql="INSERT INTO Questions (Question, Type, Active) VALUES ('".$q."', '".$t."', ".$a.");";
  if ($link->query($sql) === TRUE) {
    echo "New record in Questions created successfully";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
  echo "<br>";
  
  $sql = "SELECT MAX(ID) FROM Questions;";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_array($result);
  $id = $row['MAX(ID)'];
  
  $sql="INSERT INTO ".$t."(ID, Options) VALUES (".$id.", '".$opt."');";
  if ($link->query($sql) === TRUE) {
    echo "New record in ".$t." created successfully";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
  echo "<br>";
  mysqli_close($link);
?>