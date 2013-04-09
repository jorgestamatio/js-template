<?php
include 'classes/include.php';

$response = 'fail';

if(isset($_GET['id'])){
	$id = mysql_real_escape_string($_GET['id']);
	searchUser($id);	
}

function searchUser($id){
	global $database, $response;
	
	$q = "SELECT * FROM ".TBL_USERS."";
	$result = $database->query($q);
	while($row = mysql_fetch_array($result)){
		$user = md5($row['username']);
		if($user == $id){
			confirmAddress($row['username']);
		}
	}
}


function confirmAddress($username){
	global $database, $response;
		$q = "UPDATE ".TBL_USERS." SET email_confirmed=1 WHERE username = '$username'";
		$result = $database->query($q);
      	if($result){
			if(mysql_affected_rows() > 0){
				$response = 'success';
			}else{
				$response = 'done';		
			}
      	}
		else{
			$response = 'problem';
		}
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Register</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">



	<!-- Styles -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" href="../css/style.css">

	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="img/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57x57-precomposed.png">


  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div id="main" class="container clear-nav"><div class="row">

<div id='content' class='span6 offset3'>
	<div id='login_content' class="well">
<?php if($response == 'success'){ ?>
		<h1>Great you've just confirmed your email!</h1><br>
		<p>You can now log in with your username and password.</p>
		<p><a href='index.php' class='btn btn-large btn-success'>Log in</a></p>
<?php }else if($response == 'done'){ ?>
		<h1>Hey hey!</h1><br>
		<p>Your email was already confirmed!</p>
		<p>You can login with your username and password.</p>
		<p><a href='index.php' class='btn btn-large btn-success'>Login</a></p>	
<?php }else if($response == 'problem'){ ?>
		<h1>Oops!</h1><br>
		<p>Something went wrong!</p>
		<p>Try loading this page later.</p>
		<p><a href='confirm_email.php?id=<?php echo $_GET['id']; ?>' class='btn btn-large btn-info'>Reload</a></p>
<?php }else if($response == 'fail'){ ?>
		<h1>Oops!</h1><br>
		<p>Something went wrong!</p>
		<p>You might have ended up here by mistake.</p>
		<p><a href='../index.php' class='btn btn-large btn-warning'>Take me back home</a></p>	
	
<?php } ?>
	</div>	
</div><!--#content-->
</div><!--/.row-fluid -->
</div><!--/#main -->

<footer class='footer'>
&copy; <?php echo $year; ?> <?php echo COMPANY_NAME; ?>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<!-- Bootstrap JS-->
<script src="js/libs/bootstrap.min.js"></script>



<script src="js/plugins.js"></script>
<script src="js/script.js"></script>


</body>
</html>
