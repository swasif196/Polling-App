<?php
  
  $password = $_POST['pwd'];
  
  if($password === "Password"){
    echo "Success";
  }
  else {
    echo "Error: Invalid Password!";
  }

  
?>
