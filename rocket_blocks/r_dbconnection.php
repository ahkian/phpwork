<?php
  $message = '';
  $db = new mysqli('localhost', 'daniel', 'uMIMyhqzMI9XabzH', 'rocketblocks');

  if ($db->connect_error){
    $message = $db->connect_error;
  } else {
    echo $message;
  }
?>
