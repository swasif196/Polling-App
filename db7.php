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
  $id = $_POST['id'];
  $ttl = 0;
  
  mysqli_select_db($link,"dbs1157900");
  
  $sql = "SELECT TtlAns FROM Questions WHERE id=" .$id. ";";

  $result = mysqli_fetch_array(mysqli_query($link,$sql));

  $ttl = $result['TtlAns'];

  $sql="SELECT Ans, count(Ans) AS CountOf FROM Answers WHERE id=" .$id. " GROUP BY Ans;";

  $result2 = mysqli_query($link,$sql);

  echo "$ttl <h1>Stats By Percentage</h1><table>
    <tr>
    <th>Answers</th>
    <th>Frequency (%)</th>
    </tr>";
  while($row = mysqli_fetch_array($result2)) {
    echo $row['CountOf'];
    $percent = $row['CountOf']/$ttl * 100;
    echo "<tr>";
    echo "<td>" . $row['Ans'] . "</td>";
    echo "<td>" . $percent . "</td>";
    echo "</tr>";
  }
  echo "</table> <br>";
  
  mysqli_close($link);
?>