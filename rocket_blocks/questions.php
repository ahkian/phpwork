<?php
include 'r_dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$prep = $db->prepare("INSERT INTO brainstorm_responses (responseid,userid,questionid,timetaken,responses) VALUES ('0',?,?,?,?)");
	//  Character i=integer, d=double, s=string, b=blob
	$prep->bind_param('iiis',$userid,$questionid,$timetaken,$responses);

	$userid = 1;
	$questionid = $_POST['questionid'];
	$timetaken = $_POST['timetaken'];
	$responses = $_POST['responses'];

	$prep->execute();
	$prep->close();

}
?>

<?php //add SQL to fetch question
	include 'r_dbconnection.php';
	if ()
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Questions</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="space50"></div>
<div class="space25"></div>
<div class="container">

	<div id="problems-container-1">

		<div class="row"><!--prompt-->
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-11">
						<p>
							<span class="prob-title prob-font-color" id="problem-title"></span><br>
							<span id="problem-category" class="small grey">Category:&nbsp;</span>
						</p>
					</div>
					<div class="col-sm-1">
						<!--<div class="pull-right"><span id="timer" class="grey"></span>&nbsp;<span class="glyphicon glyphicon-time grey"></span></div>-->
					</div>
				</div>
				<div class="line"></div><!--dividing line-->
				<p id="problem-prompt" class="prob-text prob-font-color"></p>
				<p class="small grey" id="problem-source"></p>
				<div class="space25"></div>


			</div><!--column prompt-->
		</div><!--problem title, category, prompt-->

		<!--Problem navigator-->
		<div class="row prob-text">
			<div class="col-sm-10 col-sm-offset-1" id="problem-navigator">

			</div>
		</div>

		<!--Problem assets-->
		<div class="row prob-text">
			<div class="col-sm-10 col-sm-offset-1" id="problem-assets-1">

			</div>
		</div>

		<!--Answer collection-->
		<div class="row" id="answer-collection-1"><!--displays-->

		</div><!--mock displays-->

		<div class="space25"></div><!--space after mock-->

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 prob-text" id="followup-container">

			</div><!--col-->
		</div><!--followup container-->

	</div><!--problems-container-->

	<div class="row">
		<div id="nav-buttons" class="col-sm-10 col-sm-offset-1">
			<div class="row"><div class="col-sm-12" id="next-submit"><a role="button" class="btn btn-success pull-right" id="submitAnswers">Submit answer</a></div></div>
			<div class="space10"></div>
			<div class="row"><div class="col-sm-12"><a role="button" class="btn btn-default pull-right skip" href="strategy.php">Skip problem</a></div></div>
			<div class="space10"></div>
			<div class="row"><div class="col-sm-12"><a class="pull-right" href="/pm/main.php"><small>Exit module</small></a></div></div>
		</div><!--col-->
	</div><!--nav-buttons-->
	<div id="response-id" class="hidden"></div>
	<div id="problem-id" class="hidden"></div>
</div><!--container-->
<?php include_once "../../a/footer.php" ?>
</body>
</html>
