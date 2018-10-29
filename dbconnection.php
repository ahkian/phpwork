<?php
  $message = '';
  $db = new mysqli('localhost', 'daniel', 'uMIMyhqzMI9XabzH', 'testdatabase');

  if ($db->connect_error){
    $message = $db->connect_error;
  } else {
    echo $message;
  }
?>
