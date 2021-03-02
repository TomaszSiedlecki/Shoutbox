<?php
	session_start();
	if(!isset($_SESSION['user_session'])) {
		header("Location: login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Chat today!</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/mdb.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-md-12 offset-md-12">
				<a class="float-right" href="/chat/controller/logout_inc.php"><i class="fa-2x fa fa-sign-out-alt"></i></a>
				<a class="float-right" href="#" onClick="more()"><i class=" pr-3 fa-2x fa fa-angle-double-right"></i></a>
				<a class="float-right" href="#" onClick="down()"><i class="  pr-3 fa-2x fa fa-arrow-down"></i></a>

				<h4>SHOUTBOX TODAY!</h4>
				<ul class="timeline"><li id="dataid"></li></ul>
				<form name="addmessage" action="../chat/controller/addmessage_inc.php" method="POST" class=" autosend text-center p-5">
					<div class="form-group">
						<div class="row">
							<div class="col-md-10">
								<textarea class="form-control" id="chatbox" name="chatbox" rows="2" placeholder="Napisz co myślisz!"></textarea>
							</div>
							<div class="col-md-2">
								<button class=" mt-3 autosend mx-auto mb-4 fill m-0 px-2" name="btn-send" type="submit">WYŚLIJ</button>
							</div>
						</div>
					</div>
				</form>
		</div>
		</div>
	</div>
<script type="text/javascript"src="../chat/js/main.js"></script>
</body>
</html>
