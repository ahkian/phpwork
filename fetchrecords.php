<?php
  include 'dbconnection.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "SELECT * FROM friends";
    $result = $db->query($sql);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Show Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid" id="main-container">
      <div class="col-md-6" id="form-container">
        <form class="text-center" id="request-form" name="request-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
          <input class="btn btn-primary" type="submit" id='execute' name='execute' value="Show Records">
        </form>
      </div>
      <div class="col-md-6" id="response">
        <h3 class="text-center">Results</h3>
        <?php
          if (isset($_POST['execute'])){
            while ($row = $result->fetch_assoc()) { ?>
              <a href='update.php?friendid=<?php echo $row["friendid"]; ?>'><?php echo $row["firstname"]; ?> <?php echo $row["lastname"]; ?></a><br/>
          <?php
            }
          }
          ?>
      </div>
    </div>
  </body>
</html>
