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
    die();
  }
  echo "<br>";

  mysqli_select_db($link,"dbs1157900");
  
  $sql = "SELECT T1.ID, Questions.Question, T1.Yes, T1.No, T1.Options, T1.Other FROM T1 INNER JOIN Questions ON T1.ID = Questions.ID WHERE Questions.Active=1;";
  $result = mysqli_query($link,$sql);
  
  echo "<div id=\"T1\">";
    
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    $code = "<option value=\"\">Select An Answer</option>";
    $opts = $row['Options'];
    $token = strtok($opts, ",");
    
    while ($token !== false){
      $code = $code . "<option value=\"" . $token . "\">" . $token . "</option>";
      $token = strtok(",");
    }
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T1')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "Y\" name=\"" . $row['ID'] . "\" value=\"Yes\" onclick=\"optYN(this.id)\" required><label>Yes</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "N\" name=\"" . $row['ID'] . "\" value=\"No\" onclick=\"optYN(this.id)\"><label>No</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "R\" name=\"" . $row['ID'] . "\" value=\"opts\" onclick=\"optS(this.id)\"><select id=\"". $row['ID'] . "S\" onchange= \"optR(this.id, this.value)\" disabled required>$code</select><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "T\"name=\"" . $row['ID'] . "\" value=\"other\" onclick=\"optU(this.id)\"><textarea id=\"". $row['ID'] . "U\" onchange= \"optT(this.id, this.value)\" placeholder=\"Please Share Why! Required.\" disabled required></textarea></input><br><br>";
    echo "</form>";
  
    
  }
  
  $sql = "SELECT T2.ID, Questions.Question, T2.Yes, T2.No FROM T2 INNER JOIN Questions ON T2.ID = Questions.ID WHERE Questions.Active = 1";
  $result = mysqli_query($link,$sql);
  
  echo "</div>";
  echo "<div id=\"T2\">";
  
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T2')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "Y\" name=\"" . $row['ID'] . "\" value=\"Yes\" onclick=\"optYN(this.id)\" required><label>Yes</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "N\" name=\"" . $row['ID'] . "\" value=\"No\" onclick=\"optYN(this.id)\"><label>No</label><br>";
    echo "</form>";
    
  }
  
  $sql = "SELECT T3.ID, Questions.Question, T3.Yes, T3.No, T3.Options FROM T3 INNER JOIN Questions ON T3.ID = Questions.ID WHERE Questions.Active =1;";
  $result = mysqli_query($link,$sql);
  
  echo "</div>";
  echo "<div id=\"T3\">";
    
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    $code = "<option value=\"\">Select An Answer</option>";
    $opts = $row['Options'];
    $token = strtok($opts, ",");
    
    while ($token !== false){
      $code = $code . "<option value=\"" . $token . "\">" . $token . "</option>";
      $token = strtok(",");
    }
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T3')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "Y\" name=\"" . $row['ID'] . "\" value=\"Yes\" onclick=\"optYN(this.id)\" required><label>Yes</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "N\" name=\"" . $row['ID'] . "\" value=\"No\" onclick=\"optYN(this.id)\"><label>No</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "R\"name=\"" . $row['ID'] . "\" value=\"opts\" onclick=\"optS(this.id)\"><select id=\"". $row['ID'] . "S\" onchange= \"optR(this.id, this.value)\" disabled required>$code</select><br><br>";
    echo "</form>";
    
  }
  
  $sql = "SELECT T4.ID, Questions.Question, T4.Yes, T4.No, T4.Other FROM T4 INNER JOIN Questions ON T4.ID = Questions.ID WHERE Questions.Active = 1;";
  $result = mysqli_query($link,$sql);
  
  echo "</div>";
  echo "<div id=\"T4\">";
  
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T4')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "Y\" name=\"" . $row['ID'] . "\" value=\"Yes\" onclick=\"optYNE(this.id)\" required><label>Yes</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "N\" name=\"" . $row['ID'] . "\" value=\"No\" onclick=\"optYNE(this.id)\"><label>No</label><br>";
    echo "<textarea id=\"". $row['ID'] . "U\" onchange= \"opts(this.id, this.value)\" placeholder=\"Please Share Why! Required.\" disabled required></textarea></input><br><br>";
    echo "</form>";
    
  }
  
  $sql = "SELECT T5.ID, Questions.Question, T5.Yes, T5.No, T5.Other FROM T5 INNER JOIN Questions ON T5.ID = Questions.ID WHERE Questions.Active = 1;";
  $result = mysqli_query($link,$sql);
  
  echo "</div>";
  echo "<div id=\"T5\">";
  
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T5')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "Y\" name=\"" . $row['ID'] . "\" value=\"Yes\" onclick=\"optYNE(this.id)\" required><label>Yes</label><br>";
    echo "<input type=\"radio\" id=\"". $row['ID'] . "N\" name=\"" . $row['ID'] . "\" value=\"No\" onclick=\"optYNE(this.id)\"><label>No</label><br>";
    echo "<textarea id=\"". $row['ID'] . "U\" onchange= \"opts(this.id, this.value)\" placeholder=\"Please Share Why! Optional.\" disabled></textarea></input><br><br>";
    echo "</form>";
    
  }
  
  $sql = "SELECT T6.ID, Questions.Question, T6.Other FROM T6 INNER JOIN Questions ON T6.ID = Questions.ID WHERE Questions.Active = 1;";
  $result = mysqli_query($link,$sql);
  
  echo "</div>";
  echo "<div id=\"T6\">";
  
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T6')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<textarea id=\"". $row['ID'] . "U\" onchange= \"opts(this.id, this.value)\" placeholder=\"Please Share Why! Required.\" required></textarea></input><br><br>";
    echo "</form>";
    
  }
  
  $sql = "SELECT T7.ID, Questions.Question, T7.Options FROM T7 INNER JOIN Questions ON T7.ID = Questions.ID WHERE Questions.Active = 1;";
  $result = mysqli_query($link,$sql);
  
  echo "</div>";
  echo "<div id=\"T7\">";
    
  while($row = mysqli_fetch_array($result)) {
    $cnt = $cnt + 1;
    $code = "<option value=\"\">Select An Answer</option>";
    $opts = $row['Options'];
    $token = strtok($opts, ",");
    
    while ($token !== false){
      $code = $code . "<option value=\"" . $token . "\">" . $token . "</option>";
      $token = strtok(",");
    }
    echo "<form id=\"". $row['ID'] . "\" class=\"ques\" onsubmit=\"subAns(event, " . $row['ID'] . ", 'T7')\">";
    echo "<p>" . $cnt . ".) " . $row['Question'] . "</p>";
    echo "<select id=\"". $row['ID'] . "S\" onchange= \"opts(this.id, this.value)\"required>$code</select><br><br>";
    echo "</form>";
    
  }
  
  echo "</div>";
  
 
  
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