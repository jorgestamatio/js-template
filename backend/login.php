<?php
include("classes/include.php");

if($session->logged_in){
//Logged in. Send to home!
header("Location: index.php");
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
  <title>Login</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">



	<!-- Styles -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-responsive.css">


	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

      footer{
		text-align: center;
      }
	</style>

	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="../img/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/ico/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/ico/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../img/ico/apple-touch-icon-57x57-precomposed.png">



</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">
				
<form class='form-signin' action="process.php" method="POST">
	<h2>Sign In!</h2>
	<?php echo $form->error("verify_email"); ?>
	<?php echo $form->error("pass"); ?>
	<?php echo $form->error("user"); ?>
	<div class="control-group <?php if($form->error("user")){ echo 'error'; }?>">
		<input type="text" name='user' class="input" placeholder="Username" value='<?php echo $form->value("user"); ?>'>
	</div>		
	<div class="control-group <?php if($form->error("pass")){ echo 'error'; }?>">
		<input type="password" name='pass' class="input" placeholder="Password" value="<?php echo $form->value("pass"); ?>">	
	</div>
	<label class="checkbox">
		<input type="checkbox" name="remember" <?php if($form->value("remember") != ""){ echo "checked"; } ?> /> Remember me
	</label>
	<input type="hidden" name="sublogin" value="1">
	<input type="submit" value="Login" class="btn btn-primary btn-large"><br><br>
	<a href="forgotpass.php">Forgot Password?</a><br>
	Not registered? <a href="register.php">Sign-Up!</a>
</form>
		

	<footer>
	&copy; <?php echo $year . ' ' . COMPANY_NAME; ?> 
	</footer>
	

</div><!--/#container -->



<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<!-- Bootstrap JS-->
<script src="../js/vendor/bootstrap.min.js"></script>



<script src="../js/plugins.js"></script>
<script src="../js/main.js"></script>


</body>
</html>