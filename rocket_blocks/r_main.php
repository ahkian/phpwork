<?php
//CHANGE THIS
  include 'r_dbconnection.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $prep = $db->prepare("INSERT INTO friends (friendid,firstname,lastname,city,email) VALUES ('0',?,?,?,?)");
    //  Character i=integer, d=double, s=string, b=blob

    $prep->bind_param('ssss',$firstname,$lastname,$city,$email);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];


    $prep->execute();
    $result = $db->insert_id ;
    $prep->close();


}
?>

<!DOCTYPE html>
<html>

</html>
