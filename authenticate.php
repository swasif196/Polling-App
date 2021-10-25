<?php
  
  $password = $_POST['pwd'];
  
  if($password === "NewPOLLSavetheCIAplus"){
    echo "Success";
  }
  else {
    echo "Error: Invalid Password!";
  }

  
?>