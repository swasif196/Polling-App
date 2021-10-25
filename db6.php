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
  $token = "";
  $cnt = 0;

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die("<p>Failed to connect to MySQL: " . $link->connect_error . "</p>");
  } else {
    echo "<p>Connection to MySQL server successfully established.</p>";
  }
  echo "<br>";

  mysqli_select_db($link,"dbs1157900");
  
  $t = $_POST['type'];
  
  echo $t;
  
  if($t === 'T0'){
     $sql="INSERT INTO Users (IP, Name, Email) VALUES (\"".$_POST['ip']."\", \"".$_POST['user']. "\", \"" .$_POST['email']. "\");";
    
    if ($link->query($sql) === TRUE) {
      echo "New record in ".$t." created successfully";
    } 
    else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
  }
  else {
    $sql="INSERT INTO Answers (Email, ID, Type, Ans) VALUES (\"".$_POST['email']."\", ".$_POST['id']. ", \"" .$_POST['type']. "\", \"" .$_POST['ans']. "\");";
    
    if ($link->query($sql) === TRUE) {
      echo "New record in ".$t." created successfully";
    } 
    else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
    
    $sql="UPDATE Questions SET TtlAns = TtlAns + 1 WHERE ID=".$_POST['id'].";";
    
    if ($link->query($sql) === TRUE) {
      echo "New record in ".$t." created successfully";
    } 
    else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
  }
  
 
  
  /*$sql = "SELECT MAX(ID) FROM Questions;";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_array($result);
  $id = $row['MAX(ID)'];
  
  $sql="INSERT INTO ".$t."(ID) VALUES (".$id.");";
  if ($link->query($sql) === TRUE) {
    echo "New record in ".$t." created successfully";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }*/
  mysqli_close($link);
?>