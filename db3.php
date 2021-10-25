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
  $t = $_POST['type'];
  echo $t."<br>";

  mysqli_select_db($link,"dbs1157900");
  
  if($t === 'T1'){
    echo "yes<br>";
    $sql = "SELECT T1.ID, Questions.Question, T1.Yes, T1.No, T1.Options, T1.Other FROM T1 INNER JOIN Questions ON T1.ID = Questions.ID WHERE Questions.Active=1;";
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Options</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Options'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T1.ID, Questions.Question, T1.Yes, T1.No, T1.Options, T1.Other FROM T1 INNER JOIN Questions ON T1.ID = Questions.ID WHERE Questions.Active=0;";
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Options</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Options'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  elseif ($t === 'T2'){
    $sql = "SELECT T2.ID, Questions.Question, T2.Yes, T2.No FROM T2 INNER JOIN Questions ON T2.ID = Questions.ID WHERE Questions.Active = 1";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T2.ID, Questions.Question, T2.Yes, T2.No FROM T2 INNER JOIN Questions ON T2.ID = Questions.ID WHERE Questions.Active = 0";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  elseif ($t === 'T3'){
    $sql = "SELECT T3.ID, Questions.Question, T3.Yes, T3.No, T3.Options FROM T3 INNER JOIN Questions ON T3.ID = Questions.ID WHERE Questions.Active =1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Options</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Options'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T3.ID, Questions.Question, T3.Yes, T3.No, T3.Options FROM T3 INNER JOIN Questions ON T3.ID = Questions.ID WHERE Questions.Active =0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Options</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Options'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  elseif ($t === 'T4'){
    $sql = "SELECT T4.ID, Questions.Question, T4.Yes, T4.No, T4.Other FROM T4 INNER JOIN Questions ON T4.ID = Questions.ID WHERE Questions.Active = 1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T4.ID, Questions.Question, T4.Yes, T4.No, T4.Other FROM T4 INNER JOIN Questions ON T4.ID = Questions.ID WHERE Questions.Active = 0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  
  elseif ($t === 'T5'){
    $sql = "SELECT T5.ID, Questions.Question, T5.Yes, T5.No, T5.Other FROM T5 INNER JOIN Questions ON T5.ID = Questions.ID WHERE Questions.Active = 1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T5.ID, Questions.Question, T5.Yes, T5.No, T5.Other FROM T5 INNER JOIN Questions ON T5.ID = Questions.ID WHERE Questions.Active = 0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Yes</th>
    <th>No</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Yes'] . "</td>";
      echo "<td>" . $row['No'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  
  elseif ($t === 'T6'){
    $sql = "SELECT T6.ID, Questions.Question, T6.Other FROM T6 INNER JOIN Questions ON T6.ID = Questions.ID WHERE Questions.Active = 1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T6.ID, Questions.Question, T6.Other FROM T6 INNER JOIN Questions ON T6.ID = Questions.ID WHERE Questions.Active = 0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Other</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Other'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  elseif ($t === 'T7'){
    $sql = "SELECT T7.ID, Questions.Question, T7.Options FROM T7 INNER JOIN Questions ON T7.ID = Questions.ID WHERE Questions.Active = 1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Options</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Options'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT T7.ID, Questions.Question, T7.Options FROM T7 INNER JOIN Questions ON T7.ID = Questions.ID WHERE Questions.Active = 0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Options</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Options'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  elseif ($t === 'T8'){
    $sql = "SELECT * FROM Questions where Active=1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Type</th>
    <th># Of Answers</th>
    <th>Date/Time</th>
    <th>Active</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Type'] . "</td>";
      echo "<td>" . $row['TtlAns'] . "</td>";
      echo "<td>" . $row['Date'] . "</td>";
      echo "<td>" . $row['Active'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT * FROM Questions where Active=0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline</h1><table>
    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Type</th>
    <th># Of Answers</th>
    <th>Date/Time</th>
    <th>Active</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Type'] . "</td>";
      echo "<td>" . $row['TtlAns'] . "</td>";
      echo "<td>" . $row['Date'] . "</td>";
      echo "<td>" . $row['Active'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
  }
  elseif ($t === 'T10'){
    
    $sql = "SELECT * FROM Users;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>User List</h1><table>
    <tr>
    <th>IP</th>
    <th>Name</th>
    <th>Email</th>
    <th>Date/Time</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td><a href=\"https://whatismyipaddress.com/ip/" . $row['IP'] . "\" target=\"_blank\">" . $row['IP'] . "</a></td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['Email'] . "</td>";
      echo "<td>" . $row['Time'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
  }
  elseif ($t === 'T11'){
    $sql = "SELECT Answers.ID, Answers.Type, Questions.Question, Answers.Ans, Answers.Email, Answers.Time FROM Answers INNER JOIN Questions ON Answers.ID = Questions.ID WHERE Questions.Active = 1;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>Active/Live Questions</h1><table>
    <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Email</th>
    <th>Time</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Type'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Ans'] . "</td>";
      echo "<td>" . $row['Email'] . "</td>";
      echo "<td>" . $row['Time'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
    
    $sql = "SELECT Answers.ID, Answers.Type, Questions.Question, Answers.Ans, Answers.Email, Answers.Time FROM Answers INNER JOIN Questions ON Answers.ID = Questions.ID WHERE Questions.Active = 0;";
    
    $result = mysqli_query($link,$sql);
    
    echo "<h1>In-Active/Offline Questions</h1><table>
    <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Email</th>
    <th>Time</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['Type'] . "</td>";
      echo "<td>" . $row['Question'] . "</td>";
      echo "<td>" . $row['Ans'] . "</td>";
      echo "<td>" . $row['Email'] . "</td>";
      echo "<td>" . $row['Time'] . "</td>";
      echo "</tr>";
    }
    echo "</table> <br>";
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
  echo "<br>";
  mysqli_close($link);
?>