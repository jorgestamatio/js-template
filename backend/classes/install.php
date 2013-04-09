<?php 

date_default_timezone_set('Europe/Berlin');
setlocale(LC_TIME, "fr_FR");


 
include("settings.php");
include("Database.class.php");



	function createTables(){
		global $database;
		$q1 = "CREATE TABLE blog_users (
		 username varchar(30) primary key,
		 password varchar(32),
		 userid varchar(32),
		 userlevel tinyint(1) unsigned not null,
		 email varchar(50),
		 timestamp int(11) unsigned not null,
		 email_confirmed tinyint(1)
		);";

		$q2 = "CREATE TABLE blog_active_users (
		 username varchar(30) primary key,
		 timestamp int(11) unsigned not null
		);";

		$q3 = "CREATE TABLE blog_active_guests (
		 ip varchar(15) primary key,
		 timestamp int(11) unsigned not null
		);";

		$q4 = "CREATE TABLE blog_banned_users (
		 username varchar(30) primary key,
		 timestamp int(11) unsigned not null
		);";
		
			
		
		if($database->query($q1) && $database->query($q2) && $database->query($q3) && $database->query($q4)){ 
			$response = 'Databases Created!';
		}else{
			$response = 'Error';
		}

		echo '<h1>'.$response.'</h1>';
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
  <title>Install</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">



	<!-- Styles -->
	<link rel="stylesheet" href="../../css/bootstrap.css">



</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">
	<div class="hero-unit">
		<?php createTables(); ?>
	</div>
</div>

<footer class='footer'>
&copy; <?php echo $year; ?> <?php echo COMPANY_NAME; ?>
</footer>



</body>
</html>
