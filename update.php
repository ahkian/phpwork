<?php
  if(isset($_GET['friendid'])){
    include './dbconnection.php';
    $sql = 'SELECT * FROM friends WHERE friendid=' . $db->real_escape_string($_GET['friendid']);
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
  }
?>

<?php
  if(isset($_POST['execute'])){
    include './dbconnection.php';

    $prep = $db->prepare("Update friends SET firstname=?,lastname=?,city=?,email=? WHERE friendid=?");
    $prep->bind_param('ssssi', $firstname,$lastname,$city,$email,$friendid);

    $friendid = $_POST['friendid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];

    $prep->execute();
    $result = $prep->affected_rows . " row(s) affected." ; ;
    $prep->close();
  }
?>

<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Create Record</title>
      <link rel="stylesheet" type="text/css" media="screen" href="./main.css" >
  </head>
  <body>
    <div id="form-box">
      <form id="phpbasics" name="phpbasics" action=<?php echo $_SERVER['PHP_SELF']; ?> method='post' enctype='multipart/form-data'>
        First Name: <input id="firstname" name="firstname" type="text" size=25 value=<?php if(isset($_GET['friendid'])){echo $row['firstname']; }else{echo $firstname; } ?>><br><br>

        Last Name: <input id="lastname" name="lastname" type="text" size=25 value=<?php if(isset($_GET['friendid'])){echo $row['lastname']; }else{echo $lastname; } ?>><br><br>

        City: <input id="city" name="city" type="text" size=25 value=<?php if(isset($_GET['friendid'])){echo $row['city']; }else{echo $city; } ?>><br><br>

        E-mail: <input id="email" name="email" type="text" size=25 value=<?php if(isset($_GET['friendid'])){echo $row['email']; }else{echo $email; } ?>><br><br>

        <input type="hidden" name="friendid" value=<?php if(isset($_GET['friendid'])){echo $row['friendid']; }else{echo $friendid; } ?>><br><br>

        <input type=submit name="execute" id="execute" class="btn btn-warning" value="Edit Record">
      </form>
    </div>
    <div id="results">
      <h4 class="text-center">Results</h4>
      <?php echo $result; ?>
    </div>
  </body>
</html>
